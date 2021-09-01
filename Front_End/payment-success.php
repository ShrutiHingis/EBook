<?php
     session_start();
	 error_reporting(0);
	 $_SESSION['address'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Instamojo Thank You - Tutsmake</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body class="">
	
	<br><br><br><br>
	<article class="bg-secondary mb-3">  
	<div class="card-body text-center">
	<h4 class="text-white">Thank you for payment<br></h4>
	<?php
	  
        include 'Assets/include/conn.php';
		require_once('vendor/autoload.php');

        $API_KEY = "test_621381a8cefd0aa23cde32855fe";
        $AUTH_TOKEN = "test_05c5d06453cd6c491f370225730";
        $URL = "https://test.instamojo.com/api/1.1/";

		$api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN,$URL);

		$payid = $_GET["payment_request_id"];

		try {
		$response = $api->paymentRequestStatus($payid);
		$paymentid= $response['payments'][0]['payment_id'] ;
		$buyername= $response['payments'][0]['buyer_name'];
		$buyeremail= $response['payments'][0]['buyer_email'];
		$buyermobile= $response['payments'][0]['buyer_phone'];
		$address= $_SESSION['address'];
		$buyerstatus= $response['payments'][0]['status'];
		$query=mysqli_query($con,"INSERT INTO invoice(paymentid, buyername, buyeremail, buyermobile,buyeraddress, buyerstatus) VALUES ('$paymentid','$buyername','$buyeremail','$buyermobile','$address','$buyerstatus')");
		if(mysqli_affected_rows($con)>0){
			echo ' ';
		}
		else{
			echo mysqli_error($con);
		} 

		echo "<h5>Payment ID: " . $response['payments'][0]['payment_id'] . "</h5>" ;
		echo "<h5>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h5>" ;
		echo "<h5>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h5>" ;
		echo "<h5>Payment Mobile: " . $response['payments'][0]['buyer_phone'] . "</h5>" ;
		echo "<h5>Payment status: " . $response['payments'][0]['status'] . "</h5>" ;
		echo "<pre>";

		}
		catch (Exception $e) {
		print('Error: ' . $e->getMessage());
		}
	?>
	<br>
	<p><a class="btn btn-warning" target="_blank" href="index.php">Home Page
	 <i class="fa fa-window-restore "></i></a></p>
	</div>
	<br><br><br>
	</article>

</body>
</html>
