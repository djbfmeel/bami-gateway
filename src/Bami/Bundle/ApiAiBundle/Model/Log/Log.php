<?php

namespace Bami\Bundle\ApiAiBundle\Model\Log;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Dennis van Meel <dennis.van.meel@freshheads.com>
 */
class Log
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var array
     */
    private $body;

    /**
     * @var integer
     */
    private $responseCode;

    /**
     * @var array
     */
    private $responseHeaders;

    /**
     * @var array
     */
    private $responseBody;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->createdAt = new \DateTimeImmutable();

        // Request
        $this->method = $request->getMethod();
        $this->url = $request->getRequestUri();
        $this->ip = $request->getClientIp();

        $this->headers = $request->headers->all();

        $body = $request->isMethod('post') ? $request->request->all() : $request->query->all();
        if (count($body) > 0) {
            $this->body = $body;
        }

        // Response
        $this->responseCode = $response->getStatusCode();
        $this->responseHeaders = $response->headers->all();
        $this->responseBody = json_decode($response->getContent());
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
