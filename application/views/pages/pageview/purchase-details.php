<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Purchase Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Purchase">Purchase Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>inventory/PurchaseDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add New Purchase</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Bill No</th>
                <th>Bill Date</th>
                <th>Supplier Name</th>
                <th>Bill Total</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              		<th>Sl No.</th>
                <th>Bill No</th>
                <th>Bill Date</th>
                <th>Supplier Name</th>
                <th>Bill Total</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$supplr = $this->db->query('SELECT * FROM td_supplier WHERE cl_id='.$row['supplier_name'])->result_array();
			$billTotal = $this->db->query('SELECT SUM(item_p_total_amt) as TotBillAmt FROM td_purchase_item WHERE pid='.$row['p_bill_id'])->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['p_bill_no']; ?></td>
                <td><?php echo $row['p_bill_date']; ?></td>
                <td><?php echo $supplr[0]['clname']; ?></td>
                <td><?php echo $row['p_bill_total']; ?></td>               
                <td>
                	<a href="<?php echo base_url();?>view/PurchasePreview/<?php echo $row['p_bill_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-print"></i></a>
                	<a href="<?php echo base_url();?>index.php/delete/Purchase/<?php echo $row['p_bill_id']; ?>" onclick="return confirm('Are you sure ?');"><i class="zmdi zmdi-delete"></i></a>
					<button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/PurchaseItems/<?php echo $row['p_bill_id']; ?>" style="color:#FF0000;">See Details</a></button>
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