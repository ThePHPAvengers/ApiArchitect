<?php

namespace ApiArchitect\Abstracts;

use Doctrine\ORM\Cache;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Util\ClassUtils;
use Gedmo\Mapping\Annotation as Gedmo;
use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Mappings as ACL;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use ApiArchitect\Contracts\EntityContract;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceable;

/**
 * Class AbstractNode
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\MappedSuperclass
 */
abstract class EntityAbstract implements EntityContract
{

    use IpTraceable, SoftDeletes, Timestamps;

    /*
    |--------------------------------------------------------------------------
    | Doctrine Loggable Attributes
    |--------------------------------------------------------------------------
    |
    | Class annotation
    | @Gedmo\Loggable
    |
    | Property annotation
    | @Gedmo\Versioned
    |
    */

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
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", nullable=false, columnDefinition="ENUM('HttpLog', 'Dog')")
     */
    protected $contentType;

    /*
    |--------------------------------------------------------------------------
    | Doctrine Blameable Attributes
    |--------------------------------------------------------------------------
    |
    | Blameable behavior will automate the update of username
    | or user reference fields on your Entities or Documents.
    | It works through annotations and can update fields on creation, update,
    | property subset update, or even on specific property value change.
    |
    | Property annotation
    | @Gedmo\Mapping\Annotation\Blameable
    |
    | @SEE http://www.laraveldoctrine.org/docs/1.1/extensions/blameable
    |
    */

    /**
     * @var string $createdBy
     *
     * @ORM\Column(type="string", nullable=false)
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\ManyToOne(targetEntity="ApiArchitect\Entities\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var string $updatedBy
     *
     * @ORM\Column(type="string")
     * @Gedmo\Blameable(on="update")
     * @Gedmo\IpTraceable(on="update")
     * @ORM\ManyToOne(targetEntity="ApiArchitect\Entities\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    protected $updatedBy;

    /**
     * @var string $contentChangedBy
     *
     * @Gedmo\Blameable(on="change", field={"id","name","email"})
     * @ORM\Column(name="content_changed_by", type="string", nullable=true)
     */
    protected $contentChangedBy;

    /*
    |--------------------------------------------------------------------------
    | Doctrine IpTracable Attributes
    |--------------------------------------------------------------------------
    |
    | IpTraceable behavior will automate the update of IP trace on your Entities
    | or Documents. It works through annotations and can update fields on creation,
    | update, property subset update, or even on specific property value change.
    |
    | Property annotation
    | @Gedmo\Mapping\Annotation\IpTraceable
    |
    | @SEE http://www.laraveldoctrine.org/docs/1.1/extensions/iptraceable
    |
    */

    /**
     * @var string $createdFromIp
     *
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $createdFromIp;

    /**
     * @var string $updatedFromIp
     *
     * @Gedmo\Blameable(on="update")
     * @Gedmo\IpTraceable(on="update")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $updatedFromIp;

    /**
     * @var datetime $contentChangedFromIp
     *
     * @Gedmo\IpTraceable(on="change", field={"name", "password", "email", "id"})
     * @ORM\Column(name="content_changed_by_ip", type="string", nullable=true, length=45)
     * @Gedmo\Blameable(on="create")
     */
    protected $contentChangedFromIp;

    /*
    |--------------------------------------------------------------------------
    | Doctrine SoftDeletes Attributes
    |--------------------------------------------------------------------------
    |
    | Class annotation
    | @Gedmo\Mapping\Annotation\SoftDeleteable
    |
    | SoftDeleteable behavior allows to "soft delete" objects, filtering them at
    | SELECT time by marking them as with a timestamp, but not explicitly removing
    | them from the database.
    |
    */

    /**
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    protected $deletedAt;

    /*
    |--------------------------------------------------------------------------
    | Doctrine Timestamp Attributes
    |--------------------------------------------------------------------------
    |
    | Property annotation
    | @Gedmo\Mapping\Annotation\Timestampable
    |
    | Timestamps allows you to automatically record the time of certain events
    | against your entities. This can be used to provide similar behaviour to the
    | timestamps feature in Laravel's Eloquent ORM.
    |
    */

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;

    /**
     * @var \DateTime $updated
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;

    /**
     * @ORM\Column(name="content_changed", type="datetime", nullable=true)
     */
    protected $contentChanged;

    /**
     * Returns user who last updated a piece of content
     *
     * @return string
     */
    public function getContentChangedBy()
    {
        return $this->contentChangedBy;
    }

    /**
     * @param $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Doctrine Life Cycle Event Functions
    |--------------------------------------------------------------------------
    |
    | Functions ran on the doctrine life cycle of events
    |
    */

    /**
     * Life cycle event called after flush
     * Use this to send entity to cache
     *
     * @ORM\PostFlush
     */
//    abstract public function postFlush();

//    /**
//     * @ORM\PrePersist
//     */
//    public function prePersist()
//    {
//        $now = new \DateTime;
//        $this->createdAt = $now;
//        $this->updatedAt = $now;
//        $this->contentChangedFromIp = '192.168.0.0';
//    }
//    /**
//     * @ORM\PreUpdate
//     */
//    public function preUpdate()
//    {
//        $this->updatedAt = new \DateTime;
//        $this->contentChangedFromIp = '192.168.0.0';
//
//    }
}