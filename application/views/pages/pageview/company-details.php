<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Company Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Company">Company Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>settings/CompanyDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add Company Details</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Company Logo</th>
                <th>Company Details</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Company Logo</th>
                <th>Company Details</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><img src="<?php echo base_url();?>uploads/company/<?php echo $row['pic']; ?>" style="width:120" height="80"/></td>
                <td>
                <strong>Name: </strong><?php echo $row['cname']; ?><br />
                <strong>Email: </strong><?php echo $row['cemail']; ?><br />
                <strong>Phone: </strong><?php echo $row['cphn']; ?><br />
                <strong>PAN No: </strong><?php echo $row['cpan']; ?><br />
                <strong>GST: </strong><?php echo $row['cgst']; ?><br />
                <strong>Address: </strong><?php echo $row['cadd']; ?>
                </td>                
                <td>
                	<a href="<?php echo base_url();?>edit/Company/<?php echo $row['cid']; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-pencil" aria-hbrand_idden="true"></i></a>
                	<a href="<?php echo base_url();?>index.php/delete/Company/<?php echo $row['cid']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>
					
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