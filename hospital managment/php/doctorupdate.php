<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';
session_start();
if (isset($_GET["docemail"])) {
    $docemail = $_GET["docemail"];
    $query = "SELECT * FROM `doctor` WHERE demail='$docemail' ";
    $fire = mysqli_query($cannection, $query);
    $total = mysqli_num_rows($fire);
    $result = mysqli_fetch_assoc($fire);
} else {
    echo "data is not ";
}
?>

<body>
    <div class="container">
        <br>
        <h3 class="text-center">All data </h3><br>
        <div class="border">
            <div class="text-center ">
                <img src="https://img.icons8.com/clouds/100/000000/user.png">
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <br>
                    <div class="col-lg-6 col-xl-6 ">
                        <h2 class="text-center">Doctor ditails </h2><br>
                        <div class="border">
                            <h4> Name :<?php echo $dname = $result["dname"] ?></h4>
                            <h4> Mobile :<?php echo $result["dmobile"] ?></h4>
                            <h4> Email :<?php echo $demail = $result["demail"] ?></h4>
                            <h4> Password :<?php echo $result["dpassword"] ?></h4>
                            <h4> Address :<?php echo $result["daddress"] ?></h4>
                            <h4> City :<?php echo $result["dcity"] ?></h4>
                            <h4></h4>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <h2 class="text-center">Salery details</h2>


                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <br>
            <h1 class="text-center">Appointment History </h1><br>
            <div class="over-set">
                <table class="table">
                    <thead>
                        <th>Patient Name</th>
                        <th>Patient phone </th>
                        <th>appointment date</th>
                        <th>rating</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        <?php
                        $docquer = "SELECT * FROM `doctoruserap` WHERE doctorname='$dname' AND demail='$demail'";
                        $dofire = mysqli_query($cannection, $docquer);
                        $docto = mysqli_num_rows($dofire);

                        for ($i = 0; $i < $docto; $i++) {
                            $dores = mysqli_fetch_assoc($dofire);
                            ?>
                            <tr>
                                <td><?php echo $dores["name"]; ?></td>
                                <td><?php echo $dores["phone"]; ?></td>
                                <td><?php echo $dores["data"]; ?></td>
                                <td>4</td>
                                <td>
                                    <a href="detailsappmin.php?docemail=<?php echo $result["demail"]; ?>&docname=<?php echo $result["dname"]; ?>&pname=<?php echo $dores["name"]; ?>&pdate=<?php echo $dores["data"]; ?>">
                                        <button class=" btn btn-outline-info">
                                            View
                                        </button>
                                    </a>
                                </td>
                            </tr>


                        <?php

                    }






                    ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    </div>
</body>