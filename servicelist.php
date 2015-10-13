<?php

$url = 'http://test-9482.rhcloud.com/servicelist';

// set up the request context
$options = ["http" => ["method" => "GET"]];
                       
$context = stream_context_create($options);

// make the request
$response = file_get_contents($url, false, $context);

//print($response);

//var_dump(json_decode($response));
$services = json_decode($response);
var_dump($services);


foreach ($services as $svc) {
    print "Service Name = " . $svc->name . "\n";
    print "Description = " . $svc->description . "\n\n";
}
?>
