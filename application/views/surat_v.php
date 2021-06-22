<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url("surat") ?>">Surat</a></li>
          <li class="breadcrumb-item active">Input Arsip Surat</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- /.box -->
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-body">
      <form class="form-horizontal" action="<?=base_url('Surat/input_rekap_aksi');?>" method="post">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">FORM ARSIP SURAT</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">KODE KLASIFIKASI*</label>
                <input type="text" class="form-control" name="kd_klasifikasi" placeholder="Kode Klasifikasi Surat" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label>Jenis Surat *</label>
                <select class="form-control" name="jenis_surat" required="">
                  <option value="0">--- Belum memilih jenis surat ---</option>
                  <option value="masuk"> MASUK </option>
                  <option value="keluar"> KELUAR </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label>TANGGAL MASUK/KELUAR SURAT *</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="tanggal_surat" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">URAIAN INFORMASI ARSIP*</label>
                <input type="text" class="form-control" name="nama_surat" placeholder="Uraian Informasi Arsip" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">JUMLAH SURAT*</label>
                <input type="text" class="form-control" name="jumlah_surat" placeholder="Jumlah Surat" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">KETERANGAN SURAT*</label>
                <textarea type="text" class="form-control" name="keterangan_surat" placeholder="Keterangan"></textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="form-group">
          <div class="col-md-5">
            <button type="submit" name="submit" id="swalDefaultSuccess" class="btn btn-success"> SIMPAN </button>
        </div>
         <div class="form-group">
          <div class="col-md-1">
            <button type="button" name="button" onClick="window.location.reload();" class="btn btn-danger pull-left"> HAPUS </button>
        </div>
      </form>
    </div>
  </div>
</section>
<script>
// Variables
var field = document.querySelector('#today');
var date = new Date();
// Set the value
field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
    '-' + date.getDate().toString().padStart(2, 0);
</script>
