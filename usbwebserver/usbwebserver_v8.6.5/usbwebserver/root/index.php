<?php
//this for staring the session so, sessions can be use on this page
session_start();
?>
<html> <!--opening of html page-->

	<head><!--opening of head-->
		<!--this the title of the page -->
		<title>Log in system</title>
		<!--linking a stylesheet for styling my page using css-->
		<link rel="stylesheet" type="text/css" href="loginsystem/style.css">
	</head><!--closing of header-->
	
	<body><!--open of body -->
	
	<h1>Multi User Login:</h1><!--heading of the page-->

<!--created a form to get the user input, in this case log in details email and password-->
	<form name = "frmLogin" method = "post" action = "index.php"><!--opening of the form-->
	
	<a class="btn" href = 'loginsystem/registration.php'>Sign-up</a><!--link to go to the registration page--><br /><br />

	Email<input type = "text" name = "email"></input><br /><br /> <!--email feild to type the email-->
	Password<input type = "password" name = "password"></input><br /><br /> <!--password field to type the password-->
	<input class="btn" type = "submit" name = "Submit" value = "Login"></input><br /> <!--button to submit the log in details-->
	
	<!--opning of the p tag-->
	<p class="error">

	<?php
	//including a connection script to create a connection to the database
	include('loginsystem/dbconnect.php');

	//this is to display error message when user trys to enter into the members page
	if(isset($_SESSION['error_login']))
	{
		echo "<p class='error'>".$_SESSION['error_login']."</p>"; // displaying the error message
		$_SESSION['error_login']= NULL; //this is to empty the session so the message displays only once
	}

	//this is to check if the user is successfully registers and display the success message when user is redirected from signup page
	if(isset($_SESSION['success']))
	{
		echo "<p class='success'>".$_SESSION['success']."</p>"; //displaying the success message
		$_SESSION['success']= NULL;//this is to empty the session so the message displays only once
	}

	$stat_file = "text_files/login_stat.txt"; //this is for storing the error log text file location
	$f_open = fopen($stat_file,"w") or die("unable to open a file!"); // opens a error log text file for writing a file 

	//session for hit counter
	if(isset($_SESSION['login']))//checking if the session is set or not
	{
		$_SESSION['login'] = $_SESSION['login'] + 1; // here session is set and increment by 1 when the user visits this page
		$login_stat_count = "Login Page: ".$_SESSION['login']; //storing the hit counter digit and message in the local variable
		fwrite($f_open,$login_stat_count); // writing the hit counter message into the text file 
		fclose($f_open); // closing the text file
	}else
	{
		$_SESSION['login'] = 1; // this is to set the login session hit counter by one so, when user enters into the page it won't give 'undefined index error'
		$login_stat_count = "Login Page: ".$_SESSION['login']; //storing the hit counter digit and message in the local variable
		fwrite($f_open,$login_stat_count); // writing the hit counter message into the text file 
		fclose($f_open); // closing the text file
	}

	//error log variables 
	$date = date("d/m/y"); //this is to store the current data for error log 
	$time = date("h:i:sa"); //for storing the current time for error log
	$ip = $_SERVER['REMOTE_ADDR']; // for storing user IP address for error log
	$errorFile = "text_files/error_log.txt"; //this is for storing the error log text file location
	$err_message = ""; // assigning an error message variable to store error messages to write the errors in the error log file

	// this is to check if the user has click the form submit button or not 
	if (isset($_POST['Submit']))
	{

		//this is to check that the feilds are empty or not, this is also to prevent the 'undefine index errors'
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			
			$email = mysqli_real_escape_string($connect,$_POST['email']); // this is variable which will store the email of the user
			$password = mysqli_real_escape_string($connect,$_POST['password']); // this is variable which will store the password of the user
			$pass_len = strlen($password); // this will store the password length using string length function
			$salt = "rksnfdh"; // this is the encrytion key which will be use for encrypting the password
			$hashed_pass = md5($salt.md5($password.$salt)); // this is the variable which will store hashed password which is hashed using md5 fucntion
			$email_vali = "/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i"; // reguler expression to check the email vailidity
			//$_SESSION ['last_time'] = time();
			$user_check_query = "SELECT * FROM users WHERE email = '$email' OR password = '$hashed_pass'";//this is sql query to check if the user has enter the correct email and password
			$result = mysqli_query($connect, $user_check_query);// this will execute the query which I created above using a fucntion called mysqli query
			$user = mysqli_fetch_assoc($result);// this will fetch the result in to the array so, I can compare the user email with the database email
			
				if (!$result)//error checking that the query runed properly or not
				{
					echo $db_conn_err = "Database connection failed :" . mysqli_error($connect)."\r\n";  //error message is displays if the connection is fail
					$err_message = "[ ".$date." ".$time." ".$ip."] ".$db_conn_err; // storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!");  
					fwrite($f_open,$err_message);   // writing a file into the error log text file using fwrite function
					fclose($f_open); //closing the opened text file
					exit();  // this will stop the script so, futher code is not exicute
				}
				else if($user['email'] != $email) // this will compare user email and database emails that any email match or not
				{
					echo $email_err = "This email is not register with us!!"."\r\n"; //error message is displays if the user email is not match with the database emails
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$email_err; // storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!");//oping a error log file using a fopen fucntion and storing a message in local varibale
					fwrite($f_open,$err_message); // writing a file into the error log text file using fwrite function
					fclose($f_open); //closing the opened text file
					exit(); // this will stop the script so, futher code is not exicute
				}
				else if(!preg_match($email_vali, $email)) //this will check the user mail is valid or not according to reguler expersion and with the use of preg match fucntion
				{
					echo $email_vali_err = "this "."<strong> $email</strong>". " is not valid!" ."</br>". "please enter a valid email"."\r\n";//error message is displays if the user email is not valid according to reguler experision
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$email_vali_err; // storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!");//oping a error log file using a fopen fucntion and storing a message in local varibale
					fwrite($f_open,$err_message);  // writing a file into the error log text file using fwrite function
					fclose($f_open); //closing the opened text file
					exit(); // this will stop the script so, futher code is not exicute
					
				}
				else if($pass_len < 5)//this will check the length of the password is less than 5 or not, if the password is less than 5 give an error message
				{
					echo $pass_len_err = "your password is too weak!!" ."</br>". "please enter a stronger password, length of more than 5"."\r\n";//error message is displays if the user password length is less than 5
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$pass_len_err; // storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //oping a error log file using a fopen fucntion and storing a message in local varibale
					fwrite($f_open,$err_message);// writing a file into the error log text file using fwrite function
					fclose($f_open);//closing the opened text file
					exit(); // this will stop the script so, futher code is not exicute
				}
				else if($user['password'] != $hashed_pass)//this will compare user password to the database passwords to check if the passwords are match or not
				{
					echo $pass_err = "password is wrong"."\r\n"; // error message will be display if the user's password didn't match with the database password
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$pass_err; //storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!");//oping a error log file using a fopen fucntion and storing a message in local varibale
					fwrite($f_open,$err_message);// writing a file into the error log text file using fwrite function
					fclose($f_open); //closing the opened text file
					exit();  // this will stop the script so, futher code is not exicute
					
				}else if ($user['email'] === $email || $user['password'] === $hashed_pass)//this is to check that the user email and password are match with the database or not
				{
				
				//sets the session for the user to access the memebers page
				$_SESSION['name'] = $email;
				header('Location: home.php'); // this will redirect the user to members page
				} else
				{
					echo $email_pass_err = "User email and passwords are incorrect"."\r\n"; // error message will be display if the user's password and email didn't match with the database password and email
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$email_pass_err; //storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!");//oping a error log file using a fopen fucntion and storing a message in local varibale
					fwrite($f_open,$err_message);// writing a file into the error log text file using fwrite function
					fclose($f_open); //closing the opened text file
					exit();  // this will stop the script so, futher code is not exicute
				}
			
				mysqli_close($connect);// this is to close the sql connection
				

		}else // this is an else statement will be excuted when the user clicks on the submit button without entering email and password
		{
				
					echo $empty_fielderr_msg = "Feilds can't be empty!"."<br/>"."Please fill in the username and password to log in!"."\r\n";
					$err_message = "[ ".$date." ".$time." ".$ip." "."] ".$empty_fielderr_msg; //storing a error message in the variable along with the date, time and ip for error log
					$f_open = fopen($errorFile,"a+") or die("unable to open a file!");//oping a error log file using a fopen fucntion and storing a message in local varibale
					fwrite($f_open,$err_message); // writing a file into the error log text file using fwrite function
					fclose($f_open); //closing the opened text file
					exit();  // this will stop the script so, futher code is not exicute
		}
	}
	?>

	</p> <!--this is the closing p tag-->
	</form> <!--closing form tag-->

	</body> <!--this is the closing body tag-->
</html> <!--this is the closing html tag-->





