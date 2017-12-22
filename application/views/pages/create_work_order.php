
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Work Order</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>settings/SupplierDetails">Work Order Details</a>
                        </li>
                    </ol>
                    <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Labourworkorder" style="color:#FF0000;">View Saved Work Order Details</a></button></li>
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
                            <h5 class="card-header-text">Supplier Details</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo current_url(); ?>" enctype="multipart/form-data">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Order-Bill-No" name="txtOrderbillno" id="txtOrderbillno"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-form-control required" placeholder="Item-Name" name="txtItemName" id="txtItemName"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="md-input-wrapper multisugg">
                                       Order Date : <input type="date" class="md-form-control required" placeholder="Purchase Date" name="txtDate">
                                    </div>
                                </div>
                            </div>
                            <div class="md-input-wrapper">
                                <textarea class="md-form-control required" cols="2" rows="3" placeholder="Order-Details" name="txtOrderDetails" id="txtOrderDetails"></textarea>
                            </div>
                             <div class="row">
                                <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number required" placeholder="Total-Amount" name="txtTotalAmount" id="txtTotalAmount"/>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number required" placeholder="TDS-Percentage" name="txtTDSpercentage" onkeyup="return calcp(this.value)" id="txtTDSpercentage"/>
                            </div>
                            </div>
                             <div class="col-sm-4">
                            <div class="md-input-wrapper">
                                <input type="text" class="md-form-control validate-number required" placeholder="After-TDS-Amount" name="txtAfterTdsAmount" id="txtAfterTdsAmount"/>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-1 text-right p-t-15">
                                Contractor
                            </div>
                            <div class="col-sm-3">
                                <div class="md-input-wrapper">
                                  <select name="ddlContractor" id="ddlContractor" class="md-form-control required">
                                  <option value="" hidden selected>---Select Contractor---</option>
                                  <?php foreach($contractor_list as $list): ?>
                                    <option value="<?php echo $list->id ?>"><?php echo $list->contractor_name ?></option>
                                  <?php endforeach ?>
                                  
                                  </select>
                                </div>
                            </div>

                            <div class="col-sm-1 text-right p-t-15">
                                Invoice
                            </div>
                            <div class="col-sm-3">
                                <div class="md-input-wrapper">
                                    <input type="file" name="file" class="md-form-control required" placeholder="Net Total" name="invice-copy"/>
                                </div>
                            </div>
                            <div class="col-sm-1 text-right p-t-15">
                                Project
                            </div>
                            <div class="col-sm-3">
                                <div class="md-input-wrapper">
                                    <!-- <input type="file" class="md-form-control required" placeholder="Net Total" name="invice-copy"/> -->
                                    <select name="ddlProject" id="ddlProject" class="md-form-control required">
                                     <option value="" selected hidden>---Select Project---</option>
                                     <?php foreach($project_list as $project): ?>
                                     <option value="<?php echo $project->project_id ?>"><?php echo $project->project_name ?></option>
                                     <?php endforeach; ?>         
                                    </select>
                                </div>
                            </div>
                        </div>
                           
                            <button type="submit" name="btnSubmit" value="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
        </div>
        <!-- Container-fluid ends -->
 <script>
  function calcp(dval) {
      var price=$('#txtTotalAmount').val();
      var totalPrice=(dval*price)/100;
      var tdsAmt=price-totalPrice;
      $('#txtAfterTdsAmount').val(tdsAmt);
    }
 </script>