<?php
  session_start();
  include 'Assets/include/conn.php';
  if(isset($_POST['btnreg'])){
      $uname=$_POST['uname'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $password=($_POST['password']);
      $cpassword=($_POST['cpassword']);
      $OTP=round(rand(100000,999999));
      if($password==$cpassword){
              $query=mysqli_query($con,"insert into user(Admin_Name, Admin_Password, 
              Admin_Email,Created_Date,Updated_Date, OTP,PhoneNo) values('$uname','$password','$email',now(),now(),'$OTP','$phone')");
              if(mysqli_affected_rows($con)>0){
                  header('location:login.php');
              }
              else {
                  echo mysqli_error($con);
              }
          }
    else {
        echo 'Password didnt match';
    }
}
else if(isset($_POST['btnlogin'])){
     $email=$_POST['email'];
     $password=($_POST['password']);
        $query=mysqli_query($con,"select * from user where Admin_Email='$email' and Admin_password='$password'");
        if(mysqli_affected_rows($con)>0){
            $_SESSION['email']=$email;
            header('location:index.php');
        }
    else {
        echo 'Fail to login'.mysqli_error($con);
    }
    
   
}
?>