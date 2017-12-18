
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Project Setting</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>view/Project">Project Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Project" style="color:#FF0000;">View Saved Project Details</a></button></li>
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
                            <h5 class="card-header-text">Project Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/add/Projects" enctype="multipart/form-data">
                        <div class="card-block">
                            <!-- <div class="row">
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
                            </div> -->
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control required" placeholder="Project-Name" name="txtProjectName" id="txtProjectName"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="number" class="md-form-control validate-number required" placeholder="Project-Value" name="txtProjectvalue" id="txtProjectvalue"/>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Company-Name" name="txtCompanyName" value=<?php echo $this->session->userdata('username'); ?> readonly id="txtCompanyName"/>
                            </div>
                            
                            <div class="md-group-add-on">
                                    <span class="md-add-on-file">
                                        <button class="btn btn-success waves-effect waves-light">Invoice</button>
                                    </span>
                                <div class="md-input-file">
                                    <input type="file" class="required" name="cimg" id="cimg"/>
                                    <input type="text" class="md-form-control md-form-file">
                                    <label class="md-label-file">Upload Invoice</label>
                                </div>
                            </div>
                            <!-- <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Company Username" name="username" id="username"/>
                            </div> -->
                            
                            <button type="submit" name="btnSubmit" value="Submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 