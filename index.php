<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
  $response = "test message";
  echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
