<?php
	//this is to start the session so, session can be executed
  ob_start();
	session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Virtual Reality</title>
    <script type="text/javascript" src="javascript/navbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r133/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three/examples/js/loaders/GLTFLoader.js"></script>
    <script type="text/javascript" src="javascript/texttospeach.js"></script>
    <!-- <script src="./javascript/vr.js" type="module"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/vr.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/test-questions.css">
    <link rel="stylesheet" href="css/texttospeach.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarala">
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
              <a href="#container">VR Info</a>
              <a href="#questions">Quiz</a>
              <a href="#enter-ar-button">VR demo</a>
          </div>


  <div id="container">
  <h1>Virtual Reality</h1>
  <div class=buttons>
  <button id=play onclick ="textToSpeach()"></button> &nbsp;
  <button id=pause onclick ="textToSpeach()"></button> &nbsp;
  <button id=stop onclick ="textToSpeach()"></button>
</div>
<article>
  <h3>Introduction to Virtual Reality</h3>
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

<h3>Components of a Virtual Reality System</h3>
<p>Virtual Reality (VR) systems comprise several hardware and software components that create a fully immersive experience. Here are the main components of a VR system:
 
<ul>
  <li>
    <p>Head-Mounted Display (HMD): This is the most critical component of a VR system. It is a device worn on the head that displays the virtual environment to the user. Modern HMDs are equipped with a high-resolution screen for displaying 3D graphics and built-in sensors for tracking the movement of the user's head.</p>
  </li>
  <li>
    <p>Input Devices: These devices allow users to interact with the virtual environment. The most common input devices are hand-held controllers, which track the user's hand movements and allow them to interact with objects in the virtual environment.</p>
  </li>
  <li>
    <p>Computer: A powerful computer is required to run VR software and render the high-quality graphics needed for an immersive experience. The computer must have a fast processor, a powerful graphics card, and enough memory to handle the demands of VR software.</p>
  </li>
  <li>
    <p>Sensors: To create an immersive experience, VR systems must accurately track the user's movement. This is done using sensors placed around the room or on the user's body. These sensors track the user's movement and adjust the virtual environment accordingly.</p>
  </li>
  <li>
    <p>Software: The software component of a VR system is responsible for rendering the 3D graphics and handling the user's input. Many different VR software applications are available, each with its own features and capabilities.</p>
  </li>
  <p>By combining these hardware and software components, VR systems create an immersive experience that allows users to interact with virtual environments in a way that feels almost as real as the physical world.</p></p>
</ul>

  </div>
    
