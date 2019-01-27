<?php

use App\User;
use App\Product;
use App\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//Nos permite crear instancias de users con datos falsos.

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'verified' => $verified = $faker->randomElement([User::VERIFIED_USER, User::NOT_VERIFIED_USER]),
        'verification_token' => $verified == User::VERIFIED_USER ? null: User::generateVerificationToken(),
        'verified' => $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::PRODUCT_AVAILABLE, Product::PRODUCT_NOT_AVAILABLE]),
        'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
        //'seller_id' => User::inRandomOrder()->first()->id,   ESTA Y LA SIG. SON VÁLIDAS
        'seller_id' => User::all()->random()->id,
    ];
});

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::PRODUCT_AVAILABLE, Product::PRODUCT_NOT_AVAILABLE]),
        'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
        //'seller_id' => User::inRandomOrder()->first()->id,   ESTA Y LA SIG. SON VÁLIDAS
        'seller_id' => User::all()->random()->id,
    ];
});