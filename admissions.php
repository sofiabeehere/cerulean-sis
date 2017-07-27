<?php
if (!isset($_SESSION['login_user']) || isset($_SESSION)) {
   include('templates/session.php'); //}
}
?>
<!doctype html>
<head>

	<title> Cerulean Web for Schools DEMO | Admissions </title>
	
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

	<?php require('templates/application_form.php'); ?>

	<?php require('templates/footer.php'); ?>

</body>
</html>