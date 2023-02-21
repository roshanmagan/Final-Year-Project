import * as THREE from 'three';
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

         function animate() {
          requestAnimationFrame(animate);
          cube.position.x = pos_x;
          cube.position.y = pos_y;
          cube.position.z = pos_z;
          cube.rotation.x += rot_x;
          cube.rotation.y += rot_y;
          cube.rotation.z += rot_z;
          renderer.render(scene, camera);
        }
        animate();