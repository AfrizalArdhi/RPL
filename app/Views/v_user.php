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
                        <th>Nama User</th>
                        <th>Email</th>
                        <!-- <th>Password</th> -->
                        <th>Level</th>
                        <?php if(session()->level == 1) :?>
                        <th width=100px;>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                        foreach ($user as $key => $value){?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama_user'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <!-- <td class="text-center"></td> -->
                        <td class="text-center"><?php 
                            if($value['level']==1){ ?>
                                <span class="badge bg-success">Admin</span>
                            <?php }else if ($value['level'] == 2){ ?>
                                <span class="badge bg-primary">Kasir</span>
                            <?php }else if ($value['level'] == 3){ ?>
                                <span class="badge bg-secondary">Karyawan Gudang</span>
                            <?php }else if ($value['level'] == 4){ ?>
                                <span class="badge bg-danger">Pemilik</span>
                            <?php }?>
                        </td>
                        <?php if(session()->level == 1) :?>
                        <td class="text-center"> 
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_user']?>"><i
                                    class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat " data-toggle="modal" data-target="#delete-data<?= $value['id_user']?>"><i
                                    class="fas fa-trash"></i></button>
                        </td>
                        <?php endif;?>
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
            <?php echo form_open('User/InsertData')?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email"  class="form-control" placeholder="Example@mail.com" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password"  class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-control">
                        <option value="" disabled selected>Choose</option>
                        <option value="1">Admin</option>
                        <option value="2">Kasir</option>
                        <option value="3">Karyawan Gudang</option>
                        <option value="4">Pemilik</option>
                    </select>
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
<?php foreach($user as $key => $value){?>
    <div class="modal fade" id="edit-data<?= $value['id_user']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('User/UpdateData/'.$value['id_user'])?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama_user" value="<?= $value['nama_user']?>" class="form-control" placeholder="User" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email"  value="<?= $value['email']?>" class="form-control" placeholder="Example@mail.com" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" value="<?= $value['password']?>" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-control">
                        <option value="0" disabled>Choose</option>
                        <option value="1" <?= $value['level'] == 1 ? 'Selected':''?>>Admin</option>
                        <option value="2" <?= $value['level'] == 2 ? 'Selected':''?>>Kasir</option>
                        <option value="3" <?= $value['level'] == 3 ? 'Selected':''?>>Karyawan Gudang</option>
                        <option value="4" <?= $value['level'] == 4 ? 'Selected':''?>>Pemilik</option>
                    </select>
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
<?php foreach($user as $key => $value){?>
    <div class="modal fade" id="delete-data<?= $value['id_user']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Data <?= $subjudul?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data <?= $submenu ?> "<?= $value['nama_user'] ?>"?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('User/DeleteData/'. $value['id_user'])?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <?php } ?>