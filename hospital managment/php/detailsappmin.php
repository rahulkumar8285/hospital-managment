<!DOCTYPE>
<html>

<head>

</head>
<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';

?>

<body>
    <div class="container">
        <?php
        if ((isset($_GET["docemail"]))) {
            $docemial = $_GET["docemail"];
            $docname = $_GET["docname"];
            $pname = $_GET["pname"];
            $pdate = $_GET["pdate"];
            $sequery = "SELECT * FROM `doctoruserap` WHERE doctorname='$docname'AND demail='$docemial'";
            $docrun = mysqli_query($cannection, $sequery);
            $dototal = mysqli_num_rows($docrun);
            echo $dototal;
            $du = "SELECT * FROM `doctoruserap` WHERE name='$pname' AND data='$pdate'";
            $durun = mysqli_query($cannection, $du);
            $dutotal = mysqli_num_rows($durun);
            $duresult = mysqli_fetch_assoc($durun);
        }
        ?><br>
        <h2 class=" text-center ">All Appointment <?php echo " Mr " . " " . $docname; ?> </h2>
        <hr>
        <div class="">
            <h3>Patient details: </h3><br>
            <ul class="list">
                <li>Name: <?php echo $pname; ?></li>
                <li>Mobile: <?php echo $duresult["phone"]; ?></li>
                <li>Appointment Date: <?php echo $pdate; ?></li>
                <li>Patient msg:
                    <?Php echo $duresult["msg"]; ?>
                </li>
                <li>Rating: </li>
                <li>Status:</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <br>
                <h3 class="text-center">Probliem</h3>
                <hr>
                <ul class="list">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>
            <div class="col-xl-6 col-lg-6">
                <br>
                <h3 class="text-center">Chekap repot</h3>
                <hr>
                <ul class="list">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>

            <div class="col-xl-6 col-lg-6">
                <br>
                <h3 class="text-center">mediastion</h3>
                <hr>
                <ul class="list">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>




        </div>
    </div>
</body>

</html>