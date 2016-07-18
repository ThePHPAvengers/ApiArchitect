<?php

namespace ApiArchitect\EntitiesCore;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Contracts\Core\NodeContract;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceable;

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
 * Class Node
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @Gedmo\Loggable
 * @ORM\HasLifecycleCallbacks()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=true)
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\NodeRepository")
 * @ORM\Table(name="node", indexes={@ORM\Index(name="search_idx", columns={"id","node_type"})})
 */
final class Node implements NodeContract
{

    use IpTraceable, SoftDeletes, Timestamps;

    /**
     * @var
     * @TODO custom generated id
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
     * @ORM\Column(type="string", nullable=false)
     */
    protected $nodeType;

    /*
    |--------------------------------------------------------------------------
    |  Doctrine Blameable Attributes
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
     * @Gedmo\Versioned
     * @ORM\Column(type="string", nullable=false)
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\ManyToOne(targetEntity="ApiArchitect\Entities\Core\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var string $updatedBy
     *
     * @Gedmo\Versioned
     * @ORM\Column(type="string")
     * @Gedmo\Blameable(on="update")
     * @Gedmo\IpTraceable(on="update")
     * @ORM\ManyToOne(targetEntity="ApiArchitect\Entities\Core\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    protected $updatedBy;

    /**
     * @var string $contentChangedBy
     *
     * @Gedmo\Versioned
     * @Gedmo\IpTraceable(on="update")
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
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $createdFromIp;

    /**
     * @var string $updatedFromIp
     *
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="update")
     * @Gedmo\IpTraceable(on="update")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $updatedFromIp;

    /**
     * @var datetime $contentChangedFromIp
     *
     * @Gedmo\Versioned
     * @Gedmo\IpTraceable(on="change", field={"name", "password", "email", "id"})
     * @ORM\Column(name="content_changed_by_ip", type="string", nullable=true, length=45)
     * @Gedmo\Blameable(on="create")
     */
    protected $contentChangedFromIp;


    /**
     * @Gedmo\Versioned
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    protected $deletedAt;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    protected $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Versioned
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated;

    /**
     * @Gedmo\Versioned
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
     * @return mixed
     */
    public function getNodeType()
    {
        return $this->nodeType;
    }

    /**
     * @param $nodeType
     * @return $this
     */
    public function setNodeType($nodeType)
    {
        $this->nodeType = $nodeType;
        return $this;
    }
}