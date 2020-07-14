<!DOCTYPE html>
<html>
  <?php $this->load->view('admin/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('admin/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <center>
    <h1>Hasil Pemeriksaan Bakteriologis</h1>
    <div class="btn btn-success">MS: <div id="total_ms2"></div></div>
    <div class="btn btn-primary">TMS: <div id="total_tms2"></div></div>
    <div class="btn btn-warning">Jml Sample: <div id="total_jumlah_sample2"></div></div>
    <div class="btn btn-danger">Percentage: <div id="total_persentase2"></div> </div>
    </center>
    <br>
    <?php if($this->session->flashdata('berhasil') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Sukses !</strong> Penambahan Data Berhasil
</div> 
<?php endif; ?>

<?php if($this->session->flashdata('edit') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Sukses !</strong> Edit Data Berhasil
</div> 
<?php endif; ?>
        
<?php if($this->session->flashdata('hapus') == TRUE):?>
	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  <strong>Sukses !</strong> Hapus Data berhasil
</div> 
<?php endif; ?>
  </section>

</form>

	
	<br>
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
  <label>Menampilkan 30 Data Terbaru</label>
<p align="right">
     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Tambah Data</button>
     </p>
     

    </div>
    <form action="<?=site_url('print_laporan/cetak_pelanggan')?>" class="form-horizontal" method="post">
    <div class="box-body">
    <table class="table table-striped table-bordered data">
    <thead>
	
<tr>

	<th width="1%">NO.</th>
    <th width="15%"><i class="fa fa-calendar"></i> TGL Input</th>
	<th width="15%"><i class="fa fa-map-marker"></i> Lokasi</th>
	<th ><i class="fa fa-check-circle-o"></i> Memenuhi Syarat (MS)</th>
  <th><i class="fa fa-window-close-o"></i> Tidak Memenuhi Syarat (TMS)</th>
  <th><i class="fa fa-clock-o"></i> Jumlah Sample</th>
  <th><i class="fa fa-percent"></i> Percentage</th>
  <th><i class="fa fa-sticky-note"></i> Keterangan</th>
  <th width="10%"><i class="fa fa-gears"></i> Aksi</th>

  
</tr>
</thead>
<?php 
                  $no=0;
                    foreach ($data->result_array() as $sws):
                        $no++;
                        $id_hasil=$sws['id_hasil'];
                        $tanggal=$sws['tgl'];
                        $lokasi=$sws['zona'];
                        $ms=$sws['ms'];
                        $tms=$sws['tms'];
                        $persentase=$sws['persentase'];
                        $jumlah_sample=$sws['jumlah_sample'];
                        $keterangan=$sws['keterangan'];
                        
                ?>
<tr>
	<td class="count"><?php echo $no;?></td>
	<td><?php echo $tanggal;?></td>
  <td><?php echo $lokasi;?></td>
  <td class="total_ms"><?php echo $ms;?></td>
  <td class="total_tms"><?php echo $tms;?></td>
  <td class="total_jumlah_sample"><?php echo $jumlah_sample;?></td>
  <td class="total_persentase"><?php echo $persentase;?></td>
  <td><?php echo $keterangan;?></td>


    
    <td><center><a class="btn btn-sm btn-warning" href="#editpelanggan<?php echo $id_hasil?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span></a>
    <a class="btn btn-sm btn-danger" href="#hapus<?php echo $id_hasil?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span></a></td>
	</center>
	
		
</tr>
<?php endforeach; ?>
  </table>



</div>


</form>

 



<br>
<?php 
                  
                  foreach ($data->result_array() as $sws){
                    $id_hasil=$sws['id_hasil'];
                    $tanggal=$sws['tgl'];
                    $lokasi=$sws['zona'];
                    $ms=$sws['ms'];
                    $tms=$sws['tms'];
                    $persentase=$sws['persentase'];
                    $jumlah_sample=$sws['jumlah_sample'];
                    
              ?>
               <div id="hapus<?php echo $id_hasil?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Hapus Data Hasil Test Ini ?</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'test/hapus_hasil_test'?>">
                        <div class="modal-body">
                           
                            <br>
                                   <input name="id_hasil" type="hidden" value="<?php echo $id_hasil; ?>"> 
                                    <input class="form-control" name="nama"value="Tanggal : <?php echo $tanggal; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Lokasi : <?php echo $lokasi; ?>" readonly>
                                    <br>
                                    <input class="form-control" name="nama"value="Persentase : <?php echo $persentase." %"; ?>" readonly>
                                    <br>
                                   
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>


<?php 
                 
                    foreach ($data->result_array() as $sws){
                        $id_hasil=$sws['id_hasil'];
                        $tanggal=$sws['tgl'];
                        $lokasi=$sws['zona'];
                        $ms=$sws['ms'];
                        $tms=$sws['tms'];
                        $persentase=$sws['persentase'];
                        $jumlah_sample=$sws['jumlah_sample'];
						
                ?>

<div class="modal fade" id="editpelanggan<?php echo $id_hasil;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Ubah Data</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url().'test/edit_hasil_test'; ?>">
      <div class="modal-body">
      
    
		<div class="form-group">
        
        <input type="text" value="<?php echo $id_hasil?>" name="id_hasil" hidden>
        <label><i class="fa fa-calendar"></i> Tanggal</label>
    <div class="input-group col-lg-6">
		<input type="date" class="form-control" name="tanggal" value=<?php echo $tanggal;?> required>
    </div>

		<label><i class="fa fa-map-marker"></i> Lokasi</label>
    <div class="input-group col-lg-8">
		<select name="lokasi" id="lokasi" class='form-control'>
        <option selected="<?php echo $lokasi;?>"><?php echo $lokasi?> </option>
        <?php foreach ($tampil_lokasi->result_array() as $lokasi):?>
                        
                        <option value="<?php echo $lokasi['nama_zona']; ?>"><?php echo $lokasi['nama_zona']; ?></option>
                        <?php endforeach;   ?>

        </select>
    </div>
    <label><i class="fa fa-check-circle-o"></i> Memenuhi Syarat (MS)</label>
    <div class="input-group col-lg-8">
		<input type="text" name="ms" class="form-control" value=<?php echo $ms;?> required>
    </div>

    <label><i class="fa fa-window-close-o"></i> Tidak Memenuhi Syarat (TMS)</label>
    <div class="input-group col-lg-8">
		<input type="text" name="tms" class="form-control" value=<?php echo $tms;?> required>
    </div>

    <label><i class="fa fa-clock-o"></i> Jumlah Sample</label>
    <div class="input-group col-lg-8">
		<input type="text" name="jumlah_sample" class="form-control" value=<?php echo $jumlah_sample;?> required>
    </div>

    <label><i class="fa fa-percent"></i> Persentase</label>
    <div class="input-group col-lg-8">
		<input type="text" name="persentase" class="form-control" value=<?php echo $persentase;?> required>
    </div>
    <label> <i class="fa fa-sticky-note"></i> Keterangan</label>
    <div class="input-group col-lg-8">
    <input type="text" name="keterangan" value="<?php echo $keterangan;?>" class="form-control">
    </div>


	
        <br>
 
<br>
                  
               
	
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      
                    </form></div>
    </div>
  </div>
</div>
                    <?php } ?>
  



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"><i class="fa fa-flask"></i> Tambah Hasil Test</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form autocomplete="off" method="post" action="<?php echo base_url().'test/tambah_hasil_test'; ?>">
		<div class="form-group">
    
		<label><i class="fa fa-calendar"></i> Bulan</label>
    <div class="input-group col-lg-6">
    <select name="bulan" id="bulan" class="form-control" required>
    <option disabled selected value> -- Pilih Bulan -- </option>
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
    <label> <i class="fa fa-calendar"></i> Tahun</label>
    <div class="input-group col-lg-6">
    <select name="tahun" id="tahun" class="form-control" required>
    <option disabled selected value> -- Pilih Tahun -- </option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    </select>
    </div>
		<label><i class="fa fa-map-marker"></i> Lokasi</label>
    <div class="input-group col-lg-8">
    <select name="lokasi" id="zona" class="form-control select2" style="width: 100%;" required>
    <option disabled selected value> -- Pilih Lokasi -- </option>
                      <?php foreach ($tampil_lokasi->result_array() as $lokasi):?>
                        
                        <option value="<?php echo $lokasi['nama_zona']; ?>"><?php echo $lokasi['nama_zona']; ?></option>
                        <?php endforeach;   ?>
                      </select>
    </div>

    <label><i class="fa fa-check-circle-o"></i> Memenuhi Syarat (MS)</label>
    <div class="input-group col-lg-8">
		<input type="text" name="ms" id="ms1" class="form-control" required>
    </div>

    <label><i class="fa fa-window-close-o"></i> Tidak Memenuhi Syarat (TMS)</label>
    <div class="input-group col-lg-8">
		<input type="text" name="tms" id="tms1" class="form-control" required>
    </div>

    <label><i class="fa fa-clock-o"></i> Jumlah Sample</label>
    <div class="input-group col-lg-8">
		<input type="text" name="jumlah_sample" id="jumlah_sample1" class="form-control" required readonly>
    </div>

    <label><i class="fa fa-percent"></i> Persentase</label>
    <div class="input-group col-lg-8">
		<input type="text" name="persentase" id="persentase1" class="form-control" required readonly>
    </div>
    
    <label> <i class="fa fa-sticky-note"></i> Keterangan</label>
    <div class="input-group col-lg-8">
    <input type="text" name="keterangan" class="form-control">
    </div>
   
        <br>

<br>

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>




</div>
</div>
</div>
<!-- Modal Edit Pelanggan -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> Prototype
  </div>
  <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Exitus</a>.</strong> All rights
  reserved.
</footer>
<script type="text/javascript">
	$(document).ready(function(){
    $('.data').DataTable({
        "scrollX": true
    });
    
	});
</script>
<div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url('assets/template/back/dist') ?>/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets/template/back/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/template/back/bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/template/back/bower_components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')?>">

</body>

</html>


<script>  
 $(document).ready(function(){  
  var count=0;
  var total_persentase=0;
  var total_jumlah_sample=0;
  var total_tms=0;
  var total_ms=0;
  $(".total_persentase").each(function(){
    total_persentase += parseInt($(this).text());
    count++;
    var final=total_persentase/count;
    $('#total_persentase2').html(final.toFixed(0)+" %");

});

$(".total_jumlah_sample").each(function(){
    total_jumlah_sample += parseInt($(this).text());
    $('#total_jumlah_sample2').html(total_jumlah_sample);

});

$(".total_tms").each(function(){
    total_tms += parseInt($(this).text());
    $('#total_tms2').html(total_tms);

});

$(".total_ms").each(function(){
    total_ms += parseInt($(this).text());
    $('#total_ms2').html(total_ms);

});

 });  
 </script>

<script>
 $(document).ready(function() {
             
                $('#ms1,#tms1').keyup(function(){
                var ms=parseInt($('#ms1').val());
                var tms=parseInt($('#tms1').val());
                var jumlah_sample=ms+tms;
                var persentase=ms/jumlah_sample*100;
                console.log(persentase);
                $('#jumlah_sample1').val(jumlah_sample);
                $('#persentase1').val(persentase.toFixed(0));
                });

            

            });
</script>
