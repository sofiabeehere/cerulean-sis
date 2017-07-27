<?php
if (!isset($_SESSION['login_user']) || isset($_SESSION)) {
	include('templates/session.php'); //}
}

?>
<!doctype html>

<head>

	<title> Cerulean Web for Schools DEMO | Home </title>

	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	<!-- Import FullCalendar.io Library -->
	<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
	<script src='fullcalendar/lib/jquery.min.js'></script>
	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/fullcalendar.js'></script>

	<!-- Import CSS Stylesheet -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/grid.css">
	

</head>
<body>

<?php 
if (isset($_SESSION['login_user'])) {
	require('templates/main_logged_in_header.php'); 
} if (!isset($_SESSION['login_user']) || !isset($_SESSION)) {	 
	require('templates/main_header.php'); 
}
?>

	<div class = "parallax1"></div>
	<!-- Cite: https://www.pexels.com/photo/laptop-notebook-grass-meadow-3129/ -->

	<section class = "main-content">
		<div class = "grid-row">
			<div class = "grid-col-100of100">
				<h2> Welcome! </h2>
				<p> Explore a safe and refreshing approach to education by choosing distance learning. There is a wealth of options and resources to fit your family style and the uniqueness of each child. Our children are born to succeed and lead through example. </p>
				<p> Your home is the best place to build family bonds that last forever. We build relationships where siblings learn, work and grow together with parents mentoring and leading their children in life and relationships.</p>
			</div>
			<div class = "grid-col-30of100">
				<h2> Applications Now Open </h2>
				<p> Admission for the 2017-18 school year is now open. To fill out the an application, please access the "Admissions" tab or <a href = "admissions.php" class = "hyperlink">click here</a>.</p>
			</div>
			<div class = "grid-col-30of100">
				<h2> Newest Courses </h2>
				<a href="english-11.php" class = "course-button">English 11</a>
				<a href="social-studies-10.php" class = "course-button">Social Studies 10</a>
				<a href="pre-calculus-12.php" class = "course-button">Pre-Calculus 12</a>
				<a href="visual-arts-10.php" class = "course-button">Visual Arts 10</a>
				<a href="courses.php" class = "more-courses-button">More courses...</a>
			</div>
			<div class = "grid-col-30of100">
				<!-- <h2> Events </h2> -->
				<div id = "calendar"></div>
			</div>
		</div>
	</section>

<?php require('templates/footer.php'); ?>

<!-- Citing FullCalendar Documentation: https://fullcalendar.io/docs/event_data/events_json_feed/ -->
<script type='text/javascript'>

	$(document).ready(function() {
	    $('#calendar').fullCalendar({

	        header: {
	        		left: 'prev',
	        		center: 'title',
				right: 'next'
			},
			titleFormat: '[Events]',

			// customize the button names,
			// otherwise they'd all just say "list"
			views: {
				listDay: { buttonText: 'list day' },
				listWeek: { buttonText: 'list week' }
			},

			defaultView: 'listWeek',
			defaultDate: '<?php echo date("Y-m-d"); ?>',
			navLinks: false, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events

	        events: {
	            url: './calendar_json.php',
	            type: 'POST'
	        }

	    });
	});

	</script>

</body>

</html>