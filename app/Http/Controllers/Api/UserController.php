<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class UserController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $this->validarIndex($request);
        $limit = (integer) $request->input('limit') ?: 10;
        $page = (integer) $request->input('page') ?: 0;
        $paginado = $this->userRepository->paginar($limit, $page);

        return $this->ok(['paginado' => $paginado]);

    }

    private function validarIndex(Request $request)
    {
        $this->validate($request, [
            'limit' => 'numeric',
            'page' => 'numeric',
        ]);
    }

}
