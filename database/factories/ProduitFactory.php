<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $faker = \Faker\Factory::create('fr_FR');

       
            //ici j'ai des conditions concernant l'insertion des images
          
            $categorie_id=$faker->numberBetween(1,2);
            if($categorie_id===1){
              //si la categorie est homme alors les images de type hommes  seront compris en 1et 10
              $image=$faker->numberBetween(11,20).'.jpg';
            }elseif($categorie_id===2){
              //si la categorie est femme alors les images de type femmes  seront compris en 11 et 20
              $image=$faker->numberBetween(1,10).'.jpg';
            }
          
          
            $state=$faker->randomElement(['solde','standart']);
            if($state==="solde"){
              $productState="solde";
            }else{
              $productState="standart";
            }
            //ici j'ai utilisé les faker afin de generer de fausses données
          
            return [
              'name'=>$faker->word,
              'description'=>$faker->sentence(),
              'price'=>$faker->randomFloat(3, 150, 500) ,
              'size'=>$faker->randomElement(['xl','xs','L','M']),
          
              'is_visible'=>1,
          
              'image' => $image,
          
              'state'=>$productState,
          
              'reference'=>Str::random(16),
    
              'categorie_id'=>$categorie_id,
          
          
            ];
          
          
       
    }
}

