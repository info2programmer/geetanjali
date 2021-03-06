<!-- Page header -->

	<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="fa fa-th-large position-left"></i> Manage File</h4>

			</div>										

			<ul class="breadcrumb">

				<li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>

				<li><a href="<?php echo base_url(); ?>index.php/admin/manage_notice">Manage File</a></li>

				<li class="active"><?php echo $action; ?> File</li>

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

						

						</h4>				

					</div>

					<div class="panel-body no-padding-bottom">

						<!--<form class="form-horizontal" action="form_basic.htm#">	-->						

						 <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');

								echo form_open_multipart('',$attributes); ?>

                                

                             <?php

									if(isset($row))

									{  

										$title = $row->title;

										$role = $row->role;

										$notice_tag = $row->notice_tag;

									 }

									 else

									 {

										$title = ''; 

										$role = '';

									 	$notice_tag = '';

									 }
							?>

                                    

                                        	

							<input type="hidden" name="mode" value="slider" />

                            

                            <div class="form-group">

								<label class="control-label col-lg-2">File Title</label>

								<div class="col-lg-10">

									

                                    <input type="text" class="form-control" placeholder="Enter File Title" name="title" value="<?php if($action == 'Edit'){echo $title;} else {echo set_value('title');} ?>">

                                     <?php echo form_error('title'); ?>

								</div>

							</div>

                            <div class="form-group">

								<label class="control-label col-lg-2">File Role</label>

								<div class="col-lg-10">

									

                                    <?php 

										$js = 'class="form-control" id=role';

										echo form_dropdown('role',$categories,$role,$js);

										echo form_error('role'); 

								  ?>

                                    

								</div>

							</div>

                            <!--<div class="form-group">
								<label class="control-label col-lg-2">File Date</label>
								<div class="col-lg-10">
                                <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control pickadate-selectors" placeholder="Select Notice Date" name="notice_date" value="<?php if($action == 'Edit'){echo $notice_date;} else {echo set_value('notice_date');} ?>">
                                    </div>
                                     <?php echo form_error('notice_date'); ?>
								</div>
							</div>-->

                            <!-- Basic example -->
                            <div class="form-group">
                                <label class="control-label col-lg-2">File Tag</label>
                                <div class="col-lg-10">
                                	<!--<div class="input-group">-->
                                		<input type="text" class="form-control tokenfield" placeholder="Type file tags name and press enter" value="<?php if($action == 'Edit'){echo $notice_tag;} else {echo set_value('notice_tag');} ?>" name="notice_tag">
                                    <!--</div>-->
                                    <?php echo form_error('notice_date'); ?>    
                                </div>
                            </div>
                            <!-- /basic example -->

                            

							<div class="form-group">

								<label class="control-label col-lg-2">File</label>

								<div class="col-lg-10">

									<?php if($action == 'Edit') { ?>

                                    

                                    <a target="_blank" href="<?php echo base_url();?>uploads/notice/<?php echo $slider_image;?>"><?php echo base_url();?>uploads/notice/<?php echo $slider_image;?></a>

                                    <?php } ?>

                                    

                                     

                                    <input name="slider_image" type="file" class="file-input-custom" data-show-caption="true" data-show-upload="true" >

                                    <?php if($this->session->flashdata('err_message')){ echo $this->session->flashdata('err_message'); } ?>

								</div>

							</div>

                           

							<div class="form-group">

								<label class="control-label col-lg-2"></label>

								<div class="col-lg-10">

									<button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> File</button>

								</div>

							</div>							

						<?php echo form_close(); ?>					

					</div>

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
			
			// Basic initialization
			$('.tokenfield').tokenfield();

			// Styling
			// -----------------------------
			// Primary
			// Add class on init
			$('.tokenfield-primary').on('tokenfield:initialize', function (e) {
				$(this).parent().find('.token').addClass('bg-primary')
			});

			// Initialize plugin
			$('.tokenfield-primary').tokenfield();

			// Add class when token is created
			$('.tokenfield-primary').on('tokenfield:createdtoken', function (e) {
				$(e.relatedTarget).addClass('bg-primary')
			});
			
			// Teal
			// Add class on init
			$('.tokenfield-teal').on('tokenfield:initialize', function (e) {
				$(this).parent().find('.token').addClass('bg-teal')
			});

			// Initialize plugin
			$('.tokenfield-teal').tokenfield();

			// Add class when token is created
			$('.tokenfield-teal').on('tokenfield:createdtoken', function (e) {
				$(e.relatedTarget).addClass('bg-teal')
			});
			
			// Purple
			// Add class on init
			$('.tokenfield-purple').on('tokenfield:initialize', function (e) {
				$(this).parent().find('.token').addClass('bg-purple')
			});

			// Initialize plugin
			$('.tokenfield-purple').tokenfield();

			// Add class when token is created
			$('.tokenfield-purple').on('tokenfield:createdtoken', function (e) {
				$(e.relatedTarget).addClass('bg-purple')
			});
			
			// Success
			// Add class on init
			$('.tokenfield-success').on('tokenfield:initialize', function (e) {
				$(this).parent().find('.token').addClass('bg-success')
			});

			// Initialize plugin
			$('.tokenfield-success').tokenfield();

			// Add class when token is created
			$('.tokenfield-success').on('tokenfield:createdtoken', function (e) {
				$(e.relatedTarget).addClass('bg-success')
			});
			
			// Danger
			// Add class on init
			$('.tokenfield-danger').on('tokenfield:initialize', function (e) {
				$(this).parent().find('.token').addClass('bg-danger')
			});

			// Initialize plugin
			$('.tokenfield-danger').tokenfield();

			// Add class when token is created
			$('.tokenfield-danger').on('tokenfield:createdtoken', function (e) {
				$(e.relatedTarget).addClass('bg-danger')
			});
			
			// Warning
			// Add class on init
			$('.tokenfield-warning').on('tokenfield:initialize', function (e) {
				$(this).parent().find('.token').addClass('bg-warning')
			});

			// Initialize plugin
			$('.tokenfield-warning').tokenfield();

			// Add class when token is created
			$('.tokenfield-warning').on('tokenfield:createdtoken', function (e) {
				$(e.relatedTarget).addClass('bg-warning')
			});


			// Other examples
			// ------------------------------
			// Typeahead support			
			var engine = new Bloodhound({
				local: [
					{value: 'red'},
					{value: 'blue'},
					{value: 'green'} ,
					{value: 'yellow'},
					{value: 'violet'},
					{value: 'brown'},
					{value: 'purple'},
					{value: 'black'},
					{value: 'white'}
				],
				datumTokenizer: function(d) {
					return Bloodhound.tokenizers.whitespace(d.value);
				},
				queryTokenizer: Bloodhound.tokenizers.whitespace
			});

			// Initialize engine
			engine.initialize();

			// Initialize tokenfield
			$('.tokenfield-typeahead').tokenfield({
				typeahead: [null, { source: engine.ttAdapter() }]
			});

			// Methods
			// -----------------------------
			// Set tokens
			$('#set-tokens').on('click', function() {
				$('#set-tokens-field').tokenfield('setTokens', ['blue','red','white']);
			})


			// Create tokens
			$('#create-token').on('click', function() {
				$('#create-token-field').tokenfield('createToken', { value: 'new', label: 'New token' });
			})

			//
			// Disable, enable
			// Initialize plugin
			$('.tokenfield-disable').tokenfield();

			// Disable on click
			$('#disable').on('click', function() {
				$('.tokenfield-disable').tokenfield('disable');
			});

			// Enabe on click
			$('#enable').on('click', function() {
				$('.tokenfield-disable').tokenfield('enable');
			});
			
			// Readonly, writeable
			// Initialize plugin
			$('.tokenfield-readonly').tokenfield();

			// Readonly on click
			$('#readonly').on('click', function() {
				$('.tokenfield-readonly').tokenfield('readonly');
			});

			// Writeable on click
			$('#writeable').on('click', function() {
				$('.tokenfield-readonly').tokenfield('writeable');
			});
			
			// Destroy, create
			// initialize plugin
			$('.tokenfield-destroy').tokenfield();

			// Destroy on click
			$('#destroy').on('click', function() {
				$('.tokenfield-destroy').tokenfield('destroy');
			});

			// Create on click
			$('#create').on('click', function() {
				$('.tokenfield-destroy').tokenfield();
			});


		});
	});
</script>