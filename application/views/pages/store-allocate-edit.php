<!-- Container-fluid starts -->
<div class="container-fluid">

    <!-- Header start -->
    <div class="row">
        <div class="main-header">
            <h4>Store Allocation Edit</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>user/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user/">Dashbord</a>
                </li>
                <li class="breadcrumb-item">Store Allocation
                </li>
            </ol>
             <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/StoreAllocation" style="color:#FF0000;">View Allocated Store</a></button></li>
                     </ol><br/><?php if($this->session->flashdata('success_message')) { ?>
              <h6 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h6>
        <?php } ?>
        </center>
        </div>
    </div>
    <!-- Header end -->

    <div class="row">
        <!-- Form Control starts -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Store Allocation</h5>

                </div>
                <!-- end of modal -->
                <form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/edit/Store_allocation/<?php echo $row->st_al_id; ?>" enctype="multipart/form-data" autocomplete="off">
                	<input type="hidden" name="mode" value="tab" />
                        <?php
							if(isset($row))
							{  
							$st_id = $row->stname;
							$store_detail = $this->db->query("select * from td_store where st_id='$st_id'")->row();
							$item_name = $row->item_name;
							}
							else
							{
							$st_id = '';
							$item_name = '';
							}
						?>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="md-input-wrapper multisugg">
                                    <div class="md-input-wrapper multisugg">
                                        <input type="text" class="md-form-control required" placeholder="Store Name" name="stname" value="<?php echo $store_detail->stname."-".$store_detail->st_id; ?>"/>
                                        <ul class="md-form-control">
                                        <?php 
										$store = $this->db->query("select * from td_store")->result();
										foreach($store as $str){?>
                                            <li><?php echo $str->stname;?>-<?php echo $str->st_id;?></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="md-input-wrapper multisugg">
                                    <div class="md-input-wrapper multisugg">
                                        <input type="text" class="md-form-control required" placeholder="Item Name" name="item_name" value="<?php echo $item_name; ?>"/>
                                        <ul class="md-form-control">
                                        <?php 
										$items = $this->db->query("select * from td_purchase_item")->result();
										foreach($items as $splr){?>
                                            <li><?php echo $splr->item_name;?></li>
                                            <?php }?>
                                        </ul>
                                    </div>
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
<script>
    var trgul;
    $('.multisugg input').on('focus', function () {
        $(this).parent().find('ul').addClass('open');
        $(this).parent().addClass('focused');
    });
    $('.multisugg input').on('blur', function () {
        trgul = $(this).parent().find('ul');
        function clth() {
            trgul.removeClass('open');
            trgul.parent().removeClass('focused');
        }

        setTimeout(clth, 200);
    });
    $('.multisugg input').on('input', function () {
        lismv = $(this).val().toLowerCase();
        $(this).parent().find('li').each(function () {
            if (~$(this).text().toLowerCase().search(lismv) && lismv) {
                $(this).show()
            } else {
                $(this).hide()
            }
        });
    });
    $('.multisugg li').on('click', function () {
        console.log($(this).parent().parent().find('input').val());
        $(this).parent().parent().find('input').val($(this).text());
    });

    
</script>