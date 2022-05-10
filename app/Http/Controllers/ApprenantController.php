<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Apprenant;
//use App\Entities\Marque;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class ApprenantController extends Controller
{

     public function ajouterApprenant(Request $request, String $id)
     {
         if ($request->isMethod('POST')) {

             $request->validate([
                 'nom' => 'required',
                 'prenom' => 'required',
                 'datenais' => 'required',
                 'genre' => 'required',
                 'adresse' => 'required',
             ]);

             $apprenant = new Apprenant();
             $apprenant->setNom($request->nom);
             $apprenant->setPrenom($request->prenom);
             $apprenant->setDateNaissance($request->datenais);
             $apprenant->setGenre($request->genre);
             $apprenant->setAdresse($request->adresse);
             EntityManager::persist($apprenant);
             EntityManager::flush();

             return back()->with('mess', 'Apprenant enregistré avec succès');
         }
        //  $habit = EntityManager::getRepository('App\Entities\Habit')->findOneBy(array('id' => $id));

         return view('apprenant.ajout';
     }



}
