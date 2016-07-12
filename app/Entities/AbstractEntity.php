<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Entities\EntityInterface;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceable;

/**
 * Class AbstractNode
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=true)
 */
abstract class AbstractEntity implements EntityInterface
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
    protected $id;

    /**
     * @var
     *
     * @ORM\Column(nullable=false)
     * @OneToOne(targetEntity="EntityType")
     * @Gedmo\Blameable(on="create","update","change","delete")
     * @Gedmo\IpTraceable(on="create","update","change","delete")
     * @JoinColumn(name="entity_type_id", referencedColumnName="id")
     */
    private $contentType;

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
     * @Gedmo\Blameable(on="change", field={"id"})
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
     * @Gedmo\Blameable(on="change")
     * @Gedmo\IpTraceable(on="change", field={"id"})
     * @ORM\Column(name="content_changed_by_ip", type="string", nullable=true, length=45)
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
     * @Gedmo\Blameable(on="delete")
     * @Gedmo\IpTraceable(on="delete")
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
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
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;

    /**
     * @var \DateTime $updated
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Blameable(on="update")
     * @Gedmo\IpTraceable(on="update")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;

    /**
     * @Gedmo\Blameable(on="change")
     * @Gedmo\IpTraceable(on="change")
     * @Gedmo\Timestampable(on="change", field={"id"})
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
}