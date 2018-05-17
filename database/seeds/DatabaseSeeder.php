<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\User;
use App\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $usersQuantity=1000;
        $categoriesQuantity=30;
        $productsQuantity=1000;
        $transactionsQuantity=1000;

        factory(User::class,$usersQuantity)->create();
        factory(Category::class,$categoriesQuantity)->create();

        // factory(Product::class,$productsQuantity)->create();//mehema dammama category_product poivot eka pirawenne naa

        factory(Product::class,$productsQuantity)->create()->each(//mehema kalaama category_proiduct pivot eka pirenawea
            function ($product)
            {
                $categories=Category::all()->random(mt_rand(1,5))->pluck('id');
                $product->categories()->attach($categories);//meka thama category_product eka fill karana code eka attach nethod eka
            }
        );
        factory(Transaction::class,$transactionsQuantity)->create();
    }
}
