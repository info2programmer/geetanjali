<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4># <?php echo $bl_no;?> Sales Collection Details</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
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
              	<th>Bill No</th>
                <th>Bill Amount</th>
                <th>Collected amount</th>
                <th>amount Due</th>
              </tr>
              </thead>
              
             <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {
			$paid_amtcnt = $this->db->query('SELECT * FROM td_sales_payment WHERE bill_no="'.$row['p_bill_no'].'"')->num_rows();
			if($paid_amtcnt > 0){
			$paid_amt = $this->db->query('SELECT * FROM td_sales_payment WHERE bill_no="'.$row['p_bill_no'].'"')->result_array();
			}
			?>
              <tr>
              	<td><?php echo $bl_no;?></td>
                <td><?php echo $row['p_bill_total']; ?></td>
                <td><?php if($paid_amtcnt > 0){ foreach($paid_amt as $pay_amt){?>Paid Rs. : <b><?php echo $pay_amt['paid_amt']; ?></b> ON <b><?php echo $pay_amt['pay_date']; ?></b><br/><?php echo $pay_amt['pay_through']; ?>  No : <?php echo $pay_amt['trans_no']; ?><br/><?php } } else echo 'No Payment Collection yet';?></td>
                <td><?php if($paid_amtcnt > 0){ echo $row['due_amt']; } else { echo $row['p_bill_total'];}?></td>
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
    <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Update Collection</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="clientform" id="signupform" method="post" action="<?php echo base_url();?>index.php/accounts/saleCollect" enctype="multipart/form-data">
                        <input type="hidden" name="bill_no" value="<?php echo $bl_no;?>" />
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
                                     Pay Amount :   <input data-wtf type="text" class="md-form-control required" placeholder="Collection Amount" name="amount"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
                                    Pay Date :  <input data-wtf type="date" class="md-form-control required" placeholder="Collection Date" name="cdate" id="clemail"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
                                    Next Pay date :  <input data-wtf type="date" class="md-form-control" placeholder="Next Col Date" name="ncdate" id="ncdate"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
                                    <select name="pay_through">
									<option value="NEFT">NEFT</option>
									<option value="CHEQUE">CHEQUE</option>
									</select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
								<input data-wtf type="text" class="md-form-control required" placeholder="Transaction No" name="trans_no"/>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
  </div>