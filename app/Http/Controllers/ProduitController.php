<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::orderByDesc('id')->paginate(15);

        return view('front-office.produits.index', ['listProduits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('front-office.produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|min:5|max:50|unique:produits',
            'prix' => 'required|numeric|between:1000,1000000',
            'quantite' => 'required|numeric|between:5,5000',
            'description' => 'nullable|max:255',
            'category_id' => 'required|numeric',
        ]);

        $produit = Produit::create([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'quantite' => $request->quantite,
            'description' => $request->description,
        ]);

        return redirect()->route('produits.show', $produit)->with('statut', 'Votre nouveau produit a été bien ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('front-office.produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
