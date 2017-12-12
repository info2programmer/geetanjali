<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Return Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>inventory/PreturnDetails">Purchase Return Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>inventory/StockDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">View Total stock</a></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Supplier / Customer</th>
                <th>Item Name</th>
                <th>Return Quantity</th>
                <th>Return Price</th>
                <th>Return Date</th>
                <th>Remarks</th>
              </tr>
              </thead>
             <tbody>
            <?php if($stocks || $stockssls) { $i=1; foreach($stocks as $row) {
			$irows = $this->db->query('SELECT * FROM td_purchase_item WHERE item_id="'.$row['item_id'].'"')->result_array();
			$irowsbill = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_id="'.$irows[0]['pid'].'"')->result_array();
			$irowsbillsupplier = $this->db->query('SELECT * FROM td_supplier WHERE cl_id="'.$irowsbill[0]['supplier_name'].'"')->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td>Bill No :<?php echo $irowsbill[0]['p_bill_no']; ?><br/>
                Supplier : <?php echo $irowsbillsupplier[0]['clname']; ?>
                </td>
                <td><?php echo $irows[0]['item_name']; ?></td>
                <td><?php echo $row['return_unit']; ?></td>
                <td> <?php echo $row['return_price']; ?></td>
                <td><?php echo $row['ret_date']; ?> </td>
                <td><?php echo $row['return_type']; ?> <?php echo $row['remark']; ?></td>
                               
                
              </tr>
            <?php } $j=1;
			foreach($stockssls as $rows) {
			$irowss = $this->db->query('SELECT * FROM td_sales_item WHERE item_id="'.$rows['item_id'].'"')->result_array();
			$irowsbills = $this->db->query('SELECT * FROM td_sales_bill WHERE p_bill_id="'.$irowss[0]['pid'].'"')->result_array();
			$irowsbillsuppliers = $this->db->query('SELECT * FROM td_client WHERE cl_id="'.$irowsbills[0]['customer_name'].'"')->result_array();
			?>
			<tr>
              	<td><?php echo $j++; ?></td>
                <td>Bill No :<?php echo $irowsbills[0]['p_bill_no']; ?><br/>
                Customer : <?php echo $irowsbillsuppliers[0]['clname']; ?>
                </td>
                <td><?php echo $irowss[0]['item_name']; ?></td>
                <td><?php echo $rows['return_unit']; ?></td>
                <td> <?php echo $rows['return_price']; ?></td>
                <td><?php echo $rows['ret_date']; ?> </td>
                <td><?php echo $rows['return_type']; ?> <?php echo $rows['remark']; ?></td>
                               
                
              </tr>
            <?php }?>
			<?php } else { ?>
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