<html>
<head>
<title>Metal Lathe</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Teacher permission is required before using the metal lathe.', array('A. True','B. False'),1), array('2. Eye protection must be worn when working around the metal lathe.', array('A. True','B. False'),2), array('3. Adjustments must be made with the machine at a dead stop except', array('A. variable speed which must be set with machine running.','B. when taking work from between centers.','C. when removing chuck from head stock.','D. both B and C above.'),3), array('4. When changing a chuck use', array('A. a board to help prevent smashed fingers.','B. a wood block under it to prevent damage to the ways.','C. A and B are correct.','D. None of the above are correct.'),4), array('5. The chuck key must be removed immediately after using it.', array('A. True','B. False'),5), array('6. Attached chips are sharp and can cause injury.', array('A. True','B. False'),6), array('7. To remove chips, use a brush, not compressed air.', array('A. True','B. False'),7), array('8. Irregular shapes take', array('A. special setup.','B. special equipment.','C. teacher supervision.','D. All of the above.'),8), array('9. The depth of cut us regulated by', array('A. size of metal.','B. type of metal.','C. both size and type of metal.','D. None of the above.'),9), array('10. It is necessary to secure work firmly in chuck or between centers.', array('A. True','B. False'),10), array('11. The tool bit should be ground properly and set on center before starting the lathe.', array('A. True','B. False'),11), array('12. Keep hands away from all chips and revolving parts.', array('A. True','B. False'),12), array('13. Do not measure stock while it is rotating.', array('A. True','B. False'),13), array('14. The chuck should be turned by hand before starting.', array('A. True','B. False'),14), array('15. Remove jewelry, eliminate loose clothing, and secure long hair before operating the metal lathe.', array('A. True','B. False'),15), array('16. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),16), array('17. Chatter indicates something is wrong. Stop machine and check setup, tool bit, etc.', array('A. True','B. False'),17), array('18. Allow machine to reach a dead stop before reversing rotation.', array('A. True','B. False'),18), array('19. Use extreme caution when removing tool holder and tool post for filing and polishing.', array('A. True','B. False'),19), array('20. Have your teacher check the speed setting before starting the operation.', array('A. True','B. False',),20));
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
<div><font size=5><b>Metal Lathe</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Metal Lathe' /><input type='hidden' name='tn' value=11 />";
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