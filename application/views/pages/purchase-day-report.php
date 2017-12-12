
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Purchase Report / Day</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item">Purchase Report / Day
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
                            <h5 class="card-header-text">Search Purchase Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/Reports/SearchPurchaseDay" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                               
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                     From Date :   <input type="date" class="md-form-control required" placeholder="From-Date" name="fdate" id="edate"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                      To Date :  <input type="date" class="md-form-control required" placeholder="To-Date" name="tdate" id="edate"/>
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
 