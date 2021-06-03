<section class="content-header">
  <h1>
    POSTING
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-paper"></i> Posting</li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Ubah Posting</strong>
        </h3>
        <a class="btn btn-warning pull-right" href="<?= base_url("posting") ?>">Kembali</a>
    	</div>
    	<div class="box-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <form role="form" class="" id="form-buat-posting" method="post" action="<?= base_url('posting/perbarui') ?>">
              <input type="hidden" name="id" value="<?= $posting['id'] ?>">

              <div class="form-group">
                <label class="control-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= $posting['judul'] ?>" required="">
              </div>

              <div class="form-group">
                <label class="control-label">Konten</label>
                <textarea name="konten" class="form-control" rows="9"><?= $posting['konten'] ?></textarea>
              </div>

              <div class="form-group">
                <label class="control-label">Author</label>
                <input type="hidden" name="id_user" value="<?= $posting['id_user'] ?>">
                <input type="text" name="username" class="form-control" value="<?= $posting['username'] ?>" disabled="">
              </div>

              <div class="form-group pull-right">
                <a href="<?= base_url("posting") ?>" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>

            </form>
          </div>
        </div>

     	</div>
    </div>
</section>

<script>

</script>