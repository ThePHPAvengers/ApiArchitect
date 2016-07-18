<?php

namespace ApiArchitect\Entities\Log;

use Faker\Provider\DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Abstracts\Log\Entities\LogEntityAbstract;

/**
 * Class HttpLog
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ApiArchitect\Repositories\HttpLogRepository")
 * @ORM\Table(name="http_log", indexes={@ORM\Index(name="search_idx", columns={"route", "method", "log_ref"})})
 */
class HttpLog extends LogEntityAbstract
{

    /**
     * @var
     *
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", unique=false, nullable=false)
     */
    protected $route;

    /**
     * @var
     *
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", unique=false, nullable=false)
     */
    protected $method;

    /**
     * @var
     *
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="text", nullable=false)
     */
    protected $params;

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
}