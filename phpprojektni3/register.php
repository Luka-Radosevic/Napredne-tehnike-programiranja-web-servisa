<?php
	print '
	<h1>Registration Form</h1>
	<div id="register">';

	if ($_POST['_action_'] == FALSE) {
		print '
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">First Name *</label>
			<input type="text" id="fname" name="firstname" placeholder="Your name.." required>

			<label for="lname">Last Name *</label>
			<input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
				
			<label for="email">Your E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Your e-mail.." required>
			
			<label for="username">Username:* <small>(Username must have min 5 and max 10 chars)</small></label>
			<input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Username.." required><br>
			
			<label for="password">Password:* <small>(Password must have min 4 chars)</small></label>
			<input type="password" id="password" name="password" placeholder="Password.." pattern=".{4,}" required>

			<label for="country">Country:</label>
			<select name="country" id="country">
				<option value="">Please select</option>';

				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while ($row = @mysqli_fetch_array($result)) {
					print '<option value="' . htmlspecialchars($row['country_code']) . '">' . htmlspecialchars($row['country_name']) . '</option>';
				}
			print '
			</select>

			<input type="submit" value="Submit">
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		$email = mysqli_real_escape_string($MySQL, $_POST['email']);
		$username = mysqli_real_escape_string($MySQL, $_POST['username']);
		$firstname = mysqli_real_escape_string($MySQL, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($MySQL, $_POST['lastname']);
		$password = mysqli_real_escape_string($MySQL, $_POST['password']);
		$country = mysqli_real_escape_string($MySQL, $_POST['country']);

		$query  = "SELECT * FROM users WHERE email='$email' OR username='$username'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '' && $row['username'] == '') {
			# Hash the password
			$pass_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

			$query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
			$query .= " VALUES ('$firstname', '$lastname', '$email', '$username', '$pass_hash', '$country')";
			$result = @mysqli_query($MySQL, $query);

			if ($result) {
				echo '<p>' . ucfirst(strtolower(htmlspecialchars($firstname))) . ' ' . ucfirst(strtolower(htmlspecialchars($lastname))) . ', thank you for registration </p>';
			} else {
				echo '<p>Sorry, there was an error with your registration. Please try again later.</p>';
			}

			echo '<hr>';
		}
		else {
			echo '<p>User with this email or username already exists!</p>';
		}
	}

	print '
	</div>';
?>
