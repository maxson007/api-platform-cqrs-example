<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:39
 */

namespace App\Query;

use App\Repository\MobileDeviceRepository;
use Doctrine\ORM\EntityNotFoundException;

class GetMobileDeviceQueryHandler
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

    /**
     * @param GetMobileDeviceQuery $mobileDeviceQuery
     * @return \App\Entity\MobileDevice|null
     * @throws EntityNotFoundException
     */
    public function handle(GetMobileDeviceQuery $mobileDeviceQuery)
    {
        /** @var \App\Entity\MobileDevice|null $mobileDevice */
        $mobileDevice = $this->mobileDeviceRepository->findOneBy(['deviceId' => $mobileDeviceQuery->getDeviceId()]);

        if (!$mobileDevice) {
            throw new EntityNotFoundException('Device not found');
        }

        return $mobileDevice;
    }

}