<?php

include_once 'api.php';
require_once 'models.php';
use models\Battle;

/**
 * Basic index.php router that checks the incoming REQUEST_URI and decides what response to send.
 *
 * Simple API response functions used here are located in api.php.
 *
 * Most of your snake implementation will need to happen in the "/move" command.
 */

// Get the requested URI without any query parameters on the end




$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
if ($requestUri == '/')  
{   //Index Section
    $apiversion = "1";
    $author     = "curious-george";         
    $color      = "#ff33cc";   
    $head       = "trans-rights-scarf";    
    $tail       = "weight";    

    indexResponse($apiversion,$author,$color,$head, $tail);
}
elseif ($requestUri == '/start')
{
    // read the incoming request body stream and decode the JSON
    $data = json_decode(file_get_contents('php://input'));

    // TODO - if you have a stateful snake, you could do initialization work here
    startResponse();
}
elseif ($requestUri == '/move')
{   
 
    Battle::load(json_decode(file_get_contents('php://input')));
    $nextMove = Battle::getMove();
    error_log('Next move: '.print_r($nextMove, true));
    
    moveResponse($nextMove);
}
elseif ($requestUri == '/end')
{
     // read the incoming request body stream and decode the JSON
     $data = json_decode(file_get_contents('php://input'));

     // TODO - if you have a stateful snake, you could do finalize work here
    endResponse();
}
elseif ($requestUri == '/')
{
    echo 'Battlesnake server is running! Documentation can be found at
	<a href="https://docs.battlesnake.com">https://docs.battlesnake.com</a>.';
}
else
{
    header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
}
