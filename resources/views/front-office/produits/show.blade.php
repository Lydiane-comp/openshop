<x-master-layout>
    <div class="container">
        <div class="row">
            @if(session('statut'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('statut') }}</strong> 
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <h1 class="text-center mt-2">{{ $produit->designation }}</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary">Prix: {{ $produit->prix }}</li>
                    <li class="list-group-item list-group-item-warning">Quantité: {{ $produit->quantite }}</li>
                    <li class="list-group-item list-group-item-dark">{{ $produit->description }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-master-layout>