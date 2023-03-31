<?php
	//this is to start the session so, session can be executed
	ob_start();
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/sidebar.css">
  <script type="text/javascript" src="javascript/navbar.js"></script>
  
</head>
<body>
  <div class="navbar">
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <div class="dropdown">
      <button class="dropbtn">Pages
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-list">
        <a href="matrix.php">Matrices</a>
        <a href="VR.php">Virtual Reality</a>
		<a href="tree-data-structure.php">Tree Algorithms</a>
      </div>
    </div> 
    <a href="loginsystem/logout.php">logout</a>
  </div>

  <!-- Sidebar -->
  <div id="mySidenav" class="sidenav">
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

	<div class="card">
		<a class="button-a" href="matrix.php">
			<img src="img/math-banner.png" alt="Avatar" style="width:100%">
		</a>
	<div class="container">
		<h4><b>Matrix Calculation</b></h4> 
		<p>Matrices related topics</p> 
	</div>
	</div>

	<div class="card">
		<a class="button-a" href="VR.php">
			<img src="img/vr-banner.png" alt="Avatar" style="width:100%">
		</a>
	<div class="container">
		<h4><b>Virtual reality</b></h4> 
		<p>Virtual Reality related topics</p> 
	</div>
	</div>

	<div class="card">
		<a class="button-a" href="tree-data-structure.php">
			<img src="img/tree-banner.png" alt="Avatar" style="width:100%">
		</a>
	<div class="container">
		<h4><b>Virtual reality</b></h4> 
		<p>Virtual Reality related topics</p> 
	</div>
	</div>
<!-- <div class="box-a">
<img class="button-list" src="img/math-banner.jpg"><a class="button-a" href="matrix.php">Matrix Calculation</a></img>

</div> -->
<!-- <div class="box-b">
    <li class="button-list"><a class="button-a" href="VR.php">Virtual reality</a></li>
</div> -->

<?php
	
	if(!isset($_SESSION['name'])) //this will redirect the user to login page if the user is not log in
	{
	//no session name found no redirect back to login page
		$_SESSION['error_login'] = "please login to enter the Members page";
		//this will redirect the user to login page
		header("Location: index.php");
		ob_end_flush();
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
				// echo "<div class='username-txt'><p>"."Hello ". $_SESSION['name']."</p>
				// <p class='success'>".$success_msg."</p>
				// <a href = 'logout.php'>Logout</a></div>";	//displays the welcome message by displaying user's email address 

	} 
?>
</body>
</html>
