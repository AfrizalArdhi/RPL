<div class="col-12">
    <?php echo form_open('Keranjang/InsertData', ['id' => 'paymentForm'])?>
    <div class="container-fluid">
        <!-- Main content -->
        <div class="invoice p-3 mb-3 mr-5 ml-5">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas"></i> Konfirmasi Pesanan
                        <a type="button" href="<?= base_url('penjualan')?>" class="btn btn-success float-right">Kembali</a>
                    </h4>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-2,5 invoice-col">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <label for="">Nomor Faktur</label>
                                <input type="hidden" name="no_faktur" value="<?= $no_faktur?>">
                            </td>
                            <td><?= $no_faktur?></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Nama Kasir:</label>
                            </td>
                            <td>
                                <label for="" class=""><?= session()->get('nama_user')?></label>
                                <input type="hidden" name="nama_kasir" value="<?= session()->get('nama_user')?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Nama Pembeli:</label></td>
                            <td><label for="" class=""><?= $nama_pembeli?></label>
                            <input type="hidden" name="nama_pembeli" value="<?= $nama_pembeli?>">
                        </tr>
                        <tr>
                            <td><label for="">Keterangan</label></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">No</th>
                                <th>Nama Produk</th>
                                <th width="100px">Qty</th>
                                <th width="100px">Harga</th>
                                <th width="100px">SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $keranjang = $cart->contents();
                                $no = 1;
                                $i = 1;
                                foreach ($keranjang as $key => $value){ 
                            ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td class="text-left"><?= $value['name']?></td>
                                <td><input type="number" name="qty<?= $i++ ?>" min="1" class="form-control" value="<?= $value['qty']?>"></td>
                                <td>Rp.<?= number_format($value['price'])?></td>
                                <td>Rp.<?= number_format($value['subtotal'])?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-8"></div>
                <!-- /.col -->
                <div class="col-4">
                    <p class="lead">Rincian Pembayaran</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><b>Rp. <?= number_format($cart->total())?></b></td>
                                <input type="hidden" name="grand_total" value="<?= $cart->total()?>">
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><b>Rp. <?= number_format($cart->total())?></b></td>
                            </tr>
                            <tr>
                                <th>Bayar:</th>
                                <td>
                                    <input type="number" name="bayar" id="bayar" class="form-control" placeholder="Masukkan Uang..." required>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" id="submitPaymentBtn">
                        <i class="far fa-credit-card"></i> Submit Payment
                    </button>
                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div>
    <?php echo form_close()?>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Pembayaran Sukses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pesanan Anda telah berhasil diproses.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="printInvoiceBtn">Tutup</button>
                <!-- <button type="button" class="btn btn-primary" id="printInvoiceBtn">Cetak Invoice</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('submitPaymentBtn').addEventListener('click', function() {
        // Submit form via AJAX
        var form = document.getElementById('paymentForm');
        var formData = new FormData(form);
        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Show the modal on successful submission
                $('#confirmModal').modal('show');
            },
            error: function() {
                alert('Terjadi kesalahan saat memproses pembayaran.');
            }
        });
    });

    document.getElementById('printInvoiceBtn').addEventListener('click', function() {
        // Redirect to the invoice printing page
        window.location.href = '<?= base_url("Penjualan") ?>';
    });
</script>
