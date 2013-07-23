<?php

namespace Demo\Grid;

class Test extends \Mgrid\Grid
{

    public function init()
    {

        $source = array(
            0 => array(
                'id' => 1,
                'companyName' => 'Company 01',
                'roleName' => 'Role 01',
                'personName' => 'John Doe',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
            ),
            2 => array(
                'id' => 2,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
            ),
        );

        $this->setSource(new \Mgrid\Source\ArraySource($source))
                ->setId('access-user-grid')
                ->addColumn(array(
                    'label' => $this->getView()->translate('Company'),
                    'index' => 'companyName',
                ))
                ->addColumn(array(
                    'label' => $this->getView()->translate('Role'),
                    'index' => 'roleName'
                ))
                ->addColumn(array(
                    'label' => $this->getView()->translate('Name'),
                    'index' => 'personName',
//                    'filter' => array(
//                        'render' => array(
//                            'type' => 'text',
//                            'condition' => array('match' => array('fulltext')),
//                        )
//                    ),
                ))
                ->addColumn(array(
                    'label' => 'Username',
                    'index' => 'username',
                ))
                ->addColumn(array(
                    'label' => $this->getView()->translate('Birthday'),
                    'index' => 'birthday',
                    'render' => 'date',
                ))
                ->addAction(array(
                    'label' => $this->getView()->translate('Edit'),
                    'controllerName' => 'access_user',
                    'actionName' => 'edit',
                    'pkIndex' => 'id',
                ))
                ->addAction(array(
                    'label' => $this->getView()->translate('Delete'),
                    'controllerName' => 'access_user',
                    'actionName' => 'delete',
                    'pkIndex' => 'id',
                    'cssClass' => 'del',
                ))
                ->setHasOrdering(true);
    }

}