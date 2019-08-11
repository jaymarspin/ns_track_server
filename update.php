<?php
set_time_limit(90);
require_once("include/header.php");
 $postjson = json_decode(file_get_contents('php://input'), true);
require_once("include/connection.php");


$conn = new connection();
$conn = $conn->connectionString();


$lat = $postjson['lat'];
$lng = $postjson['lng'];
$messages = $postjson['messages'];
$limitSMS  = $postjson['limitSMS'];
$size = $postjson['size'];
$users_uuid = $postjson['uuid'];
$myobj = array();
$q = "INSERT INTO geolocation(users_uuid,lat,lng) VALUES('$users_uuid','$lat','$lng')";
$exe = $conn->query($q);

if($exe){
	require_once("methods/update.php");
	$method = new methods();
	$method = $method->update_messages($messages,$conn,$limitSMS,$size,$users_uuid);
	if($method){
		$myobj = $array = array(
		"message" =>  "success"
		 
		);
	}else{
		$myobj = $array = array(
		"message" => "failed" 
		 
		);
	}
	
}else {
	$myobj = $array = array(
		"message" => "failed" 
		 
	);
}




	echo json_encode($myobj);


?>