<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;

class FormationController extends Controller
{
    public function index()
    {
        abort(503);

        $produit1 = Produit::first();
        $user1 = User::first();

        $user1->produits()->attach($produit1);
        $produit1->users()->attach($user1);

        dd($produit1->users);

        $category1 = Category::first();
        $produit1->category_id = $category1->id;
        $produit1->save();

        dd($category1->produits);

        dd($produit1->category);
    }

    public function ajouterProduit()
    {
        $produit = new Produit();

        $produit->designation = 'Maxwell';
        $produit->prix = 8000;
        $produit->description = "Maxwell c'est un super café !";
        $produit->quantite = 50;
        $produit->save();
        dd($produit);
    }

    public function ajouterProduit2()
    {
        $produit = Produit::create([
            'designation' => 'Ordinateur',
            'prix' => 500000,
            'description' => 'La description de ordinateur',
            'quantite' => 30,
        ]);

        dd($produit);
    }

    public function updateProduit()
    {
        $produit1 = Produit::first();

        $produit1->designation = 'Avovita';
        $produit1->prix = 1800;
        $produit1->description = "Pommade féminine à base d'avocat !";
        $produit1->quantite = 10;
        $produit1->save();

        dd($produit1);
    }

    public function updateProduit2(Produit $produit)
    {
        // dd($produit->designation);

        $result = Produit::where('id', $produit->id)->update([
            'designation' => 'Téléphone',
            'prix' => 50000,
            'description' => 'Ceci est la description de téléphone',
            'quantite' => 26,
        ]);

        dd($produit->designation, $result);
    }

    public function suppressionProduit()
    {
        $result = Produit::destroy(1);
        dd($result);
    }
}
