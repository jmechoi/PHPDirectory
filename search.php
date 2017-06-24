<!-- IT 207 Lab Assignment 3 by Jamie Choi -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict/dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv ="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Search Results</title>
		<link rel="stylesheet" href="../style.css" type="text/css" />
		<link rel="stylesheet" href="/~jchoi38/IT207/lab1/formstyle.css" type="text/css" />
		<link rel="stylesheet" href="directorystyle.css" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css' />
	</head>

	<body>

		<?php
			readfile("../navbar.inc");
			include '../header.php';
		?>

		<div id="maincontent">
			<div id ="labcontent">
				<form action="update.php" method="post">
					<h3>Search Results</h3>

				<?php

					$fname = $_POST["fname"];
					$lname = $_POST["lname"];


					if (empty($fname) || empty($lname)){
						echo "<p>You must enter a value in each field. Click your browser's Back button to return to the form.</p>";
					} else if (isset($fname) && isset($lname)){


						$filename = "directory.txt";
						$DirTemp = fopen($filename, "rb");
						if ($DirTemp === FALSE) {
							echo "<p>There was an error reading file '" . $filename . "'.</p><br/>";
						} else {
							$count = 1;
							$CurContact = fgets($DirTemp);
							while (!feof($DirTemp)) {
								$contact = explode(", ", $CurContact);

								if ((strcasecmp($fname, $contact[0]) == 0) && (strcasecmp($lname, $contact[1]) == 0)){
									echo "<p id='result'>Contact $count<br/>";
									echo "First Name: {$contact[0]}<br/>";
									echo "Last Name: {$contact[1]}<br/>";
									echo "Email: {$contact[2]}<br/>";
									echo "Phone: {$contact[3]}<br/>";
									echo "Street Address: {$contact[4]}<br/>";
									echo "City: {$contact[5]}<br/>";
									echo "State: {$contact[6]}<br/>";
									echo "Zip: {$contact[7]}<br/></p>";

									$found = true;
									break;
								} else {
									$CurContact = fgets($DirTemp);
									++$count;
									$found = false;
								}

							}
							fclose($DirTemp);
							if (!$found){
									echo "<p>Contact not found.</p>";
							}
						}
					}

				?>



						<div>
							<input type='hidden' name='first' value= <?php echo "'" . $fname . "'"; ?> />
							<input type='hidden' name='last' value= <?php echo "'" . $lname . "'"; ?> />
							<input type='submit' class='button' name='submit' value='Update Entry' />
						</div>
					</form>

				<hr/>
				<div class="subnav">
					<a href="index.php">Return to Directory</a>
				</div>

			</div>
		</div>

		<?php
			readfile("../footer.inc");
		?>

	</body>
</html>