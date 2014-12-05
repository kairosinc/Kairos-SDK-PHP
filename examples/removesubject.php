<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<h2>Remove Subject</h2>
<i>This example removes all instances of a subject from a given gallery</i><br />
<?php

//* * * * include the wrapper class
include('../Kairos.php');
include('assets/helper.php');

//* * * * sample api credentials (works for example)
$app_id  = 'e2a8eaa7';
$api_key = '4092e4a45070bca728644e9285f084b4';

//* * * * create a new instance and authenticate
$Kairos  = new Kairos($app_id, $api_key);

/*
 In this example, we request a list of all galleries */
$gallery_id = 'people';
$subject_id = 'tyrion';
$response = $Kairos->removeSubjectFromGallery($subject_id, $gallery_id);

echo '<br /><b>Response:</b><br />';
echo '<div class="text-left" style="padding:10px;border:1px solid rgba(51, 51, 51, 0.08);background-color: rgba(204, 204, 204, 0.26);"><br />';
echo format_json($response, true);
echo '</div>';

?>
</body>
</html>