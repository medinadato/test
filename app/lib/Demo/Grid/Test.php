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
                    'filter' => array(
                        'render' => array(
                            'type' => 'number',
                            'range' => 1,
                        ),
                    ),
                ))
                ->addColumn(array(
                    'label' => 'Company',
                    'index' => 'companyName',
                    'filter' => array(
                        'render' => array(
                            'type' => 'text',
                        ),
                    ),
                ))
                ->addColumn(array(
                    'label' => 'Role',
                    'index' => 'roleName',
                    'filter' => array(
                        'render' => array(
                            'type' => 'text',
                            'condition' => array('match' => array('fulltext')),
                        )
                    ),
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
                    'label' => 'Balance',
                    'index' => 'balance',
                    'render' => array(
                        'type' => 'money',
                    ),
                    'filter' => array(
                        'render' => array(
                            'type' => 'number',
                            'range' => 1,
                        ),
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
                    'filter' => array(
                        'render' => array(
                            'type' => 'date',
                            'range' => 1,
                        )
                    ),
                ))
                ->addColumn(array(
                    'label' => 'Last access',
                    'index' => 'lastAccess',
                ))
                ->addColumn(array(
                    'label' => 'Status',
                    'index' => 'statusId',
                    'filter' => array(
                        'render' => array(
                            'type' => 'select',
                            'attributes' => array(
                                'multiOptions' => array(1 => 'Enable', 2 => 'Disabled'),
                            ),
                        ),
                    ),
//                    'condition' => function ($row) {
//                        return ($row['statusId'] != 1);
//                    },
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
                ->setHeaders(true);
//                ->setOrdering(false);
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
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            2 => array(
                'id' => 2,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            7 => array(
                'id' => 18,
                'companyName' => 'Company 18',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
                'lastAccess' => '2013-03-09 14:15:13',
                'balance' => '9655.14',
                'statusId' => 1,
            ),
            8 => array(
                'id' => 25,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            9 => array(
                'id' => 11,
                'companyName' => 'Baconzitos',
                'roleName' => 'Counter',
                'personName' => 'Rodrigo Medina',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            12 => array(
                'id' => 12,
                'companyName' => 'Cheettos',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            17 => array(
                'id' => 118,
                'companyName' => 'Coca Cola',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
                'lastAccess' => '2013-03-09 14:15:13',
                'balance' => '9655.14',
                'statusId' => 1,
            ),
            18 => array(
                'id' => 125,
                'companyName' => 'Hardware Store',
                'roleName' => 'Employee',
                'personName' => 'Lourival',
                'username' => 'lourival@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
        );
    }

}