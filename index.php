<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 16.05.2017
 * Time: 19:13
 */

require 'database.config.php';
require 'api.methods.php';
require 'database.log.php';


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

    case 'POST':
        $post_data = file_get_contents(('php://input'), true);

        if (json_decode($post_data) != NULL)
        {
            $rest_response = addUser(json_decode($post_data, true));
        }
        else
        {
            $rest_response = 'Error';
        }

        echo($rest_response);
        break;
}