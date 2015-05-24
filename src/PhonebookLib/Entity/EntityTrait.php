<?php

namespace PhonebookLib\Entity;

/**
 * Trait EntityTrait
 *
 * @package PhonebookLib\Entity
 */
trait EntityTrait
{
    /**
     * Entity unique identifier
     *
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}