<?php

namespace App\Action\Auth;

use App\Models\AccessToken;
use App\Models\User;

class GetUserAction
{
    public static function getUser(): User|null
    {
        $accessToken = request()->bearerToken();

        if (empty($accessToken)) {
            return null;
        }

        $accessToken = AccessToken::with('usuario')
            ->where('access_token', $accessToken)
            ->first();

        return $accessToken->usuario ?? null;
    }
}
