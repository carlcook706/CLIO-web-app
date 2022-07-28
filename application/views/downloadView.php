<?php $this->load->view('includes/header');?>
<!DOCTYPE html>
<html>
<title>CLIO Mobile App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size: 16px;}
img {margin-bottom: -8px;}
.mySlides {display: none;}
</style>
<body class="w3-content w3-black" style="max-width:1500px;">

<!-- Header with Slideshow -->
<header class="w3-display-container w3-center">
  <button class="w3-button w3-block w3-green w3-hide-large w3-hide-medium" onclick="document.getElementById('download').style.display='block'">Download <i class="fa fa-android"></i></button>
  <div class="mySlides w3-animate-opacity">
    <img class="w3-image" src="http://clio-rms.com/CI-Login-master/images/1.jpg" alt="Image 1" style="min-width:500px" width="1500" height="1000">
    <div class="w3-display-left w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge">CLIO Mobile App</h1>
        <hr class="w3-opacity">
        <p>An OJT record management and monitoring mobile application</p>
        <p><button class="w3-button w3-block w3-green w3-round" onclick="document.getElementById('download').style.display='block'">Download <i class="fa fa-android"></i></button></p>
      </div>
    </div>
  </div>
  <div class="mySlides w3-animate-opacity">
    <img class="w3-image" src="http://clio-rms.com/CI-Login-master/images/2.jpg" alt="Image 2" style="min-width:500px" width="1500" height="1000">
    <div class="w3-display-left w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge">CLIO Mobile App</h1>
        <hr class="w3-opacity">
        <p>Customize your profile</p>
        <p><button class="w3-button w3-block w3-red w3-round" onclick="document.getElementById('download').style.display='block'">Download <i class="fa fa-android"></i></button></p>
      </div>
    </div>
  </div>
  <div class="mySlides w3-animate-opacity">
    <img class="w3-image" src="http://clio-rms.com/CI-Login-master/images/3.jpg" alt="Image 3" style="min-width:500px" width="1500" height="1000">
    <div class="w3-display-left w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge">CLIO Mobile App</h1>
        <hr class="w3-opacity">
        <p>Access the app wherever you are!</p>
        <p><button class="w3-button w3-block w3-indigo w3-round" onclick="document.getElementById('download').style.display='block'">Download <i class="fa fa-android"></i></button></p>
      </div>
    </div>
  </div>
  <a class="w3-button w3-black w3-display-right w3-margin-right w3-round w3-hide-small w3-hover-light-grey" onclick="plusDivs(1)">More <i class="fa fa-angle-right"></i></a>
  <a class="w3-button w3-block w3-black w3-hide-large w3-hide-medium" onclick="plusDivs(1)">More <i class="fa fa-angle-right"></i></a>
</header>

