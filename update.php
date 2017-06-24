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

					$fname = $_POST["first"];
					$lname = $_POST["last"];

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

				?>

				<form action="processupdate.php" method="post">
					<h3>Update Entry</h3>
					<div class="body">
						First Name <input type='text' name='fname' value= <?php echo "'". $contact[0] . "'"; ?> /> Last Name  <input type="text" name="lname"  value= <?php echo "'". $contact[1] . "'"; ?>/><br/><br/>
						Email Address <input type='text' name='email' value= <?php echo "'" . $contact[2] . "'"; ?> /><br/><br/>
						Phone Number <input type='text' name='phone' value= <?php echo "'". $contact[3] . "'"; ?>/><br/><br/>
						Address <input type="text" name="address"  value= <?php echo "'". $contact[4] . "'"; ?>/>
						City <input type="text" name="city"  value= <?php echo "'". $contact[5] . "'"; ?> /><br/><br/>
						State <select name="state">
								<option value="Alabama" <?php if($contact[6] == "Alabama"){
														echo " selected='selected'";}?>>Alabama</option>
								<option value="Alaska" <?php if($contact[6] == "Alaska"){
														echo " selected='selected'";}?>>Alaska</option>
								<option value="Arizona" <?php if($contact[6] == "Arizona"){
														echo " selected='selected'";}?>>Arizona</option>
								<option value="Arkansas" <?php if($contact[6] == "Arkansas"){
														echo " selected='selected'";}?>>Arkansas</option>
								<option value="California" <?php if($contact[6] == "California"){
														echo " selected='selected'";}?>>California</option>
								<option value="Colorado" <?php if($contact[6] == "Colorado"){
														echo " selected='selected'";}?>>Colorado</option>
								<option value="Connecticut" <?php if($contact[6] == "Connecticut"){
														echo " selected='selected'";}?>>Connecticut</option>
								<option value="Delaware" <?php if($contact[6] == "Delaware"){
														echo " selected='selected'";}?>>Delaware</option>
								<option value="District of Columbia" <?php if($contact[6] == "District of Columbia"){
														echo " selected='selected'";}?>>District Of Columbia</option>
								<option value="Florida" <?php if($contact[6] == "Florida"){
														echo " selected='selected'";}?>>Florida</option>
								<option value="Georgia" <?php if($contact[6] == "Georgia"){
														echo " selected='selected'";}?>>Georgia</option>
								<option value="Hawaii" <?php if($contact[6] == "Hawaii"){
														echo " selected='selected'";}?>>Hawaii</option>
								<option value="Idaho" <?php if($contact[6] == "Idaho"){
														echo " selected='selected'";}?>>Idaho</option>
								<option value="Illinois" <?php if($contact[6] == "Illinois"){
														echo " selected='selected'";}?>>Illinois</option>
								<option value="Indiana" <?php if($contact[6] == "Indiana"){
														echo " selected='selected'";}?>>Indiana</option>
								<option value="Iowa" <?php if($contact[6] == "Iowa"){
														echo " selected='selected'";}?>>Iowa</option>
								<option value="Kansas" <?php if($contact[6] == "Kansas"){
														echo " selected='selected'";}?>>Kansas</option>
								<option value="Kentucky" <?php if($contact[6] == "Kentucky"){
														echo " selected='selected'";}?>>Kentucky</option>
								<option value="Louisiana" <?php if($contact[6] == "Louisiana"){
														echo " selected='selected'";}?>>Louisiana</option>
								<option value="Maine" <?php if($contact[6] == "Maine"){
														echo " selected='selected'";}?>>Maine</option>
								<option value="Maryland" <?php if($contact[6] == "Maryland"){
														echo " selected='selected'";}?>>Maryland</option>
								<option value="Massachusetts" <?php if($contact[6] == "Massachusetts"){
														echo " selected='selected'";}?>>Massachusetts</option>
								<option value="Michigan" <?php if($contact[6] == "Michigan"){
														echo " selected='selected'";}?>>Michigan</option>
								<option value="Minnesota" <?php if($contact[6] == "Minnesota"){
														echo " selected='selected'";}?>>Minnesota</option>
								<option value="Mississippi" <?php if($contact[6] == "Mississippi"){
														echo " selected='selected'";}?>>Mississippi</option>
								<option value="Missouri" <?php if($contact[6] == "Missouri"){
														echo " selected='selected'";}?>>Missouri</option>
								<option value="Montana" <?php if($contact[6] == "Montana"){
														echo " selected='selected'";}?>>Montana</option>
								<option value="Nebraska" <?php if($contact[6] == "Nebraska"){
														echo " selected='selected'";}?>>Nebraska</option>
								<option value="Nevada" <?php if($contact[6] == "Nevada"){
														echo " selected='selected'";}?>>Nevada</option>
								<option value="New Hampshire" <?php if($contact[6] == "New Hampshire"){
														echo " selected='selected'";}?>>New Hampshire</option>
								<option value="New Jersey" <?php if($contact[6] == "New Jersey"){
														echo " selected='selected'";}?>>New Jersey</option>
								<option value="New Mexico" <?php if($contact[6] == "New Mexico"){
														echo " selected='selected'";}?>>New Mexico</option>
								<option value="New York" <?php if($contact[6] == "New York"){
														echo " selected='selected'";}?>>New York</option>
								<option value="North Carolina" <?php if($contact[6] == "North Carolina"){
														echo " selected='selected'";}?>>North Carolina</option>
								<option value="North Dakota" <?php if($contact[6] == "North Dakota"){
														echo " selected='selected'";}?>>North Dakota</option>
								<option value="Ohio" <?php if($contact[6] == "Ohio"){
														echo " selected='selected'";}?>>Ohio</option>
								<option value="Oklahoma" <?php if($contact[6] == "Oklahoma"){
														echo " selected='selected'";}?>>Oklahoma</option>
								<option value="Oregon" <?php if($contact[6] == "Oregon"){
														echo " selected='selected'";}?>>Oregon</option>
								<option value="Pennsylvania" <?php if($contact[6] == "Pennsylvania"){
														echo " selected='selected'";}?>>Pennsylvania</option>
								<option value="Rhode Island" <?php if($contact[6] == "Rhode Island"){
														echo " selected='selected'";}?>>Rhode Island</option>
								<option value="South Carolina" <?php if($contact[6] == "South Carolina"){
														echo " selected='selected'";}?>>South Carolina</option>
								<option value="South Dakota" <?php if($contact[6] == "South Dakota"){
														echo " selected='selected'";}?>>South Dakota</option>
								<option value="Tennessee" <?php if($contact[6] == "Tennessee"){
														echo " selected='selected'";}?>>Tennessee</option>
								<option value="Texas" <?php if($contact[6] == "Texas"){
														echo " selected='selected'";}?>>Texas</option>
								<option value="Utah" <?php if($contact[6] == "Utah"){
														echo " selected='selected'";}?>>Utah</option>
								<option value="Vermont" <?php if($contact[6] == "Vermont"){
														echo " selected='selected'";}?>>Vermont</option>
								<option value="Virginia" <?php if($contact[6] == "Virginia"){
														echo " selected='selected'";}?>>Virginia</option>
								<option value="Washington" <?php if($contact[6] == "Washington"){
														echo " selected='selected'";}?>>Washington</option>
								<option value="West Virginia" <?php if($contact[6] == "West Virginia"){
														echo " selected='selected'";}?>>West Virginia</option>
								<option value="Wisconsin" <?php if($contact[6] == "Wisconsin"){
														echo " selected='selected'";}?>>Wisconsin</option>
								<option value="Wyoming" <?php if($contact[6] == "Wyoming"){
														echo " selected='selected'";}?>>Wyoming</option>
							</select> Zip <input type="text" name="zip" value=<?php echo "'". $contact[7] . "'"; ?> />
					</div>
					<?php
						break;
						} else {
							$CurContact = fgets($DirTemp);
							++$count;
						}
					}

					fclose($DirTemp);

				}

					
					?>
					<div class="footer">
						<input type='hidden' name='count' value= <?php echo "'" . $count . "'"; ?> />
						<p><input type='submit' name='Submit' value='Submit' class='button'/></p>
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