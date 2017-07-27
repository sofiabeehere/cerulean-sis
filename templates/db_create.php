<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

$connect  = mysqli_connect($dbhost, $dbuser, $dbpass);

if (mysqli_connect_errno()) {
	die("Database connection failed: ".mysqli_connect_error());
}
//echo "Database connection successful."."<br/>";

//Set-up a connection to the appropriate database
$create_db = "CREATE DATABASE IF NOT EXISTS sbautist";
$connect_db = mysqli_query($connect, $create_db);

if ($connect_db) {

	//Perform database query
	$query = "CREATE TABLE IF NOT EXISTS departments (
			  dept_id int(2) NOT NULL UNIQUE,
			  dept_name char(20) NOT NULL,
			  PRIMARY KEY (dept_id));";

	$query .= "CREATE TABLE IF NOT EXISTS students (
			  pen int(9) NOT NULL UNIQUE,
			  lastname varchar(100) NOT NULL,
			  firstname varchar(100) NOT NULL,
			  preferredname varchar(100) DEFAULT NULL,
			  middlename varchar(100) DEFAULT NULL,
			  dob varchar(10) NOT NULL,
			  country_birth varchar(100) NOT NULL,
			  email_address varchar(50) NOT NULL,
			  phone_num varchar(12) NOT NULL,
			  gender varchar(1) NOT NULL,
			  first_nations char(3) DEFAULT NULL,
			  grade int(2) NOT NULL,
			  program_type char(15) NOT NULL,
			  prev_school_name varchar(50) DEFAULT NULL,
			  prev_school_contact varchar(12) DEFAULT NULL,
			  iep char(3) DEFAULT NULL,
			  gifted char(3) DEFAULT NULL,
			  username varchar(50) NOT NULL,
			  user_password varchar(100) NOT NULL UNIQUE,
			  PRIMARY KEY (pen));";

	$query .= "CREATE TABLE IF NOT EXISTS teachers (
			  sin int(9) NOT NULL UNIQUE,
			  lastname varchar(100) NOT NULL,
			  firstname varchar(100) NOT NULL,
			  dob varchar(10) NOT NULL,
			  dept_speciality char(20) NOT NULL,
			  username varchar(50) NOT NULL,
			  user_password varchar(100) NOT NULL UNIQUE,
			  PRIMARY KEY (sin));";

	$query .= "CREATE TABLE IF NOT EXISTS parents_guardians (
			  parent_name char(100) NOT NULL,
			  cell_num varchar(12) NOT NULL,
			  phone_num varchar(12) NOT NULL,
			  address varchar(200) NOT NULL,
			  relation_to_student char(15) NOT NULL,
			  pen int(9) NOT NULL,
			  PRIMARY KEY (parent_name, pen),
			  FOREIGN KEY (pen) REFERENCES students(pen) ON DELETE CASCADE);";

	$query .= "CREATE TABLE IF NOT EXISTS head_of (
			  dept_id int(2) NOT NULL,
			  sin int(9) DEFAULT NULL,
			  PRIMARY KEY (dept_id),
			  FOREIGN KEY (dept_id) REFERENCES departments(dept_id),
			  FOREIGN KEY (sin) REFERENCES teachers(sin));";

	$query .= "CREATE TABLE IF NOT EXISTS courselist (
			  course_id varchar(5) NOT NULL UNIQUE,
			  course_name varchar(20) NOT NULL,
			  num_credits int(1) NOT NULL,
			  grade_level int(2) NOT NULL,
			  term_offered varchar(10) DEFAULT NULL,
			  dept_id int(2) DEFAULT NULL,
			  PRIMARY KEY (course_id),
			  FOREIGN KEY (dept_id) REFERENCES departments(dept_id));";

	$query .= "CREATE TABLE IF NOT EXISTS enrolled_in (
			  course_id varchar(5) NOT NULL,
			  pen int(9) NOT NULL,
			  PRIMARY KEY (course_id, pen),
			  FOREIGN KEY (course_id) REFERENCES courselist(course_id),
			  FOREIGN KEY (pen) REFERENCES students(pen));";

	$query .= "CREATE TABLE IF NOT EXISTS teaches (
			  course_id varchar(5) NOT NULL,
			  sin int(9) NOT NULL,
			  PRIMARY KEY (course_id, sin),
			  FOREIGN KEY (course_id) REFERENCES courselist(course_id),
			  FOREIGN KEY (sin) REFERENCES teachers(sin));";

	$query .= "CREATE TABLE IF NOT EXISTS works_in (
			  sin int(9) NOT NULL,
			  dept_id int(2) NOT NULL,
			  PRIMARY KEY (sin, dept_id),
			  FOREIGN KEY (sin) REFERENCES teachers(sin),
			  FOREIGN KEY (dept_id) REFERENCES departments(dept_id));";

	//Insert enrollable high school courses
	$query .= "INSERT INTO courselist VALUES ('ENG11', 'English 11', 4, 11, 'Term 1', 1);";
	$query .= "INSERT INTO courselist VALUES ('PC12', 'Pre-Calculus 12', 4, 12, 'Term 1', 2);";
	$query .= "INSERT INTO courselist VALUES ('SOC10', 'Social Studies 10', 4, 10, 'Term 2', 1);";
	$query .= "INSERT INTO courselist VALUES ('VA10', 'Visual Arts 10', 4, 10, 'Summer', 3);";

	//Insert available departments
       $query .= "INSERT INTO departments VALUES (1, 'Humanities');";
       $query .= "INSERT INTO departments VALUES (2, 'Math/Sciences');";
       $query .= "INSERT INTO departments VALUES (3, 'Electives');";

	include("db_connect.php");
	$create_tables = $connection->multi_query($query);

	//echo $query;

	//Cite: http://php.net/manual/en/mysqli.multi-query.php
	if ($create_tables) {
		//Release returned data
		do {
			/* store first result set */
			if ($result = $connection->store_result()) {
				while ($row = $result->fetch_row()) {
					printf("%s\n", $row[0]);
				}
				$result->free();
			}
			/* print divider */
			if ($connection->more_results()) {
				//printf("-----------------\n");
			}
		} while ($connection->next_result());
		
		require("insert_data.php");

		$connection->close();
	} else {
		//echo "Table creation failed."."<br/>";
	}
	
} else {
	//echo "Database creation failed."."<br/>";
}

//Close the database connection
mysqli_close($connect);

?>