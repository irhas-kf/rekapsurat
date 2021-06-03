<section class="content-header">
  <h1>
    SUPERADMIN
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
    <li class="active">User Roles</li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Daftar Roles</strong>
        </h3>
    	</div>
    	<div class="box-body">
          <div class="col-sm-4 col-md-4" style="margin-bottom: 1%;">
            <form class="form-horizontal" id="form-filter-level">
              <label class="col-sm-4 col-md-4 control-label">User Level</label>
              <div class="col-sm-6 col-md-6" style="padding-right: 0; padding-left: 0;">
                <?= form_dropdown('level', $user_level, $selected_level, ['class'=>'form-control']) ?>
              </div>
              <div class="col-sm-2 col-md-2" style="padding-left: 0;">
                <button type="button" class="btn btn-md btn-default btn-filter-level"><i class='fa fa-filter'></i> Filter</button>
              </div>
            </form>
          </div>
          <div class="col-md-8 col-sm-8">
            <h6>(Data akan refresh dalam <span class="text-second-val"></span> detik)</h6>
          </div>

        <!-- <div class="row"> -->
          <div class="col-sm-12 col-md-12">
            <table id="tabel-role" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>MODUL</th>
                  <th class="text-center">READ</th>
                  <th class="text-center">CREATE</th>
                  <th class="text-center">UPDATE</th>
                  <th class="text-center">DELETE</th>
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

<script>
  var tabelModul;
  var formFilterLevel = $("#form-filter-level");
  var selectFilterLevel = formFilterLevel.find("select[name=level]");
  var secondval = 5;

  $(document).ready(function(){
    initTabelModul();
    $(".text-second-val").html(secondval);

    $(".btn-filter-level").on("click", function(e){
      var level_id = selectFilterLevel.val();
      tabelModul.ajax.url("<?php echo base_url('superadmin/user_role/tabelrole') ?>/"+level_id).load();
    })

  });

  function set_role(this_)
  {
    var dataForm = {};
    var is_checked = this_.prop("checked");
    dataForm['id_role'] = this_.parents('tr').data('idrole');
    dataForm['name'] = this_.prop("name");
    if(is_checked){
      dataForm['value'] = this_.val();
    }else{
      dataForm['value'] = '0';
    }

    $.ajax({
      url : "<?= base_url('superadmin/user_role/set_role') ?>",
      type : 'post',
      data : dataForm,
      dataType : 'json',
      success : function(result){
        console.log(result);
      }
    });

  }

  function initTabelModul()
  {
    var level_id = selectFilterLevel.val();
    tabelModul = $("#tabel-role").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax":{
         "url": "<?php echo base_url('superadmin/user_role/tabelrole') ?>/"+level_id,
         "dataType": "json",
         "type": "POST",
            },
      "columns": [
              { "data": "NO", name:"ID", width:"5%", searchable:false },
              { "data": "MODUL", width:"30%"},
              { "data": "_READ", width:"10%", searchable:false, orderable:false },
              { "data": "_CREATE", width:"10%", searchable:false, orderable:false },
              { "data": "_UPDATE", width:"10%", searchable:false, orderable:false },
              { "data": "_DELETE", width:"10%", searchable:false, orderable:false },
           ],
      createdRow: function(row, data, dataIndex){
          $( row ).attr('data-idrole', data.ID);
          $( row ).find('td:eq(2), td:eq(3), td:eq(4), td:eq(5)')
              .attr('class', 'text-center');
      },
      rowCallback: function( row, data, index ){
        var info = tabelModul.page.info();
        $( row ).find('td:eq(0)').html(info.start+(index+1));
      },
      initComplete:function(){

        setInterval(function(){
          secondval--;
          $(".text-second-val").html(secondval);
          if(secondval==0){
            tabelModul.ajax.reload(null, false); 
            secondval = 6;
          }
        }, 1000);

      },

    });
  }
</script>