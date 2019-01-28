<?php

use App\Services\TokenAuthService;
use App\User;
use Tests\TestCase;

class TokenAuthServiceTest extends TestCase
{
    private $model;
    private $service;

    private $username = 'test_email_2@unit-test.com';
    private $password = 'secret';

    public function setUp()
    {
        parent::setUp();
        $this->model = new User();
        $this->service = $this->app->make(TokenAuthService::class);
    }

    public function tearDown()
    {
        if (empty($this->model->id)) {
            return;
        }

        $this->model->destroy($this->model->id);
    }

    public function crearService()
    {
        $this->assertInstanceOf(TokenAuthService::class, $this->service);
    }

    public function testCrearJwt()
    {
        $token = $this->callInaccessibleMethod($this->service, 'crearJwt', [$this->model]);

        $this->assertInternalType('string', $token);
    }

    public function testInvalidLogin()
    {
        $token = $this->service->autenticar('bad@email.com', 'testpass');

        $this->assertNull($token);
    }

    public function testLogin()
    {

        $this->createTestUser();

        $token = $this->service->autenticar($this->username, $this->password);

        $this->assertInternalType('string', $token);

    }

    public function testBadPasswordLogin()
    {
        $this->createTestUser();

        $token = $this->service->autenticar($this->username, 'BadPassword');

        $this->assertNull($token);

    }

    private function createTestUser()
    {
        $this->model->name = "TestName";
        $this->model->email = $this->username;
        $this->model->password = bcrypt($this->password);
        $this->model->save();
    }
}
