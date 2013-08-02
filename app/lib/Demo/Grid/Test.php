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
                    'ordering' => false,
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
                ));
//                ->setPager(false);
//                ->setHeaders(false);
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
            1 => array(
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
            2 => array(
                'id' => 3,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            3 => array(
                'id' => 4,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            4 => array(
                'id' => 5,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            5 => array(
                'id' => 6,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            6 => array(
                'id' => 7,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            8 => array(
                'id' => 9,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            9 => array(
                'id' => 10,
                'companyName' => 'Company 18',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
                'lastAccess' => '2013-03-09 14:15:13',
                'balance' => '9655.14',
                'statusId' => 1,
            ),
            10 => array(
                'id' => 11,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            11 => array(
                'id' => 12,
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
                'id' => 13,
                'companyName' => 'Cheettos',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            13 => array(
                'id' => 14,
                'companyName' => 'Cheettos',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            14 => array(
                'id' => 15,
                'companyName' => 'Company 01',
                'roleName' => 'Role 01',
                'personName' => 'John Doe',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            15 => array(
                'id' => 16,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            16 => array(
                'id' => 17,
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
                'id' => 18,
                'companyName' => 'Company 01',
                'roleName' => 'Role 01',
                'personName' => 'John Doe',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            18 => array(
                'id' => 19,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),            
            19 => array(
                'id' => 20,
                'companyName' => 'Company 01',
                'roleName' => 'Role 01',
                'personName' => 'John Doe',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            20 => array(
                'id' => 21,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            21 => array(
                'id' => 22,
                'companyName' => 'Company 18',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
                'lastAccess' => '2013-03-09 14:15:13',
                'balance' => '9655.14',
                'statusId' => 1,
            ),
            22 => array(
                'id' => 23,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            23 => array(
                'id' => 24,
                'companyName' => 'Baconzitos',
                'roleName' => 'Counter',
                'personName' => 'Rodrigo Medina',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            24 => array(
                'id' => 25,
                'companyName' => 'Cheettos',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            25 => array(
                'id' => 26,
                'companyName' => 'Coca Cola',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
                'lastAccess' => '2013-03-09 14:15:13',
                'balance' => '9655.14',
                'statusId' => 1,
            ),
            26 => array(
                'id' => 27,
                'companyName' => 'Hardware Store',
                'roleName' => 'Employee',
                'personName' => 'Lourival',
                'username' => 'lourival@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            
            27 => array(
                'id' => 28,
                'companyName' => 'Company 01',
                'roleName' => 'Role 01',
                'personName' => 'John Doe',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            28 => array(
                'id' => 29,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            29 => array(
                'id' => 30,
                'companyName' => 'Company 18',
                'roleName' => 'Empresario',
                'personName' => 'Marcelo Raposo',
                'username' => 'raposo@mdnsolutions.com',
                'birthday' => '1968-09-11',
                'lastAccess' => '2013-03-09 14:15:13',
                'balance' => '9655.14',
                'statusId' => 1,
            ),
            30 => array(
                'id' => 31,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            31 => array(
                'id' => 34,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            32 => array(
                'id' => 33,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            
            33 => array(
                'id' => 34,
                'companyName' => 'Company 25',
                'roleName' => 'Employee',
                'personName' => 'Anacleto',
                'username' => 'anacleto@mdnsolutions.com',
                'birthday' => '1991-09-01',
                'lastAccess' => '2001-09-11 09:18:25',
                'balance' => '4263',
                'statusId' => 1,
            ),
            34 => array(
                'id' => 35,
                'companyName' => 'Baconzitos',
                'roleName' => 'Counter',
                'personName' => 'Rodrigo Medina',
                'username' => 'johndue@mdnsolutions.com',
                'birthday' => '1986-01-03',
                'lastAccess' => '2013-01-05 00:15:13',
                'balance' => '158.12',
                'statusId' => 1,
            ),
            35 => array(
                'id' => 36,
                'companyName' => 'Cheettos',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
        );
    }

}