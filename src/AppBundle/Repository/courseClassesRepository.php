<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * course_classesRepository
 */
class courseClassesRepository extends EntityRepository
{
	public function minSpots($idc) {
		$queryBuilder =  $this->getEntityManager()->createQueryBuilder('dc');

    	$queryBuilder
    		->select('MIN(dc.spots) as min_spots')
            ->from('AppBundle:CourseClasses','cc')
            ->leftJoin('cc.idClass', 'dc', 'WITH', 'cc.idCourse=?1')
            ->setParameters(array(1=>$idc))

    	;
    	return $queryBuilder->getQuery()->getSingleScalarResult();
    }    
}
