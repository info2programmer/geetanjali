<div class="container-fluid"> 
  <!-- Main content starts -->
  <div > 
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Manage Password</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a> </li>
            <li class="breadcrumb-item">Change Password</li>
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
            <h5 class="card-header-text">Change Password</h5>
          </div>
          <div class="card-block">
            <form id="main" class="form-horizontal" action="<?php echo base_url();?>user/change_password" method="post" novalidate>
            <input type="hidden" name="mode" value="change_pass" />
            <div class="md-group-add-on p-relative"> <span class="md-add-on"> <i class="icofont icofont-ui-password"></i> </span>
                <div class="md-input-wrapper">
                  <input type="password" class="md-form-control"  name="old_password" id="password1">
                  <label for="password">Enter Old Password</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('old_password'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> <i class="icofont icofont-ui-password"></i> </span>
                <div class="md-input-wrapper">
                  <input type="password" class="md-form-control"  name="new_password" id="password">
                  <label for="password">Enter New Password</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('new_password'); ?></span> </div>
              </div>
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> <i class="icofont icofont-ui-password"></i> </span>
                <div class="md-input-wrapper">
                  <input type="password" class="md-form-control"  name="confirm_password" id="confirm-password" >
                  <label for="confirm-password">Enter Confirm password</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('confirm_password'); ?></span> </div>
              </div>              
              <div class="md-input-wrapper">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit </button>
              </div>
            </form>
          </div>
        </div>        
      </div>      
    </div>
  </div>
</div>
<!-- Container-fluid ends -->