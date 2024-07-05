<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Evaluation;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class EnvaluationController extends Controller
{

     public function ajouterEvaluation(Request $request)
     {
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
 
             $evaluation = new Evaluation();
             $evaluation->setNom($request->nom);
             $evaluation->setPrenom($request->prenom);
             
             EntityManager::persist($evaluation);
             EntityManager::flush();

             return back()->with('mess', 'Evaluation enregistré avec succès');
        }

         return view('evaluation.ajout-evaluation', compact(''));
    }


    public function modifierEvaluation(Request $request, String $id)
    {
        $evaluation = EntityManager::getRepository('App\Entities\Evaluation')->findOneBy(array('id' => $id));

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

            $evaluation->setNom($request->nom);
            EntityManager::flush();

            return back()->with('mess', 'Evaluation modifié avec succès');
        }


        return view('evaluation.modif-evaluation', compact(''));

    }



    public function supprimerEvaluation(String $id)
    {
        $evaluation = EntityManager::getRepository('App\Entities\Evaluation')->findOneBy(array('id' => $id));
        EntityManager::remove($evaluation);
        EntityManager::flush();

        return back();
    }

    public function lireUnEvaluation(Request $request, String $id)
    {
        $evaluation = EntityManager::getRepository('App\Entities\Evaluation')->findOneBy(array('id' => $id));

        return view(' ', compact('evaluation'));
    }
   
    public function lireEvaluations(Request $request)
    {
        $evaluations = EntityManager::getRepository('App\Entities\Evaluation')->findBy(array(), array('createdAt' => 'ASC'));

        return view(' ', compact('evaluations'));
    }
}
