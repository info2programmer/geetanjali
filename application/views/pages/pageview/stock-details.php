<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Stock Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>Inventory/StockDetails">Stock Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"></h5></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                <th>Sl No.</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Returns</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>Sl No.</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Returns</th>
                <th>Action</th>
              </tr>
              </tfoot>
             <tbody>
            <?php 

            if($stocks) { $i=1; foreach($stocks as $row) {
      $unit = $this->db->query('SELECT * FROM td_unit WHERE uid='.$row['stock_unit'])->result_array();
      //echo $this->db->last_query();die;
      
      $irows = $this->db->query('SELECT * FROM td_purchase_item WHERE item_name="'.$row['stock_item'].'"')->result_array();
      
      //echo $irows[0]['item_id'];
      $return = $this->db->query('SELECT * FROM td_return_details WHERE item_id='.$irows[0]['item_id'])->num_rows();
      //echo $return;
      //die;
      ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['stock_item']; ?></td>
                <td><?php echo $row['stock_qty']; ?> <?php echo $unit[0]['stname']; ?></td> 
                <td><?php echo $return; ?> Times Return<?php if($return > 0){?><br/><a href="<?php echo base_url();?>View/Returns/<?php echo $irows[0]['item_id']; ?>" style="color:#FF0000;">See Return Details</a><?php } ?></td>              
                <td>
                  <button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Stocking/<?php echo $row['stock_item']; ?>" style="color:#FF0000;">See Stocking Details</a></button>
          
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