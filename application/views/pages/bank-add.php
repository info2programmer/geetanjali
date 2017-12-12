
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Bank Details Add</h4>
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
						<form name="bankform" id="signupform" method="post" action="<?php echo base_url();?>index.php/add/bank" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Bank-Name" name="b_name" id="b_name"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Branch-Name" name="b_branch" id="b_branch"/>
                                    </div>
                                </div>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Acc-No" name="b_acc_no" id="b_acc_no"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="IFSC-Code" name="b_ifsc" id="b_ifsc"/>
                            </div>
                           <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="MICR-Code" name="b_micr" id="b_micr"/>
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
