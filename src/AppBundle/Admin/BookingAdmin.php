<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BookingAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')
            ->add('studCount')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('email')
            ->add('studCount')
            ->add('idCourse', 'sonata_type_collection', array(
                'associated_property'=>'title',
                'label' => 'Course title'
                )
            )
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
            ->add('email')
            ->add('studCount')
            ->add('bookingInfo', 'sonata_type_collection', 
                array(
                    'by_reference' => false,
                    'btn_add' => false,
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

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('email')
            ->add('studCount')
            ->add('bookingInfo', NULL, array('template' => 'AppBundle:BookingAdmin:booking.html.twig'))
            
        ;
    }
}
