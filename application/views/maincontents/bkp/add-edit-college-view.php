<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage College</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/admin/manage_college">Manage College</a></li>
      <li class="active"><?php echo $action; ?> College</li>
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
          <h4 class="panel-title"> </h4>
        </div>
        <div class="panel-body no-padding-bottom">         
          <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
								echo form_open_multipart('',$attributes); ?>
          <?php
									if(isset($row))
									{  
										$user_type = $row->user_type;
										$college_cat = $row->college_cat;										
										$collge_id = $row->college_name; 
										$college_details = $this->db->query("select * from td_colleges where id='$collge_id'")->row();
										$college_name = $college_details->college_name;										
										$logo_image = $row->logo_image;
										$address = $row->address;
										$phone = $row->phone;
										$email = $row->email;
										$username = $row->username;
										$password = $row->password;
										$ip_address = $row->ip_address;
										$last_login = $row->last_login;
										$last_browser_used = $row->last_browser_used;
									 }
							?>
          <input type="hidden" name="mode" value="College" />
          
          <!--<div class="form-group" id="name">
            <label class="control-label col-lg-4">College user type</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College user type" name="user_type" value="<?php if($action == 'View'){echo $user_type;} else {echo set_value('user_type');} ?>" readonly="readonly">
              <?php echo form_error('user_type'); ?> </div>
          </div>-->
          <div class="form-group" id="designation">
            <label class="control-label col-lg-4">College Category</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College Category" name="college_cat" value="<?php if($action == 'View'){echo $college_cat;} else {echo set_value('college_cat');} ?>" readonly="readonly">
              <?php echo form_error('college_cat'); ?> </div>
          </div>
          <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">College Name</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College Name" name="college_name" value="<?php if($action == 'View'){echo $college_name;} else {echo set_value('college_name');} ?>" readonly="readonly">
              <?php echo form_error('college_name'); ?> </div>
          </div>
          <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">College Address</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College Address" name="address" value="<?php if($action == 'View'){echo $address;} else {echo set_value('address');} ?>" readonly="readonly">
              <?php echo form_error('address'); ?> </div>
          </div>
          <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">College Phone</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College Phone" name="phone" value="<?php if($action == 'View'){echo $phone;} else {echo set_value('phone');} ?>" readonly="readonly">
              <?php echo form_error('phone'); ?> </div>
          </div>
          <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">College Email</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College Email" name="email" value="<?php if($action == 'View'){echo $email;} else {echo set_value('email');} ?>" readonly="readonly">
              <?php echo form_error('email'); ?> </div>
          </div>
           <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">College Username</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College username" name="username" value="<?php if($action == 'View'){echo $username;} else {echo set_value('username');} ?>" readonly="readonly">
              <?php echo form_error('username'); ?> </div>
          </div>
           <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">College Password</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter College Password" name="password" value="<?php if($action == 'View'){echo $password;} else {echo set_value('password');} ?>" readonly="readonly">
              <?php echo form_error('password'); ?> </div>
          </div>
           <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">IP Address</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter IP Address" name="ip_address" value="<?php if($action == 'View'){echo $ip_address;} else {echo set_value('ip_address');} ?>" readonly="readonly">
              <?php echo form_error('ip_address'); ?> </div>
          </div>
           <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">Last Login</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter Last Login" name="last_login" value="<?php if($action == 'View'){echo $last_login;} else {echo set_value('last_login');} ?>" readonly="readonly">
              <?php echo form_error('last_login'); ?> </div>
          </div>
           <div class="form-group" id="qualification">
            <label class="control-label col-lg-4">Last Browser Used</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="Enter Last Browser Used" name="last_browser_used" value="<?php if($action == 'View'){echo $last_browser_used;} else {echo set_value('last_browser_used');} ?>" readonly="readonly">
              <?php echo form_error('last_browser_used'); ?> </div>
          </div>          
          <div class="form-group" id="slider_image">
            <label class="control-label col-lg-4">College Logo</label>
            <div class="col-lg-8">
              <?php if($action == 'View') { 

									if($row->logo_image!=''){

									?>
              <img src="<?php echo base_url();?>uploads/college/<?php echo $row->logo_image;?>" height="100" width="100"/>
              <?php } else { ?>
              <img src="<?php echo base_url();?>material/admin/no-user-image.jpeg" height="100" width="100"/>
              <?php } ?>
              <?php } ?>
              <!--<input name="slider_image" type="file" class="file-input-custom" data-show-caption="true" data-show-upload="true" accept="image/*">-->
              <?php if($this->session->flashdata('err_message')){ echo $this->session->flashdata('err_message'); } ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-lg-4"></label>
            <div class="col-lg-8">
              <!--<button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> College</button>-->
              <a href="<?php echo base_url();?>index.php/admin/manage_college" class="btn bg-teal-400 btn-labeled btn-rounded"><b><i class="fa fa-hand-o-right"></i></b>Back</a>	
            </div>
          </div>
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>

	$(document).ready(function() {		

		$(function() {

			// Basic example

			$('.file-input').fileinput({

				browseLabel: 'Browse',

				browseIcon: '<i class="fa fa-file-o position-left"></i>',

				uploadIcon: '<i class="fa fa-upload position-left"></i>',

				removeIcon: '<i class="fa fa-close position-left"></i>',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>'

				},

				initialCaption: "No file selected"

			});



			// Custom layout

			$('.file-input-custom').fileinput({

				previewFileType: 'image',

				browseLabel: 'Select',

				browseClass: 'btn bg-danger-700',

				browseIcon: '<i class="fa fa-image position-left position-left"></i> ',

				removeLabel: 'Remove',

				removeClass: 'btn btn-danger',

				removeIcon: '<i class="fa fa-close position-left position-left"></i> ',

				uploadClass: 'btn bg-teal-400',

				uploadIcon: '<i class="fa fa-upload position-left position-left"></i> ',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>'

				},

				initialCaption: "Please select image",

				mainClass: 'input-group'

			});



			// Template modifications

			$('.file-input-advanced').fileinput({

				browseLabel: 'Browse',

				browseClass: 'btn btn-success',

				removeClass: 'btn btn-default',

				uploadClass: 'btn bg-success-400',

				browseIcon: '<i class="fa fa-file-o position-left"></i>',

				uploadIcon: '<i class="fa fa-upload position-left"></i>',

				removeIcon: '<i class="fa fa-close position-left"></i>',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>',

					main1: "{preview}\n" +

					"<div class='input-group {class}'>\n" +

					"   <div class='input-group-btn'>\n" +

					"       {browse}\n" +

					"   </div>\n" +

					"   {caption}\n" +

					"   <div class='input-group-btn'>\n" +

					"       {upload}\n" +

					"       {remove}\n" +

					"   </div>\n" +

					"</div>"

				},

				initialCaption: "No file selected"

			});



			// Custom file extensions

			$(".file-input-extensions").fileinput({

				browseLabel: 'Browse',

				browseClass: 'btn btn-primary',

				uploadClass: 'btn btn-default',

				browseIcon: '<i class="fa fa-file-o position-left"></i>',

				uploadIcon: '<i class="fa fa-upload position-left"></i>',

				removeIcon: '<i class="fa fa-close position-left"></i>',

				layoutTemplates: {

					icon: '<i class="fa fa-file position-left"></i>'

				},

				maxFilesNum: 10,

				allowedFileExtensions: ["jpg", "gif", "png", "txt"]

			});		



			// Disable/enable button

			$("#btn-modify").on("click", function() {

				$btn = $(this);

				if ($btn.text() == "Disable file input") {

					$("#file-input-methods").fileinput("disable");

					$btn.html("Enable file input");

					alert("Hurray! I have disabled the input and hidden the upload button.");

				}

				else {

					$("#file-input-methods").fileinput("enable");

					$btn.html("Disable file input");

					alert("Hurray! I have reverted back the input to enabled with the upload button.");

				}

			});





			// AJAX upload

			$(".file-input-ajax").fileinput({

				uploadUrl: "http://localhost", // server upload action

				uploadAsync: true,

				maxFileCount: 5,

				initialPreview: [],

				fileActionSettings: {

					removeIcon: '<i class="icon-bin position-left"></i>',

					removeClass: 'btn btn-link btn-xs btn-icon',

					uploadIcon: '<i class="icon-upload position-left"></i>',

					uploadClass: 'btn btn-link btn-xs btn-icon',

					indicatorNew: '<i class="icon-file-plus text-slate position-left"></i>',

					indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success position-left"></i>',

					indicatorError: '<i class="icon-cross2 text-danger position-left"></i>',

					indicatorLoading: '<i class="icon-spinner2 spinner text-muted position-left"></i>',

				}

			});



		});

	});

