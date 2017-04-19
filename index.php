<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 19.04.2017
 * Time: 09:23
 */


require 'config.server.php';

// get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// response from server
$server_response=array();


switch($method)
{
    case 'GET':
        // get all data from GET
        if (isset($_SERVER['PATH_INFO'])) { $request = $_SERVER['PATH_INFO']; }
        else { $request="/none"; }
        $request = explode("/", $request);
        $server_response = getName($db, $request);
        break;

    case 'POST':
        // recive input data for POST method
        $input_data = json_decode(file_get_contents('php://input'), true);
        $server_response = addName($db, $input_data);
        break;
}

echo(json_encode($server_response));
