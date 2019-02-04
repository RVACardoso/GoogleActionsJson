
<?php

if ($_POST["id"]==verysafe){
  $stored_data = file_get_contents('data.json');
  $json_data = json_decode($stored_data);
  
  echo $_POST["name"];
  $json_data->humidade = $_POST["value"];
  $content = json_encode($json_data);
  file_put_contents("data.json", $content);
}
else
{
  echo "Wrong id";  
}
?>
