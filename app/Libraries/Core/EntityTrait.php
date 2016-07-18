<?php

namespace ApiArchitect\Libraries\Core;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class EntityTrait
 *
 * @package ApiArchitect\Libraries
 */
trait EntityTrait
{

    /**
     * @var
     *
     * @ORM\Id
     * @Gedmo\Versioned
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    public $id;

    /**
     * @var
     *
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\OneToOne(targetEntity="Node")
     * @ORM\JoinColumn(name="node_id", referencedColumnName="id")
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    public $nid;

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
    public function getNid()
    {
        return $this->nid;
    }

    /**
     * @param $nid
     * @return $this
     */
    public function setNid($nid)
    {
        $this->nid = $nid;
        return $this;
    }
}