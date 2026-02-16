<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi - <?= $order->invoice_code ?></title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            /* Adjust for thermal printer if needed */
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px dashed #333;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 12px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 2px 0;
        }

        .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items th,
        .items td {
            padding: 5px 0;
            text-align: left;
            border-bottom: 1px dashed #ddd;
        }

        .items th {
            border-bottom: 1px dashed #333;
        }

        .totals {
            width: 100%;
            margin-bottom: 20px;
        }

        .totals td {
            padding: 5px 0;
            text-align: right;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            border-top: 1px dashed #333;
            padding-top: 10px;
        }

        @media print {
            .container {
                border: none;
                padding: 0;
            }

            @page {
                margin: 0;
            }

            body {
                padding: 10px;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="header">
            <h2>MariLaundry</h2>
            <p>Jl. Contoh Laundry No. 123</p>
            <p>Telp: (021) 123-4567 | WA: 0812-3456-7890</p>
        </div>

        <div class="info">
            <table>
                <tr>
                    <td width="100">No. Invoice</td>
                    <td>: <?= $order->invoice_code ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?= date('d/m/Y H:i', strtotime($order->entry_date)) ?></td>
                </tr>
                <tr>
                    <td>Pelanggan</td>
                    <td>: <?= $order->customer_name ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: <?= ucfirst($order->status) ?> / <?= $order->payment_status == 'paid' ? 'Lunas' : 'Belum Lunas' ?></td>
                </tr>
            </table>
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Layanan</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order->details as $detail) : ?>
                    <tr>
                        <td>
                            <?= $detail->service_name ?>
                            <br>
                            <small>@ <?= number_format($detail->price, 0, ',', '.') ?></small>
                        </td>
                        <td style="text-align: center;"><?= $detail->qty + 0 ?> <?= $detail->unit ?></td>
                        <td style="text-align: right;"><?= number_format($detail->subtotal, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="totals">
            <tr>
                <td><strong>Total Tagihan:</strong></td>
                <td><strong>Rp <?= number_format($order->total_price, 0, ',', '.') ?></strong></td>
            </tr>
        </table>

        <div class="footer">
            <p>Terima Kasih atas kepercayaan Anda.</p>
            <p>Barang yang tidak diambil lebih dari 30 hari bukan tanggung jawab kami.</p>
        </div>
    </div>
</body>

</html>
