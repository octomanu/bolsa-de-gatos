<?php

namespace App\Http\Controllers\Api;

use App\Services\TokenAuthService;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends ApiController
{
    private $authService;

    public function __construct(TokenAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate(Request $request)
    {
        $this->validarLogin($request);

        $email = $request->input('email');
        $password = $request->input('password');
        $token = $this->authService->autenticar($email, $password);

        if (!$token) {
            return $this->badRequest('Credenciales inválidas');
        }

        return $this->ok(['token' => $token]);

    }

    private function validarLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

}
