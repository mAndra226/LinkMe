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
if(mysqli_connect_error()){
	die('Connection Failed: '.mysqli_connect_error());
}else{
		$INSERT = "INSERT INTO userprofile (realname, email, country, phone, bio) 
		values(?,?,?,?)";
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ssss", $realname, $email, $country, $phone, $bio);
		$stmt->execute();	
}