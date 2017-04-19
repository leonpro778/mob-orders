<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 19.04.2017
 * Time: 09:23
 */

require 'functions.php';

$function = $_GET["function"];
$value = $_GET["value"];

switch($function)
{
    case 'getName':
        echo(getName($value));
        break;

    default:
        break;
}
