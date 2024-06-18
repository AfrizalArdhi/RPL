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
                        <label for="" class="col-sm-2 col-form-label">Bulan: </label>
                        <div class="col-9 input-group">
                            <select id="bulan" name="bulan" class="form-control">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tahun: </label>
                        <div class="col-9 input-group">
                            <input type="number" id="tahun" name="tahun" class="form-control" min="2000" max="2100" value="<?= date('Y'); ?>">
                            <span class="input-group-append">
                                <button onclick="LihatTabelLaporanBulanan()" class="btn btn-primary btn-flat">
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
    function LihatTabelLaporanBulanan() {
        let bulan = $('#bulan').val();
        let tahun = $('#tahun').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Laporan/LihatLaporanBulanan')?>",
            data: {
                bulan: bulan,
                tahun: tahun
            },
            dataType: "JSON",
            success: function(response) {
                if (response.data) {
                    $('.Tabel').html(response.data)
                }
            }
        });
    }
</script>
