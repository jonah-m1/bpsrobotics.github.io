<html>
<head>
<title>Metal Squaring Shear</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Procedures to follow before actually using the metal squaring shear should include', array('A. obtaining permission.','B. wearing proper eye protection.','C. making sure safety guard is in place.','D. all of the above.'),1), array('2. Feed and operate the squaring shear from the', array('A. side.','B. back.','C. operators position.','D. none of the above.'),2), array('3. Always keep your fingers at least _____ away from the pressure bar and blade.', array('A. 1 foot','B. 1 meter','C. 4 inches','D. 1 gauge'),3), array('4. Allow small pieces to drop; do not attempt to catch them.', array('A. True','B. False'),4), array('5. Remove burrs before working; gloves are required for handling large pieces.', array('A. True','B. False'),5), array('6. Place scraps or trimmings in metal waste container and return machine to normal position.', array('A. True','B. False'),6), array('7. Whenever two people are needed to operate the shear', array('A. one is the operator, the other is the teacher.','B. the operator is responsible for informing the teacher when cuts are to be made.','C. it is only the operator who steps on the foot pedal.','D. all of the above.'),7), array('8. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),8), array('9. Never operate any tool without the appropriate guard in place.', array('A. True','B. False'),9));
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
<div><font size=5><b>Metal Squaring Shear</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Metal Squaring Shear' /><input type='hidden' name='tn' value=2 />";
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