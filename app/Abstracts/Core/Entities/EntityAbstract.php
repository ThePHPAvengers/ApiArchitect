<?php

namespace ApiArchitect\Abstracts\Core\Entities;

use ApiArchitect\Libraries\Core\EntityTrait;
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
use ApiArchitect\Contracts\Core\EntityContract;

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