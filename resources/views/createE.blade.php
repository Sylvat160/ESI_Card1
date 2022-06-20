@extends('layouts.app')

@section('content')
<center>
<div class="mt-4 alert alert-success">
            @if(session()->get('success'))
                {{session()->get('success')}}
            @else 
                Enregistrement echouer
            
            @endif
        </div>
    <form  method="POST" action="{{route('etudiant.store')}}" style="width:65%;">
        @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" name="prenom" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="Matricule" class="form-label">Matricule</label>
        <input type="text" name="Matricule" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="cycle" class="form-label">Cycle</label>
        <input type="text" value="Licence" name="cycle" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="niveau" class="form-label">Niveau</label>
        <input type="text" name="niveau" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="annee_academique" class="form-label">Annee academique</label>
        <input type="text" value="2022-2023" name="annee_academique" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</center>
@endsection