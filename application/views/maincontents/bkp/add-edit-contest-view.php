<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> Manage Contets</h4>
    </div>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/admin/manage_contest">Manage Contets</a></li>
      <li class="active"><?php echo $action; ?> Contets</li>
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
          <h4 class="panel-title">Manage Contets</h4>
        </div>
        <div class="panel-body">
            <h5 class="no-margin-top">Contest Attachment</h5>
            <br />            
            <form action="<?php echo base_url(); ?>index.php/admin/manage_contest/multiple_image" class="dropzone" id="dropzone_remove" enctype="multipart/form-data"></form>
        </div>
        <div class="panel-body no-padding-bottom">
          <!--<form class="form-horizontal" action="form_basic.htm#">	-->
          <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart('',$attributes); ?>
          <?php
									if(isset($row))
									{  
										$contest_name = $row->contest_name;
										$contest_detail = $row->contest_detail;
										$prize_money = $row->prize_money;
										$create_date = $row->create_date;
										$expiry_date = $row->expiry_date;
										$rate_per_bid = $row->rate_per_bid;	
										$gallery_image = $row->gallery_image;
										$contest_id = $row->contest_details_id;									
									 }
									 else
									 {	
										$contest_name = '';
										$contest_detail = '';
										$prize_money = '';
										$create_date = '';
										$expiry_date = '';
										$rate_per_bid = '';	
										$gallery_image = '';	
										$contest_id = '';
									 }
							?>
          <input type="hidden" name="mode" value="contest" />
          <input type="text" id="file_names" name="file_names" class="form-control" value="<?php if($action == 'Edit'){echo $gallery_image;} ?>"/>
          <div class="form-group">
            <label class="control-label col-lg-2">Contest Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" placeholder="Enter Contest Name" name="contest_name" value="<?php if($action == 'Edit'){echo $contest_name;} else {echo set_value('contest_name');} ?>">
              <?php echo form_error('contest_name'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2">Contest Details</label>
            <div class="col-lg-10">
              <textarea name="contest_detail" class="ckeditor" id="editor1" rows="4" cols="4">
              	<?php if($action == 'Edit'){echo $contest_detail;} else {echo set_value('contest_detail');} ?>
              </textarea>
              <?php echo form_error('contest_detail'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2">Contest Prize Money</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" placeholder="Enter Contest Prize Money" name="prize_money" value="<?php if($action == 'Edit'){echo $prize_money;} else {echo set_value('prize_money');} ?>">
              <?php echo form_error('prize_money'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2">Contest Expiry Date</label>
            <div class="col-lg-10">
              	<div class="input-group"> <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control pickadate-selectors" placeholder="Select Contest Expiry Date" name="expiry_date" value="<?php if($action == 'Edit'){echo $expiry_date;} else {echo set_value('expiry_date');} ?>">
              <?php echo form_error('expiry_date'); ?> </div>
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2">Contest Rate Per Bid</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" placeholder="Enter Contest Rate Per Bid" name="rate_per_bid" value="<?php if($action == 'Edit'){echo $rate_per_bid;} else {echo set_value('rate_per_bid');} ?>">
              <?php echo form_error('rate_per_bid'); ?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2">Contest Image</label>
            <div class="col-lg-10">
              <?php if($action == 'Edit') { ?>
              <img src="<?php echo base_url();?>uploads/contest/<?php echo $row->contest_image; ?>" height="100" width="100"/>
              <?php } ?>
              <?php if($this->session->flashdata('err_message')) { echo $this->session->flashdata('err_message'); } ?>
              <input name="slider_image" type="file" class="file-input-custom" data-show-caption="true" data-show-upload="true" accept="im/*">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2"></label>
            <div class="col-lg-10">
              <button type="submit" class="btn btn-danger btn-rounded"><?php echo $action; ?> Contest</button>
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
<script type='text/javascript'>
	$(document).ready(function() {
		$(function() {
			// Defaults
			Dropzone.autoDiscover = false;
			var fileList = new Array;
            var filenum =0;			

			// Removable thumbnails
			$("#dropzone_remove").dropzone({
				paramName: "attachment[]",
				dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
				maxFilesize: 10, // MB
				maxFiles: 10,
				addRemoveLinks: true,
				acceptedFiles: ".jpg, .jpeg, .gif, .png, .JPG, .JPEG, .GIF, .PNG, .doc, .xls, .pdf",
				autoProcessQueue: true,
				init: function() {
					<?php
					if($action == 'Edit'){
						$mul_imgs = explode(',', $gallery_image);
						foreach($mul_imgs as $mul_img) {
							echo "mockFile = { name: '$mul_img', size: 123 };";
							echo "this.options.addedfile.call(this, mockFile);";
							echo "this.options.thumbnail.call(this, mockFile, '".base_url()."uploads/contest/$mul_img');";
							echo 'fileList[filenum] = {"serverFileName" : "'.$mul_img.'", "fileName" : "'.$mul_img.'","fileId" : filenum };';
							echo 'console.log(fileList);';
							echo 'filenum++;';
						}
					} 
					?>
					this.on('success', function(file,json){
						fileList[filenum] = {"serverFileName" : json.name, "fileName" : file.name,"fileId" : filenum };
                        console.log(fileList);
                        filenum++;
						if($("#file_names").val()){
							$("#file_names").val($("#file_names").val()+","+json.name);
						}else{
							$("#file_names").val($("#file_names").val()+json.name);}
						});
					//this.on("thumbnail", function(file) {
//						if (file.width <= 100 || file.height <= 100) {
//						  	file.rejectDimensions()
//                		} else {
//                  			file.acceptDimensions();
//                		}
//              		});
				},
				//accept: function(file, done) {
//              		file.acceptDimensions = done;
//              		file.rejectDimensions = function() { done("Invalid image size."); };
//            	},
				removedfile: function(file) {
					var rmvFile = "";
					for(f=0;f<fileList.length;f++){
						if(fileList[f].fileName == file.name)
						{
							rmvFile = fileList[f].serverFileName;
						}
					}
					if (rmvFile){
						$.ajax({
							url: "<?php echo base_url(); ?>index.php/admin/manage_contest/remove_thumnail",
							type: "POST",
							data: {filename:rmvFile, id:"<?php echo $contest_id; ?>"},
							dataType: 'html'
						});
					}
					var strn = $("#file_names").val().replace(rmvFile,"");
					strn = strn.replace(",,",",");
					strn = strn.replace(/^\,?|\,?$/g, "");
					$("#file_names").val(strn);
					var _ref;
					return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
					console.log(fileList);
              	}
			});	
			$('.select').select2({
				minimumResultsForSearch: Infinity
			});
		});
	});


</script>
<script type='text/javascript'>
	$(document).ready(function() {	
		$(function() {
			// Dropdown selectors
			$('.pickadate-selectors').pickadate({
				selectYears: true,
				selectMonths: true,
				dateFormat:"yy-mm-dd",
				appendText:"(yy-mm-dd)"
			});
		});
	});

</script>
