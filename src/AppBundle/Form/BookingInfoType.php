<?php
namespace AppBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
//use Symfony\Component\Form\Extension\Core\Type\EntityType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Form\DataTransformer\CourseClassesTransformer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use AppBundle\Entity\CourseClasses;
use AppBundle\Form\ClassesType;
//use Doctrine\ORM\EntityManager; 
//use Doctrine\ORM\Mapping as ORM;

class BookingInfoType extends AbstractType
{	
    private $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }
	public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        $builder
            ->add('idBooking', CourseClientType::class)
            ->add('idCourseClasses', CollectionType::class, array(
                    'label' => false
                )
            )
            ->add('create', SubmitType::class, array(
                    'disabled' => true
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BookingInfo',
        ));
    }

    public function getName()
    {
         return 'form_client';
    }
}

