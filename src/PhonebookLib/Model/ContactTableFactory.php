<?php

namespace PhonebookLib\Model;

use DomainException;

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
        $db = 'DB\PhonebookLib';
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