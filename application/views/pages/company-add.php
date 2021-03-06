
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Company Setting</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/CompanyDetails">Company Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Company" style="color:#FF0000;">View Saved Company Details</a></button></li>
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
                            <h5 class="card-header-text">Company Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/add/Company" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Company-Name" name="cname" id="cname"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control validate-email required" placeholder="Company-Email" name="cemail" id="cemail"/>
                                    </div>
                                </div>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Company Password" name="password" id="password"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number" placeholder="Company-Phone" name="cphn" id="cphn"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Company-PAN-No" name="cpan" id="cpan"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Company-GST-No" name="cgst" id="cgst"/>
                            </div>
                            <div class="md-input-wrapper">
                                <textarea class="md-form-control required" cols="2" rows="3" placeholder="Company-Address" name="cadd" id="cadd"></textarea>
                            </div>
                            
                            <div class="md-group-add-on">
                                    <span class="md-add-on-file">
                                        <button class="btn btn-success waves-effect waves-light">Company Logo</button>
                                    </span>
                                <div class="md-input-file">
                                    <input type="file" class="required" name="cimg" id="cimg"/>
                                    <input type="text" class="md-form-control md-form-file">
                                    <label class="md-label-file">Upload Logo</label>
                                </div>
                            </div>
                            <!-- <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Company Username" name="username" id="username"/>
                            </div> -->
                            
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 