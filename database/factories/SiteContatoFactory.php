<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

/*
    Acessar : https://github.com/fzaninotto/faker
    para entender melhor como utilizar a biblioteca faker
*/

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker -> name,
        'telefone' => $faker -> tollFreePhoneNumber,
        'email' => $faker -> unique() -> email,
        'motivo_contatos' => $faker -> numberBetween ,
        'mensagem' => $faker -> text(200)
    ];
});
