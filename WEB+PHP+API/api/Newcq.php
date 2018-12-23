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
    $item_id = $request->item_id;
    $item_name = $request->item_name;
    $sdate = $request->sdate;
    $edate = $request->edate;
    
    $result_date = $edate - $sdate;
}

$sql = "SELECT * FROM rentlist WHERE   item_name = '$item_name' and NOT('$edate' <  sdate OR '$sdate' > edate)  ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count < 1) {
    $response = "คิวว่าง";
} else {
    $response = "ไม่มีคิวว่าง";
}




echo json_encode($response);
?>