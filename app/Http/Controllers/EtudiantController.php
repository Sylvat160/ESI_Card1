<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index() {
        $etudiants = Etudiant::orderBy('nom', 'asc')->paginate(10);
        return view('listeE', compact('etudiants'));
    }

    

    public function create() {
        return view('createE');
    }

    public function store(Request $request) {
        
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "Matricule" => "required",
            "cycle" => "required",
            "niveau" => "required",
            "annee_academique" => "required",
        ]);
        Etudiant::create($request->all());
        return back()->with('success' , 'Etudiant ajoute avec succes');
    }

    
    
    
}
