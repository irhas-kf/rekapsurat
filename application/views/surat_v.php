<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url("surat") ?>">Input Surat</a></li>
          <li class="breadcrumb-item active">Input</li>
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
            <h3 class="box-title">FORM REKAP LAMPIRAN SURAT</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-6">
                <label>TANGGAL PENGAJUAN *</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="tanggal_pengajuan" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">NAMA *</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">NOMOR KARTU KELUARGA *</label>
                <input type="number" class="form-control" name="nkk" placeholder="NIK (16 digit)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "16" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">NOMOR INDUK KELUARGA *</label>
                <input type="number" class="form-control" name="nik" placeholder="Nomor KK (16 digit)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "16" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">NOMOR KIS *</label>
                <input type="text" class="form-control" name="no_kis" placeholder="Nomor KIS" required="">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">ALAMAT *</label>
                <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label>NAMA FASKES / PUSKESMAS *</label>
                <select class="form-control" name="faskes" required="">
                  <option value="0">--- Belum memilih Faskes / Puskesmas ---</option>
                  <?php foreach($datafaskes as $u){?>
                    <option value="<?php echo $u->id_faskes ?>"><?php echo $u->nama_faskes ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label>Jenis Surat *</label>
                <select class="form-control" name="jenis_surat" required="">
                  <option value="0">--- Belum memilih jenis surat ---</option>
                  <?php foreach($datasurat as $s){?>
                    <option value="<?php echo $s->id_jenis_surat ?>"><?php echo $s->nama_jenis_surat ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-6">
                <label for="exampleInputEmail1">Keterangan *</label>
                <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan  "></textarea>
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
