<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';

session_start();
error_reporting(0);
echo $apname = $_SESSION["appimentname"];
echo $apmobile =  $_SESSION["appimentmobile"];

$query = "SELECT * FROM `appointme` WHERE name='$apname' AND phone='$apmobile' ";
$data = mysqli_query($cannection, $query);
$total = mysqli_num_rows($data);

//deleted wark///
if ((isset($_GET["delna"]))) {
  echo "isset wark";

  $delname = $_GET["delna"];
  $deldoc = $_GET["deldo"];

  $delquery = "DELETE FROM `appointme` WHERE name='$delname' AND doctorname='$deldoc'";
  $delfir = mysqli_query($cannection, $delquery);
  if ($delfir) {
    header('location:appointmentcheck.php');
  }
} else {
  echo "data si snot ";
}




?>

<body>
  <div class="container">
    <br>
    <h5 class="text-center ">Create a new appointment to <a href="add-appointment.php">click hear..</a> </h5>
    <br>
    <h1 class="text-center">All appointment for you <b class="text-info"> <?php echo $apname; ?> </b> </h1><br>
    <div class="row">
      <div class="col-lg-12 col-xl-12">
        <div class="">

          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Doctor name</th>
                <th>Date</th>
                <th>view</th>
                <th>deleted </th>
              </tr>
            </thead>
            <?php
            while ($result = mysqli_fetch_assoc($data)) { ?>

              <tr>
                <td><?php echo $result["name"]; ?> </td>
                <td><?php echo $result["phone"]; ?> </td>
                <td><?php echo $result["doctorname"]; ?> </td>
                <td><?php echo $result["date"]; ?> </td>
                <td>
                  <button class="btn btn-outline-info"><i class="fas fa-eye"></i> update</button>
                </td>

                <td>
                  <a href="<?php $_SERVER['PHP SELF'] ?>?delna=<?php echo $result["name"]; ?>&deldo=<?php echo $result["doctorname"]; ?>" class=" btn btn-outline-danger"> deleted </a>






                </td>


              </tr>

            <?php
          }



          ?>


          </table>



        </div>
      </div>

    </div>

  </div>





  </div>




</body>