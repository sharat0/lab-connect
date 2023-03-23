<?php
echo '<nav>
 <div id="logo"><img src="/lab/img/flag.webp" alt="Kristu Jayanti College"></div>
 <div class="container" onclick="myFunction(this)">
     <div class="bar1"></div>
     <div class="bar2"></div>
     <div class="bar3"></div>
 </div>
</nav>
<div id="nav-menu">
 <ul>
     <li><a href="/learnersbooth/dashboard">Dashboard</a></li>
     <li><a href="../">Home</a></li>
     <li><a href="../syllabus">Syllabus</a></li>
     <li><a href="../category">Categories</a></li>
     <li><a href="../labs">Labs</a></li>
     <li><a href="../slots">Slots</a></li>
     <li><a href="/learnersbooth/logout.php">Logout</a></li>
 </ul>
</div>

 <script>
     function myFunction(x) {
         x.classList.toggle("change");
         var nav= document.getElementById("nav-menu");
         if (x.classList.contains("change")) {
             nav.style.display="block";
         }
         else{
             nav.style.display="none";
         }
     }
 </script>';
?>