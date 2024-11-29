<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<meta itemprop="name" content="Contact Example">
	<meta itemprop="description" content="Contact page for inquiries">
	<meta itemprop="image" content="Your URL">

	<meta property="og:title" content="Contact Example">
	<meta property="og:type" content="website">
	<meta property="og:url" content="Your URL">
	<meta property="og:image" content="Your URL">
	<meta property="og:description" content="Contact us with your questions or comments">
	
	<meta name="twitter:title" content="Contact Example">
	<meta name="twitter:description" content="Reach out to us for inquiries.">

	<meta name="author" content="Luka Radosevic">

	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	
	<title>Contact Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<header>
		<div class="hero-image" style="height: 200px;"></div>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="about-us.html">About</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<h1>Contact Form</h1>
		<div id="contact">
			<iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$firstname = htmlspecialchars($_POST['firstname']);
					$lastname = htmlspecialchars($_POST['lastname']);
					$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
					$country = htmlspecialchars($_POST['country']);
					$subject = htmlspecialchars($_POST['subject']);

					if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
						print '<p style="text-align:center; padding: 10px; background-color: #d7d6d6;border-radius: 5px;">We received your question. We will answer within 24 hours.</p>';
						
						$EmailHeaders = "MIME-Version: 1.0\r\n";
						$EmailHeaders .= "Content-type: text/html; charset=utf-8\r\n";
						$EmailHeaders .= "From: <luka@tvz.hr>\r\n";
						$EmailHeaders .= "Reply-To:<luka@eburza.hr>\r\n";
						$EmailHeaders .= "X-Mailer: PHP/" . phpversion();

						$EmailSubject = 'Example page - Contact Form';
						$EmailBody = '
						<html>
						<head>
							<title>' . $EmailSubject . '</title>
							<style>
								body {
									background-color: #ffffff;
									font-family: Arial, Helvetica, sans-serif;
									font-size: 16px;
									padding: 0px;
									margin: 0px auto;
									width: 500px;
									color: #000000;
								}
								p {
									font-size: 14px;
								}
								a {
									color: #00bad6;
									text-decoration: underline;
									font-size: 14px;
								}
							</style>
						</head>
						<body>
							<p><strong>First Name:</strong> ' . $firstname . '</p>
							<p><strong>Last Name:</strong> ' . $lastname . '</p>
							<p><strong>Email:</strong> <a href="mailto:' . $email . '">' . $email . '</a></p>
							<p><strong>Country:</strong> ' . $country . '</p>
							<p><strong>Subject:</strong> ' . $subject . '</p>
						</body>
						</html>';

						if (mail($email, $EmailSubject, $EmailBody, $EmailHeaders)) {
							print '<p>Your message has been sent successfully!</p>';
						} else {
							print '<p>Sorry, there was an error sending your message. Please try again later.</p>';
						}
					} else {
						print '<p>Invalid email format. Please check your email address and try again.</p>';
					}
				}
			?>
		</div>
	</main>

	<footer>
		<p>Copyright &copy; 2024 Luka Radosevic</p>
	</footer>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-98455037-1', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
