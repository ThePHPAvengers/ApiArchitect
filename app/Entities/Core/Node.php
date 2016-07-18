<?php

namespace ApiArchitect\Entities\Core;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use ApiArchitect\Abstracts\Core\Entities\NodeAbstract;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceable;

/**
 * Class Node
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=true)
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\Core\NodeRepository")
 * @ORM\Table(name="node", indexes={@ORM\Index(name="search_idx", columns={"id","node_type"})})
 */
final class Node extends NodeAbstract
{

    use IpTraceable, SoftDeletes, Timestamps;

    /**
     * @var
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string", nullable=false)
     */
    protected $nodeType;

    /**
     * @var string $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(type="string", nullable=false)
     * @ORM\ManyToOne(targetEntity="ApiArchitect\Entities\Core\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var string $updatedBy
     *
     * @ORM\Column(type="string")
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="ApiArchitect\Entities\Core\User")
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


    /**
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    protected $deletedAt;

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