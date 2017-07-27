<?php

// For reading courses (single query)
require('db_login_connect.php');

// For grabbing course information (multiple queries)
require('db_connect.php');

$read_courses = "SELECT b.course_id, a.* FROM students a JOIN enrolled_in b ON b.pen = a.pen WHERE a.username = '$login_session'";

$result = mysqli_query($cntn, $read_courses); 

if (!$result) {
	die("Database query has failed.".mysqli_error($cntn));
}

while($row  = mysqli_fetch_array($result)) {

	$c = array($row["course_id"]);

	echo "<div class = 'course-links'>";
	if (in_array("ENG11",$c)) {
		$read_course_info_query = "SELECT a.sin, a.lastname, a.firstname, c.course_id, c.course_desc FROM teachers a JOIN teaches b on a.sin = b.sin JOIN courselist c on b.course_id = c.course_id WHERE c.course_id = 'ENG11';";
		$read_course_info = mysqli_query($connection,$read_course_info_query);
		$row1 = mysqli_fetch_array($read_course_info);

		echo "<a href = '"."./eng11.php"."'><h3>English 11 (Term 1) </h3></a>";
		echo "<p class = 'teacher-label'> Mr. ".$row1['firstname']." ".$row1['lastname']."</p>";
		if (strlen($row1['course_desc']) >= 250) {
			echo "<p class = 'course-desc'>".substr($row1['course_desc'],0,250)." ...</p>"; 
		}else {
			echo $row1['course_desc'];
		}
	} else if (in_array("SOC10",$c)) {
		$read_course_info_query = "SELECT a.sin, a.lastname, a.firstname, c.course_id, c.course_desc FROM teachers a JOIN teaches b on a.sin = b.sin JOIN courselist c on b.course_id = c.course_id WHERE c.course_id = 'SOC10';";
		$read_course_info = mysqli_query($connection,$read_course_info_query);
		$row2 = mysqli_fetch_array($read_course_info);

		echo "<a href = '"."./soc10.php"."'><h3>Social Studies 10 (Term 2) </h3></a>";
		echo "<p class = 'teacher-label'> Ms. ".$row2['firstname']." ".$row2['lastname']."</p>";
		if (strlen($row2['course_desc']) >= 250) {
			echo "<p class = 'course-desc'>".substr($row2['course_desc'],0,250)." ...</p>"; 
		}else {
			echo $row2['course_desc'];
		}
	} else if (in_array("PC12",$c)) {
		$read_course_info_query = "SELECT a.sin, a.lastname, a.firstname, c.course_id, c.course_desc FROM teachers a JOIN teaches b on a.sin = b.sin JOIN courselist c on b.course_id = c.course_id WHERE c.course_id = 'PC12';";
		$read_course_info = mysqli_query($connection,$read_course_info_query);
		$row3 = mysqli_fetch_array($read_course_info);

		echo "<a href = '"."./pc12.php"."'><h3>Pre-Calculus 12 (Term 1) </h3></a>";
		echo "<p class = 'teacher-label'> Mrs. ".$row3['firstname']." ".$row3['lastname']."</p>";
		if (strlen($row3['course_desc']) >= 250) {
			echo "<p class = 'course-desc'>".substr($row3['course_desc'],0,250)." ...</p>"; 
		} else {
			echo $row3['course_desc'];
		}
	} else if (in_array("VA10",$c)) {
		$read_course_info_query = "SELECT a.sin, a.lastname, a.firstname, c.course_id, c.course_desc FROM teachers a JOIN teaches b on a.sin = b.sin JOIN courselist c on b.course_id = c.course_id WHERE c.course_id = 'VA10';";
		$read_course_info = mysqli_query($connection,$read_course_info_query);
		$row4 = mysqli_fetch_array($read_course_info);

		echo "<a href = '"."./va10.php"."'><h3>Visual Arts 10 (Summer) </h3></a>";
		echo "<p class = 'teacher-label'> Mr. ".$row4['firstname']." ".$row4['lastname']."</p>";

		if (strlen($row4['course_desc']) >= 250) {
			echo "<p class = 'course-desc'>".substr($row4['course_desc'],0,250)." ...</p>"; 
		} else {
			echo $row4['course_desc'];
		}
	}
	echo "</div>";

}

mysqli_free_result($result);

mysqli_close($cntn);

?>