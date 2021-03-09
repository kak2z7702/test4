<?php

namespace Tests\Feature\Dron;

use App\Enum\Dron\DronMoves;
use App\Models\User;
use Tests\TestCase;

class MoveTest extends TestCase
{

    public function testCorrectReturnMove(): void
    {
        $user = User::factory()->create();


        $response = $this->actingAs($user, 'api')->post('/dron/start', [
            'x' => 0,
            'y' => 0,
        ]);
        $response->assertOk();

        $response = $this->actingAs($user, 'api')->post('/dron/move', [
            'commands' => sprintf(
                '%s,%s,%s,%s',
                DronMoves::up()->name(),
                DronMoves::right()->name(),
                DronMoves::down()->name(),
                DronMoves::left()->name(),
            ),
        ]);

        $response->assertJson([
            'status' => 'success',
            'result' => [
                'x' => 0,
                'y' => 0,
            ],
        ]);
    }


    public function testOutside(): void
    {
        $user = User::factory()->create();


        $response = $this->actingAs($user, 'api')->post('/dron/start', [
            'x' => 0,
            'y' => 0,
        ]);
        $response->assertOk();

        $response = $this->actingAs($user, 'api')->post('/dron/move', [
            'commands' => sprintf(
                '%s,%s,%s,%s',
                DronMoves::left()->name(),
                DronMoves::left()->name(),
                DronMoves::left()->name(),
                DronMoves::left()->name(),
            ),
        ]);

        $response->assertJson([
            'status' => 'error',
            'result' => [
                'message' => 'Position is outside',
                'code' => 422,
                'level' => 'business'
            ],
        ]);
    }


}