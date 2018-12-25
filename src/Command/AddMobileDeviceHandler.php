<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:45
 */

namespace App\Command;

use App\Repository\MobileDeviceRepository;
use App\Entity\MobileDevice;

class AddMobileDeviceHandler
{
    /** @var  MobileDeviceRepository */
    private $mobileDeviceRepository;

    /**
     * MobileDeviceHandler constructor.
     *
     * @param MobileDeviceRepository $mobileDeviceRepository
     */
    public function __construct(MobileDeviceRepository $mobileDeviceRepository)
    {
        $this->mobileDeviceRepository = $mobileDeviceRepository;
    }

    public function handle(AddMobileDevice $command)
    {
        $deviceMobile = new MobileDevice();
        $deviceMobile->setDeviceId($command->getDeviceId());
        $deviceMobile->setInstallationDate($command->getInstallationDate());
        $deviceMobile->setUserAgent($command->getUserAgent());

        $this->mobileDeviceRepository->save($deviceMobile);
    }
}