<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Ecole;
use App\Entities\Ville;
use App\Entities\Pays;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class EcoleController extends Controller
{

    /*public function __construct(){
        $villes = EntityManager::getRepository('App\Entities\Ville')->findBy(array(), array('libelle' => 'ASC'));
        View::share('villes', $villes);
    }*/

    public function index(String $idEcol){
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
        $niveaux = EntityManager::getRepository('App\Entities\Niveau')->findBy(array('ecoleid' => $idEcol), array('createdAt' => 'ASC'));

        return view('ecole.accueil-ecole',compact('ecole', 'niveaux'));
    }

    public function ajouterEcole(Request $request)
    {

        //$villes = EntityManager::getRepository(Ville::class)->getAllVille();
        $villes = EntityManager::getRepository('App\Entities\Ville')->findBy(array(), array('name' => 'ASC'));

        if ($request->isMethod('POST')) {

            $request->validate([
                'type' => 'required',
                'nom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                //'datecrea' => 'required',
                'ville' => 'required',
            ]);

            $ecole = new Ecole();
            $ecole->setType($request->type);
            $ecole->setNom($request->nom);
            $ecole->setEmail($request->email);
            $ecole->setTelephone($request->telephone);
            $ecole->setVille(EntityManager::getRepository(Ville::class)->findOneBy(array('id' => $request->ville)));
            //$ecole->setDateCreat($request->datecrea);
             EntityManager::persist($ecole);
             EntityManager::flush();

            return redirect()->route('accueil.ecole',$ecole->getId())->with('mess', 'Ecole enregistré avec succès');

            //return back()->with('mess', 'Ecole enregistré avec succès');
        }


//dd($villes);

        return view('ecole.ajout-ecole', compact('villes'));
         //return view('ecole.ajout-ecole');

    }


    public function modifierEcole(Request $request, String $id)
    {

        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $id));
        $villes = EntityManager::getRepository(Ville::class)->getAllVille();


        if ($request->isMethod('POST')) {

            $request->validate([
                'type' => 'required',
                'nom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'ville' => 'required',
            ]);

            $ecole->setType($request->type);
            $ecole->setNom($request->nom);
            $ecole->setEmail($request->email);
            $ecole->setTelephone($request->telephone);
            $ecole->setVille(EntityManager::getRepository(Ville::class)->findOneBy(array('id' => $request->ville)));
            EntityManager::flush();

            return back()->with('mess', 'Ecole modifié avec succès');
        }


        return view('ecole.modif-ecole', compact('villes'));

    }

    public function supprimerEcole(String $id)
    {
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $id));
        EntityManager::remove($ecole);
        EntityManager::flush();

        return back();
    }

    public function lireUneEcole(Request $request, String $id)
    {
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $id));

        return view(' ', compact('ecole'));
    }
   
    public function lireEcoles(Request $request)
    {
        $ecoles = EntityManager::getRepository('App\Entities\Ecole')->findBy(array(), array('createdAt' => 'ASC'));

        return view(' ', compact('ecoles'));
    }

}
