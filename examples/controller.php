<?php

$app_id = $_POST["auth"]["app_id"];
$api_key = $_POST["auth"]["api_key"];
$phpMethod = $_POST["phpMethod"];
$args = $_POST["args"];

if ($args == null) {
	$args = [];
}

include('../Kairos.php');

$Kairos  = new Kairos($app_id, $api_key);

$response = $Kairos->$phpMethod($args);

echo $response;

?>