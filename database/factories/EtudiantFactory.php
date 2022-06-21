<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'Matricule' => $this->faker->randomDigitNot(6),
            'cycle' => 'Licence',
            'niveau' => 'Licence 1',
            'annee_academique' =>'2022 - 2023',
            'created_at' => now(),
        ];
    }
}
