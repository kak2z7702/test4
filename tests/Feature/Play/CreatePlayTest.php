<?php

namespace Tests\Feature\Play;

use App\DTO\Play\CreatePlayData;
use App\Models\User;
use Belamov\PostgresRange\Ranges\DateRange;
use Carbon\Carbon;
use Tests\TestCase;

class CreatePlayTest extends TestCase
{

    public function testOneCorrect(): void
    {
        $user = User::factory()->create();

        $createPlayData1 = new CreatePlayData([
            'name' => 'testName',
            'playDates' => new DateRange(
                Carbon::now(),
                Carbon::now()->addDays(3)
            )
        ]);

        $response = $this->actingAs($user, 'api')
            ->post('/plays', [
                'name' => $createPlayData1->name,
                'start_at' => $createPlayData1->playDates->from()->timestamp,
                'end_at' => $createPlayData1->playDates->to()->timestamp,
            ]);

        $response->assertOk()->assertJson([
            'status' => 'success',
            'result' => [
                'name' => $createPlayData1->name,
                'start_at' => $createPlayData1->playDates->from()->timestamp,
                'end_at' => $createPlayData1->playDates->to()->timestamp,
            ],
        ]);

    }

    public function testEndGreaterStartCorrect(): void
    {
        $user = User::factory()->create();

        $createPlayData1 = new CreatePlayData([
            'name' => 'testName',
            'playDates' => new DateRange(
                Carbon::now()->addDays(3),
                Carbon::now()
            )
        ]);

        $response = $this->actingAs($user, 'api')
            ->post('/plays', [
                'name' => $createPlayData1->name,
                'start_at' => $createPlayData1->playDates->from()->timestamp,
                'end_at' => $createPlayData1->playDates->to()->timestamp,
            ]);

        $response->assertJson([
            'status' => 'validationError',
            'result' => [
                'end_at' => [
                    sprintf('The end at must be greater than %s.', $createPlayData1->playDates->from()->timestamp)
                ],
            ],
        ]);

    }

    public function testOverlapsCorrect(): void
    {
        $user = User::factory()->create();

        $createPlayData1 = new CreatePlayData([
            'name' => 'testName',
            'playDates' => new DateRange(
                Carbon::now(),
                Carbon::now()->addDays(3)
            )
        ]);

        $response = $this->actingAs($user, 'api')
            ->post('/plays', [
                'name' => $createPlayData1->name,
                'start_at' => $createPlayData1->playDates->from()->timestamp,
                'end_at' => $createPlayData1->playDates->to()->timestamp,
            ]);
        $response->assertOk();

        $createPlayData2 = new CreatePlayData([
            'name' => 'testName',
            'playDates' => new DateRange(
                Carbon::now()->addDay(),
                Carbon::now()->addDays(5)
            )
        ]);

        $response = $this->actingAs($user, 'api')
            ->post('/plays', [
                'name' => $createPlayData2->name,
                'start_at' => $createPlayData2->playDates->from()->timestamp,
                'end_at' => $createPlayData2->playDates->to()->timestamp,
            ]);

        $response->assertJson([
            'status' => 'error',
            'result' => [
                'message' => 'The time of the play match with the other play.',
                'code' => 422,
                'level' => 'business',
            ],
        ]);
    }
}