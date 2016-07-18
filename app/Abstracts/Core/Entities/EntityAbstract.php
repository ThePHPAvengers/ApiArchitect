<?php

namespace ApiArchitect\Abstracts\Core\Entities;

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
use ApiArchitect\Libraries\Core\EntityTrait;
use ApiArchitect\Contracts\Core\EntityContract;
use ApiArchitect\Repositories\Core\NodeRepository;

/**
 * Class AbstractNode
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 */
abstract class EntityAbstract implements EntityContract
{
    use EntityTrait;
}