<?php

namespace ApiArchitect\Adapters\Auth;

use Doctrine\ORM\EntityManager;
use Tymon\JWTAuth\Providers\User\UserInterface;

/**
 * Class DoctrineUserAdapter
 *
 * @package ApiArchitect\Providers\User
 * @author James Kirkby <hello@jameskirkby.com>
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->em->getId();
    }
}