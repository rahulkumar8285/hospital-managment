<html>
    <body>
        <?php
            include 'link.php';
            include 'cannection.php';
            include 'nav.php';
            error_reporting(0);
            if((isset($_POST["submit"]))){
                $name=mysqli_real_escape_string($cannection,trim($_POST["name"]));
                $mobile=mysqli_real_escape_string($cannection,trim($_POST["number"]));
                $email=mysqli_real_escape_string($cannection,trim($_POST["email"]));
                $password=mysqli_real_escape_string($cannection,trim($_POST["password"]));
                $address=mysqli_real_escape_string($cannection,trim($_POST["address"]));
                $city=mysqli_real_escape_string($cannection,trim($_POST["city"]));
                $gender=mysqli_real_escape_string($cannection,trim($_POST["sex"]));
                //all is validiton varibels//             
                $name_vailed = false;
                $mobile_vailed = false;
                $email_vailed = false;
                $password_vailed= false;
                $address_vailed= false ;
                $city_vailed= false ;                
                $gender_vailed= false ;
                //check anly empty candistion //
                //name candition//
                if(!empty($name)){
                   $name_vailed = true;
                } 
                else{
                    echo "plaze enter a name all filed is requrid";
                }
                //mobile number candistion//
                if(!empty($mobile)){ 
                    $mobile_vailed = true;
                } 
                 else{
                     echo "plaze enter a right number all filed is requrid";
                 }
                 //email check//
                 if(!empty($email)){
                     $email_vailed = true;  
                } 
                 else{
                     echo "plaze enter a n vailed email all filed is requrid";
                 }
                 //password check//
                 if(!empty($password)){ 
                    $password_vailed = true;
                } 

                 else{
                     echo "plaze enter password  all filed is requrid";
                 }
                 //address check//
                 if(!empty($address)){ 
                     $address_vailed = true;

                } 
                 else{
                     echo "plaze enter a address. all filed is requrid";
                 }
                 //city check//
                 if(!empty($city)){
                     $city_vailed = true; 
                } 
                 else{
                     echo "plaze enter a name all filed is requrid";
                 }
                 //gender check//
                 if(!empty($gender)){
                     $gender_vailed = true; 
                } 
                 else{
                     echo "plaze enter a name all filed is requrid";
                 }

             }

            else{
                echo"plz filed any ditails";
            
            }

            if($name_vailed && $mobile_vailed && $email_vailed && $password_vailed && $address_vailed && $city_vailed && $gender_vailed){

                $query ="INSERT INTO `patient`( `name`, `mobile`, `email`, `password`, `address`, `city`, `gender`) 
                         VALUES ('$name','$mobile','$email','$password','$address','$city','$gender')";
                 $data=mysqli_query($cannection,$query);
                          
                 if($data){
                    session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                    header('location:patienthome.php');

                 }
                 else{
                     echo "data not send to data base";
                 }


            }
            

        ?>

    </body>
</html>