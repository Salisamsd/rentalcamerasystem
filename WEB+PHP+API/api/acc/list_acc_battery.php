<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
require '../../index.php';
$q = 'select * from items where type_id="5" and option_id="6"  and showItem="1" ';
$result = mysqli_query($con,$q);
mysqli_set_charset($con, "utf8");

$items = [];
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $items[] = [
       'item_id' => intval($row['item_id']),
        'option_id' => intval($row['option_id']),
		 'status_id' => intval($row['status_id']),
		 'item_name' => $row['item_name'],
		 'item_description' =>$row['item_description'],
		 'item_priceperday' =>number_format($row['item_priceperday']),
		 'deposit_1' =>number_format($row['deposit_1']), 
		 'deposit_2' =>number_format($row['deposit_2']),
		 'img1' => $row['img1'],
    ]/* + $row*/;
}

$data = [ 'data' =>$items
    //'total' => count($items)'
];

header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

echo json_encode($data);