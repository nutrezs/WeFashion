<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Fonction qui gére la listing des produits au niveau du dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $shops = Produit::paginate(6);
        return view('dashboard', compact('shops'));
    }

    /**
     * Fonction qui gére l'affichage du formulaire de creation de produits.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Fonction qui gére la recuperation des données via le formulaire de creation de produits.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {

      $request->validate([
        'name'=>'required',
        'price'=>'required',
        'description'=>'required',
        'size'=>'required',
        'reference'=>'required',
        'state'=>'required',
  
      ]);
  
      $addProduct= new Produit;
      //$addCategorie= new Categorie;
  
  
      //recuperation des données saisis par l'utilisateur grace à $request et stockage dans la base de données
      $addProduct->name=$request->name;
      $addProduct->description=$request->description;
      $addProduct->price=$request->price;
  
      $addProduct->size=$request->size;
      $addProduct->is_visible=$request->status;
      $addProduct->reference=$request->reference;
  
  
      $addProduct->state=$request->state;
  
      $addProduct->categorie_id=$request->categorie_id;
  
  
  
      if($request->hasfile('image')){
  
        $file=$request->file('image');
  
        $extension=$file->getClientOriginalExtension(); // recupere l'extension
  
        $filename=time().'.'.$extension;
  
        $file->move('images',$filename);
  
        $addProduct->image=$filename;
      }
  
      //enregistrement
      $addProduct->save();
  
      //message de succes et redirection dans la page admin
      return redirect('/dashboard')->with('success','data saved');
    }

    // fonction qui gére la visibilité du produit au niveau de la boutique
    public function publish($id){
      
        $is_visible = DB::table('produits')->where('id',$id)->pluck('is_visible');

        echo $is_visible[0];

        if($is_visible[0] == "0"){
            DB::table('produits')->where('id',$id)->update(['is_visible'=>"1"]);
        }else{
            DB::table('produits')->where('id',$id)->update(['is_visible'=>"0"]);
        }

        return redirect('/dashboard');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editProduct = Produit::find($id);
      return view('admin.edit', compact('editProduct'));
    }

    /**
     * Fonction qui gére la modification des produits.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name'=>'required',
        'price'=>'required',
        'description'=>'required',
        'state'=>'required',
      ]);
  
      $editProduct=Produit::find($id);
  
  
      // $editCategorie=Categorie::find($id);
  
    //recuperation des données saisis par l'utilisateur grace à $request et ensuite modification de ma base de données
      $editProduct->name=$request->input('name');
      $editProduct->description=$request->input('description');
      $editProduct->price=$request->input('price');
      $editProduct->description=$request->input('description');
  
      $editProduct->state=$request->input('state');
  
      $editProduct->categorie_id=$request->input('categorie_id');
  
      $editProduct->save();
  
      return redirect('/dashboard')->with('success', 'Contact updated!');
    }
  

    /**
     * Fonction qui gére la suppression des produits.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
      $deleteProduct = Produit::find($id);
      $deleteProduct->delete();
  
      return redirect('/dashboard')->with('success', 'product deleted!');
  
    }
}
