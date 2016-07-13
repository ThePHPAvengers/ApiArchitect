<?php

namespace ApiArchitect\Adapters\User;

use Doctrine\ORM\EntityManager;
use Tymon\JWTAuth\Providers\User\UserInterface;

/**
 * Class DoctrineUserAdapter
 * @package ApiArchitect\Providers\User
 */
class DoctrineUserAdapter implements UserInterface
{

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * DoctrineUserAdapter constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function getBy($key, $value)
    {
        return $this->find($value);
    }

    public function getId()
    {
        return $this->getId();
    }
}