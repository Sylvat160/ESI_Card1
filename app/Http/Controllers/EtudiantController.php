<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

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
}
