<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 16.05.2017
 * Time: 19:28
 */

$login = "root";                // set login to database
$password = "root";             // set password to database
$database_host = "localhost";   // set ip or hostname with database
$database_name = "rest_api";       // set name of database
$charset = "latin1";            // charset for your database
$sql_type = "mysql";            // set type of sql

$db=new PDO($sql_type.':host='.$database_host.';dbname='.$database_name.';charset='.$charset, $login, $password);