
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Expenses Add</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>Expense/ExpenseDetails">Expenses Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Expenses" style="color:#FF0000;">View Saved Expenses Details</a></button></li>
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
                            <h5 class="card-header-text">Expenses Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/add/Expenses" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Expenses-Name" name="rname" id="rname"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                    Expense Date : 
                                        <input type="date" class="md-form-control required" placeholder="Expenses-Date" name="edate" id="edate"/>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-6">
                           <div class="md-input-wrapper">
                                <input type="text" class="md-form-control required" placeholder="Expense-Price" name="eprice" id="eprice"/>
                            </div>
                            </div>
                             <div class="col-sm-2">
                           <div class="md-input-wrapper">
                             Advance amount:   
                            </div>
                            </div>
                             <div class="col-sm-4">
                           <div class="md-input-wrapper"><input type="text" class="md-form-control required" placeholder="Advance-Expense-Price" name="Adeprice" id="Adeprice" value="0"/>
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
        <!-- Container-fluid ends -->
 