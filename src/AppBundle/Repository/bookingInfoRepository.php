<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * course_classesRepository
 */
class bookingInfoRepository extends EntityRepository
{
		public function busySpots($var_idcc, $var_chosendate) {
		//	var_dump($var_chosendate);
		$queryBuilder =  $this->getEntityManager()->createQueryBuilder('bi');

    	$queryBuilder
    		->select('SUM(b.studCount) as studs')
            ->from('AppBundle:BookingInfo','bi')
            ->leftJoin('bi.idBooking', 'b', 'WITH', 'bi.idCourseClasses=?1 AND bi.classDate= ?2')
            ->setParameters(array(1 => (int)$var_idcc, 2 => $var_chosendate))
    	;
    	return $queryBuilder->getQuery()->getSingleScalarResult();
    }    

}