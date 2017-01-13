<?php

namespace Bami\Bundle\ApiAiBundle\EventHandler;

use Bami\Bundle\ApiAiBundle\Model\Log\Log;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

/**
 * @author Dennis van Meel <dennis.van.meel@freshheads.com>
 */
class LogSubscriber
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var array
     */
    private $routes;

    /**
     * @param Registry $registry
     * @param array $routes
     */
    public function __construct(Registry $registry, array $routes)
    {
        $this->registry = $registry;
        $this->routes = $routes;
    }

    /**
     * @param PostResponseEvent $event
     */
    public function onTerminate(PostResponseEvent $event)
    {
        $request = $event->getRequest();

        if (!in_array($request->get('_route'), $this->routes)) {
            return;
        }

        $response = $event->getResponse();
        $manager = $this->registry->getManager();

        $manager->persist(new Log($request, $response));
        $manager->flush();
    }
}
