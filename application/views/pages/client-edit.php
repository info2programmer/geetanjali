
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Client Edit</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/ClientDetails">Client Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Client" style="color:#FF0000;">View Saved Client Details</a></button></li>
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
                            <h5 class="card-header-text">Client Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="clientform" id="signupform" method="post" action="<?php echo base_url();?>index.php/edit/Client/<?php echo $row->cl_id; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="mode" value="tab" />
                        <?php
							if(isset($row))
							{  
							$clname = $row->clname;
							$clemail = $row->clemail;
							$clphn = $row->clphn;
							$clpan = $row->clpan;
							$clgst = $row->cgst;
							$cladd = $row->cladd;
							}
							else
							{
							$clname = '';
							$clemail = '';
							$clphn = '';
							$clpan = '';
							$clgst = '';
							$cladd = '';
							}
						?>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Client-Name" name="clname" id="clname" value="<?php echo $clname; ?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control validate-email required" placeholder="Client-Email" name="clemail" id="clemail" value="<?php echo $clemail; ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number" placeholder="Client-Phone" name="clphn" id="clphn" value="<?php echo $clphn; ?>"/>
                            </div>
                            </div>
                             <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Client-PAN-No" name="clpan" id="clpan" value="<?php echo $clpan; ?>"/>
                            </div>
                            </div>
                             <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-alphanum required" placeholder="Client-GST-No" name="clgst" id="clpan" value="<?php echo $clgst; ?>"/>
                            </div>
                            </div>
                            </div>
                           <div class="md-input-wrapper">
                                <textarea class="md-form-control required" cols="2" rows="3" placeholder="Client-Address" name="cladd" id="cladd">
                                <?php echo $cladd; ?>
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 