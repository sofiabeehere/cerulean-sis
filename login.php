<!-- Login authentication -->
<!-- Cite: https://www.tutorialspoint.com/php/php_mysql_login.htm -->
<?php
include("templates/db_login_connect.php");

session_start();

if(isset($_POST['login-btn'])) {
	// username and password sent from form 

	$myusername = mysqli_real_escape_string($cntn,$_POST['uname']);
	$mypassword = mysqli_real_escape_string($cntn,sha1($_POST['psw'])); 

	$sql = "SELECT * FROM (SELECT username, user_password FROM students UNION ALL SELECT username, user_password FROM teachers) as t1 WHERE t1.username = '$myusername' and t1.user_password = '$mypassword'";
	$result = mysqli_query($cntn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];

	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count == 1) {
		$_SESSION['login_user'] = $myusername;

		header("location: welcome.php");
		exit;
	} else {
		$error = "Your Login Name or Password is invalid";
	}

	mysqli_free_result($result);
}

mysqli_close($cntn);
?>