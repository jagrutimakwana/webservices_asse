<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$email = $data['email'];
$pwd = md5($data['password']);
$c_pwd = md5($data['c_password']);


include "config.php";

$sql = "INSERT INTO passports(name, email, pwd, c_pwd) VALUES ('{$name}', '{$email}', '{$pwd}', '{$c_pwd}')";

if(mysqli_query($conn, $sql)){
	echo json_encode([
	'status' => true,
	'message' => 'Passport Record Successfully Inserted..',
	]);

}else{

    echo json_encode([
	'status' => false,
	'message' => 'Passport Record Not Inserted..',
	]);
}
?>
