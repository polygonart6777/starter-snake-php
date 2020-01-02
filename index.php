<?php

include_once 'api.php';

/**
 * Basic index.php router that checks the incoming REQUEST_URI and decides what response to send.
 *
 * Simple API response functions used here are located in api.php.
 *
 * Most of your snake implementation will need to happen in the "/move" command.
 */

// Get the requested URI without any query parameters on the end
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');

if ($requestUri == '/start')
{
    // read the incoming request body stream and decode the JSON
    $data = json_decode(file_get_contents('php://input'));

    // TODO - if you have a stateful snake, you could do initialization work here

    startResponse('#ff0000', 'beluga', 'block-bum');
}
elseif ($requestUri == '/move')
{
    // read the incoming request body stream and decode the JSON
    $data = json_decode(file_get_contents('php://input'));

    error_log('Received move data: '.print_r($data, true));

    // TODO - Implement your Battlesnake here!
    moveResponse('up');
}
elseif ($requestUri == '/end')
{
    endResponse();
}
elseif ($requestUri == '/ping')
{
    pingResponse();
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
