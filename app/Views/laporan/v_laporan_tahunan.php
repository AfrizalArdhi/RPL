<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun: </label>
                        <div class="col-9 input-group">
                            <input type="number" id="tahun" name="tahun" class="form-control" min="2000" max="2100" value="<?= date('Y'); ?>">
                            <span class="input-group-append">
                                <button onclick="LihatTabelLaporanTahunan()" class="btn btn-primary btn-flat">
                                    <i class="fas fa-file-alt"> View Laporan</i>
                                </button>
                                <!-- <a class="btn btn-success btn-flat">
                                    <i class="fas fa-print"> Print Laporan</i>
                                </a> -->
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
    </div>
</div>
<script>
    function LihatTabelLaporanTahunan() {
        let tahun = $('#tahun').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Laporan/LihatLaporanTahunan')?>",
            data: {
                tahun: tahun
            },
            dataType: "JSON",
            success: function(response) {
                if (response.data) {
                    $('.Tabel').html(response.data);
                }
            }
        });
    }
</script>

