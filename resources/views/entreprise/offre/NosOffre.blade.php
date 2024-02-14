@extends('partials._Layout')
@section('content')
    <div class="container">
        <h5 class="card-title fw-semibold mb-4">LES OFFRES</h5>
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Name</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Detaille offre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">statut</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">edit</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">edit</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($myOffre as $offre )
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">1</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                          <a href="{{route('entreprise.offre.show',$offre->id)}}" class="badge bg-info rounded-3 fw-semibold">Detail</a>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-info rounded-3 fw-semibold">{{($offre->statut == null) ? 'fermer' : $offre->statut->name  }}</span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                           <a class="badge bg-danger rounded-3 fw-semibold" href="{{route('entreprise.offre.edit',$offre->id)}}">Editer</a>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
