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

require "index.php";

$data = file_get_contents("php://input");
if (isset($data)) {
    $request = json_decode($data);
    $username = $request->username;
    $password = $request->password;
    $mobile = $request->mobile;
    $email = $request->email;
    $name = $request->name;
    $lastname = $request->lastname;
    $bdate = $request->bdate;
    $personID = $request->personID;
    $address = $request->address;
    $status = "0" . $str;
    $text = "clipart151389.png" . $str;
}
$username = stripslashes($username);
$password = stripslashes($password);
$check = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($con, $check);
$num = mysqli_num_rows($result);
if ($num > 0) {
    $response = "มีคนใช้ Username แล้ว";
} else {

    $sql = "INSERT INTO users (username, password,name,lastname,bdate,nationID,address, telephone, email,status) VALUES "
            . "('$username', '$password', '$name' ,'$lastname','$bdate','$personID','$address','$mobile', '$email','$status')";

    $sql2 = "INSERT INTO userimg1 (username,img1,img2,img3) VALUES ('$username','$text','$text','$text')";



    if ($con->query($sql) === TRUE) {
        $response = "1";
    }
    if ($con->query($sql2) === TRUE) {
        $response = "Registration successfull";
    } else {
        $response = "Error: " . $sql . "<br>" . $db->error;
    }
}

echo json_encode($response);
?>