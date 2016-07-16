<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Abstracts\EntityAbstract;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;

/**
 * Class Role
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <me@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="role", indexes={@ORM\Index(name="search_idx", columns={"name"})})
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\User\RoleRepository")
 */
class Role extends EntityAbstract
{

    /**
     * @ORM\Column(type="string", unique=true, nullable=false)
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}