<?php

namespace API\V1\Users;
require './vendor/autoload.php';

use Tests\TestCase;

class UsersTest extends TestCase
{
    public function test_should_create_a_new_user()
    {
        $response = $this->call('POST', 'api/v1/users', [

            'full_name' => 'Mahdi karimian',
            'email' => 'karimian@gmail.com',
            'mobile' => '09121112222',
            'password' => '123456',
        ]);

        $this->assertEquals(201, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'full_name',
                'email',
                'mobile',
                'password',
            ],
        ]);
    }

    public function test_it_must_throw_a_exception_if_we_dont_send_parameters()
    {
        $response = $this->call('POST', 'api/v1/users', []);
        $this->assertEquals(422, $response->status());
    }

    public function test_should_update_the_information_of_user()
    {
        $response = $this->call('PUT', 'api/v1/users', [
            'id' => '252',
            'full_name' => 'amiiiirr',
            'email' => 'aliiiii@gmail.com',
            'mobile' => '09121112222',

        ]);

        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'full_name',
                'email',
                'mobile',
            ],
        ]);
    }

    public function test_should_update_password()
    {
        $response = $this->call('PUT', 'api/v1/users/change-password', [
            'id' => '486',
            'password' => '1234567890',
            'password_repeat' => '1234567890',
        ]);

        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'full_name',
                'email',
                'mobile',
            ],
        ]);
    }

    public function test_should_delete_a_user()
    {
        $response = $this->call('DELETE', 'api/v1/users', [
            'id' => '486',
        ]);
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }
}

