<?php

namespace Demo\Grid;

/**
 * 
 */
class Test extends \Mgrid\Grid
{
    /**
     * Status 
     */

    const ENABLED = 1;
    const DISABLED = 2;

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
                    'render' => array(
                        'type' => 'text',
                        'prefix' => 'No. ',
                    ),
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
                    'align' => 'right',
                    'render' => 'money',
                    'order' => false,
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
                    'render' => array(
                        'type' => 'link',
                        'href' => 'http://www.mdnsolutions.com',
                    ),
                ))
                ->addColumn(array(
                    'label' => 'Birthday',
                    'index' => 'birthday',
                    'align' => 'center',
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
                    'render' => 'dateTime',
                ))
                ->addColumn(array(
                    'label' => 'Status',
                    'index' => 'statusId',
                    'render' => 'EnableOrDisabled',
                    'filter' => array(
                        'render' => array(
                            'type' => 'select',
                            'attributes' => array(
                                'multiOptions' => array(
                                    Test::ENABLED => 'Enable',
                                    Test::DISABLED => 'Disabled',
                                ),
                            ),
                        ),
                    ),
                ))
                ->addAction(array(
                    'label' => 'Details',
                    'href' => 'http://mgrid.mdnsolutions.com?your_action=details',
                    'target' => '_blank',
                    'params' => array(
                        'myid' => 'id',
                    ),
                    'cssClass' => 'view',
                ))
                ->addAction(array(
                    'label' => 'Edit',
                    'href' => '?your_action=edit',
                    'params' => array(
                        'myid' => 'id',
                        'edit' => 1,
                    ),
                ))
                ->addAction(array(
                    'label' => 'Disable Record',
                    'href' => '?your_action=disable_status',
                    'params' => array(
                        'myid' => 'id',
                        'disable' => 'yes',
                    ),
                    'condition' => function ($row) {
                        return ($row['statusId'] == Test::ENABLED);
                    },
                ))
                ->addAction(array(
                    'label' => 'Enable Record',
                    'href' => '?your_action=disable_status',
                    'params' => array(
                        'myid' => 'id',
                        'enable' => 'yes',
                    ),
                    'condition' => function ($row) {
                        return ($row['statusId'] == Test::DISABLED);
                    },
                ))
                ->addAction(array(
                    'label' => 'Delete',
                    'href' => '?your_action=delete',
                    'cssClass' => 'del',
                    'params' => array(
                        'myid' => 'id',
                        'delete' => '1',
                    ),
                ));
//                ->setFilter(false);
//                ->setPager(false);
//                ->setHeader(false);
//                ->setOrder(false);
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
                'balance' => '125.09',
                'statusId' => 1,
            ),
            1 => array(
                'id' => 8,
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
                'companyName' => 'Butter Factory',
                'roleName' => 'Role 02',
                'personName' => 'Dorival Manteiga',
                'username' => 'manteiga@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '82458.12',
                'statusId' => 2,
            ),
            4 => array(
                'id' => 5,
                'companyName' => 'Company 02',
                'roleName' => 'Manager',
                'personName' => 'Roman Duncan',
                'username' => 'rduncan@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '6858.12',
                'statusId' => 2,
            ),
//            5 => array(
//                'id' => 6,
//                'companyName' => 'Company 02',
//                'roleName' => 'Role 02',
//                'personName' => 'Mary Doe',
//                'username' => 'marydue@mdnsolutions.com',
//                'birthday' => '1955-06-10',
//                'lastAccess' => '2012-08-09 12:15:13',
//                'balance' => '82458.12',
//                'statusId' => 2,
//            ),
            6 => array(
                'id' => 7,
                'companyName' => 'The Little Market',
                'roleName' => 'Manager',
                'personName' => 'Daniel Lima',
                'username' => 'dlima@mdnsolutions.com',
                'birthday' => '1969-12-10',
                'lastAccess' => '2007-08-05 12:15:13',
                'balance' => '2458.12',
                'statusId' => 2,
            ),
            7 => array(
                'id' => 10,
                'companyName' => 'Company 02',
                'roleName' => 'Role 02',
                'personName' => 'Mary Doe',
                'username' => 'marydue@mdnsolutions.com',
                'birthday' => '1955-06-10',
                'lastAccess' => '2012-08-09 12:15:13',
                'balance' => '7542.12',
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
                'id' => 2,
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
                'personName' => 'Vinicius Souza',
                'username' => 'labuzin@mdnsolutions.com',
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
                'balance' => '82458.1',
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
                'id' => 20,
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
                'id' => 16,
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
                'companyName' => 'Boomerang LTDA',
                'roleName' => 'Employee',
                'personName' => 'Matt John',
                'username' => 'mjohn@mdnsolutions.com',
                'birthday' => '1951-10-18',
                'lastAccess' => '2012-11-11 09:18:58',
                'balance' => '12.14',
                'statusId' => 1,
            ),
            33 => array(
                'id' => 37,
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