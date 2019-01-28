<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    private $model;

    public function tearDown()
    {
        if (!isset($this->model->id)) {
            return;
        }

        $this->model->destroy($this->model->id);
    }

    public function testBadLogin()
    {
        $response = $this->json('POST', '/api/login', ['email' => 'email_inexistente@test.com', 'password' => 'bad_password']);
        $stdResponse = json_decode($response->getContent());

        $response->assertStatus(400);
        $this->assertEquals($stdResponse->ok, 'false');
        $this->assertGreaterThan(1, strlen($stdResponse->error));
    }

    public function testLogin()
    {
        $this->createUser();
        $response = $this->json('POST', '/api/login', ['email' => $this->model->email, 'password' => 'secret']);
        $stdResponse = json_decode($response->getContent());

        $response->assertStatus(200);
        $this->assertTrue($stdResponse->ok);
        $this->assertGreaterThan(5, strlen($stdResponse->token));

    }

    private function createUser()
    {
        $this->model = new User();
        $this->model->name = "TestName";
        $this->model->email = "test_unit_3@test-unit.com";
        $this->model->password = bcrypt('secret');
        $this->model->save();
    }
}
