
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Purchase Return</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>inventory/PurchaseReturn">Purchase Return</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Header end -->

            <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Purchase Return</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						 <form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/Search/purchaseDetails" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                           <div class="col-sm-3">
                                    <label>Enter Bill No : </label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" name="b_no" placeholder="Purchase No / Bill No" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
      