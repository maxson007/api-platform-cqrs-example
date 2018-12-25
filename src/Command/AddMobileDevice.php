<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:43
 */

namespace App\Command;


class AddMobileDevice
{
    /**
     * @var string
     */
    private $deviceId;

    /**
     * @var \DateTime
     */
    private $installationDate;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * AddMobileDevice constructor.
     * @param string $deviceId
     * @param \DateTime $installationDate
     * @param string $userAgent
     */
    public function __construct(string $deviceId, \DateTime $installationDate, string $userAgent)
    {
        $this->deviceId = $deviceId;
        $this->installationDate = $installationDate;
        $this->userAgent = $userAgent;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @return \DateTime
     */
    public function getInstallationDate(): \DateTime
    {
        return $this->installationDate;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }


}