<?php

namespace ApiArchitect\Abstracts\Log\Entities;

use Doctrine\ORM\Cache;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Util\ClassUtils;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use ApiArchitect\Libraries\Core\EntityTrait;
use ApiArchitect\Contracts\Core\EntityContract;
use ApiArchitect\Repositories\Core\NodeRepository;

/**
 * Class DoctrineLogContract
 *
 * @package ApiArchitect\Abstracts
 * @see Gedmo\Loggable\Entity\AbstractLog
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @Gedmo\Loggable
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 */
abstract class LogEntityAbstract implements EntityContract
{
    use EntityTrait;
}