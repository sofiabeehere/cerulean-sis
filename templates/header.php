<!doctype html>

<head>

	<title> Cerulean Web for Schools | header </title>
	<link rel="stylesheet" href="css/header.css">

	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body>

	<header>

	<!-- Navigation menu for entire website -->
		<div class = "grid-row">
			<nav id = "main-nav">
				<h1 class = "main-header"> Cerulean Web </h1>
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
						<!-- Login button to access courses and user profile -->
						<button id = "login-button" onclick="document.getElementById('id01').style.display='block'">
							<img src = "img/user-shape.svg" alt = "user icon for login">
							<!--Cite: http://www.flaticon.com/free-icon/ user-shape_25634#term=user&page=1&position=61 -->
							<h2>LOGIN</h2>
						</button>
					</div>
				</nav>
			</nav>
		</div>
	</header>

	<!-- Login modal box -->
	<!-- Cite: https://www.w3schools.com/howto/howto_css_login_form.asp -->
	<div id="id01" class="modal">
		<form class="modal-content animate" action="" method = "POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			
			<h2 style = "text-align: center; "> Access Your Courses </h2>

			<div class="container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" class = "uname" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit" name = "login-btn">LOGIN</button>
			</div>
		</form>
	</div>

	<?php include("./login.php") ?>

</body>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</html>