<div class="col-md">
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"> </i> Add Data
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
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width=50px;>No</th>
                        <th>Bahan</th>
                        <th width=50px;>Stok</th>
                        <th width=100px;>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($bahan as $key => $value){?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama_bahan'] ?></td>
                        <td><?= $value['stok'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_bahan']?>"><i
                                    class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat " data-toggle="modal" data-target="#delete-data<?= $value['id_bahan']?>"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>

                <?php }       ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

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
            <?php echo form_open('Bahan/InsertData')?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Nama Bahan</label>
                    <input name="nama_bahan" class="form-control" placeholder="Nama Bahan" required>
                </div>
                <div class="form-group">
                    <label for="">Stok Bahan</label>
                    <input name="stok" class="form-control" placeholder="Stok Bahan" required>
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
<?php foreach($bahan as $key => $value){?>
    <div class="modal fade" id="edit-data<?= $value['id_bahan']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Bahan/UpdateData/'.$value['id_bahan'])?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Bahan</label>
                    <input name="nama_bahan" value="<?= $value['nama_bahan']?>" class="form-control" placeholder="Nama Bahan" required>
                </div>
                <div class="form-group">
                    <label for="">Stok Bahan</label>
                    <input name="stok" value="<?= $value['stok']?>" class="form-control" placeholder="Stok Bahan" required>
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
    <?php } ?>

    <!-- Modal delete Data -->
<?php foreach($bahan as $key => $value){?>
    <div class="modal fade" id="delete-data<?= $value['id_bahan']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data <?= $submenu ?> "<?= $value['nama_bahan'] ?>"?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('Bahan/DeleteData/'. $value['id_bahan'])?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <?php } ?>