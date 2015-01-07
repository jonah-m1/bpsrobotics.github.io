<html>
<head>
<title>Portable Drill</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Teacher permission is required before using the portable drill.', array('A. True','B. False'),1), array('2. Eye protection must be worn when using the portable drill.', array('A. True','B. False'),2), array('3. Disconnect the power before changing the bit in a portable drill.', array('A. True','B. False'),3), array('4. Remove the chuck key immediately after using it.', array('A. True','B. False'),4), array('5. Make sure that the switch is in the _____ position before plugging the drill in.', array('A. off','B. on'),5), array('6. When using the portable drill, all work pieces must be', array('A. securely clamped or held in a vice.','B. nailed to the floor.','C. glued to the table.','D. none of the above.'),6), array('7. Hold the portable drill firmly at all times.', array('A. True','B. False'),7), array('8. If a work piece is caught by the drill', array('A. stop it with your hands.','B. insert the chuck key immediately.','C. release the trigger switch.','D. all of the above statements are correct.'),8), array('9. To prevent accidents while using the portable drill, you should', array('A. apply steady, straight pressure on the drill.','B. ease up on the pressure when the drill bit begins to break through the metal.','C. turn off the power and hold the drill until it comes to a dead stop.','D. all of the above.'),9), array('10. Large drills should turn at slow speeds.', array('A. True','B. False'),10), array('11. ________ may cause accidents around machinery.', array('A. Unsecured long hair','B. Loose clothing','C. Loose jewelry','D. All of the above.'),11), array('12. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),12));
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
<div><font size=5><b>Portable Drill</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Portable Drill' /><input type='hidden' name='tn' value=3 />";
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