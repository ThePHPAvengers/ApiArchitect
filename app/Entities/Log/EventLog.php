<?php

namespace ApiArchitect\Entities\Log;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Abstracts\Log\Entities\LogEntityAbstract;

/**
 * Gedmo\Loggable\Entity\EventLog
 *
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="event_log")})
 * @ORM\Entity(repositoryClass="Gedmo\Loggable\Entity\Repository\EventLogRepository")
 */
class EventLog extends LogEntityAbstract
{

}