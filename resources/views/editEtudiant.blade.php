@extends('layouts.app')

@section('content')
<center>

    <form  method="POST" action="{{route('etudiant.update' , ['etudiant'=>$etudiant->id])}}" style="width:65%;" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        

    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" value="{{ $etudiant->nom }}" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" value="{{ $etudiant->prenom }}" name="prenom" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="Matricule" class="form-label">Matricule</label>
        <input type="text" value="{{ $etudiant->Matricule }}" name="Matricule" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="cycle" class="form-label">Cycle</label>
        <input type="text" value="{{ $etudiant->cycle }}" value="Licence" name="cycle" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="niveau" class="form-label">Niveau</label>
        <input type="text" value="{{ $etudiant->niveau }}" name="niveau" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="annee_academique" class="form-label">Annee academique</label>
        <input type="text" value="{{ $etudiant->annee_academique }}" value="2022-2023" name="annee_academique" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="annee_academique" class="form-label">Email</label>
        <input type="mail" value="{{ $etudiant->email }}" name="email" class="form-control" >
    </div>

    <div class="mb-3">
    <label for="formFileSm" class="form-label"></label>
    <input class="form-control form-control-sm" name="photo" id="formFileSm" type="file" value="{{ $etudiant->photo }}">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</center>
