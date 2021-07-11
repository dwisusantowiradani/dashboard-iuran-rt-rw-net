<?php if ($_SESSION['admin']) { ?>

<div class="row">
    <div class="col-md-6" >
        <!-- Form Elements -->
         <div class="box box-primary box-solid">
              <div class="box-header with-border">
                Rekap Kas Masuk dan Keluar
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-md-12">
            <!-- /.box-header -->
            <!-- form start -->
           <form role="form"  method="POST" target="blank" action="page/laporan/rekap_kas.php"> 
                        <div class="form-group">
                          <label>Tanggal Awal</label>
                          <input type="date" name="tgl_awal" required=""  class="form-control" >      
                        </div>

                        <div class="form-group">
                          <label>Tanggal Akhir</label>
                          <input type="date" name="tgl_akhir" required=""  class="form-control" >      
                        </div>
             
                      
                      <div class="modal-footer">
                        <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                       
                      </div>

                     

                       </form>
            </div>
          </div>


 <?php } else{
    echo "Anda Tidak Berhak Mengakses Halaman Ini";
  } ?>
         