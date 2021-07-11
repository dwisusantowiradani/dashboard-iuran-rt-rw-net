

<?php 


   $id_tagihan = $_GET['id'];
   $tgl_bayar= date('Y-m-d');
   
  
  $sql = $koneksi->query("SELECT * from tb_tagihan, tb_pelanggan, tb_paket where tb_pelanggan.id_pelanggan=tb_tagihan.id_pelanggan and tb_paket.id_paket=tb_pelanggan.paket and tb_tagihan.id_tagihan='$id_tagihan'");

  $data = $sql->fetch_assoc();

  $jml_bayar= $data['jml_bayar'];
  $pelanggan = $data['nama_pelanggan'];
  $paket = $data['nama_paket'];
  $ket = "Pembayaran Internet AN."."&nbsp".$pelanggan.","."&nbsp"."Paket"."&nbsp".$paket;

  $sql2 = $koneksi->query("update tb_tagihan set terbayar=0, status_bayar=0, tgl_bayar='0000-00-00' where id_tagihan='$id_tagihan'");

  $query= $koneksi->query(" delete from tb_kas where id_tagihan='$id_tagihan' ");
  

   if ($sql2) {
              echo "

                  <script>
                      setTimeout(function() {
                          swal({
                              title: 'Tagihan',
                              text: 'Berhasil Dibatalkan!',
                              type: 'success'
                          }, function() {
                              window.location = '?page=transaksi';
                          });
                      }, 300);
                  </script>

              ";
            }
  
  

 ?>


