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

					#Update Contact
					$count = $_POST["count"];
					$first = $_POST["fname"];
					$last = $_POST["lname"];
					$email = $_POST["email"];
					$phone = $_POST["phone"];
					$address = $_POST["address"];
					$city = $_POST["city"];
					$state = $_POST["state"];
					$zip = $_POST["zip"];

					$editline = $count-1;
					$filename = "directory.txt";
					$DirTemp = fopen($filename, "r+b");
					if ($DirTemp === FALSE) {
						echo "<p>There was an error reading file '" . $filename . "'.</p><br/>";
					} else {

						if (!empty($first) && !empty($last) && !empty($email) && !empty($phone) && !empty($address) && !empty($city) && !empty($state) && !empty($zip)){

							if (flock($DirTemp, LOCK_EX)){
								$newcontact = "$first, $last, $email, $phone, $address, $city, $state, $zip\r\n";

									
									if($DirTemp){
										$Contacts = explode("\r\n", fread($DirTemp, filesize($filename)));

										for($x=0;$x<count($Contacts);$x++){
											if($x!=$editline){
												$Contacts[$x] .= "\r\n";
											} else if ($x==$editline){
												$Contacts[$editline] = $newcontact;
											}
										}
									}

									fclose($DirTemp);

									$DirTemp = fopen($filename, "w+b");
									for($i=0; $i<count($Contacts); ++$i){

										if($i==1){
											if (fwrite($DirTemp, $Contacts[$i-1]) > 0){
											echo "<p>$first $last has been successfully updated in the directory!</p>";
											} else {
												echo "<p>Error! $first $last has not been updated in the directory.</p>";
											}
										} else if ($i>1){
											fwrite($DirTemp, $Contacts[$i-1]);
										}
									}


							} else {
								echo "<p>Cannot write to the file right now. Please try again later.</p>";
							}

						} else {
							echo "<p>Each field must contain a value. Press back to return to the form.</p>";
						}
					}

					flock($DirTemp, LOCK_UN);
					fclose($DirTemp);

				?>


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