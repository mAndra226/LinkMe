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
				//dynamic log in
				$ID = mysqli_real_escape_string($conn, $email);
				$sql = "SELECT * FROM userprofile WHERE email = '$ID' ";
				$result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
				$row = mysqli_fetch_array($result);
				$Userid = $row['username'];
				session_start();
				$_SESSION['uid'] = $Userid;
				echo "<h2>Login Successfully</h2>";
				header("Location: result.html?ID=$Userid");
				exit();
			}else{
				echo "<h2>Invalid email or password</h2>";
				header('Location: login.html?error=incorrectpw');
				exit();
			}
		}else{
			echo "<h2>Invalid email or password</h2>";
			header('Location: login.html?error=incorrectemail');
			exit();
		}
		$stmt->close();
		$conn->close();
		
	}
?>
