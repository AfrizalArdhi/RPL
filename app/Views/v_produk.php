<div class="col-md">
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i
                        class="fas fa-plus"> </i> Add Data
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
                if(session()->getFlashdata('pesan')){
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h5> </div>';
                }
            ?>
            <?php
                $errors = session()->getFlashdata('errors');
                if(!empty($errors)){?>
            <div class="alert alert-danger alert-dismissable">
                <h4>Periksa lagi entry form!</h4>
                <ul>
                    <?php foreach ($errors as $key => $error){ ?>
                    <li><?= esc($error)?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php }
            ?>
            <table id="example1" class="table table-bordered table-stripped">
                <thead>
                    <tr class="text-center">
                        <th width=50px;>No</th>
                        <th>Kode/Barccode</th>
                        <th>Produk</th>
                        <th>Bahan</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width=100px;>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($produk as $key => $value){?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_produk'] ?></td>
                        <td><?= $value['nama_produk'] ?></td>
                        <td><?= $value['nama_bahan'] ?></td>
                        <td><?= $value['nama_kategori'] ?></td>
                        <td><?= $value['nama_satuan'] ?></td>
                        <td>Rp. <?= number_format($value['harga_beli']) ?></td>
                        <td>Rp. <?= number_format($value['harga_jual']) ?></td>
                        <td><?= number_format($value['stok']) ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal"
                                data-target="#edit-data<?= $value['id_produk']?>"><i
                                    class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat " data-toggle="modal"
                                data-target="#delete-data<?= $value['id_produk']?>"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php }       ?>
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal Add Data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Produk/InsertData')?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Produk</label>
                    <input name="kode_produk" class="form-control" placeholder="Kode Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" class="form-control" placeholder="Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Bahan</label>
                    <select name="id_bahan" class="form-control">
                        <option value="">--Pilih Bahan--</option>
                        <?php foreach($bahan as $key => $value){?>
                        <option value="<?= $value['id_bahan']?>"><?= $value['nama_bahan']?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control" required>
                        <option value="" disabled selected>--Pilih Kategori--</option>
                        <?php foreach($kategori as $key => $value){?>
                        <option value="<?= $value['id_kategori']?>"><?= $value['nama_kategori']?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control" required>
                        <option value="" disabled selected>--Pilih Satuan--</option>
                        <?php foreach($satuan as $key => $value){?>
                        <option value="<?= $value['id_satuan']?>"><?= $value['nama_satuan']?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_beli" type="number" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_jual" type="number" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Link Gambar</label>
                    <input name="gambar" class="form-control" placeholder="www.asddsa.id" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close()?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Data -->
<?php foreach($produk as $key => $value){?>
<div class="modal fade" id="edit-data<?= $value['id_produk']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Produk/UpdateData/'.$value['id_produk'])?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Produk</label>
                    <input name="kode_produk" value="<?= $value['kode_produk']?>" class="form-control"
                        placeholder="Kode Produk">
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" value="<?= $value['nama_produk']?>" class="form-control"
                        placeholder="Produk">
                </div>
                <div class="form-group">
                    <label for="">Bahan</label>
                    <select name="id_bahan" class="form-control">
                        <option value="">--Pilih Bahan--</option>
                        <?php foreach($bahan as $key => $k){?>
                        <option value="<?= $k['id_bahan']?>"
                            <?= $value['id_bahan'] == $k['id_bahan']  ? 'Selected':''?>>
                            <?= $k['nama_bahan']?> </option>
                        <?php }
                        ?>
                    </select>
                    
                    
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach($kategori as $key => $k){?>
                        <option value="<?= $k['id_kategori']?>"
                            <?= $value['id_kategori'] == $k['id_kategori']  ? 'Selected':''?>>
                            <?= $k['nama_kategori']?> </option>
                        <?php }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control">
                        <option value="">--Pilih Satuan--</option>
                        <?php foreach($satuan as $key => $s){?>
                        <option value="<?= $s['id_satuan']?>"
                            <?= $value['id_satuan'] == $s['id_satuan']  ? 'Selected':''?>>
                            <?= $s['nama_satuan']?> </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_beli" id="harga_beli<?= $value['id_produk']?>"
                            value="<?= $value['harga_beli']?>" type="number" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_jual" type="number" id="harga_juall<?= $value['id_produk']?>"
                            value="<?= $value['harga_jual']?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-flat">Save</button>
                </div>
                <?php echo form_close()?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<?php } ?>

<!-- Modal delete Data -->
<?php foreach($produk as $key => $value){?>
<div class="modal fade" id="delete-data<?= $value['id_produk']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data <?= $submenu ?> "<?= $value['nama_produk'] ?>"?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('Produk/DeleteData/'. $value['id_produk'])?>"
                    class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>