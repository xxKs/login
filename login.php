<?php
error_reporting(0);
$user = $_GET["username"];
$pass = $_GET["password"];

if (empty($user)) die("error");

$login = curl_init();
// put the user agent manually
$headers = array(
    'User-Agent:  )',
);
//put the uuid & did manually between ""
$data = array(
    '_uuid' => "",
    'password' => $pass,
    'username'=> $user,
    'device_id' => "",
    'from_reg'=> 'false',
    '_csrftoken'=> 'missing',
    'login_attempt_count' => '0'
);
curl_setopt($login,CURLOPT_URL,"https://i.instagram.com/api/v1/accounts/login/");
curl_setopt($login , CURLOPT_FOLLOWLOCATION , true);
curl_setopt($login , CURLOPT_POST , 1);
curl_setopt($login,CURLOPT_HTTPHEADER,$headers);
curl_setopt($login,CURLOPT_POSTFIELDS,$data);
curl_setopt($login , CURLOPT_RETURNTRANSFER , true);

$respone = curl_exec($login);

echo $respone;

?>