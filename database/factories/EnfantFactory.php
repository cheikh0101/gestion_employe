<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conjoint;
use App\Models\Enfant;
use App\Models\Membre;

class EnfantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enfant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prenom' => $this->faker->word,
            'date_naissance' => $this->faker->date(),
            'membre' => Membre::factory(),
            'conjoint' => Conjoint::factory(),
        ];
    }
}
