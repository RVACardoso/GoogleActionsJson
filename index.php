<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->parameters->quantity;
	
	$test_server = file_get_contents('http://192.168.1.65:8080/test1.php');
	echo $test_server;
	
	$speech = "a bike is " . $text;
	$display = "a car is ". $text;
	
	$response = new \stdClass();
	$response->fulfillmentText = "fulfill text" . $text;
	$response->fulfillmentMessages = [array("simpleResponses" => 
					       array( "simpleResponses" => 
						     [array("textToSpeech" => $speech, 
							   "displayText" => $display)
							     ])
					      )];
	$response->source = "webhook-sample";

	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
