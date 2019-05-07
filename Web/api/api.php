<?php  

	require '../lib/db.php';
	$db = new Database();
	header("Content-Type: application/json");

	if($_REQUEST['action'] == "login"){

	  $email    = $_REQUEST['email'];
	  $password = $_REQUEST['password']; 

	  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	  $result = $db->select($sql);
	  $row = iterator_count($result);
	  $response = array();

	  if($row > 0){

	    foreach ($result as $key) {

	      $code    = "login_success";
	         $message = "login Successfull";
	         array_push($response, array(
	                    "code"=>$code,
	                    "message"=>$message,
	                    "id"=>$key['id'], 
	                    "name"=>$key['name'],
	                    "email"=>$key['email'],
	                    "password"=>$key['password'],
	                    "contact"=>$key['contact']
	                   ));

	       }
	      
	    echo json_encode($response);

	  }

	  else{
	    $code    = "login_fail";
	    $message = "Email or password incorrect";


	     array_push($response, array(
	                    "code"=>$code,
	                    "message"=>$message
	                   ));

	    echo json_encode($response);
	  }

	}




?>