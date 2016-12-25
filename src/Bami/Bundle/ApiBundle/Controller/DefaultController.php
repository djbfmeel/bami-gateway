<?php

namespace Bami\Bundle\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController
{
    /**
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse();
    }
}
