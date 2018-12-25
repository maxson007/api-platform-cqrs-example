<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MobileDeviceRepository")
 */
class MobileDevice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $deviceId;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $installationDate;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $userAgent;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     */
    public function setDeviceId(string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @return \DateTime
     */
    public function getInstallationDate(): \DateTime
    {
        return $this->installationDate;
    }

    /**
     * @param \DateTime $installationDate
     */
    public function setInstallationDate(\DateTime $installationDate): void
    {
        $this->installationDate = $installationDate;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }


}
