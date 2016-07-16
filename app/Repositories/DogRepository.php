<?php

namespace ApiArchitect\Repositories;

use ApiArchitect\Entities\Dog;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMInvalidArgumentException;
use ApiArchitect\Abstracts\RepositoryAbstract;

/**
 * Class DogRepository
 *
 * @package ApiArchitect\Repositories\Dog
 * @author James Kirkby <hello@jameskirkby.com>
 */
class DogRepository extends RepositoryAbstract
{

    /**
     * @param array $data
     * @return Dog
     */
    public function create(array $data)
    {
        $dog = new Dog($data['name'],$data['age']);

        $this->_em->persist($dog);
        $this->_em->flush();

        return $dog;
    }

    /**
     * @param int $id
     * @param array $data
     * @return null|object
     */
    public function update($id,array $data)
    {
        $entity = $this->find($id);

        if(key_exists('age',$data)){
            $entity->setAge($data['age']);
        }
        if(key_exists('name',$data)){
            $entity->setName($data['name']);
        }

        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }
}