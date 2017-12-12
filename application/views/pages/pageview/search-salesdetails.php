<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Sales Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item">Sales Details</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 style="color:green;">Total Bill amount : <?php echo $sumrows[0]['tsbill']; ?></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Bill No</th>
                <th>Bill Date</th>
                <th>Customer Name</th>
                <th>Employee Name</th>
                <th>Bill Total</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              		<th>Sl No.</th>
                <th>Bill No</th>
                <th>Bill Date</th>
                <th>Customer Name</th>
                <th>Employee Name</th>
                <th>Bill Total</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$supplr = $this->db->query('SELECT * FROM td_client WHERE cl_id='.$row['customer_name'])->result_array();
			$employee = $this->db->query('SELECT * FROM td_employee WHERE emp_id='.$row['emp_name'])->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['p_bill_no']; ?></td>
                <td><?php echo $row['p_bill_date']; ?></td>
                <td><?php echo $supplr[0]['clname']; ?></td>
                <td><?php echo $employee[0]['name']; ?></td>
                <td><?php echo $row['p_bill_total']; ?></td>               
                <td>
                	<a href="<?php echo base_url();?>view/SalesPreview/<?php echo $row['p_bill_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-print"></i></a>
                	<a href="<?php echo base_url();?>index.php/delete/Sale/<?php echo $row['p_bill_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>
					<button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/SaleDtl/<?php echo $row['p_bill_id']; ?>" style="color:#FF0000;">See Details</a></button>
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