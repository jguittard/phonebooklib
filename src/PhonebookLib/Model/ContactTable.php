<?php

namespace ZF\Phonebook\Model;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;
use PhonebookLib\Entity\Contact;

/**
 * Class ContactTable
 *
 * @package ZF\Phonebook\Model
 */
class ContactTable extends TableGateway
{
    /**
     * @param array|string|\Zend\Db\Sql\TableIdentifier $table
     * @param AdapterInterface $adapter
     * @param null $features
     */
    public function __construct($table, AdapterInterface $adapter, $features = null)
    {
        $resultSet = new HydratingResultSet(new ClassMethodsHydrator(), new Contact());
        parent::__construct($table, $adapter, $features, $resultSet);
    }

}