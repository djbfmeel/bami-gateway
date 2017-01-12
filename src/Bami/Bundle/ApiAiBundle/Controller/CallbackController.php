<?php

namespace Bami\Bundle\ApiAiBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Dennis van Meel <dennis.van.meel@freshheads.com>
 */
class CallbackController
{
    /**
     * @return JsonResponse
     */
    public function action()
    {
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
