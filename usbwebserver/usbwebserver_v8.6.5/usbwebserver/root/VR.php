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
              </div>
            </div> 
          <a href="loginsystem/logout.php">logout</a>
        </div>
  <div id="container">
  <h1>Virtuak Reality</h1>
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
  <script>
          // Initialize the Three.js library and create a 3D scene
      var scene = new THREE.Scene();
      var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
      var renderer = new THREE.WebGLRenderer({ antialias: true });
      renderer.setSize(800, 500);
      renderer.setClearColor(0x00f0f0, 1);
      renderer.xr.enabled = true;
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
      var light = new THREE.DirectionalLight(0x0000ff, 0.1);
      // Set the position of the light
      light.position.x = 2;
      light.position.y = 3;
      light.position.z = 4;
      // Add the light to the scene
      scene.add(light);

      renderer.setAnimationLoop( function () {

      renderer.render( scene, camera );
          cube.position.x = pos_x;
          cube.position.y = pos_y;
          cube.position.z = pos_z;
          cube.rotation.x += rot_x;
          cube.rotation.y += rot_y;
          cube.rotation.z += rot_z;

      } );

  </script>
    <button id="enter-ar-button">Enter AR</button>
    <div id="canvas-container"></div>
    <form action="">
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
        <button type="button" onclick = "updatePos()">submit</button>
        <button type="button" onclick = "reset()">Reset</button>
      </section>
    </form>
</body>
</html>
