<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Entities\AbstractEntity;
use LaravelDoctrine\ORM\Auth\Authenticatable as AuthenticatableTrait;
use LaravelDoctrine\ORM\Contracts\Auth\Authenticatable as AuthenticatableInterface;

/**
 * Class User
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <me@jameskirkby.com>
 *
 * @ORM\Entity
 * @Gedmo\Loggable
 * @ORM\Table(name="users")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=true)
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\User\UserRepository")
 */
class User extends AbstractEntity implements AuthenticatableInterface
{

    use AuthenticatableTrait;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=255, unique=false)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=254, unique=true)
     */
    protected $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }
}