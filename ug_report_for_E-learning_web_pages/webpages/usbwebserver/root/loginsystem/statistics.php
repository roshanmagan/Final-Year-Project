<?php
//this is to start the session so, session can be executed
session_start();
?>

<html>

	<head>
	<title>Statistic Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<h1>Statistic Page</h1>
	<!--form is created for submit button-->
		<form method="post">
		<!--update button is created-->
			<input type="Submit" name="Update" value="Update"></input>

				<p><!--statistics page hit counter-->
					
					<?php 
						$stat_file = "text_files/stat.txt"; //this is to start the session so, session can be executed
						$f_open = fopen($stat_file,"w") or die("unable to open a file!"); // opens a error log text file for writing a file 
						
						if(isset($_SESSION['stat_page']))
						{
							$_SESSION['stat_page'] = $_SESSION['stat_page'] + 1; // here session is set and increment by 1 when the user visits this page
							$stat_count = "Statistic Page: ".$_SESSION['stat_page'];//storing the hit counter digit and message in the local variable
							fwrite($f_open,$stat_count); // writing the hit counter message into the text file 
							fclose($f_open); // closing the text file
						}
						else
						{
							$_SESSION['stat_page'] = 1;  // this is to set the login session hit counter by one so, when user enters into the page it won't give 'undefined index error'
							$stat_count = "Statistics Page: ".$_SESSION['stat_page']; //storing the hit counter digit and message in the local variable
							fwrite($f_open,$stat_count);// writing the hit counter message into the text file
							fclose($f_open); // closing the text file
						}
						
						if(isset($_SESSION['stat_page'])) //checking if the session is set or not
						{
							$stat_file = "text_files/stat.txt"; //storing the text file location in the variable
							$f_open = fopen($stat_file ,"r") or die("unable to open a file!"); // opens the file for reading purpose
							echo fread($f_open,filesize($stat_file)); // reading the file and displaying the message on the page
							fclose($f_open);// this will close the open file
						}
						else
						{
							echo "Statistics Page: 0"; // default message if the session is not set
						}
					?>
				</p>

				<p><!--Registartion page hit counter-->

					<?php
						

						if(isset($_SESSION['registration'])) //checking if the session is set or not
						{
							$stat_file = "text_files/regi_stat.txt";  //storing the text file location in the variable
							$f_open = fopen($stat_file ,"r") or die("unable to open a file!");// opens the file for reading purpose
							echo fread($f_open,filesize($stat_file )); // reading the file and displaying the message on the page
							fclose($f_open); // this will close the open file
						}
						else
						{
							echo "Registartion Page: 0"; // default message if the session is not set
						}
					?>
				</p>

				<p> <!--Log in page hit counter-->

					<?php
						if(isset($_SESSION['login'])) //checking if the session is set or not
						{
							$stat_file = "text_files/login_stat.txt"; //storing the text file location in the variable
							$f_open = fopen($stat_file,"r") or die("unable to open a file!"); // opens the file for reading purpose
							echo fread($f_open,filesize($stat_file)); // reading the file and displaying the message on the page
							fclose($f_open); // this will close the open file
						}
						else
						{
							echo "Login Page: 0"; // default message if the session is not set
						}
					?>
				</p>

				<p><!--Members page hit counter-->

					<?php
						if(isset($_SESSION['members'])) //checking if the session is set or not
						{
							$stat_file = "text_files/members_stat.txt"; //storing the text file location in the variable
							$f_open = fopen($stat_file,"r") or die("unable to open a file!"); // opens the file for reading purpose
							echo fread($f_open,filesize($stat_file)); // reading the file and displaying the message on the page
							fclose($f_open); // this will close the open file
						}
						else
						{
							echo "Members Page: 0"; // default message if the session is not set
						}
					?>
				</p>

			<a class="btn" href="index.php">Home</a><br /><br /><!--link to go to the home page-->
		</form>
	</body>
</html>