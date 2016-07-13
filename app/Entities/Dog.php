<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Abstracts\EntityAbstract;

/**
 * Class Dog
 *
 * @ORM\Entity
 * @ORM\Table(name="dogs")
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\Dog\DogRepository")
 */
class Dog extends EntityAbstract
{

    /**
     * @var
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $age;

    /**
     * @ORM\Column(type="string")
     */
    protected $color;

    /**
     * Dog constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }

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
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
}