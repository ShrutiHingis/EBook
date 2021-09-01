<?php
  $storiesret=mysqli_query($con,"select * from stories order by book_id desc limit 6");
  if(mysqli_affected_rows($con)>0){
    while($data=mysqli_fetch_row($storiesret)){
      ?>

<div class="row cource-list-agile pt-4">
				<div class="col-lg-7 agile-course-main">
					<div class="w3ls-cource-first">
						<img src="../Admin/<?php echo $data[4]?>" alt="" class="img-fluid img-poiscour mx-auto d-block mt-2"></img>
						<div class="px-md-5 px-4  pb-md-5 pb-4">
							<h3 class="text-dark"><?php echo $data[1]?></h3>
							<p class="mt-3 mb-4 pr-lg-5">A book is a number of pieces of paper, usually with words printed on them, which are fastened together and fixed inside a cover of stronger paper. Books contain information, stories, or poetry etc.</p>
							<ul class="list-unstyled text-capitalize">
								<li>
									<i class="fas fa-calendar-alt mr-3"></i><b>Author - </b><?php echo $data[4]?></li>
								<li class="my-3">
									<i class="fas fa-clock mr-3"></i><b>Edition - </b><?php echo $data[5]?></li>
								<li>
									<i class="fas fa-users mr-3"></i><b>Price - </b><?php echo $data[2]?></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5 agile-course-main-2 mt-4">
					<img src="../Admin/<?php echo $data[3]?>" alt="" class="img-fluid" style="width:250px; height:250px">
				</div>
				<div class="buttons-w3ls">
					<a class="btn button-cour-w3ls text-white" href="storiesdetail.php?id=<?php echo $data[0]?>" role="button">Learn More</a>
					<a class="btn bg-dark text-white" href="buy_Stories.php?id=<?php echo $data[0]?>" role="button">Buy Now</a>
				</div>
			</div>

<?php
    }
  }
  else{
      echo 'No Data'.mysqli_error($con);
  }
?>