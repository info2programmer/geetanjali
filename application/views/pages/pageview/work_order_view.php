<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Work Order Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Supplier">Work Order Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>Add/WorkOrder      " class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Work Order Details</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Order Bill</th>
                <th>Order Date</th>
                <th>Order Name</th>
                <th>Total Amount</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['order_bill_no']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['order_name']; ?></td>
                <td><?php echo $row['order_total']; ?></td>               
                <td>
                	<a href="<?php echo base_url() ?>news/<?php echo $row['invoice_img'] ?>" target="_blank"><i class="fa fa-file-text" aria-hbrand_idden="true"></i></a>
                	<!--<a href="<?php echo base_url();?>index.php/delete/Supplier/<?php echo $row['cl_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>-->
                  <a href="<?php echo base_url() ?>View/LabourworkorderId/<?php echo $row['id'] ?>" class="btn btn-inverse-primary waves-effect waves-light">See Details</a>
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