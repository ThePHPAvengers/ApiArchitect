<?php

namespace ApiArchitect\Entities;


use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Entities\AbstractEntity;

/**
 * Class User
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <me@jameskirkby.com>
 *
 * @ORM\Entity
 * @Gedmo\Loggable
 * @ORM\Table(name="entity_type")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=true)
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\EntityTypeRepository")
 */
class EntityType extends AbstractEntity
{

    /**
     * @var
     *
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    protected $type;
}