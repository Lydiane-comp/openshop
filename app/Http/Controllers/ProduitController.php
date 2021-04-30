<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFormRequest;
use App\Mail\AjoutProduit;
use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use App\Notifications\NouveauProduit;
use Illuminate\Support\Facades\Mail;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.

     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // code...
        $this->middleware(['auth', 'isAdmin'])->except(['index', 'show']);
    }

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
        $produit = new Produit();

        return view('front-office.produits.create', compact('categories', 'produit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {
        // dd(date('d/m/y H:m:i', time()));
        $imageName = 'produit.png';
        if ($request->file('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/produits', $imageName);
        }

        $produit = Produit::create([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        $user = User::first();
        Mail::to($user)->send(new AjoutProduit($produit));

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
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Category::all();

        return view('front-office.produits.edit',
            ['produit' => $produit, 'categories' => $categories]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        Produit::where('id', $id)->update([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        $user = User::first();
        $produit = Produit::first();
        $user->notify(new NouveauProduit($produit));

        return redirect()->route('produits.show', $id)->with('statut', 'Votre produit a bien été modifié');
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
        Produit::destroy($id);

        return redirect()->route('produits.index')->with('statut', 'votre produit a bien été supprimé !');
    }
}
