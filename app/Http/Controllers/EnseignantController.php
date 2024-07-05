<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Enseignant;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class EnseignantController extends Controller
{

     public function ajouterEnseignant(Request $request, String $idEcol)
     {

        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));

         if ($request->isMethod('POST')) {
           //dd($request);

             $request->validate([
                 'nom' => 'required',
                 'prenom' => 'required',
                 'datenais' => 'required',
                 'genre' => 'required',
                 'adresse' => 'required',
                 'situation' => 'required',
                 'telephone' => 'required',
                 'email' => 'required',
                 
             ]);
 //dd('2');
             $enseignant = new Enseignant();
             $enseignant->setNom($request->nom);
             $enseignant->setPrenoms($request->prenom);
             $enseignant->setDateNaissance($request->datenais);
             $enseignant->setGenre($request->genre);
             $enseignant->setAdresse($request->adresse);
             $enseignant->setSituationMatrimoniale($request->situation);
             $enseignant->setTelephone($request->telephone);
             $enseignant->setEmail($request->email);
             EntityManager::persist($enseignant);
             EntityManager::flush();

             return back()->with('mess', 'Enseignant enregistré avec succès');
        }

         return view('enseignant.ajout-enseignant', compact('idEcol'));
    }


    public function modifierEnseignant(Request $request, String $id)
    {
        $enseignant = EntityManager::getRepository('App\Entities\Enseignant')->findOneBy(array('id' => $id));

        if ($request->isMethod('POST')) {

            $request->validate([
               'nom' => 'required',
               'prenom' => 'required',
               'datenais' => 'required',
               'genre' => 'required',
               'adresse' => 'required',
               'telephone' => 'required',
                'email' => 'required',
                'situation' => 'required',
             ]);

            $enseignant->setNom($request->nom);
            $enseignant->setPrenom($request->prenom);
            $enseignant->setDateNaissance($request->datenais);
            $enseignant->setGenre($request->genre);
            $enseignant->setAdresse($request->adresse);
            $enseignant->setTelephone($request->telephone);
            $enseignant->setEmail($request->email);
            $enseignant->setSituationMatrimoniale($request->situation);
            EntityManager::flush();

            return back()->with('mess', 'Enseignant modifié avec succès');
        }


        return view('enseignant.modif-enseignant', compact(''));

    }



    public function supprimerEnseignant(String $id)
    {
        $enseignant = EntityManager::getRepository('App\Entities\Enseignant')->findOneBy(array('id' => $id));
        EntityManager::remove($enseignant);
        EntityManager::flush();

        return back();
    }

    public function lireUnEnseignant(Request $request, String $id)
    {
        $enseignant = EntityManager::getRepository('App\Entities\Enseignant')->findOneBy(array('id' => $id));

        return view(' ', compact('enseignant'));
    }
   
    public function lireEnseignants(Request $request)
    {
        $enseignants = EntityManager::getRepository('App\Entities\Enseignant')->findBy(array(), array('createdAt' => 'ASC'));

        return view(' ', compact('enseignants'));
    }
}
