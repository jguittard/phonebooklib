<?php

namespace PhonebookLib\Mapper;

use DomainException;

/**
 * Class ContactMapperFactory
 *
 * @package PhonebookLib\Mapper
 */
class ContactMapperFactory
{
    public function __invoke($services)
    {
        if (!$services->has('PhonebookLib\Table\Contact')) {
            throw new DomainException('Cannot create Phonebook\Mapper\Contact; missing PhonebookLib\Table\Contact dependency');
        }
        return new ContactMapper($services->get('PhonebookLib\Table\Contact'));
    }

}