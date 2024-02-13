<div>
    <form class="d-flex mb-5" >
        <input class="form-control me-2" type="search" placeholder="Rechercher une offre.." aria-label="Search" wire:model.live='search'>
        <!--button class="btn btn-outline-primary" type="submit">Rechercher</button-->
      </form>

   

    
    @forelse($offres as $offre)
    
    <div class="card">
        <!-- <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="..."> -->
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 50px;"alt="Avatar" />
                <h5 style="margin-left: 15px" class="card-title">{{ $offre->entreprise->name }}</h5>
            </div>
            <h1 class="card-title">{{ $offre->libelle}}</h1>
            <p class="card-text">{{ $offre->created_at->diffForHumans()}}</p>
            <a href="{{ route('entreprise.offre.show',$offre->id) }}" class="btn btn-primary">Voir l'offre</a>
        </div>
    </div>
    @empty
     <div class="alert alert-danger">
        Aucun resulat pour cette recherche
     </div>
    @endforelse
</div>
