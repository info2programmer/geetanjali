
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
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/view/Deduction" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="md-input-wrapper">
                                      <select class="md-form-control" name="ddlProject">
                                          <option value="" selected hidden>--Select Project Name--</option>
                                          <?php foreach($project_list as $list): ?>
                                          <option value="<?php echo $list->project_id ?>"><?php echo $list->project_name ?></option>
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
                    <?php $array_item[]=0; ?>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <span style="color:#0C0;">
                            <?php if($this->session->flashdata('succ_msg')) { echo $this->session->flashdata('succ_msg'); } ?>
                            </span>
                        <div class="card-header"><h5 class="card-header-text"></h5></div>
                        <div class="card-block">
                            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Particulars</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl No.</th>
                                <th>Particulars</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php if($listing_date) { $i=1; foreach($listing_date as $list) {
                            ?>
                            <?php $array_item[]=$list->amount; ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $list->particulars ?></td>
                                <td><?php echo $list->amount ?></td>
                                <td><?php echo $list->date ?></td>
                                
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align:center">No records found</td>
                                </tr>
                            <?php } ?>  
                            </tbody>
                            </table>
                            <Span>Total Project Value : <span class="badge label label-success"><?php echo $project_details[0]['Project_value']; ?>/- &nbsp;</span>Total Deduction : <span class="badge label label-danger"><?php echo array_sum($array_item); ?>/-</span></Span>
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