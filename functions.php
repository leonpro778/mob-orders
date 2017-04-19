<?php
/**
 * Created by PhpStorm.
 * User: Luk-Star
 * Date: 19.04.2017
 * Time: 09:49
 */

function getName($value)
{
    // here should be a connection with database to retrive data for $value
    // but without this we can only send data for $value = 'Leon'
    $output_JSON_data = array('M'=>'Leon', 'D'=>'Leona', 'C'=>'Leonowi', 'B'=>'Leona', 'N'=>'Leonem', 'Ms'=>'Leonie', 'W'=>'Leonie');

    return json_encode($output_JSON_data);
}