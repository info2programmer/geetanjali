<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Supplier Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Supplier">Supplier Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>settings/SupplierDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add Supplier Details</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Supplier Name</th>
                <th>Supplier Email</th>
                <th>Supplier Phone</th>
                <th>PAN No</th>
                <th>GST No</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['clname']; ?></td>
                <td><?php echo $row['clemail']; ?></td>
                <td><?php echo $row['clphn']; ?></td>
                <td><?php echo $row['clpan']; ?></td>
                <td><?php echo $row['cgst']; ?></td>
                <td><?php echo $row['cladd']; ?></td>               
                <td>
                	<a href="<?php echo base_url();?>edit/Supplier/<?php echo $row['cl_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-pencil" aria-hbrand_idden="true"></i></a>
                	<!--<a href="<?php echo base_url();?>index.php/delete/Supplier/<?php echo $row['cl_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>-->
					
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