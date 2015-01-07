<html>
<head>
<title>Oxy/Acetylene Welding</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. The first thing to do before gas welding is', array('A. turn on the gas.','B. light the torch.','C. get teacher permission.','D. heat the metal.'),1), array('2. Welding equipment must be kept clean of grease and oil.', array('A. True','B. False'),2), array('3. Oxy-acetylene welding goggles must be worn over safety glasses when gas cutting or welding.', array('A. True','B. False'),3), array('4. It is important to keep sparks and flame away from cylinders and hoses.', array('A. True','B. False'),4), array('5. Which valve is closed first when turning off the torch?', array('A. air','B. acetylene','C. oxygen','D. it doesnt make any difference.'),5), array('6. Extreme caution must be used when moving portable carts because', array('A. the safety chain may not be secured.','B. you may be moving into a flammable material area.','C. a broken compressed gas bottle can become a rocket.','D. all of the above.'),6), array('7. If a leak is noted in a connection or tank', array('A. pay no attention, no harm will be done.','B. report to instructor immediately.','C. tell classmates.','D. go tell the custodian.'),7), array('8. Which of the following must be kept away from the work area?', array('A. oil and grease','B. combustibles and flammable liquids','C. other students without properly shaded lens protection','D. all of the above.'),8), array('9. Always release regulator pressure screws before', array('A. opening cylinder valves.','B. lighting the torch.','C. using the friction lighter.','D. none of the above.'),9), array('10. Open the acetylene cylinder valve 1/4 to 1/2 turn.', array('A. True','B. False'),10), array('11. Cooling hot metal in water can cause __________ burns.', array('A. sun','B. ultraviolet','C. steam','D. floor'),11), array('12. To light a torch use a friction lighter only.', array('A. True','B. False'),12), array('13. Always point the torch', array('A. toward the ceiling.','B. toward the door.','C. any direction that is convenient.','D. away from you and others.'),13), array('14. When the cylinder is equipped with a wrench, it must be in place for emergency shut off.', array('A. True','B. False'),14), array('15. Welding galvanized items must not be done without special supervision.', array('A. True','B. False'),15), array('16. To safely operate cylinder valves, turn on slowly and stand to one side.', array('A. True','B. False'),16), array('17. Acetylene pressure must be kept below', array('A. 6 kilograms per square centimeter.','B. 10 milliamps per second.','C. 15 p.s.i.','D. none of the above.'),17), array('18. Closed containers are hazardous to weld or repair.', array('A. True','B. False'),18), array('19. Material being cut on concrete floors can cause the floor to explode.', array('A. True','B. False'),19), array('20. Always consider metal found in the welding area to be hot.', array('A. True','B. False'),20), array('21. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),21), array('22. To avoid breathing fumes, make sure the ventilation system is working.', array('A. True','B. False'),22));
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
<div><font size=5><b>Oxy/Acetylene Welding</b></font></div>
<?php

function createQuestions() { //Creates the Questions
	global $results, $questions, $length;
	echo "<form name=questions action=$results method='post'>";
	for ($i=0;$i<$length;$i++) {
		$q=$i+1;
		$num_answers = count($questions[$i][1]);
		//echo "<form name='q$q'>";
		echo "<a id='q$q' />" . $questions[$i][0] . "<br />";
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Oxy/Acetylene Welding' /><input type='hidden' name='tn' value=5 />";
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