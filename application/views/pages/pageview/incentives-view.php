<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Incentives Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>Accounts/incentiveDetails">Incentives Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Employee Name</th>
                <th>Bill No</th>
                <th>Item Name</th>
                <th>Incentive Amount</th>
                <th>Status</th>
              </tr>
              </thead>
              
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			
			$emp = $this->db->query('SELECT * FROM td_employee WHERE emp_id='.$row['emp_id'])->result_array();
			$billdtl = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_id='.$row['bill_no'])->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $emp[0]['name']; ?></td>
                <td><?php echo $billdtl[0]['p_bill_no']; ?></td>
                <td><?php echo $row['item_name']; ?></td> 
                <td>Rs. <?php echo $row['incentive_item_total']; ?></td>
                <td><?php if($row['status']==1)echo 'PAID'; else echo 'NOT PAID'; ?></td>               
                
              </tr>
            <?php } } else { ?>
            	<tr>
                	<td colspan="5" style="text-align:center">No records found</td>
                </tr>
            <?php } ?>  
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>