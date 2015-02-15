<html>
<head>
<title>Buffer</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Teacher permission is required before using the buffer.', array('A. True','B. False'),1), array('2. Eye protection must be worn while operating the buffer.', array('A. True','B. False'),2), array('3. When operating the buffer, you must,', array('A. Be the only operator at that time.','B. Use steady, even pressure which does not slow down the motor.','C. Buff on the front down side of the wheel only.','D. All of the above.'),3), array('4. Never hold the work piece with a rag or materials which may become entangled in the buffer.', array('A. True','B. False'),4), array('5. When using the buffer, always,', array('A. Hold the work piece firmly with both hands.','B. Keep unsecured long hair, loose clothing and accessories away from the buffing wheel.','C. Avoid applying excessive pressure.','D. All of the above.'),5), array('6. Points and sharp edges should be held away from the buffing wheel or down at all times.', array('A. True','B. False'),6), array('7. If you are uncertain about any aspect of the operation you should,', array('A. Go ahead and try the operation.','B. Check with your teacher before proceeding.','C. Call the machine manufacturer.','D. None of the above.'),7), array('8. Students should never let themselves be distracted when working on the buffer.', array('A. True','B. False'),8), array('9. It is safer to stand to the side of the wheel and buff than to stand in front and buff.', array('A. True','B. False'),9), array('10. Students should never double team on one buffing station.', array('A. True','B. False'),10), array('11. When operating the buffer, always,', array('A. Make certain the wheel guards are in place,','B. Apply polishing compound sparingly','C. Keep hands away from the wheel.','D. All of the above.'),11), array('12. When operation is finished, turn the power off and stay with the machine.', array('A. True','B. False'),12));
//shuffle($questions);
$length = count($questions);
$results = "results.php?tq='$length'";
$answers = array();
$continue = 0;
$chosen = 0;
global $length;
echo "<script type='text/Javascript'>
var answers = [];";
//for($i=0;$i<$length;$i++) {
//	echo "answers.push(\"0\");";
//}
for ($i=0;$i<$length;$i++) {
	echo "
function update_forms$i() { 
	chosen = '';
	len = document.questions.q";
	echo $i+1;
	echo".length;
	for (i = 0; i <len; i++) {
		if (document.questions.q";
	echo $i+1;
	echo "[i].checked) {
			chosen = document.questions.q";
	echo $i+1;
	echo "[i].value;
		}
	}
	if (chosen != '') {
			answers[" . $i . "] = chosen;
			document.getElementById(\"results\").q";
	echo $i+1;
	echo ".value = chosen;
	}";/*
	if (answers.length == " . $length . ") {
		submit = document.getElementById(\"submit\");
		submit.type = \"submit\";
	}*/
	echo "
}
";
}
?>
</script>
</head>
<body>
<div><font size=5><b>Buffer</b></font></div>
<?php

function createQuestions() { //Creates the Questions
	global $results, $questions, $length;
	echo "<form name=questions action=$results method='post'>";
	for ($i=0;$i<$length;$i++) {
		$q=$i+1;
		$k = $questions[$i][2];
		$num_answers = count($questions[$i][1]);
		//echo "<form name='q$q'>";
		echo "<a id='q$k' />" . $questions[$i][0] . "<br />";
		echo "<input type='radio' name=q$q value='" . $questions[$i][1][0] . "' onclick=\"update_forms$i()\" />" . $questions[$i][1][0] . "<br />";
		echo "<input type='radio' name=q$q value='" . $questions[$i][1][1] . "' onclick=\"update_forms$i()\" />" . $questions[$i][1][1];
		if ($num_answers>2) {
			echo "<br /><input type='radio' name=q$q value='" . $questions[$i][1][2] . "' onclick=\"update_forms$i()\" />" . $questions[$i][1][2];
		}
		if ($num_answers>3) {
			echo "<br /><input type='radio' name=q$q value='" . $questions[$i][1][3] . "' onclick=\"update_forms$i()\" />" . $questions[$i][1][3];
		}
		if ($num_answers>4) {
			echo "<br /><input type='radio' name=q$q value='" . $questions[$i][1][4] . "' onclick=\"update_forms$i()\" />" . $questions[$i][1][4];
		}
		echo "<br />";
	}
	echo "</form>";
}
createQuestions();
//Create Submit Button
$continue = 1;
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Buffer' /><input type='hidden' name='tn' value=15 />";
for ($i=0;$i<$length;$i++) {
	$j = $i + 1;
	$k = $questions[$i][2];
	echo "<input type='hidden' name=$j value='$k' />";
	echo "<input type='hidden' name=q$k />";
}
?>
<input type='submit' id='submit' name='Submit' />
</form>
<?php
for ($i=0;$i<20;$i++) {
echo "<br />";
}
?>
</body>
</html>