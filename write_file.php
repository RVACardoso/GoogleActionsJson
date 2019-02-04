
<?php

$stored_data = file_get_contents('data.json');
$json_data = json_decode($stored_data);
$json_stored = $json_data->$request;

?>
