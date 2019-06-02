<?php
   
    include 'link.php';
    include 'nav.php';
    include 'cannection.php';
    error_reporting(0);
   
    if(isset($_POST["submit"])){
      $name =  $_POST["name"];
      $mobil = $_POST["number"];
      $email = $_POST["email"];
      $password =$_POST["password"];
      
      $query="INSERT INTO `admin`( `name`, `mobile`,`email`, `password`) 
              VALUES ('$name','$mobil','$email','$password')";
       $data= mysqli_query($cannection,$query) or die("not isert data to database".mysqli_error($cannection));
       $total= mysqli_num_rows($data);
       echo $total; 
       
   }
   

?>
 <body>
   <div class="container">
            <h1 class="text-center" >ADD A NEW ADMIN </h1>
           <div class="">
           <form action="" method="post" >
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


  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-info" name="submit" > Submit</button>
</form>



           </div>    
   
   </div>

</body>