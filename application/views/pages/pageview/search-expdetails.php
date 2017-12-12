<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Expense Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Expenses">Expense Details</a></li>
          </ol>
          <center><?php if($this->session->flashdata('success_message')) { ?>
              <h6 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h6>
        <?php } ?></center>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>Expense/ExpenseDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add Expense Details</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Expense Name</th>
                <th>Expense Date</th>
                <th>Expense Amount</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Expense Name</th>
                <th>Expense Date</th>
                <th>Expense Amount</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($sdetail) { $i=1; foreach($sdetail as $row) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['expname']; ?></td>
                <td><?php echo $row['expdate']; ?></td>
                <td><?php echo $row['expamnt']; ?></td>               
                <td>
                	<a href="<?php echo base_url();?>edit/Company/<?php echo $row['exp_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-pencil" aria-hbrand_idden="true"></i></a>
                	<a href="<?php echo base_url();?>index.php/delete/Expense/<?php echo $row['exp_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>
					
                </td>
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