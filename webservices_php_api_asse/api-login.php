<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$email =$data['email'];
$pwd =md5($data['password']);

include "config.php";

$sel="SELECT * FROM students WHERE email='".$email."' AND pwd='".$pwd."'";
$res=mysqli_query($conn,$sel);
$count=mysqli_num_rows($res);


if ($count> 0) {
    echo json_encode([
	'status' => true,
	'message' => 'Login Successfully',
	]);
} else {
   echo json_encode([
	'status' => false,
	'message' => 'Login Failed',
	]);
}
?>

