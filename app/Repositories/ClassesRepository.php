<?php
namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use DB;
use App\Entities\Niveau;

class ClassesRepository extends EntityRepository
{
	/*    public function classniv(String $idE, $niv)
    {
            $query = $this->_em->createQueryBuilder()
                ->select('n')
                ->from('App\Entities\Niveau', '')
                ->where('n.ecoleid = :idE')
                ->setParameter('idE', $idE)
                ->andWhere('n.nom = :niv')
            	->setParameter('niv', $niv)
                ->getQuery()
                ->getResult();

        return $query;
    }*/
}
