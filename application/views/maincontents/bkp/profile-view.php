<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Profile</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      
      <!--<li><a href="<?php echo base_url(); ?>index.php/admin/site_setting">Manage Site Setting</a></li>-->
      
      <li class="active"><?php echo $action; ?> Profile</li>
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
          <h4 class="panel-title"> Manage Profile </h4>
        </div>
        <div class="panel-body no-padding-bottom"> 
          
          <!--<form class="form-horizontal" action="form_basic.htm#">	-->
          
          <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');

								echo form_open_multipart('',$attributes); ?>
          <?php

									if($row)
									{  
										$college_cat = $row->college_cat;
										$college_name = $row->college_name;
										$student_name = $row->student_name;
										$address = $row->address;
										$phone = $row->phone;
										$email = $row->email;
										$college_website = $row->college_website;
										$college_city = $row->college_city;
										$college_description = $row->college_description;
										$college_establish = $row->college_establish;
										$student_diploma_college = $row->student_diploma_college;
										$student_degree_college = $row->student_degree_college;
										$student_pg_college_name = $row->student_pg_college_name;
										$other_qualification = $row->other_qualification;									
										$username = $row->username;									
										$password = $row->password;
									 }

									 else

									 {

										$college_cat = '';
										$college_name = '';
										$student_name = '';
										$address = '';
										$phone = '';
										$email = '';
										$college_website = '';
										$college_city = '';
										$college_description = '';
										$college_establish = '';
										$student_diploma_college = '';
										$student_degree_college = '';
										$student_pg_college_name = '';
										$other_qualification = '';	
										$username = '';										
										$password = '';
									 }

							?>
          <?php
		  $user_type = $row->user_type;
		  ?>                  
          <input type="hidden" name="mode" value="site_setting" />
          <?php if($user_type=='C') { ?>
          <div class="form-group">
            <label class="control-label col-lg-3">College Category</label>
            <div class="col-lg-9">
              <select name="college_cat" class="form-control" id="college_cat" disabled="disabled">
                <option value="" selected="selected" hidden>Select College Category</option>
                <option value="BTech" <?php if($college_cat=='BTech') { ?>selected="selected"<?php } ?>>B.Tech</option>
                <option value="Diploma" <?php if($college_cat=='Diploma') { ?>selected="selected"<?php } ?>>Diploma</option>
              </select>
              <?php echo form_error('college_cat'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">College Name</label>
            <div class="col-lg-9">
              <?php 
				$js = 'class="form-control" id=college_name disabled=disabled';
				echo form_dropdown('college_name',$colleges,$college_name,$js);
				echo form_error('college_name'); 
			  ?>
            </div>
          </div>
          <?php } ?>
          <?php if($user_type=='S') { ?>
          <div class="form-group">
            <label class="control-label col-lg-3">Student Name</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Student Name" name="student_name" value="<?php if($action == 'Edit'){echo $student_name;} else {echo set_value('student_name');} ?>">
              <?php echo form_error('student_name'); ?> </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <label class="control-label col-lg-3">Address</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?php if($action == 'Edit'){echo $address;} else {echo set_value('address');} ?>">
              <?php echo form_error('address'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Phone</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Phone" name="phone" value="<?php if($action == 'Edit'){echo $phone;} else {echo set_value('phone');} ?>">
              <?php echo form_error('phone'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Email Address</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Email Address" name="email" value="<?php if($action == 'Edit'){echo $email;} else {echo set_value('email');} ?>">
              <?php echo form_error('email'); ?> </div>
          </div>
          
          <?php if($user_type=='S') { ?>
          <div class="form-group">
            <label class="control-label col-lg-3">Diploma College Name</label>
            <div class="col-lg-9">
              <?php 
				$js = 'class="form-control" id=student_diploma_college';
				echo form_dropdown('student_diploma_college',$diploma_colleges,$student_diploma_college,$js);
				echo form_error('student_diploma_college'); 
			  ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Degree College Name</label>
            <div class="col-lg-9">
              <?php 
				$js = 'class="form-control" id=student_degree_college';
				echo form_dropdown('student_degree_college',$degree_colleges,$student_degree_college,$js);
				echo form_error('student_degree_college'); 
			  ?>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Post Graduate College Name</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Post Graduate College Name" name="student_pg_college_name" value="<?php if($action == 'Edit'){echo $student_pg_college_name;} else {echo set_value('student_pg_college_name');} ?>">
              <?php echo form_error('student_pg_college_name'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Other Qualification</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Other Qualification" name="other_qualification" value="<?php if($action == 'Edit'){echo $other_qualification;} else {echo set_value('other_qualification');} ?>">
              <?php echo form_error('other_qualification'); ?> </div>
          </div>
          <?php } ?>
          
          <?php if($user_type=='C') { ?>
          <div class="form-group">
            <label class="control-label col-lg-3">Website</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Website" name="college_website" value="<?php if($action == 'Edit'){echo $college_website;} else {echo set_value('college_website');} ?>">
              <?php echo form_error('college_website'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">City</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter City" name="college_city" value="<?php if($action == 'Edit'){echo $college_city;} else {echo set_value('college_city');} ?>">
              <?php echo form_error('college_city'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Short Description</label>
            <div class="col-lg-9">
              <textarea class="form-control" placeholder="Enter Short Description" name="college_description" rows="15">
              <?php if($action == 'Edit'){echo $college_description;} else {echo set_value('college_description');} ?>
              </textarea>
              
              <?php echo form_error('college_description'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Establishment Year</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter College Establishment Year" name="college_establish" value="<?php if($action == 'Edit'){echo $college_establish;} else {echo set_value('college_establish');} ?>">
              <?php echo form_error('college_establish'); ?> </div>
          </div>
          <?php } ?>
          
          <div class="form-group">
            <label class="control-label col-lg-3">Username</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Username" name="username" value="<?php if($action == 'Edit'){echo $username;} else {echo set_value('username');} ?>" disabled="disabled">
              <?php echo form_error('username'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Password</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Password" name="password" value="<?php if($action == 'Edit'){echo $password;} else {echo set_value('password');} ?>">
              <?php echo form_error('password'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Image</label>
            <div class="col-lg-9">
              <?php if($action == 'Edit') { 
					if($row->logo_image) { 
			  ?>
              <?php if($user_type=='C') { ?>
              <img src="<?php echo base_url();?>uploads/college/<?php echo $row->logo_image; ?>" height="100" width="300"/>
              <?php } if($user_type=='S') { ?>
              <img src="<?php echo base_url();?>uploads/student/<?php echo $row->logo_image; ?>" height="100" width="300"/>
              <?php } ?>
              <?php if($user_type=='P') { ?>
              <img src="<?php echo base_url();?>uploads/pg/<?php echo $row->logo_image; ?>" height="100" width="300"/>
              <?php } ?>
              <?php } else { ?>
              <img src="<?php echo base_url(); ?>material/admin/no-user-image.jpg" width="300" height="100" /><br />
              <br />
              <?php } ?>
              <?php } ?>
              
              <?php if($this->session->flashdata('message')) { ?>
              <h5 style="color:green;"><?php echo $this->session->flashdata('message'); ?></h5>
              <?php } ?>
              <input name="slider_image" type="file" class="file-input-custom" data-show-caption="true" data-show-upload="true" accept="image/*">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3"></label>
            <div class="col-lg-9">
              <button type="submit" class="btn btn-danger btn-rounded">Save Profile</button>
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
	$(document).ready(function(){
		
		stateID = $('#college_cat').val();
		
			if(stateID == "")
			{
			$("#city_id").hide();	
			}
			
    $("#college_cat").on('change', function(){
			/*$("#city_dropdown").show();*/
			
			stateID = $('#college_cat').val();
			name = $('#college_name').val();
					
			if(stateID != "")
			{
			$("#city_dropdown").hide();	
			$("#city_id").show();
			}
			$.ajax({
				type: "POST",
				url: "profile/ajax_call",
				async: false,
				data: {state:stateID},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
                        $('#city_id').html(data);
				}
			})
    });
});
</script>