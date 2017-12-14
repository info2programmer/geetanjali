
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Labour Wage</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/EmployeeDetails">Labour Wage</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li></li>
                     </ol><br/><?php if($this->session->flashdata('success_log')) { ?>
              <h6 style="color:green;"><?php echo $this->session->flashdata('success_log'); ?></h6>
        <?php } ?></center>
                </div>
            </div>
            <!-- Header end -->

            <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Labour Wage Payment</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/view/EmployeeWage" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="md-input-wrapper">
                                      <select class="md-form-control required" name="ddlEmployee">
                                          <option value="">Select Labour</option>
                                          <?php foreach($employee_list as $list): ?>
                                          <option value="<?php echo $list->emp_id ?>"><?php echo $list->name ?></option>
                                          <?php endforeach; ?>
                                        </select>
                            </div>
                            </div>
                                <!-- <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Labour-Name" name="empname"/>
                                    </div>
                                </div> -->
                                <!-- <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control validate-email" placeholder="Labour-Email" name="txtAmount"/>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number required" placeholder="Labour-Phone" name="empphn"/>
                            </div> -->
                                <div class="md-input-wrapper">
                                    <input type="number" class="md-form-control required" placeholder="Total-Wage-Amount" name="txtTotal"/>
                                </div>
                                <div class="md-input-wrapper">
                                    <input type="number" class="md-form-control required" placeholder="Pay-Wage-Amount" name="txtPay"/>
                                </div>
                            
                           <div class="md-input-wrapper">
                                <textarea class="md-form-control" cols="2" rows="3" placeholder="Work" name="txtWork"></textarea>
                            </div>
                            <div class="md-input-wrapper">
                                 <select class="md-form-control required" name="ddlPaymentMode">
                                        <option value="" selected hidden>Select Payment Mode</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Full">Full</option>
                                 </select>
                            </div>
                             
                            <!-- <div class="md-input-wrapper">
                                <input type="text" class="md-form-control required" placeholder="Labour-Salary" name="empsal"/>
                            </div> -->
                            <button type="submit" name="btnSubmit" value="Submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 