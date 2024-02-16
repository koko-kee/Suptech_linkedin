@extends('partials._Layout')
@section('content')
    <div class="container">
        <h5 class="card-title fw-semibold mb-4">Entreprise</h5>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
            </div>
        @endif
        @if(session('danger'))
        <div class="alert alert-danger" role="alert">
            {{session('danger')}}
            </div>
        @endif
      
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Gestions des entreprises</h5>
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
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action 1</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action 2</h6>
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
                                            <span class="badge {{($entreprise->isCompany) ?  'bg-success' : 'bg-danger' }} rounded-3 fw-semibold">{{($entreprise->isCompany == true) ? ' actif' :  'non actif' }}</span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            @if ($entreprise->isCompany)
                                              <a class="badge {{($entreprise->isCompany) ?  'bg-danger' : 'bg-success' }} rounded-3 fw-semibold" href="{{route('Admin.entreprise.DiseableAccount',$entreprise->id)}}">Desactiver le compte</a>
                                            @else
                                            <a class="badge {{($entreprise->isCompany) ?  'bg-danger' : 'bg-success' }} rounded-3 fw-semibold" href="{{route('Admin.entreprise.enableAccount',$entreprise->id)}}">Activer le compte</a>
                                            @endif                                            
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <a class="badge bg-danger rounded-3 fw-semibold" href="{{route('Admin.entreprise.enableAccount',$entreprise->id)}}">Supprimer le compte</a>                                         
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
        {{$entreprises->links()}}
    </div>
@endsection
