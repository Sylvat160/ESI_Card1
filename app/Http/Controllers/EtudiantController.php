<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EtudiantController extends Controller
{
    public function create()
    {
        return view('createE');
    }

    public function listeEtudiant(){
        $etudiants = Etudiant::orderBy('id', 'desc')->paginate(10);
        return view('listeE' , compact('etudiants'));
    }
    public function store(Request $request){
        
        // $name = Storage::disk('local')->put('avatar' , $request->image);
        // dd($name);
        $filename = $request->nom. '.' .$request->photo->extension();
        // $request->file('nomInput')->storeAS('nomDossier',  $request->nom, 'public');
        
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "Matricule" => "required",
            "cycle" => "required",
            "niveau" => "required",
            "annee_academique" => "required",
            "email" => "required",
            'photo'=> 'required|image' ,
        ]);
        $img_path = $request->photo->storeAs('PhotoEtudiant' , $filename , 'public');
        Etudiant::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "Matricule" => $request->Matricule,
            "cycle" => $request->cycle,
            "niveau" => $request->niveau,
            "annee_academique" => $request->annee_academique,
            "email" => $request->email,
            'photo'=> $img_path,
        ]);
        return back()->with('success' , 'Etudiant ajoute avec succes');
        // return redirect()->route('etudiant.liste')->with('success' , 'Etudiant ajoute avec succes');
    }

    public function send(){
        
        return view();
    }
}
