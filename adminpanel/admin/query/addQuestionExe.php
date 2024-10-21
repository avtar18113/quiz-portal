<?php 
 include("../../../conn.php");

extract($_POST);

$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' AND exam_question='$question' ");
if($selQuest->rowCount() > 0)
{
  $res = array("res" => "exist", "msg" => $question);
}
else
{
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,exam_ch1,exam_ch2,exam_ch3,exam_ch4,exam_ch5,exam_answer) VALUES('$examId','$question','$choice_A','$choice_B','$choice_C','$choice_D','$choice_E','$correctAnswer') ");

	// $insQuest = $conn->query("INSERT INTO exam_question_tbl SET
	// exam_id = '" .$examId . "',
	// exam_question = '" . addslashes($question) . "',
	// exam_ch1 = '" . addslashes($choice_A) . "',
	// exam_ch2 = '" . addslashes($choice_B) . "',
	// exam_ch3 = '" . addslashes($choice_C) . "',
	// exam_ch4 = '" . addslashes($choice_D) . "',
	// exam_ch5 = '" . addslashes($choice_E) . "',
	// exam_answer = '" . addslashes($correctAnswer) . "';
	
	
	if($insQuest)
	{
       $res = array("res" => "success", "msg" => $question);
	}
	else
	{
       $res = array("res" => "failed");
	}
}



echo json_encode($res);
 ?>