<div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Sale Details of Bill No # <?php echo $bl_no;?></h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>user"><i class="icofont icofont-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>View/Purchase">Purchase Details</a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"></h5></div>
          <div class="card-block">
           <form name="companyform" id="pcform" method="post" action="<?php echo base_url();?>index.php/Update/returnSale" enctype="multipart/form-data">
           <input type="hidden" name="hidbill" value="<?php echo $pdetails[0]['pid'];?>"/>
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Item Name</th>
                <th>Item Qty</th>
                <th>Item Price</th>
                <th>Return Unit</th>
                <th>Remark</th>
                <th>Select Item</th>
              </tr>
              </thead>
              
             <tbody>
            <?php if($pdetails) { $i=1; foreach($pdetails as $row) {
			$unit = $this->db->query('SELECT * FROM td_unit WHERE uid='.$row['item_p_unit'])->result_array();
			?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['item_p_qty']; ?> <?php echo $unit[0]['stname']; ?></td>
                <td><?php echo $row['item_p_total_amt']; ?> (<?php echo $row['item_unit_p_price']; ?>/<?php echo $unit[0]['stname']; ?>)</td>
                <td><input type="text" class="md-form-control" name="r_unit[]"/></td>
                <td><input type="text" class="md-form-control" name="remark[]"/></td>
                <td><input type="checkbox" class="form-check-input itval" id="chkme" name="itemval[]" value="<?php echo $row['item_id'];?>"></td>               
                
              </tr>
            <?php } } else { ?>
            	<tr>
                	<td colspan="7" style="text-align:center">No records found</td>
                </tr>
            <?php } ?> 
            <tr>
                	<td colspan="7" style="text-align:center"> <button type="button" class="btn btn-success waves-effect waves-light m-r-30" onclick="getCheckedCheckboxesFor()">Submit</button> </td></tr>
            </tbody>
            </table>
           
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  function getCheckedCheckboxesFor() {
   var checkboxes = document.getElementsByClassName('itval');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any Item');
 } else {
    //alert(selected);
    //window.location.href = 'billing_multiple.php?bill_id='+selected;
    //window.open('<?php echo base_url();?>Update/returnPurchase/'+btoa(encodeURIComponent(selected)),'_blank');
	$('#pcform').submit();
 }
}
  </script>