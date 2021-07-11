<?php 	
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		include "../../include/koneksi.php";
		 $id_tagihan = $_GET['id_tagihan'];

    


      $satu_hari        = mktime(0,0,0,date("n"),date("j"),date("Y"));
       
          function tglIndonesia($str){
             $tr   = trim($str);
             $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
             return $str;
         }

        

 ?>
<style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>
<script>
	

			window.print();
			window.onfocus=function() {window.close();}
				
	

</script>
</head>

<body onload="window.print()">

<?php 

    $sql = $koneksi->query("select * from tb_profile ");

    $data1 = $sql->fetch_assoc();

    $sql2 = $koneksi->query("select tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat,   tb_paket.nama_paket, tb_pelanggan.no_telp
                          from tb_tagihan
                          inner join tb_pelanggan on tb_tagihan.id_pelanggan=tb_pelanggan.id_pelanggan
                          inner join tb_paket on tb_pelanggan.paket=tb_paket.id_paket
                          where tb_tagihan.id_tagihan='$id_tagihan' 
                        ");


                      $data2 = $sql2->fetch_assoc();

 ?>

<table width="100%" >
  <tr>
    
    <td width="10" rowspan="3" valign="top"><img src="../../images/<?php echo $data1['foto']; ?>" width="100" height="85" /></td>
    <td width="383"><?php echo $data1['nama_sekolah']; ?></td>
    

  </tr>

  

 
  
</table>


<br>	



</body>



<table width="100%" >
  <tr>
    <td width="0">&nbsp;</td>
    <td style="font-size: 20px;"><div align="center"><strong>BUKTI PEMBAYARAN <br> <?php echo $data['nama_bayar'] ?></strong></div></td>

  </tr>  

   <tr>
     <td width="0">&nbsp;</td>
    <td><div align="center">Tanggal Bayar: <?php echo tglIndonesia(date('d F Y', strtotime($data2['tgl_bayar']))); ?></div></td>
  </tr>
  
</table><br>



                     <?php 

                      $no = 1;

                      $sql = $koneksi->query("select tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.alamat,   tb_paket.nama_paket, tb_pelanggan.no_telp
                          from tb_tagihan
                          inner join tb_pelanggan on tb_tagihan.id_pelanggan=tb_pelanggan.id_pelanggan
                          inner join tb_paket on tb_pelanggan.paket=tb_paket.id_paket
                          where tb_tagihan.id_tagihan='$id_tagihan' 
                        ");


                      $data = $sql->fetch_assoc();

                        $status=  $data['status_bayar'];

                        if ($status==1) {
                          $status_oke = "Lunas";
                        }else{
                           $status_oke = "Belum Lunas";
                        }


                        $bulan_tahun = $data['bulan_tahun'];
                       
                       $tahun  = str_split($bulan_tahun); 

                       $tahun1 = $tahun[0];
                       $tahun2 = $tahun[1];
                       $tahun3 = $tahun[2];
                       $tahun4 = $tahun[3];
                       $tahun5 = $tahun[4];
                       $tahun6 = $tahun[5]; 

                       $bulan = $tahun1.$tahun2; 

                       $tahun = $tahun3.$tahun4.$tahun5.$tahun6;  

                       $ppn = $data['jml_bayar']*(10/100);
                        
                      
                   ?>


                

               

  </tbody>
</table>

<table width="100%" class="tabel">
  <tr>
   
    <td width="200">Periode</td>
    <td width="10">:</td>
    <td width="340"><?php echo $bulan ?>/<?php echo $tahun ?></td>
  </tr>
  <tr>
    
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $data['nama_pelanggan'] ?></td>
  </tr>
  <tr>
   
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $data['alamat'] ?></td>
  </tr>
  <tr>
    
    <td>Nomor Hp</td>
    <td>:</td>
    <td><?php echo $data['no_telp'] ?></td>
  </tr>
  <tr>
   
    <td>Pokok</td>
    <td>:</td>
    <td>Rp. <?php echo number_format( $data['jml_bayar'],0,",",".") ?></td>
  </tr>
  
</table><br><br>



<div style=" margin-left: 30px; text-align: center;">
 Terima kasih Telah Melakukan Pembayaran, Simpanlah Struk ini Sebagai Bukti pembayaran <br><br><?php echo $data1['nama_sekolah']; ?>
  
</div><br><br>





