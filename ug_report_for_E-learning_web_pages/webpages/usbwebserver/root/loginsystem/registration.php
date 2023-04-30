<?php
//this is to start the session so, session can be executed
session_start();
?>
<html><!--opening html tag-->
<head><!--opening head tag-->
<!--Title of the page-->
<title>
Registration Page
</title>
<!--stylesheet link to style registartion page usig css-->
<link rel="stylesheet" type="text/css" href="style.css">
</head><!--closing head tag-->
<body><!--opening body tag-->
<h1>User Registration Form</h1><!--heading of the page-->
<!--registration form for the user-->
<form method="post" action="registration.php" name="rgtn_page"><!--opening form tag-->
<a class="btn" href="/index.php">Log-in</a><!--link to go to login page-->
<br>
<br>
First Name<input type="text" name="fn" ></input><br/><br/><!--input feild for the taking first name-->
Last Name<input type="text" name="ln" ></input><br/><br/><!--input feild for the taking last name-->
User Name<input type="text" name="user" ></input><br/><br/><!--input feild for the taking user name-->
Email Address<input type="text" name="email" ></input><br/><br/><!--input feild for the taking email-->
Password<input type="password" name="pass" ></input><br/><br/><!--input feild for the taking password-->
Confirm Password<input type="password" name="cfmpass" ></input><br/><br/><!--input feild for the taking corfirm password-->
<input type="submit" name="submit" class="btn" value="Sign-up">&nbsp;<!--submit button to submit the form-->

<p class="error"><!--p tag for styling purpose error messages-->
<?php
// $stat_file = "text_files/regi_stat.txt";//this is for storing the error log text file location
// $f_open = fopen($stat_file,"w") or die("unable to open a file!");// opens a error log text file for writing a file

// //session for hit counter
// if(isset($_SESSION['registration']))//checking if the registartion session is set or not
// {
	
// 	$_SESSION['registration'] = $_SESSION['registration'] + 1;// here session is set and increment by 1 when the user visits this page
// 	$regi_stat_count = "Registration Page: ".$_SESSION['registration']; //storing the hit counter digit and message in the local variable
// 	fwrite($f_open,$regi_stat_count);  // writing the hit counter message into the text file
// 	fclose($f_open);// closing the text file
	
// }else
// {
// 	$_SESSION['registration'] = 1; // this is to set the login session hit counter by one so, when user enters into the page it won't give 'undefined index error'
// 	$regi_stat_count = "Registration Page: ".$_SESSION['registration'];//storing the hit counter digit and message in the local variable
// 	fwrite($f_open,$regi_stat_count);// writing the hit counter message into the text file 
// 	fclose($f_open);// closing the text file
// }



