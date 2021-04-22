 <x-master-layout>
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="height:100vh; background-size: cover; background-image: url(https://picsum.photos/1024);">
        <div class="container-fluid">
           <div class="row  justify-content-center align-items-center d-flex text-center h-100">
             <div class="col-12 col-md-8  h-50 ">
                 <h1 class="display-2  text-light mb-2 mt-5"><strong>Bienvenue sur OpenShop !</strong> </h1>
                 <p class="lead  text-light mb-5">Accédez aux meilleurs produits aux meilleurs prix !</p>
                <p>
                    <a href="https://blueprintsapp.launchaco.com/" class="btn bg-danger shadow-lg btn-round text-light btn-lg btn-rised">Passez votre commande ></a>
                </p>
             </div>
           </div>
         </div>
    </section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center mt-4">Nos Nouveaux Produits</h1>
          <hr>
        </div>
      </div>
      <div class="row">
        @foreach ($produits as $produit)
          <div class="col-md-4">
            <div class="card text-center mb-4">
              <img class="card-img-top" src="https://picsum.photos/200/150" alt="">
              <div class="card-body">
                <h4 class="card-title">{{ $produit->designation }}</h4>
                <p class="card-text">{{ $produit->description }}</p>
                <div class="text-center">
                  <a class="btn btn-primary btn-sm" href="{{ route('produits.show', $produit) }}"><i class="fas fa-shopping-cart"></i> Commander</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
 </x-master-layout>