<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Bank Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Bank">Bank Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>settings/BankDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add Bank</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Bank Name</th>
                <th>Branch Name</th>
                <th>Account No</th>
                <th>IFSC Code</th>
                <th>MICR Code</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Bank Name</th>
                <th>Branch Name</th>
                <th>Account No</th>
                <th>IFSC Code</th>
                <th>MICR Code</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['bank_name']; ?></td>
                <td><?php echo $row['branch_name']; ?></td>
                <td><?php echo $row['acc_no']; ?></td>
                <td><?php echo $row['ifsc_no']; ?></td>
                <td><?php echo $row['micr_no']; ?></td>                
                <td>
                	<a href="<?php echo base_url();?>edit/bank/<?php echo $row['bank_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-pencil" aria-hbrand_idden="true"></i></a>
                	<a href="<?php echo base_url();?>index.php/delete/Bank/<?php echo $row['bank_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>
					
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