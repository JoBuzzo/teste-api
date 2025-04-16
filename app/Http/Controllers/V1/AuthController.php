<?php

namespace App\Http\Controllers\V1;

use App\Action\Auth\GetUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(AuthRequest $request)
    {
        $service = new LoginService($request->validated());

        return $service->execute();
    }

    public function destroy()
    {
        $user = GetUserAction::getUser();

        $user->token()->delete();

        return response()->json([
            'message' => 'Token deletado com sucesso.'
        ]);
    }

    public function show()
    {
        return response()->json([
            'usuario' => GetUserAction::getUser()
        ]);
    }
}
