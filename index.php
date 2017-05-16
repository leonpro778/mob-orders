<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 16.05.2017
 * Time: 19:13
 */

require 'database.config.php';
require 'api.methods.php';

// get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];

switch($method)
{
    case 'GET':
        // echo($_SERVER['PATH_INFO']);
        if (isset($_SERVER['PATH_INFO'])) { $request = $_SERVER['PATH_INFO']; }
        else { $request="/none"; }
        $request = explode("/", $request);
        $server_response = getUser($request[1]);
        echo($server_response);
        break;
}