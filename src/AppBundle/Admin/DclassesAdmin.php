<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DclassesAdmin extends AbstractAdmin
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
            ->add('id')
            ->add('title')
            ->add('description')
            ->add('spots')
            ->add('classSched', null, array('associated_property' => 'weekDay'))
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
            ->add('description')
            ->add('spots');

        $subject = $this->getSubject();

        if ($subject->getId()) {
            $formMapper
                ->add('classSched', 'sonata_type_collection', 
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
            ;
        }
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('description')
            ->add('spots')
            ->add('classSched', NULL, array('template' => 'AppBundle:DclassesAdmin:sched.html.twig'))
        ;
    }

    public function prePersist($object)
    {
        foreach ($object->getClassSched() as $classSched) {
            $classSched->setIdClass($object);
        }
    }

    public function preUpdate($object)
    {
        foreach ($object->getClassSched() as $classSched) {
            $classSched->setIdClass($object);
        }
    }    
}
