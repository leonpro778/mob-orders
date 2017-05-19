<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 16.05.2017
 * Time: 19:44
 */

function addUser($decode_data)
{
    global $db;

    $stmt=$db->prepare("INSERT INTO users(name, surname, user_type, add_data, active) VALUES(:name, :surname, '5', :add_data, '1')");
    $stmt->bindValue(':name', $decode_data['name'], PDO::PARAM_STR);
    $stmt->bindValue(':surname', $decode_data['surname'], PDO::PARAM_STR);
    $stmt->bindValue(':add_data', time(), PDO::PARAM_INT);
    $stmt->execute();

    return 'User add!';
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