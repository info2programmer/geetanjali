<header class="head">
  <div class="main-bar row">
    <div class="col-sm-5 col-lg-6">
      <h4 class="nav_top_align"> <i class="fa fa-pencil"></i> <?php echo $action; ?> Session </h4>
    </div>
    <div class="col-sm-7 col-lg-6">
      <ol  class="breadcrumb float-xs-right nav_breadcrumb_top_align">
        <li class="breadcrumb-item"> 
        <a href="<?php echo base_url(); ?>index.php/admin/user"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard </a>
        </li>
        <li class="breadcrumb-item"> 
        <a href="<?php echo base_url(); ?>index.php/admin/manage_session"> <i class="fa fa-home" data-pack="default" data-tags=""></i> Manage Session </a>
        </li>
        <li class="active breadcrumb-item"><?php echo $action; ?> Session</li>
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
				$year = $row->year;
				$ses_year = $row->ses_year;
			}
			else
			{
				$year = '';
				$ses_year = '';
			}
			?>
            	<input type="hidden" name="mode" value="tab" />              
              <div class="form-group row">
                  <div class="col-xl-4 text-xl-right">
                       <label for="sport" class="form-control-label">Select Year*</label>
                  </div>
                  <div class="col-xl-4">
                      <select name="year" id="year" class="form-control select2" required>
                             <option value="" selected="selected" hidden>Select Year</option>
                             <?php for($i=2000;$i<=2050;$i++) { ?>
                             <option value="<?php echo $i; ?>" <?php if($action == 'Edit') { if($year==$i) { ?>selected="selected"<?php } } ?>><?php echo $i; ?></option>
                             <?php } ?>
                      </select>
                      <span style="color:#F00"><?php echo form_error('year'); ?></span>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-4 text-lg-right">
                  <label for="password2" class="form-control-label">Session Year *</label>
                </div>
                <div class="col-lg-4">
                  <select name="ses_year" id="ses_year" class="form-control select2" required>
                             <option value="" selected="selected" hidden>Select Session Year</option>
                             <?php for($j=2000;$j<=2050;$j++) { ?>
                             <option value="<?php echo $j."-".(substr(($j),-2)+1); ?>" <?php if($action == 'Edit') { if($ses_year==$j) { ?>selected="selected"<?php } } ?>><?php echo $j."-".(substr(($j),-2)+1); ?></option>
                             <?php } ?>
                 </select>
                 <span style="color:#F00"><?php echo form_error('ses_year'); ?></span>
                </div>
              </div>
              <div class="form-actions form-group row">
                <div class="col-lg-4 push-lg-4">
                  <input type="submit" value="<?php echo $action; ?> Session" class="btn btn-primary">
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
