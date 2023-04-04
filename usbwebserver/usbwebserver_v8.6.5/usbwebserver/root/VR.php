<?php
	//this is to start the session so, session can be executed
  ob_start();
	session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Interactive Game</title>
    <script type="text/javascript" src="javascript/navbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r133/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/GLTFLoader.js"></script>
    <!-- <script src="./javascript/vr.js" type="module"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/vr.css">
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
  <div id="container">
  <h1>Virtual Reality</h1>
    <p>Virtual reality (VR) is a computer-generated simulation of a three-dimensional image or environment that can be interacted with in a seemingly real or physical way by a person using special electronic equipment, such as a headset with sensors.

VR technology has the potential to offer users a completely immersive experience that can transport them to another world or allow them to interact with digital objects as if they were real. The headset worn by the user typically contains sensors that track the movement of the user's head, as well as handheld controllers that track hand movements.</p>

<p>There are several types of VR systems, including:

Non-immersive VR: This type of VR typically involves a computer monitor and does not require the use of a headset or other specialized equipment.

Semi-immersive VR: This type of VR includes a headset and may also include hand-held controllers, but does not completely immerse the user in the virtual environment.

Fully-immersive VR: This type of VR involves the use of a headset and other specialized equipment that completely immerses the user in the virtual environment, blocking out the real world.

VR has many potential applications, including:

Gaming: VR gaming allows users to interact with digital environments and objects in a more immersive way.

Education and Training: VR can be used to simulate real-world scenarios for educational or training purposes.

Healthcare: VR can be used for therapy, rehabilitation, and pain management.

Architecture and Design: VR can be used to create and explore virtual architectural designs and models.

Travel and Tourism: VR can be used to provide virtual tours of tourist destinations.

Overall, virtual reality has the potential to revolutionize the way we interact with digital environments and has numerous potential applications across a range of industries.
</p>
  </div>
    <button id="enter-ar-button">Enter demo</button>
    <button id="hide-ar-button">Hide demo</button>
    <script>
          // Initialize the Three.js library and create a 3D scene
      var scene = new THREE.Scene();
      var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
      var renderer = new THREE.WebGLRenderer({ antialias: true });
      renderer.setSize(750, 400);
      renderer.setClearColor(0x100d12, 1);
      renderer.xr.enabled = true;
      renderer.shadowMap.enabled = true;
      renderer.shadowMap.type = THREE.PCFSoftShadowMap; // default THREE.PCFShadowMap
      document.body.appendChild(renderer.domElement);


      //create a blue LineBasicMaterial
      const m = new THREE.LineBasicMaterial( { color: 0x0000ff } );
      const points = [];
      points.push( new THREE.Vector3( -10, 0, 0 ) );
      points.push( new THREE.Vector3( 0, 10, 0 ) );
      points.push( new THREE.Vector3( 10, 0, 0 ) );

      const g = new THREE.BufferGeometry().setFromPoints( points );
      const line = new THREE.Line( g, m );

      scene.add(line);

      //create a plane material
      const planeGeometry = new THREE.PlaneGeometry( 2000, 2000 );
      planeGeometry.rotateX( - Math.PI / 2 );

      const planeMaterial = new THREE.ShadowMaterial();
      // planeMaterial.opacity = 0.2;

      const plane = new THREE.Mesh( planeGeometry, planeMaterial );
      plane.position.y = -200;
      plane.receiveShadow = true;
      scene.add( plane );

      // Create a cube mesh with a red material
      var geometry = new THREE.BoxGeometry();
      var material = new THREE.MeshBasicMaterial({ color: 0x0000ff });
      /*Right of spawn face*/
      console.log(geometry);
      console.log(material);
      material.lightMapIntensity = 3;
      var cube = new THREE.Mesh(geometry, material);
      let pos_x = 0.00;
      let pos_y = 0.00;
      let pos_z = 0.00;
      let rot_x = 0.00;
      let rot_y = 0.00;
      let rot_z = 0.00;
      scene.add(cube);

      function reset(){
      pos_x = 0.00;
      pos_y = 0.00;
      pos_z = 0.00;
      rot_x = 0.00;
      rot_y = 0.00;
      rot_z = 0.00;
      updatePos();
      }

      function updatePos(){
          let pos_x_input = parseFloat(document.getElementById("p-x").value);
          let pos_y_input = parseFloat(document.getElementById("p-y").value);
          let pos_z_input = parseFloat(document.getElementById("p-z").value);
          let rot_x_input = parseFloat(document.getElementById("r-x").value);
          let rot_y_input = parseFloat(document.getElementById("r-y").value);
          let rot_z_input = parseFloat(document.getElementById("r-z").value);
          pos_x = pos_x_input;
          pos_y = pos_y_input;
          pos_z = pos_z_input;
          rot_x = rot_x_input;
          rot_y = rot_y_input;
          rot_z = rot_z_input;
      }

      console.log(cube);
      // Set the camera position and render the scene
      camera.position.z = 5;

      // Create a directional light
      var light = new THREE.DirectionalLight(0x0000ff, 1);
      // Set the position of the light
      light.position.set(0,1,0);
      // light.position.y = 3;
      // light.position.z = 4;
      light.castShadow = true; // default false
      // Add the light to the scene
      scene.add(light);

      renderer.setAnimationLoop( function () {

      renderer.render( scene, camera);
          cube.position.x = pos_x;
          cube.position.y = pos_y;
          cube.position.z = pos_z;
          cube.rotation.x += rot_x;
          cube.rotation.y += rot_y;
          cube.rotation.z += rot_z;

      } );
      document.querySelector('#enter-ar-button').addEventListener('click', function(event) {
        console.log("this is working");
        document.getElementById("canvas-container").style.display = "block";
        document.querySelector('canvas').style.display = "block";
      });

      document.querySelector('#hide-ar-button').addEventListener('click', function(event) {
        console.log("this is working");
        document.getElementById("canvas-container").style.display = "none";
        document.querySelector('canvas').style.display = "none";
      });

  </script>
    <br>
    <br>
    <div id="canvas-container">
    <form>
    <section class="P-cordinates">
        <label for="p-x">X position:</label>
        <input type="number" id="p-x" name="px" value="0.00">
        <br>
        <label for="p-y">Y position:</label>
        <input type="number" id="p-y" name="py" value="0.00">
        <br>
        <label for="p-z">Z position:</label>
        <input type="number" id="p-z" name="pz" value="0.00">
    </section>
        <br>
        <br>
    <section class="R-cordinates">
        <label for="r-x">X Rotate:</label>
        <input type="number" id="r-x" name="rx" value="0.00">
        <br>
        <label for="r-y">Y Rotate:</label>
        <input type="number" id="r-y" name="ry" value="0.00">
        <br>
        <label for="r-z">Z Rotate:</label>
        <input type="number" id="r-z" name="rz" value="0.00">
      </section>
      <button type="button" onclick = "updatePos()">submit</button>
      <button type="button" onclick = "reset()">Reset</button>
    </form>
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
