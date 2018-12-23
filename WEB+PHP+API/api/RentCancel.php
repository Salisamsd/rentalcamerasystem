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



require "../index.php";

$data = file_get_contents("php://input");

if (isset($data)) {

    $request = json_decode($data);

    $username = $request->username;
}


$sql = "SELECT * FROM rentlist  LEFT JOIN items ON rentlist.item_name=items.item_name LEFT JOIN rentFormat ON rentlist.rentFormat= rentFormat.id LEFT JOIN statusR ON rentlist.status= statusR.id LEFT JOIN freeshow ON rentlist.item_name= freeshow.item_name WHERE username='$username' and status='5'  GROUP BY rentlist.id DESC ;";


$result = mysqli_query($con, $sql);

$items = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $items[] = [
        'id' => $row['id'],
        'rentID' => $row['rentID'],
        'total' => intval($row['total']),
        'img1' => $row['img1'],
        'item_name' => $row['item_name'],
        'sdate' => $row['sdate'],
        'edate' => $row['edate'],
        'name' => $row['name'],
        'dayRent' => $row['dayRent'],
        'statusR_name' => $row['statusR_name'],
        'dayRent' => $row['dayRent'],
        'ft_name' => $row['ft_name'],
            ]/* + $row */;
}

$data = ['data' => $items
        //'total' => count($items)'
];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($data);
?>