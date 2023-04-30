<?php
	//this is to start the session so, session can be executed
  ob_start();
	session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tree Algorithms</title>
    <script type="text/javascript" src="javascript/navbar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="javascript/texttospeach.js"></script>
    <link rel="stylesheet" href="css/texttospeach.css">
    <link rel="stylesheet" href="css/tree.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/sidebar.css">
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
                <a href="tree-data-s tructure.php">Tree Algorithms</a>
              </div>
            </div> 
          <a href="loginsystem/logout.php">logout</a>
        </div>
                  <!-- Sidebar -->
          <div id="mySidenav" class="sidenav">
              <a href="#">About</a>
              <a href="#">Quizz</a>
              <a href="#tree-data">Search Tree</a>
          </div>
  <div id="container">
    <div class=buttons>
  <button id=play onclick ="textToSpeach()"></button> &nbsp;
  <button id=pause onclick ="textToSpeach()"></button> &nbsp;
  <button id=stop onclick ="textToSpeach()"></button>
</div>
<h1>Tree Data Structures</h1>
<article id="about">

<p> A tree data structure is a collection of nodes arranged in a hierarchical structure. Each node in a tree can have zero or more child nodes, and every child node can have its child nodes. This forms a tree-like structure, with a single root node at the top and one or more child nodes beneath it.</p>
<br>
<p>The root node is the topmost node in the tree, and it has no parent node. All other nodes in the tree have exactly one parent node, except for the nodes at the bottom of the tree, which have no children and are called leaf nodes.</p>
<br>
<p>Each node in a tree consists of a value and a set of references to its child nodes. The value can be any data type, such as a number, a string, an object, or tree. The references to the child nodes are typically represented as pointers or references in programming languages, allowing us to traverse the tree and access its nodes.</p>
<br>
<p>Trees often represent hierarchical data structures, such as file systems, organization charts, or family trees. They are also used in algorithms for searching, sorting, and storing data. Some common types of trees include:</p>
<br>
<p>1. Binary Trees: A binary tree is a tree in which each node has at most two children. The children are usually called the left child and the right child. Binary trees are commonly used in search algorithms like binary search.</p>
<br>
<p>2. AVL Trees: An AVL tree is a self-balancing binary search tree, where the heights of the two child subtrees of any node differ by at most one. This ensures that the tree remains balanced and that search, insertion, and deletion operations take average O(log n) time.</p>
<br>
<p>3. B-trees: A B-tree is a self-balancing tree data structure commonly used in database and file systems. It is similar to an AVL tree but allows for more than two children per node, reducing the tree's height and improving performance.</p>
<br>
<p>4. Trie Trees: A trie is a tree data structure used for storing strings, where each node represents a string prefix. Tries are commonly used in text editors and spell checkers, where they are used to quickly search for words in a large dictionary.
</p>
<br>
<p>In conclusion, trees are a powerful data structure that can be used to represent a wide range of hierarchical structures. They are efficient for searching, sorting, and storing data and come in many forms to suit different applications.
</p>
</article>
	<div id= "tree-data" class="tree">
  <h1>Binary Search Tree</h1>
  <canvas id="canvas" width="800" height="1000"></canvas>

    <div class="frms-container">
    <form>
      <div class="frms">
      <label for="insert-value">Insert value:</label>
      <input type="text" id="insert-value" />
      <button type="submit">Insert</button>
      </div>
    </form>
    <form >
      <div class="frms">
      <label for="find-value">Find value:</label>
      <input type="text" id="find-value" />
      <button type="submit">Find</button>
      <button type="button" id="remove-value">Remove</button>
      </div>

    </form>
    <form>
    <button type="button" id="generate-value">Random Tree</button>
    </form>
    </div>

    <div class="output"></div>
    <script src="javascript/binarytree.js"></script>
	</div>
  </div>
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
              // echo "<p>"."Hello ". $_SESSION['name']."</p>";	//displays the welcome message by displaying user's email address 
              // echo "<p class='success'>".$success_msg."</p>"; //this is to display the log in success message

        } 
        ?>
</body>
</html>
