<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Niveau;
use App\Entities\Classes;
use App\Entities\Apprenant;
use App\Entities\Enseignant;
use App\Entities\Cours;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class CoursController extends Controller
{

    public function ajouterCours(Request $request, String $idEcol, $idniv)
    {
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
        $clas = EntityManager::getRepository('App\Entities\Classes')->findBy(array('niveauid' => $idniv), array('createdAt' => 'ASC'));
        $ens = EntityManager::getRepository('App\Entities\Enseignant')->findBy(array(), array('createdAt' => 'ASC'));

        if ($request->isMethod('POST')) {

            $request->validate([
                'nom' => 'required',
                'description' => 'required',
                'coeficient' => 'required',
                'classe' => 'required',
                'enseignant' => 'required',
            ]);

            $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $request->classe));
            $enseignant = EntityManager::getRepository('App\Entities\Enseignant')->findOneBy(array('id' => $request->enseignant));

            $cours = new Cours();
            $cours->setNom($request->nom);
            $cours->setDescription($request->description);
            $cours->setCoeficient($request->coeficient);
            $cours->setClasseId($classe);
            $cours->setEnseignantId($enseignant);
             
            EntityManager::persist($cours);
            EntityManager::flush();

            return back()->with('mess', 'Cours enregistré avec succès');
        }


        return view('cours.ajout-cours', compact('ecole', 'clas', 'ens', 'idniv'));

    }


    public function modifierCours(Request $request, String $id)
    {

        $cours = EntityManager::getRepository('App\Entities\Cours')->findOneBy(array('id' => $id));
        $clas = EntityManager::getRepository('App\Entities\Classes')->findBy(array(), array('createdAt' => 'ASC'));
        $ens = EntityManager::getRepository('App\Entities\Enseignant')->findBy(array(), array('createdAt' => 'ASC'));

        if ($request->isMethod('POST')) {

            $request->validate([
                'nom' => 'required',
                'description' => 'required',
                'coeficient' => 'required',
                'classe' => 'required',
                'enseignant' => 'required',
            ]);

            $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $request->classe));
            $enseignant = EntityManager::getRepository('App\Entities\Enseigant')->findOneBy(array('id' => $request->enseignant));
            
            $cours->setNom($request->nom);
            $cours->setDescrition($request->description);
            $cours->setCoeficient($request->coeficient);
            $cours->setClasseId($classe);
            $cours->setEnseignatId($enseignant);
            EntityManager::flush();

            return back()->with('mess', 'Cours modifié avec succès');
        }


        return view('cours.modif-cours', compact('clas', 'ens'));

    }

    public function supprimerCours(String $id)
    {
        $cours = EntityManager::getRepository('App\Entities\Cours')->findOneBy(array('id' => $id));
        EntityManager::remove($cours);
        EntityManager::flush();

        return back();
    }

    public function lireUneCours(Request $request, String $id)
    {
        $cours = EntityManager::getRepository('App\Entities\Cours')->findOneBy(array('id' => $id));

        return view(' ', compact('cours'));
    }
   
    public function lireCours(Request $request)
    {
        $courss = EntityManager::getRepository('App\Entities\Cours')->findBy(array(), array('createdAt' => 'ASC'));

        return view(' ', compact('courss'));
    }

}
