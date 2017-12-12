<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Employee Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Employee">Employee Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
        	<span style="color:#0C0;">
            <?php if($this->session->flashdata('succ_msg')) { echo $this->session->flashdata('succ_msg'); } ?>
            </span>
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>settings/EmployeeDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add Employee Details</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Image</th>
                <th>Type</th>
                <th>Employee Details</th>
                <th>Salary</th>
                <th>Sale Price</th>
                 <th>Incentives</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Image</th>
                <th>Type</th>
                <th>Employee Details</th>
                <th>Salary</th>
                <th>Sale Price</th>
                <th>Incentives</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$emp_gensalcnt = $this->db->query('SELECT * FROM salary_detail WHERE emp_id='.$row['emp_id'].' ORDER BY salary_id DESC LIMIT 1')->num_rows();
			if($emp_gensalcnt > 0){
			$emp_gensal = $this->db->query('SELECT * FROM salary_detail WHERE emp_id='.$row['emp_id'].' ORDER BY salary_id DESC LIMIT 1')->result_array();
			}
			$emp_incentivescnt = $this->db->query('SELECT * FROM td_incentives WHERE emp_id='.$row['emp_id'].' AND status=0')->num_rows();
			if($emp_incentivescnt > 0){
			$emp_incentives = $this->db->query('SELECT SUM(incentive_item_total) AS tinct FROM td_incentives WHERE emp_id='.$row['emp_id'].' AND status=0')->result_array();
			$lastIncentive = $emp_incentives[0]['tinct'];
			//$lastIncentiveDate = $emp_incentives[0]['incentive_date'];
			}
			$emp_sales = $this->db->query('SELECT SUM(p_bill_total) AS totsale FROM td_sales_bill WHERE emp_name='.$row['emp_id'].' AND stat=0')->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><img src="<?php echo base_url();?>uploads/company/<?php echo $row['pic']; ?>" style="width:120" height="80"/></td>
                <td><?php echo $row['emptype']; ?></td>
                <td>Name : <?php echo $row['name']; ?><br/>Email : <?php echo $row['email']; ?><br/>Phone : <?php echo $row['phn']; ?><br/>Designation : <?php echo $row['empdesig']; ?><br/>Address : <?php echo $row['addrs']; ?></td>
                <td><?php echo $row['emp_sal']; ?>
                <br />
                <?php
				$curr_month = date('m');
				$curr_year = date('Y');
				if($emp_gensalcnt > 0){
				$sal_date = $emp_gensal[0]['salary_date'];
				$exp = explode('-',$sal_date);
				$salary_month = $exp[1];
				$salary_year = $exp[0];
				if($sal_date == date('Y-m-d')){
				//echo $sal_date;
				?>
                <span style="color:#090;">Paid</span>
                <br/><a onclick="return confirm('Are you sure ?');" href="<?php echo base_url();?>view/SalaryDetails/<?php echo $row['emp_id'];?>"><span class="tag tag-success">See Details</span></a><?php } else { ?>
                <a onclick="return confirm('Are you sure ?');" href="<?php echo base_url();?>Settings/Salary/<?php echo $row['emp_id'];?>"><span class="tag tag-success">Pay Salary</span></a>
            <?php } } else { ?>    
                <a onclick="return confirm('Are you sure ?');" href="<?php echo base_url();?>Settings/Salary/<?php echo $row['emp_id'];?>"><span class="tag tag-success">Pay Salary</span></a><?php } ?>
                </td>
                <td><?php echo $emp_sales[0]['totsale']; ?></td>
                <td><?php if($emp_incentivescnt > 0){?><?php echo $lastIncentive; ?>
                <br /><a href="<?php echo base_url();?>Settings/Incentives/<?php echo $row['emp_id'];?>/<?php echo $lastIncentive; ?>"><span class="tag tag-success">Pay Incentives</span></a>
                <?php } else {?>No data<!--<br/><a href="<?php echo base_url();?>Settings/Incentives/<?php echo $row['emp_id'];?>"><span class="tag tag-success">Pay Incentives</span></a>--><?php } ?></td>
                                
                <td>
                	<a href="<?php echo base_url();?>edit/Employee/<?php echo $row['emp_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-pencil" aria-hbrand_idden="true"></i></a>
                	<!--<a href="<?php echo base_url();?>index.php/delete/Employee/<?php echo $row['emp_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>-->
					
                </td>
              </tr>
            <?php } } else { ?>
            	<tr>
                	<td colspan="7" style="text-align:center">No records found</td>
                </tr>
            <?php } ?>  
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>