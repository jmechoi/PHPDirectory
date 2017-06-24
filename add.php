<!-- IT 207 Lab Assignment 3 by Jamie Choi -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict/dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv ="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Online Contacts Directory</title>
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

				<?php
					$filename = "directory.txt";
					$DirTemp = fopen($filename, "ab");

					if(isset($_POST['submit'])){

						$first = $_POST["fname"];
						$last = $_POST["lname"];
						$email = $_POST["email"];
						$phone = $_POST["phone"];
						$address = $_POST["address"];
						$city = $_POST["city"];
						$state = $_POST["state"];
						$zip = $_POST["zip"];

						if (!empty($first) && !empty($last) && !empty($email) && !empty($phone) && !empty($address) && !empty($city) && !empty($state) && !empty($zip)){

							if (flock($DirTemp, LOCK_EX)){
								$newcontact = "$first, $last, $email, $phone, $address, $city, $state, $zip\r\n";
								if (fwrite($DirTemp, $newcontact) > 0){
									echo "<p>$first $last has been successfully added to the directory!</p>";
								} else {
									echo "<p>Error! $first $last has not been added to the directory.</p>";
								}

							} else {
								echo "<p>Cannot write to the file right now. Please try again later.</p>";
							}
						} else {
							echo "<p>You must enter a value in each field.</p>";
						}
					}
					flock($DirTemp, LOCK_UN);
					fclose($DirTemp);

				?>

				<form action="add.php" method="post">
					<h3>New Contact Entry</h3>
					<div class="body">
						First Name <input type="text" name="fname" /> Last Name  <input type="text" name="lname" /><br/><br/>
						Email Address <input type="text" name="email" /><br/><br/>
						Phone Number <input type="text" name="phone" /><br/><br/>
						Address <input type="text" name="address" />
						City <input type="text" name="city" /><br/><br/>
						State <select name="state">
								<option value="Alabama">Alabama</option>
								<option value="Alaska">Alaska</option>
								<option value="Arizona">Arizona</option>
								<option value="Arkansas">Arkansas</option>
								<option value="California">California</option>
								<option value="Colorado">Colorado</option>
								<option value="Connecticut">Connecticut</option>
								<option value="Delaware">Delaware</option>
								<option value="District Of Columbia">District Of Columbia</option>
								<option value="Florida">Florida</option>
								<option value="Georgia">Georgia</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Idaho">Idaho</option>
								<option value="Illinois">Illinois</option>
								<option value="Indiana">Indiana</option>
								<option value="Iowa">Iowa</option>
								<option value="Kansas">Kansas</option>
								<option value="Kentucky">Kentucky</option>
								<option value="Louisiana">Louisiana</option>
								<option value="Maine">Maine</option>
								<option value="Maryland">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="Massachusetts">Michigan</option>
								<option value="Minnesota">Minnesota</option>
								<option value="Mississippi">Mississippi</option>
								<option value="Missouri">Missouri</option>
								<option value="Montana">Montana</option>
								<option value="Nebraska">Nebraska</option>
								<option value="Nevada">Nevada</option>
								<option value="New Hampshire">New Hampshire</option>
								<option value="New Jersey">New Jersey</option>
								<option value="New Mexico">New Mexico</option>
								<option value="New York">New York</option>
								<option value="North Carolina">North Carolina</option>
								<option value="North Dakota">North Dakota</option>
								<option value="Ohio">Ohio</option>
								<option value="Oklahoma">Oklahoma</option>
								<option value="Oregon">Oregon</option>
								<option value="Pennsylvania">Pennsylvania</option>
								<option value="Rhode Island">Rhode Island</option>
								<option value="South Carolina">South Carolina</option>
								<option value="South Dakota">South Dakota</option>
								<option value="Tennessee">Tennessee</option>
								<option value="Texas">Texas</option>
								<option value="Utah">Utah</option>
								<option value="Vermont">Vermont</option>
								<option value="Virginia">Virginia</option>
								<option value="Washington">Washington</option>
								<option value="West Virginia">West Virginia</option>
								<option value="Wisconsin">Wisconsin</option>
								<option value="Wyoming">Wyoming</option>
							</select> Zip <input type="text" name="zip" />
					</div>

					<div class="footer">
						 <p><input type='submit' name='submit' value='Submit' class='button'/></p>
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