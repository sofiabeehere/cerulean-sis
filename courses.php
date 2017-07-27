<?php
if (!isset($_SESSION['login_user']) || isset($_SESSION)) {
   include('templates/session.php'); //}
}

?>
<!doctype html>

<head>

	<title> Cerulean Web for Schools DEMO | Courses </title>

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
	<!-- $_POST['uname'] -->

	<section class = "courselist">
		<div class = "grid-row">
			
			<!-- List of courses appears here -->
			<div class = "grid-col-60of100">
				<h2> Courses </h2>
				<!-- Boxes for courses appear here -->
				<ul id = "courselist-boxes" class = "courselist-boxes">
					<li data-subjecttype = "humanities" data-gradetype = "11" data-termtype = "term1">
							<?php 
								if (isset($_SESSION['login_user'])) { ?>
									<button class = "enroll-button" onclick="document.getElementById('id03').style.display='block'">
							<?php	echo "ENROLL";
									//echo "<a href = ''>ENROLL</a>";
								} if (!isset($_SESSION['login_user']) || !isset($_SESSION)) {	 
									echo '<button class = "enroll-button">';
									echo "<a href = 'admissions.php'>ENROLL</a>";
								}
								echo "</button>";
							?>
						<a href = "english-11.php">
							<h3 class = "course-label">English 11</h3>
							<p>Teacher: Mr. John Doe</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor... </p>
						</a>
					</li>
					<li data-subjecttype = "humanities" data-gradetype = "10" data-termtype = "term2">
						<?php 
								if (isset($_SESSION['login_user'])) { ?>
									<button class = "enroll-button" onclick="document.getElementById('id03').style.display='block'">
							<?php	echo "ENROLL";
									//echo "<a href = ''>ENROLL</a>";
								} if (!isset($_SESSION['login_user']) || !isset($_SESSION)) {	 
									echo '<button class = "enroll-button">';
									echo "<a href = 'admissions.php'>ENROLL</a>";
								}
								echo "</button>";
							?>
						<a href = "social-studies-10.php">
							<h3 class = "course-label">Social Studies 10</h3>
							<p>Teacher: Ms. Emily White</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor... </p>
						</a>
					</li>
					<li data-subjecttype = "math-sciences" data-gradetype = "12" data-termtype = "term1">
						<?php 
								if (isset($_SESSION['login_user'])) { ?>
									<button class = "enroll-button" onclick="document.getElementById('id03').style.display='block'">
							<?php	echo "ENROLL";
									//echo "<a href = ''>ENROLL</a>";
								} if (!isset($_SESSION['login_user']) || !isset($_SESSION)) {	 
									echo '<button class = "enroll-button">';
									echo "<a href = 'admissions.php'>ENROLL</a>";
								}
								echo "</button>";
							?>
						<a href = "pre-calculus-12.php">
							<h3 class = "course-label">Pre-Calculus 12</h3>
							<p>Teacher: Mrs. Jane Doe</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor... </p>
						</a>						
					</li>
					<li data-subjecttype = "electives" data-gradetype = "10" data-termtype = "summer">
						<?php 
								if (isset($_SESSION['login_user'])) { ?>
									<button class = "enroll-button" onclick="document.getElementById('id03').style.display='block'">
							<?php	echo "ENROLL";
									//echo "<a href = ''>ENROLL</a>";
								} if (!isset($_SESSION['login_user']) || !isset($_SESSION)) {	 
									echo '<button class = "enroll-button">';
									echo "<a href = 'admissions.php'>ENROLL</a>";
								}
								echo "</button>";
							?>
						<a href = "visual-arts-10.php">
							<h3 class = "course-label">Visual Arts 10</h3>
							<p>Teacher: Mr. Adam Smith</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor... </p>
						</a>
					</li>
				</ul>
			</div>
			<!-- Filter box appears here -->
			<div class = "grid-col-30of100">
				<aside class = "filter-box">
					<h3> Filters </h3>
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="search courses by name">
					<h4 class = "filter-label">courses by grade</h3>
						<select name="dropdown" class = "grade-filter">
						    <option value="" disabled selected>select grade</option>
						    <option value = "kindergarten" name = "grade" id = "kindergarten">Kindergarten</option>
						    <?php for ($i = 1; $i <= 12; $i++) : ?>
    						    <option value="<?php echo $i; ?>" name = "grade" id = "<?php echo $i; ?>"><?php echo $i; ?></option>
						    <?php endfor; ?>
						 </select>
					<h4 class = "filter-label">courses by subject</h3>
						<select name="dropdown" class = "subject-filter">
						    <option value="" disabled selected>select subject</option>
						    <option value = "humanities" name = "subject" id = "humanities">Humanities</option>
						    <option value = "math-sciences" name = "subject" id = "math-sciences">Math/Sciences</option>
						    <option value = "electives" name = "subject" id = "electives">Electives</option>
						 </select>
					<h4 class = "filter-label">courses by term</h3>
						<select name="dropdown" class = "term-filter">
						    <option value="" disabled selected>select term</option>
						    <option value = "term1" name = "term" id = "term1">Term 1 (Sept-Jan)</option>
						    <option value = "term2" name = "term" id = "term2">Term 2 (Feb-June)</option>
						    <option value = "summer" name = "term" id = "summer">Summer</option>
						 </select>
					<!-- Reset button for all filters in filter box -->
					<input type="radio" id="reset" class="reset-button"/>
  					<label for="reset">RESET FILTERS</label>
				</aside>
			</div>

		</div>
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

<?php include('templates/enroll_new_courses.php'); ?>

<?php require('templates/footer.php'); ?>

<script src="js/zepto.js"></script>
<script src="js/filter_courses.js"></script>
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

</body>
</html>