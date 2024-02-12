<div>
    <form class="d-flex mb-5" >
        <input class="form-control me-2" type="search" placeholder="Rechercher une offre.." aria-label="Search" wire:model.live='search'>
        <!--button class="btn btn-outline-primary" type="submit">Rechercher</button-->
      </form>

      
    
    @foreach ($offres as $offre)
    
    <div class="card">
        <!-- <img src="../assets/images/products/s4.jpg" class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title">{{ $offre->entreprise->name }}</h5>
            <h5 class="card-title">{{ $offre->libelle }}</h5>
            <p class="card-text">{{ $offre->description }}</p>
            <p class="card-text">{{ $offre->created_at->diffForHumans()}}</p>
            
            <a href="{{ route('offres') }}" class="btn btn-primary">Voir l'offre</a>

            
    
        </div>
    </div>

    @endforeach
</div>
