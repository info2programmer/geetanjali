<!-- Page header -->

	<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="fa fa-pencil position-left"></i> Change Password</h4>

			</div>										

			<ul class="breadcrumb">

				<li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>				

				<li>Change password</li>

			</ul>					

		</div>

	</div>

	<!-- /page header -->







<!-- Content area -->

<div class="content">        

<div class="row">

			<div class="col-md-12">

            <?php if($this->session->flashdata('error_message')) { ?>

                  <h5 style="color:red;"><?php echo $this->session->flashdata('error_message'); ?></h5>

            <?php } ?>

            <?php if($this->session->flashdata('success_message')) { ?>

                  <h5 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h5>

            <?php } ?>

				<div class="panel panel-flat">

					<div class="panel-heading">

						<h4 class="panel-title">

						Change Password

						</h4>				

					</div>

					<div class="panel-body no-padding-bottom">

						<!--<form class="form-horizontal" action="form_basic.htm#">	-->						

						 <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');

								echo form_open('',$attributes); ?>	

							<input type="hidden" name="mode" value="change_pass" />

							<div class="form-group">

								<label class="control-label col-lg-4">Old Password</label>

								<div class="col-lg-8">

									

                                    <input type="password" class="form-control"

                                                                          placeholder="Enter Old Password" name="old_password" value="">

                                    <span style="color:#F00"><?php echo form_error('old_password'); ?></span>

								</div>

							</div>

                            

                            <div class="form-group">

								<label class="control-label col-lg-4">New Password</label>

								<div class="col-lg-8">

									<input type="password" class="form-control"

                                                                          placeholder="Enter New Password" name="new_password" value="">

                                    <span style="color:#F00"><?php echo form_error('new_password'); ?></span>

								</div>

							</div>

                            

                            <div class="form-group">

								<label class="control-label col-lg-4">Confirm Password</label>

								<div class="col-lg-8">

									<input type="password" class="form-control"

                                                                          placeholder="Enter Confirm Password" name="confirm_password" value="">

                                    <span style="color:#F00"><?php echo form_error('confirm_password'); ?></span>

								</div>

							</div>



													



							<div class="form-group">

								<label class="control-label col-lg-4"></label>

								<div class="col-lg-8">

									<button type="submit" class="btn btn-danger btn-rounded">Change Password</button>

								</div>

							</div>							

						<?php echo form_close(); ?>					

					</div>

				</div>

			</div>

			

		</div>

</div>        