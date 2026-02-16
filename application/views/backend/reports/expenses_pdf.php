<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengeluaran</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Pengeluaran</h2>
        <p>Periode: <?= date('d/m/Y', strtotime($start_date)) ?> - <?= date('d/m/Y', strtotime($end_date)) ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Kategori</th>
                <th width="35%">Keterangan</th>
                <th width="25%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($expenses as $index => $expense) :
                $total += $expense->amount;
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= date('d/m/Y', strtotime($expense->date)) ?></td>
                    <td><?= $expense->category ?></td>
                    <td><?= $expense->description ?></td>
                    <td class="text-right">Rp <?= number_format($expense->amount, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Total</th>
                <th class="text-right">Rp <?= number_format($total, 0, ',', '.') ?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
