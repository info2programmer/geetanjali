<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Post</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/admin/profile/post">Manage Post</a></li>
      <li class="active"><?php echo $action; ?> Post</li>
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
          
          <!--<form class="form-horizontal" action="form_basic.htm#">	-->
          
          <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');

								echo form_open_multipart('',$attributes); ?>
          <?php

									if(isset($row))
									{  
										$title = $row->title;
										$name = $row->name;
										$phone = $row->phone;
										$area = $row->area;
										$location = $row->location;
										$pin = $row->pin;
										$rent_to = $row->rent_to;
										$rent_from = $row->rent_from;
										$occupancy = $row->occupancy;
										$description = $row->description;
										$food_facility = $row->food_facility;
										$post_image = $row->post_image;
										$post_type = $row->post_type;
									 }
									 else
									 {
										$title = ''; 
										$name = '';
										$phone = '';
										$area = '';
										$location = '';
										$pin = '';
										$rent_to = '';
										$rent_from = '';
										$occupancy = '';
										$description = '';
										$food_facility = '';
										$post_image = '';
										$post_type = '';
									 }
							?>
          <input type="hidden" name="mode" value="pg" />
          <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="<?php if($action == 'View'){echo $title;} else {echo set_value('title');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('title'); ?> </div>
          <div class="form-group">
            <label for="name">Contact Name:</label>
            <input type="text" class="form-control" placeholder="Enter Contact Name" name="name" value="<?php if($action == 'View'){echo $name;} else {echo set_value('name');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('name'); ?> </div>
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" placeholder="Enter Phone" name="phone" value="<?php if($action == 'View'){echo $phone;} else {echo set_value('phone');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('phone'); ?> </div>
          <div class="form-group">
            <label for="area">Area:</label>
            <input type="text" class="form-control" placeholder="Enter Area" name="area" value="<?php if($action == 'View'){echo $area;} else {echo set_value('area');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('area'); ?> </div>
          <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" placeholder="Enter Location" name="location" value="<?php if($action == 'View'){echo $location;} else {echo set_value('location');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('location'); ?> </div>
          <div class="form-group">
            <label for="pin">Pincode:</label>
            <input type="text" class="form-control" placeholder="Enter Pincode" name="pin" value="<?php if($action == 'View'){echo $pin;} else {echo set_value('pin');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('pin'); ?> </div>
          <div class="form-group">
            <label for="rentform">Rent From:</label>
            <input type="text"  class="form-control" placeholder="Enter Rent Starting Value" name="rent_from" value="<?php if($action == 'View'){echo $rent_from;} else {echo set_value('rent_from');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('rent_from'); ?> </div>  
          <div class="form-group">
            <label for="rentto">Rent To:</label>
            <input type="text" class="form-control" placeholder="Enter Rent Ending Value" name="rent_to" value="<?php if($action == 'View'){echo $rent_to;} else {echo set_value('rent_to');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('rent_to'); ?> </div>
          
          <div class="form-group">
            <label for="">Occupancy:</label>
            <input type="text" class="form-control" placeholder="Enter Occupancy" name="occupancy" value="<?php if($action == 'View'){echo $occupancy;} else {echo set_value('occupancy');} ?>" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            <?php echo form_error('occupancy'); ?> </div>
          <div class="form-group">
            <label for="">Description:</label>
            
            <textarea name="description" class="form-control" placeholder="Enter description" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>><?php if($action == 'View'){echo $description;} else {echo set_value('description');} ?></textarea>
            <?php echo form_error('description'); ?> </div>
            
          <div class="form-group">
            <label for="">Image:</label>
            <div>
              <?php if($action == 'View') { ?>
              <img src="<?php echo base_url();?>uploads/post/<?php echo $post_image; ?>" class="image-responsive" width="100" height="100" />
              
              <?php }  else { ?>
              <input name="slider_image" type="file" class="file-input-custom" data-show-caption="true" data-show-upload="true" >
              <?php if($this->session->flashdata('err_message')){ echo $this->session->flashdata('err_message'); } ?>
              <?php } ?>
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Post Type:</label>
            <select name="post_type" class="form-control" <?php if($action == 'View'){ ?>disabled="disabled"<?php } ?>>
            	<option value="" selected="selected" hidden>Select Post Type</option>
                <option value="Free" <?php if($action == 'View'){ if($post_type=='Free') { ?>selected="selected"<?php } } ?>>Free</option>
                <option value="Paid" <?php if($action == 'View'){ if($post_type=='Paid') { ?>selected="selected"<?php } } ?>>Paid</option>
            </select>
            <?php echo form_error('description'); ?> </div>
            
          <div class="form-group">
            <label>
              <input type="checkbox" name="food_facility" <?php if($action == 'View'){ if($food_facility==1) { ?>checked="checked" disabled="disabled"<?php } } ?>>
              Food Facility</label>
          </div>
           <?php if($action != 'View') { ?>
          <div class="form-group">
            <label class="control-label col-lg-4"></label>
            <div class="col-lg-8">
              <button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> Post</button>
            </div>
          </div>
          <?php } ?>
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

<script type='text/javascript'>
	$(document).ready(function() {		
		$(function() {
			
			// Display time picker
			$('.daterange-time').daterangepicker({
				timePicker: true,
				applyClass: 'bg-slate-600',
				cancelClass: 'btn-default',
				opens: "left",
				locale: {
					format: 'MM/DD/YYYY h:mm a'
				}
			});

			// Single picker
			$('.daterange-single').daterangepicker({ 
				singleDatePicker: true
			});

			// Display date dropdowns
			$('.daterange-datemenu').daterangepicker({
				showDropdowns: true,
				opens: "left",
				applyClass: 'bg-slate-600',
				cancelClass: 'btn-default'
			});

			// Initialize with options
			$('.daterange-pBirdd').daterangepicker(
				{
					startDate: moment().subtract('days', 29),
					endDate: moment(),
					minDate: '01/01/2014',
					maxDate: '12/31/2016',
					dateLimit: { days: 60 },
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
						'Last 7 Days': [moment().subtract('days', 6), moment()],
						'Last 30 Days': [moment().subtract('days', 29), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
					},
					opens: 'left',
					applyClass: 'btn-small bg-slate',
					cancelClass: 'btn-small btn-default'
				},
				function(start, end) {
					$('.daterange-pBirdd span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
					$.jGrowl('Date range has been changed', { header: 'Update', theme: 'bg-primary', position: 'center', life: 1500 });
				}
			);
			// Display date format
			$('.daterange-pBirdd span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));

			
			// Pick-a-date picker
			// ------------------------------
			// Basic options
			$('.pickadate').pickadate();
					
			// Dropdown selectors
			$('.pickadate-selectors').pickadate({
				selectYears: true,
				selectMonths: true
			});

			// Date limits
			$('.pickadate-limits').pickadate({
				min: [2016,3,28],
				max: [2017,4,30]
			});

			// Disable date range
			$('.pickadate-disable-range').pickadate({
				disable: [
					1
				]
			});

			// Pick-a-time time picker
			// ------------------------------
			// Default functionality
			$('.pickatime').pickatime();
			
			// Time limits
			$('.pickatime-limits').pickatime({
				min: [9,30],
				max: [18,0]
			});

			// Disabling ranges
			$('.pickatime-range').pickatime({
				disable: [
					1,
					[1, 30, 'inverted'],
					{ from: [4, 30], to: [10, 30] },
					[6, 30, 'inverted'],
					{ from: [8, 0], to: [9, 0], inverted: true }
				]
			});
		});
	});
</script>