<?php

$APP_ID = 'your_app_id';
$APP_KEY = 'your_app_key';
$API_URL = 'https://api.kairos.com';

$queryUrl = $API_URL . "/gallery/view";

$request = curl_init($queryUrl);

$request_params = array(
	"gallery_name" => $_POST["gallery_name"],
);
// set curl options
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request,CURLOPT_POSTFIELDS, json_encode($request_params));
curl_setopt($request, CURLOPT_HTTPHEADER, array(
        "Content-type: application/json",
        "app_id:" . $APP_ID,
        "app_key:" . $APP_KEY
    )
);

curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($request);

echo $response;
// // close the session
curl_close($request);

?>

