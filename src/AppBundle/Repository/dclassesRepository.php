<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * course_classesRepository
 */
class dclassesRepository extends EntityRepository
{
	public function minSpotsQueryBuilder($published=true) {
    	$queryBuilder =  $this->getEntityManager()->createQueryBuilder('dc');

    	$queryBuilder
    		->select('MIN(dc.spots) as min_spots')
            ->from('AppBundle:Dclasses','dc')
            ->leftJoin('dc.id', 'cc', 'WITH', 'cc.idCourse=2')

    	;
//    	var_dump($queryBuilder->getDQL());
    	return $queryBuilder->getQuery()->getOneOrNullResult();;
    	//var_dump($queryBuilder->getDQL());
	}
}
