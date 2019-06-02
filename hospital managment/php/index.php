<html>

<head>
  <title>
    dasbord
  </title>
</head>

<body>
  <?php
  include 'cannection.php';
  include 'link.php';
  include 'nav.php';
  session_start();
  error_reporting(0);
  ?>


  <div class="container  "><br>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
        <img src="../image/1.jpg" class="img-respnsive">
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="row">
          <div class="col-12 border">
            <div class="">
              <h2 class="text-center">Patient Registration </h2>
              A patient is any recipient of health care services. The patient is most often
              ..<br>
              <a href="<?php $_SERVER['PHP SELF'] ?>?check"><button class="btn btn-outline-info"> Patient Registration</button></a>
              <?php
              if ((isset($_GET["check"]))) {
                if ($_SESSION["email"]) {
                  header("location:patienthome.php");
                } else {
                  header("location:patient.php");
                }
              } else {
                echo "nop";
              }


              ?>

            </div>
          </div>
          <div class="col-12 border">
            <div class="">
              <h2 class="text-center">Doctor </h2>
              A patient is any recipient of health care services. The patient is most often
              ..<br>
              <a href="doctorlogin.php"><button class="btn btn-outline-info"> Doctor</button></a>
            </div>

          </div>
          <div class="col-12 border">
            <div class="">
              <h2 class="text-center">admin </h2>
              A patient is any recipient of health care services. The patient is most often
              ..<br>
              <a href="admin.php"><button class="btn btn-outline-info"> Admin</button></a>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>





</body>

</html>