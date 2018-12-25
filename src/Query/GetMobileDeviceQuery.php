<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:38
 */

namespace App\Query;


class GetMobileDeviceQuery
{
    /** @var  string */
    private $deviceId;

    /**
     * GetMobileDeviceQuery constructor.
     * @param string $deviceId
     */
    public function __construct(string $deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }


}