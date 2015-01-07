<html>
<head>
<title>Metal Cut Off Saw</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Teacher permission is required before using the metal cut-off saw.', array('A. True','B. False'),1), array('2. Proper eye safety consists of safety glasses with side shields and face shield.', array('A. True','B. False'),2), array('3. What must be done with the metal cut-off saw at a dead stop?', array('A. adjustments','B. measurements','C. all clamping','D. All of the above.'),3), array('4. It is desirable to test a new cut-off wheel for cracks by using the ring test before mounting.', array('A. True','B. False'),4), array('5. Blotters are necessary between wheel and flanges because', array('A. the wheel is held more firmly.','B. the wheel is in better alignment.','C. the blotters absorb shock better than steel.','D. All of the above.'),5), array('6. Tightening of flanges of unequal diameter may cause', array('A. the wheel to cup.','B. the wheel to warp.','C. the wheel to become misaligned.','D. the wheel to break.'),6), array('7. Tighten the spindle nut carefully. The wheel can be broken by over tightening.', array('A. True','B. False'),7), array('8. Allow the blade to reach __________ speed before starting the cut.', array('A. half','B. two-thirds','C. full','D. three-fourths'),8), array('9. Crowding the machine beyond its capacity can cause', array('A. overheating.','B. breakage.','C. irregular cuts.','D. All of the above.'),9), array('10. Keep floor area around the metal cut-off saw', array('A. clear of scraps.','B. cleaned of coolant spills.','C. clear of unused materials.','D. All of the above.'),10), array('11. If you are uncertain about the set-up or any aspect of the operation, you must', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),11));
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
<div><font size=5><b>Metal Cut Off Saw</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Metal Cut Off Saw' /><input type='hidden' name='tn' value=14 />";
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