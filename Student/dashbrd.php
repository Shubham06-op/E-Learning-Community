<?php session_start();
$name=$_SESSION['name'];
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Student DashBoard</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
  <body>
    <div class="container">
    <nav>
    <ul>
        <li><a href="#" class="logo">
        <img src="/Ty-Project/Student/icon.jpg">
        <span class="nav-item">DashBoard</span>
        </a></li>

     <li><a href="#">
     <i class="fas fa-home"></i>
     <span class="nav-item">Home</span>
     </a></li>

  <li><a href="#">
  <i class="fas fa-users"></i>
  <span class="nav-item">Profile</span>
  </a></li>

  <li><a href="/Chat feature/ChatDashbd/Chatroom.html">
  <i class="fas fa-comment"></i>
  <span class="nav-item">Messages</span>
  </a></li>

  <li><a href="/Ty-Project/Notice/notice.html">
  <i class="fas fa-bell"></i>
  <span class="nav-item">Notice</span>
  </a></li>

  <li><a href="#">
  <i class="fas fa-tasks"></i>
  <span class="nav-item">Tasks</span>
  </a></li>

  <li><a href="/Ty-Project/Resource/download.php">
  <i class="fas fa-rocket"></i>
  <span class="nav-item">Resources</span>
  </a></li>

  <li><a href="/Ty-Project/QA/index.php">
  <i class="fas fa-comments"></i>
  <span class="nav-item">Q/A</span>
  </a></li>

  <li><a href="#">
  <i class="fas fa-question-circle"></i>
  <span class="nav-item">Help</span>
  </a></li>

  <li><a href="/Ty-Project/Home/logout.php">
  <i class="fas fa-sign-out-alt"></i>
  <span class="nav-item">Logout</span>
  </a></li>

  </ul>
  </nav>

  <section class="main">
  <div class="main-top">
  <h1>Skills</h1>
  <i class="fas fa-users-cog">&nbsp<?php echo $_SESSION['temail']; ?></i>
  </div>

  <div class="main-skills">

    <div class="card">
    <i class="fas fa-laptop-code"></i>
  <h3>Web Development</h3>
  <p>Join over 1 million students.</p>
   <button>Get Started</button>
  </div>

    <div class="card">
    <i class="fab fa-wordpress"></i>
  <h3>WordPress</h3>
  <p>Join over 5 lakh students.</p>
   <button>Get Started</button>
  </div>

    <div class="card">
    <i class="fas fa-palette"></i>
  <h3>Graphic Design</h3>
  <p>Join over 8 lakh students.</p>
   <button>Get Started</button>
  </div>

    <div class="card">
    <i class="fab fa-app-store-ios"></i>
  <h3>IOS Development</h3>
  <p>Join over 4 lakh students.</p>
   <button>Get Started</button>
  </div>
   </div>

  <section class="main-course">
    <h1>My Courses</h1>
  <div class="course-box">
    <ul>
      <li>In Progress</li>
      <li>Explore</li>
      <li>Incoming</li>
      <li>Finished</li>
    </ul>


    <div class="course">

    <div class="box">
      <h3>HTML</h3>
      <p>60% -progress</p>
      <button>Continue<button>
        <i class="fab fa-html5 html"></i>
      </div>

     <div class="box">
      <h3>CSS</h3>
      <p>80% -progress</p>
      <button>Continue<button>
        <i class="fab fa-css3-alt css"></i>
      </div>

      <div class="box">
      <h3>JavaScript</h3>
      <p>40% -progress</p>
      <button>Continue<button>
        <i class="fab fa-js-square js"></i>
        </div>

      </div>
      </div>

  </section>
  </section>

  </div>
  </body>
  </html>
