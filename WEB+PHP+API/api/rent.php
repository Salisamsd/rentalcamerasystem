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
    $item_name = $request->item_name;
    $sdate = $request->sdate;
    $edate = $request->edate;
    $total = $request->total;
    $daysDiff = $request->daysDiff;
    $personID = $request->personID;
    $number = mt_rand(0, 1000000);
    $number1 = mt_rand(0, 10000000);
    $date = date('m-d-Y_H:i:s');
    $text = "TH" . $str;
    $rentID = date('Y') . $number . $number1 . $text;
    $optionRent = $request->optionRent;
}
$sql = "INSERT INTO rentlist ( rentID,item_name,total,username, sdate,edate,rentFormat,status_r,status)
VALUES ('$rentID','$item_name','$total','$username', '$sdate','$edate','$optionRent','$optionRent','$optionRent')";


if ($con->query($sql) === TRUE) {

    $response = "คิวว่าง";

    function send_line_notify($message, $token) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$message");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array("Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token",);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    $message = $rentID;
    $token = '8YQJAfAOR4Ts0gqyTLeQxa9Pwobxa7O5ooP1hCD5ite';
    echo send_line_notify($message, $token);
} else {
   echo json_encode($response); //$response = "Error: " . $sql . "<br>" . $db->error;
}

    
//echo send_line_notify($message, $token);curl_close( $chOne );
?>
