<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	
	// google request
	$request_google = file_get_contents('php://input');
	$json = json_decode($request_google);
	$request = $json->queryResult->parameters->quantity;
	
	// get stored data
	$stored_data = file_get_contents('data.json');
	$json_data = json_decode($stored_data);
	$jsontext = $json_data->string;
	
	//update stored data 
	$json_data->string = "Bye world";
	$content = json_encode($json_data);
	file_put_contents("data.json", $content);
	
	$text = $request . "  " . $jsontext;
	
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
	echo "Method not allowed\n";
	//echo file_get_contents('data_json.php');
}

?>
