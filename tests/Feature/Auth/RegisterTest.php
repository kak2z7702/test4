<?php

namespace Auth;

use Tests\TestCase;

class RegisterTest extends TestCase
{

    public function testCorrect(): void
    {
        $response = $this->post('/auth/register', [
            'name' => 'CorrectName',
            'email' => 'correct@email.com',
            'password' => 'correctPass',
            'password_confirmation' => 'correctPass'
        ]);

        $response->assertOk()->assertJsonStructure([
            'result' => [
                'name',
                'email',
                'api_token',
            ],
        ]);
    }

}
