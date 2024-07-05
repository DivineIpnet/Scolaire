<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Niveau;
use App\Entities\Classes;
use App\Entities\Apprenant;
use App\Entities\Cours;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Illuminate\Support\Facades\View;

class ClasseController extends Controller
{
    /*public function __construct(){
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
        View::share('ecole', $ecole);
    }*/

    public function ajouterClasse(Request $request, String $idEcol)
    {
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
//dd($ecole);
        $niveaux = EntityManager::getRepository('App\Entities\Niveau')->findBy(array('ecoleid' => $idEcol), array('createdAt' => 'ASC'));

        if ($request->isMethod('POST')) {
//dd('1');
            $request->validate([
                'niveau' => 'required',
                'nom' => 'required',
                'num' => 'nullable',
            ]);
//dd('2');
            $classe = new Classes();
            $classe->setNiveauId(EntityManager::getRepository('App\Entities\Niveau')->findOneBy(array('nom' => $request->niveau)));
            $classe->setNom($request->nom.' '.$request->num);
             EntityManager::persist($classe);
             EntityManager::flush();

            return back()->with('mess', 'Classe enregistré avec succès');
        }


        return view('classe.ajout-classe', compact('niveaux','ecole'));

    }


    public function modifierClasse(Request $request, String $id)
    {

        $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $id));


        if ($request->isMethod('POST')) {

            $request->validate([
                'nom' => 'required',
            ]);

            $classe->setNom($request->nom);
            EntityManager::flush();

            return back()->with('mess', 'Classe modifié avec succès');
        }


        return view('classe.modif-classe', compact(''));

    }

    public function supprimerClasse(String $id)
    {
        $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $id));
        EntityManager::remove($classe);
        EntityManager::flush();

        return back();
    }

    public function lireUneClasse(Request $request, String $id)
    {
        $classe = EntityManager::getRepository('App\Entities\Classes')->findOneBy(array('id' => $id));

        return view(' ', compact('classe'));
    }

    public function lireClassesniv(Request $request, String $idEcol, $idniv)
    {
        //dd($idniv);
        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));
        $classes = EntityManager::getRepository('App\Entities\Classes')->findBy(array('niveauid' => $idniv), array('createdAt' => 'ASC'));
        //dd($classes);

        return view('classe.liste-classe-niv ', compact('classes','ecole', 'idniv'));
    }

    public function lireClasses(Request $request)
    {
        $classes = EntityManager::getRepository('App\Entities\Classes')->findBy(array(), array('createdAt' => 'ASC'));

        return view(' ', compact('classes'));
    }

}
