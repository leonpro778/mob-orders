<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 16.05.2017
 * Time: 19:44
 */

function addUser()
{

}

function getUser($id_user)
{
    global $db;

    $stmt=$db->prepare("SELECT name, surname FROM users WHERE id_user=:id_user");
    $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    $return_array=array('name'=>$result['name'], 'surname'=>$result['surname']);
    return json_encode($return_array);
}