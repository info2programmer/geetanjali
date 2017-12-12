
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Supplier Add</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/SupplierDetails">Supplier Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Supplier" style="color:#FF0000;">View Saved Supplier Details</a></button></li>
                     </ol><br/><?php if($this->session->flashdata('success_message')) { ?>
              <h6 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h6>
        <?php } ?></center>
                </div>
            </div>
            <!-- Header end -->

            <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Supplier Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/add/Supplier" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Supplier-Name" name="sname" id="sname"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control validate-email required" placeholder="Supplier-Email" name="semail" id="semail"/>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number" placeholder="Supplier-Phone" name="sphn" id="sphn"/>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Supplier-PAN-No" name="span" id="span"/>
                            </div>
                            </div>
                             <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Supplier-GST-No" name="sgst" id="sgst"/>
                            </div>
                            </div>
                            </div>
                           <div class="md-input-wrapper">
                                <textarea class="md-form-control required" cols="2" rows="3" placeholder="Supplier-Address" name="sadd" id="sadd"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 