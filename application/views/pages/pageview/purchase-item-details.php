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
                <th>Invoice</th>
              </tr>
              </thead>
              
             <tbody>
             <?php $max=0; 
            //  $status=0;
             ?>
            <?php if($rows) { $i=1; foreach($rows as $row) {
      $unit = $this->db->query('SELECT * FROM td_unit WHERE uid='.$row['item_p_unit'])->result_array();
       $max=(int)$row['item_p_total_amt']; 
      //  $status=$invoice[0]['request_status'];
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td>Order Price : <?php echo $row['item_p_total_amt']; ?><br/>
                Due Amount : <?php echo $status[0]['due_amt'] ?><br/>
                Quantity : <?php echo $row['item_p_qty']; ?> <?php echo $unit[0]['stname']; ?> (<?php echo $row['item_unit_p_price']; ?>/<?php echo $unit[0]['stname']; ?>)
                </td>
                <td><?php echo $row['item_s_gst']; ?></td>
                <td><?php echo $row['item_s_sgst']; ?></td>
                <td>Sale Price : <?php //echo $row['item_s_price']; ?> Without GST <?php echo $row['item_single_sale_wogst']; ?>/<?php echo $unit[0]['stname']; ?><br/>
                Sale Price : <?php //echo $row['item_s_total']; ?> With GST <?php echo $row['item_single_sale_wgst']; ?>/<?php echo $unit[0]['stname']; ?>
                </td>               
                <td><a href="<?php echo base_url() ?>news/<?php echo $invoice[0]['invoice_img'] ?>" target="_blank"><i class="zmdi zmdi-file"></i></a></td>
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
              <form action="<?php echo base_url() ?>Update/UpdatePurchaseRequest" method="post">
                <div class="form-control">
                  <label for="txtAmount">Enter Amout</label>
                  <input type="number" class="form-control" placeholder="Enter Price" max="<?php echo $max; ?>"  name="txtAmount" required>
                  <input type="hidden" name="txtTotalOrderAmount" value="<?php echo $max ?>">
                  <input type="hidden" name="txtProjectID" value="<?php echo $status[0]['project_id'] ?>">
                  <input type="hidden" name="txtPurchaseId" value="<?php echo $pid; ?>" >
                  <input type="hidden" name="txtInvoiceNumber" value="<?php echo $status[0]['p_bill_no'] ?>" >
                  <input type="hidden" name="txtDueAmount" value="<?php echo $status[0]['due_amt'] ?>" >
                  <br>
                  <div class="md-input-wrapper">
                               <select name="ddlPaymentMode" id="ddlPaymentMode" class="md-form-control required">
                               <option value="" selected hidden>---Select Payment Mode---</option>
                               <option value="Cash">Cash</option>
                               <option value="Cheque">Cheque</option>
                               </select>   
                            </div>

                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control" placeholder="Cheque-Number" name="txtChequeNumber" id="txtChequeNumber"/>
                            </div>

                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control" placeholder="Bank-Name" name="txtBankName" id="txtBankName"/>
                            </div>

                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control" placeholder="Branch-Name" name="txtBranch" id="txtBranch"/>
                            </div>

                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control" placeholder="IFSC-Code" name="txtIFSC" id="txtIFSC"/>
                            </div>

                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control" placeholder="Issue-By" name="txtIssueBy" id="txtIssueBy"/>
                            </div>

                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control" placeholder="Account-Type" name="txtAcctype" id="txtAcctype"/>
                            </div>
            <button class="btn btn-success" name="btnSubmit" value="submit"><i class="icofont icofont-ui-check"></i> Accept</button>&nbsp;<?php if($status[0]['request_status']!=1): ?><a onclick="return confirm('Note: Choosing Deny Will Delete The Selected Purchase Order')" href="<?php echo base_url() ?>Update/Denyrequest/<?php echo $pid; ?>" class="btn btn-danger"><i class="icofont icofont-ui-close"></i> Deny</a><?php endif; ?>
                </div>
                
              </form>
           </div>
            
        </div>
      </div>
    </div>
  </div>