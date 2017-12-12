<div class="container-fluid"> 
  <!-- Main content starts -->
  <div > 
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Manage Profile Setting</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a> </li>
            <li class="breadcrumb-item">Profile Setting</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end --> 
    <!-- Row start -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text">Profile Setting</h5>
          </div>
          <div class="card-block">
          <?php if($this->session->userdata('success_message')) { ?>
          <span style="color:#090;"><?php echo $this->session->userdata('success_message');?></span>
          <?php } ?>
            <form id="main" class="form-horizontal" action="<?php echo base_url();?>site_setting/index" method="post" novalidate>
            
            <?php
				if($row) {
					$site_name = $row->site_name;
					$site_email_address = $row->site_email_address;
					$site_address = $row->site_address;
					$site_phone = $row->site_phone;
					$site_meta = $row->site_meta;
					$site_desc = $row->site_desc;
					$site_fblink = $row->site_fblink;
					$site_twtlink = $row->site_twtlink;
					$google_plus_link = $row->google_plus_link;
					$instragram_link = $row->instragram_link;
				}
				else {
					$site_name = '';
					$site_email_address = '';
					$site_address = '';
					$site_phone = '';
					$site_meta = '';
					$site_desc = '';
					$site_fblink = '';
					$site_twtlink = '';
					$google_plus_link = '';
					$instragram_link = '';	
				}
			?>
            <input type="hidden" name="mode" value="site_setting" />
            <div class="md-group-add-on p-relative"> <span class="md-add-on"> <!--<i class="icofont icofont-ui-password"></i>--> </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($site_name!='') {?> md-valid<?php } ?>"  name="site_name" id="password" value="<?php echo $site_name; ?>">
                  <label for="password">Enter Site Name</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_name'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="email" class="md-form-control<?php if($site_email_address!='') {?> md-valid<?php } ?>"  name="site_email_address" id="password" value="<?php echo $site_email_address; ?>">
                  <label for="password">Enter Site Email Address</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_email_address'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($site_phone!='') {?> md-valid<?php } ?>"  name="site_phone" id="confirm-password" value="<?php echo $site_phone; ?>" >
                  <label for="confirm-password">Enter Site Phone</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_phone'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <textarea class="md-form-control<?php if($site_address!='') {?> md-valid<?php } ?>" name="site_address"><?php echo $site_phone; ?></textarea>
                  <label for="confirm-password">Enter Site Address</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_address'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($site_meta!='') {?> md-valid<?php } ?>"  name="site_meta" id="confirm-password" value="<?php echo $site_meta; ?>" >
                  <label for="confirm-password">Enter Site Meta Tag</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_meta'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <!--<input type="text" class="md-form-control<?php if($site_name!='') {?> md-valid<?php } ?>"  name="site_desc" id="confirm-password">-->
                  <textarea class="md-form-control<?php if($site_name!='') {?> md-valid<?php } ?>" name="site_address"><?php echo $site_desc; ?></textarea>
                  <label for="confirm-password">Enter Site Meta Description</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_desc'); ?></span> </div>
              </div>              
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($site_fblink!='') {?> md-valid<?php } ?>"  name="site_fblink" id="confirm-password" value="<?php echo $site_fblink; ?>" >
                  <label for="confirm-password">Enter Site Facebook Link</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_fblink'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($site_twtlink!='') {?> md-valid<?php } ?>"  name="site_twtlink" id="confirm-password" value="<?php echo $site_twtlink; ?>" >
                  <label for="confirm-password">Enter Site Twitter Link</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('site_twtlink'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($google_plus_link!='') {?> md-valid<?php } ?>"  name="google_plus_link" id="confirm-password" value="<?php echo $google_plus_link; ?>" >
                  <label for="confirm-password">Enter Site Google Plus Link</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('google_plus_link'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on">  </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($instragram_link!='') {?> md-valid<?php } ?>"  name="instragram_link" id="confirm-password" value="<?php echo $instragram_link; ?>" >
                  <label for="confirm-password">Enter Site Instragram Link</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('instragram_link'); ?></span> </div>
              </div>
                            
              <div class="md-input-wrapper">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $action; ?> Profile Setting </button>
              </div>
            </form>
          </div>
        </div>        
      </div>      
    </div>
  </div>
</div>
<!-- Container-fluid ends -->