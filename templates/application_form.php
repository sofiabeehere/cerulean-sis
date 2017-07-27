<!doctype html>
<head>

	<title> Cerulean Web for Schools DEMO | Application System </title>
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/grid.css">

</head>
<body>

	<section class = "application-form">
		<!-- Start of form
			Instead of refreshing upon submission (as taught in lecture and tutorials/labs), I found it more fitting to have the user stay on the form page after submission in case they wish to edit/resubmit their form and/or certain fields.
			Cite: http://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete
		-->
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
		<?php ob_start(); ?>
			<div id = "form1" class = "form-body">
				<h2> Application for Admission (SY 2017-18) </h2>
				<label class = 'warning-label' style = 'font-weight: bold;'>*required fields</label><br/>

				<!-- Start of "Student Information" section -->
				<h3> STUDENT INFORMATION </h3>
				<div class = "form-fields">
					<div class = "grid-row">
						<div class = "grid-col-50of100">
							<label class = 'warning-label'>* </label><label>first name:</label><input type = "text" name = "first_name" value = "<?php if (isset($_POST['first_name'])) { echo $_POST['first_name']; } ?>" />
							<label>middle name:</label><input type = "text" name = "middle_name" value = "<?php if (isset($_POST['middle_name'])) { echo $_POST['middle_name']; } ?>" />
							<label class = 'warning-label'>* </label><label>date of birth (dd/mm/yyyy):</label><input type = "text" name = "dob" value = "<?php if (isset($_POST['dob'])) { echo $_POST['dob']; } ?>" />
							<label class = 'warning-label'>* </label><label>email address:</label><input type = "text" name = "email_address" value = "<?php if (isset($_POST['email_address'])) { echo $_POST['email_address']; } ?>" />
							<label class = 'warning-label'>* </label><label>gender:</label><select name = "gender">
							   <option value = "" disabled selected></option>
							   <option value = "male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'male') echo 'selected="selected"'; ?> >male</option>
							   <option value = "female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'female') echo 'selected="selected"'; ?> >female</option>
	  			   			</select>
						</div>
						<div class = "grid-col-50of100">
							<label>preferred name:</label><input type = "text" name = "preferred_name" value = "<?php if (isset($_POST['preferred_name'])) { echo $_POST['preferred_name']; } ?>" />
							<label class = 'warning-label'>* </label><label>family name:</label><input type = "text" name = "family_name" value = "<?php if (isset($_POST['family_name'])) { echo $_POST['family_name']; } ?>" />
							<label class = 'warning-label'>* </label><label>country of birth:</label><select id="country" name="country_of_birth"></select>
							<label class = 'warning-label'>* </label><label>phone number:</label><input type = "text" name = "phone_number" value = "<?php if (isset($_POST['phone_number'])) { echo $_POST['phone_number']; } ?>" />
							<label class = 'warning-label'>* </label><label>first nations status:</label><select name = "first_nations">
							   <option value = "" disabled selected></option>
							   <option value = "yes" <?php if (isset($_POST['first_nations']) && $_POST['first_nations'] == 'yes') echo 'selected="selected"'; ?> >yes</option>
							   <option value = "no" <?php if (isset($_POST['first_nations']) && $_POST['first_nations'] == 'no') echo 'selected="selected"'; ?>  >no</option>
	  			   			</select>
						</div>
					</div>
				</div>
				
				<!-- Start of "Family Information" section -->
				<h3> FAMILY INFORMATION </h3>
				<p> <label class = 'warning-label'>* </label>Student lives with: </p>
				<div class = "form-fields">
					<details class = "accordion">
						<summary class = "accordion-panel"> 
							<input type="checkbox" name="student_lives_with_mother" id = "mother" value="mother"> 
							<label for = "mother"> Mother </label> 
						</summary>
						<section class = "accordion-content">
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<label>first name:</label><input type = "text" name = "mother_first_name" value = "<?php if (isset($_POST['mother_first_name'])) { echo $_POST['mother_first_name']; } ?>" />
									<label>family name:</label><input type = "text" name = "mother_family_name" value = "<?php if (isset($_POST['mother_family_name'])) { echo $_POST['mother_family_name']; } ?>" />
								</div>
								<div class = "grid-col-50of100">
									<label>phone number:</label><input type = "text" name = "mother_phone_number" value = "<?php if (isset($_POST['mother_phone_number'])) { echo $_POST['mother_phone_number']; } ?>" />
									<label>cellphone number:</label><input type = "text" name = "mother_cellphone_number" value = "<?php if (isset($_POST['mother_cellphone_number'])) { echo $_POST['mother_cellphone_number']; }  ?>" />
								</div>							
							</div>
							<label>street address:</label><input type = "text" name = "mother_street_address" value = "<?php if (isset($_POST['mother_street_address'])) { echo $_POST['mother_street_address']; } ?>" style = "width:95%;" />
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<div class = "grid-col-50of100">
										<label>city:</label><input type = "text" name = "mother_city" value = "<?php if (isset($_POST['mother_city'])) { echo $_POST['mother_city']; } ?>" />
									</div>
									<div class = "grid-col-50of100">
										<label>country:</label><select name="mother_country" id="mother_country"></select>
									</div>
								</div>
								<div class = "grid-col-50of100">
									<div class = "grid-col-50of100">
										<label>province:</label><select name="mother_province" id="mother_province"></select>
									</div>
									<div class = "grid-col-50of100">
										<label>postal code:</label><input type = "text" name = "mother_postal_code" value = "<?php if (isset($_POST['mother_postal_code'])) { echo $_POST['mother_postal_code']; } ?>" />
									</div>
								</div>
							</div>
						</section>
					</details>
					<details class = "accordion">
						<summary class = "accordion-panel"> 
							<input type="checkbox" name="student_lives_with_father" id = "father" value="father"> 
							<label for = "father"> Father </label> 
						</summary>
						<section class = "accordion-content">
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<label>first name:</label><input type = "text" name = "father_first_name" value = "<?php if (isset($_POST['father_first_name'])) { echo $_POST['father_first_name']; } ?>" />
									<label>family name:</label><input type = "text" name = "father_family_name" value = "<?php if (isset($_POST['father_family_name'])) { echo $_POST['father_family_name']; } ?>" />
								</div>
								<div class = "grid-col-50of100">
									<label>phone number:</label><input type = "text" name = "father_phone_number" value = "<?php if (isset($_POST['father_phone_number'])) { echo $_POST['father_phone_number']; } ?>" />
									<label>cellphone number:</label><input type = "text" name = "father_cellphone_number" value = "<?php if (isset($_POST['father_cellphone_number'])) { echo $_POST['father_cellphone_number']; } ?>" />
								</div>							
							</div>
							<label>street address:</label><input type = "text" name = "father_street_address" value = "<?php if (isset($_POST['father_street_address'])) { echo $_POST['father_street_address']; } ?>" style = "width:95%;" />
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<div class = "grid-col-50of100">
										<label>city:</label><input type = "text" name = "father_city" value = "<?php if (isset($_POST['father_city'])) { echo $_POST['father_city']; } ?>" />
									</div>
									<div class = "grid-col-50of100">
										<label>country:</label><select name="father_country" id="father_country"></select>
									</div>
								</div>
								<div class = "grid-col-50of100">
									<div class = "grid-col-50of100">
										<label>province:</label><select name="father_province" id="father_province"></select>
									</div>
									<div class = "grid-col-50of100">
										<label>postal code:</label><input type = "text" name = "father_postal_code" value = "<?php if (isset($_POST['father_postal_code'])) { echo $_POST['father_postal_code']; } ?>" />
									</div>
								</div>
							</div>
						</section>
					</details>
					<details class = "accordion">
						<summary class = "accordion-panel"> 
							<input type="checkbox" name="student_lives_with_guardian" id = "guardian" value="guardian"> 
							<label for = "guardian"> Guardian </label> 
						</summary>
						<section class = "accordion-content">
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<label>first name:</label><input type = "text" name = "guardian_first_name" value = "<?php if (isset($_POST['guardian_first_name'])) { echo $_POST['guardian_first_name']; } ?>" />
									<label>family name:</label><input type = "text" name = "guardian_family_name" value = "<?php if (isset($_POST['guardian_family_name'])) { echo $_POST['guardian_family_name']; } ?>" />
								</div>
								<div class = "grid-col-50of100">
									<label>phone number:</label><input type = "text" name = "guardian_phone_number" value = "<?php if (isset($_POST['guardian_phone_number'])) { echo $_POST['guardian_phone_number']; } ?>" />
									<label>cellphone number:</label><input type = "text" name = "guardian_cellphone_number" value = "<?php if (isset($_POST['guardian_cellphone_number'])) { echo $_POST['guardian_cellphone_number']; } ?>" />
								</div>							
							</div>
							<label>street address:</label><input type = "text" name = "guardian_street_address" value = "<?php if (isset($_POST['guardian_street_address'])) { echo $_POST['guardian_street_address']; } ?>" style = "width:95%;" />
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<div class = "grid-col-50of100">
										<label>city:</label><input type = "text" name = "guardian_city" value = "<?php if (isset($_POST['guardian_city'])) { echo $_POST['guardian_city']; } ?>" />
									</div>
									<div class = "grid-col-50of100">
										<label>country:</label><select name="guardian_country" id="guardian_country"></select>
									</div>
								</div>
								<div class = "grid-col-50of100">
									<div class = "grid-col-50of100">
										<label>province:</label><select name="guardian_province" id="guardian_province"></select>
									</div>
									<div class = "grid-col-50of100">
										<label>postal code:</label><input type = "text" name = "guardian_postal_code" value = "<?php if (isset($_POST['guardian_postal_code'])) { echo $_POST['guardian_postal_code']; } ?>" />
									</div>
								</div>
							</div>
						</section>
					</details>
				</div>
				
				<!-- Start of "Educational Information" section -->
				<h3> EDUCATIONAL INFORMATION </h3>
				<div class = "form-fields">
					<div class = "grid-row">
						<div class = "grid-col-50of100">
							<label class = 'warning-label'>* </label><label>PEN #:</label><input type = "text" name = "pen" value = "<?php if (isset($_POST['pen'])) { echo $_POST['pen']; } ?>" />
							<label class = 'warning-label'>* </label><label>previous school name:</label><input type = "text" name = "previous_school_name" value = "<?php if (isset($_POST['previous_school_name'])) { echo $_POST['previous_school_name']; } ?>" />
							<label class = 'warning-label'>* </label><label>IEP:</label><select name = "iep">
							   <option value = "" disabled selected></option>
							   <option value = "yes" <?php if (isset($_POST['iep']) && $_POST['iep'] == 'yes') echo 'selected="selected"'; ?> >yes</option>
							   <option value = "no" <?php if (isset($_POST['iep']) && $_POST['iep'] == 'no') echo 'selected="selected"'; ?> >no</option>
	  			   			</select>
						</div>
						<div class = "grid-col-50of100">
							<div class = "grid-row">
								<div class = "grid-col-50of100">
									<label class = 'warning-label'>* </label><label>grade</label> <select name = "grade_level">
									<option value = "" disabled selected></option>
									<option value = "kindergarten">Kindergarten</option>
		  							<?php for ($i = 0; $i <= 12; $i++): ?>
		        						<option value="<?php echo $i; ?>" <?php if (isset($_POST['grade_level']) && $_POST['grade_level'] == $i) echo 'selected="selected"'; ?> ><?php echo $i; ?></option>
		    							<?php endfor; ?>
		    							</select>
								</div>
								<div class = "grid-col-50of100">
									<label class = 'warning-label'>* </label><label>program type:</label><select name = "program_type" style = "width:80%;">
					    		                <option value = "" disabled selected></option>
					    				   <option value = "enrolled" <?php if (isset($_POST['program_type']) && $_POST['program_type'] == 'enrolled') echo 'selected="selected"'; ?>  >Enrolling</option>
					    				   <option value = "registered" <?php if (isset($_POST['program_type']) && $_POST['program_type'] == 'registered') echo 'selected="selected"'; ?> >Registering</option>
					    				   <option value = "cross-enrolling" <?php if (isset($_POST['program_type']) && $_POST['program_type'] == 'cross-enrolling') echo 'selected="selected"'; ?> >Cross-Enrolling</option>
		    				   			</select> 
								</div>
							</div>
							<label class = 'warning-label'>* </label><label>previous school contact number:</label><input type = "text" name = "previous_school_contact" value = "<?php if (isset($_POST['previous_school_contact'])) { echo $_POST['previous_school_contact']; } ?>" />
							<label class = 'warning-label'>* </label><label>gifted status:</label><select name = "gifted">
							   <option value = "" disabled selected></option>
							   <option value = "yes" <?php if (isset($_POST['gifted']) && $_POST['gifted'] == 'yes') echo 'selected="selected"'; ?> >yes</option>
							   <option value = "no" <?php if (isset($_POST['gifted']) && $_POST['gifted'] == 'no') echo 'selected="selected"'; ?> >no</option>
	  			   			</select>
						</div>
					</div>

					<label>courses available for enrollment (for high school only)</label><select size="4" class = "listbox" name="enrolled_high_school_courses[]" multiple="multiple">
						<option value = "" class = "option-listbox" disabled selected>select courses</option>
						<option value = "ENG11" class = "option-listbox" <?php if (isset($_POST['enrolled_high_school_courses']) && in_array('ENG11', $_POST['enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >English 11</option>
						<option value = "SOC10" class = "option-listbox" <?php if (isset($_POST['enrolled_high_school_courses']) && in_array('SOC10', $_POST['enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >Social Studies 10</option>
						<option value = "PC12" class = "option-listbox" <?php if (isset($_POST['enrolled_high_school_courses']) && in_array('PC12', $_POST['enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >Pre-Calculus 12</option>
						<option value = "VA10" class = "option-listbox" <?php if (isset($_POST['enrolled_high_school_courses']) && in_array('VA10', $_POST['enrolled_high_school_courses'])) echo 'selected="selected"'; ?> >Visual Arts 10</option>
					</select>

				<?php require('templates/validate_form.php'); ?>
				
				<div class = "submission">
					<input type = "checkbox" name = "confirm_correct" id = "confirm-correct" value ""/><label for = "confirm-correct" class = "confirm_correct_stmt">I confirm that the above information is correct</label>
				</div>
				<button class = "submit-application" name = "submit" value = "submit" id = "submit-application" type = "submit" disabled="true">
					<p> SUBMIT APPLICATION </p>
				</button>
				</div>

			</div>
		</form>
	</section>

	<script src="js/application_form.js"></script>
	<script src="js/zepto.js"></script>
	<script src="js/countries.js"></script>
	<script language="javascript">
		populateCountries("country", "state");
		populateCountries("mother_country", "mother_province");
		populateCountries("father_country", "father_province");
		populateCountries("guardian_country", "guardian_province");
	</script>
	<!-- Cite: http://www.cssscript.com/generic-country-state-dropdown-list-countries-js/ -->

</body>
</html>