<?php

namespace ApiArchitect\Repositories\Dog;

use ApiArchitect\Entities\Dog;
use Doctrine\ORM\EntityManager;
use ApiArchitect\Repositories\AbstractRepository;

/**
 * Class DogRepository
 * @package ApiArchitect\Repositories\Dog
 */
class DogRepository extends AbstractRepository
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
}