<?php

use Faker\Generator as Faker;

$factory->define(App\Sms::class, function (Faker $faker) {
    return [
        'received' => $faker->dateTimeBetween('-10 years')
            ->format('Y-m-d H:i:s'),
        'amount'   => $faker->numberBetween(1000, 10000000), // 1.000 - 10 Jt
        'receiver' => $faker->e164PhoneNumber,
        'sdn'      => $faker->randomElement([
            'TSEL',
            '3',
            'XL/Axis',
            'ISAT'
        ])
    ];
});
