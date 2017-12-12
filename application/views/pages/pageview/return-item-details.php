<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Return Details of # <?php echo $item[0]['item_name'];?></h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>inventory/PreturnDetails">Return Details</a></li>
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
                <th>Return Quantity</th>
                <th>Return Unit Price</th>
                <th>Return Price</th>
                <th>Return Date</th>
                <th>Remarks</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Return Quantity</th>
                <th>Return Unit Price</th>
                <th>Return Price</th>
                <th>Return Date</th>
                <th>Remarks</th>
              </tr>
              </tfoot>
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$item_id = $row['item_id'];
			$item_details = $this->db->query("select a.item_p_unit,b.stname from td_purchase_item as a inner join td_unit as b on b.uid=a.item_p_unit where a.item_id='$item_id'")->row();
			
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['return_unit']; ?> <?php echo $item_details->stname; ?></td>
                <td> <?php echo $row['return_price']/$row['return_unit']." / ".$item_details->stname; ?></td>
                <td> <?php echo $row['return_price']; ?></td>
                <td><?php echo $row['ret_date']; ?> </td>
                <td><?php echo $row['remark']; ?></td>
                               
                
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