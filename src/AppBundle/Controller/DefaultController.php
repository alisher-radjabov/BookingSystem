<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\CourseClasses;
use AppBundle\Entity\Booking;
use AppBundle\Entity\BookingInfo;
use AppBundle\Form\CourseClientType;
use AppBundle\Form\BookingInfoType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


class DefaultController extends Controller
{	//This function get course id and return min spots and classes of chosen course
    public function courseidAction(Request $request) {



        

        $em = $this->getDoctrine()->getEntityManager();

        // Get the course ID
        $id = $request->request->get('course_id');

        // Get min count of classes spots of the current course
        $minSpots = $em->getRepository('AppBundle:CourseClasses')->minSpots($id);

        // Get classes and descriptions of the current course
        $classes = $em->getRepository('AppBundle:CourseClasses')->findBy(array('idCourse'=>$id), array('dayNumber'=>'asc'));
     
        $html = $this->renderView('AppBundle:Default:class.html.twig', array('classes' => $classes));

        return new JsonResponse(array(
            'html'      => $html,
            'minSpots'   => $minSpots,
        ));
    }

    public function spotsAction(Request $request) {

        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $idcc = $request->request->get('idCourseClasses'); 
        $chosenDate = $request->request->get('chosenDate');

        $chosenDate = \DateTime::createFromFormat('d-m-Y', $chosenDate)->format('Y-m-d');

    //    $spots = $em->getRepository('AppBundle:BookingInfo')->busySpots($idcc, $chosenDate);
        $spots = $em->getRepository('AppBundle:BookingInfo')->busySpots($idcc, $chosenDate);
        return new JsonResponse(array(
            'spots' => $spots
            )
        );

    }

    public function indexAction(Request $request)
    {   
        $bookingInfo = new BookingInfo();

        $form = $this->createForm(BookingInfoType::class, $bookingInfo);
            
        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            $data = $request->request->all();
            $booking = new Booking();
        //Bind AJAX response data 
            foreach ($data as $key => $val){
                $booking->setEmail($val['idBooking']['email']);
                $booking->setStudCount($val['idBooking']['studCount']);
                $course = $em->getRepository('AppBundle:Courses')->find((int) $val['idBooking']['idCourse']);
                $booking->setIdCourse($course);
                $em->persist($booking);
                $count = sizeof($val['idCourseClasses']);

                for ($i = 0; $i < $count; $i++){
                    $bookingInfo = new BookingInfo();

                    $bookingInfo->setIdBooking($booking);

                    $courseClasses = $em->getRepository('AppBundle:CourseClasses')->find((int) $val['idCourseClasses'][$i]);
                    $bookingInfo->setIdCourseClasses($courseClasses);

                    $dateClassDate = new \DateTime($val["classDate"][$i]);
                    $bookingInfo->setClassDate($dateClassDate);
                    $em->persist($bookingInfo);
                }
            }

            $em->flush(); 
            $id = $booking->getId();
            $em->refresh($booking);

            //get info about booking
            $info = $em->getRepository('AppBundle:Booking')->find($id);

            $encoder = new JsonEncoder();
            $normalizer = new ObjectNormalizer();
            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $normalizer = new PropertyNormalizer($classMetadataFactory);
            $serializerDate = new Serializer(array(new DateTimeNormalizer()));
            $serializer = new Serializer([$normalizer, $serializerDate]);

            $infos = $serializer->normalize($info, 'json', ['groups' => ['private']]);

            $html =  $this->renderView('AppBundle:Default:confirm.html.twig', array('infos' => $infos));
           
            return new Response($html);

        } else {
            return $this->render('AppBundle:Default:index.html.twig', array(
            	'form_client' => $form->createView(),
              	)
            );
        }  
    }
}