</script> 
<script>

$(document).ready(function() {

	

	administrative_role1 = $('#administrative_role').val();

    	if(administrative_role1=='Teaching-Staff')

		{

			$('#stream').show();

			$('#subject_id').show();

			$('#staff_category').hide();

			$('#teacher_category').show();

			$('#name').show();

			$('#designation').show();

			$('#qualification').show();

			$('#slider_image').show();

			$('#slider_image1').show();

			

		}

		else if(administrative_role1=='Non-teaching-Staff')

		{

			$('#stream').hide();

			$('#subject_id').hide();

			$('#staff_category').show();

			$('#teacher_category').hide();

			$('#name').show();

			$('#designation').show();

			$('#qualification').show();

			$('#slider_image').show();

			$('#slider_image1').hide();

		}

	

	$('#administrative_role').change(function(){

		administrative_role = $('#administrative_role').val();

    	if(administrative_role=='Teaching-Staff')

		{

			$('#stream').show();

			$('#subject_id').show();

			$('#staff_category').hide();

			$('#teacher_category').show();

			$('#name').show();

			$('#designation').show();

			$('#qualification').show();

			$('#slider_image').show();

			$('#slider_image1').show();

			

		}

		else if(administrative_role=='Non-teaching-Staff')

		{

			$('#stream').hide();

			$('#subject_id').hide();

			$('#staff_category').show();

			$('#teacher_category').hide();

			$('#name').show();

			$('#designation').show();

			$('#qualification').show();

			$('#slider_image').show();

			$('#slider_image1').hide();

		}

	});



});

</script>