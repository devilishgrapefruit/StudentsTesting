<?php

function getJson($result)
{
    $response = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $response[] = $row;
    }
    return json_encode($response);
}

function getParams()
{
    $query = $_SERVER['QUERY_STRING'];

    $delete_args = [];

    if ( !empty( $query ) )
    {
        foreach( explode('&', $query ) as $param )
        {
            list($k, $v) = explode('=', $param);
            $k = urldecode($k);
            $v = urldecode($v);
            $delete_args[$k] = $v ;
        }
    }

    return $delete_args;
}

function getBody()
{
    return json_decode(file_get_contents('php://input'), true);
}
?>