<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->quantity;

	$in2_response = new \stdClass();
	$in2_response->textToSpeech = "talk example";
	$in2_response->displayText = "talk example";
	
	
	$in1_response = new \stdClass();
	$in1_response->simpleResponses->simpleResponses = [json_encode($in2_response)];
	
	
	$response = new \stdClass();
	$response->fulfillmentText = "  ";
	$response->fulfillmentMessages = [
		json_encode($in1_response)
	];
	$response->source = "";

	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
