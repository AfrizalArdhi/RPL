<table class="table table-bordered table-striped">
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
    <?php 
    $no = 1;
    $totalHargaPenjualan = 0; // Initialize total sales variable
    $totalkeuntungan = 0; // Initialize total sales variable
    foreach ($dataharian as $value) {
        // Increment total sales
        $totalHargaPenjualan += $value['total'];
        $totalkeuntungan += $value['untung'];
    ?>
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
    <?php 
    } 
    ?>
    <tr>
        <th colspan="6">
            Total Penjualan
        </th>
        <th>
            <?= $totalkeuntungan ?>
        </th>
        <th>
            <?= $totalHargaPenjualan ?>
        </th>
    </tr>
</table>
