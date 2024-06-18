<!DOCTYPE html>
<html>
<head>
    <title>Print Laporan Harian</title>
    <style>
        /* Styles for printing */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        @media print {
            /* Hide print button when printing */
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Harian</h1>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Untung</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; $totalHargaPenjualan = 0; $totalkeuntungan = 0;
                foreach ($dataharian as $value) {
                    $totalHargaPenjualan += $value['total'];
                    $totalkeuntungan += $value['untung']; ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_produk'] ?></td>
                        <td><?= $value['nama_produk'] ?></td>
                        <td><?= $value['qty'] ?></td>
                        <td><?= $value['harga_jual'] ?></td>
                        <td><?= $value['harga_beli'] ?></td>
                        <td><?= $value['untung'] ?></td>
                        <td><?= $value['total'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan="6">Total Penjualan</th>
                    <th><?= $totalkeuntungan ?></th>
                    <th><?= $totalHargaPenjualan ?></th>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
