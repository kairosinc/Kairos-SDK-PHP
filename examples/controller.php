<?php

$app_id = $_POST["auth"]["app_id"];
$app_key = $_POST["auth"]["app_key"];
$phpMethod = $_POST["phpMethod"];
$args = $_POST["args"];

if ($args == null) {
	$args = [];
}

include('../Kairos.php');

$Kairos  = new Kairos($app_id, $app_key);

$response = $Kairos->$phpMethod($args);

echo $response;

?>