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

     public function ajouterEcole(Request $request)
     {
         if ($request->isMethod('POST')) {

             $request->validate([
                 'type' => 'required',
                 'nom' => 'required',
                 'email' => 'required',
                 'telephone' => 'required',
                 'datecrea' => 'required',
                 'ville' => 'required',
             ]);

             $ecole = new Ecole();
             $ecole->setType($request->type);
             $ecole->setNom($request->nom);
             $ecole->setEmail($request->email);
             $ecole->setTelephone($request->telephone);
             $ecole->setVille(EntityManager::getRepository(Ville::class)->findOneBy(array('id' => $request->ville)));
             $ecole->setDateCreat($request->datecrea);
             EntityManager::persist($ecole);
             EntityManager::flush();

             return back()->with('mess', 'Ecole enregistré avec succès');
         }
          $vs = EntityManager::getRepository(Ville::class)->findBy(array(), array('name' => 'ASC'));

         dd($ps);
        //$villes = EntityManager::getRepository(Ville::class)->findBy(array(), array('name' => 'ASC'));

         //return view('ecole.ajout-ecole', compact('villes'));
         return view('ecole.ajout-ecole');

     }



}
