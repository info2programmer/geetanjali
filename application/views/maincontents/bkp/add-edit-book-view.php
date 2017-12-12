<!-- Page header -->

	<div class="page-header">

		<div class="page-header-content">

			<div class="page-title">

				<h4><i class="fa fa-th-large position-left"></i> Manage Books</h4>

			</div>										

			<ul class="breadcrumb">

				<li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>

				<li><a href="<?php echo base_url(); ?>index.php/admin/manage_books">Manage Books</a></li>

				<li class="active"><?php echo $action; ?> Books</li>

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

						Basic inputs

						</h4>				

					</div>

					<div class="panel-body no-padding-bottom">

						<!--<form class="form-horizontal" action="form_basic.htm#">	-->						

						 <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');

								echo form_open_multipart('',$attributes); ?>

                                

                             <?php

									if(isset($row))

									{  

										$publisher_name = $row->publisher_name;
										$book_name = $row->book_name;
										$department = $row->department;
									 }

									 else

									 {

										$publisher_name = '';
										$book_name = '';
										$department = '';
									 }

							?>

                                    

                                        	

							<input type="hidden" name="mode" value="principal" />
                            
                            <div class="form-group">

								<label class="control-label col-lg-2">Publisher Name </label>

								<div class="col-lg-10">
                                    
                                    <input type="text" class="form-control" placeholder="Enter Publisher Name" name="publisher_name" value="<?php if($action == 'Edit'){echo $publisher_name;} else {echo set_value('publisher_name');} ?>">

                                     <?php echo form_error('publisher_name'); ?>

								</div>

							</div>
                            <div class="form-group">

								<label class="control-label col-lg-2">Book Name </label>

								<div class="col-lg-10">
                                    
                                    <input type="text" class="form-control" placeholder="Enter Book Name" name="book_name" value="<?php if($action == 'Edit'){echo $book_name;} else {echo set_value('book_name');} ?>">

                                     <?php echo form_error('book_name'); ?>

								</div>

							</div>
							<div class="form-group">

								<label class="control-label col-lg-2">Department </label>

								<div class="col-lg-10">
                                    
                                    <!--<input type="text" class="form-control" placeholder="Enter Department" name="department" value="<?php if($action == 'Edit'){echo $department;} else {echo set_value('department');} ?>">-->
                                    
                                    <?php 

										$js = 'class="form-control"';

										echo form_dropdown('department',$subjects,$department,$js);

										echo form_error('department'); 

								  ?>

                                     
								</div>

							</div>                            
                            

							<div class="form-group">

								<label class="control-label col-lg-2">Book</label>

								<div class="col-lg-10">

									<?php if($action == 'Edit') { ?>

                                   <a target="_blank" href="<?php echo base_url(); ?>uploads/books/<?php echo $row->slider_image; ?>"><i class="fa fa-download"></i> <?php echo $row->slider_image; ?></a>

                                    <?php }

									echo br(2);

									?>

                                    

                                     

                                    <input name="slider_image" type="file" class="file-input-custom" data-show-caption="true" data-show-upload="true" accept="image/*">

									<?php if($this->session->flashdata('err_message')){ echo $this->session->flashdata('err_message'); } ?>
                                    
								</div>

							</div>

                           

							<div class="form-group">

								<label class="control-label col-lg-2"></label>

								<div class="col-lg-10">

									<button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> Books</button>

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