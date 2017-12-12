<header class="head">
  <div class="main-bar row">
    <div class="col-sm-5 col-lg-6">
      <h4 class="nav_top_align"> <i class="fa fa-pencil"></i> <?php echo $action; ?> Fee Structure </h4>
    </div>
    <div class="col-sm-7 col-lg-6">
      <ol  class="breadcrumb float-xs-right nav_breadcrumb_top_align">
        <li class="breadcrumb-item"> 
        <a href="<?php echo base_url(); ?>index.php/admin/user"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard </a>
        </li>
        <li class="breadcrumb-item"> 
        <a href="<?php echo base_url(); ?>index.php/admin/manage_fee_structure"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Manage Fee Structure </a>
        </li>
        <li class="active breadcrumb-item"><?php echo $action; ?> Fee Structure</li>
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
				$stream = $row->stream;
				$year = $row->year;
				$subfund_id = $row->subfund_id;
				$amount = $row->amount;				
			}
			else
			{
				$stream = $this->input->post('stream');
				$year = $this->input->post('year');
				$subfund_id = $this->input->post('subfund_id');
				$amount = '';
			}
			?>
              <input type="hidden" name="mode" value="tab" />
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="stream" class="form-control-label">Stream *</label>
                </div>
                <div class="col-lg-4">
                  <?php 
					$js = 'class="form-control select2" id="stream" required';
					echo form_dropdown('stream',$streams,$stream,$js);
				  ?>
                  <span style="color:#F00"><?php echo form_error('stream'); ?></span>
                </div>
              </div>
              <!--<div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="year" class="form-control-label">Year *</label>
                </div>
                <div class="col-lg-4">
                  <select class="form-control select2" id="year" name="year" required>
                  		<option selected="selected" hidden>Choose Year</option>
                        <option value="1st" <?php if($year=='1st') { ?>selected="selected"<?php }?>>1st</option>
                        <option value="2nd" <?php if($year=='2nd') { ?>selected="selected"<?php }?>>2nd</option>
                        <option value="3rd" <?php if($year=='3rd') { ?>selected="selected"<?php }?>>3rd</option>
                  </select>
                  <span style="color:#F00"><?php echo form_error('year'); ?></span>
                </div>
              </div>-->
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="subfund_id" class="form-control-label">Subfund *</label>
                </div>
                <div class="col-lg-4">
                  <?php 
					$js = 'class="form-control select2" id="subfund_id" required';
					echo form_dropdown('subfund_id',$subfunds,$subfund_id,$js);
				  ?>
                  <span style="color:#F00"><?php echo form_error('subfund_id'); ?></span>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="amount" class="form-control-label">Amount *</label>
                </div>
                <div class="col-lg-4">
                  <input type="text" id="digits" name="amount" class="form-control" value="<?php if($action == 'Edit'){echo $amount;} else {echo set_value('amount');} ?>" required>
                  <span style="color:#F00"><?php echo form_error('amount'); ?></span>
                </div>
              </div>
              <div class="form-actions form-group row">
                <div class="col-lg-4 push-lg-4">
                  <input type="submit" value="<?php echo $action; ?> Fee Structure" class="btn btn-primary">
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
