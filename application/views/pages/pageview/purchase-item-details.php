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
                <th>Item Name</th>
                <th>Purchase Details</th>
                <th>Item CGST (%)</th>
                <th>Item SGST (%)</th>
                <th>Sale Details</th>
              </tr>
              </thead>
              
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$unit = $this->db->query('SELECT * FROM td_unit WHERE uid='.$row['item_p_unit'])->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td>Purchase Price : <?php echo $row['item_p_total_amt']; ?><br/>
                Quantity : <?php echo $row['item_p_qty']; ?> <?php echo $unit[0]['stname']; ?> (<?php echo $row['item_unit_p_price']; ?>/<?php echo $unit[0]['stname']; ?>)
                </td>
                <td><?php echo $row['item_s_gst']; ?></td>
                <td><?php echo $row['item_s_sgst']; ?></td>
                <td>Sale Price : <?php //echo $row['item_s_price']; ?> Without GST <?php echo $row['item_single_sale_wogst']; ?>/<?php echo $unit[0]['stname']; ?><br/>
                Sale Price : <?php //echo $row['item_s_total']; ?> With GST <?php echo $row['item_single_sale_wgst']; ?>/<?php echo $unit[0]['stname']; ?>
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