<?php
  $pid=$_GET['id'];
  $commerceret=mysqli_query($con,"select * from commerce where book_id='$pid'");
  if(mysqli_affected_rows($con)>0){
    while($data=mysqli_fetch_row($commerceret)){
      ?>

 <div class="col-lg-8 single-left">
					<div class="single-left1">
						<img src="../Admin/<?php echo $data[3]?>" alt=" " class="img-fluid" style="width:500px; height:300px" />
						
						<h5 class="card-title">
							<a href="#" class="text-dark"> <b> Content of the course</b></a>
						</h5>
						<p><?php echo $data[6]?></p>
					</div>
					<div class="admin p-4 my-5">
						<p>
							<i class="fas fa-quote-left mr-2"></i>Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers.
							<i class="fas fa-quote-right ml-2"></i>
						</p>
						<a href="#" class="mt-3 font-weight-bold text-right blockquote-footer">James Doe</a>
					</div>
					
					<div class="social-details p-4 my-5 border">
						<h5>You Can Share it:</h5>
						<ul class="list-unstyled social-details-icons my-3">
							<li>
								<a href="#" class="fab fa-facebook-f bg-dark text-white text-center rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="#" class="fab fa-twitter bg-dark text-white text-center rounded-circle"> </a>
							</li>
							<li>
								<a href="#" class="fab fa-google-plus-g bg-dark text-white text-center rounded-circle"> </a>
							</li>
							<li class="ml-2">
								<a href="#" class="fas fa-rss bg-dark text-white text-center rounded-circle"> </a>
							</li>
							</li>
						</ul>
						<div class="text-right">
							<a class="btn bg-dark text-white" href="form.html" role="button">Buy Now</a>
						</div>
					</div>
				</div> 
		?>
				
					
					
<?php
    }
  }
  else{
      echo 'No Data'.mysqli_error($con);
  }
?>