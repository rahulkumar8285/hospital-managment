<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';
session_start();
$docemail = $_SESSION["docteremail"];
echo $doname = $_SESSION["doctername"];
if (isset($_GET["pname"])) {
    $pname = $_GET["pname"];
    $pphone = $_GET["pphone"];
    $pdate = $_GET["pdate"];

    $doquery = "SELECT * FROM `doctoruserap` WHERE name='$pname' AND data='$pdate'";
    $dorun = mysqli_query($cannection, $doquery);
    echo $dototal = mysqli_num_rows($dorun);
    $doresult = mysqli_fetch_assoc($dorun);
    echo $doresult["demail"];
    $pemail = $doresult["email"];
}
if ((isset($_REQUEST["submit"]))) {
    $status = "Done";
    $discrep = mysqli_real_escape_string($cannection, trim($_POST["discap"]));
    $repot1 = mysqli_real_escape_string($cannection, trim($_POST["report1"]));
    $repot2 = mysqli_real_escape_string($cannection, trim($_POST["report2"]));
    $repot3 = mysqli_real_escape_string($cannection, trim($_POST["report3"]));
    $repot4 = mysqli_real_escape_string($cannection, trim($_POST["report4"]));
    $repot5 = mysqli_real_escape_string($cannection, trim($_POST["report5"]));
    $medical1 = mysqli_real_escape_string($cannection, trim($_POST["medicine1"]));
    $medical2 = mysqli_real_escape_string($cannection, trim($_POST["medicine2"]));
    $medical3 = mysqli_real_escape_string($cannection, trim($_POST["medicine3"]));
    $medical4 = mysqli_real_escape_string($cannection, trim($_POST["medicine4"]));
    $medical5 = mysqli_real_escape_string($cannection, trim($_POST["medicine5"]));
    $discrep_valid = false;
    if (!empty($discrep)) {
        $discrep_valid = true;
    } else {
        echo "discrepial also ";
    }
}
if ($discrep_valid) {
    $upquery = "INSERT INTO `docresponce`( `name`, `pphone`, `pemail`, `doctorname`, `doctoremail`, `repor1`, `repor2`, `repor3`, `repor4`, `repor5`, `medical1`, `medical2`, `medical3`, `medical4`, `medical5`, `date`, `status`, `doctordiscap`) 
               VALUES ('$pname','$pphone','$pemail','$doname','$docemail','repot1','repot2','repot3','repot4','repot5','$medical1','$medical2','$medical3','$medical4','$medical5','$pdate',' $status','$discrep')";
    $uprfire = mysqli_query($cannection, $upquery);
    if ($uprfire) {
        header('location:doctorpanel.php');
        echo "data send okh";
    } else {
        echo "data not send";
    }
}


?>

<body>
    <div class="container">
        <h1 class="text-center">Help for: </h1>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="">
                    <h2 class="text-center">patient details</h2><br>
                    <ul class="list">
                        <li>Name: <?php echo $doresult["name"]; ?> </li>
                        <li>phone: <?php echo $pphone; ?></li>
                        <li>appointment date: <?php echo  $pdate; ?> </li>
                        <li>msg: <?php echo $doresult["msg"]; ?></li>
                        <li>Rating :<?php echo $doresult["rating"];     ?></li>
                    </ul>

                    <br>
                    <form action="" method="post">
                        <h3>Discretion </h3>
                        <div class="form-group">

                            <textarea class="form-control" rows="5" id="comment" name="discap"></textarea>
                        </div>
                </div>
                <button type="submit" class="btn btn-info" name="submit"> Submit</button>

            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="">
                    <h2 class="text-center"> Report</h2>
                    <p>This types check for you report and so fast for </p>

                    <div class="form-group">
                        <label for="report-1">report 1:</label>
                        <input type="text" class="form-control" name="report1">
                    </div>

                    <div class="form-group">
                        <label for="report-1">report 2:</label>
                        <input type="text" class="form-control" name="report2">
                    </div>

                    <div class="form-group">
                        <label for="report-1">report 3:</label>
                        <input type="text" class="form-control" name="report3">
                    </div>

                    <div class="form-group">
                        <label for="report-1">report 4:</label>
                        <input type="text" class="form-control" name="report4">
                    </div>

                    <div class="form-group">
                        <label for="report-1">report 5 :</label>
                        <input type="text" class="form-control" name="report5">
                    </div>


                </div>



            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="">
                    <h1 class="text-center">medicine</h1>
                    <p>this all madistion to use every day two times</p>

                    <div class="form-group">
                        <label for="report-1">medicine 1:</label>
                        <input type="text" class="form-control" name="medicine1">
                    </div>

                    <div class="form-group">
                        <label for="report-1">medicine 2:</label>
                        <input type="text" class="form-control" name="medicine2">
                    </div>

                    <div class="form-group">
                        <label for="report-1">medicine 3:</label>
                        <input type="text" class="form-control" name="medicine3">
                    </div>

                    <div class="form-group">
                        <label for="report-1">medicine 4:</label>
                        <input type="text" class="form-control" name="medicine4">
                    </div>

                    <div class="form-group">
                        <label for="report-1">medicine 5 :</label>
                        <input type="text" class="form-control" name="medicine5">
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


</body>