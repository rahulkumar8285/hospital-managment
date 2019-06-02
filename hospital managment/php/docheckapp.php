<html>

<head>

</head>
<?php
include 'cannection.php';
include 'link.php';
include 'nav.php';
session_start();
$docemail = $_SESSION["docteremail"];
?>

<body>
    <div class="container">
        <div class=""><br>
            <h1 class="text-center">Handel Appointment</h1><br>
            <table class="table">
                <thead>
                    <th>S.no</th>
                    <th>Patient name</th>
                    <th>Patient mobile</th>
                    <th>appointment date</th>
                    <th>massage</th>
                    <th>view</th>
                </thead>
                <tbody>
                    <?php
                    $doquery = "SELECT * FROM `doctoruserap` WHERE demail = '$docemail' ";
                    $dofire = mysqli_query($cannection, $doquery);
                    echo  $doctotal = mysqli_num_rows($dofire);

                    for ($i = 0; $i < $doctotal; $i++) {
                        $doresult = mysqli_fetch_assoc($dofire); ?>
                        <td><?php echo $i ?></td>
                        <td> <?php echo $doresult["name"]; ?></td>
                        <td> <?php echo $doresult["phone"]; ?></td>
                        <td> <?php echo $doresult["data"]; ?></td>
                        <td> <?php echo $doresult["msg"]; ?></td>
                        <td><a href="doapocheck.php?pname=<?php echo $doresult["name"]; ?>&pphone=<?php echo $doresult["phone"]; ?>&pdate=<?php echo $doresult["data"]; ?> ">
                                <button class="btn btn-outline-info">accsept </button></a>

                            </tr>
                        <?php }



                    ?>
                </tbody>
            </table>


        </div>
    </div>


</body>

</html>