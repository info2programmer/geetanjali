<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pragati Profit Loss</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 30px;
	text-decoration:underline;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
.style3 {
	font-size: 20px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style6 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.style7 {font-family: Arial, Helvetica, sans-serif;}
.style8 {font-family:Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }
-->
@media print {
  #printPageButton {
    display: none !important;
  }
}
</style>
</head>

<body>
<button id="printPageButton" onClick="window.print();" style="display: block; background: #eee; border: 1px solid #ccc; padding: 7px 13px; text-transform: uppercase; margin: auto;">Print</button>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1134" align="center" valign="top"><p><span class="style1"><br />
      PRAGATI</span><br />
      <br />
      <span class="style2"><span class="style3">PROFIT LOSS</span></span><br />
      <br />
      <span class="style4">
        <span class="style2"><span class="style7" style="display:block; float:left; padding:6px 6px 6px 6px; border:1px dashed #000000; background-color:#DFDFDF;">RECEIPTS</span></span>
        From : <u><?php echo $fdate; ?></u> To : <u><?php echo $tdate; ?></u></span>
      <span class="style2"><span class="style7" style="display:block; float:right; padding:6px 6px 6px 6px; border:1px dashed #000000; background-color:#DFDFDF;">PAYMENTS</span></span></p>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        
        <tr>
          <td width="48" align="center" valign="top">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top: 2px solid #000000; font-family: Arial, Helvetica, sans-serif;">
            <tr>            
            <?php 
			$ob1 = $this->db->query("SELECT sum(amount) as op_bal1 FROM `td_finance` where entry_date<'$fdate' and transaction_type='Credit'")->row();
			$cb1 = $this->db->query("SELECT sum(amount) as cl_bal1 FROM `td_finance` where entry_date>='$fdate' and entry_date<='$tdate' and transaction_type='Credit'")->row();
			?>
              <td height="25" colspan="7" align="left" valign="middle"><span class="style6"><!--<span style="font-weight:bold;font-style:italic;">&nbsp;Opening Balance : Rs. <?php echo number_format($ob1->op_bal1,2);?></span>--></span></td>
            </tr>
            <tr>
              <td width="47" rowspan="2" align="center" valign="middle" class="style8">Sl. No.</td>
              <td width="69" rowspan="2" align="center" valign="middle" class="style8">Date</td>
              <td width="91" rowspan="2" align="center" valign="middle" class="style8">C/B No</td>
              <td width="160" rowspan="2" align="center" valign="middle" class="style8">PARTICULARS</td>
              <td width="66" rowspan="2" align="center" valign="middle" class="style8">L/F No.</td>
              <td height="18" colspan="2" align="center" valign="middle" class="style8">Amount</td>
            </tr>
            <tr>
              <td width="88" height="18" align="center" valign="middle" class="style8">Rs.</td>
              <td width="43" height="18" align="center" valign="middle" class="style8">P.</td>
            </tr>
            <?php if($rows) { $i=1; foreach($rows as $row) { ?>
            <tr>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $i++; ?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo date_format(date_create($row->entry_date), "d.m.Y");?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $row->cb_no; ?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php 
			  $particulars = $row->finance_type;
			  if($row->bill_no!='NA')
			  { $particulars .= " - ".$row->bill_no; }
			  echo $particulars;
			  ?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $row->lf_no; ?></td>
              <?php 
			  $amount = explode(".", number_format($row->amount,2)); 
			  ?>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $amount[0];?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $amount[1];?></td>
            </tr>
            <?php } } ?>
            <tr>
              <td height="25" colspan="5" align="right" valign="middle" class="style6"><span style="font-weight:bold;font-style:italic;">Total : Rs. &nbsp;</span></td>
              <td height="25" colspan="2" align="right" valign="middle" class="style6"><span style="font-weight:bold;font-style:italic;"><?php 
			  $incoming = $ob1->op_bal1+$cb1->cl_bal1;
			  echo number_format(($ob1->op_bal1+$cb1->cl_bal1),2);?></span></td>
              </tr>
          </table>
          </td>
          <td width="4%">&nbsp;</td>
          <td width="48%" align="center" valign="top">
          <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border-top: 2px solid #000000; font-family: Arial, Helvetica, sans-serif;">
          <?php 
		  $ob2 = $this->db->query("SELECT sum(amount) as op_bal2 FROM `td_finance` where entry_date<'$fdate' and transaction_type='Debit'")->row();
		  $cb2 = $this->db->query("SELECT sum(amount) as cl_bal2 FROM `td_finance` where entry_date>='$fdate' and entry_date<='$tdate' and transaction_type='Debit'")->row();
		  ?>
            <tr>
              <td height="25" colspan="7" align="left" valign="middle"><span class="style6"><!--<span style="font-weight:bold;font-style:italic;">&nbsp;Opening Balance : Rs. <?php echo number_format($ob2->op_bal2,2);?></span>--></span></td>
            </tr>
            <tr>
              <td width="47" rowspan="2" align="center" valign="middle" class="style8">Sl. No.</td>
              <td width="69" rowspan="2" align="center" valign="middle" class="style8">Date</td>
              <td width="91" rowspan="2" align="center" valign="middle" class="style8">C/B No</td>
              <td width="160" rowspan="2" align="center" valign="middle" class="style8">PARTICULARS</td>
              <td width="66" rowspan="2" align="center" valign="middle" class="style8">L/F No.</td>
              <td height="18" colspan="2" align="center" valign="middle" class="style8">Amount</td>
              </tr>
            <tr>
              <td width="88" height="18" align="center" valign="middle" class="style8">Rs.</td>
              <td width="43" height="18" align="center" valign="middle" class="style8">P.</td>
            </tr>
            <?php if($rows1) { $j=1; foreach($rows1 as $row1) { ?>
            <tr>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $j++; ?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo date_format(date_create($row1->entry_date), "d.m.Y");?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $row1->cb_no; ?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php 
			  $particulars1 = $row1->finance_type;
			  if($row1->bill_no!='NA')
			  { $particulars1 .= " - ".$row1->bill_no; }
			  echo $particulars1;
			  ?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $row1->lf_no; ?></td>
              <?php 
			  $amount1 = explode(".", number_format($row1->amount,2)); 
			  ?>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $amount1[0];?></td>
              <td height="25" align="center" valign="middle" class="style6"><?php echo $amount1[1];?></td>
            </tr>
            <?php } } ?>
            <tr>
              <td height="25" colspan="5" align="right" valign="middle" class="style6"><span style="font-weight:bold;font-style:italic;">Total : Rs. &nbsp;</span></td>
              <td height="25" colspan="2" align="right" valign="middle" class="style6"><span style="font-weight:bold;font-style:italic;"><?php 
			  $outgoing = $ob2->op_bal2+$cb2->cl_bal2;
			  echo number_format(($ob2->op_bal2+$cb2->cl_bal2),2);?></span></td>
              </tr>
          </table>
          </td>
        </tr>
        <tr>
        	<td>
            <span style="font-weight:bold;">
       <?php $res = $incoming-$outgoing; 
		if($res<0) {
		?>    
        Loss :
        <?php } else { ?>
        Profit 
        <?php } ?> 
		<?php echo "( ".number_format($incoming,2)." - ".number_format($outgoing,2)." ) = ".number_format(($incoming-$outgoing),2); ?></span> 
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      &nbsp; 
      <p><br />
        <br />
    </p></td>
  </tr>
</table>
</body>
</html>
