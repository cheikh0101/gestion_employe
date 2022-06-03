<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conjoint;
use App\Models\Membre;

class ConjointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conjoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'prenom' => $this->faker->word,
            'lieu_naissance' => $this->faker->word,
            'date_naissance' => $this->faker->date(),
            'date_mariage' => $this->faker->date(),
            'telephone' => $this->faker->word,
            'membre_id' => Membre::factory(),
        ];
    }
}
