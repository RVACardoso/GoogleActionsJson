
<?php

if ($_POST["id"]==verysafe){
  $stored_data = file_get_contents('data.json');
  $json_data = json_decode($stored_data);
  $json_data->$_POST["name"] = $_POST["value"];
  $content = json_encode($json_data);
  file_put_contents("data.json", $content);
}
else
{
  echo "Wrong id";  
}
?>
