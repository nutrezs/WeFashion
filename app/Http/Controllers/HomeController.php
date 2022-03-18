<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Fonction qui gére le listing des produits au niveau de la boutique.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products=DB::table('produits')->where('state','!=','solde')->orderBy('id','DESC')->paginate(6);
        $results= Produit::all();
        $count=$results->count();
        $title = "Stock des produits";
        return view('front.home',['products'=>$products,'count'=> $count,'title'=>$title]);
    }

    /**
     * Fonction qui gére l'affichage du detail d'un produit.
     *
     * @return \Illuminate\Http\Response
     */

    public function productDescribe($id){

        $showProduct=Produit::find($id);
   
        return view('front.details',compact('showProduct'));
    }

    /**
     * Fonction qui gére le listing des produits de catégorie homme.
     *
     * @return \Illuminate\Http\Response
     */

    public function produitsHomme(){
        $hommes=DB::table('produits')->where('categorie_id','=',1)->orderBy('id','DESC')->paginate(6);
  
        $results=DB::table('produits')->where('categorie_id','=',1);
        $count=$results->count();

        $title = "Stock des produits hommes";
  
        return view('front.home',['products'=>$hommes,'count'=> $count,'title'=>$title]);
  
      }

      /**
     * Fonction qui gére le listing des produits de catégorie femme.
     *
     * @return \Illuminate\Http\Response
     */

      public function produitsFemme(){
        $femmes=DB::table('produits')->where('categorie_id','=',2)->orderBy('id','DESC')->paginate(6);
  
        $results=DB::table('produits')->where('categorie_id','=',2);
        $count=$results->count();
  
        $title = "Stock des produits femmes";
        return view('front.home',['products'=>$femmes,'count'=> $count,'title'=>$title]);
  
      }

      /**
     * Fonction qui gére le listing des produits soldés.
     *
     * @return \Illuminate\Http\Response
     */
      public function ShowProductSolde(){
        $soldes=DB::table('produits')->where('state','=','solde')->orderBy('id','DESC')->paginate(6);
        $results=DB::table('produits')->where('state','=','solde');
        $countSolde=$results->count();
        $title = "Stock des produits soldés";
         
          return view('front.home',['products'=>$soldes,'count'=> $countSolde,'title'=>$title]);
      }
  

}
