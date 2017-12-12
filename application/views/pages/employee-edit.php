
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Employee Edit</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/EmployeeDetails">Employee Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Employee" style="color:#FF0000;">View Saved Employee Details</a></button></li>
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
                            <h5 class="card-header-text">Employee Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/edit/Employee/<?php echo $row->emp_id; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="mode" value="tab" />
                        <?php
							if(isset($row))
							{  
							$emptype = $row->emptype;
							$name = $row->name;
							$phn = $row->phn;
							$email = $row->email;
							$empdesig = $row->empdesig;
							$addrs = $row->addrs;
							$emp_sal = $row->emp_sal;
							}
							else
							{
							$emptype = '';
							$name = '';
							$phn = '';
							$email = '';
							$empdesig = '';
							$addrs = '';
							$emp_sal = '';
							}
						?>
                        <div class="card-block">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="md-input-wrapper">
                                      <select class="md-form-control required" name="emptype">
                                            <option value="" selected="selected" hidden="">Employee Type</option>
                                            <option value="Managing" <?php if($emptype=='Managing') { ?>selected="selected"<?php } ?>>Managing</option>
                                            <option value="Office" <?php if($emptype=='Office') { ?>selected="selected"<?php } ?>>Office</option>
                                            <option value="Sales" <?php if($emptype=='Sales') { ?>selected="selected"<?php } ?>>Sales</option>
                                        </select>
                                    </div>
                                    </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Employee-Name" name="name" value="<?php echo $name; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control validate-email required" placeholder="Employee-Email" name="email" value="<?php echo $email; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number" placeholder="Employee-Phone" name="phn" value="<?php echo $phn; ?>"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control required" placeholder="Employee-Designation" name="empdesig" value="<?php echo $empdesig; ?>"/>
                            </div>
                           <div class="md-input-wrapper">
                                <textarea class="md-form-control required" cols="2" rows="3" placeholder="Employee-Address" name="addrs">
                                <?php echo $addrs; ?>
                                </textarea>
                            </div>
                            <img src="<?php echo base_url(); ?>uploads/company/<?php echo $row->pic; ?>" width="100" height="100" />
                            <div class="md-group-add-on">
                                    <span class="md-add-on-file">
                                        <button class="btn btn-success waves-effect waves-light">Employee Image</button>
                                    </span>
                                <div class="md-input-file">
                                    <input type="file" class="required" name="cimg" id="cimg"/>
                                    <input type="text" class="md-form-control md-form-file">
                                    <label class="md-label-file">Upload Image</label>
                                </div>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control required" placeholder="Employee-Salary" name="emp_sal" value="<?php echo $emp_sal; ?>"/>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 