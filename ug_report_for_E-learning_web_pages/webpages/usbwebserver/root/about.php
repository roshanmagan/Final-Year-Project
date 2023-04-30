<?php
	//this is to start the session so, session can be executed
    ob_start();
	session_start();

?>

<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="javascript/navbar.js"></script>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/about.css">
    <title>about and feedback page</title>
</head>
<body>
        <div class="navbar">
                <a href="home.php">Home</a>
                <a href="#about">About</a>
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

        <h1>feedback Form</h1>
        <iframe scrolling="no" id="feedback-form" src="https://docs.google.com/forms/d/e/1FAIpQLSdGZ9X1OOf1-v8S6kuOqYIW4K5LuUCOi3GtttU42U_fiVp0SQ/viewform?embedded=true" width="640" height="2147" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
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
              echo "<p>"."Hello ". $_SESSION['name']."</p>";	//displays the welcome message by displaying user's email address 
              echo "<p class='success'>".$success_msg."</p>"; //this is to display the log in success message

        } 
        ?>
</body>
</html>