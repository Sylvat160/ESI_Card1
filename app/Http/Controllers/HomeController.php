<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Mail\EtudiantMarkdownMail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
        $students = Etudiant::orderBy('id', 'desc')->paginate(10);
        $nombreEtudiants = Etudiant::all()->count();
        $recentlyAdded = Etudiant::orderBy('id', 'desc')->first();
        $recentlyAddedFormatLastName = $recentlyAdded['nom' ];
        $recentlyAddedFormatFirstName = $recentlyAdded['prenom' ];
        $paginate=Etudiant::orderBy('nom', 'asc')->paginate(5);
        $nombreSecretaires= User::all()->count() - 1;
        $recentlyAddedSecretaire = User::orderBy('id', 'desc')->first();
        $recentlyAddedFormatLastNameSecretaire = $recentlyAddedSecretaire['name' ];
        $etudiants = Etudiant::orderBy('id', 'desc')->paginate(10);

        return view('home', compact('students' , 'nombreEtudiants', 'recentlyAddedFormatLastName', 'recentlyAddedFormatFirstName', 'paginate', 'nombreSecretaires', 'recentlyAddedFormatLastNameSecretaire' , 'etudiants'));
    }

    public function admin()
    {
        if(! Gate::allows('access-admin')){
            abort('403');
        }

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




    // -------------------------------------------------------------
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

    public function send(Request $request){
        Mail::to($request->email)->send(new EtudiantMarkdownMail());
        
        return back()->with('success' , 'Mail envoye !');
    }
}
