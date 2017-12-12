<?php 
$customer = $this->db->query('SELECT * FROM td_supplier WHERE cl_id='.$billdata[0]['supplier_name'])->result_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        @font-face {
            font-family: 'Eczar';
            src: url('Eczar-Regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        html, body {padding: 0; margin: 0; font-family: sans-serif}

        table {width: 100%; border-collapse: collapse; padding: 0; margin: 0}
        td, th {vertical-align: top; font-size: 14px; line-height: 20px}

        .bill-outer {
            /*transform-origin: top left;*/
            /*transform: rotate(-90deg) translateX(-100%);*/
            width: 5.3in;
            /*height: 7in;*/
            float: left;
            margin-left: 0.3in;
			page-break-inside:avoid;
        }
        .bill-outer:nth-child(2n) {
            margin-left: 0;
        }
        /*.bill {height: 431px}*/
        .bill th {border: 1px solid; text-align: center; vertical-align: middle;}
        .bill td {border-left: 1px solid; border-right: 1px solid; text-align: center; vertical-align: top; padding: 0 5px}
        .bill td:nth-child(1) {}
        .bill td:nth-child(2) {text-align: left}
        .bill td:nth-child(3) {text-align: right}
        .bill td:nth-child(4) {text-align: right}
        .bill td:nth-child(5) {text-align: right}
        /*.items td:first-child {border-left: none}*/
        /*.items td:last-child {border-right: none}*/
        .items {width: calc(100% + 1px)}
        .fake-line {position: absolute; left: 0; top: 0; width: calc(100% + 1px)}
        .fake-line td {height: 360px}
		
		@media print {
			.bill-outer {float: right;}
		}
    </style>
</head>
<body>
<table class="bill-outer">
    <thead>
    <tr>
        <th>
            <table>
                <tr>
                    <td width="40%" align="left" valign="top">Bill No. <?php echo $billdata[0]['p_bill_no'];?></td>
                    <td width="20%" align="center" valign="top"><span style="font-family: Eczar; font-size: 32px; line-height: 36px">ॐ</span><br><span style="font-family: 'Gill Sans MT Condensed'; font-size: 16px; text-decoration: underline">ESTIMATE</span></td>
                    <td width="40%" align="right" valign="top">Office: 27016795<br>Mobile : 9831271763<br>9831842574</td>
                </tr>
            </table>
        </th>
    </tr>
    <tr>
        <th>
            <table>
                <tr>
                    <td width="18%" align="left" valign="top"><img style="margin-top: 2px" width="70" src="data:image/jpeg;base64,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" alt=""></td>
                    <td width="64%" align="center" valign="top">
                        <span style="font-family: 'Segoe UI Black'; font-size: 28px; line-height: 32px">MISHRA BROTHERS</span><br>
                        <span style="font-size: 18px; line-height: 22px; font-style: italic">Wholesale Dealers in Pulses Goods</span><br>
                        <span style="font-family: 'Gill Sans MT Condensed'; font-size: 16px">5/48/U Jagti Pota (Anandapur), Gr. floor, Kolkata - 700 152</span>
                    </td>
                    <td width="18%" align="right" valign="top"><img style="margin-top: 2px" width="70" src="data:image/jpeg;base64,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" alt=""></td>
                </tr>
            </table>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <table>
                <tr>
                    <td width="70" align="left" valign="top" style="font-family: 'Gill Sans MT'; font-size: 16px; font-weight: bold">Name</td>
                    <td align="left" valign="top" style="font-family: 'Gill Sans MT'; font-size: 16px"><?php echo $customer[0]['clname'];?></td>
                </tr>
                <tr>
                    <td height="42" align="left" valign="top" style="font-family: 'Gill Sans MT'; font-size: 16px; font-weight: bold">Address</td>
                    <td height="42" align="left" valign="top" style="font-family: 'Gill Sans MT'; font-size: 16px"><?php echo $customer[0]['cladd'];?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table class="bill">
                <thead>
                <tr>
                    <th width="12%" rowspan="2">Qty.</th>
                    <th width="50%" rowspan="2">DESCRIPTION</th>
                    <th width="12%" rowspan="2">Rate</th>
                    <th colspan="2">Amount</th>
                </tr>
                <tr>
                    <th width="16%">Rs.</th>
                    <th width="10%">P.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td height="360" colspan="6" style="padding: 0!important; border: none!important; position: relative">
                        <table class="fake-line">
                            <tr>
                                <td width="12%">&nbsp;</td>
                                <td width="50%">&nbsp;</td>
                                <td width="12%">&nbsp;</td>
                                <td width="16%">&nbsp;</td>
                                <td width="10%">&nbsp;</td>
                            </tr>
                        </table>
                        <table class="items">
                        <?php $i=1; foreach($billitem as $bitems){
						$unit = $this->db->query('SELECT * FROM td_unit WHERE uid='.$bitems['item_p_unit'])->result_array();
						$tprice[] = $bitems['item_unit_p_price']*$bitems['item_p_qty'];
						?>
                            <tr>
                                <td width="12%"><?php echo $bitems['item_p_qty'];?> <?php echo $unit[0]['stname']; ?></td>
                                <td width="50%"><?php echo $bitems['item_name'];?></td>
                                <td width="12%"><?php echo $bitems['item_unit_p_price'];?></td>
                                <td width="16%"><?php echo $bitems['item_unit_p_price']*$bitems['item_p_qty'];?></td>
                                <td width="10%">00</td>
                            </tr>
                            <?php $i++;} ?>
                        </table>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2"></th>
                    <th>Total</th>
                    <th><?php echo array_sum($tprice);?></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>
            <table>
                <tr>
                    <td width="75%" align="left" valign="top"><strong>N.B.:</strong> No claim regarding weight, rate & quality will be accepted after delivery.</td>
                    <td align="center" valign="top">E. & O.E.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><strong>Date :</strong> <?php echo $billdata[0]['p_bill_date'];?></td>
                    <td align="center" valign="top">Signature</td>
                </tr>
            </table>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>