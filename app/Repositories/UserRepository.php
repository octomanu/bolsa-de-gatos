<?php

namespace App\Repositories;

use App\User;

class UserRepository
{

    public function paginar($perPage = 10, $page = 0)
    {
        $paginado = User::query()->paginate($perPage, ['*'], 'page', $page)->toArray();

        if ($paginado['last_page'] < $page) {
            return $this->paginar($perPage, $paginado['last_page']);
        }

        $this->limpiarPaginado($paginado);
        return $paginado;

    }

    private function limpiarPaginado(&$paginado)
    {
        unset($paginado['next_page_url']);
        unset($paginado['prev_page_url']);
        unset($paginado['path']);
    }

}
