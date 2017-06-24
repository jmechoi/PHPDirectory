<!-- IT 207 Lab Assignment 3 by Jamie Choi -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict/dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv ="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Online Contacts Directory</title>
		<link rel="stylesheet" href="../style.css" type="text/css" />
		<link rel="stylesheet" href="/~jchoi38/IT207/lab1/formstyle.css" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css' />
	</head>

	<body>

		<?php
			readfile("../navbar.inc");
			include '../header.php';
		?>

		<div id="maincontent">
			<div id ="labcontent">

				<h1>Online Contacts Directory</h1>

				<form action="search.php" method="post">
					<h3>Search for a Contact</h3>
					<div class="body">
						First Name <input type="text" name="fname" /><br/><br/>
						Last Name  <input type="text" name="lname" /><br/><br/>
					</div>

					<div class="footer">
						 <input type='submit' name='Submit' value='Submit' class='button'/>
					</div>
				</form>

				<hr/>
				<div class="subnav">
					<a href="add.php">Add New Contact Entry</a>
				</div>

			</div>
		</div>

		<?php
			readfile("../footer.inc");
		?>

	</body>
</html>