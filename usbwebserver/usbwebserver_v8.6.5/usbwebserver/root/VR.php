<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Interactive Game</title>
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
  </head>
  <body>
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

Overall, virtual reality has the potential to revolutionize the way we interact with digital environments and has numerous potential applications across a range of industries.</p>
    <a-scene>
      <!-- Camera Component -->
      <a-entity camera></a-entity>

      <!-- Box Component -->
      <a-box position="-1 0.5 -3" rotation="0 45 0" color="#4CC3D9"
        id="box"
        event-set__1="_event: mouseenter; scale: 1.5 1.5 1.5"
        event-set__2="_event: mouseleave; scale: 1 1 1">
      </a-box>

      <!-- Sphere Component -->
      <a-sphere position="0 1.25 -5" radius="1.25" color="#EF2D5E"
        id="sphere"
        event-set__3="_event: click; material.color: yellow">
      </a-sphere>

      <!-- Plane Component -->
      <a-plane position="0 0 -4" rotation="-90 0 0" width="1" height="1"
        color="#7BC8A4"
        id="plane">
      </a-plane>

      <!-- Sky Component -->
      <a-sky color="#ECECEC"></a-sky>
    </a-scene>

    <!-- CSS code-->

    <script>
      

    </script>


    <!-- JavaScript code -->
    <script>
      // Get the sphere component
      var sphere = document.querySelector("#sphere");

      // Listen for the click event on the sphere
      sphere.addEventListener("click", function () {
        // Get the position of the sphere
        var spherePosition = sphere.getAttribute("position");

        // Increase the position of the sphere along the x-axis
        spherePosition.x += 1;

        // Update the position of the sphere
        sphere.setAttribute("position", spherePosition);
      });
    </script>
  </body>
</html>
