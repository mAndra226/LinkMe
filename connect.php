<?php
	$realname = $_POST['realname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$hashedpw = password_hash($pass, PASSWORD_DEFAULT);
	$username = $_POST['username'];

	//Database connection
	
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "linkme_database";
	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	if(mysqli_connect_error()){
		die('Connection Failed: '.mysqli_connect_error());
	}else{
		$dup = mysqli_query($conn, "select * from userprofile where email = '$email' ");
		$dup2 = mysqli_query($conn, "select * from userprofile where username = '$username' ");
		
		if(mysqli_num_rows($dup) > 0){
			echo "This email is already taken ";
			header('Location: signup.html');
		}else if(mysqli_num_rows($dup2) > 0){
			echo "This username is already taken ";
			header('Location: signup.html');
		}else{
			
		$INSERT = "INSERT INTO userprofile (realname, email, pass, username) 
			values(?,?,?,?)";
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ssss", $realname, $email, $hashedpw, $username);
		$stmt->execute();
		echo "registration successfully...";
		
		$stmt->close();
		$conn->close();
		header('Location: result.html');
		}
		
	}
?>
