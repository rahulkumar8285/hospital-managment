<?php
 include 'link.php';
 include 'nav.php';
 include 'cannection.php';
 error_reporting(0);
  
  $email =$_POST["email"];
  $password =$_POST["password"];
  $query = "SELECT * FROM `admin` WHERE  email='$email' AND password='$password' "; 
  $data = mysqli_query($cannection,$query);
  $total =mysqli_num_rows($data); 
 echo $total;
  if($total==1){
     session_start();
     $_SESSION["adminemail"]=$email;
     header('location:adminhome.php');

}   
else{?>
  ALert wrong ia and password
<?php
}
   
     


?>

<body>
  <div class="container">
       <br><h1 class="text-center">Admin Login  </h1><br>
       <div class="row">
       <div class="col-lg-4 col-xl-4"></div>
       <div class="col-lg-4 col-xl-4  border  ">
     <form action="" method="post">
     <div class="form-group">
    <label for="email">Email address:</label>
     <input type="email" class="form-control" id="email" name="email">
     </div>

    <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group form-check">
    <label class="form-check-label">
    <input class="form-check-input" type="checkbox"> Remember me
    </label>
    </div>
    <button type="login" class="btn btn-info" name="login"> login</button>
    </form>
       </div>
       </div>
         
  </div>



</body>