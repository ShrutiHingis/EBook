<?php
   session_start();
  echo $_SESSION['buyername'] =$_POST['buyername'];
  echo $_SESSION['buyeremail']=$_POST['buyeremail'];
  echo $_SESSION['phone']=$_POST['phone'];
  echo $_SESSION['address']=$_POST['address'];
  echo $_SESSION['bookprice']=$_POST['bookprice'];
  include 'Assets/include/conn.php';
    require_once('vendor/autoload.php');

    $API_KEY = "test_621381a8cefd0aa23cde32855fe";
    $AUTH_TOKEN = "test_05c5d06453cd6c491f370225730";
    $URL = "https://test.instamojo.com/api/1.1/";

    $api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN, $URL);

    try {
        $response = $api->paymentRequestCreate(array(
        "purpose" => "E-Book Purchase",
        "amount"  =>(int) $_SESSION['bookprice'],
		$buyername= $_SESSION['buyername'], 
		$buyeremail= $_SESSION['buyeremail'],
		$buyermobile= $_SESSION['phone'],
		$buyeraddress=$_SESSION['address'],
        $amount=$_SESSION['bookprice'],
            // "purpose" => "E-Book Purchase",
          
            // "buyer_name" =>"shruti",
            // "send_email" => true,
            // "email" => "shruti@gmail.com",
            // "phone" => 8969978146,
            "redirect_url" => "http://localhost/E-Book/Front_End/payment-success.php"
            ));
            
            header('Location: ' . $response['longurl']);
            exit();
    }catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    } 

?>