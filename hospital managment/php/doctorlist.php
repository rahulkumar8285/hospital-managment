<?php

include 'link.php';
include 'cannection.php';
include 'nav.php';
session_start();
error_reporting(0);
$listquery = "SELECT * FROM doctor ";
$fire = mysqli_query($cannection, $listquery);
$total = mysqli_num_rows($fire);

//delted ///
if ((isset($_GET["delemail"]))) {
  $delid = $_GET["delemail"];
  $delquery = "DELETE FROM `doctor` WHERE  demail = '$delid' ";
  $delfire = mysqli_query($cannection, $delquery);
  if ($delfire) {
    header("location:doctorlist.php");
  } else {
    echo "dta is not deleted";
  }
} else {
  echo "not check";
}

?>

<body>
  <div class="container">
    <br>
    <?php
    if ($_SESSION["adminemail"]) { ?>
      <h3 class="text-center  ">Add a new Doctor to <a href="adddoctor.php">click here.. </a></h3>
    <?php  } else { }
  ?>
    <br>
    <h1 class="text-center">Doctor List <b class="text-info"> <?php echo $_SESSION["appimentname"]; ?> </b> </h1>
    <div class="row">
      <div class="col-lg-12 col-xl-12">
        <br>
        <table class="table ">
          <thead>
            <tr>
              <th>S.no</th>
              <th>Docto name</th>
              <th>Mobile</th>
              <th>Email</th>
              <?php
              if ($_SESSION["adminemail"]) {
                ?><th>view</th>
                <th>deleted</th>
              <?php
            } ?>
            </tr>
          </thead>
          <?php
          if ($total != 0) {
            while ($result = mysqli_fetch_assoc($fire)) {
              ?>
              <tbody>
                <tr>
                  <th><?php echo $result["s.no"];  ?> </th>
                  <th><?php echo $result["dname"];  ?> </th>
                  <th><?php echo $result["dmobile"];  ?> </th>
                  <th><?php echo $result["demail"];  ?> </th>
                  <th>
                    <?php
                    if ($_SESSION["adminemail"]) {
                      ?>
                      <a href="doctorupdate.php?docemail=<?php echo $result["demail"]; ?>">
                        <button class="btn btn-outline-info"><i class="fas fa-eye"></i> view</button></a>
                    <?php
                  }
                  ?>

                  </th>

                  <th>
                    <?php
                    if ($_SESSION["adminemail"]) {

                      ?>
                      <a href="<?php $_SERVER['PHP SELF'] ?>?delemail=<?php echo $result["demail"]; ?>">
                        <button class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> deleted </button></a>
                    <?php } else { ?>
                      <button class="btn btn-outline-info"><i class="far fa-comments"></i> Cammuncation</button>
                    <?php
                  }
                  ?>
                  </th>






                </tr>

              </tbody>
            <?php
          }
        }

        ?>
        </table>


      </div>


    </div>



  </div>


</body>