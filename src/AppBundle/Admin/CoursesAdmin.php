<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CoursesAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('id_instr', null, array ( 'label' => 'Instructor'))
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('courseClasses', 'sonata_type_collection', 
                array(
                    'by_reference' => false,
                    'type_options' => array(
                        'delete' => true,
                        )
                    ),
                array(
                'edit' => 'inline',
                'inline' => 'table'
                )
            )

            ->add('idInstr', 'entity', array(
                'class' => 'AppBundle\Entity\Instructor',
                'choice_label' => 'instr_name',
                'label' => 'Instructor',
                )
            )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('id_instr', null, array ( 'label' => 'Instructor', 'associated_property' => 'instrName'))
            ->add('courseClasses', NULL, array('template' => 'AppBundle:CoursesAdmin:courses.html.twig'))
        ;
    }

    public function prePersist($object)
    {
        foreach ($object->getCourseClasses() as $courseClasses) {
            $courseClasses->setIdCourse($object);
        }
    }

    public function preUpdate($object)
    {
        foreach ($object->getCourseClasses() as $courseClasses) {
            $courseClasses->setIdCourse($object);
        }
    }    
}
