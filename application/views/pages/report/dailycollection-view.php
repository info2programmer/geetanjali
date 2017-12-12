<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        .right, table td:not(:first-child):not(:nth-child(2)) {text-align: right}
        .center, table thead th, table td:first-child, table td:nth-child(2) {text-align: center}
        table {width: 842px; border-collapse: collapse; font-family: monospace}
        table td {padding: 2px; border: 1px solid #555}
        table thead th, table tfoot th {border: 1px solid #555; background: #eee}
        table.out {font-family: "Lucida Sans"}
        table.out > tbody > tr > td {border: none!important;}
        h3, h5 {margin: 10px}

        @media print {
            table {width: 100%}
			#printPageButton {
				display: none !important;
			}
        }
    </style>
</head>
<body>
<button id="printPageButton" onClick="window.print();" style="display: block; background: #eee; border: 1px solid #ccc; padding: 7px 13px; text-transform: uppercase; margin: auto;">Print</button>
<table class="out">
    <tr>
        <td>
            <h3 class="center">Daily Sheet</h3>
            <h5 class="center"><strong>From</strong> : <?php echo date_format(date_create($fdate), "d.m.Y");?> <strong>To</strong> : <?php echo  date_format(date_create($tdate), "d.m.Y");?></h5>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <thead>
                <tr>
                	<th width="6%">Sl. No.</th>
                    <th width="10%">Date</th>
                    <th width="12%">Purchase</th>
                    <th width="12%">Purchase Return</th>
                    <th width="12%">Sale</th>
                    <th width="12%">Sale Return</th>
                    <th width="12%">Salary</th>
                    <th width="12%">Incentive</th>
                    <th width="12%">Expense</th>
                </tr>
                </thead>
                <tbody>
                <?php if($rows) { $i=1; foreach($rows as $row) {				 
				if($row->finance_type=='Purchase') { $purchase[] = $row->amount; } else { $purchase[] = 0; } 
				if($row->finance_type=='Purchase Return') { $pr[] = $row->amount; } else { $pr[] = 0; }
				if($row->finance_type=='Sale') { $s[] = $row->amount; } else { $s[] = 0; }
				if($row->finance_type=='Sale Return') { $sr[] = $row->amount; } else { $sr[] = 0; }
				if($row->finance_type=='Salary') { $sal[] = $row->amount; } else { $sal[] = 0; }
				if($row->finance_type=='Incentive') { $inc[] = $row->amount; } else { $inc[] = 0; }
				if($row->finance_type=='Expense') { $e[] = $row->amount; } else { $e[] = 0; }
				?>
                <tr>
                	<td><?php echo $i++; ?></td>
                    <td><?php echo date_format(date_create($row->entry_date), "d.m.Y"); ?></td>
                    <td><?php if($row->finance_type=='Purchase') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                    <td><?php if($row->finance_type=='Purchase Return') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                    <td><?php if($row->finance_type=='Sale') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                    <td><?php if($row->finance_type=='Sale Return') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                    <td><?php if($row->finance_type=='Salary') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                    <td><?php if($row->finance_type=='Incentive') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                    <td><?php if($row->finance_type=='Expense') { echo number_format($row->amount,2); } else { echo "-"; } ?></td>
                </tr>
                <?php } } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th class="right" colspan="2">Total</th>
                    <th class="right"><?php echo number_format(array_sum($purchase),2); ?></th>
                    <th class="right"><?php echo number_format(array_sum($pr),2); ?></th>
                    <th class="right"><?php echo number_format(array_sum($s),2); ?></th>
                    <th class="right"><?php echo number_format(array_sum($sr),2); ?></th>
                    <th class="right"><?php echo number_format(array_sum($sal),2); ?></th>
                    <th class="right"><?php echo number_format(array_sum($inc),2); ?></th>
                    <th class="right"><?php echo number_format(array_sum($e),2); ?></th>
                </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>
</body>
</html>