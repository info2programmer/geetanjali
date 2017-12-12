<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Route Assign Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/AssignedRoute">Route Assign Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>settings/RouteAssign" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Assign Route</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Route Name</th>
                <th>Employee Name</th>
                <th>Assign Date</th>
                <th>Status</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Route Name</th>
                <th>Employee Name</th>
                <th>Assign Date</th>
                <th>Status</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$route = $this->db->query('SELECT * FROM td_route WHERE rid='.$row['rname'])->result_array();
		$employee = $this->db->query('SELECT * FROM td_employee WHERE emp_id='.$row['empname'])->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $route[0]['rname']; ?></td>
                <td><?php echo $employee[0]['name']; ?></td>
                <td><?php echo $row['rdate']; ?></td>               
                <td>
                	<?php if($row['active']==1){ ?><a href="<?php echo base_url();?>settings/deactivateRoute/<?php echo $row['asign_id']; ?>" class="btn btn-flat flat-info txt-info waves-effect waves-light " onclick="return confirm('Are you sure ?');">Deactivate</a><?php } else {?>
                	<a href="<?php echo base_url();?>settings/RouteAssign" class="btn btn-flat flat-info txt-info waves-effect waves-red " onclick="return confirm('Are you sure ?');">Assign Route</a><?php } ?>
					
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