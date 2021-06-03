<section class="content-header">
  <h1>
    SUPERADMIN
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
    <li class="active">Modul</li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Daftar Modul</strong>
        </h3>
    	</div>
    	<div class="box-body">
        <div class="row">
          <div class="col-sm-12 col-md-12" style="margin-bottom: 1%;">
            <a class="btn btn-primary btn-tambah-modul" href="javascript:;">Tambah Data</a>
          </div>
          <div class="col-sm-12 col-md-12">
            <table id="tabel-modul" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>MODUL</th>
                  <th>SUPERADMIN ONLY</th>
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

<div class="modal fade in" id="modal-modul">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">...</h4>
      </div>

      <div class="modal-body">
        <form role="form" id="form-modul" method="post" action="#">
          <?= form_hidden('id_modul', '') ?>
          <div class="form-group">
            <label class="control-label">Modul</label>
            <?= form_input('modul', '', ['class'=>'form-control']) ?>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                  <?= form_checkbox('superadmin', '1', '', []) ?>
                  Superadmin Only
              </label>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-batal-modul">Batal</button>
        <button type="button" class="btn btn-primary btn-simpan-modul">Simpan</button>
      </div>

    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<script>
  var tabelModul;
  var modalModul = $("#modal-modul");
  var formModul = $("#form-modul");
  var inputIdModul = formModul.find('input[name=id_modul]');
  var inputModul = formModul.find('input[name=modul]');
  var checkboxSuperadmin = formModul.find('input[type=checkbox][name=superadmin]');
  var dataForm = {};
  var url;

  $(document).ready(function(){
    initTabelModul();

    $(".btn-tambah-modul").on("click", function(e){
      e.preventDefault();
      resetForm();
      modalModul.find(".modal-title").html("Tambah Data");
      showModal(modalModul);
    })

    $(".btn-simpan-modul").on("click", function(e){
      $.each(formModul.serializeArray(), function(id, item){
        dataForm[item.name] = item.value;
      });
      if(!checkboxSuperadmin.prop('checked'))
      {
        dataForm['superadmin'] = 0;
      }

      if(dataForm['id_modul']!=''){
        url = "<?= base_url('superadmin/modul/edit_modul') ?>";
      }else{
        url = "<?= base_url('superadmin/modul/simpan_modul') ?>";
      }

      $.ajax({
        url : url,
        type : 'post',
        data : dataForm,
        dataType : 'json',
        success : function(result){
          modalModul.modal('hide');
          resetForm();
          swal({
            title: "",
            text: result.text,
            type: result.type,
            confirmButtonClass: "btn-sm btn-primary",
            confirmButtonText: "Ok"

          }, function(){
            tabelModul.ajax.reload();

          });

        }
      });

    })

    $(".btn-batal-modul").on("click", function(e){
      resetForm();
      modalModul.find('.modal-title').html('...');
      modalModul.modal('hide');
    })

  });

  function initTabelModul()
  {
    tabelModul = $("#tabel-modul").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax":{
         "url": "<?php echo base_url('superadmin/modul/tabelmodul') ?>",
         "dataType": "json",
         "type": "POST",
            },
      "columns": [
              { "data": "ID", width:"5%", searchable:false },
              { "data": "MODUL", width:"30%"},
              { "data": "SUPERADMIN", width:"10%", searchable:false, orderable:false, render : function(data, type, row){
                if(row.SUPERADMIN==1){
                  return "<i class='fa fa-check text-green fa-2x'></i>";
                }else{
                  return "<i class='fa fa-times text-danger fa-2x'></i>";
                }
              }},
              { "data": "ACTION", width:"10%", searchable:false, orderable:false },
           ],    
      createdRow: function(row, data, dataIndex){
          $( row ).attr('data-idmodul', data.ID);
          $( row ).attr('data-modul', data.MODUL);
          $( row ).attr('data-superadmin', data.SUPERADMIN);
      }
    });
  }

  function btnEditModul(this_)
  {
    var dataRow = this_.parents('tr').data();
    inputIdModul.val(dataRow['idmodul']);
    inputModul.val(dataRow['modul']);
    if(dataRow['superadmin']=='1'){
      checkboxSuperadmin.prop('checked', true);
    }else{
      checkboxSuperadmin.prop('checked', false);
    }
    modalModul.find('.modal-title').html("Edit Data");
    showModal(modalModul);
  }

  function btnHapusModul(this_)
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
        url : "<?= base_url('superadmin/modul/hapus_modul') ?>",
        type: "post",
        data: "id_modul="+dataRow['idmodul'],
        dataType: "json",
        success: function(result){
          swal({
            title: "",
            text: result.text,
            type: result.type,
            confirmButtonClass: "btn-sm btn-primary",
            confirmButtonText: "Ok"

          }, function(){
            tabelModul.ajax.reload();
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
    formModul.find('input[type=checkbox][name=superadmin]').prop('checked', false);
    formModul.find("input[name=id_modul]").val('');
    formModul.find("input[name=modul]").val('');
  }
</script>