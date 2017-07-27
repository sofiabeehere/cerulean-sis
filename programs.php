<?php
if (!isset($_SESSION['login_user']) || isset($_SESSION)) {
   include('templates/session.php'); //}
}
?>
<!doctype html>

<head>

	<title> Cerulean Web for Schools DEMO | Programs </title>

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

	<section class = "programs-page">
		<h2> Programs </h2>
		<article>

			<p>In Distributed Learning (DL) Enrollment, you are free to use any curriculum you choose to meet the Ministry of Education requirements. With the ongoing support of an educational coach, you maintain flexibility and creativity while acknowledging ministry standards.</p>
			
			<h3>Enrolling</h3>
			
			<ul>
				<li>You become part of a support network for homeschooling families.</li>
				<li>You can access funding for curriculum and other education-related activities.</li>
				<li>You engage in regular communication with a certified teacher, while still maintaining the role of primary educator to your child(ren).</li>
				<li>A student Learning Plan (SLP) in collaboration with your educational coach is designed to meet Ministry standards while allowing for your family’s values and interests.</li>
				<li>You will communicate regularly, sharing and submitting learning samples as necessary to help meet ministry accountability standards with your educational coach.</li>
				<li>You may use your own course material to fulfill your family’s educational needs.</li>
				<li>You have access to the services and resources provided through the school.</li>
			</ul>
			
			<h3>Registering</h3>
			<p>As a Registered family, you are free to educate your family in the manner you choose without monitoring of or accountability to the Ministry of Education. Sections 12 and 13 of the School Act allow for families to register students as home learners. This must be done by Sept. 30th in order to receive any reimbursement. Parents who choose to register must provide their children with “a program”, but they are not in any way accountable to the Ministry of Education and are not required to follow the Provincial Learning Outcomes. When you register:</p>
			
			<ul>
				<li>You become part of a support network for homeschooling families.</li>
				<li>You receive $150 per child in educational reimbursements. (Issued after Nov. 1st with submission of receipts)</li>
				<li>You maintain complete control of your child’s education and do not have to submit learning samples or report to a teacher.<li>
				<li>You may use your own course material to fulfill your family’s educational needs.</li>
				<li>You have access to limited services and resources provided through the school.</li>
			</ul>
			
			<h3>Cross-Enrollment</h3>
			<p>Need an extra course?  Cross-enrollment means high school students in BC can be enrolled for courses at more than one school at the same time.  Students enrolled at any high school can also take one or more of their courses at a distance learning school and the grades will be fully recognized by the ministry.</p>

		</article>

	</section>

<?php require('templates/footer.php'); ?>

</body>

</html>