<!DOCTYPE html>
<html lang="en">
<head>

<?php
  session_start();
  if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'])!= true) {
    header('location: index.php');
    exit;
}
?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>Labs</title>
</head>
<body>
<nav>
        <div id="logo"><img src="../img/flag.webp" alt="Kristu Jayanti College"></div>
        <div id="nav-item">
            <span class="nav-items"><a href="../">Home</a></span>
            <span class="nav-items"><a href="../logout.php">Logout</a></span>
        </div>
    </nav>
  <div class="video" onclick="pause()">
    <video autoplay muted loop id="myVideo">
      <source src="../img/KJC.mp4" type="video/mp4" />
    </video>
  </div>
  <div id="main">
    <div class="flex">
      <div class="left" data-aos="fade-up">
        <a href="book?id=1"><img src="../img/labs/life_science.jpg" alt=""></a>
        <div class="desc">Life Science Lab</div>
      </div>
      <div class="right" data-aos="fade-up">
        <a href="book?id=2"><img src="../img/labs/cs.jpg" alt=""></a>
        <div class="desc">Computer Science Lab</div>
      </div>
    </div>
    <div class="flex">
      <div class="left" data-aos="fade-up">
        <a href="book?id=3"><img src="../img/labs/ele.jpg" alt=""></a>
        <div class="desc">Electronics Lab</div>
      </div>
      <div class="right" data-aos="fade-up">
        <a href="book?id=4"><img src="../img/labs/physics.jpg" alt=""></a>
        <div class="desc">Physics Lab</div>
      </div>
    </div>
    <div class="flex">
      <div class="left" data-aos="fade-up">
        <a href="book?id=5"><img src="../img/labs/business.jpg" alt=""></a>
        <div class="desc">Business Lab</div>
      </div>
      <div class="right" data-aos="fade-up">
        <a href="book?id=6"><img src="../img/labs/media.png" alt=""></a>
        <div class="desc">Media Lab</div>
      </div>
    </div>
    <div class="flex">
      <div class="left" data-aos="fade-up">
        <a href="book?id=7"><img src="../img/labs/psychology.png" alt=""></a>
        <div class="desc">Psychology Lab</div>
      </div>
      <div class="right" data-aos="fade-up">
        <a href="book?id=8"><img src="../img/labs/cs.jpg" alt=""></a>
        <div class="desc">Language Lab</div>
      </div>
    </div>
  </div><script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();

// You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 100, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 800, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
  </script>
</body>

</html>