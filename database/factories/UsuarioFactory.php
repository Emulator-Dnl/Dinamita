<?php

namespace Database\Factories;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //de a fuerza un registro de usuarios(empleado) debe estar relacionado con un user, y a su vez este user debe de ser tipo 'usuario'
        //Por eso por defecto en este factory utilizo User::factory()->usuario()
        return [
            'user_id' => User::factory()->usuario(), 
            'curp' => $this->faker->regexify('[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}'), 
            'sucursal_id' => $this->faker->numberBetween(1, 4),
            'certificado' => $this->faker->url(1, 4), 
            'registro' => $this->faker->regexify('[0-9a-zA-Z]{8}'), 
            'administrador' => '0',
        ];
    }

    public function usuario()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => '2',
                'curp' => 'PERM000225HJCRCFA2',
                'sucursal_id' => '3',
                'certificado' => 'https://laravel.com/docs/8.x/queries',
                'administrador' => '0',
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => '1',
                'curp' => 'OEVC770826HTLRRR12',
                'sucursal_id' => '1',
                'certificado' => 'https://github.com/fzaninotto/Faker',
                'administrador' => '1',
            ];
        });
    }
}
