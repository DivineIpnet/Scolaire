<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Apprenant;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class ApprenantController extends Controller
{

     public function ajouterApprenant(Request $request, String $idEcol, $idClas)
     {
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
        $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $idClas));

         if ($request->isMethod('POST')) {
//dd('1');
             $request->validate([
                 'nom' => 'required',
                 'prenom' => 'required',
                 'datenais' => 'required',
                 'genre' => 'required',
                 'adresse' => 'required',
                 'telephone' => 'required',
             ]);
//dd('2');
             $apprenant = new Apprenant();
             $apprenant->setClasseId($classe);
             $apprenant->setNom($request->nom);
             $apprenant->setPrenom($request->prenom);
             $apprenant->setDateNaissance(date('Y-m-d',strtotime($request->datenais)));
             $apprenant->setGenre($request->genre);
             $apprenant->setAdresse($request->adresse);
             $apprenant->setTelephone($request->telephone);
             EntityManager::persist($apprenant);
             EntityManager::flush();

             return back()->with('mess', 'Apprenant enregistré avec succès');
        }

         return view('apprenant.ajout-apprenant', compact('ecole', 'classe'));
    }


    public function modifierApprenant(Request $request, String $id)
    {
        $apprenant = EntityManager::getRepository('App\Entities\Apprenant')->findOneBy(array('id' => $id));

        if ($request->isMethod('POST')) {

            $request->validate([
               'nom' => 'required',
               'prenom' => 'required',
               'datenais' => 'required',
               'genre' => 'required',
               'adresse' => 'required',
               'telephone' => 'required',
             ]);

            $apprenant->setNom($request->nom);
            $apprenant->setPrenom($request->prenom);
            $apprenant->setDateNaissance($request->datenais);
            $apprenant->setGenre($request->genre);
            $apprenant->setAdresse($request->adresse);
            $apprenant->setTelephone($request->telephone);
            EntityManager::flush();

            return back()->with('mess', 'Apprenant modifié avec succès');
        }


        return view('apprenant.modif-apprenant', compact(''));

    }



    public function supprimerApprenant(String $id)
    {
        $apprenant = EntityManager::getRepository('App\Entities\Apprenant')->findOneBy(array('id' => $id));
        EntityManager::remove($apprenant);
        EntityManager::flush();

        return back();
    }

    public function lireUnApprenant(Request $request, String $id)
    {
        $apprenant = EntityManager::getRepository('App\Entities\Apprenant')->findOneBy(array('id' => $id));

        return view(' ', compact('apprenant'));
    }
  

    public function lireApprenantsclas(Request $request, String $idEcol, $idClas)
    {
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
        $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $idClas));
        $apprenants = EntityManager::getRepository('App\Entities\Apprenant')->findBy(array('classeid' => $idClas ), array('createdAt' => 'ASC'));

        return view('apprenant.liste-apprenant-class ', compact('apprenants', 'classe', 'ecole'));
    }

    public function lireApprenants(Request $request)
    {
        $apprenants = EntityManager::getRepository('App\Entities\Apprenant')->findBy(array(), array('createdAt' => 'ASC'));

        return view(' ', compact('apprenants'));
    }
}
