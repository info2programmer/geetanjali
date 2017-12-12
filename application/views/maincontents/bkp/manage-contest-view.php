<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> <?php echo $row1->contest_name; ?></h4>
    </div>
    <span style="color:#009900;">
        <?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
    </span>
    <span style="color:#F00">
        <?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('success_message'); } ?>
    </span>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/admin/manage_contest">Manage Contest</a></li>
      <li class="active"><?php echo $action; ?> Contest</li>
    </ul>
  </div>
</div>

<!-- /page header --> 

<!-- Content area -->
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <!--<h4>Basic accordion</h4>-->
          <div class="panel-group" id="accordion1">
          <?php 
		  if($rows) {
		  $i=1; 
		  foreach($rows as $row) { 	
		  	$user_id = $row->user_id; 
			$user_details = $this->db->query("select * from td_users where id='$user_id'")->row();	  
		  ?>           
            <div class="panel panel-white">
              <div class="panel-heading">
                <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="bootstrap_accordions.htm#accordion-group<?php echo $i; ?>">
                <?php if($user_details->user_type=='C') { ?>
                <img src="<?php echo base_url(); ?>uploads/college/<?php echo $user_details->logo_image; ?>" style="width:30px; max-height:30px;"/>
                <?php } else if($user_details->user_type=='S') {  ?>
                <img src="<?php echo base_url(); ?>uploads/student/<?php echo $user_details->logo_image; ?>" style="width:30px; max-height:30px;"/>
                <?php } else if($user_details->user_type=='P') {  ?>
                <img src="<?php echo base_url(); ?>uploads/pg/<?php echo $user_details->logo_image; ?>" style="width:30px; max-height:30px;"/>
                <?php } ?>
                
                <strong><?php 
				if($user_details->user_type!='C')
				{ echo $user_details->student_name; }
				else
				{ 	$clg_id = $user_details->college_name; 
					$college_details = $this->db->query("select * from td_colleges where id='$clg_id'")->row(); 
					echo $college_details->college_name;
				} 
				?></strong>
                </a>
                <?php if($row->is_awarded==0) { ?> 
                <a onclick="return confirm('Are you want to award to this participants ?'); " href="<?php echo base_url(); ?>admin/manage_contest/award/<?php echo $row->contest_bid_id; ?>" class="pull-right" style="  padding: 2px 8px; background: #ec2017; border-radius: 50%; color:#fff;"><i class="fa fa-trophy"></i></a>
                <?php } else if(($row->is_awarded==1)&&($row->award_user_id==$row->user_id)) { ?>
                <span class="label label-primary label-rounded pull-right">Awarded</span>
                <?php } ?>
                </h4>
              </div>
              <div id="accordion-group<?php echo $i; ?>" class="panel-collapse collapse">
                <div class="panel-body"> 
					<?php echo $row->bid_description; ?> 
                	<p class="kbtn"><a target="_blank" href="<?php echo base_url(); ?>uploads/contest/<?php echo $row->bid_attachment; ?>"><?php echo $row->bid_attachment; ?></a></p>
                </div>
              </div>
            </div>
            <?php $i++; } } else { ?>
            <span class="label label-danger">No participants found.</span>
            <?php } ?>
            
            <!--<div class="panel panel-white">
              <div class="panel-heading">
                <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="bootstrap_accordions.htm#accordion-group3">Accordion Item #3</a> </h4>
              </div>
              <div id="accordion-group3" class="panel-collapse collapse">
                <div class="panel-body"> Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </div>
              </div>
            </div>-->
          </div>          
        </div>
        
      </div>
      
    </div>
  </div>
  
  <!-- Content area --> 
  <!-- Footer -->
  <div class="footer pt-20"> <?php echo $footer; ?> </div>
  <!-- /footer --> 
  <style>
  .kbtn
  {
  margin-top:15px;

  }
  .kbtn a
{
	background:#009966;
	padding:2px 5px;
	color:#fff;
	text-decoration:none;
}

  </style>
</div>
<!-- /content area -->