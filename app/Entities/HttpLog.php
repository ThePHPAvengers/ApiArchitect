<?php

namespace ApiArchitect\Entities;

use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\DateTime;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Abstracts\EntityAbstract;

/**
 * Class HttpLog
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @Gedmo\Loggable
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=true)
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\HttpLogRepository")
 * @ORM\Table(name="http_log", indexes={@ORM\Index(name="search_idx", columns={"route", "method"})})
 */
class HttpLog extends EntityAbstract
{

    public function __construct()
    {
        $this->contentType = 'HttpLog';
    }

    /**
     * @var
     *
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", unique=false, nullable=false)
     */
    protected $route;

    /**
     * @var
     *
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", unique=false, nullable=false)
     */
    protected $method;

    /**
     * @var
     *
     * @ORM\Column(type="text", nullable=false)
     */
    protected $params;

    /**
     * @var
     *
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    protected $logRef;

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param $route
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $params
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

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