<?php

use App\User;
use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //Desactiva temporalmente la comprobación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');   
        //Trucamos el contenido de todas las tablas para resetearlo y llenarlo con seeders
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();		//Tabla pivote sin modelo

        $cantidadUsuarios = 200;
        $cantidadCategorias = 30;
        $cantidadProductos = 1000;
        $cantidadTransacciones = 1000;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Category::class, $cantidadCategorias)->create();
        factory(Product::class, $cantidadProductos)->create()->each(
        	function ($producto) {
        		$categorias = Category::all()->random(mt_rand(1, 5))->pluck('id');

        		$producto->categories()->attach($categorias);
        	}
        );
        factory(Transaction::class, $cantidadTransacciones)->create();
        
    }
}
