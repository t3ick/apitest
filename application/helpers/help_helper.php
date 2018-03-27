<?php
/**
 * Created by PhpStorm.
 * User: t3i
 * Date: 13/03/2018
 * Time: 16:10
 */
function connect()
{
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $db = 'etna_crowdin';
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        die ("connection fail" . mysqli_connect_error());
    }
    echo "Connected successfully";
}


function testBase($base = '404')
{
    if ($base == '404' || $base == '403' || $base == '401') {
        $error = (int)$base;
        set_status_header($error);
        $mes = array('code' => $error, 'message' => 'not found');
        echo json_encode($mes);
        die;
    }
}

function aff ($data = [], $code = 200, $mess = 'success') {
    set_status_header($code);
    $aff = array('code' => $code,
        'message' => $mess,
        'datas' => $data);
    echo json_encode($aff, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    die;
}