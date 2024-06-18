<!-- DashBoard -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?= $produk ?></h3>
      <p>Produk</p>
    </div>
    <div class="icon">
      <i class="fa-solid fa-box"></i>
    </div>
    <a href="<?= base_url('Produk')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3><?= $kategori ?></h3>
      <p>Kategori</p>
    </div>
    <div class="icon">
      <i class="fas fa-th-list"></i>
    </div>
    <a href="<?= base_url('Kategori')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= $satuan ?></h3>
      <p>Satuan</p>
    </div>
    <div class="icon">
      <i class="fas fa-th-list"></i>
    </div>
    <a href="<?= base_url('Satuan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-danger">
    <div class="inner">
      
      <h3><?= $bahan ?></h3>
      <p>bahan</p>
    </div>
    <div class="icon">
      <i class="fa-solid fa-users"></i>
    </div>
    <a href="<?= base_url('Bahan')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- <div class="col md-4">
  <div class="info-box mb-3 bg-primary">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Pendapatan Hari Ini</span>
      <span class="info-box-number">Rp. 5,200</span>
    </div>
  </div>
</div> -->
<!-- <div class="col md-4">
  <div class="info-box mb-3 bg-secondary">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Pendapatan Minggu Ini</span>
      <span class="info-box-number">Rp. 5,200</span>
    </div>
  </div>
</div> -->
<!-- <div class="col md-4">
  <div class="info-box mb-3 bg-warning">
    <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Pendapatan Bulan Ini</span>
      <span class="info-box-number">Rp. 5,200</span>
    </div>
  </div>
</div> -->

<div class="col-md-12 mt-5">
  <canvas id='myChart' width="100%" height="30px">

  </canvas>
</div>

<script>
  const ctx = document.getElementById('myChart');
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>