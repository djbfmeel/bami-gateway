<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/setup.html#checking-symfony-application-configuration-and-setup
// for more information
umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (
    isset($_SERVER['HTTP_CLIENT_IP'])
    || (
        isset($_SERVER['HTTP_X_FORWARDED_FOR'])
        && isset($_SERVER['HTTP_X_ORIGINAL_HOST'])
        && strpos($_SERVER['HTTP_X_ORIGINAL_HOST'], '.eu.ngrok.io') === false
    )
    || !preg_match('/^(127\.0\.0\.1|::1|192\.168\.2\.\d+|10\.0\.\d+\.\d+|192.168.10.\d+|172\.17\.0\.1)$/', @$_SERVER['REMOTE_ADDR'])
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__.'/../app/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
