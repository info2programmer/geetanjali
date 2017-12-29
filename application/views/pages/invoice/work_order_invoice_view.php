<?php
  function getIndianCurrency( $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "and " . ($words[$decimal - ($decimal % 10)] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Work Order Invoice</title>
    <meta name="description" content="">
    <meta name="author" content="projukti">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
    <style>
        thead{
            display:table-header-group;/*repeat table headers on each page*/
        }
        tfoot{
            display:table-footer-group;/*repeat table footers on each page*/
        }
        body {font-size: 13px; font-family: 'Times New Roman', serif; line-height: 13px}
        table {box-sizing: border-box; width: 100%; border-collapse: collapse; border-spacing: 0}
        .normal {font-weight: normal}
        table table {margin: -1px -6px; min-height: 100%; width: calc(100% + 12px); font-weight: normal}
        table.w40 {width: 35%; margin: 5px !important; float: left}
        table table.no-overlap {margin: 0}
        table td, table th {padding: 1px 5px; vertical-align: top; text-align: left}
        .bordered:not(tr) {border: 1px solid}
        tr.bordered > th, tr.bordered > td {border-top: 1px solid; border-bottom: 1px solid}
        tr.bordered > th:first-child, tr.bordered > td:first-child {border-left: 1px solid}
        tr.bordered > th:last-child, tr.bordered > td:last-child {border-right: 1px solid}
        .bordered-all td, .bordered-all th {border: 1px solid}
        .right {text-align: right}
        .center {text-align: center}
        .bold {font-weight: bold}
        .bottom {vertical-align: bottom}
        .huge {font-size: 16px; line-height: 16px; font-weight: bold}
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="8">
            <table class="bordered no-overlap w40">
                <tr>
                    <td>
                        Gitanjali Developers<br>
                        BD 61 action Area -I  new town<br>
                        Near 4 no tank <br>
                        Kolkata - 700156 <br>
                        <br>
                        Contact No. : +919804212728<br>
                        <!-- VAT No. : --><br>
                        <!-- PAN No. : --><br>
                    </td>
                </tr>
            </table>
            <table class="bordered no-overlap w40">
                <tr>
                    <td>
                        <strong>Billing Address & Contact Details</strong><br>
                        BD 61 action Area -I  new town<br>
                        Near 4 no tank<br>
                        Kolkata - 700156 <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
            </table>
        </th>
    </tr>
    <tr class="bordered">
        <th colspan="8" class="center huge">
            LABOUR WORK ORDER
        </th>
    </tr>
    <tr class="bordered">
        <th colspan="4" class="normal">
            To,<br>
            <strong>Labour Contract Details</strong><br>
            <?php echo $contractor_data[0]['contractor_name'] ?>,<br>
           
            <?php echo $contractor_data[0]['contractor_address'] ?>,<strong><br>
            <strong>Tel No.</strong><?php echo $contractor_data[0]['contractor_phone']; ?>,<br>
            <strong>Email Id:</strong><?php echo $contractor_data[0]['contractor_email']; ?><br>
        </th>
        <th colspan="4" class="normal">
            <table>
                <tr>
                    <td class="bold"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="bold"></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td class="bold"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="bold"></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td class="bold">.</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="bold"></td>
                    <td></td>
                </tr>
            </table>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr class="bordered-all">
        <th class="bold">SL. No.</th>
        <th class="bold">Item Name</th>
        <th class="bold" colspan="2">Project Name</th>
        <th class="bold">Total Amount</th>
        <th class="bold">TDS-Percentage</th>  
        <th class="bold" colspan="2">Amount</th>
    </tr>
    <tr class="bordered-all">
        <td>1</td>
        <td><?php echo $rows[0]['order_name'] ?></td>
        <td colspan="2"><?php $project_name[0]['project_name'] ?></td>
        <td><?php echo number_format($rows[0]['order_total'],2) ?></td>
        <td class="right"><?php echo $rows[0]['order_tds'] ?></td>
        <td class="right" colspan="2"><?php echo number_format($rows[0]['total_after_tds'],2) ?></td>
    </tr>
    <tr class="bordered-all">
        <td colspan="8"><br>
            <strong>Specification / Details :</strong><br/>
            <?php echo $rows[0]['order_details'] ?>
        </td>
    </tr>
    <tr class="bordered">
        <td colspan="7" class="bold">GROSS AMOUNT - <?php echo getIndianCurrency($rows[0]['total_after_tds'],2) ?>.</td>
        <td class="right"><?php echo number_format($rows[0]['total_after_tds'],2) ?></td>
    </tr>
    <tr class="bordered">
        <td colspan="8">
            <strong>Terms & Conditions</strong><br>
            <strong>a) Incoterms :</strong> Rates including Supply and Fitting<br>
            <strong>b) Payment Terms :</strong><br>
            20% Advance; 70% DURING THE JOB ON SUBMISSION OF BILL;<br>
            Balance 10 %  after completion of the job.<br>
            T.D.S will be deducted as applicable<br>
            <strong>General Terms & Conditions</strong><br>
            <strong>Other Terms :</strong><br>
            <strong>1) Transportation, Loading and Unloading Charges :</strong> All included<br>
            <strong>2) Delivery and Completion Shedule :</strong> Material Delivery and Laying / Fixing job will be completed within 10-15 days from the date of receiving P.O with advance.<br>
            <strong>3) Materials to be used :</strong> for the laying and fixing is of Sika make materials and Adhesive, joint putting of white cement. etc<br>
            <br>
            <br>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr class="bordered">
        <td colspan="4" height="100" class="bottom">
            ( Authorized Signatory )
        </td>
        <td colspan="4" height="100" class="bottom right">
            ( Authorized Signatory )
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>