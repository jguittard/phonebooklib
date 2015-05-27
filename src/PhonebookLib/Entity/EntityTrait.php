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

    /**
     * @param int $id
     * @return EntityInterface
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}