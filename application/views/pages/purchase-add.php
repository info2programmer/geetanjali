<!-- Container-fluid starts -->
<div class="container-fluid">

    <!-- Header start -->
    <div class="row">
        <div class="main-header">
            <h4>Purchase Management</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>user/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user/">Dashbord</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>settings/PurchaseDetails">Purchase
                        Details</a>
                </li>
            </ol>
             <center><ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    </li><button type="button" class="btn btn-inverse-primary waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=""><a href="<?php echo base_url();?>View/Purchase" style="color:#FF0000;">View Purchase Details</a></button></li>
                     </ol>
        </center>
        </div>
    </div>
    <!-- Header end -->

    <div class="row">
        <!-- Form Control starts -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Purchase Details</h5>

                </div>
                <!-- end of modal -->
                <form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/add/purchase" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-block">
                        <div class="row">
                        <div class="col-sm-4">
                                <div class="md-input-wrapper multisugg">
                                    <div class="md-input-wrapper multisugg">
                                       <input type="text" class="md-form-control required" placeholder="Purchase Bill no" name="purchase-bno"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="md-input-wrapper multisugg">
                                    <div class="md-input-wrapper multisugg">
                                        <select class="md-form-control required" name="sup_name">
                                            <option value="" hidden selected>Select Supplier</option>
                                            <?php foreach($supplier as $splr){?>
                                            <option value="<?php echo $splr['clname'];?>-<?php echo $splr['cl_id'];?>"><?php echo $splr['clname'];?>-<?php echo $splr['cl_id'];?></option>
                                            <?php }?>
                                        </select>
                                       
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="md-input-wrapper multisugg">
                                    <div class="md-input-wrapper multisugg">
                                       Purchase Date : <input type="date" class="md-form-control required" placeholder="Purchase Date" name="purchase-date"/>
                                    </div>
                                </div>
                            </div>
                             

                        </div>
                        <div class="row">
                            <div class="col-xs-12 bill-item-list">

                                <!-- this is the last one with add button -->
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="md-input-wrapper multisugg">
                                            <input type="text" class="md-form-control required" placeholder="Item Name" name="item-name[]"/>
                                            <ul class="md-form-control">
                                            <?php foreach($items as $itemN){?>
                                                <li><?php echo $itemN['item_name'];?></li>
                                                <?php }?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="md-input-wrapper">
                                            <input type="text" class="md-form-control required" placeholder="Price" name="item-price[]"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="md-input-wrapper">
                                                    <input type="text" class="md-form-control required" placeholder="Qty" name="item-quantity[]"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="md-input-wrapper">
                                                    <select class="md-form-control required" name="item_qunit[]">
                                                        <option value="">Unit</option>
                                                        <?php foreach($unit as $unitn){?>
                                                        <option value="<?php echo $unitn['uid'];?>"><?php echo $unitn['stname'];?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="md-input-wrapper">
                                            <input type="text" class="md-form-control" placeholder="Total" name="item-total[]" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1" style="display:none;">
                                        <div class="md-input-wrapper">
                                            <input type="hidden" class="md-form-control required" placeholder="S Price" id="item-sale"  name="item-sale[]"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="md-input-wrapper">
                                            <input type="text" class="md-form-control required" placeholder="CGST" name="item-gst[]"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="md-input-wrapper">
                                            <input type="text" class="md-form-control required" placeholder="SGST" name="item-ost[]"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="md-input-wrapper">
                                            <input type="text" class="md-form-control" placeholder="Total S Price" name="item-totsal[]"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-success waves-effect waves-light m-t-10 m-r-5" onclick="addItemRow(this)">
                                            <i class="icofont icofont-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light m-t-10" onclick="removeItemRow(this)">
                                            <i class="icofont icofont-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /this is the last one with add button -->
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-8 text-right p-t-15">
                                Net Total
                            </div>
                            <div class="col-sm-2">
                                <div class="md-input-wrapper">
                                    <input type="text" class="md-form-control" placeholder="Net Total" name="all-total"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2 text-right p-t-15">
                                Select Invoice Copy
                            </div>
                            <div class="col-sm-4">
                                <div class="md-input-wrapper">
                                    <input type="file" class="md-form-control required" placeholder="Net Total" name="invice-copy"/>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right p-t-15">
                                Select Project
                            </div>
                            <div class="col-sm-4">
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

    var totall = 0;
    $('[name*=price], [name*=quantity], [name*=total], [name*=sale], [name*=gst], [name*=ost], [name*=totsal]').on('input', function () {
        totall = 0;
        if ($(this).is('[name*=price]') || $(this).is('[name*=sale]') || $(this).is('[name*=gst]') || $(this).is('[name*=ost]')) {
            p = parseFloat($(this).parent().parent().parent().find('[name*=price]').val());
            q = parseFloat($(this).parent().parent().parent().find('[name*=quantity]').val());
            s = parseFloat($(this).parent().parent().parent().find('[name*=sale]').val());
            gs = parseFloat($(this).parent().parent().parent().find('[name*=gst]').val());
			sgs = parseFloat($(this).parent().parent().parent().find('[name*=ost]').val());
            if ((p || p == 0) && (q || q == 0)) {
                $(this).parent().parent().parent().find('[name*=total]').val(p * q);
                $(this).parent().parent().parent().find('[name*=sale]').val(p * q);
            }
            if ((s || s == 0) && (gs || gs == 0) && (sgs || sgs == 0)) {
                $(this).parent().parent().parent().find('[name*=totsal]').val(s + ((s * gs) / 100)+ ((s * sgs) / 100))
            }
        } else if ($(this).is('[name*=quantity]')) {
            p = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=price]').val());
            q = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=quantity]').val());
            s = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=sale]').val());
            gs = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=gst]').val());
			sgs = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=ost]').val());
            if ((p || p == 0) && (q || q == 0)) {
                $(this).parent().parent().parent().parent().parent().find('[name*=total]').val(p * q);
                $(this).parent().parent().parent().parent().parent().find('[name*=sale]').val(p * q);
            }
            if ((s || s == 0) && (gs || gs == 0) && (sgs || sgs == 0)) {
                $(this).parent().parent().parent().parent().parent().find('[name*=totsal]').val(s + ((s * gs) / 100)+ ((s * sgs) / 100))
            }
        }
        $('[name*="item-totsal"]').each(function () {
            if (parseFloat($(this).val())) {
                totall += parseFloat($(this).val())
            }
            $('[name="all-total"]').val(totall);
        })
    });

    function addItemRow(ths) {
        ths = $(ths);
        addable = '<div class="row">'
            + '<div class="col-sm-2">'
            + '<div class="md-input-wrapper multisugg">'
            + '<input type="text" class="md-form-control required" placeholder="Item Name" name="item-name[]"/><span class="md-line"></span>'
            + '<ul class="md-form-control">'
			<?php foreach($items as $itemN){?>
            +'<li><?php echo $itemN['item_name'];?></li>'
            <?php }?>
            + '</ul>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-1">'
            + '<div class="md-input-wrapper">'
            + '<input type="text" class="md-form-control required" placeholder="Price" name="item-price[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-2">'
            + '<div class="row">'
            + '<div class="col-sm-6">'
            + '<div class="md-input-wrapper">'
            + '<input type="text" class="md-form-control required" placeholder="Qty" name="item-quantity[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-6">'
            + '<div class="md-input-wrapper">'
            + '<select class="md-form-control required" name="item_qunit[]">'
            + '<option value="">Unit</option>'
			 <?php foreach($unit as $unitn){?>
            + '<option value="<?php echo $unitn['uid'];?>"><?php echo $unitn['stname'];?></option>'
             <?php }?>
            + '</select><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-2">'
            + '<div class="md-input-wrapper">'
            + '<input type="text" class="md-form-control" placeholder="Total" name="item-total[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-1" style="display:none;">'
            + '<div class="md-input-wrapper">'
            + '<input type="hidden" class="md-form-control required" placeholder="S Price" name="item-sale[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-1">'
            + '<div class="md-input-wrapper">'
            + '<input type="text" class="md-form-control required" placeholder="CGST" name="item-gst[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
			+ '<div class="col-sm-1">'
            + '<div class="md-input-wrapper">'
            + '<input type="text" class="md-form-control required" placeholder="SGST" name="item-ost[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-1">'
            + '<div class="md-input-wrapper">'
            + '<input type="text" class="md-form-control" placeholder="Total S Price" name="item-totsal[]"/><span class="md-line"></span>'
            + '</div>'
            + '</div>'
            + '<div class="col-sm-2">'
            + '<button type="button" class="btn btn-success waves-effect waves-light m-t-10 m-r-5" onclick="addItemRow(this)">'
            + '<i class="icofont icofont-plus"></i>'
            + '</button>'
            + '<button type="button" class="btn btn-danger waves-effect waves-light m-t-10" onclick="removeItemRow(this)">'
            + '<i class="icofont icofont-minus"></i>'
            + '</button>'
            + '</div>'
            + '</div>';
        ths.parent().parent().parent().append(addable);
        ths.remove();
        $('[name*=price], [name*=quantity], [name*=total], [name*=sale], [name*=gst], [name*=ost], [name*=totsal]').on('input', function () {
            totall = 0;
            if ($(this).is('[name*=price]') || $(this).is('[name*=sale]') || $(this).is('[name*=gst]') || $(this).is('[name*=ost]')) {
                p = parseFloat($(this).parent().parent().parent().find('[name*=price]').val());
                q = parseFloat($(this).parent().parent().parent().find('[name*=quantity]').val());
                s = parseFloat($(this).parent().parent().parent().find('[name*=sale]').val());
                gs = parseFloat($(this).parent().parent().parent().find('[name*=gst]').val());
				sgs = parseFloat($(this).parent().parent().parent().find('[name*=ost]').val());
                if ((p || p == 0) && (q || q == 0)) {
                    $(this).parent().parent().parent().find('[name*=total]').val(p * q);
                    $(this).parent().parent().parent().find('[name*=sale]').val(p * q);
                }
                if ((s || s == 0) && (gs || gs == 0) && (sgs || sgs == 0)) {
                    $(this).parent().parent().parent().find('[name*=totsal]').val(s + ((s * gs) / 100)+ ((s * sgs) / 100))
                }
            } else if ($(this).is('[name*=quantity]')) {
                p = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=price]').val());
                q = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=quantity]').val());
                s = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=sale]').val());
                gs = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=gst]').val());
				sgs = parseFloat($(this).parent().parent().parent().parent().parent().find('[name*=ost]').val());
                if ((p || p == 0) && (q || q == 0)) {
                    $(this).parent().parent().parent().parent().parent().find('[name*=total]').val(p * q);
                    $(this).parent().parent().parent().parent().parent().find('[name*=sale]').val(p * q);
                }
                if ((s || s == 0) && (gs || gs == 0)) {
                    $(this).parent().parent().parent().parent().parent().find('[name*=totsal]').val(s + ((s * gs) / 100)+ ((s * sgs) / 100))
                }
            }
            $('[name*="item-totsal"]').each(function () {
                if (parseFloat($(this).val())) {
                    totall += parseFloat($(this).val())
                }
                $('[name="all-total"]').val(totall);
            })
        });
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
    }
    function removeItemRow(ths) {
        ths = $(ths);
        ths.parent().parent().remove();
        addable = '<div class="col-sm-2">'
            + '<button type="button" class="btn btn-success waves-effect waves-light m-t-10 m-r-5" onclick="addItemRow(this)">'
            + '<i class="icofont icofont-plus"></i>'
            + '</button>'
            + '<button type="button" class="btn btn-danger waves-effect waves-light m-t-10" onclick="removeItemRow(this)">'
            + '<i class="icofont icofont-minus"></i>'
            + '</button>'
            + '</div>';
        $('.bill-item-list').children().last().children().last().remove();
        $('.bill-item-list').children().last().append(addable);
        totall = 0;
        $('[name*="item-totsal"]').each(function () {
            if (parseFloat($(this).val())) {
                totall += parseFloat($(this).val())
            }
            $('[name="all-total"]').val(totall);
        })
    }

    // function funChange(amt)
    // {
    //     document.getElementById("item-sale").value=amt;
    // }
</script>