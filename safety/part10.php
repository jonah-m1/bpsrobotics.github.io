<html>
<head>
<title>Bandsaw Vertical/Horizontal</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Teacher permission is required before using the bandsaw.', array('A. True','B. False'),1), array('2. Eye protection must be worn when working around the bandsaw.', array('A. True','B. False'),2), array('3. Adjustments must be made with the machine at a dead stop.', array('A. True','B. False'),3), array('4. Before starting', array('A. adjust the guard to within 1/8 inch of your work.','B. plan to avoid backing out of a kerf.','C. make relief cuts if necessary.','D. All of the above are correct.'),4), array('5. Use a push stick, special "v" jig, or holding device if your fingers will come closer than ______ inches to the blade.', array('A. 1/4','B. 3','C. 16','D. 2'),5), array('6. When cutting unusual pieces of metal, you should', array('A. clamp it securely.','B. have the teacher check your set-up.','C. hold the work piece on either side of the cutting line.','D. All the above are correct.'),6), array('7. No one should stand on the right side of the bandsaw because', array('A. the lighting is better.','B. you can feed the stock faster.','C. should a blade break, pieces may fly in that direction.','D. both A and B are faster.'),7), array('8. When using the horizontal bandsaw, you should make sure that', array('A. the coolant does not spill on the floor.','B. the coolant is flowing over the band at the saw kerf.','C. you dont hold onto short pieces that are being cut off.','D. All of the above.'),8), array('9. If the blade breaks, shut off the machine and call the teacher.', array('A. True','B. False'),9), array('10. When finished cutting,', array('A. turn the machine off.','B. brake the machine to a stop.','C. clean the floor of coolant, chips, and small pieces of metal.','D. All of the above.'),10), array('11. Be careful not to crowd, cramp, twist, or bend the saw blade.', array('A. True','B. False'),11), array('12. If you are uncertain about the set-up or any aspect of the operation, you should', array('A. go ahead and try the operation.','B. check with your teacher before proceeding.','C. call the machine manufacturer.','D. None of the above.'),12), array('13. When clearing your machine of metal chips or handling a freshly cut piece of metal you should', array('A. avoid sharp edges that can cut.','B. never use your bare hands.','C. clean your machine with a brush.','D. All of the above.'),13));
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
<div><font size=5><b>Bandsaw Vertical/Horizontal</b></font></div>
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
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='Bandsaw Vertical/Horizontal' /><input type='hidden' name='tn' value=10 />";
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