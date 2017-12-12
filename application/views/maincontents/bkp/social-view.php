<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Social Link</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      
      <!--<li><a href="<?php echo base_url(); ?>index.php/admin/site_setting">Manage Site Setting</a></li>-->
      
      <li class="active"><?php echo $action; ?> Social Link</li>
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
										$fb_link = $row->fb_link;
										$twitter_link = $row->twitter_link;
										$linkedin_link = $row->linkedin_link;
										$google_plus_link = $row->google_plus_link;
									 }

									 else

									 {

										$fb_link = '';
										$twitter_link = '';
										$linkedin_link = '';
										$google_plus_link = '';
									 }

							?>                  
          <input type="hidden" name="mode" value="site_setting" />
          
          <div class="form-group">
            <label class="control-label col-lg-3">Facebook Link</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Facebook Link" name="fb_link" value="<?php if($action == 'Edit'){echo $fb_link;} else {echo set_value('fb_link');} ?>">
              <?php echo form_error('fb_link'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Twitter Link</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Twitter Link" name="twitter_link" value="<?php if($action == 'Edit'){echo $twitter_link;} else {echo set_value('twitter_link');} ?>">
              <?php echo form_error('twitter_link'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">Linkedin Link</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Linkedin Link" name="linkedin_link" value="<?php if($action == 'Edit'){echo $linkedin_link;} else {echo set_value('linkedin_link');} ?>">
              <?php echo form_error('linkedin_link'); ?> </div>
          </div>       
         
          
          <div class="form-group">
            <label class="control-label col-lg-3">Google Plus Link</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" placeholder="Enter Google Plus Link" name="google_plus_link" value="<?php if($action == 'Edit'){echo $google_plus_link;} else {echo set_value('google_plus_link');} ?>">
              <?php echo form_error('google_plus_link'); ?> </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-lg-3"></label>
            <div class="col-lg-9">
              <button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> Social Link</button>
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