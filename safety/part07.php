<html>
<head>
<title>Foundry</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Before using the foundry:', array('A. Obtain teacher permission and supervision.','B. Wear proper eye protection.','C. Wear proper protective clothing.','D. All of the above.'),1), array('2. Always treat crucibles, flasks, castings, and other equipment as if they were hot.', array('A. True','B. False'),2), array('3. Wear proper protective clothing when handling molten metal (face shield and helmet, apron, leggings, and gloves).', array('A. True','B. False'),3), array('4. Important steps taken by the instructor before lighting furnace include:', array('A. Opening lid.','B. Purging with air.','C. Removing flammables from the area.','D. All of the above.'),4), array('5. When adding metal to a hot crucible it should be preheated', array('A. to move moisture.','B. to raise temperature.','C. to remove paint (in painted).','D. all of the above.'),5), array('6. Skimmer or ladle must be preheated before using.', array('A. True','B. False'),6), array('7. Explosions can be caused by:', array('A. molten metal hitting concrete floors.','B. molten metal in contact with water.','C. lighting the furnace with the lid closed.','D. all of the above.'),7), array('8. Prevent accidents by:', array('A. Not looking into the pour.','B. Walking forward when carrying molten metal.','C. Carrying molten metal as close to the floor as possible.','D. All of the above.'),8), array('9. Before removing crucible', array('A. shut off furnace.','B. lock tongs to crucible.','C. make sure mold is placed on grates or over sand pit.','D. pouring shank should be in place.'),9), array('10. Lock crucible to pouring shank before pouring.', array('A. True','B. False'),10), array('11. Casting may be removed from the flask after cooling (a minimum of 10 minutes for small casting) with:', array('A. Pliers.','B. Tongs.','C. Vise Grips.'),11), array('12. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),12), array('13. Never look into the pour while pouring.', array('A. True','B. False'),13));
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
<div><font size=5><b>Foundry</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Foundry' /><input type='hidden' name='tn' value=7 />";
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