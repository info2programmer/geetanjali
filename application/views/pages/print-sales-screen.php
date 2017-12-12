<section class="login" style="width: calc(100% - 230px) !important;">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row bg-white">
			<div class="login-card card-block">
				<form class="md-float-material">
					<h1>Bill Generation Successfull</h1>
					<div class="imgs-screen text-center">
						<img src="<?php echo base_url();?>material/assets/images/suck.jpeg" class="img-circle" alt="lock" style="width:120px; height:120px;"><br/>
                        <label style="color:#FF0000; font-size:16px;">Bill No. : <?php echo $rows[0]['p_bill_no'];?></label>
					</div>
					
					<div class="unlock">
						<a href="<?php echo base_url();?>View/SalesRawBill/<?php echo $rows[0]['p_bill_no'];?>" class="btn btn-primary btn-md waves-effect waves-light text-center m-b-20" target="_blank">PRINT RAW BIll
						</a>
                        <a href="<?php echo base_url();?>View/SalesFinalBill/<?php echo $rows[0]['p_bill_no'];?>" class="btn btn-primary btn-md waves-effect waves-light text-center m-b-20" target="_blank">PRINT FINAL BIll
						</a>
						
					</div>
				</form>
				<!-- end of form -->
			</div>
			<!-- end of login-card -->
		</div>
		<!-- end of row -->
	</div>
	

</section>