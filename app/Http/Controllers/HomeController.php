<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $students = Etudiant::orderBy('id', 'desc')->paginate(10);
        $nombreEtudiants = Etudiant::all()->count();
        $recentlyAdded = Etudiant::orderBy('id', 'desc')->first();
        $recentlyAddedFormatLastName = $recentlyAdded['nom' ];
        $recentlyAddedFormatFirstName = $recentlyAdded['prenom' ];
        $paginate=Etudiant::orderBy('nom', 'asc')->paginate(5);
        $nombreSecretaires= User::all()->count() - 1;
        $recentlyAddedSecretaire = User::orderBy('id', 'desc')->first();
        $recentlyAddedFormatLastNameSecretaire = $recentlyAddedSecretaire['name' ];
        
        return view('adminP' , compact('students' , 'nombreEtudiants', 'recentlyAddedFormatLastName', 'recentlyAddedFormatFirstName', 'paginate', 'nombreSecretaires', 'recentlyAddedFormatLastNameSecretaire' ));
    }
    public function secret() {
        $students = Etudiant::orderBy('nom', 'asc')->paginate(10);
        $paginate = Etudiant::orderBy('id', 'desc')->paginate(5);
        $secretaireList= User::orderBy('id' , 'asc')->paginate(5)->except(1);
        $paginateS =User::orderBy('name', 'asc')->paginate(3);
        return view('secretaire' , compact('students', 'paginate' , 'secretaireList' , 'paginateS'));
    }
}
