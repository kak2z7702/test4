<?php

namespace Database\Factories;

use App\Models\Play;
use Belamov\PostgresRange\Ranges\DateRange;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayFactory extends Factory
{

    protected $model = Play::class;


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'play_dates' => new DateRange(Carbon::now(), Carbon::now()->addDays(3)),
        ];
    }
}