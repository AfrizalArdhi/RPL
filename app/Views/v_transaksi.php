<div class="col-md">
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor Faktur</th>
                        <th>Tanggal Jual</th>
                        <th>Jam</th>
                        <th>Kasir</th>
                        <th>Pembeli</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $totalakhir = [];
                    date_default_timezone_set("Asia/Jakarta");
                    $today = date('Y-m-d');
                    foreach ($transaksi as $key => $value) {
                // Check if the transaction date is today's date
                    if ($value['tgl_jual'] == $today) {
                        $totalakhir[] = $value['grand_total'];
                        ?>
                    <tr>
                        <td><?= $value['no_faktur']?></td>
                        <td><?= $value['tgl_jual']?></td>
                        <td><?= $value['jam']?></td>
                        <td><?= $value['nama_kasir']?></td>
                        <td><?= $value['nama_pelanggan']?></td>
                        <td><?= $value['grand_total']?></td>
                        <td><?= $value['dbayar']?></td>
                        <td><?= $value['kembalian']?></td>
                        <td><?= $value['grand_total']?></td>
                    </tr>
                    <?php 
                     }
                    } 
                  ?>
                </tbody>


                <tr>
                    <th colspan="8">
                        Total Harga Penjualan
                    </th>
                    <th>
                        <?= $transaksi == null? '' :array_sum($totalakhir)?>
                    </th>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>