</article>
  <div id="questions">
            <form id="test-questions">
            <h2>Test Questionnaire</h2>
            <p class="question">Please answer the following questions:</p>
            <div>
            <p class="question">1. What is virtual reality, and how does it differ from augmented reality?</p>
            
            <label for="q1-A">A. Virtual reality is a completely immersive experience that replaces the real world, while augmented reality overlays digital content onto the real world.
                <input type="radio" id="q1-A" name="question1" value="A" required>
            </label>
            <label for="q1-B">B. Virtual reality is a form of video conferencing, while augmented reality is a simulation of a real-world environment.
                <input type="radio" id="q1-B" name="question1" value="B">
            </label>
            <label for="q1-C">C. The number of columns in a matrixVirtual reality is a way to browse the internet, while augmented reality is a type of social media.
                <input type="radio" id="q1-C" name="question1" value="C">
            </label>
            </div>
          <br>
          <div>
            <p class="question">2. What are the primary hardware components required for a virtual reality system?</p>
            <label for="q2-A">A. A mouse and keyboard
                <input type="radio" id="q2-A" name="question2" value="A" required>
            </label>
            
            <label for="q2-B">B. A monitor and speakers
                <input type="radio" id="q2-B" name="question2" value="B">
            </label>
            <label for="q2-C">C. A VR headset and controllers
                <input type="radio" id="q3-C" name="question2" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">3. What is the difference between a VR headset with positional tracking and one without it?</p>
            <label for="q3-A">A. A VR headset with positional tracking can detect the user's physical movements, while one without it cannot.
                <input type="radio" id="q3-A" name="question3" value="A" required>
            </label>
            <label for="q3-B">B. A VR headset with positional tracking is wireless, while one without it is wired.
                <input type="radio" id="q3-B" name="question3" value="B">
            </label>
            <label for="q3-C">C. A VR headset with positional tracking has a higher resolution display, while one without it 
                <input type="radio" id="q3-C" name="question3" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">4. What is the role of haptic feedback in virtual reality, and how is it achieved?</p>
            <label for="q4-A">A. Haptic feedback provides users with visual cues to enhance the virtual reality experience.
                <input type="radio" id="q4-A" name="question4" value="A" required>
            </label>
            <label for="q4-B">B. Haptic feedback provides users with a sense of touch or force feedback, which can make virtual objects feel more realistic
                <input type="radio" id="q4-B" name="question4" value="B">
            </label>
            <label for="q4-C">C. Haptic feedback provides users with a sense of smell, which can make virtual environments feel more immersive. 
                <input type="radio" id="q4-C" name="question4" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">5. What is the field of view, and why is it an essential factor in virtual reality?</p>
            <label for="q5-A">A. The field of view is the size of the virtual environment, and it is essential to ensure that the user does not get lost in it.
                <input type="radio" id="q5-A" name="question5" value="A" required>
            </label>
            <label for="q5-B">B.  The field of view is the angle of the virtual environment that the user can see, and it is essential for creating a sense of immersion.
                <input type="radio" id="q5-B" name="question5" value="B">
            </label>
            <label for="q5-C">C. The field of view is the amount of time that the user spends in the virtual environment, and it is essential to ensure that the user does not become disoriented. 
                <input type="radio" id="q5-C" name="question5" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">6. How is locomotion (movement) handled in virtual reality, and what are some common techniques used to minimize motion sickness?</p>
            <label for="q6-A">A.  Locomotion is handled through physical movement, and motion sickness is minimized through the use of medication.
                <input type="radio" id="q6-A" name="question6" value="A" required>
            </label>
            <label for="q6-B">B. Locomotion is handled through the use of teleportation or point-and-click movement, and motion sickness is minimized through the use of a static reference point.
                <input type="radio" id="q6-B" name="question6" value="B">
            </label>
            <label for="q6-C">C.Locomotion is handled through the use of a joystick or gamepad, and motion sickness is minimized through the use of a smooth camera movement. 
                <input type="radio" id="q6-C" name="question6" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">7. What is the importance of frame rate and latency in virtual reality, and what are some common techniques used to reduce latency?</p>
            <label for="q7-A">A.  Frame rate and latency affect the smoothness and responsiveness of the virtual environment, and common techniques to reduce latency include prediction algorithms and caching
                <input type="radio" id="q7-A" name="question7" value="A" required>
            </label>
            <label for="q7-B">B. Frame rate and latency affect the color and contrast of the virtual environment, and common techniques to reduce latency include texture compression and image resizing.
                <input type="radio" id="q7-B" name="question7" value="B">
            </label>
            <label for="q7-C">C.  Frame rate and latency affect the sound quality of the virtual environment, and common techniques to reduce latency include audio compression and noise filtering. 
                <input type="radio" id="q7-C" name="question7" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">8. What are some of the potential applications of virtual reality beyond gaming and entertainment, and how might they benefit society?</p>
            <label for="q8-A">A. Potential applications of virtual reality beyond gaming and entertainment include education and training, healthcare and therapy, and architecture and design. They might benefit society by providing new, immersive and interactive ways to learn, heal and create.
                <input type="radio" id="q8-A" name="question8" value="A" required>
            </label>
            <label for="q8-B">B. Potential applications of virtual reality beyond gaming and entertainment include cooking and nutrition, fashion and beauty, and personal finance and banking. They might benefit society by providing new, convenient and engaging ways to improve people's everyday lives.
                <input type="radio" id="q8-B" name="question8" value="B">
            </label>
            <label for="q8-C">C. Potential applications of virtual reality beyond gaming and entertainment include sports and fitness, travel and tourism, and social networking and communication. They might benefit society by providing new, exciting and accessible ways to connect with others and explore the world.
                <input type="radio" id="q8-C" name="question8" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">9. What are some ethical considerations to keep in mind when developing virtual reality applications?
            <label for="q8-A">A. Ethical considerations when developing virtual reality applications include privacy and security, inclusivity and accessibility, and content and representation. They might relate to issues such as data protection, social justice and cultural sensitivity.    
                <input type="radio" id="q9-A" name="question9" value="A" required>
            </label>
            <label for="q9-B">B. Ethical considerations when developing virtual reality applications include performance and reliability, scalability and interoperability, and standards and regulations. They might relate to issues such as efficiency, compatibility and compliance.
                <input type="radio" id="q9-B" name="question9" value="B">
            </label>
            <label for="q9-C">C. Ethical considerations when developing virtual reality applications include marketing and promotion, sales and distribution, and support and maintenance. They might relate to issues such as transparency, honesty and customer satisfaction 
                <input type="radio" id="q9-C" name="question9" value="C">
            </label>
          </div>
          <br>
          <div>
            <p class="question">10. What are some of the most promising emerging technologies that could enhance virtual reality experiences in the future?</p>
            <label for="q10-A">A. Promising emerging technologies that could enhance virtual reality experiences in the future include 5G networks, edge computing and cloud gaming, and blockchain and decentralized systems. They might enable new levels of speed, performance and security.
                <input type="radio" id="q10-A" name="question10" value="A" required>
            </label>
            <label for="q10-B">B.  Promising emerging technologies that could enhance virtual reality experiences in the future include haptic feedback and sensory stimulation, eye-tracking and facial recognition, and brain-computer interfaces. They might enable new levels of immersion, interactivity and personalization.
                <input type="radio" id="q10-B" name="question10" value="B">
            </label>
            <label for="q10-C">C.Promising emerging technologies that could enhance virtual reality experiences in the future include autonomous vehicles and drones, robotics and AI, and augmented and mixed reality. They might enable new ways of exploring and interacting with the physical and digital worlds.
                <input type="radio" id="q10-C" name="question10" value="C">
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

    <a href="webXR-game/webXR.html">WebXR Application</a>
    </div>
    
    <script type="text/javascript" src="javascript/VRquiz.js"></script>

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
