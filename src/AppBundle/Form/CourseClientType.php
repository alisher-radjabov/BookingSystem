<?php
namespace AppBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Repository\courseClassesRepository;

class CourseClientType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        $builder
            ->add('email', EmailType::class)
            ->add('idCourse', EntityType::class, array(
            	'placeholder' => 'Choose a course',
            	'class' => 'AppBundle:Courses',
            	'choice_label' => 'title',
            	'label' => 'Course'
            	)
            )
            ->add('studCount', ChoiceType::class, array(
                    'placeholder' => 'Students count',
                    'choices' => array(
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                        '6' => 6,
                        '7' => 7,
                        '8' => 8,
                        '9' => 9,
                        '10' => 10,
                        ),
                    'disabled' => 'true'
                )
            )
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Booking'
        ));
    }
}

