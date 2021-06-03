<section class="content-header">
  <h1>
    SUPERADMIN
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
    <li class="active">Menu</li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Daftar Menu</strong>
        </h3>
    	</div>
    	<div class="box-body">
        <div class="row">
          <div class="col-sm-12 col-md-12" style="margin-bottom: 1%;">
            <a class="btn btn-primary btn-tambah-menu" href="javascript:;">Tambah Menu</a>
          </div>
          <div class="col-sm-12 col-md-12">
            <table id="tabel-menu" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID MODUL</th>
                  <th>MODUL</th>
                  <th>MENU</th>
                  <th>LINK</th>
                  <th>ICON</th>
                  <th>MAIN MENU</th>
                  <th>SUPERADMIN ONLY</th>
                  <th>AKSI</th>
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
          <?= form_hidden('id_menu', '') ?>
          <div class="form-group">
            <label class="control-label">Modul</label>
            <?= form_input('modul', '', ['class'=>'form-control']) ?>
          </div>
          <div class="form-group">
            <label class="control-label">Menu</label>
            <?= form_input('menu', '', ['class'=>'form-control']) ?>
          </div>
          <div class="form-group">
            <label class="control-label">Link</label>
            <?= form_input('link', '', ['class'=>'form-control']) ?>
          </div>
          <div class="form-group">
            <label class="control-label">Icon</label>
            <?= form_input('icon', '', ['class'=>'form-control']) ?>
          </div>
          <div class="form-group">
            <label class="control-label">Main Menu</label>
            <?= form_dropdown('main_menu', [0=>"Parent Menu"], null, ['class'=>'form-control']) ?>
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

  var inputIdMenu = formModul.find('input[name=id_menu]');
  var inputMenu = formModul.find('input[name=menu]');
  var inputLink = formModul.find('input[name=link]');
  var inputIcon = formModul.find('input[name=icon]');
  var mainMenu = formModul.find('select[name=main_menu]');
  var dataForm = {};
  var url;

  $(document).ready(function(){
    initTabelModul();

    $(".btn-tambah-menu").on("click", function(e){
      e.preventDefault();
      resetForm();
      loadParentMenu();
      modalModul.find(".modal-title").html("Tambah Menu");
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

      if(dataForm['id_modul']!='' && dataForm['id_menu']!=''){
        url = "<?= $url_edit_menu ?>";
      }else{
        url = "<?= $url_simpan_menu ?>";
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
    tabelModul = $("#tabel-menu").DataTable({
      "processing": true,
      "serverSide": true,
      "deferRender": true,
      "ajax":{
         "url": "<?php echo $url_tabel_data ?>",
         "dataType": "json",
         "type": "POST",
            },
      "columns": [
              { "data": "MODUL_ID", width:"5%", searchable:false },
              { "data": "MODUL", width:"18%"},
              { "data": "MENU", width:"18%"},
              { "data": "LINK",},
              { "data": "ICON", render : function(data, type, row){
                return "<i class='"+row.ICON+"'></i> "+row.ICON;
              }},
              { "data": "MAIN_MENU", render : function(data, type, row){
                var ket_main_menu = "";
                if(row.MENU2!=null){
                  ket_main_menu = row.MENU2.toUpperCase();
                }

                return ket_main_menu;
              }},
              { "data": "SUPERADMIN_ONLY", width:"10%", searchable:false, orderable:false, render : function(data, type, row){
                if(row.SUPERADMIN_ONLY==1){
                  return "<i class='fa fa-check text-green fa-2x'></i>";
                }else{
                  return "<i class='fa fa-times text-danger fa-2x'></i>";
                }
              }},
              { "data": "AKSI", width:"10%", searchable:false, orderable:false },
           ],    
      createdRow: function(row, data, dataIndex){
          $( row ).attr('data-idmodul', data.MODUL_ID);
          $( row ).attr('data-modul', data.MODUL);
          $( row ).attr('data-superadmin', data.SUPERADMIN);

          $( row ).attr('data-idmenu', data.ID);
          $( row ).attr('data-menu', data.MENU);
          $( row ).attr('data-link', data.LINK);
          $( row ).attr('data-icon', data.ICON);
          $( row ).attr('data-mainmenu', data.MAIN_MENU);
      }
    });
  }

  function loadParentMenu() {
    $.ajax({
      type : "post",
      url : "<?= $url_parent_menu ?>",
      dataType : "json",
      success : function(result){
        mainMenu.html("");
        var opt = new Option("Parent Menu", 0);
        mainMenu.append(opt);

        if(result.length > 0){
          $.each(result, function(id, item){
            var opt = new Option(item.MENU.toUpperCase(), item.ID);
            mainMenu.append(opt);
          });
        }

      },
    });
  }

  function btnEditModul(this_)
  {
    resetForm();
    loadParentMenu();

    var dataRow = this_.parents('tr').data();
    inputIdModul.val(dataRow['idmodul']);
    inputModul.val(dataRow['modul']);
    if(dataRow['superadmin']=='1'){
      checkboxSuperadmin.prop('checked', true);
    }else{
      checkboxSuperadmin.prop('checked', false);
    }

    inputIdMenu.val(dataRow['idmenu']);
    inputMenu.val(dataRow['menu']);
    inputLink.val(dataRow['link']);
    inputIcon.val(dataRow['icon']);
    mainMenu.val(dataRow['mainmenu']).trigger("change");

    modalModul.find('.modal-title').html("Edit Menu");
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
        url : "<?= $url_hapus_menu ?>",
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
    formModul.find("input[name=id_modul]").val('');
    formModul.find("input[name=modul]").val('');
    formModul.find("input[name=menu]").val('');
    formModul.find("input[name=link]").val('');
    formModul.find("input[name=icon]").val('');
    formModul.find("select[name=main_menu]").val(0).trigger("change");
    formModul.find('input[type=checkbox][name=superadmin]').prop('checked', false);
  }
</script>