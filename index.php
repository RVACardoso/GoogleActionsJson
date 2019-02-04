<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->parameters->quantity;
	
	$lines_array=file('https://wildrc-test1.herokuapp.com/data_json.php');
	$lines_string=implode('',$lines_array);
	$json_data = json_decode($lines_string);
	$jsontext = $json_data->string;
	
	$text = $jsontext;
	
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
	
	//$lines_array=file('https://wildrc-test1.herokuapp.com/data_json.php');
	// turn array into one variable
	//$lines_string=implode('',$lines_array);
	//output, you can also save it locally on the server
	//echo $lines_string;
}

?>
