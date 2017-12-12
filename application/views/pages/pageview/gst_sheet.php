<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRAGATI - Collection Sheet</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {color: #000000}
-->
</style>
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script type="text/javascript">
       var tableToExcel = (function () {
           var uri = 'data:application/vnd.ms-excel;base64,'
   , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
   , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
   , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
           return function (table, name) {
               if (!table.nodeType) table = document.getElementById(table)
               var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
               window.location.href = uri + base64(format(template, ctx))
           }
       })()
   </script>
</head>

<body>
<p><a href="javascript:void(0)" onclick="tableToExcel('testTable', 'W3C Example Table')">Download</a></p>
<center><p style="border:2px dotted #0099FF; padding:5px 5px 5px 5px; width:340px; background-color:#0099FF; color:#fff;">GST Return From "<?php echo $fsdat;?>" To "<?php echo $lsdat;?>"</p></center>
<table width="900" border="1" cellspacing="0" cellpadding="5" align="center" id="testTable" style="border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
  <tr style="background-color:#999999; color:#FFFFFF;">
    
    <td bgcolor="#CCCCCC"><span class="style1">Date</span></td>
    <td bgcolor="#CCCCCC"><span class="style1">CGST Amount</span></td>
    <td bgcolor="#CCCCCC"><span class="style1">SGST Amount</span></td>
    <td bgcolor="#CCCCCC"><span class="style1">Total</span></td>
  </tr>
  <?php foreach($sales as $allsales){
  $gstdtl = $this->db->query('SELECT * FROM td_sales_item WHERE pid='.$allsales['p_bill_id'])->result_array();
  $i=1;
  foreach($gstdtl as $gstitem){
  ?>
  <tr>
    
    <td><?php echo $allsales['p_bill_date'];?></td>
    <td><?php echo $gstitem['item_s_cgst_amt'];?></td>
    <td><?php echo $gstitem['item_s_gst_amt'];?></td>
    <td><?php $tot[] = ($gstitem['item_s_cgst_amt']+$gstitem['item_s_gst_amt']);echo $gstitem['item_s_cgst_amt']+$gstitem['item_s_gst_amt'];?></td>
  </tr>
  <?php $i++;}} ?>
  <tr>
    <td colspan="3" align="right" valign="middle">Grand Total</td>
    <td><?php echo array_sum($tot);?></td>
  </tr>
</table>

</body>
</html>
