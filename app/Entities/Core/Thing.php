<?php

namespace ApiArchitect\Entities\Core;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Contracts\Core\SemanticContract;
use ApiArchitect\Abstracts\Core\Entities\EntityAbstract;

/**
 * Class Thing
 *
 * @package ApiArchitect\Entities
 */
class Thing extends EntityAbstract implements SemanticContract
{

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $name;

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
}