<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class InstructorAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('instr_name','text');
    }

/*    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid->add('instr_name');
    }    */

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('instr_name');
    }


}

?>