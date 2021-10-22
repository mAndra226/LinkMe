<?php
	$realname = $_POST['realname'];
	$email= $_POST['email'];
	$pass= $_POST['pass'];
	$username= $_POST['username'];

	//Database connection
	
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "linkme_database";
	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	if(mysqli_connect_error()){
		die('Connection Failed: '.mysqli_connect_error());
	}else{
		$INSERT = "INSERT Into userprofile (realname, email, pass, username) 
			values(?,?,?,?)";
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ssss", $realname, $email, $pass, $username);
		$stmt->execute();
		echo "registration successfully...";
		$stmt->close();
		$conn->close();
		
	}
?>

