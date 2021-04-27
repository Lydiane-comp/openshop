<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function accueil()
    {
        // dd(Auth::user());
        $produits = Produit::orderByDesc('id')->take(9)->get();

        return view('welcome', ['produits' => $produits]);
    }
}
