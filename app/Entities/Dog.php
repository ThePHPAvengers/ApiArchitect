<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use ApiArchitect\Core\Entities\Thing;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Dog
 *
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="dogs")
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\Dog\DogRepository")
 */
class Dog extends Thing
{

    /**
     * @var string
     */
    public $nodeType;

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $age;

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $color;

    /**
     * Dog constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->nodeType = 'Dog';
        $this->name = $name;
        $this->age  = $age;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param $age
     * @return mixed
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $age;
    }
}