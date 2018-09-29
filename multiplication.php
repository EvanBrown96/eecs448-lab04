<?php

  echo("<table style='border: 1px solid black;'><tr style='background-color: red; color: white;'><td></td>");

  $mult1 = 1;

  for($i = 1; $i < 101; $i++){
    echo("<td>" . $i . "</td>");
  }

  echo("</tr>");

  for($i = 1; $i < 101; $i++){
    echo("<tr><td style='background-color: red; color: white;'>" . $i . "</td>");

    for($j = 1; $j < 101; $j++){
      echo("<td>" . $i * $j . "</td>");
    }

    echo("</tr>");
  }

  echo("</table>")

?>
