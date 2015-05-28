<?php

namespace PhonebookLib\Mapper;

use DomainException;
use InvalidArgumentException;
use Traversable;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Paginator\Paginator;
use Zend\Stdlib\ArrayUtils;
use PhonebookLib\Entity\EntityInterface;

/**
 * Class ContactMapper
 *
 * @package PhonebookLib\Mapper
 */
class ContactMapper implements MapperInterface
{
    use MapperTrait;

    /**
     * @param array|\Traversable|\stdClass $data
     * @return EntityInterface
     */
    public function create($data)
    {
        if ($data instanceof Traversable) {
            $data = ArrayUtils::iteratorToArray($data);
        }
        if (is_object($data)) {
            $data = (array) $data;
        }

        if (!is_array($data)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid data provided to %s; must be an array or Traversable',
                __METHOD__
            ));
        }
        if (! isset($data['createdAt'])) {
            $data['createdAt'] = date('Y-m-d H:i:s');
        }
        $id = $this->table->insert($data);

        $resultSet = $this->table->select(compact('id'));
        if (0 === count($resultSet)) {
            throw new DomainException('Insert operation failed or did not result in new row', 500);
        }
        return $resultSet->current();
    }

    /**
     * @param string $id
     * @return EntityInterface
     */
    public function fetch($id)
    {
        $resultSet = $this->table->select(compact('id'));
        if (0 === count($resultSet)) {
            throw new DomainException('Contact entry not found', 404);
        }
        return $resultSet->current();
    }

    /**
     * @return Paginator
     */
    public function fetchAll()
    {
        return new Paginator(new DbTableGateway($this->table, null, array('createdAt' => 'DESC')));
    }

    /**
     * @param string $id
     * @param array|\Traversable|\stdClass $data
     * @return EntityInterface
     */
    public function update($id, $data)
    {
        if ($data instanceof Traversable) {
            $data = ArrayUtils::iteratorToArray($data);
        }
        if (is_object($data)) {
            $data = (array) $data;
        }

        if (!is_array($data)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid data provided to %s; must be an array or Traversable',
                __METHOD__
            ));
        }
        if (! isset($data['updatedAt'])) {
            $data['updatedAt'] = date('Y-m-d H:i:s');
        }
        $this->table->update($data, compact('id'));

        $resultSet = $this->table->select(compact('id'));
        if (0 === count($resultSet)) {
            throw new DomainException('Update operation failed or result in row deletion', 500);
        }
        return $resultSet->current();
    }

    /**
     * @param string $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->table->delete(compact('id'));

        if (!$result) {
            return false;
        }

        return true;
    }

}