<html>

<head>
  <title> </title>
</head>

<body>
  <?php
  include 'link.php';
  include 'nav.php';
  include 'cannection.php';
  error_reporting(0);

  if ((isset($_POST["login"]))) {
    $email = mysqli_real_escape_string($cannection, trim($_POST["email"]));
    $password = mysqli_real_escape_string($cannection, trim($_POST["password"]));

    //candistion are check//
    $email_vald = false;
    $password_vald = false;
    //email check//

    if (!empty($email)) {
      $email_vald = true;
    } else {
      echo "email data is not exites to data base";
    }
    //password check//

    if (!empty($password)) {
      $password_vald = true;
    } else {
      echo "password not to exites";
    }
  } else {
    echo "data not db";
  }

  if ($email_vald && $password_vald) {

    $query = "SELECT * FROM `patient` WHERE password='$password' AND  email = '$email' ";
    $data = mysqli_query($cannection, $query);

    $total = mysqli_num_rows($data);
    if ($total == 1) {
      session_start();
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      header("location:patienthome.php");
    } else {
      echo "admin is not a okh";
    }
  } else {
    echo "data are not exites to data base plz check you email and password";
  }














  ?>
  <div class="container">
    <br>
    <h1 class="text-center">Patient Panel </h1>
    <br>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 border">
        <h4 class="text-center">Singup</h4>
        <br>
        <form action="patientsformcheck.php" method="post">
          <div class="form-group">
            <label for="name">name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="number">mobile number:</label>
            <input type="text" class="form-control" id="number" name="number">
          </div>

          <div class="form-group">
            <label for="eamil">email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="password">password:</label>
            <input type="text" class="form-control" id="password" name="password">
          </div>


          <div class="form-group">
            <label for="adress">address :</label>
            <input type="text" class="form-control" id="address" name="address">
          </div>

          <div class="form-group">
            <label for="city">city:</label>
            <input type="text" class="form-control" id="city" name="city">
          </div>

          <label>Gender</label>
          <div class="radio">
            <label><input type="radio" name="sex" value="male"> male</label>

            <label><input type="radio" name="sex" value="female"> female</label>
          </div>
          <br>
          <button type="submit" class="btn btn-info" name="submit"> Submit</button>
        </form>

      </div>

      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6   border">
        <h4 class="text-center">Login</h4>

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
          <button type="submit" class="btn btn-info" name="login">Login</button>
        </form>

      </div>

    </div>

  </div>

</body>

</html>