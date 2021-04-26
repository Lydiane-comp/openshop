<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-2">Tous nos Produits</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Désignation</th>
                            <th>Prix</th>
                            <th>quantite</th>
                            <th>description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($listProduits as $produit)
                            <tr>
                                <td scope="row">{{ $produit->designation }}</td>
                                <td>{{ $produit->prix }}</td>
                                <td>{{ $produit->quantite }}</td>
                                <td>{{ $produit->description }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('produits.edit', $produit) }}"><i class="fas fa-edit"></i></a>

                                    <a class="btn btn-info btn-sm mr-2" href="{{ route('produits.show', $produit) }}"><i class="fas fa-eye"></i> </a>

                                    <a onclick="event.preventDefault(); if(confirm('Etes-vous sûr de vouloir supprimer ce produit ?')) document.getElementById('{{ $produit->id }}').submit()" class="btn btn-danger btn-sm" href="{{ route('produits.destroy', $produit) }}"><i class="fas fa-trash"></i></a>
                                    
                                    <form style="display: none" id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy', $produit) }}">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="">
                        {{ $listProduits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>