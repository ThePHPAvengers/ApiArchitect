<?php

namespace ApiArchitect\Abstracts\Core\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class NodeAbstract
 *
 * @package ApiArchitect\Abstracts\Core\Entities
 *
 * @ORM\Entity
 */
abstract class NodeAbstract
{

    /**
     * @var
     * @TODO custom generated id
     *
     * @ORM\Id
g     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return  $this->id;
    }

    /*
    |--------------------------------------------------------------------------
    | Doctrine Blameable Getters
    |--------------------------------------------------------------------------

    /**
    * @return mixed
    */
    public function getContentChangedBy(){}

    /*
    |--------------------------------------------------------------------------
    | Doctrine IpTracable Getters/Setters
    |--------------------------------------------------------------------------

    /**
     * Sets createdFromIp.
     *
     * @param string $createdFromIp
     *
     * @return $this
     */
    public function setCreatedFromIp($createdFromIp){}

    /**
     * Returns createdFromIp.
     * @return string
     */
    public function getCreatedFromIp(){}

    /**
     * Sets updatedFromIp.
     *
     * @param string $updatedFromIp
     *
     * @return $this
     */
    public function setUpdatedFromIp($updatedFromIp){}

    /**
     * Returns updatedFromIp.
     * @return string
     */
    public function getUpdatedFromIp(){}

    /*
    |--------------------------------------------------------------------------
    | Doctrine SoftDeletes Getters/Setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return DateTime
     */
    public function getDeletedAt(){}

    /**
     * @param \DateTime|null $deletedAt
     * @return mixed
     */
    public function setDeletedAt(\DateTime $deletedAt = null){}

    /**
     * Restore the soft-deleted state
     */
    public function restore(){}

    /**
     * @return bool
     */
    public function isDeleted(){}

    /*
    |--------------------------------------------------------------------------
    | Doctrine Timestamp getters/setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return DateTime
     */
    public function getCreatedAt(){}

    /**
     * @return DateTime
     */
    public function getUpdatedAt(){}

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt){}

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt){}

}