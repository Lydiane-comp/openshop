@component('mail::message')
# Introduction
## Un nouveau super produit vient d'etre ajouté sur votre superbe plateforme
vous trouverez ci-dessous les informations sur le nouveau produit
### Designation: {{ $produit->designation }}
### Prix: {{ $produit->prix }}
{{-- ### Categorie: {{ $produit->category->libelle }} --}}

pour commander un produit cliquez ici

@component('mail::button', ['url' => route("produits.show", $produit)])
Commandez ce produit
@endcomponent

Merci d'avoir choisi openshop pour votre shopping,<br>
{{ config('app.name') }}
@endcomponent
