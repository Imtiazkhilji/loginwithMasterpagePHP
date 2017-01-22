<?php

include "dbconnection.php"; 
//u_name and u_pass are input fields attributes POSTed by Json 
$user_name = $_POST['u_name'];
$user_pass = $_POST['u_pass'];
//Initializing connection
$query = $dbh -> prepare("SELECT * FROM `users` WHERE `Name`=:user_name AND `Password`=:user_pass AND `Type`=:type");
//passing perameters in query
$query -> execute(array(':user_name' => $user_name, ':user_pass' => $user_pass, ':type' => 'operator'));
//check query executs or not
$record = $query -> fetchAll();
if (count($record) > 0) {
//returning status and msg as result of the query
echo json_encode(array('status'=>false,'msg'=>'Welcome'));
             }else{
echo json_encode(array('status'=>false,'msg'=>'Invalid user email or password'));
//close connection
die();

}

?>
