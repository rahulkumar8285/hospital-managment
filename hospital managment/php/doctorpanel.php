<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';
$doemail = $_SESSION["docteremail"];
$doquery = "SELECT * FROM `doctor` WHERE demail='$doemail' ";
$dorun = mysqli_query($cannection, $doquery);
$doresult = mysqli_fetch_assoc($dorun);
$_SESSION["doctername"] = $doresult["dname"];
?>

<body>
    <div class="container">
        <br>
        <h1 class="text-center">Welcome to Dr. <?php echo " " .   $doresult["dname"]; ?></h1><br>
        <div class="row">
            <div class="col-4 col-lg-4 col-xl-4">
                <div class="border">
                    <h3 class="text-center"> Appointment</h3>
                    <hr>
                    <p>Handel for all appointment</p>
                    <a href="docheckapp.php"><button class="btn btn-outline-info">show</button></a>
                </div>

            </div>



        </div>


    </div>
    </div>

</body>