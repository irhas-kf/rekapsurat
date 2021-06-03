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
          <strong>Daftar Posting</strong>
        </h3>
    	</div>
    	<div class="box-body">
        <div class="row">
          <div class="col-sm-12 col-md-12" style="margin-bottom: 1%;">
            <?= allowAction('create', $acl, '<a class="btn btn-primary" href="'.base_url("posting/tambah").'">Buat Posting</a>') ?>
          </div>
          <div class="col-sm-12 col-md-12">
            <table id="tabel-posting" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Author</th>
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

<script>
  var tabelPosting;
  var dataForm = {};
  var url;

  $(document).ready(function(){
    initTabelPosting();

  });

  function initTabelPosting()
  {
    tabelPosting = $("#tabel-posting").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax":{
         "url": "<?php echo base_url('posting/daftar_posting') ?>",
         "dataType": "json",
         "type": "POST",
            },
      "columns": [
              { "data": "id", width:"5%", searchable:false, render : function(id, display, data){
                return data.no;
              } },
              { "data": "judul", width:"30%"},
              { "data": "author", width:"10%"},
              { "data": "aksi", width:"10%", searchable:false, orderable:false },
           ],    
      createdRow: function(row, data, dataIndex){
          $( row ).attr('data-idposting', data.id);
      }
    });
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
        url : "<?= base_url('posting/hapus') ?>",
        type: "post",
        data: "id="+dataRow['idposting'],
        dataType: "json",
        success: function(result){
          swal({
            title: "",
            text: result.text,
            type: result.type,
            confirmButtonClass: "btn-sm btn-primary",
            confirmButtonText: "Ok"

          }, function(){
            tabelPosting.ajax.reload();
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
</script>