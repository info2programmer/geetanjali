
        <!-- Header end -->
<?php //print_r($sales1);?>
       <div class="chartlist">
            <!-- Container starts -->
            <div class="container-fluid">
                <!-- Header Starts -->
                <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>Purchase / Sales Chart Report</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>reports/ChartReport">Chart Report</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
                <!-- Header end -->

                <!-- Row Starts -->
                <div class="row">
                  
                    <div class=" col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Purchase / Date</h5>
                            </div>
                            <div class="card-block">
                                <canvas id="pieChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                       <div class=" col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Sales / Date</h5>
                            </div>
                            <div class="card-block">
                                <canvas id="pieChart1" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                  
                    <div class=" col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Sales / Route</h5>
                            </div>
                            <div class="card-block">
                                <canvas id="pieChart2" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    
                </div>-->
            </div>
            <!-- Container ends -->
        </div>
   <?php function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}?>     
<script>
 
$(document).ready(function(){
// For Purchase
var pieElem=document.getElementById("pieChart");
  var data4 = {
    labels: [
	<?php foreach($Purchase as $psl){?>
      "<?php echo $psl['p_bill_date'];?>",
	  <?php } ?>
    ],
    datasets: [
      {
        data: [<?php foreach($Purchase as $pslb){?><?php echo $pslb['p_bill_total'];?>,<?php }?>],
        backgroundColor: [
		<?php $i=1; foreach($Purchase as $pslc){?>
		<?php $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'); $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; ?>
		"<?php echo $color;?>",
	  <?php $i++; } ?>  
        ],
        hoverBackgroundColor: [
          <?php $i=1; foreach($Purchase as $pslcb){?>
		"<?php echo rand_color();?>",
	  <?php $i++; } ?>  
        ]
      }]
  };
  var myPieChart = new Chart(pieElem,{
    type: 'pie',
    data: data4
  });

  
  // For Sales
  var pieElem=document.getElementById("pieChart1");
  var data4 = {
    labels: [
	<?php foreach($sales as $sl){?>
      "<?php echo $sl['p_bill_date'];?>",
	  <?php } ?>
    ],
    datasets: [
      {
        data: [<?php foreach($sales as $slb){?><?php echo $slb['p_bill_total'];?>,<?php }?>],
        backgroundColor: [
		<?php $i=1; foreach($sales as $slc){?>
		<?php $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'); $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; ?>
		"<?php echo $color;?>",
	  <?php $i++; } ?>  
        ],
        hoverBackgroundColor: [
          <?php $i=1; foreach($sales as $slcb){?>
		"<?php echo rand_color();?>",
	  <?php $i++; } ?>  
        ]
      }]
  };

  var myPieChart = new Chart(pieElem,{
    type: 'pie',
    data: data4
  });

  
  
  // For Route
  
 /* var pieElem=document.getElementById("pieChart2");
  var data4 = {
   labels: [
	<?php foreach($sales as $sl){?>
      "<?php echo $sl['p_bill_date'];?>",
	  <?php } ?>
    ],
    datasets: [
      {
        data: [<?php foreach($sales as $slb){?><?php echo $slb['p_bill_total'];?>,<?php }?>],
        backgroundColor: [
		<?php $i=1; foreach($sales as $slc){?>
		<?php $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'); $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)]; ?>
		"<?php echo $color;?>",
	  <?php $i++; } ?>  
        ],
        hoverBackgroundColor: [
          <?php $i=1; foreach($sales1 as $slcb){?>
		"<?php echo rand_color();?>",
	  <?php $i++; } ?>  
        ]
      }]
  };


  var myPieChart = new Chart(pieElem,{
    type: 'pie',
    data: data4
  });*/

 
  });
</script>        