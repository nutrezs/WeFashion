<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->Text('description');
            $table->decimal('price');
            $table->string('size')->default();
            $table->mediumText('image');
            $table->boolean('is_visible');
            $table->string('state');
            $table->string('reference',16);

           //relation entre la table categorie et la table catégorie 
            $table->foreignId('categorie_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
