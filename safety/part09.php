<html>
<head>
<title>Bench Grinder/Belt Grinder</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Before operating the grinder you must', array('A. get permission from the instructor.','B. wear eye protection.','C. make sure the toll rest is properly adjusted.','D. all of the above.'),1), array('2. The tool rest is properly adjusted when it is', array('A. completely removed from the grinder.','B. 2" to 3" away from the belt or wheel.','C. 1/16" to 1/8" away from the belt or wheel.','D. all of the above.'),2), array('3. The tongue guard is properly adjusted when it is ______ away from the grinding wheel.', array('A. 1/16"','B. 1/8"','C. 1/4"','D. 1/2"'),3), array('4. Safety shields must be in place before operating the grinder.', array('A. True','B. False'),4), array('5. Jamming the work pie e into the belt or wheel could damage the grinder and result in serious injury to persons near the machine.', array('A. True','B. False'),5), array('6. When operating the grinder, you should', array('A. be the only operator at that time.','B. use steady, even pressure which does not slow down the motor.','C. grind below the horizontal axis on the belt.','D. all of the above.'),6), array('7. When using the grinder, always', array('A. hold the work piece firmly against the tool rest.','B. keep unsecured long hair, loose clothing, and accessories away from the wheel or belt.','C. use the front of the wheel, not the side.','D. all of the above.'),7), array('8. Never hold the work piece with a rag or materials which may become entangled in the grinder.', array('A. True','B. False'),8), array('9. Applying excessive pressure on the belt or wheel could cause it to break.', array('A. True','B. False'),9), array('10. The tool rest should be adjusted only with the grinder at a dead stop.', array('A. True','B. False'),10), array('11. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),11), array('12. Cracked or damaged grinding wheels must never be used.', array('A. True','B. False'),12), array('13. The inspection of the grinding belt or wheels should be done', array('A. while the machine is running.','B. before you start.','C. at no time.','D. all of the above are correct.'),13));
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
<div><font size=5><b>Bench Grinder/Belt Grinder</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Bench Grinder/Belt Grinder' /><input type='hidden' name='tn' value=9 />";
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