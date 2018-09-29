<?php

  $items = array(
    array("name" => "Nice Dog",
          "url" => "../../eecs448/slideshow-images/dog.jpeg",
          "price" => 55.99),
    array("name" => "Happy Dog",
          "url" => "../../eecs448/slideshow-images/dog2.jpeg",
          "price" => 45.99)
  );

  echo json_encode($items);

 ?>
