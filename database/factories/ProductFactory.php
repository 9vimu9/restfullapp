<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'description'=>$faker->paragraph(1),
            'quantity'=>$faker->numberBetween(1,10),
            'status'=>$faker->randomElement([Product::AVAILABLE_PRODUCT,Product::UNAVAILABLE_PRODUCT]),
            'image'=>$faker->randomElement(['1.png','2.png','3.png']),
            'seller_id'=>\App\User::all()->random()->id,

        //
    ];
});
