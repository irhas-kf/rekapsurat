<section class="content-header">
  <h1>
    SUPERADMIN
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
    <li class="active">User Level</li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Daftar User Level</strong>
        </h3>
    	</div>
    	<div class="box-body">
        <div class="row">
          <div class="col-sm-12 col-md-12" style="margin-bottom: 1%;">
            <a class="btn btn-primary btn-tambah-level" href="javascript:;">Tambah Data</a>
          </div>
          <div class="col-sm-12 col-md-12">
            <table id="tabel-userlevel" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>    
          </div>
        </div>

     	</div>
    </div>
</section>

<div class="modal fade in" id="modal-level">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">...</h4>
      </div>

      <div class="modal-body">
        <form role="form" id="form-level" method="post" action="#">
          <?= form_hidden('id_level', '') ?>
          <div class="form-group">
            <label class="control-label">Level</label>
            <?= form_input('level', '', ['class'=>'form-control']) ?>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-batal-level">Batal</button>
        <button type="button" class="btn btn-primary btn-simpan-level">Simpan</button>
      </div>

    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<script>
  var tabelUserlevel;
  var modalLevel = $("#modal-level");
  var formLevel = $("#form-level");
  var inputIdLevel = formLevel.find('input[name=id_level]');
  var inputLevel = formLevel.find('input[name=level]');
  var dataForm = {};
  var url;

  $(document).ready(function(){
    initTabelUserlevel();

    $(".btn-tambah-level").on("click", function(e){
      e.preventDefault();
      resetForm();
      modalLevel.find(".modal-title").html("Tambah Data");
      showModal(modalLevel);
    })

    $(".btn-simpan-level").on("click", function(e){
      $.each(formLevel.serializeArray(), function(id, item){
        dataForm[item.name] = item.value;
      });

      if(dataForm['id_level']!=''){
        url = "<?= base_url('superadmin/user_level/edit_level') ?>";
      }else{
        url = "<?= base_url('superadmin/user_level/simpan_level') ?>";
      }

      $.ajax({
        url : url,
        type : 'post',
        data : dataForm,
        dataType : 'json',
        success : function(result){
          modalLevel.modal('hide');
          resetForm();
          swal({
            title: "",
            text: result.text,
            type: result.type,
            confirmButtonClass: "btn-sm btn-primary",
            confirmButtonText: "Ok"

          }, function(){
            tabelUserlevel.ajax.reload();

          });

        }
      });

    })

    $(".btn-batal-level").on("click", function(e){
      resetForm();
      modalLevel.find('.modal-title').html('...');
      modalLevel.modal('hide');
    })

  });

  function initTabelUserlevel()
  {
    tabelUserlevel = $("#tabel-userlevel").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax":{
         "url": "<?php echo base_url('superadmin/user_level/tabeluserlevel') ?>",
         "dataType": "json",
         "type": "POST",
            },
      "columns": [
              { "data": "ID", width:"5%", searchable:false },
              { "data": "LEVEL", width:"30%"},
              { "data": "ACTION", width:"10%", searchable:false, orderable:false },
           ],    
      createdRow: function(row, data, dataIndex){
          $( row ).attr('data-idlevel', data.ID);
          $( row ).attr('data-level', data.LEVEL);
      }
    });
  }

  function btnEditLevel(this_)
  {
    var dataRow = this_.parents('tr').data();
    inputIdLevel.val(dataRow['idlevel']);
    inputLevel.val(dataRow['level']);
    modalLevel.find('.modal-title').html("Edit Data");
    showModal(modalLevel);
  }

  function btnHapusLevel(this_)
  {
    var dataRow = this_.parents('tr').data();
    swal({
      title : "",
      text : "Anda yakin ingin hapus data ini?",
      type : "",

      showCancelButton: true,
      cancelButtonClass: "btn-sm btn-default",
      cancelButtonText: "Batal",

      confirmButtonClass: "btn-sm btn-danger",
      confirmButtonText: "Ya",
      closeOnConfirm: false,

      showLoaderOnConfirm: true,
    }, function(){
      $.ajax({
        url : "<?= base_url('superadmin/user_level/hapus_level') ?>",
        type: "post",
        data: "ID="+dataRow['idlevel'],
        dataType: "json",
        success: function(result){
          swal({
            title: "",
            text: result.text,
            type: result.type,
            confirmButtonClass: "btn-sm btn-primary",
            confirmButtonText: "Ok"

          }, function(){
            tabelUserlevel.ajax.reload();
          });
        }
      });
    });
  }

  function showModal(idModal)
  {
    idModal.modal({
      keyboard : false,
      backdrop : 'static',
    })
  }

  function resetForm()
  {
    formLevel.find("input[name=id_level]").val('');
    formLevel.find("input[name=level]").val('');
  }
</script>