<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 19.04.2017
 * Time: 09:49
 */

function getName($db, $request)
{
    // this function search for selected name and returns variety
    // the value for search is in array $request, num of element 1
    $stmt = $db->prepare("SELECT m,d,c,b,n,ms,w FROM names WHERE value=:name");
    $stmt->bindValue(':name', $request[1], PDO::PARAM_STR);
    $stmt->execute();
    $error_info=$stmt->errorInfo();

    if ($error_info[0]==0)
    {
        if ($stmt->rowCount()>0)
        {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $response = array('Value'=>$request[1], 'M'=>$result['m'], 'D'=>$result['d'], 'C'=>$result['c'], 'B'=>$result['b'], 'N'=>$result['n'], 'Ms'=>$result['ms'], 'W'=>$result['ms']);
        }
        else
        {
            $response=array('Function'=>'getName', 'Status'=>'Success but no matches found');
        }

    }
    else
    {
        $response = array('Function'=>'getName', 'Status'=>'Error: '.$error_info[2]);
    }

    return $response;
}

function addName($db, $input_data)
{
    // this function adds new record in database
    // to successfully add data to database we have to get correct data
    // after decode JSON it will be an array with eight elements
    if (count($input_data)>=8)
    {
        $stmt = $db->prepare("INSERT INTO names(value, m, d, c, b, n, ms, w VALUES (:value, :m, :d, :c, :b, :n, :ms, :w))");
        $stmt->bindValue(':value', $input_data[0], PDO::PARAM_STR);
        $stmt->bindValue(':m', $input_data[1], PDO::PARAM_STR);
        $stmt->bindValue(':d', $input_data[2], PDO::PARAM_STR);
        $stmt->bindValue(':c', $input_data[3], PDO::PARAM_STR);
        $stmt->bindValue(':b', $input_data[4], PDO::PARAM_STR);
        $stmt->bindValue(':n', $input_data[5], PDO::PARAM_STR);
        $stmt->bindValue(':ms', $input_data[6], PDO::PARAM_STR);
        $stmt->bindValue(':w', $input_data[7], PDO::PARAM_STR);
        $stmt->execute();
        $error_info = $stmt->errofInfo();

        if ($error_info[0]==0)
        {
            $response = array('Function'=>'addName', 'Status'=>'Add succesfully', 'Insert ID'=>$db->lastInsertId);
        }
        else
        {
            $response = array('Function'=>'addName', 'Status'=>'SQL error: '.$error_info[2]);
        }
    }
    else
    {
        $response = array('Function'=>'addName', 'Status'=>'Invalid data from JSON');
    }

    return $response;
}