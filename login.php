<?php
	$email= $_POST['email'];
	$pass= $_POST['pass'];

	//Database connection
	
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "linkme_database";
	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
	if(mysqli_connect_error()){
		die('Connection Failed: '.mysqli_connect_error());
	}else{
		$stmt = $conn->prepare("select * from userprofile where email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			$data = $stmt_result->fetch_assoc();
			$pwdcheck = password_verify($pass, $data['pass']);
			if($pwdcheck == true){
				echo "<h2>Login Successfully</h2>";
				header('Location: result.html');
			}else{
				echo "<h2>Invalid email or password</h2>";
				header('Location: login.html');
			}
		}else{
			echo "<h2>Invalid email or password</h2>";
			header('Location: login.html');
		}
		$stmt->close();
		$conn->close();
		
	}
?>
