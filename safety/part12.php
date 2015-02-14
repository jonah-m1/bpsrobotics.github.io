<html>
<head>
<title>Milling Machines</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. The first item of procedure to operate the milling machine is', array('A. secure work piece.','B. set cutting speed.','C. turn on power.','D. obtain teacher permission.'),1), array('2. Eye protection must be worn when working around the milling machine.', array('A. True','B. False'),2), array('3. Make adjustments or set-ups only when', array('A. you have permission.','B. you have read and understand safety rules.','C. the machine is at a dead stop.','D. All of the above.'),3), array('4. Remove spindle wrench immediately after securing bit in collet.', array('A. True','B. False'),4), array('5. Which of the items below could be used to securely fasten your work piece?', array('A. a vice.','B. Clamps.','C. Indexing head.','D. Step blocks.'),5), array('6. Milling machine cutters are sharp and must be handled carefully.', array('A. True','B. False'),6), array('7. When machine is at a dead stop, chips should be remove with', array('A. hand.','B. cloth','C. brush','D. None of the above.'),7), array('8. After you are finished using the milling machine, you should', array('A. turn off the power.','B. brake the machine to a dead stop.','C. remove cutter.','D. All of the above.'),8), array('9. Never clean chips away from cutter while machine is running.', array('A. True','B. False'),9), array('10. Keep fingers at least 6" away from the cutter.', array('A. True','B. False'),10), array('11. Check and set the proper speed, feed, and depth of cut before starting the milling machine.', array('A. True','B. False'),11), array('12. Floor around the milling machine should be kept clean.', array('A. True','B. False'),12), array('13. Chip shield should be between you and the work piece while cutting.', array('A. True','B. False'),13), array('14. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),14));
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
<div><font size=5><b>Milling Machines</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Milling Machines' /><input type='hidden' name='tn' value=12 />";
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