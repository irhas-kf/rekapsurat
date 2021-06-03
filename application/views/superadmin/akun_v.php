<section class="content-header">
  <h1>
    SUPERADMIN
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
    <li class="active">Akun</li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Daftar Akun</strong>
        </h3>
    	</div>
    	<div class="box-body">
          <div class="col-sm-12 col-md-6" style="margin-bottom: 1%;">
            <div class="col-sm-12 col-md-2" style="padding-left: 0;">
              <button class="btn btn-md btn-primary btn-tambah-akun"><i class="fa fa-plus"></i> AKUN</button>
            </div>
            <div class="col-sm-12 col-md-10">
              <form class="form-horizontal" id="form-filter-level">
                <label class="col-sm-12 col-md-4 control-label">User Level</label>
                <div class="col-sm-6 col-md-6" style="padding-right: 0; padding-left: 0;">
                  <?= form_dropdown('level', $user_level, [], ['class'=>'form-control']) ?>
                </div>
                <div class="col-sm-6 col-md-2" style="padding-left: 0;">
                  <button type="button" class="btn btn-md btn-default btn-filter-level"><i class='fa fa-filter'></i> Filter</button>
                </div>
              </form>
            </div>
          </div>

        <!-- <div class="row"> -->
          <div class="col-sm-12 col-md-12">
            <table id="tabel-role" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>username</th>
                  <th>password</th>
                  <th>LEVEL</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>    
          </div>
        <!-- </div> -->

     	</div>
    </div>
</section>

<div class="modal fade" id="modal-akun">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">...</h4>
      </div>
      <form class="form-horizontal" id="form-tambah-akun">
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-sm-2 col-md-2">Level</label>
          <div class="col-sm-10 col-md-10">
            <?= form_hidden('id_akun', '', []) ?>
            <?= form_dropdown('level_id', $user_level, [],['class'=>'form-control']) ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 col-md-2">Username</label>
          <div class="col-sm-10 col-md-10">
            <input type="text" name="username" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2 col-md-2">Password</label>
          <div class="col-sm-10 col-md-10">
            <input type="password" name="password" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-akun-batal">Batal</button>
        <button type="button" class="btn btn-success btn-akun-simpan">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  var tabelAkun;
  var formFilterLevel = $("#form-filter-level");
  var selectFilterLevel = formFilterLevel.find("select[name=level]");
  var modalAkun = $("#modal-akun");
  var formTambahAkun = $("#form-tambah-akun");
  var dataForm = {};
  var inputIdAkun = formTambahAkun.find("input[name=id_akun]");
  var selectLevelId = formTambahAkun.find("select[name=level_id]");
  var inputUsername = formTambahAkun.find('input[name=username]');

  $(document).ready(function(){
    initTabelAkun();    

    $(".btn-filter-level").on("click", function(e){
      var level_id = selectFilterLevel.val();
      tabelAkun.ajax.url("<?php echo base_url('superadmin/akun/tabelakun') ?>/"+level_id).load();
    });

    $(".btn-tambah-akun").on("click", function(){
      inputIdAkun.val('');
      selectLevelId.change().removeAttr('disabled');
      inputUsername.val('').removeAttr('disabled');
      modalAkun.find('.modal-title').html("Tambah Akun");
      showModal(modalAkun);
    });

    $(".btn-akun-batal").on('click', function(){
      modalAkun.modal('hide');
      resetFormAkun();
    });

    $(".btn-akun-simpan").on('click', function(){
      var formData = formTambahAkun.serializeArray();
      $.each(formData, function(id, data){
        dataForm[data.name] = data.value;
      })

      var setVal = true;
      if(dataForm['id_akun']!=''){
        url = "<?= base_url('superadmin/akun/edit_akun') ?>";
        $.each(dataForm, function(id, data){
          if(data==''){
            setVal = false;
            return false;

          }else{
            setVal = true;

          }
          
        })
      }else{
        url = "<?= base_url('superadmin/akun/simpan_akun') ?>";
        $.each(dataForm, function(id, data){
          if(data=='' && id!="id_akun"){
            setVal = false;
            return false;

          }else{
            setVal = true;

          }

        })
      }

      if(!setVal){
        swal("", "Silakan Lengkapi Form Akun", "warning");
      }else{
        $.ajax({
          url : url,
          type : 'post',
          data : dataForm,
          dataType : 'json',
          success : function(result){
            modalAkun.modal('hide');
            resetFormAkun();
            swal({
              title: "",
              text: result.text,
              type: result.type,
              confirmButtonClass: "btn-sm btn-primary",
              confirmButtonText: "Ok"

            }, function(){
              tabelAkun.ajax.reload(null, false);

            });

          }
        });
        /* end : ajax*/
      }

    });

    inputUsername.on("keydown", function(event){
      var key = window.event ? event.keyCode : event.which;
      if (event.keyCode === 8 || event.keyCode === 46) {
          return true;
      } else if ( key < 48 || key > 90 ) {
          return false;
      } else {
          return true;
      }

    })

  });

  function initTabelAkun()
  {
    var level_id = selectFilterLevel.val();
    tabelAkun = $("#tabel-role").DataTable({
      "processing": false,
      "serverSide": true,
      "ajax":{
         "url": "<?php echo base_url('superadmin/akun/tabelakun') ?>/"+level_id,
         "dataType": "json",
         "type": "POST",
            },
      "columns": [
              { "data": "NO", name:"ID", width:"5%", searchable:false },
              { "data": "USERNAME", width:"30%"},
              { "data": "PASSWORD", width:"20%", searchable:false, orderable:false },
              { "data": "LEVEL", width:"20%", orderable:false },
              { "data": "ACTION", width:"20%", searchable:false, orderable:false },
           ],    
      createdRow: function(row, data, dataIndex){
          $( row ).attr('data-idakun', data.ID);
          $( row ).attr('data-username', data.USERNAME);
      }
    });
  }

  function btnResetAkun(this_){
    var dataRow = this_.parents('tr').data();
    $.ajax({
      url : '<?= base_url('superadmin/akun/get_data_akun') ?>',
      type: 'post',
      data: { ID : dataRow['idakun'] },
      dataType : 'json',
      success: function(result){
        inputIdAkun.val(result.ID);
        selectLevelId.val(result.LEVEL_ID).change().attr('disabled', '');
        inputUsername.val(result.USERNAME).attr('disabled', '');
        modalAkun.find('.modal-title').html("RESET PASSWORD AKUN");
        showModal(modalAkun);
      }
    });
  }

  function btnHapusAkun(this_){
    
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
        url : "<?= base_url('superadmin/akun/hapus_akun') ?>",
        type: "post",
        data: "id_akun="+dataRow['idakun'],
        dataType: "json",
        success: function(result){
          swal({
            title: "",
            text: result.text,
            type: result.type,
            confirmButtonClass: "btn-sm btn-primary",
            confirmButtonText: "Ok"

          }, function(){
            tabelAkun.ajax.reload();
          });
        }
      });
    });

  }

  function resetFormAkun(){
    modalAkun.find(".modal-title").html('...');
    formTambahAkun[0].reset();
  }

  function showModal(idModal){
    idModal.modal({
      backdrop : 'static',
      keyboard : false,
    })
  }
</script>