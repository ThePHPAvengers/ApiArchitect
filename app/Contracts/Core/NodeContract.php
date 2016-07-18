<?php

namespace ApiArchitect\Contracts\Core;

/**
 * Interface NodeContract
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface NodeContract
{

    /*
    |--------------------------------------------------------------------------
    | Doctrine Blameable Getters
    |--------------------------------------------------------------------------

    /**
     * @return mixed
     */
    public function getContentChangedBy();

    /*
    |--------------------------------------------------------------------------
    | Doctrine IpTracable Getters/Setters
    |--------------------------------------------------------------------------

    /**
     * Sets createdFromIp.
     *
     * @param string $createdFromIp
     *
     * @return $this
     */
    public function setCreatedFromIp($createdFromIp);

    /**
     * Returns createdFromIp.
     * @return string
     */
    public function getCreatedFromIp();

    /**
     * Sets updatedFromIp.
     *
     * @param string $updatedFromIp
     *
     * @return $this
     */
    public function setUpdatedFromIp($updatedFromIp);

    /**
     * Returns updatedFromIp.
     * @return string
     */
    public function getUpdatedFromIp();

    /*
    |--------------------------------------------------------------------------
    | Doctrine SoftDeletes Getters/Setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return DateTime
     */
    public function getDeletedAt();

    /**
     * @param \DateTime|null $deletedAt
     * @return mixed
     */
    public function setDeletedAt(\DateTime $deletedAt = null);

    /**
     * Restore the soft-deleted state
     */
    public function restore();

    /**
     * @return bool
     */
    public function isDeleted();

    /*
    |--------------------------------------------------------------------------
    | Doctrine Timestamp getters/setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return DateTime
     */
    public function getCreatedAt();

    /**
     * @return DateTime
     */
    public function getUpdatedAt();

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt);

}