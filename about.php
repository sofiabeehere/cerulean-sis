<?php
if (!isset($_SESSION['login_user']) || isset($_SESSION)) {
   include('templates/session.php'); //}
}
?>
<!doctype html>
<head>

	<title> Cerulean Web for Schools DEMO | About </title>

	<!-- Import CSS Stylesheet -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/grid.css">

	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body>

	<?php 
	if (isset($_SESSION['login_user'])) {
		require('templates/logged_in_header.php'); 
	} if (!isset($_SESSION['login_user']) || !isset($_SESSION)) {	 
		require('templates/header.php'); 
	}
	?>

	<section class = "about-page">
		
		<h2> About </h2>
		<article>

			<!-- 

			REQUIREMENTS:

			Portfolio description
			You need to include the following three pages into your application. The audience is someone who has not seen your application yet and wants to get an idea what the website does, who you are, and what technical knowledge and skills this project demonstrates.

			"About" page: you are asked to include the "about" page that will describe the purpose of the system and its main functionality

			"Author/Creator": short paragraph on yourself.

			"Technical details" page: this can be linked from the about page, included in the details page, standing as a menu on its own. Consider this to be a quick summary of your technical capabilities that anyone can then see demonstrated in the website. Treat it as a part of your CV.  

			 -->

			<h3> About the Application </h3>

			<p> Cerulean is a web application catered towards BC K-12 distance learning schools, which combines the functions of a student information system (SIS) and learning management system (LMS) into one single infrastructure. This application makes it easier for both prospective and current students to register in courses - enrollees fill out a web form, which once completed, will be sent to the school administration to process. </p>

			<p>This web application aims to modernize and hybridize internal school processes, especially for distance learning schools, since they are run solely through the Internet and as a result, have different and more complicated needs than brick-and-mortar schools. Instead of having separate solutions for SIS and LMS, distance learning schools need to only use one. This project was actually inspired by the needs expressed by the distance learning school I work at as an Instructional Design Assistant, seeing that we have limited options for SIS and LMS because many of them are catered towards brick-and-mortar schools.</p>

			<h3> Technical Details </h3>

			<p> This web application utilizes a combination of and transaction between front-end and back-end technologies. For the front-end, HTML, CSS, and Javascript was used, along with libraries like jQuery and FullCalendar.io to create micro-interactions and initiate JSON/AJAX calls for the calendar feature respectively. Meanwhile, for the back-end, PHP was used to develop forms, track user login, and collect information. This information is then used to create queries for storage in a MySQL database.</p>

			<h3> About the Developer </h3>

			<p> My name is Sofia Bautista, and I am a budding full-stack web developer passionate about making digital content compelling and accessible. Currently, I am entering my third year as a joint-major in Communications and Interactive Arts & Technology at Simon Fraser University. Using the knowledge gained from my studies and coupled with my training in instructional design, I maximize information architecture and cognitive ergonomics in my work to create unique user experiences. </p>

			<p> In my downtime, you will most likely find me curling up with a lengthy science fiction, supernatural, or mystery/suspense novel, or binge-watching the latest episodes of primetime TV on Netflix. </p>			

		</article>


	</section>

	<?php require('templates/footer.php'); ?>

</body>
</html>