<header class="head">
  <div class="main-bar row">
    <div class="col-sm-5 col-lg-6">
      <h4 class="nav_top_align"> <i class="fa fa-pencil"></i> <?php echo $action; ?> Stream </h4>
    </div>
    <div class="col-sm-7 col-lg-6">
      <ol  class="breadcrumb float-xs-right nav_breadcrumb_top_align">
        <li class="breadcrumb-item"> 
        <a href="<?php echo base_url(); ?>index.php/admin/user"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard </a>
        </li>
        <li class="breadcrumb-item"> 
        <a href="<?php echo base_url(); ?>index.php/admin/manage_stream"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Manage Stream </a>
        </li>
        <li class="active breadcrumb-item"><?php echo $action; ?> Stream</li>
      </ol>
    </div>
  </div>
</header>
<div class="outer">
  <div class="inner bg-container">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header bg-white"> <!--<i class="fa fa-file-text-o"></i>--> 
          	<?php if($this->session->flashdata('error_message')) { ?>
                  <h5 style="color:red;"><?php echo $this->session->flashdata('error_message'); ?></h5>
            <?php } ?>
            <?php if($this->session->flashdata('success_message')) { ?>
                  <h5 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h5>
            <?php } ?>            
          </div>
          <div class="card-block m-t-35">
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform');echo form_open('',$attributes); ?>
            <?php
			if(isset($row))
			{  
				$name = $row->name;
				$type = $row->type;
				$stream_name = $row->stream_name;
				$stream_number = $row->stream_number;
				$stream_code = $row->stream_code;
			}
			else
			{
				$name = '';
				$type = '';
				$stream_name = '';
				$stream_number = '';
				$stream_code = '';
			}
			?>
            	<input type="hidden" name="mode" value="tab" />
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="password2" class="form-control-label">Name *</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="required2" name="name" class="form-control" value="<?php if($action == 'Edit'){echo $name;} else {echo set_value('name');} ?>" required>
                  <span style="color:#F00"><?php echo form_error('name'); ?></span>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="password2" class="form-control-label">Type *</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="required2" name="type" class="form-control" value="<?php if($action == 'Edit'){echo $type;} else {echo set_value('type');} ?>" required>
                  <span style="color:#F00"><?php echo form_error('type'); ?></span>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="confirm_password2" class="form-control-label">Stream Name *</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="required2" name="stream_name" class="form-control" value="<?php if($action == 'Edit'){echo $stream_name;} else {echo set_value('stream_name');} ?>" required>
                  <span style="color:#F00"><?php echo form_error('stream_name'); ?></span>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="confirm_password2" class="form-control-label">Stream Number *</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="required2" name="stream_number" class="form-control" value="<?php if($action == 'Edit'){echo $stream_number;} else {echo set_value('stream_number');} ?>" required>
                  <span style="color:#F00"><?php echo form_error('stream_number'); ?></span>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="confirm_password2" class="form-control-label">Stream Code *</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="required2" name="stream_code" class="form-control" value="<?php if($action == 'Edit'){echo $stream_code;} else {echo set_value('stream_code');} ?>" required>
                  <span style="color:#F00"><?php echo form_error('stream_code'); ?></span>
                </div>
              </div>
              <div class="form-actions form-group row">
                <div class="col-lg-4 push-lg-4">
                  <input type="submit" value="<?php echo $action; ?> Stream" class="btn btn-primary">
                </div>
              </div>
            <?php echo form_close(); ?>	
          </div>
        </div>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <!-- /.row --> 
  </div>
  <!-- /.inner --> 
</div>
