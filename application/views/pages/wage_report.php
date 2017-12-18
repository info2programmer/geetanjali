
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
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/view/WageReport" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="md-input-wrapper">
                                      <select class="md-form-control" name="ddlEmployee">
                                          <option value="" selected hidden>Select Labour</option>
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
                                <div class="md-input-wrapper text-center" >
                                    OR
                                </div>
                                 <div class="md-input-wrapper" >
                                     From Date
                                </div>
                               
                                <div class="md-input-wrapper">
                                    
                                    <input type="date" class="form-control" placeholder="From-Date" name="txtFromDate"/>
                                </div>
                                <div class="md-input-wrapper" >
                                     To Date
                                </div>
                                <div class="md-input-wrapper">
                                    
                                    <input type="date" class="form-control" placeholder="To-Date" name="txtToDate"/>
                                </div>
                            <!-- <div class="md-input-wrapper">
                                <input type="text" class="md-form-control required" placeholder="Labour-Salary" name="empsal"/>
                            </div> -->
                            <div class="text-center"><button type="submit" name="btnSubmit" value="Submit" class="btn btn-success waves-effect waves-light m-r-30">Search</button></div>
                            
                        </div>
                        </form>
                    </div>
                    <?php if(isset($listing_date)): ?>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <span style="color:#0C0;">
                            <?php if($this->session->flashdata('succ_msg')) { echo $this->session->flashdata('succ_msg'); } ?>
                            </span>
                        <div class="card-header"><h5 class="card-header-text"><a href="<?php echo base_url();?>settings/EmployeeDetails" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".flat-info">Add Labour Details</a></h5></div>
                        <div class="card-block">
                            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Deu Amount</th>
                                <th>Payment Mode</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl No.</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Deu Amount</th>
                                <th>Payment Mode</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php if($listing_date) { $i=1; foreach($listing_date as $list) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $list->name ?></td>
                                <td><?php echo $list->date ?></td>
                                <td><?php echo $list->wage ?></td>
                                <td><?php echo $list->paid_amount ?></td>
                                <td><?php echo $list->due_amount ?>
                             <br><?php if($list->due_amount!=0): ?><a href="<?php echo base_url() ?>update/PayDeuAmount/<?php echo $list->id ?>/<?php echo $list->wage ?>/<?php echo $list->project_id ?>/<?php echo $list->emp_id ?>/<?php echo $list->due_amount ?>" class="btn btn-default btn-xs">Pay Now</a><?php endif; ?></td> 
                                <td><?php echo $list->type ?>
                            <span id="pay<?php echo $i; ?>" style="display:none;"><form><input type="text" name="txt_pay" class="form-control"><button type="submit" class="btn btn-success btn-xs">Submit<button></form></span>
                            </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align:center">No records found</td>
                                </tr>
                            <?php } ?>  
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php endif; ?>              
                </div>


            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 <script>
     function frmshw(id) {
         $('#pay'+id).css('display','block');
     }
 </script>