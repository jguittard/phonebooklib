<?php

namespace PhonebookLib\Model;

use DomainException;
use ZF\Phonebook\Model\ContactTable;

/**
 * Class ContactTableFactory
 *
 * @package PhonebookLib\Model
 */
class ContactTableFactory
{
    /**
     * @param $services
     * @return ContactTable
     */
    public function __invoke($services)
    {
        $db = 'Zend\Db\Adapter\Adapter';
        $table = 'contact';

        if (!$services->has($db)) {
            throw new DomainException(sprintf(
                'Unable to create PhonebookLib\Table\Contact due to missing "%s" service',
                $db
            ));
        }

        return new ContactTable($table, $services->get($db));
    }
}