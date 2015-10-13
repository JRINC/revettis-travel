<?php

$url = 'http://test-9482.rhcloud.com/serviceEdit';

// prepare the body data. Example is JSON here
$data = http_build_query(array(
'login' => $_POST['login'],
'password' => $_POST['password']));

// set up the request context
$options = ["http" => ["method" => "POST",
                       "content" => "serviceId=55ebc3623e444b70431bc9b7&name=TESTUPDATE&description=OTRA PRUEBA MASS"]];
                       
$context = stream_context_create($options);

// make the request
$response = file_get_contents($url, false, $context);

//print($response);

//var_dump(json_decode($response));
$service = json_decode($response);
//var_dump($services);

print "Name = " . $service->name . "\n";
print "Description = " . $service->description . "\n\n";
?>
