<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Stocking Details of # <?php echo $rows[0]['item_name'];?></h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>inventory/StockDetails">Stock Details</a></li>
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
                <th>Item Name</th>
                <th>Stock Date</th>
                <th>Stock Amount</th>
                <th>@Stocking Price</th>
                <th>@Sales Price</th>
                <th>Store Name</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Item Name</th>
                <th>Stock Date</th>
                <th>Stock Amount</th>
                <th>@Stocking Price</th>
                <th>@Sales Price</th>
                <th>Store Name</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$unit = $this->db->query('SELECT * FROM td_unit WHERE uid='.$row['item_p_unit'])->result_array();
			$bill = $this->db->query('SELECT * FROM td_purchase_bill WHERE p_bill_id='.$row['pid'])->result_array();
			//if($row['store_name']!=0){
			//$store = $this->db->query('SELECT * FROM td_store WHERE st_id='.$row['store_name'])->result_array();
			//}
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td> <?php echo $bill[0]['p_bill_date']; ?></td>
                <td><?php echo $row['itempqtyorig']; ?> <?php echo $unit[0]['stname']; ?> (<?php echo $row['item_unit_p_price']; ?>/<?php echo $unit[0]['stname']; ?>)
                </td>
                <td><?php echo $row['itempamtorig']; ?></td>
                 <td><?php echo $row['item_s_total']; ?> (<?php echo $row['item_s_total']/$row['itempqtyorig']; ?> /<?php echo $unit[0]['stname']; ?>)</td>               
                <td><?php //if($row['store_name']==0){ ?>Assign Store<?php //} else {?><?php //echo $store[0]['stname'];?><?php //} ?></td>
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