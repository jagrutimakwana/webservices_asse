<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$email = $data['email'];
$pwd = md5($data['password']);
$c_pwd = md5($data['c_password']);

include "config.php";

$sql = "UPDATE passports SET name = '{$name}', email = '{$email}', pwd = '{$pwd}', c_pwd = '{$c_pwd}' WHERE id = {$id}";

if(mysqli_query($conn, $sql)){
	echo json_encode([
	'status' => true,
	'message' => 'Passport Record Updated..',
	]);
}else{
    echo json_encode([
	'status' => false,
	'message' => 'Passport Record Not Updated..',
	]);
}
?>
