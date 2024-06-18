 <?php
      if(session()->getFlashdata('pesan')){
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>';
          echo session()->getFlashdata('pesan');
          echo '</h5> </div>';
      }
  ?>
 <div class="content">
   <div class="row p-3" style="display: flex;">
     <div class="col-md-7 mt-1">
       <div class="card card-danger">
         <div class="card-header">
           <h3 class="card-title">Menu</h3>
         </div>
         <hr>
         <div class="card-body" style="display: flex; flex-wrap:wrap; width:100%">


           <!-- use App\Controllers\Penjualan; -->
           <?php
            foreach($produk as $key => $value){

              ?>

           <div class="col-md-3">
             <div class="card p-3 text-center">
               <img style="width: 170px; height:170px;" src="<?=$value['gambar']?>" alt=" Gaada Gambar">
               <div class="mt-2">
                 <label for=""><?= $value['nama_produk']?></label>
                 <br>
                 <span>Rp. <?= number_format($value['harga_jual']) ?></span>
               </div>
               <button type="button" class="btn btn-success" data-toggle="modal"
                 data-target="#popup-menu<?= $value['id_produk']?>">
                 Pesan
               </button>
             </div>
           </div>
           <?php }?>
         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.card -->
     </div>
     <!-- /.col -->
     <div class="col-md-5 mt-1">
       <?php echo form_open('keranjang');?>
       <div class="card card-danger">
         <div class="card-header">
           <h3 class="card-title">Keranjang</h3>
         </div>
         <div class="card-body">
           <div>
             <table style="width: 100%;" class="table table-borderless">
               <tr>
                 <td><label for="">Nama Kasir</label></td>
                 <td><label for="" class="form-control"><?= session()->get('nama_user')?></label></td>
               </tr>
               <tr>
                 <td><label for="">Waktu</label></td>
                 <td>
                   <?php
                    date_default_timezone_set("Asia/Jakarta");
                    $jkt = date("H:i:s");
                    ?>

                   <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
                     <label for="" class="form-control"> <span id="clock"></span> </label>
                 </td>
               </tr>
               <tr>
                 <td><label for="">Tanggal</label></td>
                 <td>
                   <label for="" class="form-control"><?= date('d M Y')?></label>
                 </td>
               </tr>
               <tr>
                 <td><label for="">Nomor Faktur</label></td>
                 <td><label class="form-control"><?= $no_faktur?></label></td>
               </tr>
               <tr>
                 <td><label for="">Nama Pembeli</label></td>
                 <td><input type="text" name="nama_pembeli" class="form-control" placeholder="Masukkan Nama Pembeli..."
                     required>
                 </td>
               </tr>
               <tr>
                 <td><label for="">Nomor Meja</label></td>
                 <td><input type="number" name="no_meja" class="form-control" placeholder="Masukkan Nomor Meja..."
                     required>
                 </td>
               </tr>
               
               <tr>
                 <td><label for="">Order</label></td>
                 <td>
                   <select name="order" id="" class="form-control">
                     <option value="0" disabled selected>-- Jenis Order --</option>
                     <option value="Dine In">Dine in</option>
                     <option value="Take Away">Take away</option>
                   </select>
                 </td>
               </tr>
             </table>
             <hr>
             <div class="p-2">
               <span><i class="fas fa-cart-plus text-primary"> </i><a class="ml-3">List Keranjang</a></span>
               <table id="example1" class="table table-bordered table-striped mt-3">
                 <thead>
                   <tr class="text-center">
                     <th width="50px">No</th>
                     <th>Nama Produk</th>
                     <th width="100px">Qty</th>
                     <th width="100px">Harga</th>
                     <th width="100px"> SubTotal</th>
                     <th></th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php 
                   $banyak = $cart->totalitems();
                   $no = 1;
                   $i = 1;
                   foreach ($cart->contents() as $key => $value){ ?>
                   <tr class="text-center">
                     <td> <?= $no++ ?></td>
                     <td> <?= $value['name']?> </td>
                     <td><input type="number" name="qty<?= $i++ ?>" min="1" class="form-control" id=""
                         value="<?=$value['qty']?>"></td>
                     <td>Rp.<?= number_format($value['price'])?> </td>
                     <td>Rp.<?= number_format($value['subtotal'])?> </td>
                     <td>
                       <a href="<?= base_url('Penjualan/delprod/'.$value['rowid'])?>" class="btn btn-danger">x</a>
                     </td>
                   </tr>
                   <?php } ?>
                   <tr>
                     <th colspan="4" class="text-right">Total Harga</th>
                     <th><b>Rp. <?= number_format($cart->total())?></b></th>
                   </tr>
                 </tbody>
               </table>
               <?php if($banyak>0){?>
               <div style="justify-content: end; display:flex">
                 <button type="submit" class="btn btn-success">Bayar</button>
               </div>
               <?php } ?>
             </div>
           </div>
         </div>
       </div>
       <?php echo form_close();?>
     </div>
   </div>
 </div>


 <?php foreach($produk as $key => $k){?>
 <div class="modal fade" id="popup-menu<?= $k['id_produk']?>">
   <?php 
  echo form_open('Penjualan/add');
  echo form_hidden('idprod', $k['id_produk']);
  echo form_hidden('kode', $k['kode_produk']);
  echo form_hidden('nama', $k['nama_produk']);
  echo form_hidden('harga', $k['harga_jual']);
  echo form_hidden('hargabeli', $k['harga_beli']);
  echo form_hidden('stokprod', $k['stok']);
  echo form_hidden('idbahan', $k['id_bahan']);
  ?>

   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title">Rincian Produk</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh;">
         <img style="width: 450px; height:450px;" src="<?=$k['gambar']?>" alt=" Gaada Gambar">
         <div class="mt-2 text-center">
           <label for=""><?= $k['nama_produk']?></label>
           <br>
           <span>Rp. <?= number_format($k['harga_jual']) ?></span>
         </div>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary btn-flat">Tambahkan</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
   <?php 
  echo form_close(); 
  ?>
 </div>
 <?php } ?>
 <script type="text/javascript">
   function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
     var waktu = new Date(); //membuat object date berdasarkan waktu saat 
     var sh = waktu.getHours() +
       ""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
     var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
     var ss = waktu.getSeconds() +
       ""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
     document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm :
       sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
   }
 </script>