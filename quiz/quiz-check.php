<?php

  // array of question object in the format {question: "question text",
  //                                         answers: [answer1, answer2...]}
  $questions = array(
    array('question' => "What is 2 + 2?",
          'answers' => array(1, 10, 4, -70)),

    array('question' => "How much wood could a woodchuck chuck if a woodchuck could chuck wood?",
          'answers' => array("Not Enough", "Just Right", "Too much", "700 pounds"))
  );

  // array of correct answer indexes
  $answers = array(2, 3);

  if($_SERVER['HTTP_QUIZ_MODE'] == "GET_ANSWERS"){
    // frontend is requesting answers
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
      echo "</p><br>";

      if($user == $correct){
        $score++;
      }
    }

    echo "Your score is: " . (100*($score / count($answers))) . "%";

  }

?>
