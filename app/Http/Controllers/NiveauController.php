<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Niveau;
use App\Entities\Ecole;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Auth as AuthHelper;
use LaravelDoctrine\ORM\Facades\EntityManager;

class NiveauController extends Controller
{

    public function ajouterNiveau(Request $request, String $idEcol)
    {

        $ecole = EntityManager::getRepository('App\Entities\Ecole')->findOneBy(array('id' => $idEcol));


        if ($request->isMethod('POST')) {

            $request->validate([
                //'ecole' => 'required',
                'nom' => 'required',
                'periode' => 'required',
            ]);

            $niveau = new Niveau();
            $niveau->setEcoleId(EntityManager::getRepository(Ecole::class)->findOneBy(array('id' => $idEcol)));
            $niveau->setNom($request->nom);
            $niveau->setPeriode($request->periode);
            EntityManager::persist($niveau);
            EntityManager::flush();

            return back()->with('mess', 'Niveau enregistré avec succès');
        }

        return view('niveau.ajout-niveau', compact('idEcol'));

    }


    public function modifierNiveau(Request $request, String $id, $idEcole)
    {

        $niveau = EntityManager::getRepository('App\Entities\Niveau')->findOneBy(array('id' => $id));

        if ($request->isMethod('POST')) {

            $request->validate([
                //'ecole' => 'required',
                'nom' => 'required',
            ]);

            //$niveau->setEcoleId(EntityManager::getRepository(Ecole::class)->findOneBy(array('id' => $request->ecole)));
            $niveau->setNom($request->nom);
            
            EntityManager::flush();

            return back()->with('mess', 'Niveau modifié avec succès');
        }


        return view('niveau.modif-niveau', compact(' '));

    }

    public function supprimerNiveau(String $id)
    {
        $niveau = EntityManager::getRepository('App\Entities\Niveau')->findOneBy(array('id' => $id));
        EntityManager::remove($niveau);
        EntityManager::flush();

        return back();
    }

    public function lireUnNiveau(Request $request, String $id)
    {
        $niveau = EntityManager::getRepository('App\Entities\Niveau')->findOneBy(array('id' => $id));

        return view(' ', compact('niveau'));
    }
   
    public function lireNiveaux(Request $request, String $idEcol)
    {
        $niveaux = EntityManager::getRepository('App\Entities\Niveau')->findBy(array('ecoleid' => $idEcol), array('createdAt' => 'ASC'));

        return view('niveau.liste-niveau ', compact('niveaux'));
    }

}
