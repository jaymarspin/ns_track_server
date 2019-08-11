<?php
require_once("include/header.php");
 $postjson = json_decode(file_get_contents('php://input'), true);
require_once("include/connection.php");


$uuid = $postjson['uuid'];
$myuuid = $postjson['myuuid'];
$conn = new connection();
$conn = $conn->connectionString();

$myobj = array();

$q = "SELECT * FROM users WHERE uuid = '$uuid'";
$exe = $conn->query($q);
if($exe->num_rows == 1){
	$q = "SELECT * FROM users_tracked WHERE tracker = '$myuuid' && tracked = '$uuid'";
	$exe = $conn->query($q);

	$q = "SELECT";
	if($exe->num_rows == 0){
		$q = "INSERT INTO users_tracked(tracker,tracked) VALUES('$myuuid','$uuid')";
		$exe = $conn->query($q);

	if($exe){
		$myobj = $array = array('message' => "success");
		}else $myobj = $array = array('message' => "Error Occured, Please try again later" );
	}else $myobj = $array = array('message' => "you're tracking this device already" );
}else $myobj = $array = array('message' => "device not found" );



echo json_encode($myobj);
?>