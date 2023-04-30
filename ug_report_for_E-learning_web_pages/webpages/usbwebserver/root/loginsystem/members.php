<html>
<head>
<title>Members Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Welcome to Members Area</h1>

<?php
	//this is to start the session so, session can be executed
	session_start();
	
	if(!isset($_SESSION['name'])) //this will redirect the user to login page if the user is not log in
	{
	//no session name found no redirect back to login page
		$_SESSION['error_login'] = "please login to enter the Members page";
		
		//this will redirect the user to login page
		header("Location: index.php");
	}
	//otherwise login OK so allow access to members page
	else 
	{

				$success_msg = "You are now logged in!!"; //assigning an success message for the user
				$stat_file = "text_files/members_stat.txt"; //this is for storing the error log text file location
				$f_open = fopen($stat_file,"w") or die("unable to open a file!"); // opens a error log text file for writing a file 
				
				//session for hit counter also checking if the session is set or not
				if(isset($_SESSION['members']))
				{
					$_SESSION['members'] = $_SESSION['members'] + 1; // here session is set and increment by 1 when the user visits this page
					$members_stat_count = "Members Page: ".$_SESSION['members']; //storing the hit counter digit and message in the local variable
					fwrite($f_open,$members_stat_count); // writing the hit counter message into the text file
					fclose($f_open); // closing the text file
				}
				else
				{
					$_SESSION['members'] = 1;// this is setting the members session for the hit counter by one so, when user first enters into the page so, it won't give 'undefined index error'
					$members_stat_count = "Members Page: ".$_SESSION['members'];//storing the hit counter digit and message in the local variable
					fwrite($f_open,$members_stat_count);// writing the hit counter message into the text file 
					fclose($f_open); // closing the text file
				}
				echo "<p>"."Hello ". $_SESSION['name']."</p>";	//displays the welcome message by displaying user's email address 
				echo "<p class='success'>".$success_msg."</p>"; //this is to display the log in success message
				echo "<a href = 'logout.php'>Logout</a>"; // this is the logout button so, user can logout form the members page

	} 
?>


</body>
</html>

