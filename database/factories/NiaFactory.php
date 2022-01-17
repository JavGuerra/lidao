<?php

namespace Database\Factories;

use App\Models\Nia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nia::class;

    // Contador
    private static $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => self::$order++,
            'nia' => mt_rand(1000000, 9999999),
        ];
    }
}
