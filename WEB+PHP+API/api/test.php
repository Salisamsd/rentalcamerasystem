<?php

$data = $_GET;

$data = [
    'ack' => true,
    'data' => $data
];

header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

echo json_encode($data);