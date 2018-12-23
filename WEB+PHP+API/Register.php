<?php  
				require("conn.php");    
					$username = $_POST["username"]; 
					$password = $_POST["password"];   
					$name = $_POST["name"];    
					$email = $_POST["email"];      
 
    $statement = mysqli_prepare($conn, "INSERT INTO user (username,  password, name, email) VALUES (?, ?, ?, ?)");     			   	 	mysqli_stmt_bind_param($statement, "siss",$username,  $password, $name, $email);    
			mysqli_stmt_execute($statement);      
				$response = array();     
					$response["success"] = true;          
		echo json_encode($response);
?>