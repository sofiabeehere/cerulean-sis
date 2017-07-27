<?php

//Generates random temporary passwords for new users
//Cite: http://codepad.org/UL8k4aYK
function randomPassword() {
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 8; $i++) {
	    $n = rand(0, $alphaLength);
	    $pass[] = $alphabet[$n];
	}
	return implode($pass); //turn the array into a string
}

//1. Check and filter data coming form the user

//Optional fields:
$preferred_name = trim($_POST['preferred_name']);
$middle_name = trim($_POST['middle_name']);

if(!get_magic_quotes_gpc()){

	// All text field names
	$fields = array($first_name,$preferred_name,$middle_name,$family_name, $dob, $email_address, $gender, $country_of_birth,$student_phone_number,$first_nations,$pen,$previous_school_name,$iep,$grade_level,$program_type,$previous_school_contact,$gifted);

	// Loop over field names
	foreach($fields as $field) {
		$field = addslashes($field);
	}

}


//2. Create a database connection
include("db_connect.php");
$connect_data = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded 
if($connect_data->connect_errno) { 
	// if connection failed, skip the rest of PHP code, and print an error 
	die("Database connection failed: " . 
		$connect_data->connect_error . 
	" (" . $connect_data->connect_errno . ")" 
		); 
} 

	//Generate unique username (all lowercase and no spaces) and random temporary possword, both of which will be displayed after form submission
	$username = strtolower($first_name[0].str_replace(' ', '', $family_name)); //ex. sbautista
	$password = randomPassword();

//3. Perform database query
//Inserts all inputted student information by the registering user
$insert_data_query = "INSERT INTO students values ('".$pen."','".$family_name."', '".$first_name."', '".$preferred_name."', '".$middle_name."', '".$dob."', '".$country_of_birth."', '".$email_address."', '".$student_phone_number."', '".$gender."', '".$first_nations."', '".$grade_level."', '".$program_type."', '".$previous_school_name."', '".$previous_school_contact."', '".$iep."', '".$gifted."', '".$username."', SHA1('".$password."'));";

//Checks if registering user lives with a parent/guardian and insert their info based on selection in form
if(isset($_POST['student_lives_with_mother'])) {

	$insert_data_query .= "INSERT INTO parents_guardians values ('".$mother_first_name." ".$mother_family_name."', '".$mother_cellphone_number."', '".$mother_phone_number."', '".$mother_street_address.", ".$mother_city." ".$mother_province.", ".$mother_postal_code."', '".$mother."', '".$pen."');";

} else if (isset($_POST['student_lives_with_father'])) {

	$insert_data_query .= "INSERT INTO parents_guardians values ('".$father_first_name." ".$father_family_name."', '".$father_cellphone_number."', '".$father_phone_number."', '".$father_street_address.", ".$father_city." ".$father_province.", ".$father_postal_code."', '".$father."', '".$pen."');";

} else if (isset($_POST['student_lives_with_guardian'])) {

	$insert_data_query .= "INSERT INTO parents_guardians values ('".$parent_first_name." ".$parent_family_name."', '".$parent_cellphone_number."', '".$parent_phone_number."', '".$parent_street_address.", ".$parent_city." ".$parent_province.", ".$parent_postal_code."', '".$parent."', '".$pen."');";

}

//Checks if there are any high school courses in the "enrolled_high_school_courses" array list for each registering user
if (($_POST['grade_level'] == "8" || $_POST['grade_level'] == "9" || $_POST['grade_level'] == "10" || $_POST['grade_level'] == "11" || $_POST['grade_level'] == "12")) {
	if (isset($_POST['enrolled_high_school_courses']) && in_array('ENG11', $_POST['enrolled_high_school_courses'])) {
		$insert_data_query .= "INSERT INTO enrolled_in VALUES ('ENG11', '".$pen."');";
	} else if (isset($_POST['enrolled_high_school_courses']) && in_array('SOC10', $_POST['enrolled_high_school_courses'])) {
		$insert_data_query .= "INSERT INTO enrolled_in VALUES ('SOC10', '".$pen."');";
	} else if (isset($_POST['enrolled_high_school_courses']) && in_array('PC12', $_POST['enrolled_high_school_courses'])) {
		$insert_data_query .= "INSERT INTO enrolled_in VALUES ('PC12', '".$pen."');";
	} else if (isset($_POST['enrolled_high_school_courses']) && in_array('VA10', $_POST['enrolled_high_school_courses'])) {
		$insert_data_query .= "INSERT INTO enrolled_in VALUES ('VA10', '".$pen."');";
	}
}

$insert_data = $connect_data->multi_query($insert_data_query);

	if ($insert_data) {
		do {
			/* store first result set */
			if ($result = $connect_data->store_result()) {
				while ($row = $result->fetch_row()) {
					printf("%s\n", $row[0]);
				}
				$result->free();
			}
			/* print divider */
			if ($connect_data->more_results()) {
				printf("-----------------\n");
			}
		} while ($connect_data->next_result());

		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['pswd'] = $password;
		header("location: ../project3/application-submitted.php");

	} else {
		//echo "Data insertion failed."."<br/>";
	}

//6. Close database connection
$connect_data->close();

?>