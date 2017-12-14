<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Pojects Management</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Company">Pojects Management</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>Add/Projects" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title="Create New Project">Add Pojects Details</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Project Name</th>
                <th>Project Value</th>
                <th>Current Amount</th>
                <th>Company Name</th>
                <th>Invoice</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Project Name</th>
                <th>Project Value</th>
                <th>Current Amount</th>
                <th>Company Name</th>
                <th>Invoice</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($project_list) { $i=1; foreach($project_list as $item) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $item->project_name ?></td>
                <td><?php echo $item->Project_value ?></td>                
                <td><?php echo $item->current_amount ?></td>                
                <td><?php echo $item->company_name ?></td>                
                <td>
                	<a href="<?php echo  base_url() ?>uploads/invoice/<?php echo $item->project_invoice ?>" target="_blank"><i class="fa fa-file"></i></a>					
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