<?php

  // array of question object in the format {question: "question text",
  //                                         answers: [answer1, answer2...],
  //                                         correct: index of correct answer}
  $questions = array(
    array('question' => "What is 2 + 2?",
          'answers' => array(1, 10, 4, -70),
          'correct' => 2),

    array('question' => "How much wood could a woodchuck chuck if a woodchuck could chuck wood?",
          'answers' => array("Not Enough", "Just Right", "Too much", "700 pounds"),
          'correct' => 3)
  );

  echo json_encode($questions);

  // foreach($_POST as $val){
  //   echo $val;
  // }

?>
