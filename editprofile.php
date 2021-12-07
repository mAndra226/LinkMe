<?php
session_start();
$realname = $_POST['name'];
$email= $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];
$github = $_POST['github'];
$youtube = $_POST['youtube'];
$snapchat = $_POST['snapchat'];
$reddit = $_POST['reddit'];
$pinterest = $_POST['pinterest'];
$bio = $_POST['bio'];
//Database connection
	
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "linkme_database";
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
$ID = $_SESSION['uid'];
if(mysqli_connect_error()){
	die('Connection Failed: '.mysqli_connect_error());
}else{
		//profile pic
		//if (isset($_POST['Save'])){
			$file = $_FILES['file'];
			
			$fileName = $_FILES['file']['name'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];
			
			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));
			
			$allowed = array('jpg', 'jpeg', 'png', 'gif');
			
			if(in_array($fileActualExt, $allowed)){
				if($fileError === 0){
					if($fileSize < 10000000){
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
					}else{
						echo "File size too big";
					}
				}else{
					echo "File upload error";
				}
			}else{
				echo "File type not allowed";
			}
		//}
		
		//links
		$facebook = preg_replace("(^https?://)", "", $facebook );
		$twitter = preg_replace("(^https?://)", "", $twitter );
		$instagram = preg_replace("(^https?://)", "", $instagram );
		$linkedin = preg_replace("(^https?://)", "", $linkedin );
		$github = preg_replace("(^https?://)", "", $github );
		$youtube = preg_replace("(^https?://)", "", $youtube );
		$snapchat = preg_replace("(^https?://)", "", $snapchat );
		$reddit = preg_replace("(^https?://)", "", $reddit );
		$pinterest = preg_replace("(^https?://)", "", $pinterest );
		
		$UPDATE = "UPDATE links SET Facebook = ?, Twitter = ?, Instagram = ?, Linkedin = ?, Github = ?, Youtube = ?, Snapchat = ?, Reddit = ?, Pinterest = ? 
		WHERE Userid = ?";
		$stmt = $conn->prepare($UPDATE);
		$stmt->bind_param('ssssssssss', $facebook, $twitter, $instagram, $linkedin, $github, $youtube, $snapchat, $reddit, $pinterest, $_SESSION['uid']);
		$stmt->execute();
		$stmt->close();
	
	
		//profile pic
		if (!($fileDestination == NULL)){
		$UPDATE = "UPDATE userprofile SET image = ?
		WHERE username = ?";
		$stmt = $conn->prepare($UPDATE);
		$stmt->bind_param('ss', $fileDestination, $_SESSION['uid']);
		$stmt->execute();
		$stmt->close();
		}
		//add basic info
		$UPDATE = "UPDATE userprofile SET realname = ?, email = ?, country = ?, phone = ?, bio = ?
		WHERE username = ?";
		$stmt = $conn->prepare($UPDATE);
		$stmt->bind_param('ssssss', $realname, $email, $address, $phone, $bio, $_SESSION['uid']);
		$stmt->execute();
		$stmt->close();
		header("Location: result.html?ID=$ID");
		exit();		
}
