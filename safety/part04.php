<html>
<head>
<title>Drill Press</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Procedures to follow before actually using the drill press should include:', array('A. obtaining teacher permission.','B. securing the work piece.','C. wearing proper eye protection.','D. all of the above.'),1), array('2. Adjustments must be made with the machine at a dead stop except for the variable which must be set with the machine running.', array('A. True','B. False'),2), array('3. Remove the chuck key immediately after using it.', array('A. True','B. False'),3), array('4. If a work piece is caught by the drill', array('A. stop it with your hands.','B. adjust the depth gauge.','C. step back and turn off power.','D. lower the table.'),4), array('5. Large drills turn at slow speeds.', array('A. True','B. False'),5), array('6. Any special operation requires', array('A. special equipment.','B. special instruction.','C. teacher supervision.','D. all of the above.'),6), array('7. The drill press table should be locked in place.', array('A. True','B. False'),7), array('8. __________ must be kept away from moving parts.', array('A. Hair and hands','B. Loose clothing','C. Jewelry','D. All of the above.'),8), array('9. Be sure that the drill bit is sharp.', array('A. True','B. False'),9), array('10. In order to prevent the drill bit from binding or grabbing:', array('A. ease up on the feed pressure when the bit starts to break through the material.','B. insert the chuck key in the chuck.','C. lower the table.','D. any of the above.'),10), array('11. To remove a burr use', array('A. a large drill.','B. deburring tool.','C. countersink.','D. any of the above.'),11), array('12. When the machine is at a dead stop use ________ to remove chips and shavings.', array('A. hands','B. cloth','C. brush','D. welders gloves'),12), array('13. When finished,', array('A. wait for the bit to come to a dead stop.','B. remove the drill bit and chuck key.','C. clean up the area.','D. all of the above are correct.'),13), array('14. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),14));
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
<div><font size=5><b>Drill Press</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Drill Press' /><input type='hidden' name='tn' value=4 />";
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