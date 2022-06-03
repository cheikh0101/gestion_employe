<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Membre;

class MembreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Membre::class;

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
            'cni' => $this->faker->word,
            'matricule' => $this->faker->word,
            'lieu_naissance' => $this->faker->word,
            'date_naissance' => $this->faker->date(),
            'telephone' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'sexe' => $this->faker->word,
            'situation_matrimoniale' => $this->faker->word,
            'structure_id' => $this->faker->word,
        ];
    }
}
