
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header start -->
            <div class="row">
                <div class="main-header">
                    <h4>Search Daily Collection Sheet</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user/">Dashbord</a>
                        </li>
                        <li class="breadcrumb-item">Daily Collection Sheet
                        </li>
                    </ol>
                   
                </div>
            </div>
            <!-- Header end -->

            <div class="row">
                <!-- Form Control starts -->
                
                
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Search Daily Collection Sheet</h5>
                            
                        </div>
                        
                        <!-- end of modal -->
						<form name="companyform" id="signupform" method="post" action="<?php echo base_url();?>index.php/Reports/SearchDailyCollectionSheet" enctype="multipart/form-data" target="_blank">
                        <div class="card-block">
                            <div class="row">
                               <!--<div class="col-sm-12">
                                <div class="md-input-wrapper multisugg">
                                    <div class="md-input-wrapper multisugg">
                                        <input type="text" class="md-form-control" placeholder="Sales Person Name" name="empname"/>
                                        <ul class="md-form-control">
                                            <?php foreach($slperson as $persn){?>
                                            <li><?php echo $persn['clname'];?>-<?php echo $persn['cl_id'];?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>-->
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                     From Date :   <input type="date" class="md-form-control required" placeholder="From-Date" name="fdate" id="edate"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="md-input-wrapper">
                                      To Date :  <input type="date" class="md-form-control required" placeholder="To-Date" name="tdate" id="edate"/>
                                    </div>
                                </div>
                            </div>
                            
                          
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Search</button>
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
        $(this).parent().parent().parent().next().find('input').val($(this).data('price'));
		$(this).parent().parent().parent().next().next().next().next().find('input').val($(this).data('gst'));
    });
	</script>