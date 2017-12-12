
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Store Edit</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/StoreDetails">Store Details</a>
                        </li>
                    </ol>
                     <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Store" style="color:#FF0000;">View Saved Store Details</a></button></li>
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
                            <h5 class="card-header-text">Store Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/edit/Store/<?php echo $row->st_id; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="mode" value="tab" />
                        <?php
							if(isset($row))
							{  
							$stname = $row->stname;
							$stno = $row->stno;
							$stkeep = $row->stkeep;
							}
							else
							{
							$stname = '';
							$stno = '';
							$stkeep = '';
							}
						?>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Store-Name" name="stname" value="<?php echo $stname; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Store-No" name="stno" value="<?php echo $stno; ?>"/>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                      <select class="md-form-control required" name="stkeep">
                                            <option value="" selected="selected" hidden="">Select Store Keeper</option>
                                            <?php 
											$employee  = $this->db->query("select * from td_employee")->result();
											foreach($employee as $emp){?>
                                            <option value="<?php echo $emp->emp_id;?>" <?php if($stkeep==$emp->emp_id) { ?>selected="selected"<?php } ?>><?php echo $emp->name;?></option>
                                            <?php } ?>
                                        </select>
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
 