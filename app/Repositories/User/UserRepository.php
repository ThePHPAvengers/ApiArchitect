<?php

namespace ApiArchitect\Repositories\User;

use ApiArchitect\Entities\User;
use Doctrine\ORM\EntityManager;
use ApiArchitect\Repositories\AbstractRepository;

/**
 * Class UserRepository
 * @package ApiArchitect\Repositories\Dog
 */
class UserRepository extends AbstractRepository
{

    /**
     * Get the identifier that will be stored in the subject claim of the JWT
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getId();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    /**
     * @param array $User
     * @return User
     */
    public function create(array $User)
    {
        $user = new User();

        $user->setName($User['name']);
        $user->setEmail($User['email']);
        $user->setPassword(bcrypt($User['password']));

        $this->_em->persist($user);
        $this->_em->flush();

        //@TODO try catch check if email is unique value then return a formatted response at moment returns geenri sql error

        return $user;
    }
}