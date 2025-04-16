<?php

namespace App\Services\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginService
{

    private array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    private function findUser(): User
    {
        $user = User::where('login', $this->data['login'])->first();

        if (!$user || !Hash::check($this->data['senha'], $user->senha)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user;
    }

    public function execute()
    {
        $user = $this->findUser();

        if ($user->token()->exists()) {
            $accessToken = $user->token;
            $dt_criacao = Carbon::parse($accessToken->dt_criacao);

            if ($dt_criacao->addSeconds($accessToken->expires_in) < now()) {
                $accessToken->delete();
            } else {
                return response()->json([
                    'token' => $accessToken,
                    'message' => 'Usuário autenticado com sucesso.'
                ]);
            }
        }

        return response()->json([
            'token' => $user->token()->create([
                'access_token' => bin2hex(random_bytes(30)),
                'expires_in' => 60 * 60 * 24,
                'dt_criacao' => now(),
            ]),
            'message' => 'Usuário autenticado com sucesso.'
        ]);
    }
}
