@extends('layouts.app2')

@section('content')

    @if(session()->get('success'))
      <h4>etudiant enregistre</h4>
    @endif

    <div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Etudiants</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prenom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Matricule</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cycle</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Niveau</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Annee academique</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($etudiants as $etudiant)

                    <tr>
                        <th>{{ $loop-> index + 1 }}</th>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                           
                            <img src="{{asset('storage/'.$etudiant->photo)}}" alt=""class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          
                          </div>
                           
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $etudiant->nom }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $etudiant->prenom }}</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $etudiant->Matricule }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">{{ $etudiant->cycle }}</span>
                          
                        </div>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $etudiant->cycle }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $etudiant->annee_academique }}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $etudiant->email }}</span>
                      </td>
                      <td class="align-middle" style="display: flex;">
                        
                            <a href="{{ route('etudiant.edit' ,[ 'etudiant'=>$etudiant->id  ] )}}" class="btn btn-info mb-0 me-1" style="background: #fff;" title="modifier"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            @if(Auth()->user()->admin)
                            <a class="btn btn-info mb-0 me-1" style="background: #fff;" title="supprimer">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                <form id="form-{{ $etudiant->id }}" action="" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </a>
                            @endif
                            <a href="" class="btn btn-info mb-0 me-1" style="background: #fff;" title="generer">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>

                            </a>

                            <div class="my-auto">
                            <form method="get"action="{{ route('envoi.mail' , $etudiant ) }}" style="background: #fff; width:30px">
                              <input type="hidden" name="email" value="{{ $etudiant->email}}" >
                              <button type="submit" class="btn btn-info mb-0" name="submit"style="border:none; background:#fff;" value=""><i class="fa fa-envelope" aria-hidden="true"></i></button>
                            </form>
                            </div>

                            
                      </td>
                    </tr>
                    @endforeach

                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection