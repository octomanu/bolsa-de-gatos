<?php

namespace App\Services;

use App\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class TokenAuthService
{

    public function autenticar($email, $password)
    {

        $user = User::where('email', $email)->first();

        if (!$user) {
            return;
        }

        $autenticado = Hash::check($password, $user->password);

        if (!$autenticado) {
            return;
        }

        return $this->crearJwt($user);
    }

    protected function crearJwt(User $usuario)
    {
        $payload = [
            'iss' => "jwt", // Issuer of the token
            'sub' => $usuario, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60 * 60, // Expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }

}
