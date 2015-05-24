<?php
return [
    'service_manager' => [
        'factories' => [
            'PhonebookLib\Table\Contact' => 'Phonebook\Model\ContactTableFactory',
            'PhonebookLib\Mapper\Contact' => 'PhonebookLib\Mapper\ContactMapperFactory',
        ]
    ],
];