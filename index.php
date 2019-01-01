<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->quantity;

	$response = new \stdClass();
	$response->speech = $text;
	$response->displayText = $text;
	$response->source = "webhook";
	$response->fulfillmentMessages->text->text = "example value";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
