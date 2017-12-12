<?php
$slNotify = $this->db->query('SELECT * FROM td_sales_payment WHERE next_pay_date="'.date('Y-m-d').'" AND notify=1')->result_array();
$ncnt = $this->db->query('SELECT * FROM td_sales_payment WHERE next_pay_date="'.date('Y-m-d').'" AND notify=1')->num_rows();
$plNotify = $this->db->query('SELECT * FROM td_purchase_payment WHERE next_pay_date="'.date('Y-m-d').'" AND notify=1')->result_array();
$pncnt = $this->db->query('SELECT * FROM td_purchase_payment WHERE next_pay_date="'.date('Y-m-d').'" AND notify=1')->num_rows();
?>
<a href="index.html" class="logo"><span style="font-weight: 800;font-size: 20px;font-family:Arial, Helvetica, sans-serif;">GEETANJALI</span><!--<img class="img-fluid able-logo" src="<?php echo base_url();?>material/assets/images/logo.png" alt="Theme-logo">--></a>
<nav class="navbar navbar-static-top"> 
  <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a> 
  <!-- Navbar Right Menu-->
  <div class="navbar-custom-menu">
    <ul class="top-nav">
      <!--Notification Menu-->
      
      
      <li class="dropdown notification-menu"> <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle"> <i class="icon-bell"></i> <span class="badge badge-danger header-badge"><?php echo $ncnt+$pncnt;?></span> </a>
        <ul class="dropdown-menu">
          <li class="not-head">You have <b class="text-primary"><?php echo $ncnt+$pncnt;?></b> new notifications.</li>
          <?php foreach($slNotify as $notme){ ?>
          
          <li class="bell-notification"> 
          <form action="<?php echo base_url();?>accounts/SalepaymentCollection" method="post" enctype="multipart/form-data">
          <input type="hidden" name="b_no" value="<?php echo $notme['bill_no'];?>" />
          <a href="javascript:;" class="media" onclick="$(this).parent().submit();"> 
            <div class="media-body"><span class="block"><?php echo $notme['particular'];?></span><span class="text-muted block-time"><?php echo $notme['pay_date'];?></span></div>
            </a> 
             </form>
            </li>
           
            <?php } ?>
            <?php foreach($plNotify as $pnotme){ ?>
          
          <li class="bell-notification"> 
          <form action="<?php echo base_url();?>accounts/PurchasepaymentCollection" method="post" enctype="multipart/form-data">
          <input type="hidden" name="b_no" value="<?php echo $pnotme['bill_no'];?>" />
          <a href="javascript:;" class="media" onclick="$(this).parent().submit();"> 
            <div class="media-body"><span class="block"><?php echo $pnotme['particular'];?></span><span class="text-muted block-time"><?php echo $pnotme['pay_date'];?></span></div>
            </a> 
             </form>
            </li>
           
            <?php } ?>
         
          <li class="not-footer"> <a href="#!">See all notifications.</a> </li>
        </ul>
      </li>
      
      <!-- User Menu-->
      <li class="dropdown"> <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image"> <span><img class="img-circle " src="<?php echo base_url();?>material/assets/images/avatar-1.png" style="width:40px;" alt="User Image"></span> <span><?php echo $this->session->userdata('username');?> <i class=" icofont icofont-simple-down"></i></span> </a>
        <ul class="dropdown-menu settings-menu">
          <li><a href="<?php echo base_url();?>user/change_password"><i class="icon-settings"></i> Change Password</a></li>
          <li><a href="<?php echo base_url();?>site_setting"><i class="icon-user"></i> Profile</a></li>
          <!--<li><a href="message.html"><i class="icon-envelope-open"></i> My Messages</a></li>-->
          <li class="p-0">
            <div class="dropdown-divider m-0"></div>
          </li>
          <!--<li><a href="lock-screen.html"><i class="icon-lock"></i> Lock Screen</a></li>-->
          <li><a href="<?php echo base_url();?>user/logout"><i class="icon-logout"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
