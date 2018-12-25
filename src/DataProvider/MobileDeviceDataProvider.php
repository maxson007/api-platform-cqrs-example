<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:46
 */

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Dto\MobileDevice;
use App\Query\GetMobileDeviceQueryHandler;
use App\Query\GetMobileDeviceQuery;

class MobileDeviceDataProvider implements ItemDataProviderInterface
{
    /** @var  GetMobileDeviceQueryHandler */
    private $getMobileDeviceQueryHandler;

    /**
     * MobileDeviceWriteSubscriber constructor.
     *
     * @param GetMobileDeviceQueryHandler $getMobileDeviceQueryHandler
     */
    public function __construct(GetMobileDeviceQueryHandler $getMobileDeviceQueryHandler)
    {
        $this->getMobileDeviceQueryHandler = $getMobileDeviceQueryHandler;
    }

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     *
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null): bool
    {
        return MobileDevice::class === $resourceClass;
    }

    /**
     * @param string $resourceClass
     * @param array|int|string $id
     * @param string|null $operationName
     * @param array $context
     * @return MobileDevice|object|null
     * @throws ResourceClassNotSupportedException
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        if (!$this->supports($resourceClass, $operationName)) {
            throw new ResourceClassNotSupportedException();
        }

        /** @var \App\Entity\MobileDevice $mobileDevice */
        $mobileDevice = $this->getMobileDeviceQueryHandler->handle(new GetMobileDeviceQuery($id));

        $dtoDeviceMobile = new MobileDevice($mobileDevice->getDeviceId(), $mobileDevice->getInstallationDate());
        return $dtoDeviceMobile;
    }
}