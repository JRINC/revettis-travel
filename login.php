<?php

$url = 'http://test-9482.rhcloud.com/userByLogin2';

// prepare the body data. Example is JSON here
$data = http_build_query(array(
'login' => $_POST['login'],
'password' => $_POST['password']));

// set up the request context
//$options = ["http" => [
//"method" => "POST",
//"header" => ["Authorization: token " . $access_token,
//"Content-Type: application/json"],
//"content" => $data
//]];

// set up the request context
$options = ["http" => ["method" => "POST",
                       //"header" => ["Content-Type: multipart/x-www-form-urlencoded"],
                       "content" => "login=" . $_POST['login'] . "&password=" . $_POST['password']]];
                       
$context = stream_context_create($options);

// make the request
$response = file_get_contents($url, false, $context);

//print($response);

//var_dump(json_decode($response));
$user = json_decode($response);
//var_dump($services);

print "Name = " . $user->{'name'} . "\n";
print "E-mail = " . $user->{'email'} . "\n\n";
?>
