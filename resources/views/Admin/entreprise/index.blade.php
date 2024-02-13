@extends('partials._Layout')
@section('content')
    <div class="container">
        <h5 class="card-title fw-semibold mb-4">Entreprise</h5>
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
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </th>
                                 <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">statut</h6>
                                </th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @forelse ($entreprises as $entreprise )
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$entreprise->name}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{$entreprise->email}}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-info rounded-3 fw-semibold">{{($entreprise->isCompany == true) ? ' actif' :  'non actif' }}</span>
                                        </div>
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
