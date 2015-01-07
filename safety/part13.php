<html>
<head>
<title>Portable Disc Grinder</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. The first item of procedure to operate the portable disc grinder is', array('A. secure the work.','B. plug in the machine.','C. obtain teacher permission.','D. turn on the power.'),1), array('2. Eye protection must be worn when operating the portable disc grinder.', array('A. True','B. False'),2), array('3. Before operating the portable disc grinder', array('A. be sure observers are a safe distance away.','B. tie back long hair, secure loose clothing, and remove accessories.','C. secure work firmly.','D. All of the above.'),3), array('4. Make sure switch is in the "off" position before plugging it into the power source.', array('A. True','B. False'),4), array('5. Never operate the portable disc grinder', array('A. damp or wet locations.','B. in a position which may cause the disc to come in contact with the','electrical cord.','C. in a manner which slows disc excessively.','D. All of the above.'),5), array('6. Hold the portable disc grinder firmly with both hands while operating.', array('A. True','B. False'),6), array('7. If you are uncertain about the set-up or any aspect of the operation, you must', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),7), array('8. Unplug the grinder before changing the disc or wheel.', array('A. True','B. False'),8), array('9. Dont overload the portable grinder since that might cause the disc to shatter. It will do the job better and safer at full speed.', array('A. True','B. False'),9), array('10. Beside improper placement of your hands, which of the following is a possible cause of accidents around the sander?', array('A. unsecured long hair','B. loose clothing','C. jewelry','D. All of the above are correct.'),10), array('11. Never allow sparks to fly toward flammable liquids or combustible material such as cardboard, rags, unsecured long hair and flammable liquids.', array('A. True','B. False'),11), array('12. A face shield should also be worn when operating the disc grinder.', array('A. True','B. False','METAL CUT-OFF SAW','(ABRASIVE CHOP-SAW)'),12));
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
<div><font size=5><b>Portable Disc Grinder</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Portable Disc Grinder' /><input type='hidden' name='tn' value=13 />";
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