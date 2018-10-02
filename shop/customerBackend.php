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

    echo "<h3>Thank you for your purchase!</h3>";
    echo "<p>Username: " . $_POST['username'] . "</p>";
    echo "<p>Password: " . $_POST['password'] . "</p>";

    $total = $shipping[$_POST['shipping']];

    echo "<table><tr><td></td><td>Quantity</td><td>Cost Per Item</td><td>Subtotal</td></tr>";
    foreach($_POST as $key => $value){
      if(substr($key, 0, 4) == "item" && $value > 0){
        $index = (int)substr($key, 5, 1);
        echo "<tr><td>" . $items[$index]["name"] . "</td><td>" . $value . "</td><td>$" . $items[$index]["price"] . "</td><td>$" . $value * $items[$index]["price"] . "</td></tr>";
        $total += $value * $items[$index]["price"];
      }
    }
    echo("<tr><td>Shipping</td><td colspan='2'>" . $_POST['shipping'] . "</td><td>$" . $shipping[$_POST['shipping']] . "</td></tr>");
    echo("<tr><td colspan='3'>Total Cost</td><td>$" . $total . "</td></tr></table>");
  }

 ?>
