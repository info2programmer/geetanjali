
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Cashbook Report</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a></li>
                    </ol>                    
                </div>
            </div>
            <!-- Header end -->

            <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Search Cashbook Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/Accounts/cashbook" enctype="multipart/form-data" target="_blank">
                        <input type="hidden" name="mode" value="cashbook" />
                        <div class="card-block">
                            <div class="row">
                               
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                    	<strong>From Date</strong>
                                    	<input type="date" class="form-control"  required placeholder="From Date" name="fdate" id="edate"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                    	<strong>To Date</strong>
                                    	<input type="date" class="form-control" required placeholder="To-Date" name="tdate" id="edate"/>
                                    </div>
                                </div>
                            </div>                          
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Search</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 