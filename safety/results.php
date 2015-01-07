<html>
<head>
<title>
<?php
$test = $_POST["t"];
$tn = $_POST["tn"];
echo $test;
?>
</title>
</head>
<body>
<?php
echo "<div><font size=5><b>$test</b></font></div>";
$answers = array(array('A. True','A. True','D. All of the above are correct.','A. True','A. Coach','A. True','C. Teacher','A. Machine is at a dead stop.','D. All of the above.','A. The machine you are using.','B. Machine is at a dead stop.','D. All of the above are correct','A. True','D. All of the above','D. All of the above are correct.','D. All of the above are correct','B. Check with your teacher before proceeding.'),array('D. all of the above.','C. operators position.','C. 4 inches','A. True','A. True','A. True','D. all of the above.','B. check with your teacher before proceeding.','A. True'),array('A. True','A. True','A. True','A. True','A. off','A. securely clamped or held in a vice.','A. True','C. release the trigger switch.','D. all of the above.','A. True','D. All of the above.','B. check with your teacher before proceeding.'),array('D. all of the above.','A. True','A. True','C. step back and turn off power.','A. True','D. all of the above.','A. True','D. All of the above.','A. True','A. ease up on the feed pressure when the bit starts to break through the material.','D. any of the above.','C. brush','D. all of the above are correct.','B. check with your teacher before proceeding.'),array('C. get teacher permission.','A. True','A. True','A. True','B. acetylene','D. all of the above.','B. report to instructor immediately.','D. all of the above.','B. lighting the torch.','A. True','C. steam','A. True','D. away from you and others.','A. True','A. True','A. True','C. 15 p.s.i.','A. True','A. True','A. True','B. check with your teacher before proceeding.','A. True'),array('D. get permission from the teacher.','B. in the welding booth or protected area (barrier shields).','A. True','A. True','D. combustible material and flammable liquids.','B. wet floor.','D. All of the above.','A. True','B. check with your teacher before proceeding.','A. True','A. True','A. True','D. All of the above.','D. all of the above.'),array('D. all of the above.','C. operators position.','C. 4 inches','A. True','A. True','A. True','D. all of the above.','B. check with your teacher before proceeding.','A. True'),array('D. all of the above.','A. True','B. purge','C. "hot"','D. all of the above.','A. cool hot metal.','B. check with your teacher before proceeding.','A. True','D. Metal screen face shield.','A. True'),array('D. all of the above.','C. 1/16" to 1/8" away from the belt or wheel.','C. 1/4"','A. True','A. True','D. all of the above.','D. all of the above.','A. True','A. True','A. True','B. check with your teacher before proceeding.','A. True','B. before you start.'),array('A. True','A. True','A. True','D. All of the above are correct.','D. 2','B. have the teacher check your set-up.','C. should a blade break, pieces may fly in that direction.','A. the coolant does not spill on the floor.','A. True','D. All of the above.','A. True','B. check with your teacher before proceeding.','D. All of the above.'),array('A. True','A. True','A. variable speed which must be set with machine running.','C. A and B are correct.','A. True','A. True','A. True','D. All of the above.','C. both size and type of metal.','A. True','A. True','A. True','A. True','A. True','A. True','B. check with your teacher before proceeding.','A. True','A. True','A. True','A. True'),array('D. obtain teacher permission.','A. True','A. you have permission.','A. True','A. a vice.','A. True','A. hand.','D. All of the above.','A. True','A. True','A. True','A. True','A. True','B. check with your teacher before proceeding.'),array('C. obtain teacher permission.','A. True','D. All of the above.','A. True','D. All of the above.','A. True','B. check with your teacher before proceeding.','A. True','A. True','D. All of the above are correct.','A. True','A. True').array('A. True','A. True','D. All of the above.','A. True','D. All of the above.','D. the wheel to break.','A. True','C. full','D. All of the above.','D. All of the above.','B. check with your teacher before proceeding.'),array('A. True','A. True','D. All of the above.','A. True','D. All of the above.','A. True','B. Check with your teacher before proceeding.','A. True','B. False','A. True','D. All of the above.','A. True'),array('D. both A and B above.','D. All of the above are correct.','A. True','D. All of the above.','D. both A and B above.','A. True','B. False','E. both B and C above','B. check with your teacher before proceeding.','A. True','A. True'),array('A. True','C. the rays are twice as strong as regular arc.','B. burned (as sunburn).','A. True','D. All of the above.','A. True','C. arc flashes.','A. type','D. B and C above.','A. True','A. True','D. teacher','A. True','B. from flashing into others eyes.','A. True','A. True','D. All of the above.','B. check with your teacher before proceeding.','A. True','A. True','A. True'));
echo "<table border=2><tr><th>Question</th><th>Answer</th></tr>";
$kitteny=1;
$ratio = array(0,0);
for($i=1;$i<25;$i++) {
	$questionNumber = $_POST[$i];
	$result = $_POST['q' . $i];
	$correct = $answers[$tn-1][$questionNumber-1];
	if ($result != '') {
		if ($kitteny==1) {
			echo "<tr bgcolor='#CCCCCC'>";
			$kitteny = 2;
		} elseif ($kitteny==2) {
			echo "<tr bgcolor='#FFFFFF'>";
			$kitteny = 1;
		}
	if ($result == $correct) {
		if ($tn <= 9) {
			echo "<td><a href='part0";
		} else {
			echo "<td><a href='part";
		}
		echo "$tn.php#q$questionNumber'>$questionNumber</td><td>$result</td></tr>";
		$ratio[0] += 1;
		$ratio[1] += 1;
	} else {
	if ($tn <= 9) {
			echo "<td><a href='part0";
		} else {
			echo "<td><a href='part";
		}
		echo "$tn.php#q$questionNumber'><font color='red'>$questionNumber</font></td><td><font color='red'>$result</font></td></tr>";
		$ratio[1] += 1;
	}
	}
}
echo $ratio[0] . "/" . $ratio[1] . " Correct. Click the question number to jump to that question.";
?>
</table>
</body>
</html>