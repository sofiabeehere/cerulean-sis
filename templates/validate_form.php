<!doctype html>
<head>

	<title> Cerulean Web for Schools DEMO | Form Validation </title>
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/grid.css">

</head>
<body>

<?php

	$path = "student_users.txt";
	$handle = fopen($path, "a");

	$emptyStudentFields = true;
	$emptyFamilyFields = true;
	$emptyEduFields = true;
	$emptyParentsFields = false;

	//function which explicitly validates the family information fields using arguments that depend on the type of parent/guardian selected
	function writeFamilyInfo($parent, $first_name, $family_name, $phone_number, $cellphone_number, $street_address, $city, $country, $province, $postal_code) {

		$path = "student_users.txt";
		$handle = fopen($path, "a");

		//validates parent first name and last name fields
		if((!empty($first_name) && !empty($family_name))){
			$emptyFamilyFields = false;
		} else {
			echo "<label class = 'warning-label'>- ".$parent."'s first name AND/OR family name</label><br>";
		}

		//validates at least one parent contact number
		if((preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone_number) && !empty($phone_number))) {
			$emptyFamilyFields = false;
		} else if ((preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $cellphone_number) && !empty($cellphone_number))) {
			$emptyFamilyFields = false;
		} else {
			echo "<label class = 'warning-label'>- ".$parent."'s phone or cellphone number</label><br/>";
		}

		//validates parent street address field
		if(!empty($street_address)) {
			$emptyFamilyFields = false;
		} else {
			echo "<label class = 'warning-label'>- ".$parent."'s street address</label><br/>";
		}

		//validates parent city field
		if(!empty($city)) {
			$emptyFamilyFields = false;
		} else {
			echo "<label class = 'warning-label'>- ".$parent."'s city</label><br/>";
		}

		//validates parent country of residence field
		if (($country  !== "-1" && isset($country))) {
			$emptyFamilyFields = false;
			if ($province  !== "-1") {
				$emptyFamilyFields = false;


			} else {
				echo "<label class = 'warning-label'>- ".$parent."'s province</label><br/>";
			}
		} else {
			echo "<label class = 'warning-label'>- ".$parent."'s country of residence</label><br/>";
		}

		if(!empty($postal_code)) {
			$emptyFamilyFields = false;
		} else {
			echo "<label class = 'warning-label'>- ".$parent."'s postal code</label><br/>";
		}

	}

	if (isset($_POST["submit"])) {

			// Required field names
			$required = array('first_name', 'family_name', 'dob', 'email_address', 'gender', 'country_of_birth','phone_number','first_nations','pen','previous_school_name','iep','grade_level','program_type','previous_school_contact','gifted');

			// Loop over field names, make sure each one exists and is not empty
			$emptyFields = false;
			foreach($required as $field) {
				if (empty($_POST[$field])) {
					$emptyFields = true;
				}
			}

			if ($emptyFields || $emptyParentsFields) {
				echo"<label class = 'warning-label' style = 'font-weight: bold; padding: 0 27%;'>Your application has not been submitted.</label><br/>";
				echo "<label class = 'warning-label' style = 'padding: 0 15%;'>The following required fields are empty or not formatted correctly:</label><br/>";
				echo "<pre style = 'margin: 0;'> </pre>"; 
			}

		// STUDENT INFORMATION SECTION

			if ($emptyStudentFields && $emptyFields) {
				echo "<label class = 'warning-label' style = 'font-style: normal;'>STUDENT INFORMATION:</label><br/>";
			}

		//validates first name and family name fields (preferred name and middle name fields are optional)
		if(!empty($_POST['first_name']) && !empty($_POST['family_name']) ){
			$emptyStudentFields = false;
			$first_name = trim($_POST['first_name']);
			$family_name = trim($_POST['family_name']);
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student first name AND/OR family name </label><br>";
		}

		//validates date of birth field
		if (!empty($_POST['dob'])) {
			list($dd,$mm,$yyyy) = explode('/',$_POST['dob']);
			$emptyStudentFields = false;
			if (checkdate($mm,$dd,$yyyy)) {
				$dob = trim($_POST['dob']);

			}
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student date of birth</label><br/>";
		}

		//validates email address field
		if(!empty($_POST['email_address']) && filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) {
			$emptyStudentFields = false;
			$email_address = trim($_POST['email_address']);
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student email address</label><br/>";
		}

		//validates gender field
		if (isset($_POST['gender'])) {
			$emptyStudentFields = false;
			$gender = trim($_POST['gender']);
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student gender</label><br/>";
		}

		//validates country of birth field
		if ($_POST['country_of_birth'] !== "-1" && isset($_POST['country_of_birth'])) {
			$emptyStudentFields = false;
			$country_of_birth = trim($_POST['country_of_birth']);
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student country of birth</label><br/>";
		}

		//validates phone number field
		if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['phone_number'])) {
			$emptyStudentFields = false;
			$student_phone_number = trim($_POST['phone_number']);
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student phone number</label><br/>";
		}

		//validates first nations status field
		if (isset($_POST['first_nations'])) {
			$emptyStudentFields = false;
			$first_nations = trim($_POST['first_nations']);
		} else {
			$emptyStudentFields = true;
			echo "<label class = 'warning-label'>- Student first nations status</label><br/>";
		}

		//FAMILY INFORMATION SECTION

		if($emptyFamilyFields && $emptyFields){
			//echo "<div class = 'grid-col-30of100'>";
			echo "<label class = 'warning-label' style = 'font-style: normal;'>FAMILY INFORMATION:</label><br/>";
		}

		//validates at least option was checked for "Student lives with:" field
		if(isset($_POST['student_lives_with_mother']) || isset($_POST['student_lives_with_father']) || isset($_POST['student_lives_with_guardian'])) {
			$emptyFamilyFields = false;
			if(isset($_POST['student_lives_with_mother'])) {
				$mother = "mother";
				$mother_first_name = trim($_POST['mother_first_name']);
				$mother_family_name = trim($_POST['mother_family_name']);
				$mother_phone_number = trim($_POST['mother_phone_number']);
				$mother_cellphone_number = trim($_POST['mother_cellphone_number']);
				$mother_street_address = trim($_POST['mother_street_address']);
				$mother_city = trim($_POST['mother_city']);
				$mother_country = trim($_POST['mother_country']);
				if (isset($_POST['mother_province'])) {
					$mother_province = trim($_POST['mother_province']);
				} else {
					$mother_province = "-1";
				}
				$mother_postal_code = trim($_POST['mother_postal_code']);

				if (!get_magic_quotes_gpc()) {
					$mother = addslashes($mother);
					$mother_first_name = addslashes($mother_first_name);
					$mother_family_name = addslashes($mother_family_name);
					$mother_phone_number = addslashes($mother_phone_number);
					$mother_cellphone_number = addslashes($mother_cellphone_number);
					$mother_street_address = addslashes($mother_street_address);
					$mother_city = addslashes($mother_city);
					$mother_country = addslashes($mother_country);
					$mother_province = addslashes($mother_province);
					$mother_postal_code = addslashes($mother_postal_code);
				}

				writeFamilyInfo($mother, $mother_first_name, $mother_family_name, $mother_phone_number, $mother_cellphone_number, $mother_street_address, $mother_city, $mother_country, $mother_province, $mother_postal_code);

			} 

			if(isset($_POST['student_lives_with_father'])) {
				$father = "father";
				$father_first_name = trim($_POST['father_first_name']);
				$father_family_name = trim($_POST['father_family_name']);
				$father_phone_number = trim($_POST['father_phone_number']);
				$father_cellphone_number = trim($_POST['father_cellphone_number']);
				$father_street_address = trim($_POST['father_street_address']);
				$father_city = trim($_POST['father_city']);
				$father_country = trim($_POST['father_country']);
				if (isset($_POST['father_province'])) {
					$father_province = trim($_POST['father_province']);
				} else {
					$father_province = "-1";
				}
				$father_postal_code = trim($_POST['father_postal_code']);

				if (!get_magic_quotes_gpc()) {
					$father = addslashes($father);
					$father_first_name = addslashes($father_first_name);
					$father_family_name = addslashes($father_family_name);
					$father_phone_number = addslashes($father_phone_number);
					$father_cellphone_number = addslashes($father_cellphone_number);
					$father_street_address = addslashes($father_street_address);
					$father_city = addslashes($father_city);
					$father_country = addslashes($father_country);
					$father_province = addslashes($father_province);
					$father_postal_code = addslashes($father_postal_code);
				}

				writeFamilyInfo($father, $father_first_name, $father_family_name, $father_phone_number, $father_cellphone_number, $father_street_address, $father_city, $father_country, $father_province, $father_postal_code);
			} 

			if(isset($_POST['student_lives_with_guardian'])) {
				$parent = "guardian";
				$parent_first_name = trim($_POST['guardian_first_name']);
				$parent_family_name = trim($_POST['guardian_family_name']);
				$parent_phone_number = trim($_POST['guardian_phone_number']);
				$parent_cellphone_number = trim($_POST['guardian_cellphone_number']);
				$parent_street_address = trim($_POST['guardian_street_address']);
				$parent_city = trim($_POST['guardian_city']);
				$parent_country = trim($_POST['guardian_country']);
				if (isset($_POST['guardian_province'])) {
					$parent_province = trim($_POST['guardian_province']);
				} else {
					$parent_province = "-1";
				}
				$parent_postal_code = trim($_POST['guardian_postal_code']);

				if (!get_magic_quotes_gpc()) {
					$parent = addslashes($parent);
					$parent_first_name = addslashes($parent_first_name);
					$parent_family_name = addslashes($parent_family_name);
					$parent_phone_number = addslashes($parent_phone_number);
					$parent_cellphone_number = addslashes($parent_cellphone_number);
					$parent_street_address = addslashes($parent_street_address);
					$parent_city = addslashes($parent_city);
					$parent_country = addslashes($parent_country);
					$parent_province = addslashes($parent_province);
					$parent_postal_code = addslashes($parent_postal_code);
				}

				writeFamilyInfo($parent, $parent_first_name, $parent_family_name, $parent_phone_number, $parent_cellphone_number, $parent_street_address, $parent_city, $parent_country, $parent_province, $parent_postal_code, $emptyParentFields);
			} 
		} else {
			echo "<label class = 'warning-label'>Please select at least one parent or guardian.</label><br/>";
		}

		//EDUCATIONAL INFORMATION SECTION

		if($emptyEduFields && $emptyFields){
			//echo "<div class = 'grid-col-30of100'>";
			echo "<label class = 'warning-label' style = 'font-style: normal;'>EDUCATIONAL INFORMATION:</label><br/>";
		}

		//validate PEN# field for 9 digits
		if (preg_match('/^[1-9]\d{8}$/', $_POST['pen']) && !empty($_POST['pen'])) {
			$emptyEduFields = false;
			$pen = trim($_POST['pen']);
		} else {
			echo "<label class = 'warning-label'>- phone number</label><br/>";
		}

		//validate previous school name field
		if (!empty($_POST['previous_school_name'])) {
			$emptyEduFields = false;
			$previous_school_name = trim($_POST['previous_school_name']);
		} else {
			echo "<label class = 'warning-label'>- previous school name</label><br/>";
		}

		//validates IEP field
		if (isset($_POST['iep'])) {
			$emptyEduFields = false;
			$iep = trim($_POST['iep']);
		} else {
			echo "<label class = 'warning-label'>- IEP</label><br/>";
		}

		//validates grade field
		if (isset($_POST['grade_level'])) {
			$emptyEduFields = false;
			$grade_level = trim($_POST['grade_level']);
			//validates enrolled high school courses field (if grade level field is within high school level - grades 8-12)
			if (($_POST['grade_level'] == "8" || $_POST['grade_level'] == "9" || $_POST['grade_level'] == "10" || $_POST['grade_level'] == "11" || $_POST['grade_level'] == "12")) {
				if (isset($_POST['enrolled_high_school_courses'])) {
					$emptyEduFields = false;
					// $enrolled_courses = array();
					// foreach ($_POST['enrolled_high_school_courses'] as $course) {
					// 	$enrolled_courses[] =  $course;
					// 	$courses = trim(implode(", ", $enrolled_courses));
					// }
				} else {
					echo "<label class = 'warning-label'>- enrolled high school courses</label><br/>";
				}
			}
		} else {
			echo "<label class = 'warning-label'>- grade</label><br/>";
		}

		//validates program type field
		if (isset($_POST['program_type'])) {
			$emptyEduFields = false;
			$program_type = trim($_POST['program_type']);
		} else {
			echo "<label class = 'warning-label'>- program type</label><br/>";
		}

		//validate previous school contact field
		if (!empty($_POST['previous_school_contact']) && preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['previous_school_contact'])) {
			$emptyEduFields = false;
			$previous_school_contact = trim($_POST['previous_school_contact']);
		} else {
			echo "<label class = 'warning-label'>- previous school contact number</label><br/>";
		}

		//validates program type field
		if (isset($_POST['gifted'])) {
			$emptyEduFields = false;
			$gifted = trim($_POST['gifted']);
		} else {
			echo "<label class = 'warning-label'>- gifted status</label><br/>";
		}

		echo "<pre style = 'margin: 0;'> </pre>";

		if (!$emptyStudentFields && !$emptyFamilyFields && !$emptyEduFields) {
			require("db_create.php");
			
			echo "<label class = 'success-label' style = 'font-weight: bold; padding: 0 15%;'>Your application for admission (SY 2017-18) has been submitted.</label><br/>";
			echo "<label class = 'success-label'>Once your application has been processed, you will receive an email with your login details to access your courses. </label>"; 

			//For direct form completion validation only:
			//echo "All fields filled.";
		} else {
			//For direct form completion validation only:
			//echo "There are empty fields!";
		}

	}

?>

<script src="js/application_form.js"></script>

</body>

</html>