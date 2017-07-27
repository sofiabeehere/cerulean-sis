<!doctype html>

<head>

	<title> Cerulean Web for Schools | header </title>
	<link rel="stylesheet" href="css/main_header.css">

	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body>

	<?php 

	include("db_login_connect.php");

	$current_user = mysqli_real_escape_string($cntn,$login_session);

	$read_user = mysqli_query($cntn, "SELECT * FROM (SELECT username, user_password FROM students UNION ALL SELECT username, user_password FROM teachers) as t1 WHERE t1.username = '$current_user'");
	
	$row = mysqli_fetch_array($read_user,MYSQLI_ASSOC);
   
   	$current_username = $row['username'];
   	$current_password = $row['user_password'];


	?>

	<!-- Login modal box -->
	<!-- Cite: https://www.w3schools.com/howto/howto_css_login_form.asp -->
	<div id="id02" class="modal">
		<form class="modal-content animate" action="" method = "POST" style = "width: 30%;">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			
			<h2 style = "text-align: center; "> Edit Account Information </h2>

			<div class="container">
				<label><b>Username</b></label>
				<input type="text" name="username" class = "uname" value = "<?php if (isset($_POST['username'])) { echo $_POST['username']; } else { echo $login_session; } ?>">

				<label><b>Old Password</b></label>
				<input type="password" name="old_password" value = "">

				<label><b>New Password</b></label>
				<input type="password" name="new_password" value = "">

				<?php 

				if (isset($_POST['edit_request'])) {
					$current_username = trim($current_username);
					$old_password = trim($_POST['old_password']);
					$new_password = trim($_POST['new_password']);

					if (($current_username = $login_session) && ($old_password = $current_password)) {
						$new_username = trim($_POST['username']);

						$current_username = mysqli_real_escape_string($cntn,$current_username);
						$changed_uname = mysqli_real_escape_string($cntn,$new_username);
						$changed_pswd = mysqli_real_escape_string($cntn,sha1($new_password)); 

						$update_records_student = "UPDATE students SET username = '$changed_uname', user_password = '$changed_pswd' WHERE username = '$current_username';";
						$update_records_teacher = "UPDATE teachers SET username = '$changed_uname', user_password = '$changed_pswd' WHERE username = '$current_username';";

						$new_records_student = mysqli_query($cntn, $update_records_student);
						$new_records_teacher = mysqli_query($cntn, $update_records_teacher);

						if ($new_records_student || $new_records_teacher) {
							echo "User info update successful."."<br/>";
								   session_start();
								   
								if(session_destroy()) {
									header('Location: index.php');  
									exit;  
								}
						}

					} else {
						echo "<p style = 'color: red;'> Your old password does not match our records. Please enter the correct old password and try again.<p/>";
					}
				} else {
					echo "<p style = 'color: red; font-size: 9pt;'> Once you change your login details by pressing submit below, you will be asked to login again to confirm the changes.<p/>";
				}

				?>
				
				<button type="submit" name = "edit_request">SUBMIT</button>
			</div>
		</form>
	</div>

	<header>

	<!-- Navigation menu for entire website -->
		<div class = "grid-row">
			<nav id = "main-nav">
				<h1 class = "main-header" style = "margin: 0 10% 0 0;"> Cerulean Web </h1>
				<nav id = "main-nav-items" class="grid">
					<div class="grid-col-20of100">
						<a href="index.php" class = "nav-button">HOME</a>
					</div>
					<div class="grid-col-20of100">
						<a href="programs.php" class = "nav-button">PROGRAMS</a>
					</div>
					<div class="grid-col-20of100">
						<a href="courses.php" class = "nav-button">COURSES</a>
					</div>
					<div class="grid-col-20of100">
						<a href="admissions.php" class = "nav-button">ADMISSIONS</a>
					</div>
					<div class="grid-col-20of100">
						<!-- Cite: https://www.w3schools.com/howto/howto_css_dropdown.asp  -->
						<div class="dropdown">
							<button class="dropbtn" id = "login-button" style = "width: 130px; ">
								<img src = "img/user-shape.svg" alt = "user icon for login" style = "margin: 0.75em 0.5em 0 1em;">
								<!--Cite: http://www.flaticon.com/free-icon/ user-shape_25634#term=user&page=1&position=61 -->
								<h2> <?php echo $login_session; ?> </h2>
							</button>
							<div class="dropdown-content">
								<a href = "welcome.php"><p style="margin: 0; ">DASHBOARD</p></a>
								<a onclick="document.getElementById('id02').style.display='block'"><p style="margin: 0; ">EDIT ACCOUNT</p></a>
								<a href = "logout.php"><p style="margin: 0; ">LOGOUT</p></a>
								<!-- <a href="#">Link 3</a> -->
							</div>
						</div>
					</div>
				</nav>
			</nav>
		</div>
	</header>

</body>

<script src="js/header.js"></script>
<script src="js/zepto.js"></script>

<!-- Cite: https://www.w3schools.com/howto/howto_css_dropdown.asp -->
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</html>