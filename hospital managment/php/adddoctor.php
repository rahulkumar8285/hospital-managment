<?php

include 'link.php';
include 'nav.php';
include 'cannection.php';
error_reporting(0);

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($cannection, trim($_POST["name"]));
    $number = mysqli_real_escape_string($cannection, trim($_POST["number"]));
    $email = mysqli_real_escape_string($cannection, trim($_POST["email"]));
    $password = mysqli_real_escape_string($cannection, trim($_POST["password"]));
    $address  = mysqli_real_escape_string($cannection, trim($_POST["address"]));
    $city = mysqli_real_escape_string($cannection, trim($_POST["city"]));

    $name_vald = false;
    $number_vald = false;
    $email_vald = false;
    $password_vald = false;
    $address_vald = false;
    $city_vald = false;

    if (!empty($name)) {
        $name_vald = true;
    } else {
        echo "name is requride";
    }

    if (!empty($number)) {
        $number_vald = true;
    } else {
        echo "number is requride";
    }

    if (!empty($email)) {
        $email_vald = true;
    } else {
        echo "email is requride";
    }

    if (!empty($password)) {
        $password_vald = true;
    } else {
        echo "password is requride";
    }

    if (!empty($address)) {
        $address_vald = true;
    } else {
        echo "password is requride";
    }

    if (!empty($city)) {
        $city_vald = true;
    } else {
        echo "password is requride";
    }
} else {
    echo "plz submit all fileds and click ";
}

if ($name_vald && $number_vald && $email_vald && $password_vald && $address_vald && $city_vald) {
    $query = "INSERT INTO `doctor`( `dname`, `dmobile`, `demail`, `dpassword`, `daddress`, `dcity`)
              VALUES ('$name','$number','$email','$password','$address','$city')";
    $fire = mysqli_query($cannection, $query);
    if ($fire) {
        echo "data sucssfull send data to db";
        header("location:doctorlist.php");
    } else {
        echo "data not send";
    }
} else {
    echo "data base not send ";
}

?>

<body>
    <div class="container">
        <h1 class="text-center">ADD A NEW ADMIN </h1>
        <div class="">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" id="name" name="name" require>
                </div>

                <div class="form-group">
                    <label for="number">mobile number:</label>
                    <input type="text" class="form-control" id="number" name="number" require>
                </div>

                <div class="form-group">
                    <label for="eamil">email:</label>
                    <input type="email" class="form-control" id="email" name="email" require>
                </div>

                <div class="form-group">
                    <label for="password">password:</label>
                    <input type="text" class="form-control" id="password" name="password" require>
                </div>

                <div class="form-group">
                    <label for="address">address:</label>
                    <input type="text" class="form-control" id="password" name="address" require>
                </div>

                <div class="form-group">
                    <label for="password">city:</label>
                    <input type="text" class="form-control" id="password" name="city" require>
                </div>


                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-info" name="submit"> Submit</button>
            </form>



        </div>

    </div>

</body>