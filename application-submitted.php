<!doctype html>
<head>

	<title> Cerulean Web for Schools DEMO | Application Submitted </title>

	<!-- Import Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<link rel="stylesheet" href="css/form.css">

</head>
<body>

<section class = "application-form">

	<?php require('templates/header.php'); ?>
	
	<div class = "parallax2"></div>

	<div class = "form-intro-content">

		<h2>Thank you!</h2>

		<p> You are one step closer to becoming part of the Cerulean Web family. Please use the following temporary login details below to access your student account: </p>

		<p> Username: <?php echo $_SESSION['username']; ?></p>
		<p> Password: <?php echo $_SESSION['pswd']; session_destroy(); ?> </p>

		<label class = 'warning-label' style = 'font-weight: bold;'>Note: </label>
		<label class = 'warning-label'>The login details above are for first-time access only. Please change your password upon after accessing your student account.</label>

	</div>

	<?php require('templates/footer.php'); ?>

</body>
</html>