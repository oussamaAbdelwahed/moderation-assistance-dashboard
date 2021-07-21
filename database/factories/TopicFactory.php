<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;
    private static $i=0;
    private static $topicsLabels = [
        "TENDANCES TECH",
        "ELECTONIQUE",
        "AI",
        "NUMERIQUE",
        "SMARTPHONES",
        "PC",
        "JEUX",
        "FILMS",
        "SERIES TV",
        "BLACK FRIDAY",
        "OFFRES LIMITÉS"
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        return [
           "label" => $this::$topicsLabels[array_rand($this::$topicsLabels)],
           "created_at" => now()->addSeconds($this::$i++),
        ];
    }
}
