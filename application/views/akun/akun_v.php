<section class="content-header">
  <h1>
    AKUN
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-key"></i> Akun</a></li>
  </ol>
</section>

<section class="content">
	<div class="box">
    	<div class="box-header with-border">
    		<h3 class="box-title">
          <strong>Perbarui Akun</strong>
        </h3>
    	</div>
    	<div class="box-body">
          <div class="col-md-4 col-sm-4">
            <form role='form' class="form-horizontal" action="#" method="post" id="form-ganti-pass">
              <div class="form-group">
                <label class="control-label col-sm-4 col-md-4">Username</label>
                <div class="col-sm-8 col-md-8">
                  <?= form_input('username', $akun['username'], ['class'=>'form-control', 'placeholder'=>'Username', 'required'=>'']) ?>
                  <span class="help-block text-red">*username akan diganti sesuai isian</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4 col-md-4">Password</label>
                <div class="col-sm-8 col-md-8">
                  <?= form_password('password', '', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>'']) ?>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="control-label col-sm-4 col-md-4">New Password</label>
                <div class="col-sm-8 col-md-8">
                  <?= form_password('new_password', '', ['class'=>'form-control', 'placeholder'=>'New Password', 'required'=>'', 'id'=>'new_password']) ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4 col-md-4">Re-Type Password</label>
                <div class="col-sm-8 col-md-8">
                  <?= form_password('re_password', '', ['class'=>'form-control', 'placeholder'=>'Re-Type Password', 'required'=>'', 'id'=>'re_password']) ?>
                  <span class="help-block text-red text-warn">...</span>
                </div>
              </div>

              <div class="form-group">
                <button type="button" class="btn btn-sm btn-success btn-ubah pull-right">Perbarui</button>
              </div>
            </form>
          </div>

     	</div>
    </div>
</section>


<script>
  var formGantiPass = $("#form-ganti-pass");
  var inputUsername = formGantiPass.find('input[name=username]');
  var inputNewPassword = formGantiPass.find('input[name=new_password]');
  var inputReTypePassword = formGantiPass.find('input[name=re_password]');
  var act = '<?= $this->input->get('act')!=""? $this->input->get('act') : '0' ?>';

  $(document).ready(function(){
    $('.text-warn').html('...').hide();

    if(act==1){
      setTimeout(function(){
        window.location.href = "<?= base_url('auth/logout') ?>";
      }, 2000)
    }

    $("#new_password, #re_password").on('keyup', function(e){
      var new_password = $('#new_password').val();
      var re_password = $('#re_password').val();
      if(new_password!=re_password){
        $('.text-warn').html('Password not Match').show();
      }else{
        $('.text-warn').html('...').hide();
      }
    });

    $('.btn-ubah').on('click', function(e){
      var new_password = $('#new_password').val();
      var re_password = $('#re_password').val();
      if(new_password!=re_password){
        $('.text-warn').html('Password not Match').show();
      }else{
        formGantiPass.attr('action', '<?= base_url('akun/perbarui_akun') ?>');
        formGantiPass.submit();
      }
    })

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

</script>