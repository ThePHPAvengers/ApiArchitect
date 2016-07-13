<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use ApiArchitect\Abstracts\LogEntryAbstract;

/**
 * Gedmo\Loggable\Entity\LogEntry
 *
 * @ORM\Entity
 * @ORM\Table(name="doctrine_log")
 * @ORM\Entity(repositoryClass="Gedmo\Loggable\Entity\Repository\LogEntryRepository")
 */
class DoctrineLog extends LogEntryAbstract
{

}