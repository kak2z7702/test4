<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function testCorrect(): void
    {

        $password = 'correctPass';
        /** @var User $user */
        $user = User::factory([
            'password' => Hash::make($password),
        ])->create();


        $response = $this->post('/auth/login', [
            'email' => $user->email,
            'password' => $password,
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
