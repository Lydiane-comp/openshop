<?php

namespace App\Http\Controllers;

use App\Models\Produit;

class MainController extends Controller
{
    public function accueil()
    {
        $produits = Produit::orderByDesc('id')->take(9)->get();

        return view('welcome', ['produits' => $produits]);
    }
}
