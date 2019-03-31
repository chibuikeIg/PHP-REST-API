<?php

header("Access-Control-Allow-Origin: http://localhost:8080/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include 'config/database.php';
include 'objects/user.php';

$dbase = new Database();
$dbase =$dbase->getConnection();

$user = new User($dbase);

$data = json_decode(file_get_contents('php://input'));

$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->password = $data->password;

if($user->create())
{
    http_response_code(200);

    echo json_encode(['message'=>'user successfully created']);
}
else
{
    http_response_code(400);

    echo json_encode(['message'=>'unable to create user']);
}