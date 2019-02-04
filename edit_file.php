<?php

  $filename = "data.json"
  $content = "test content for json"
  file_put_contents($filename, $content)
  
  echo file_get_contents('data.json');

?>
