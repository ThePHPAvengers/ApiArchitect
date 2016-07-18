<?php

namespace ApiArchitect\Repositories\Core;

use ApiArchitect\Entities\Core\User;
use ApiArchitect\Abstracts\Core\Repositories\RepositoryAbstract;

/**
 * Class UserRepository
 *
 * @package ApiArchitect\Repositories\Dog
 * @author James Kirkby <hello@jameskirkby.com>
 */
class UserRepository extends RepositoryAbstract
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

    /**
     * @param int $id
     * @param array $data
     * @return null|object
     */
    public function update($id,array $data)
    {
        $entity = $this->find($id);

        if(key_exists('name',$data)){
            $entity->setName($data['name']);
        }
        if(key_exists('email',$data)){
            $entity->setEmail($data['email']);
        }

        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }
}