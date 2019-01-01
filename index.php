<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->quantity;

	$response = new \stdClass();
	$response->fulfillmentText = "  ";
	$response->fulfillmentMessages->text->text = ["example value"];
	$response->source = "";

	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
