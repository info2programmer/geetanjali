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
-->
</style></head>

<body>
<table width="655" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="655" height="1020" align="center" valign="top">
    <?php foreach($sales as $sreport){
	$customer = $this->db->query('SELECT * FROM td_client WHERE cl_id='.$sreport['customer_name'])->result_array();
	$sale_payment = $this->db->query('SELECT SUM(paid_amt) AS stotamt FROM td_sales_payment WHERE bill_no='.$sreport['p_bill_no'])->result_array();
	$sale_paymentlast = $this->db->query('SELECT * FROM td_sales_payment WHERE bill_no='.$sreport['p_bill_no'].' AND notify=1')->result_array();
	$emp = $this->db->query('SELECT * FROM td_employee WHERE emp_id='.$sreport['emp_name'])->result_array();
	/*$sale_items = $this->db->query('SELECT * FROM td_sales_item WHERE pid='.$sreport["p_bill_id"])->result_array();
	$sale_return = $this->db->query('SELECT * FROM td_return_details WHERE item_id IN() AND return_type="Sales"')->result_array();*/
	?>
    <table width="630" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse; font-family:Arial, Helvetica, sans-serif; font-size:11px;">
      <tr>
        <td colspan="3" align="left" valign="middle"><strong>MISHRA BROTHERS<br/> Wholesale Dealers in Pulses Goods, 5/48/U Jagti Pota (Anandapur), Gr. floor, Kolkata - 700 152</strong></td>
        <td align="left" valign="middle"><strong>Bill No:</strong> <?php echo $sreport['p_bill_no'];?></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><strong>Customer Name:</strong><?php echo $customer[0]['clname'];?></td>
        <td width="127" align="left" valign="middle"><strong>Sale Date:</strong> <?php echo $sreport['p_bill_date'];?></td>
        <td width="164" align="left" valign="middle"><strong>Collection Date:</strong> <?php if(!empty($sale_paymentlast[0]['next_pay_date'])){echo $sale_paymentlast[0]['next_pay_date'];}?></td>
      </tr>
      <tr>
        <td width="138" align="left" valign="middle"><strong>Sale Price (Rs): </strong><?php echo $sreport['p_bill_total'];?></td>
        <td width="167" align="left" valign="middle"><strong>Collection Amt  (Rs: ) </strong><?php echo $sale_payment[0]['stotamt'];?></td>
        <td align="left" valign="middle"><strong>Collected Amount (Rs.):</strong></td>
        <td align="left" valign="middle"><strong>Due Amt (Rs): </strong><?php echo $sreport['due_amt'];?></td>
        
      </tr>
      <tr>
      <td colspan="2" valign="middle"><strong>Sales Person's Name :</strong><?php echo $emp[0]['name'];?></td>
        <td colspan="2" align="left" valign="middle"><strong>Signature</strong> </td>
       
        </tr>
      <tr>
        <td colspan="4" align="left" valign="middle">&nbsp;</td>
        </tr>
    </table>
    <?php } ?>
    
    
    </td>
  </tr>
</table>
</body>
</html>
