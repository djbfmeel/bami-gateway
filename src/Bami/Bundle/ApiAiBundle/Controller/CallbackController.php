<?php

namespace Bami\Bundle\ApiAiBundle\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Dennis van Meel <dennis.van.meel@freshheads.com>
 */
class CallbackController
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function action(Request $request)
    {
        $this->logger->info(json_encode($request->query->all()));
        $this->logger->info(json_encode($request->request->all()));

        return new JsonResponse($this->getMockOutput());
    }

    /**
     * @return array
     */
    private function getMockOutput()
    {
        $output = [];

        $output["data"] = [];
        $output["contextOut"] = [];
        $output["speech"] = 'Test speech';
        $output["displayText"] = 'Test displayText';
        $output["source"] = 'bami-gateway';

        return $output;
    }
}
