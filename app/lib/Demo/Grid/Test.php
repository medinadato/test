<?php

namespace Demo\Grid;

/**
 * 
 */
class Test extends \Mgrid\Grid
{

    /**
     * It sets the grid properties
     */
    public function init()
    {
        // data source for tests
        $data_source = $this->getMockResultSet();

        // load the grid
        $this->setSource(new \Mgrid\Source\ArraySource($data_source))
                ->setId('demo-test-grid')
                ->addColumn(array(
                    'label' => 'Cod.',
                    'index' => 'id',
                ))
                ->addColumn(array(
                    'label' => 'Company',
                    'index' => 'companyName',
                ))
                ->addColumn(array(
                    'label' => 'Role',
                    'index' => 'roleName'
                ))
                ->addColumn(array(
                    'label' => 'Name',
                    'index' => 'personName',
                    'filter' => array(
                        'render' => array(
                            'type' => 'text',
                            'condition' => array('match' => array('fulltext')),
                        )
                    ),
                ))
                ->addColumn(array(
                    'label' => 'Username',
                    'index' => 'username',
                ))
                ->addColumn(array(
                    'label' => 'Birthday',
                    'index' => 'birthday',
                    'render' => 'date',
                ))
                ->addAction(array(
                    'label' => 'Edit',
                    'controllerName' => 'access_user',
                    'actionName' => 'edit',
                    'pkIndex' => 'id',
                ))
                ->addAction(array(
                    'label' => 'Delete',
                    'controllerName' => 'access_user',
                    'actionName' => 'delete',
                    'pkIndex' => 'id',
                    'cssClass' => 'del',
                ))
                ->setHeaders(true)
                ->setOrdering(true);
    }

    /**
     * This method is just a mock data, to simulate if it were coming from a database,
     * file, or any other datasource
     * 
     * @return array
     */
    private function getMockResultSet()
    {
        return array(
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
            7 => array(
                'id' => 18,
                'companyName' => 'Company 18',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
            ),
        );
    }

}