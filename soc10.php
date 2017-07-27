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
			<h2> Social Studies 10 (Online) - Term 2 </h2>
			
			<p>Welcome to Social Studies 10! Below you will find the course outline and your activation assignment. Once the activation assignment is completed and marked, the rest of the course and its assignments will be made available. Please take a moment to familiarize yourself with each document as it is your responsibility as a student. </p>

			<p>Teacher: Ms. Emily White</p>

			<p>Contact: ewhite@gmail.com</p>
			
			<a href = "course-files/soc10/course-outline.pdf" target="_blank"><p>Course Outline<p></a>
			
			<h3> Unit 1 - Geography </h3>
		
			<a href = "course-files/soc10/unit1-map-template.gif" target="_blank"><p>Unit 1 Map Template<p></a>
			<a href = "course-files/soc10/unit1-assignment.pdf" target="_blank"><p>Unit 1 Assignment<p></a>

		</article>

	</section>

</body>

</html>