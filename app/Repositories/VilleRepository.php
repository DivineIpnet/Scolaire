<?php
namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Facades\EntityManager;

class VilleRepository extends EntityRepository
{
    public function getAllVille()
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('v.name')
            ->from('App\Entities\Ville', 'v')
            ->orderBy('v.name', 'ASC')
            ->getQuery()
            ->getResult();

        return $qb;

        //return response()->json([  'qb' => $qb ]);

    }

   /* public function paysVille($pays)
    {
        $villes = EntityManager::getRepository('App\Entities\Ville')->findBy(array('pays' => $pays),array('name'=> 'ASC'));

        return $villes;
    }*/
}
