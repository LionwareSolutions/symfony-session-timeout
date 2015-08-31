<?php
namespace Lionware\SymfonySessionTimeoutBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * @author Nick Stemerdink <nick.stemerdink@lionware.solutions>
 */
class SessionListener
{
    /** @var int */
    private $expirationTime;

    public function __construct($expirationTime)
    {
        if (!is_integer($expirationTime)) {
            throw new \InvalidArgumentException(
                sprintf('$expirationTime is expected be of type integer, %s given', gettype($expirationTime))
            );
        }

        $this->expirationTime = $expirationTime;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->isMasterRequest()) {
            $request = $event->getRequest();
            $session = $request->getSession();

            $session->start();
            $metaData = $session->getMetadataBag();

            $timeDifference = time() - $metaData->getLastUsed();
            if ($timeDifference > $this->expirationTime) {
                $session->invalidate();
            }
        }
    }
}