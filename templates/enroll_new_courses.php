<?php

require("db_connect.php");

if(isset($_POST['enroll-btn'])) {
	if (isset($_POST['new_enrolled_high_school_courses'])) {

		$connect_courses = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		// Test if connection succeeded 
		if($connect_courses->connect_errno) { 
			// if connection failed, skip the rest of PHP code, and print an error 
			die("Database connection failed: " . 
				$connect_courses->connect_error . 
			" (" . $connect_courses->connect_errno . ")" 
				); 
		} 

		// Finds user's pen number from the "students" table
		$find_pen_query = "SELECT pen FROM students as t1 WHERE t1.username = '$login_session'";
		$find_pen = $connect_courses -> query($find_pen_query);
		$row0 = mysqli_fetch_array($find_pen);
		$user_pen = $row0['pen'];

		//echo $user_pen;

		// Inserts new enrollment using course code and user's pen number into 'enrolled_in' table
		$insert_data_query = "";
 		if (isset($_POST['new_enrolled_high_school_courses']) && in_array('ENG11', $_POST['new_enrolled_high_school_courses'])) {
		$insert_data_query = "INSERT INTO enrolled_in VALUES ('ENG11', '$user_pen');";
		} else if (isset($_POST['new_enrolled_high_school_courses']) && in_array('SOC10', $_POST['new_enrolled_high_school_courses'])) {
			$insert_data_query .= "INSERT INTO enrolled_in VALUES ('SOC10', '$user_pen');";
		} else if (isset($_POST['new_enrolled_high_school_courses']) && in_array('PC12', $_POST['new_enrolled_high_school_courses'])) {
			$insert_data_query .= "INSERT INTO enrolled_in VALUES ('PC12', '$user_pen');";
		} else if (isset($_POST['new_enrolled_high_school_courses']) && in_array('VA10', $_POST['new_enrolled_high_school_courses'])) {
			$insert_data_query .= "INSERT INTO enrolled_in VALUES ('VA10', '$user_pen');";
		}

		$insert_data = $connect_courses->multi_query($insert_data_query);

		if ($insert_data) {
			do {
				/* store first result set */
				if ($result = $connect_courses->store_result()) {
					while ($row = $result->fetch_row()) {
						printf("%s\n", $row[0]);
					}
					$result->free();
				}
				/* print divider */
				if ($connect_courses->more_results()) {
					printf("-----------------\n");
				}
			} while ($connect_courses->next_result());


		} else {
			//echo "Data insertion failed."."<br/>";
		}

		//6. Close database connection
		$connect_courses->close();

	} else {
		echo "<label class = 'warning-label'>- enrolled high school courses</label><br/>";
	}
}



?>