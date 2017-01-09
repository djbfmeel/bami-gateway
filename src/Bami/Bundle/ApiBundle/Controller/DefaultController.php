<?php

namespace Bami\Bundle\ApiBundle\Controller;

use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController
{
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function callbackAction(Request $request)
    {
        $data = $request->request->all();

        $this->logger->info(json_encode($data));

        return new JsonResponse();
    }
}
