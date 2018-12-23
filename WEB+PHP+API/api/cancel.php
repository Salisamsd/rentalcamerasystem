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
    $rentID = $request->rentID;
    $status = "5".$str;
    $date = $request->date;
   
}
$date = stripslashes($date);
$id = stripslashes($id);
$check ="SELECT * FROM rentlist  WHERE  rentID='$rentID' and status_r='2'   "; //
 $result = mysqli_query($con,$check);
 $num = mysqli_num_rows($result);
if($num >0 ){
	$response = "ไม่สามารถยกเลิกได้";
} 
else{
$sql2 = "UPDATE rentlist SET status='$status' WHERE  rentID='$rentID' ";

if ($con->query($sql2) === TRUE) {
	$response= "Registration successfull";
   
}else {
   $response="Error: " . $sql . "<br>" . $db->error;
}
}
  
	echo json_encode( $response);
 
?>



