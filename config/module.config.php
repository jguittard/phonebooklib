<?php
return [
    'service_manager' => [
        'factories' => [
            'PhonebookLib\Table\Contact' => 'PhonebookLib\Model\ContactTableFactory',
            'PhonebookLib\Mapper\Contact' => 'PhonebookLib\Mapper\ContactMapperFactory',
        ]
    ],
];