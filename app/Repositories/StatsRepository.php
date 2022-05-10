<?php
namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class StatsRepository extends EntityRepository
{

    public function nombreProfFemme(){
        return $this->_em->createQueryBuilder()
                    ->select('count(f.id)')
                    ->from('App\Entities\Professeur', 'f')
                    ->where("f.sexe = :sexe")
                    ->setParameter('sexe', 'feminin')
                    ->getQuery()
                    ->getSingleScalarResult();
                /* return $this->createQueryBuilder('f')
                            ->where("m.createdAt > ?1")
                            ->andWhere("m.createdAt < ?2")
                            ->setParameter(1, $beginDate)
                            ->setParameter(2, $endDate)
                            ->getQuery()
                            ->getResult(); */

    }

    public function nombreProfHomme(){
         return $this->createQueryBuilder('h')
                            ->where("h.sexe = :sexe")
                            ->setParameter('sexe', 'masculin')
                            ->getQuery()
                            ->getResult()
                            ->count();

    }

    public function ageMinProf(){
            return $this->_em->createQueryBuilder()
                        ->select('p')
                        ->from('App\Entities\Professeur', 'p')
                        ->min('p.age')
                        ->getQuery()
                        ->getResult();

    }

    public function ageMoyenProf(){
            return $this->_em->createQueryBuilder()
                        ->select('p')
                        ->from('App\Entities\Professeur', 'p')
                        ->avg('p.age')
                        ->getQuery()
                        ->getResult();
    }

    public function ageMaxProf(){
            return $this->_em->createQueryBuilder()
                        ->select('p')
                        ->from('App\Entities\Professeur', 'p')
                        ->max('p.age')
                        ->getQuery()
                        ->getResult();
    }

    public function compteCertifieFemme(){

    }

    public function compteCertifieHomme(){

    }

    public function nombreFemmeContacte(){

    }

    public function nombreHommeContacte(){

    }

    public function recommandeFemme(){

    }

    public function recommandeHomme(){

    }

    public function hommeEtoile0(){

    }

    public function hommeEtoile1(){

    }

    public function hommeEtoile2(){

    }

    public function hommeEtoile3(){

    }

    public function hommeEtoile4(){

    }

    public function hommeEtoile5(){

    }

    public function femmeEtoile0(){

    }

    public function femmeEtoile1(){

    }

    public function femmeEtoile2(){

    }

    public function femmeEtoile3(){

    }

    public function femmeEtoile4(){

    }

    public function femmeEtoile5(){

    }

    public function recoursFemme(){

    }

    public function recoursHomme(){

    }

    public function montantAfficherContact(){

    }

    public function montantCertification(){

    }

    public function montantRecours(){

    }

    public function montantPromotion(){

    }

    public function montantAbonnement(){

    }



}

