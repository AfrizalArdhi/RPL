<div class="col-md-12">
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <!-- <a type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"> </i> Add Data
                </a> -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal: </label>
                        <div class="col-9 input-group">
                            <input type="date" name="tgl" id="tgl" class="form-control">
                            <span class="input-group-append">
                                <button onclick="LihatTabelLaporan()" class="btn btn-primary btn-flat">
                                    <i class="fas fa-file-alt"> View Laporan</i></button>
                                    <!-- <button onclick="printLaporan()" class="btn btn-success btn-flat">
                                    <i class="fas fa-print"> Print Laporan</i> -->
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <div class="Tabel">

                    </div>

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script>
    function LihatTabelLaporan() {
        let tgl = $('#tgl').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Laporan/LihatLaporanHarian')?>",
            data: {
                tgl:tgl,
            },
            dataType: "JSON",
            success: function(response){
                if (response.data) {
                    $('.Tabel').html(response.data)
                }
            }
        });
    }
</script>