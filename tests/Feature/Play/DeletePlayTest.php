<?php

namespace Play;

use App\Exceptions\Business\EntityNotFoundException;
use App\Models\Play;
use App\Models\User;
use App\Repositories\PlayRepository;
use Tests\TestCase;

class DeletePlayTest extends TestCase
{

    public function testDeleteExistsCorrect(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Play $play */
        $play = Play::factory()->create();

        $this->actingAs($user, 'api')
            ->delete(sprintf('/plays/%s', $play->id), [])
            ->assertOk();

        $this->expectException(EntityNotFoundException::class);
        $repository = $this->app->make(PlayRepository::class);
        $repository->findById($play->id);
    }

    public function testDeleteNotExistsCorrect(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')
            ->delete(sprintf('/plays/%s', 100), []);

        $response->assertJson([
            'status' => 'validationError',
            'result' => [
                'id' => [
                    'The selected id is invalid.'
                ],
            ],
        ]);

    }

}