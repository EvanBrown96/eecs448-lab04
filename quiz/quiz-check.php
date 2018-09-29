<?php

  // array of question object in the format {question: "question text",
  //                                         answers: [answer1, answer2...]}
  $questions = array(
    array('question' => "What is 2 + 2?",
          'answers' => array(1, 10, 4, -70)),

    array('question' => "How much wood could a woodchuck chuck if a woodchuck could chuck wood?",
          'answers' => array("Not Enough", "Just Right", "Too much", "700 pounds")),

    array('questions' => "Who wrote the 'Jupiter' symphony?",
          'answers' => array("Holst", "Mozart", "Steely Dan", "Bach")),

    array('questions' => "Which of these is NOT an existing minor league baseball team?",
          'answers' => array("Chihuahuas", "Dust Devils", "Lake Monsters", "Swordfish")),

    array('questions' => "Who hit two 3-pointers in the last 2 minutes of the 2016 national championship?",
          'answers' => array("Marcus Paige", "Josh Hart", "Kris Jenkins", "Brice Johnson"))
  );

  // array of correct answer indexes
  $answers = array(2, 3, 1, 3, 0);

  if($_SERVER['HTTP_QUIZ_MODE'] == "GET_ANSWERS"){
    // frontend is requesting question data
    echo json_encode($questions);

  }
  else{

    $score = 0;
    // display score
    for($i = 0; $i < count($answers); $i++){
      $user = $questions[$i]['answers'][$_POST['q' . $i]];
      $correct = $questions[$i]['answers'][$answers[$i]];
      echo "<p>Question " . ($i+1) . ": " . $questions[$i]['question'];
      echo "</p><p>You answered: " . $user;
      echo "</p><p>Correct answer: " . $correct;
      echo "</p><hr>";

      if($user == $correct){
        $score++;
      }
    }

    echo "Correct Answers: " . $score . "/" . count($answers);
    echo "Your score is: " . (100*($score / count($answers))) . "%";

  }

?>
