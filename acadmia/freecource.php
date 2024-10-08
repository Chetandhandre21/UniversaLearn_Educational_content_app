<?php

include('connection.php');
//error_reporting(0);

if(isset($_POST["submit"])){
  $cname = $_POST["cname"];
  $descr = $_POST["descr"];
  $core = $_POST["core"];
  $vlink = $_POST["vlink"];
 

  //For uploads photos
  $upload_dir = "uploads/"; //this is where the uploaded photo stored
  $imag= $upload_dir.$_FILES["imag"]["name"];
  $upload_dir.$_FILES["imag"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imag"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imag"]["size"]; // to detect the size of the image
  $upload_ok = 0;

  if(file_exists($upload_file)){
      echo "<script>alert('The file already exist')</script>";
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
      if($check !== false){
        $upload_ok = 1;
        if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
            $upload_ok = 1;
        }else{
            echo '<script>alert("please change the image format")</script>';
        }
      }else{
          echo '<script>alert("The photo size is 0 please change the photo ")</script>';
          $upload_ok = 0;
      }
  }

  if($upload_ok == 0){
     echo '<script>alert("sorry your file is doesn\'t uploaded. Please try again")</script>';
  }else{
      if($cname != "" && $descr !=""){
          move_uploaded_file($_FILES["imag"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO cources(cname,descr,core,vlink,imag)
          VALUES('$cname','$descr','$core','$vlink','$imag')";

          if($conn->query($sql) === TRUE){
              echo "<script>alert('Cource uploaded successfully')</script>";
          }
      }
  }


  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UniversaLearn</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files 
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">-->

  <!-- Template Main CSS File -->
  <link href="css/styleup.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v4.11.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

    <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">UniversaLearn</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Uploads Academic Content</span>
     <!-- <p class="sign" align="center">LIST A VENUE </p>-->

   <!--<section id="upload_container">-->

        <form class="form1" action="freecource.php" method="POST" enctype="multipart/form-data" >
        <div class="field padding-bottom--24">
        <div  class="field padding-bottom--24">
                    <label for="">Name of Course</label>
                    <input type="text"id="cname" name="cname"> 
                  </div>
            
                <div  class="field padding-bottom--24">
                  <label for="">Description of course</label>
                  <input type="text" id="descr"name="descr"> 
                </div>
                  
                    <label for="">Core of Course</label>
                    <select class="" id="core"name="core">
                        <option>Choose Course</option>
                      <option>Programming</option>
                      <option>Technical</option>
                      <option>Mathematics</option>
                      <option>Social Studies</option>
                      <option>English</option>
                      <option>Other</option>
                    </select>
                   
                  </div>
                  <div  class="field padding-bottom--24">
                  <label for="">Link of course</label>
                  <input type="text" id="vlink"name="vlink"> 
                </div>
                  <div  class="field padding-bottom--24">
                  <label for="">Photo of course</label>
                  <input type="file" id="imag"name="imag"> 
                </div>
        
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Upload">
                </div>
                
            <main id="main">

<!-- ======= About Us Section ======= -->

</section><!-- End About Us Section -->
        </form>
    </section>

    <script>
        var cname = document.getElementById("cname");
        var descr = document.getElementById("descr");
        var core = document.getElementById("core");
        var vlink = document.getElementById("vlink");
        var imag = document.getElementById("imag");
      
   

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(cname.value == ""){
                cname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    
    </script>
     <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!--<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!--<script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  </div>
      </div>
    </div>

</body>
</html>



