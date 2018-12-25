<?php
/**
 * Created by PhpStorm.
 * User.dist: danie
 * Date: 10/12/2018
 * Time: 21:50
 */

namespace App\EventListener\Api;

use App\Dto\MobileDevice;
use App\Command\AddMobileDevice as AddMobileDeviceCommand;
use App\Command\AddMobileDeviceHandler;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Request;

class MobileDeviceWriteSubscriber implements EventSubscriberInterface
{
    /** @var  AddMobileDeviceHandler */
    private $addMobileDeviceHandler;

    /**
     * MobileDeviceWriteSubscriber constructor.
     *
     * @param AddMobileDeviceHandler $addMobileDeviceHandler
     */
    public function __construct(AddMobileDeviceHandler $addMobileDeviceHandler)
    {
        $this->addMobileDeviceHandler = $addMobileDeviceHandler;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => [
                [
                    'write',
                    EventPriorities::PRE_WRITE,
                ],
            ],
        ];
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function write(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();
        $dtoDeviceMobile = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$dtoDeviceMobile instanceof MobileDevice || Request::METHOD_POST !== $method) {
            return;
        }

        $mobileDeviceCommand = new AddMobileDeviceCommand(
            $dtoDeviceMobile->deviceId,
            $dtoDeviceMobile->installationDate,
            $request->headers->get('User.dist-Agent')
        );

        $this->addMobileDeviceHandler->handle($mobileDeviceCommand);
    }
}