//this is to check if the form method is set to post
if(isset($_POST['submit']))
{
	//variables for the error log  
	$date = date("d/m/y"); //storing a date into the variable for error log
	$time = date("h:i:sa"); // storing time into the variable for error log
	$ip = $_SERVER['REMOTE_ADDR'];// this is to store the ip address of the current user
	$errorFile = "/text_files/error_log.txt"; // this is to store the error log text file location
	$err_message = ""; // assigning an error message variable to store error messages to write the errors in the error log file
	
	//including database connection file to make a connection with the database
	include 'dbconnect.php';
		
		//variables for the registration form
		$firstName = mysqli_real_escape_string($connect,$_POST['fn']);//this to store first name from the form using gobal post variable
		$lastName = mysqli_real_escape_string($connect,$_POST['ln']);//this to store last name from the form using gobal post variable
		$userName = mysqli_real_escape_string($connect,$_POST['user']);//this to store user name from the form using gobal post variable
		$email = mysqli_real_escape_string($connect,$_POST['email']);//this to store email from the form using gobal post variable
		$password = mysqli_real_escape_string($connect,$_POST['pass']); //this to store password from the form using gobal post variable
		$cfm_pass = mysqli_real_escape_string($connect,$_POST['cfmpass']);//this to store confirm password from the form using gobal post variable
		$email_vali = "/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i"; // this is for storing regular expression for email validation
		$pass_len = strlen($password); // this will store the password length using string length function
		
		//this will check if the fields are empty or not using empty fucntion, this will also prevent "undifine index error"
		if(empty($firstName) || empty($lastName) || empty($userName) || empty($email) || empty($password) || empty($cfm_pass)) 
		{
			echo $empty_fielderr_msg = "please fill in the fields"."\r\n";//error message for the empty feild 
			$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$empty_fielderr_msg; //storing error message along with ip, date and time in the variable
			$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //opening a error log text file
			fwrite($f_open,$err_message); // writing error message into the error log text file
			fclose($f_open); // closing the opened error log text file
			exit(); // exiting the script so, no futher script is excuted
			
		}else if(!preg_match($email_vali, $email)) //this will check the user mail is valid or not according to reguler expersion and with the use of preg match fucntion
		{
			echo $email_vali_err = "this "."<strong> $email</strong>". " is not valid!" ."</br>". "please enter a valid email!"."\r\n";//error message is displays if the user email is not valid according to reguler experision
			$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$email_vali_err; // storing a error message in the variable along with the date, time and ip for error log
			$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //oping a error log file using a fopen fucntion and storing a message in local varibale
			fwrite($f_open,$err_message); // writing a file into the error log text file using fwrite function
			fclose($f_open); //closing the opened text file
			exit(); // this will stop the script so, futher code is not exicute
		}else if($password !== $cfm_pass) //checking if the two passwords are match or not
		{
			echo $cfm_pass_err = "Your two password dosen't match!!"."\r\n"; // error message is displayed if two passwords are not match
			$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$cfm_pass_err; //error message is store in the varibale with the date, ip and time for error log
			$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //error log text file is open
			fwrite($f_open,$err_message);// writing error log file with error message
			fclose($f_open);// closing the error log file
			exit();  // exiting the script so, no futher script is excuted
			
		}else if ($pass_len < 5)//checking for the password length is less 5 or not and if so, give an error message
		{
			echo $pass_len_err = "your password is too weak!!" ."</br>". "please enter a stronger password, length of more than 5"."\r\n"; // giving an error message if the password length is less than 5
			$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$pass_len_err;//error message is store in the varibale with the date, ip and time for error log
			$f_open = fopen($errorFile,"a+") or die("unable to open a file!");//error log text file is open
			fwrite($f_open,$err_message);// writing error log file with error message
			fclose($f_open);// closing the error log file
			exit();// exiting the script so, no futher script is excuted
		}else
		{
			//variables for the sql query and password hashing 
			$salt = "rksnfdh";// this is the encrytion key which will be use for encrypting the password
			$hashed_pass = md5($salt.md5($password.$salt)); // this is the variable which will store hashed password which is hashed using md5 fucntion
			$user_check_query = "SELECT * FROM users WHERE user_name = '$userName' OR email = '$email' OR password = '$password'"; // this a sql query to check if the user is exists in the databse or not
			$run_query = mysqli_query($connect, $user_check_query);// this will execute the query which I created above using a fucntion called mysqli query
			$result = mysqli_num_rows($run_query); // this will store the result of the query in rows, using function called 'mysqli_num_rows'
			
			//this will check if the query is exicuted or not
			if(!$run_query)
			{
				echo $db_conn_err = "Database connection failed :" . mysqli_error($connect)."\r\n"; // error message is given if the query is connection is fail
				$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$db_conn_err; //error message is store in the varibale with the date, ip and time for error log
				$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //error log text file is open
				fwrite($f_open,$err_message); // writing error log file with error message
				fclose($f_open); // closing the error log file
				exit(); // exiting the script so, no futher script is excuted
			}else // if the above statement is false than below code will be exicuted
			{
				// this will check for the user is already exists in the database or (for dupilcation purpose)
				if($result == 1)
				{
					echo $user_exist_err = "This user is already exist."."\r\n"; // display error message if user already exists
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$user_exist_err;//error message is store in the varibale with the date, ip and time for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //error log text file is open
					fwrite($f_open,$err_message);// writing error log file with error message
					fclose($f_open); // closing the error log file
					exit();  // exiting the script so, no futher script is excuted
				}else 
				{
					//this is to insert the user data into the database if there are no errors
					$sql = "insert into users(first_name, last_name, user_name, email, password)
					values('$firstName','$lastName','$userName','$email','$hashed_pass')";//creating a query for inserting data into the database and storing into the variable
				
					$rs = mysqli_query($connect,$sql); // exicuting the sql query using mysqli query fucntion and storing the result in the variable
					
					if(!$rs)//checking if the query is run properly for not
					{
						echo $db_conn_err =  "Database connection failed :" . mysqli_error($connect)."\r\n"; // displaying an error message if the query is not run
						$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$db_conn_err;//error message is store in the varibale with the date, ip and time for error log
						$f_open = fopen($errorFile,"a+") or die("unable to open a file!");  //error log text file is open
						fwrite($f_open,$err_message); // writing error log file with error message
						fclose($f_open); // closing the error log file
						exit(); // exiting the script so, no futher script is excuted
					}
					else
					{
						// this will create a session success message which will be display when the user succefully register and redirected to the log in page
						$_SESSION['success'] = $userName." Registration sucessfully! please log in to visit members page!";
						// user wil be redirected to the login page if the user is succefully register
						header('Location: /index.php');
						
					}
					
				}
				
				
				mysqli_close($connect); // closing the connection
			}
		}
}

?>
</p> <!--cloding p tag-->
</form> <!--cloding form tag-->

</body><!--cloding body tag-->

</html><!--cloding html tag-->
