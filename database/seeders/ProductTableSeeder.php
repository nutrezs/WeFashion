<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Création des catégories

         Categorie::create([
             'name'=>'hommes',
         ]);
      
        Categorie::create([
             'name'=>'femmes',
         ]);
      
         
          //ici je dis à ma factory de creer 80 produits
          \App\Models\Produit::factory()->count(50)->create();
    }
}
