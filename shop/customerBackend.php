<?php

  $items = array(
    /*
    array("name" => "",
          "url" => "./item-images/",
          "price" =>),
    */
    array("name" => "Jayhawk Whiskey Bottle",
          "url" => "./item-images/weird_jayhawk.jpg",
          "price" => 50),
    array("name" => "HUGE Stuffed Gorilla",
          "url" => "./item-images/gorilla.jpg",
          "price" => 25),
    array("name" => "Sundance Electric Scooter",
          "url" => "./item-images/scooter.jpg",
          "price" => 300),
    array("name" => "Homemade Car Trailer",
          "url" => "./item-images/trailer.jpg",
          "price" => 750),
    array("name" => "39\" Affinity TV",
          "url" => "./item-images/tv.jpg",
          "price" => 100),
    array("name" => "Ralph Lauren Tie",
          "url" => "./item-images/tie.jpg",
          "price" => 25),
    array("name" => "MT 45 Food Truck",
          "url" => "./item-images/truck.jpg",
          "price" => 12010),
    array("name" => "56cm Mountain Bike",
          "url" => "./item-images/bike.jpg",
          "price" => 1000),
  );

  $shipping = array("7-day" => 0,
                    "3-day" => 5,
                    "overnight" => 50);

  if($_SERVER["HTTP_SHOP_MODE"] == "GET_ITEMS"){
    echo json_encode($items);
  }
  else{

    echo "<h5>Thank you for your purchase.</h5>";
    echo "<p>Username: " . $_POST['username'] . "</p>";
    echo "<p>Password: " . $_POST['password'] . "</p>";

    echo "<table><tr><td></td><td>Quantity</td><td>Cost Per Item</td><td>Subtotal</td></tr>";
    foreach($_POST as $key => $value){
      $index = (int)substr($key, 5, 1)
      echo "<tr><td>" . $value . "</td><td>" . $items[$index]["name"] . "</td><td>$" . $items[$index]["price"] . "</td><td>$" . $value * $items[$index]["price"] . "</td></tr>";
    }
    echo("</table>")
  }

 ?>
