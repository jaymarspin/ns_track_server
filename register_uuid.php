<?php
require_once("include/header.php");
 $postjson = json_decode(file_get_contents('php://input'), true);
require_once("include/connection.php");

$conn = new connection();
$conn = $conn->connectionString();

$uuid = $postjson['uuid'];
$q = "INSERT INTO users(uuid) VALUES('$uuid')";
$exe = $conn->query($q);
$myobj = array();
if($exe){
	$myobj = $arrayName = array('message' => "success" );
}else $myobj = $arrayName = array('message' => "failed" );
echo json_encode($myobj);
?>