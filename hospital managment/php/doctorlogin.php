<?php
include 'link.php';
include 'cannection.php';
include 'nav.php';

if ((isset($_POST["login"]))) {
    $email = mysqli_real_escape_string($cannection, trim($_POST["email"]));
    $password = mysqli_real_escape_string($cannection, trim($_POST["password"]));
    $query = "SELECT * FROM `doctor` WHERE demail='$email' AND dpassword='$password'";
    $fire = mysqli_query($cannection, $query);
    $total = mysqli_num_rows($fire);

    if ($total == 1) {
        session_start();
        $_SESSION["docteremail"] = $email;
        header("location:doctorpanel.php");
    } else {
        echo "you email and password are not valide";
    }
} else {
    echo "nop";
}

?>

<body>
    <div class="container">
        <br>
        <h1 class="text-center">Doctor Login</h1><br>
        <div class="row">
            <div class="col-lg-4 col-xl-4"></div>
            <div class="col-lg-4 col-xl-4 border"><br>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>