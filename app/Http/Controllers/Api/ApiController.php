<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected function ok($payload = [])
    {
        $defaultPayload = ['ok' => true];

        return $this->jsonResponse(array_merge($defaultPayload, $payload), 200);

    }

    protected function badRequest($error)
    {
        $payload = [
            'ok' => 'false',
            'error' => $error,
        ];

        return $this->jsonResponse($payload, 400);

    }

    private function jsonResponse($data, $status)
    {
        return response()->json($data, $status);
    }

}
