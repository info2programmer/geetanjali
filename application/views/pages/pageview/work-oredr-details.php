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
                <th>Name</th>
                <th>Details</th>
                <th>Invoice</th>
              </tr>
              </thead>
              
             <tbody>
             <?php
              $dueAmount=0;
              $baseAmount=0;
              $orderId=0;
              $status=0;
              $projectId=0;
              $invoice='';
             ?>
            <?php if($rows) { $i=1; foreach($rows as $row) {
              $dueAmount=$row['deu_amount'];
              $baseAmount=$row['total_after_tds'];
              $orderId=$row['id'];
              $status=$row['request_status'];
              $projectId=$row['project_id'];
              $invoice=$row['order_bill_no'];
		      	?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['order_name']; ?>.00/-</td>
                <td>Order Price : <?php echo $row['order_total']; ?>.00/-<br/>
                TDS value : -<?php echo $row['order_tds'] ?>%<br/>
                Pay Amount : <?php echo $row['total_after_tds']; ?>.00/-<br/>
                Deu Amount : <?php echo $row['deu_amount']; ?>.00/-
                </td>  
                <td><a href="<?php echo base_url() ?>news/<?php echo $row['invoice_img'] ?>" target="_blank"><i class="zmdi zmdi-file"></i></a></td>
              </tr>
            <?php } } else { ?>
            	<tr>
                	<td colspan="7" style="text-align:center">No records found</td>
                </tr>
            <?php } ?>  
            </tbody>
            </table>
          </div>
        
           <div class="card-block">
              <form action="<?php echo base_url() ?>Update/updateWorkorderAmount" method="post">
                <div class="form-control">
                  <label for="txtAmount">Enter Amout</label>
                  <input type="number" class="form-control" placeholder="Enter Price" max="<?php echo($dueAmount<=0 ?  $baseAmount :  $dueAmount); ?>"  name="txtAmount" required>
                  <br>
                  <input type="hidden" name="txtOrderId" value="<?php echo $orderId ?>">
                  <input type="hidden" name="txtBaseAmount" value="<?php echo $baseAmount ?>" >
                  <input type="hidden" name="txtDueAmount" value="<?php echo $dueAmount ?>">
                  <input type="hidden" name="txtProjectId" value="<?php echo $projectId ?>">
                  <input type="hidden" name="txtBill" value="<?php echo $invoice ?>">
            <button class="btn btn-success" name="btnSubmit" value="submit"><i class="icofont icofont-ui-check"></i> Accept</button>&nbsp;<?php if($status!=1): ?><a onclick="return confirm('Note: Choosing Deny Will Delete The Selected Purchase Order')" href="<?php echo base_url() ?>Update/DenyWorkrequest/<?php echo $orderId; ?>" class="btn btn-danger"><i class="icofont icofont-ui-close"></i> Deny</a><?php endif; ?>
                </div>
                
              </form>
           </div>
            
        </div>
      </div>
    </div>
  </div>