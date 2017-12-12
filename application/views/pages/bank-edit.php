
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Bank Details Edit</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/BankDetails">Bank Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Bank" style="color:#FF0000;">View Saved Bank Details</a></button></li>
                     </ol></center>
                </div>
            </div>
            <!-- Header end -->

            <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Bank Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="bankform" id="signupform" method="post" action="<?php echo base_url();?>index.php/edit/bank/<?php echo $row->bank_id;?>" enctype="multipart/form-data">
                        <?php
							if(isset($row))
							{  
							$bank_name = $row->bank_name;
							$branch_name = $row->branch_name;
							$acc_no = $row->acc_no;
							$ifsc_no = $row->ifsc_no;
							$micr_no = $row->micr_no;
							}
							else
							{
							$bank_name = '';
							$branch_name = '';
							$acc_no = '';
							$ifsc_no = '';
							$micr_no = '';
							}
						?>
                        <input type="hidden" name="mode" value="tab" />
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Bank-Name" name="bank_name" id="bank_name" value="<?php echo $bank_name;?> "/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Branch-Name" name="branch_name" id="branch_name" value="<?php echo $branch_name;?> "/>
                                    </div>
                                </div>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Acc-No" name="acc_no" id="acc_no" value="<?php echo $acc_no;?> "/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="IFSC-Code" name="ifsc_no" id="ifsc_no" value="<?php echo $ifsc_no;?> "/>
                            </div>
                           <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="MICR-Code" name="micr_no" id="micr_no" value="<?php echo $micr_no;?> "/>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button><?php if($this->session->flashdata('success_message')) { ?>
              <h6 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h6>
        <?php } ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
