<?php
/**
 * Vscale.com PHP API Client
 *
 * Dummy API endpoint to allow actual adapter tests but with dummy data.
 *
 * @package Vscale
 * @version 1.0
 */
require_once 'MockJsonData.php';
// Our fake 'content store'.
$jsonData = new \Hotrush\Vscale\Tests\MockJsonData();
// Grab requested url.
$url = ltrim($_SERVER['PATH_INFO'], '/');
// Prepare arguments.
$args = $_GET;
unset($args['api_key']);
// Return fake data.
header('Content-Type: application/json');
print(
    $jsonData->getResponse($url, $args)
);