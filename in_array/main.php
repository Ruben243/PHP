<?php
require "vendor/autoload.php";

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

$accessToken = '';

$graph = new Graph();

$graph->setAccessToken($accessToken);

$user = $graph->createRequest("GET", "https://graph.microsoft.com/v1.0/users")
    ->setReturnType(Model\User::class)
    ->execute();

echo "Hello, I am {$user->getGivenName()}.";