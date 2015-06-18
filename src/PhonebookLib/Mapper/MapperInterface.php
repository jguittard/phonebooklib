<?php

namespace PhonebookLib\Mapper;

use Zend\Paginator\Paginator;
use PhonebookLib\Entity\EntityInterface;

/**
 * Interface MapperInterface
 *
 * @package PhonebookLib\Mapper
 */
interface MapperInterface
{
    /**
     * @param array|\Traversable|\stdClass $data
     * @return EntityInterface
     */
    public function create($data);

    /**
     * @param string $id
     * @return EntityInterface
     */
    public function fetch($id);

    /**
     * @param array $params
     * @return Paginator
     */
    public function fetchAll(array $params);

    /**
     * @param string $id
     * @param array|\Traversable|\stdClass $data
     * @return EntityInterface
     */
    public function update($id, $data);

    /**
     * @param string $id
     * @return bool
     */
    public function delete($id);
}