<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable=['name','description','price','size','reference','image','state','id_visible'];
    
  
    public function categorie(){
       return $this->belongsTo(Categorie::class);
     }
  
}
