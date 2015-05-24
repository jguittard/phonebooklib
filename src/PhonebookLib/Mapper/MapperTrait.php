<?php

namespace PhonebookLib\Mapper;

use Zend\Db\TableGateway\TableGateway;

/**
 * Class MapperTrait
 *
 * @package PhonebookLib\Mapper
 */
trait MapperTrait
{
    /**
     * @var TableGateway
     */
    protected $table;

    /**
     * Constructor
     *
     * @param TableGateway $table
     */
    public function __construct(TableGateway $table)
    {
        $this->table = $table;
    }

}