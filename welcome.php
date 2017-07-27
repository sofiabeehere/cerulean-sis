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

			<!-- Project 03 (Personalization and AJAX) will be implemented and displayed here.  -->
			<h2> Your courses </h2>
			<?php include('templates/your_courses.php') ?>
		
			<!-- Account Navigation Buttons -->
			<button id = "enroll-button" onclick="document.getElementById('id03').style.display='block'">
				<h3>Enroll in New Courses</h3>
			</button>

		</article>

	</section>

	<!-- Enroll in new courses modal box -->
	<!-- Cite: https://www.w3schools.com/howto/howto_css_login_form.asp -->
	<div id="id03" class="modal">
		<form class="modal-content animate" action="" method = "POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			
			<h2 style = "text-align: center; "> Enroll in New Courses </h2>

			<div class="container">

				<select size="4" class = "listbox" name="new_enrolled_high_school_courses[]" multiple="multiple" required>
					<option value = "" class = "option-listbox" disabled selected>select courses</option>
					<option value = "ENG11" class = "option-listbox" <?php if (isset($_POST['new_enrolled_high_school_courses']) && in_array('ENG11', $_POST['new_enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >English 11</option>
					<option value = "SOC10" class = "option-listbox" <?php if (isset($_POST['new_enrolled_high_school_courses']) && in_array('SOC10', $_POST['new_enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >Social Studies 10</option>
					<option value = "PC12" class = "option-listbox" <?php if (isset($_POST['new_enrolled_high_school_courses']) && in_array('PC12', $_POST['new_enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >Pre-Calculus 12</option>
					<option value = "VA10" class = "option-listbox" <?php if (isset($_POST['new_enrolled_high_school_courses']) && in_array('VA10', $_POST['new_enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >Visual Arts 10</option>
				</select>				

				<button type="submit" name = "enroll-btn" onClick="window.location.reload()">Enroll</button>
			</div>
		</form>
	</div>

	<?php require('templates/enroll_new_courses.php'); ?>

	<?php require('templates/footer.php'); ?>

</body>

<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</html>