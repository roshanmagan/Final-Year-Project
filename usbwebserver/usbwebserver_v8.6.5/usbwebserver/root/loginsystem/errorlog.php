<html>
<head>
<title>Error log</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Error log page</h1>
<a class="btn" href="index.php">Home</a><br /><br /><!--link to go to the home page-->
</body>
</html>

<?php
if ('' == filesize('text_files/error_log.txt') )//this to check if the file is empty or not
{
	echo "no errors at the moment!";//display the message if the file is empty
	
}else
{
		$errorFile = "text_files/error_log.txt";//storing the text file location in the variable
		$f_open = fopen($errorFile ,"r") or die("unable to open a file!");  // opens the file for reading purpose
		$error = fread($f_open,filesize($errorFile)); // reading the file and storing the message on the variable
		fclose($f_open); // this will close the open file
		echo nl2br(nl2br($error)); // displaying the error messages and adding the break line
		
}
	
	

?>