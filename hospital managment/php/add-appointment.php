<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';
error_reporting(0);
session_start();
$email = $_SESSION["email"];
$password = $_SESSION["password"];

$query = "SELECT * FROM `patient` WHERE  email='$email' AND password='$password' ";
$data = mysqli_query($cannection, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

if ((isset($_POST["submit"]))) {
    $name = mysqli_real_escape_string($cannection, trim($_POST["name"]));
    $mobile = mysqli_real_escape_string($cannection, trim($_POST["mobile"]));
    $doctor = mysqli_real_escape_string($cannection, trim($_POST["dname"]));
    $date = mysqli_real_escape_string($cannection, trim($_POST["date"]));
    $msg = mysqli_real_escape_string($cannection, trim($_POST["msg"]));
    // check candistion.//
    $name_vald = false;
    $mobile_vald = false;
    $do_vald = false;
    $date_vald = false;
    $msg_vald = false;
    // false varibles//
    if (!empty($name)) {
        $name_vald = true;
    } else {
        echo "name is also requide";
    }
    //mobile check
    if (!empty($mobile)) {
        $mobile_vald = true;
    } else {
        echo "mobile number is also requide";
    }
    //doctor check //
    if (!empty($doctor)) {
        $do_vald = true;
    } else {
        echo "name is also requide";
    }
    //date check//
    if (!empty($date)) {
        $date_vald = true;
    } else {
        echo "name is also requide";
    }
    //msg check//
    if (!empty($msg)) {
        $msg_vald = true;
    } else {
        echo "name is also requide";
    }
} else {
    echo "plz enter ant filed any filed is importane";
}

if ($name_vald && $mobile_vald && $do_vald && $date_vald && $msg_vald) {

    $docquery = "SELECT * FROM `doctor` WHERE dname='$doctor' ";
    $docfire = mysqli_query($cannection, $docquery);
    $doctotal = mysqli_num_rows($docfire);
    if ($doctotal == 1) {
        $docresult = mysqli_fetch_assoc($docfire);
        $docemail = $docresult["demail"];
    } else { }

    $sequery = "INSERT INTO `doctoruserap`( `name`, `phone`, `email`, `demail`, `doctorname`, `data`, `msg`) 
                VALUES ('$name','$mobile','$email','$docemail','$doctor','$date','$msg')";
    $sefire = mysqli_query($cannection, $sequery);

    $fire = "INSERT INTO `appointme`( `name`, `phone`, `email`, `doctorname`, `doctoremail`, `date`, `msg`) 
    VALUES ('$name','$mobile','$email','$doctor','$docemail','$date','$msg')";

    $run = mysqli_query($cannection, $fire);
    if ($run) {

        $_SESSION["appimentname"] = $name;
        $_SESSION["appimentmobile"] = $mobile;
        header('location:appointmentcheck.php');
    } else {
        echo "data is not send to data base ";
    }
} else {
    echo "plz full filed all input  ";
}

?>

<body>
    <div class=" container">
        <br>

        <form action="" method="post">
            <div class="form-group">
                <label for="name">name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $result["name"]; ?> ">
            </div>

            <div class="form-group">
                <label for="mobile">mobile:</label>
                <input type="text" class="form-control" id="name" name="mobile" value="<?php echo $result["mobile"]; ?> ">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="name" name="email" value="<?php echo $email; ?> ">
            </div>


            <div class="form-group">
                <label for="sel1"> Doctor name:</label>
                <select class="form-control" id="sel1" name="dname">
                    <?php
                    $docdis = "SELECT * FROM `doctor` ";
                    $disrun = mysqli_query($cannection, $docdis);
                    $disrow = mysqli_num_rows($disrun);
                    if ($disrow != 0) {
                        while ($disres = mysqli_fetch_assoc($disrun)) {
                            ?>
                            <option><?php echo $disres["dname"] ?></option>
                        <?php    }
                }
                ?>

                </select>
            </div>

            <div class="form-group">
                <label for="name">date:</label>
                <input type="date" class="form-control" id="name" name="date">
            </div>

            <div class="form-group">
                <label for="name">msg:</label>
                <input type="text" class="form-control" id="name" name="msg">
            </div>

            <button type="submit" class="btn btn-info" name="submit"> Submit</button>
        </form>

    </div>
    </div>
</body>