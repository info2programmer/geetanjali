<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="fa fa-th-large position-left"></i> Manage Page Content</h4>
			</div>										
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin/manage_page_content">Manage Page Content</a></li>
				<li class="active"><?php echo $action; ?> Page Content</li>
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
						Manage Page Content
						</h4>				
					</div>
                    
					<div class="panel-body no-padding-bottom">
						<!--<form class="form-horizontal" action="form_basic.htm#">	-->						
						 <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
								echo form_open_multipart('',$attributes); ?>
                                
                             <?php
									if(isset($row))
									{  
										$is_under_menu = $row->is_under_menu;
										$maincat_id = $row->main_page_id;
										$subcat_id = $row->sub_page_id;
										$page_title = $row->page_title;
										$page_url_name = $row->page_url_name;
										$page_content = $row->page_content;
									 }
									 else
									 {
										$is_under_menu = ''; 
										$maincat_id = '';
										$subcat_id = '';
										$page_title = '';
										$page_url_name = '';
										$page_content = '';
									 }
									 
									 
									 
							?>                              
                            <input type="hidden" name="mode" value="page_content" />
                            
                            <div class="form-group">
								<label class="control-label col-lg-2">Is Under Menu</label>
								<div class="col-lg-10">
									
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="is_under_menu" class="styled" <?php if($action == 'Edit'){ if($is_under_menu==1) { ?>checked="checked"<?php } } ?>>
                                            Yes
                                        </label>
                
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="is_under_menu" class="styled"<?php if($action == 'Edit'){ if($is_under_menu==0) { ?>checked="checked"<?php } } ?>>
                                            No
                                        </label>	
									
								</div>
							</div>
                            
                            <div class="form-group" id="maincat">
								<label class="control-label col-lg-2">Main Category</label>
								<div class="col-lg-10">									
                                   <?php 
										$js = 'class="form-control" id=maincat_id';
										echo form_dropdown('maincat_id',$categories,$maincat_id,$js);
										echo form_error('maincat_id'); 
								  ?>
								</div>
							</div>
                             
                            <div class="form-group" id="subcat">
								<label class="control-label col-lg-2">Sub Category</label>
								<div class="col-lg-10">	
                                <div id="city_id"></div>	
                                </div>
							</div>                         
                             
							<div class="form-group" id="page_title">
								<label class="control-label col-lg-2">Page Title</label>
								<div class="col-lg-10">
									
                                    <input type="text" class="form-control" placeholder="Enter Page Title" name="page_title" value="<?php if($action == 'Edit'){echo $page_title;} else {echo set_value('page_title');} ?>">
                                     <?php echo form_error('page_title'); ?>
								</div>
							</div>
                            
                            <div class="form-group" id="page_url">
								<label class="control-label col-lg-2">Page Url Name</label>
								<div class="col-lg-10">
									
                                    <input type="text" class="form-control" placeholder="Enter Page Url Name" name="page_url_name" value="<?php if($action == 'Edit'){echo $page_url_name;} else {echo set_value('page_url_name');} ?>">
                                     <?php echo form_error('page_url_name'); ?>
								</div>
							</div>
                            
                            <div class="form-group" id="page_content">
								<label class="control-label col-lg-2">Page Content</label>
								<div class="col-lg-10">
									
                                    
                                    <textarea class="ckeditor" name="page_content" id="editor1" rows="4" cols="4">
                                    <?php if($action == 'Edit'){echo $page_content;} else {echo set_value('page_content');} ?>
                                    </textarea>
                                     <?php echo form_error('page_content'); ?>
								</div>
							</div>
                            
                            <div class="form-group">
								<label class="control-label col-lg-2"></label>
								<div class="col-lg-10">
									<button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> Page Content</button>
								</div>
							</div>
                            
                            							
						<?php echo form_close(); ?>					
					</div>
				</div>
			</div>
			
		</div>
</div>

<script src="<?php echo base_url();?>/assets/admin/js/jquery-1.11.2.min.js"></script>
<?php if($action == 'Edit'){ ?>
<script>
	$(document).ready(function(){
		currurl = window.location.href;
		newurl = currurl.split('edit')[0];
		stateID = <?php echo $state_id; ?>;
		ID = <?php echo $id; ?>;
		/*alert(stateID);*/
		$.ajax({
				type: "POST",
				url: newurl+"ajax_call",
				async: false,
				data: {state:stateID, action:'<?php echo $action; ?>', id:ID,sayantan:'ready'},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
                        $('#city_id').html(data);
				}
			})
		$("#maincat_id").on('change', function(){
		
			stateID = $(this).val();
			if(stateID == "")
			{
			$("#city_dropdown").hide();	
			}
			$.ajax({
				type: "POST",
				url: newurl+"ajax_call",
				async: false,
				data: {state:stateID, action:'<?php echo $action; ?>',sayantan:'change'},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
                        $('#city_id').html(data);
				}
			})
		});
	});
</script>
<?php }else if($action == 'Add'){ ?>
<script>
	$(document).ready(function(){
		
		stateID = $(this).val();
	
			/*if(stateID == "")
			{
			$("#city_dropdown").hide();	
			}*/
			$.ajax({
				type: "POST",
				url: "ajax_call",
				async: false,
				data: {state:stateID, action:'<?php echo $action; ?>'},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
                        $('#city_id').html(data);
				}
			})
    $("#maincat_id").on('change', function(){
			/*$("#city_dropdown").show();*/
			
			stateID = $(this).val();
			
			
			if(stateID == "")
			{
			$("#city_dropdown").hide();	
			}
			$.ajax({
				type: "POST",
				url: "ajax_call",
				async: false,
				data: {state:stateID, action:'<?php echo $action; ?>'},
				dataType: "html",
				success: function(data) {
                        //data is the html of the page where the request is made.
                        $('#city_id').html(data);
				}
			})
    });
});
</script>
<?php } ?>

<script>
$(document).ready(function() {
	
	styled1 = $('input[name=is_under_menu]:checked').val();
    	if(styled1==1)
		{
			$('#maincat').show();
			$('#subcat').show();
			$('#page_title').show();
			$('#page_url').show();
			$('#page_content').show();
			
		}
		else if(styled1==0)
		{
			$('#maincat').hide();
			$('#subcat').hide();
			$('#page_title').show();
			$('#page_url').show();
			$('#page_content').show();
		}
	
	$('.styled').change(function(){
		styled = $('input[name=is_under_menu]:checked').val();
		
    	if(styled==1)
		{
			$('#maincat').show();
			$('#subcat').show();
			$('#page_title').show();
			$('#page_url').show();
			$('#page_content').show();
			
		}
		else if(styled==0)
		{
			$('#maincat').hide();
			$('#subcat').hide();
			$('#page_title').show();
			$('#page_url').show();
			$('#page_content').show();
		}
	});

});
</script>

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


