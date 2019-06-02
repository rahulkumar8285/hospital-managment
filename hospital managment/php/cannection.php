<?php 
  $severname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospital";
  
  $cannection = mysqli_connect($severname,$username,$password,$dbname);

  if($cannection){ 
   echo 'data okh';   
}
  else
  {
      die("Server is not cannect".mysqli_cannect_error());

  };
?>