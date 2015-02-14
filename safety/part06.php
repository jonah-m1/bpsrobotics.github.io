<html>
<head>
<title>Electric Arc Welding</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. The first thing to do before starting to arc weld is', array('A. turn on power.','B. install rod.','C. strike an arc.','D. get permission from the teacher.'),1), array('2. To protect others in the immediate area always weld', array('A. in the shower room.','B. in the welding booth or protected area (barrier shields).','C. outside in the rain.','D. all the above.'),2), array('3. Use pliers or similar tool, not gloves, for picking up hot metal.', array('A. True','B. False'),3), array('4. Turn off the welder if it is necessary to change the position of the work.', array('A. True','B. False'),4), array('5. Which of the following must be kept away from the welding area?', array('A. hot metal.','B. cold metal.','C. welding electrodes.','D. combustible material and flammable liquids.'),5), array('6. Under what condition is it dangerous to weld?', array('A. dry, dusty floor.','B. wet floor.','C. cold room.','D. there is never any danger.'),6), array('7. Which of the following special protective clothing is needed while welding?', array('A. A helmet with at least a number 10 shaded lens.','B. Long sleeve coat.','C. Leather leggings.','D. All of the above.'),7), array('8. Warn others before you strike the arc.', array('A. True','B. False'),8), array('9. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),9), array('10. Avoid steam burns when quenching hot metal by keeping exposed skin well away from quenching water.', array('A. True','B. False'),10), array('11. You are not permitted to weld on fuel tanks, cans or barrels without instructor approval.', array('A. True','B. False'),11), array('12. Wearing of contact lenses while arc welding is prohibited.', array('A. True','B. False'),12), array('13. Report any malfunction of a machine to your instructor such as:', array('A. Hot leads.','B. Electric short.','C. Unusual noises.','D. All of the above.'),13), array('14. Electrical shock can happen if an arc occurs between', array('A. electrode holder.','B. ground clamp.','C. table.','D. all of the above.'),14));
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
<div><font size=5><b>Electric Arc Welding</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Electric Arc Welding' /><input type='hidden' name='tn' value=6 />";
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