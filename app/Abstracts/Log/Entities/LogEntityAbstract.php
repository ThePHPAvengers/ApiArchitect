<?php

namespace ApiArchitect\Abstracts\Log\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Libraries\Core\EntityTrait;
use ApiArchitect\Contracts\Core\EntityContract;

/**
 * Class DoctrineLogContract
 *
 * @package ApiArchitect\Abstracts
 * @see Gedmo\Loggable\Entity\AbstractLog
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 */
abstract class LogEntityAbstract implements EntityContract
{

    use EntityTrait;

    /**
     * @var
     *
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(name="log_ref", type="string", unique=true, nullable=false)
     */
    protected $logRef;

    /**
     * @return mixed
     */
    public function getLogRef()
    {
        return $this->logRef;
    }

    /**
     * @return $this
     */
    public function setLogRef()
    {
        $this->logRef = md5(mt_rand(0,9999999999));
        return $this;
    }
}