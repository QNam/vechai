<?php 

use GuzzleHttp\Exception\RequestException;

function callApi($callback) {
    
    $res = "";

    try {

        $res = $callback();

    } catch (RequestException $e) {
        if ($e->hasResponse()) {
            $res = $e->getResponse();
        }
    }

    return $res;
	
}