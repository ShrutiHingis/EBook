<?php
   include 'Assets/include/conn.php';

   if(isset($_POST['btncontact'])){
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $message = $_POST['message'];
       $query=mysqli_query($con,"INSERT INTO contact(firstname, lastname, phone, email_id, message) VALUES ('$firstname','$lastname','$phone','$email','$message')");
       if(mysqli_affected_rows($con)>0){
          header('location:contact.php');
           echo 'Query send Successfully';
       }
       else{
           echo 'Data Not sent'.mysqli_error($con);
       }
   }
   else{
       echo 'Fail to insert'.mysqli_error($con);
   }
?>