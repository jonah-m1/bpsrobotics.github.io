<html>
<head>
<title>Gas Arc Welding (TIG and MIG)</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Teacher permission is required before using the gas arc welder', array('A. True','B. False'),1), array('2. A welding helmet with a shade 12 or shade 14 lens must be used when gas arc welding because', array('A. the rays are weaker than regular arc.','B. the rays are as strong as regular arc.','C. the rays are twice as strong as regular arc.','D. None of the above.'),2), array('3. Skin areas not covered with proper protective clothing while gas arc welding may be', array('A. unaffected.','B. burned (as sunburn).','C. wrinkled.','D. None of the above.'),3), array('4. Do not use welder if floor is wet or damp. Report any water leaks to your teacher.', array('A. True','B. False'),4), array('5. Flammables such as __________ must be removed from the welding area.', array('A. synthetic clothing','B. matches, lighters','C. Rags, cardboard','D. All of the above.'),5), array('6. Never weld on fuel tanks or cans.', array('A. True','B. False'),6), array('7. Some gas mixtures contain oxygen which self combusts with', array('A. oil and grease.','B. barrier shields.','C. arc flashes.','D. None of the above.'),7), array('8. Use the proper connections for connecting regulators and hoses to the cylinder. They will vary according to the __________ of gas used.', array('A. type','B. color','C. smell','D. None of the above.'),8), array('9. An operator should make certain that the regulator pressure screw is released or that the flowmeter valve is closed before opening the cylinder valve because it is', array('A. a shortcut.','B. essential to the operators safety.','C. essential to the equipments operation and longevity.','D. B and C above.'),9), array('10. Care should be taken to never have a common ground on MIG and TIG units.', array('A. True','B. False'),10), array('11. Make certain that the gas cylinder is chained or secured; screw on bottle cap for storage or moving.', array('A. True','B. False'),11), array('12. Report any malfunction of the machine to __________.', array('A. counselor','B. custodian','C. foreman','D. teacher'),12), array('13. You should always warn others before you strike the arc.', array('A. True','B. False'),13), array('14. Using a barrier shield prevents the arc', array('A. from working.','B. from flashing into others eyes.','C. from firing.'),14), array('15. Always use pliers or tongs for handling hot materials.', array('A. True','B. False'),15), array('16. Treat all metal, tools, tables, and equipment as if they were hot.', array('A. True','B. False'),16), array('17. When finished', array('A. close cylinder valve.','B. shut off water and electricity.','C. return all equipment and clean up area.','D. All of the above.'),17), array('18. If you are uncertain about the set-up or any aspect of the operation, you must', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),18), array('19. To avoid unnecessary electrical short circuits hang up gun or torch; do not lay on table, work piece, or machine.', array('A. True','B. False'),19), array('20. Avoid steam burns when quenching hot metal by keeping exposed skin well away from quenching water.', array('A. True','B. False'),20), array('21. Hot metal left unattended must be marked "HOT" with chalk.', array('A. True','B. False'),21));
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
<div><font size=5><b>Gas Arc Welding (TIG and MIG)</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Gas Arc Welding (TIG and MIG)' /><input type='hidden' name='tn' value=17 />";
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