<div class="container-fluid">
        <!-- Header Starts -->
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>ROI CHART REPORT <span style="color:#FF0000"># <?php echo $customer[0]['clname'];?></span></h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>reports/RoiDetails">Chart Report</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Header end -->
        <!--<div class="row">
<div class=" col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Bar chart</h5>
                            </div>
                            <div class="card-block">
                                <canvas id="barChart" width="900" height="600"></canvas>
                            </div>
                        </div>
                    </div>
                    </div>-->
        <!-- Row Starts -->
        <div class="row">
            <!-- Line Chart start -->
           <!-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Sales Chart</h5>
                    </div>
                    <div class="card-block">
                        <div id="line-example"></div>
                    </div>
                </div>
            </div>-->
            <!-- Line Chart end -->

           

            <!-- Donut chart start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Sales chart</h5>
                    </div>
                    <div class="card-block">
                        <div id="donut-example"></div>
                    </div>
                </div>
            </div>
            <!-- Donut chart end -->
        </div>
    </div>
    <?php 
	
	foreach($rows as $mslcnt){
	$sbinsls = $this->db->query('SELECT * FROM td_sales_item WHERE pid='.$mslcnt['p_bill_id'])->result_array();
	foreach($sbinsls as $sdtlds){
	
	//echo 'SELECT item_unit_p_price FROM td_purchase_item WHERE item_name ="'.$sdtlds['item_name'].'"';
	$sbinfop = $this->db->query('SELECT item_unit_p_price FROM td_purchase_item WHERE item_name ="'.$sdtlds['item_name'].'"')->result_array();
	$unit = $sdtlds['item_p_qty']-$sdtlds['return_unit'];
	 $itpids[] = $sbinfop[0]['item_unit_p_price']*$unit;
	}
	//print_r($itpids);die;exit;
	$tpurprice[]=array_sum($itpids);

$saleP[] = $mslcnt['p_bill_total'];

	}
	
	?>
  <?php function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}?>     
    <script>
    $(document).ready(function() {
 
  //lineChart();
  donutChart();

  $(window).resize(function() {
    window.lineChart.redraw();
    window.donutChart.redraw();
  });
});

   /*Line chart*/
/*function lineChart() {
  window.lineChart = Morris.Line({
        element: 'line-example',
        data: [
		<?php foreach($rows as $roidtl){
		?>
            { y: '<?php echo $roidtl['p_bill_date'];?>', a: <?php echo $roidtl['p_bill_total'];?>},
			<?php }?>
            
        ],
        xkey: 'y',
        redraw: true,
        ykeys: ['a'],
        labels: ['Series A'],
        lineColors :['#2196F3']
    });
}
*/


 /*Donut chart*/
function donutChart() {
  window.areaChart = Morris.Donut({
        element: 'donut-example',
    redraw: true,
        data: [
		<?php foreach($rows as $roidtl){?>
            {label: "<?php echo $roidtl['p_bill_date'];?>", value: <?php echo $roidtl['p_bill_total'];?>},
			<?php }?>
        ],
        colors : [<?php foreach($rows as $roidtl){?>'<?php echo rand_color();?>',<?php }?>]
    });
}

    </script>