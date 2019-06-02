<?php
include 'cannection.php';
include 'link.php';
include 'nav.php';
if (isset($_GET["pname"])) {
    $pname = $_GET["pname"];
    $pphone = $_GET["pphone"];
    $pdate = $_GET["pdate"];
    $query = "SELECT * FROM `docresponce` WHERE name='$pname' AND date='$pdate'";
    $run = mysqli_query($cannection, $query);
    echo $total = mysqli_num_rows($run);
    $result = mysqli_fetch_assoc($run);
}
?>

<body>
    <div class="container">
        <br>
        <h3>Appointment respoanse</h3>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <h5>you details:</h5>
                <ul class="list">
                    <li>name:<?php echo $pname; ?></li>
                    <li>mobile:<?php echo $pphone; ?></li>
                    <li>Doctor name:<?php echo $result["doctorname"]; ?></li>
                    <li>Doctor Email:<?php echo $result["doctoremail"]; ?></li>
                    <li>Appointment date:<?php echo $result["date"]; ?></li>
                </ul>
                <br>
                <h3>Doctor respoanse</h3>
                <hr>
                <p>
                    <?php echo $result["doctordiscap"]; ?>
                </p>
            </div>
            <div class="col-lg-4 col-xl-4"></div>
            <div class="col-lg-4 col-xl-4"></div>
        </div>
    </div>
</body>