<?php
//This variables are for database connection//
$host = 'localhost';//this is to store the host name  
$UserName = 'root'; //this is to store the username of the server
$Password = 'usbw'; // this is to store password of the server
$dbName = 'loginsystem'; //this is to storing database name which I have create for this assignment

//This variables are for error log//
$date = date("d/m/y"); //this is to store the current data for error log 
$time = date("h:i:sa"); //for storing the current time for error log 
$ip = $_SERVER['REMOTE_ADDR']; // for storing user IP address for error log
$errorFile = "text_files/error_log.txt"; //this is for storing the error log text file location
$err_message = ""; // assigning an error message variable to store error messages to write the errors in the error log file

//making a connection to the database using mysqli connect function, also by checking the hostname, username and password match with the database or not
$connect = mysqli_connect ($host, $UserName, $Password);

//checking for the error that connection is made or not
if(!$connect)
{
	echo $db_connect_err = "Database fail to connect: ". mysqli_error($connect)."\r\n"; //error message is displays if the connection is fail
	$err_message = $date." ".$time." ".$ip." ".$db_connect_err; // storing a error message in the variable along with the date, time and ip for error log 
	$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //oping a error log file using a fopen fucntion and storing a message in local varibale  
	fwrite($f_open,$err_message); // writing a file into the error log text file 
	fclose($f_open); //closing  the error log text
	exit(); // this will stop the script so, futher code is not exicute
	
}

//selcting a database which I have created inside a database using the fucntion called mysqli select db
$identify_db = mysqli_select_db($connect, $dbName);

//cheking for errors that that database is selected or not
if (!$identify_db)
{
	echo $db_select_err = "Database fail to select: ". mysqli_error($connect)."\r\n";//error message is displays if the connection is fail
	$err_message = $date." ".$time." ".$ip." ".$db_select_err; //storing a error message in the variable along with the date, time and ip for error log 
	$f_open = fopen($errorFile,"a+") or die("unable to open a file!"); //oping a error log file using a fopen fucntion and storing a message in local varibale 
	fwrite($f_open,$err_message); // writing a file into the error log text file 
	fclose($f_open); //closing  the error log text
	exit(); // this will stop the script so, futher code is not exicute
}
?>