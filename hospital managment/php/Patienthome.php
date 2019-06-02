<html>

<head>
    <title>Home</title>
</head>

<body>
    <?php
    include 'cannection.php';
    include 'link.php';
    include 'nav.php';
    error_reporting(0);
    session_start();
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $query = "SELECT * FROM `patient` WHERE  email='$email' AND password='$password' ";
    $data = mysqli_query($cannection, $query);
    $total = mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);

    $_SESSION["appimentname"] = $result["name"];
    $_SESSION["appimentmobile"] = $result["mobile"];

    ?>
    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 ">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <br>
                        <div class="border">
                            <h1 class="text-center">Appointment</h1>
                            <ul>
                                <li>Add new appointment</li>
                                <li>Check all appointment</li><br>
                                <a href="appointmentcheck.php"><button class="btn btn-outline-warning">Check</button></a>
                                <a href="add-appointment.php"><button class="btn btn-outline-warning">ADD</button></a>
                            </ul>

                        </div>

                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <br>
                        <div class="border">
                            <h1 class="text-center">Doctor help</h1>
                            <ul>
                                <li>Communcation to doctor</li>
                                any time to help for to doctor !<br>
                                Check doctor list<br>
                                <a href="doctorlist.php"><button class="btn btn-outline-info">Doctor Cammuncation </button></a>
                            </ul>

                        </div>


                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <br>
                        <div class="border">
                            <h1 class="text-center">medical reports</h1>
                            <ul>
                                <li>Consultation (Consult)</li>
                                <li>Operative Report (OP)</li>
                                <li>Radiology Report</li><br>
                                <a href="user-medical.php"><button class="btn btn-outline-warning">Check</button></a>
                            </ul>

                        </div>


                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <br>
                        <div class="border">
                            <h1 class="text-center">Payment </h1>
                            <ul>
                                <li>due payment</li>
                                <li>health care charges</li>
                                <li>operation fees</li><br>
                                <a href="check-appointment"><button class="btn btn-outline-warning">Check</button></a>
                                <a href="add-appointment"><button class="btn btn-outline-warning">ADD</button></a>
                            </ul>

                        </div>



                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 border">
                <br>
                <div class="image text-center">
                    <h2 class="text-center">Profile</h2>
                    <img src="https://img.icons8.com/clouds/100/000000/user.png">
                    <h2><?php echo $result["name"]; ?></h2>
                    <h3><?php echo $result["mobile"];  ?></h3>
                    <h3><?php echo $result["email"]; ?></h3>
                    <h3><?php echo $result["password "]; ?></h3>
                    <h3><?php echo $result["address"] ?></h3>
                    <h3><?php echo $result["city"] ?></h3>
                    <h3><?php echo $result["gender"] ?></h3>
                    <a href="patientupdata.php"><button class="btn btn-outline-warning "> <i class="fas fa-user-cog"></i> Edit</button></a>
                    <a href="logout.php"> <button class="btn btn-outline-danger">Logout</button></a>
                </div>



            </div>
        </div>



</body>

</html>