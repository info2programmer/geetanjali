<!-- Page header -->

<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="fa fa-th-large position-left"></i> <?php echo $row->subject; ?></h4>
    </div>
    <span style="color:#00CC00;">
        <?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
    </span>
    <span style="color:#F00">
        <?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('success_message'); } ?>
    </span>
    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-home"></i>Dashboard</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/admin/manage_student_message">Manage Message</a></li>
      <li class="active"><?php echo $action; ?> Message</li>
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
          <?php if($rows) { 
		  $i=1;
		  ?>
          <?php foreach($rows as $msg) { ?>
            <div class="panel panel-white">
              <div class="panel-heading">
              
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion<?php echo $i; ?>" href="bootstrap_accordions.htm#accordion-group<?php echo $i; ?>">
                <?php
				$from_msg = $msg->from_msg;
				$user_details = $this->db->query("select * from td_users where id='$from_msg'")->row();
				$user_type = $user_details->user_type;
				if($user_type=='S') {
					echo $user_details->student_name;
				}
				else if($user_type=='C')
				{
				$college_name = $user_details->college_name;
				$college_details = $this->db->query("select * from td_colleges where id='$college_name'")->row(); 
				echo $college_details->college_name;	
				}
				?>
                </a> </h4>                
              </div>
              <div id="accordion-group<?php echo $i++; ?>" class="panel-collapse collapse in">
                <div class="panel-body"> <?php echo $msg->description; ?> <p style="float:right; margin-top:10px;">Date: <?php echo date_format(date_create($msg->date), "d-m-Y"); ?></p></div>
                
              </div>
            </div>             
         <?php } } else { ?>
         No messages available here
         <?php } ?>              
            
            <!--<div class="panel panel-white">
              <div class="panel-heading">
                <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="bootstrap_accordions.htm#accordion-group2">Accordion Item #2</a> </h4>
              </div>
              <div id="accordion-group2" class="panel-collapse collapse">
                <div class="panel-body"> Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. </div>
              </div>
            </div>
            <div class="panel panel-white">
              <div class="panel-heading">
                <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="bootstrap_accordions.htm#accordion-group3">Accordion Item #3</a> </h4>
              </div>
              <div id="accordion-group3" class="panel-collapse collapse">
                <div class="panel-body"> Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </div>
              </div>
            </div>-->
          </div>
          <?php
		  $user_detail = $this->db->query("select * from td_users where id='$clg_id'")->row();
		  //echo '<pre>';print_r($user_detail);die;
		  ?>
          <form action="<?php echo base_url();?>admin/manage_message/view/<?php echo $row->message_id; ?>" method="post">
          		<input type="hidden" name="mode" value="message" />
                <input type="hidden" name="college_id" value="<?php echo $row->college_id; ?>">
                <input type="hidden" name="message_id" value="<?php echo $row->message_id; ?>">
                <input type="hidden" name="subject" value="<?php echo $row->subject; ?>"> 
                <input type="hidden" name="from_msg" value="<?php echo $user_detail->id; ?>">
                <input type="hidden" name="to_msg" value="<?php echo $row->college_id; ?>">
                <textarea name="txt_desc" placeholder="Reply" class="form-control"></textarea>
                <button type="submit" class="btn btn-danger btn-rounded">Send</button>
            </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
  <!-- Content area --> 
  <!-- Footer -->
  <div class="footer pt-20"> <?php echo $footer; ?> </div>
  <!-- /footer --> 
  
</div>
<!-- /content area -->