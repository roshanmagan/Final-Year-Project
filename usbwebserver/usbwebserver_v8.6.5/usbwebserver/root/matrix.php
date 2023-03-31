<?php
	//this is to start the session so, session can be executed
  ob_start();
	session_start();

?>

<!DOCTYPE html lang="en">
    <head>
      <title>Home</title>
      <script src="sylvester.src.js"></script>
          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="css/nav.css">
          <link rel="stylesheet" href="css/sidebar.css">
          <link rel="stylesheet" href="css/test-questions.css">
          <script type="text/javascript" src="javascript/navbar.js"></script>
          <script src="javascript/inverse.js" type="module"></script>
          <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
      </script>
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
              <a href="#container-box">Matrix Info</a>
              <a href="#questions">Quiz</a>
              <a href="#container-matrix">Matrice Calculator</a>
              <a href="about.php">About</a>
          </div>
        <div id="container-box">
            <div class="dif-matrices">
              <h1>Matrices</h1>
              <span>
                  <p>A matrix is a collection of numbers, symbols, or expressions arranged in a rectangular format, consisting of rows and columns. These structures are commonly utilized in representing linear transformations and solving systems of linear equations. The elements or entries in a matrix are referred to as its numbers, symbols, or expressions. Matrices can be manipulated through operations such as addition, multiplication, transpose, inverse, eigenvalues, and eigenvectors. They are typically represented by capital letters, for example, A, B, or X</p>   
              </span>

              <h1>Matrices Multiplication</h1>
              <span>
                <p>Matrix multiplication, also known as matrix product, is a binary operation that takes a pair of matrices and produces another matrix. In order for matrix multiplication to be defined, the number of columns in the first matrix must be equal to the number of rows in the second matrix. The resulting matrix, known as the product matrix, will have the same number of rows as the first matrix and the same number of columns as the second matrix.

                <p>Matrix multiplication is performed by taking the dot product of each row in the first matrix with each column in the second matrix. The dot product is the sum of the products of the corresponding entries of the two sequences of numbers.</p>
                  
                <p>The result of the matrix multiplication is a new matrix where the value in the i-th row and j-th column is the dot product of the i-th row of the first matrix and the j-th column of the second matrix.</p>
              </span>

              <div class="multi-box">
                  <h2>Example of Matrices Multiplication</h2>

                  <div id="tables">

                        <table class="table-a">
                          <p>A</p>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <tr>
                              <td>a11</td>
                              <td>a12</td>
                              <td>a13</td>
                          </tr>
                          <tr>
                              <td>a21</td>
                              <td>a22</td>
                              <td>a23</td>
                          </tr>
                          <tr>
                              <td>a31</td>
                              <td>a32</td>
                              <td>a33</td>
                          </tr>
                        </table>

                        <table class="table-b">
                          <p>B</p>
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          <tr>
                              <td>b11</td>
                              <td>b12</td>
                              <td>b13</td>
                          </tr>
                          <tr>
                              <td>b21</td>
                              <td>b22</td>
                              <td>b23</td>
                          </tr>
                          <tr>
                              <td>b31</td>
                              <td>b32</td>
                              <td>b33</td>
                          </tr>
                      </table>
                      <span><p>=</p></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <table class="table-c">
                        <p>C</p>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <tr class="tr-1">
                            <td>c11</td>
                            <td>c12</td>
                            <td>c13</td>
                        </tr>
                        <tr class="tr-2">
                            <td>c21</td>
                            <td>c22</td>
                            <td>c23</td>
                        </tr>
                        <tr class="tr-3">
                            <td>c31</td>
                            <td>c32</td>
                            <td>c33</td>
                        </tr>
                    </table>   
                  </div>
                  <h2>Result</h2>
                  <div class=result-out>
                            <p class="td-result">(a11 * b11) + (a12 * b21) + (a13 * b31) = c11</p>
                            <p class="td-result">(a11 * b12) + (a12 * b22) + (a13 * b32) = c12</p>
                            <p class="td-result">(a11 * b13) + (a12 * b23) + (a13 * b33) = c13</p>
                              <br>
                            <p class="td-result">(a21 * b11) + (a22 * b21) + (a23 * b31) = c21</p>
                            <p class="td-result">(a21 * b12) + (a22 * b22) + (a23 * b32) = c22</p>
                            <p class="td-result">(a21 * b13) + (a22 * b23) + (a23 * b33) = c23</p>
                            <br>
                            <p class="td-result">(a31 * b11) + (a32 * b21) + (a33 * b31) = c31</p>
                            <p class="td-result">(a31 * b12) + (a32 * b22) + (a33 * b32) = c32</p>
                            <p class="td-result">(a31 * b13) + (a32 * b23) + (a33 * b33) = c33</p>
                  </div>
              </div>
                <div class="add-box">
                    <h2>Matrices Addition</h2>
                        <div class=matrices-addition>
                            <p>Matrices addition is a fundamental operation in linear algebra that involves adding two matrices of the same size to produce a new matrix of the same size. This operation is based on the idea that each element of the resulting matrix is obtained by adding the corresponding elements of the two matrices being added.</p>
                            <p>Suppose we have two matrices A and B of the same size, say m x n. Then, the sum of A and B, denoted by C = A + B, is another matrix of the same size. The (i, j)-th element of the sum matrix C is obtained by adding the (i, j)-th elements of A and B, that is:</p>
                            $$c_{ij} = a_{ij} + b_{ij}$$
                            <p>for 1 ≤ i ≤ m and 1 ≤ j ≤ n, where a_ij and b_ij are the (i, j)-th elements of A and B, respectively.</p>
                            <p>Here is an example of matrix addition:</p>
                            <p>Suppose we have two matrices A and B:</p>

                            <div>
                              $$A = \begin{bmatrix}
                              1 & 2 & 3 \\
                              4 & 5 & 6 \\
                              7 & 8 & 9 \\
                              \end{bmatrix}$$
                            </div>

                            <div>
                              $$A = \begin{bmatrix}
                              9 & 8 & 7 \\
                              6 & 5 & 4 \\
                              3 & 2 & 1 \\
                              \end{bmatrix}$$
                            </div>
                            <p>To compute the sum matrix C = A + B, we add the corresponding elements of A and B:</p>

                            \[
                            C = \begin{bmatrix}
                            1 + 9 & 2 + 8 & 3 + 7 \\
                            4 + 6 & 5 + 5 & 6 + 4 \\
                            7 + 3 & 8 + 2 & 9 + 1 \\
                            \end{bmatrix}
                            \]

                            \[
                            C = \begin{bmatrix}
                            10 & 10 & 10 \\
                            10 & 10 & 10 \\
                            10 & 10 & 10 \\
                            \end{bmatrix}
                            \]

                            <p>Therefore, the sum of matrices A and B is a matrix C where each element is equal to 10.</p>
                            <p>It is important to note that matrix addition is a commutative operation, that is, A + B = B + A for any matrices A and B of the same size. Additionally, matrix addition is associative, meaning that (A + B) + C = A + (B + C) for any matrices A, B, and C of the same size.</p>
                        </div>               
                </div>

                </div>
                      
          <div id="questions">
            <form id="test-questions">
            <h2>Test Questionnaire</h2>
            <p class="question">Please answer the following questions:</p>
            <div>
            <p class="question">1) What is the order of a matrix?</p>
            
            <label for="q1-A">A. The number of columns and rows in a matrix
                <input type="radio" id="q1-A" name="question1" value="A" required>
            </label>
            <label for="q1-B">B. The number of rows in a matri
                <input type="radio" id="q1-B" name="question1" value="B">
            </label>
            <label for="q1-C">C. The number of columns in a matrix
                <input type="radio" id="q1-C" name="question1" value="C">
            </label>
            </div>
          <br>
          <div>
            <p class="question">2) What is the product of a matrix A with dimensions m x n and a matrix B with dimensions p x q?</p>
            <label for="q2-A">A. A matrix with dimensions m x q
                <input type="radio" id="q2-A" name="question2" value="A" required>
            </label>
            
            <label for="q2-B">B. A matrix with dimensions p x n
                <input type="radio" id="q2-B" name="question2" value="B">
            </label>
            <label for="q2-C">C. A matrix with dimensions m x p
                <input type="radio" id="q3-C" name="question2" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">3) Which of the following is not a property of matrix addition?</p>
            <label for="q3-A">A. Commutativity
                <input type="radio" id="q3-A" name="question3" value="A" required>
            </label>
            <label for="q3-B">B. Associativity
                <input type="radio" id="q3-B" name="question3" value="B">
            </label>
            <label for="q3-C">C. Inverses
                <input type="radio" id="q3-C" name="question3" value="C">
            </label>
          </div>
          <button type="submit" id="myBtn">Submit</button>

          <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p id="test-result"></p>
        </div>

        </div>

        </form>

          </div>

            <div class="container" id="container-matrix">
              <h2>Matrices Caculator</h2>
            <form class="Matrix_multi" action="index.html" method="post">
              <input type="text" id="rowSize" value="4"/>
              <input type="text" id="colSize" value="4"/>
                <button id="create-f" type="button" name="button">+</button>
          <div class="matrix">
            <p class="A">Matrix a</p>
            <div id="Matrix_a">
              <!-- <input type="text" id="aR1C1" size="4" value="1"/>
              <input type="text" id="aR1C2" size="4" value="2"/>
              <input type="text" id="aR1C3" size="4" value="3"/>

            <br/>
              <input type="text" id="aR2C1" size="4" value="4"/>
              <input type="text" id="aR2C2" size="4" value="5"/>
              <input type="text" id="aR2C3" size="4" value="6"/>
            <br/>
            <input type="text" id="aR3C1" size="4" value="7"/>
            <input type="text" id="aR3C2" size="4" value="8"/>
            <input type="text" id="aR3C3" size="4" value="9"/> -->

            </div>

              <p class="B">Matrix b</p>
            <div id="Matrix_b">
              <!-- <input type="text" id="bR1C1" size="4" value="1"/>
            <input type="text" id="bR1C2" size="4" value="2"/>
            <input type="text" id="bR1C3" size="4" value="3"/>
            <br/>
            <input type="text" id="bR2C1" size="4" value="4"/>
            <input type="text" id="bR2C2" size="4" value="5"/>
            <input type="text" id="bR2C3" size="4" value="6"/>
            <br/>
            <input type="text" id="bR3C1" size="4" value="7"/>
            <input type="text" id="bR3C2" size="4" value="8"/>
            <input type="text" id="bR3C3" size="4" value="9"/> -->
            </div>
            </div>
            <style>
                  .inputA,.inputB,.inputC{
                    width:40px;
                  }
                  #rowSize,#colSize{
                    width:40px;
                  }

                  
                </style>
            <div id="radio_buttons">
              <p class="option">Please select your option</p>
              <input type="radio" id="times" name="arth" value="multi">
              <label for="AxB">A x B</label><br>
              <input type="radio" id="plus" name="arth" value="add">
              <label for="A+B">A + B</label><br>
              <input type="radio" id="minus" name="arth" value="sub">
              <label for="A-B">A - B</label>
              <input type="radio" id="trans" name="arth" value="trans">
              <label for="A-trans">A transpose</label>
            </div>

            <div id="M_result">
              <input type="button" id="mButton" value="submit"/>
            </div>
                  <br>
        <div class="matrices-out">
          <canvas id="myCanvas" width="800" height="600"></canvas>
        </div>
          <p>Result</p>
          <div id="Matrix_c">
                <!-- <input type="text" id="rR1C1" size="4" />
                <input type="text" id="rR1C2" size="4" />
                <input type="text" id="rR1C3" size="4" />
                <br/>
                <input type="text" id="rR2C1" size="4" />
                <input type="text" id="rR2C2" size="4" />
                <input type="text" id="rR2C3" size="4" />
                <br/>
                <input type="text" id="rR3C1" size="4" />
                <input type="text" id="rR3C2" size="4" />
                <input type="text" id="rR3C3" size="4" />
                <br/> -->
          </div>
          </form>
          </div>
            <script type="module" src="matrix.js"></script>
            <script type="text/javascript" src="javascript/quiz.js"></script>
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
    </div>
        
    </body>
</html>
