<?php

namespace ApiArchitect\Entities\Log;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Contracts\Log\DoctrineLogContract;
use ApiArchitect\Abstracts\Log\Entities\LogEntityAbstract;

/**
 * Gedmo\Loggable\Entity\LogEntry
 *
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="ext_log_entries", indexes={@ORM\Index(name="search_idx", columns={"object_id"})})
 * @ORM\Entity(repositoryClass="Gedmo\Loggable\Entity\Repository\LogEntryRepository")
 */
class DoctrineLog extends LogEntityAbstract implements DoctrineLogContract
{
    /**
     * @var string $action
     *
     * @ORM\Column(length=8)
     */
    protected $action;

    /**
     * @var string $objectId
     *
     * @ORM\Column(length=64, nullable=true)
     */
    protected $objectId;

    /**
     * @var string $objectClass
     *
     * @ORM\Column(length=255)
     */
    protected $objectClass;

    /**
     * @var integer $version
     *
     * @ORM\Column(type="integer")
     */
    protected $version;

    /**
     * @var string $data
     *
     * @ORM\Column(type="array", nullable=true)
     */
    protected $data;

    /**
     * @var string $data
     *
     * @ORM\Column(length=255, nullable=true)
     */
    protected $username;

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set action
     *
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Get object class
     *
     * @return string
     */
    public function getObjectClass()
    {
        return $this->objectClass;
    }

    /**
     * Set object class
     *
     * @param string $objectClass
     */
    public function setObjectClass($objectClass)
    {
        $this->objectClass = $objectClass;
    }

    /**
     * Get object id
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set object id
     *
     * @param string $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set data
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Set current version
     *
     * @param integer $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get current version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}