<section class="sidebar" id="sidebar-scroll">
  <div class="user-panel">
    <div class="f-left image"><img src="<?php echo base_url();?>material/assets/images/avatar-1.png" alt="User Image" class="img-circle"></div>
    <div class="f-left info">
      <p class="designation"><?php echo $this->session->userdata('username');?> <i class="icofont icofont-caret-down m-l-5"></i></p>
      <!--<p>UX Designer </p>-->
    </div>
  </div>
  <!-- sidebar profile Menu-->
  <ul class="nav sidebar-menu extra-profile-list">
    <li> <a class="waves-effect waves-dark" href="<?php echo base_url();?>site_setting"> <i class="icon-user"></i> <span class="menu-text">View Profile</span> <span class="selected"></span> </a> </li>
    <li> <a class="waves-effect waves-dark" href="<?php echo base_url();?>user/change_password"> <i class="icon-settings"></i> <span class="menu-text">Change Password</span> <span class="selected"></span> </a> </li>
    <li> <a class="waves-effect waves-dark" href="<?php echo base_url();?>user/logout"> <i class="icon-logout"></i> <span class="menu-text">Logout</span> <span class="selected"></span> </a> </li>
  </ul>
  <!-- Sidebar Menu-->
  <ul class="sidebar-menu">
  <li class="active treeview"> <a class="waves-effect waves-dark" href="<?php echo base_url();?>user/"> <i class="icon-speedometer"></i><span> Dashboard</span></a></li>

      <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-film"></i> <span> Settings</span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Company"><i class="icon-arrow-right"></i> Company Details</a></li> -->
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Bank"><i class="icon-arrow-right"></i> Bank Details</a></li> -->
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/incentiveSettings"><i class="icon-arrow-right"></i> Incentives Details</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Route"><i class="icon-arrow-right"></i> Route Details</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/AssignedRoute"><i class="icon-arrow-right"></i> Route Assign</a></li> -->
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Client"><i class="icon-arrow-right"></i> Client Details</a></li> -->
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Project"><i class="icon-arrow-right"></i> Project Management</a></li>
        <li class="<?php if($this->uri->segment(2)=='WeightUnit') { ?>active <?php } ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/WeightUnit"><i class="icon-arrow-right"></i> Unit Management</a></li>
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Item"><i class="icon-arrow-right"></i> Item Management</a></li> -->
      </ul>
    </li>

   
    <li class="nav-level">Purchase Management</li>
    
    <!--<li><a href="widget.html"><i class="icon-grid"></i><span> Widget</span><span class="label label-warning menu-caption">100+</span></a> </li>-->

     <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-film"></i> <span> Inventory Management</span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
      <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>inventory/StockDetails"><i class="icon-arrow-right"></i> Stock Details</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Store"><i class="icon-arrow-right"></i> Manage Store</a></li> -->
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Supplier"><i class="icon-arrow-right"></i> Supplier Details</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Purchase"><i class="icon-arrow-right"></i>Purchase Records</a></li>
      <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/StoreAllocation"><i class="icon-arrow-right"></i> Store Allocation</a></li> -->
      <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>inventory/PurchaseReturn"><i class="icon-arrow-right"></i> Purchase Return</a></li> -->
      
      <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Sales"><i class="icon-arrow-right"></i> Sale Managemt</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>inventory/SaleReturn"><i class="icon-arrow-right"></i> Sale Return</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>inventory/PreturnDetails"><i class="icon-arrow-right"></i> All Return Details</a></li> -->
        
      </ul>
    </li>
    <li class="nav-level">Labour Management</li>
    <li class="treeview"><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Employee"> <i class="icon-film"></i><span>Labour </span> <i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Employee"><i class="icon-arrow-right"></i> Labour Details</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>add/EmployeeWage"><i class="icon-arrow-right"></i> Daily Wages Bill</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/WageReport"><i class="icon-arrow-right"></i> Daily Wages Report</a></li>
      </ul>
    </li>
    <li class="nav-level">Deduction</li>
    <li class="treeview"><a class="waves-effect waves-dark" href="<?php echo base_url() ?>view/Deduction"><i class="icon-film"></i> <span> Deduction History</span></a>
      <!-- <ul class="treeview-menu">
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>view/Expenses"><i class="icon-arrow-right"></i> Manage Expenses</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>expense/ExpenseReport"><i class="icon-arrow-right"></i>Expense Report</a></li>
        
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>Reports/RoiDetails"><i class="icon-arrow-right"></i> ROI Report</a></li>
      </ul> -->
    </li>
  
        
    <!-- <li class="nav-level">Accounting</li>
     <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-film"></i> <span> Account Management</span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/purchasePayment"><i class="icon-arrow-right"></i> Purchase Payments</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/salePayment"><i class="icon-arrow-right"></i> Sales Payment collection</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/incentiveDetails"><i class="icon-arrow-right"></i> Employee Incentives Details</a></li>
      <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/cashbook"><i class="icon-arrow-right"></i> Cash Book</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/ledger"><i class="icon-arrow-right"></i>Ledger</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/ProfitLoss"><i class="icon-arrow-right"></i> Profit-Loss Report</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>account/BalanceSheet"><i class="icon-arrow-right"></i>Balance Sheet</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>accounts/dailycollection"><i class="icon-arrow-right"></i>Daily Collection Sheet</a></li>
      </ul>
    </li> -->
  
    <!-- <li class="nav-level">Reports</li> -->
    <!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-film"></i> <span> Sales Reports</span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu"> -->
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/SaleReport"><i class="icon-arrow-right"></i>Sale Report / Day</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/PersonSaleReport"><i class="icon-arrow-right"></i>Sale Report / Person</a></li>
        
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/RouteSaleReport"><i class="icon-arrow-right"></i>Sale Report / Route</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/DailyCollectionSheet"><i class="icon-arrow-right"></i>Daily Collection Sheet</a></li> -->
        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/GST_report"><i class="icon-arrow-right"></i>GST Report</a></li> -->
      <!-- </ul>
    </li>
    <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-film"></i> <span> Purchase Reports</span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
      
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/PurchaseReport"><i class="icon-arrow-right"></i>Purchase Report / Day</a></li>
        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/SupplierPurchaseReport"><i class="icon-arrow-right"></i>Purchase Report / Supplier</a></li> -->
        
        <!--<li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/ItemStockReport"><i class="icon-arrow-right"></i>Stock Report / Item</a></li>-->
      <!-- </ul>
    </li>
    <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>reports/ChartReport"><i class="icon-arrow-right"></i>Chart Report</a></li> -->
   <!-- <li class="nav-level">Notifications</li>
   <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>settings/RouteDetails"><i class="icon-arrow-right"></i>Notification Details</a></li>-->
       
    
   
    
    
  </ul>
</section>
