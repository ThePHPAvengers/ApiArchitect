<?php

namespace ApiArchitect\Entities;


use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Abstracts\EntityAbstract;

/**
 * Class User
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="entity_type", indexes={@ORM\Index(name="search_idx", columns={"type"})})
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\EntityTypeRepository")
 */
class EntityType extends EntityAbstract
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