<!-- The App Section -->
<div class="w3-padding-64 w3-white">
  <div class="w3-row-padding">
    <div class="w3-col l8 m6">
      <h1 class="w3-jumbo"><b>CLIO Mobile App</b></h1>
      <h1 class="w3-xxxlarge w3-text-blue"><b>OJT Students and Supervisor Mobile App</b></h1>
      <p>Clio Mobile App is part of the Capstone Project titled, Development and Evaluation of CLIO: Cross-Platform OJT Record Management 
        and Monitoring Application for Pamantasan ng Lungsod ng 
        Valenzuela - Information Technology Department.
        <br>
        Students and OJT Supervisors are the end-users of this mobile app. Watch the video below to see the app's features!
      </p>
      <p>Available for <i class="fa fa-android w3-xlarge w3-text-green"></i> Android Smartphones only</p>
      <button class="w3-button w3-light-grey w3-padding-large w3-section w3-hide-small" onclick="document.getElementById('download').style.display='block'">
        <i class="fa fa-download"></i> Download Application
      </button>
      
    </div>
    <div class="w3-col l4 m6">
      <img src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t1.15752-9/259683435_675518306761249_2613649647734417022_n.png?_nc_cat=104&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeE-9fhaI-3OBCBi8vM9TnF34uP5nwdgh2Di4_mfB2CHYOTXt_WW5yMG9GIZrnmI33IJdbRWwSM3Ofr0yWiD7wvj&_nc_ohc=UY-348MYWUcAX8gU13D&_nc_ht=scontent.fmnl17-4.fna&oh=ef8c532cbe66ff879e7c1aba4251f5f5&oe=61C10903" class="w3-image w3-right w3-hide-small" width="335" height="471">
      <div class="w3-center w3-hide-large w3-hide-medium">
        <button class="w3-button w3-block w3-padding-large" onclick="document.getElementById('download').style.display='block'">
          <i class="fa fa-download"></i> Download Application
        </button>
        <img src="https://scontent.fmnl17-4.fna.fbcdn.net/v/t1.15752-9/259683435_675518306761249_2613649647734417022_n.png?_nc_cat=104&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeE-9fhaI-3OBCBi8vM9TnF34uP5nwdgh2Di4_mfB2CHYOTXt_WW5yMG9GIZrnmI33IJdbRWwSM3Ofr0yWiD7wvj&_nc_ohc=UY-348MYWUcAX8gU13D&_nc_ht=scontent.fmnl17-4.fna&oh=ef8c532cbe66ff879e7c1aba4251f5f5&oe=61C10903" class="w3-image w3-margin-top" width="335" height="471">
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="download" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content" style="padding:32px">
    <div class="w3-container w3-white">
      <i onclick="document.getElementById('download').style.display='none'" class="fa fa-remove w3-xlarge w3-button w3-transparent w3-right w3-xlarge"></i>
      <h2 class="w3-wide">DOWNLOAD</h2>
      <p><i class="fa fa-android w3-large"></i> Download the .apk file for Android and install</p>
      
      <br>
      <br>
    
      <a href="<?php echo site_url('Download/download');?>/<?php echo "clio-student.apk";?>" type="button" class="w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" onclick="document.getElementById('download').style.display='none'">Download the Student Mobile App .apk file</a>
     <a href="<?php echo site_url('Download/download');?>/<?php echo "clio-supervisor.apk";?>" type="button" class="w3-button w3-block w3-padding-large w3-light-blue w3-margin-bottom" onclick="document.getElementById('download').style.display='none'">Download the Supervisor Mobile App .apk file</a>
    </div>
  </div>
</div>
<!-- Video -->
<div class="w3-padding-64 w3-center w3-white">
  <iframe width="100%" height="480" src="https://www.youtube.com/embed/3gPa1HMvygM"></iframe>
</div>
<!-- Pricing Section -->
<div class="w3-padding-64 w3-center w3-white">
  <h1 class="w3-jumbo"><b></b></h1>
  <p class="w3-xxlarge">CLIO Mobile App Features</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-half w3-section">
      <ul class="w3-ul w3-card w3-hover-shadow">
        <li class="w3-blue w3-xlarge w3-padding-32">Student</li>
        <li class="w3-padding-16">Login Account and Customize Profile</li>
        <li class="w3-padding-16">Access Dashboard Rendered Hours</li>
        <li class="w3-padding-16">Submit Weekly Reports</li>
        <li class="w3-padding-16">Submit Concerns to Adviser and/or Admin</li>
        <li class="w3-padding-16">Access Forms and Reports Documents</li>
        <li class="w3-padding-16">View Grading System</li>
        <li class="w3-light-grey w3-padding-24">
          <a href="<?php echo site_url('Download/download');?>/<?php echo "clio-student.apk";?>" class="w3-button w3-black w3-padding-large" 2onclick="document.getElementById('download').style.display='block'"><i class="fa fa-download"></i> Download</a>
        </li>
      </ul>
    </div>
    <div class="w3-half w3-section">
      <ul class="w3-ul w3-card w3-hover-shadow">
        <li class="w3-light-blue w3-xlarge w3-padding-32">Supervisor</li>
        <li class="w3-padding-16">Login Account and Customize Profile</li>
        <li class="w3-padding-16">View Student's DTR and Total Rendered Hours</li>
        <li class="w3-padding-16">Submit Evaulation Form</li>
        <li class="w3-padding-16">Submit Concerns to Adviser and/or Admin</li>
        <li class="w3-light-grey w3-padding-24">
         <a href="<?php echo site_url('Download/download');?>/<?php echo "clio-supervisor.apk";?>" class="w3-button w3-black w3-padding-large" 2onclick="document.getElementById('download').style.display='block'"><i class="fa fa-download"></i> Download</a>
        </li>
      </ul>
    </div>
  </div>
  <br>
</div>



<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-light-grey w3-center w3-xlarge">
  <div class="w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p class="w3-medium">uwu </p>
</footer>

<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</body>
</html>
