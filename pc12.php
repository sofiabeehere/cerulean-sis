<?php
if (!isset($_SESSION['login_user']) || isset($_SESSION)) {
   include('templates/session.php'); //}
}
?>
<!doctype html>
<head>

	<title>Cerulean Web for Schools DEMO | Welcome Portal </title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<!-- Import CSS Stylesheet -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/grid.css">

	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>

<body>

	<?php require('templates/logged_in_header.php'); ?>

	<section class = "welcome-page">
	
		<!-- Displays welcome message dependent on the logged in user's username. -->
		<h2>Welcome <?php echo $login_session;?>!</h2> 
		<article>

			<!-- Start of course content -->
			<h2> Pre-Calculus 12 (Online) - Term 1 </h2>

			<p>Welcome to Pre-Calculus 12! Below you will find the course outline and your activation assignment. Once the activation assignment is completed and marked, the rest of the course and its assignments will be made available. Please take a moment to familiarize yourself with each document as it is your responsibility as a student. </p>

			<p>Teacher: Mrs. Jane Doe</p>

			<p>Contact: jdoe@gmail.com</p>
			
			<!-- Different source of data from project proposal: https://www.surreyschools.ca/schools/panoramaridge/Departments/Math/Documents/Course%20Outlines/12%20PreCalculus.pdf -->
			<a href = "course-files/pc12/course-outline.pdf" target="_blank"><p>Course Outline<p></a>
			
			<h3> Unit 1 - Transformations </h3>

			<a href = "course-files/pc12/unit1-assignment.pdf" target="_blank"><p>Unit 1 Assignment<p></a>


		</article>

	</section>

	<?php require('templates/footer.php'); ?>

</body>

</html>