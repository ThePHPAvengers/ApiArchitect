<?php

namespace ApiArchitect\Repositories;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Collection;
use ApiArchitect\Repositories\RepositoryInterface;

/**
 * Class AbstractRepository
 * @package ApiArchitect\Repositories
 */
abstract class AbstractRepository extends EntityRepository implements RepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    abstract public function create(array $data);
}