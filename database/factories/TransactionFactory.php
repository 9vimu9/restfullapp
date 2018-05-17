<?php

use Faker\Generator as Faker;
use App\Seller;
use App\User;
use App\Transaction;

$factory->define(Transaction::class, function (Faker $faker) {
//Seller::has('products')->get()
//sellers at least have one product
    $seller=Seller::has('products')->get()->random();
    $buyer=User::all()->except($seller->id)->random();// we are doing this because buyer and seller must  not be same
    return [
        'quantity'=>$faker->numberBetween(1,3),
        'buyer_id'=>$buyer->id,
        'product_id'=>$seller->products->random()->id
    ];
});



