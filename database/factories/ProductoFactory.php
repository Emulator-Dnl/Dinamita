<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->regexify('(Paracetamol|Ibuprofeno|Aspirina|Omeprazol|Amoxicilina|Simvastatina|Lexotiroxina|Ramipril|Amlodipina|Salbutamol){1} (15g|30g|20g|10g|12g|25g|7g){1}'),
            'existencias' => $this->faker->numberBetween(70, 777), 
            'precio' => $this->faker->numberBetween(10.99, 399.99), 
            'receta' => $this->faker->numberBetween(0, 1), 
        ];
    }
}
