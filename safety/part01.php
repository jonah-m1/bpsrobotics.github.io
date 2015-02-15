<html>
<head>
<title>General Safety</title>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$questions = array(array('1. Eye protection must be worn at all times in the metal shop.', array('A. True', 'B. False'),1), array('2. Learn procedures to follow in case of fire or accidents.', array('A. True', 'B. False'),2), array('3. Operate machines only after:', array('A. Receiving instruction and passing each safety test with 100% accuracy.', 'B. Understanding how it operates.', 'C. Having teachers permission.', 'D. All of the above are correct.'),3), array('4. Machines are not to be operated while the teacher is out of the room.', array('A. True', 'B. False'),4), array('5. Immediately report any injury or accident, regardless of how minor, to the:', array('A. Coach', 'B. School Nurse', 'C. Counselor', 'D. Teacher'),5), array('. Handle sharp-edged and pointed tools with care.', array('A. True',  'B. False'),6), array('7. Notify the _________ when you find a tool or machine that is out of adjustment:', array('A. Custodian', 'B. Principal', 'C. Teacher', 'D. Counselor'),7), array('8. Adjustments and measurements must be made when the:', array('A. Machine is at a dead stop.', 'B. Machine is not at full stop.', 'C. Switch is on.', 'D. Switch is off but the machine is still coasting.'),8), array('9. Electrical tools require special rules such as:', array('A. Being sure the switch is in the "off" position before you "plug in" the cord.', 'B. Making sure the area is clean and dry.', 'C. Removing any flammable liquids from area.', 'D. All of the above.'),9), array('10. Your undivided attention must be given to:', array('A. The machine you are using.', 'B. Nearby friends.', 'C. The intercom system', 'D. Whats going on outside.'),10), array('11. Start and stop your own machine and remain with it until the:', array('A. Machine is not at full power.', 'B. Machine is at a dead stop.', 'C. Switch is on.', 'D. Switch is off but is still coasting.'),11), array('12. Before the job is complete:', array('A. Machines, Benches, and floors must be clear.', 'B. Tools are clean and returned to proper storage place', 'C. Scraps and unused materials are properly stored', 'D. All of the above are correct'),12), array('13. You will be held responsible for vandalism.', array('A. True', 'B. False'),13), array('14. Metal is to be considered hot in which areas?', array('A. Welding', 'B. Foundry', 'C. Forging', 'D. All of the above'),14), array('15. Compressed air is very dangerous. Students using compressed air should:', array('A. Wear safety glasses.', 'B. Avoid blowing sandust toward themselves or anyone else.', 'C. Never clean off their clothes or others.', 'D. All of the above are correct.'),15), array('16. While in the shop:', array('A. Use tools for their intended purpose and conduct yourself in a workman-like manner.', 'B. Consider any metal that has been worked to be sharp and/or hot.', 'C. Lost clothing, long hair, and accessories may cause accidents around machinery.', 'D. All of the above are correct'),16), array('17. If you are uncertain about the set-up or any aspect of the operation you should:', array('A. Go ahead and try the operation.', 'B. Check with your teacher before proceeding.', 'C. Call the machine manufacturer.', 'D. None of the above.'),17));
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
<div><font size=5><b>General Safety</b></font></div>
<?php

function createQuestions() { //Creates the Questions
	global $results, $questions, $length;
	echo "<form name=questions action=$results method='post'>";
	for ($i=0;$i<$length;$i++) {
		$q=$i+1;
		$k = $questions[$i][2];
		$num_answers = count($questions[$i][1]);
		//echo "<form name='q$q'>";
		echo "<a id='q$k' /><b>" . $questions[$i][0] . "</b><br />";
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
		echo "<br /></br />";
	}
	echo "</form>";
}
createQuestions();
//Create Submit Button
$continue = 1;
echo "<form id='results' action='results.php' method='post'><input type='hidden' name='t' value='General Safety' /><input type='hidden' name='tn' value=1 />";
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
