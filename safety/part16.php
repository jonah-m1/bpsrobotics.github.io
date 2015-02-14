<html>
<head>
<title>Precision Grinding Machines</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Dressing the wheel with the diamond point dresser as needed prevents the wheel from', array('A. becoming glazed.','B. becoming loaded.','C. coming off.','D. both A and B above.'),1), array('2. The machine must be at a dead stop in order to', array('A. make adjustments (other than depth of cut).','B. make measurements.','C. check wheel surface.','D. All of the above are correct.'),2), array('3. Your instructor needs to check all setups.', array('A. True','B. False'),3), array('4. Permanent damage to the wheel may result form', array('A. jamming work into wheel.','B. operating wheel above the recommended r.p.m.','C. over-tightening spindle.','D. All of the above.'),4), array('5. Cracked or damaged wheels are dangerous and must never be used on the surface or tool grinder because', array('A. they may fly apart.','B. they may vibrate excessively and break up.','C. they can only be used to take very light cuts.','D. both A and B above.'),5), array('6. The work piece must be held solidly in or on the chucking device.', array('A. True','B. False'),6), array('7. It is permissible to lay tools on this machine.', array('A. True','B. False'),7), array('8. When holding work piece on magnetic chuck, the base should be', array('A. one half the height.','B. as wide as the height.','C. four or more times as wide as the piece is tall.','D. None of the above.','E. both B and C above'),8), array('9. If you are uncertain about the set-up or any aspect of the operation, you must', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),9), array('10. Long hair, loose clothing and jewelry can be the cause of accidents around machinery.', array('A. True','B. False'),10), array('11. Disengage manual controls before using automatic or power feed.', array('A. True','B. False'),11));
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
<div><font size=5><b>Precision Grinding Machines</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Precision Grinding Machines' /><input type='hidden' name='tn' value=16 />";
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