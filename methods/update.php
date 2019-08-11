<?php



class methods
{
	
	function __construct()
	{
		# code...
	}
	function update_messages($messages,$conn,$limitSMS,$size,$users_uuid){
		 
		array_splice($messages,$limitSMS);
		 
	foreach ($messages as $key => $value){

		 
		 
		$uuid = $value['uuid'];
		$fromNumber = $value['fromNumber'];
		$message = $value['message'];
		$date_sent = $value['sentDate'];

		$q = "INSERT INTO sms(uuid,users_uuid,fromNumber,message,date_sent) VALUES('$uuid','$users_uuid','$fromNumber','$message','$date_sent')";
		$exe = $conn->query($q);
		 
		 
	}

	return true;
		}
}






?>