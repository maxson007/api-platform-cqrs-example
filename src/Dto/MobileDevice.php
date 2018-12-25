<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:14
 */

namespace App\Dto;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

final class MobileDevice
{
    /**
     * @var string
     *
     * @ApiProperty(identifier=true)
     * @Assert\NotBlank()
     */
    public $deviceId;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     */
    public $installationDate;

    /**
     * MobileDevice constructor.
     * @param string $deviceId
     * @param \DateTime $installationDate
     */
    public function __construct(string $deviceId, \DateTime $installationDate)
    {
        $this->deviceId = $deviceId;
        $this->installationDate = $installationDate;
    }


}