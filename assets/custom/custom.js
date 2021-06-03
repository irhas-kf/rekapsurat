$(document).ready(function(){
  $('#example1').DataTable();
  
  $("#sj_tambah").on('click', function(){
    var html = ' <tr>'+
                    '<td></td>'+
                  '</tr>';
  
  })

   $('.select2').select2();
   $('.datepicker').datepicker({
      autoclose: true,
      autoUpdateInput: false,
    })
   $('#daterangepicker').daterangepicker();
})

function sj_tambah(arr){
  var t = $('#example1').DataTable();
  t.row.add(['<input name="id_jalan_list[]" type="hidden" id="id_jalan_list'+arr[0]+'" value="'+arr[5]+'"></input>'+
            '<input name="id_barang_jalan[]" type="hidden" id="id_barang_jalan'+arr[0]+'" value="'+arr[1]+'"></input>'+
            '<input name="kem_jalan[]" type="hidden" id="kem_jalan'+arr[0]+'" value="'+arr[4]+'"></input>'+
            '<input type="hidden" id="val'+arr[0]+'" value="'+arr[1]+'-'+arr[4]+'"></input>'+
            '<input type="hidden" id="jalan_stok'+arr[0]+'" value='+arr[3]+'></input>'+
    '<div id="jalan_barang'+arr[0]+'">'+arr[2]+'</div>',
    '<div id="jalan_jumlah'+arr[0]+'">'+arr[4]+'</div>',
    '<button class="btn btn-warning" type="button" onclick="sj_edit('+arr[0]+')"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" type="button" onclick="hapus($(this))"><i class="fa fa-trash"></i></button>']).draw(false);
}

function sj_edit(id){
  var id_barang = $("#id_barang_jalan"+id).val();
  var kembali = $("#kem_jalan"+id).val();
  var stok = $("#jalan_stok"+id).val();
  var barang = $("#jalan_barang"+id).text();
  var id_table = $("#id_jalan_list"+id).text();
  get_dtable(id_barang);

  $("#detail_cmb").html("");

  html = '<form class="form-horizontal">'+
            '<div class="form-group">'+
            '  <label class="col-sm-3">Nama Barang</label>'+
              '<label class="col-sm-3" id="jalan_barang"></label>'+
            '</div>'+
            '<div class="form-group">'+
              '<label class="col-sm-3">Stok</label>'+
              '<label class="col-sm-3" id="jalan_jumlah"></label>'+
            '</div>'+
            '<div class="form-group">'+
              '<label class="col-sm-3">Dikeluarkan</label>'+
              '<div class="col-sm-4">'+
                '<input type="number" name="jalan" id="jalan_kembali" class="form-control" value="">'+
                '<p class="help-block" id="peringatan"></p>'+
              '</div>'+
          '</div>'+
          '</form>';
  $("#detail_cmb").append(html);

  // $("#id_table").val(id_table);
  // $("#id_barang_modal").val(id_barang);
  // $("#jalan_barang").text(barang);
  // $("#jalan_jumlah").text(stok);
  // $("#jalan_kembali").val(kembali);
  // $("#urut_list").val(id);

  // $("#modal-default").modal('show');
  // $("#form_sj").hide();
  // $("#btn_edit").show();
  // $("#btn_selesai").hide();

  function a(){
     var val_d = parseInt($("#temp_").val());
    $("#id_table").val(id_table);
    $("#id_barang_modal").val(id_barang);
    $("#jalan_barang").text(barang);
    $("#jalan_jumlah").text(val_d+parseInt(kembali));
    $("#jalan_kembali").val(kembali);
    $("#urut_list").val(id);

    $("#modal-default").modal('show');
    $("#form_sj").hide();
    $("#btn_edit").show();
    $("#btn_selesai").hide();
  }

  setTimeout(a, 500);
}

function sj_ed(arr){
  $("#id_barang_jalan"+arr[0]).val(arr[1]);
  $("#jalan_barang"+arr[0]).val(arr[2]);
  $("#kem_jalan"+arr[0]).val(arr[4]);
  $("#val"+arr[0]).val(arr[1]+'-'+arr[4]);
  $("#jalan_jumlah"+arr[0]).text(arr[4]);
  $("#jalan_stok"+arr[0]).val(arr[3]);
}

function g_tambah(){
   var html = ' <tr>'+
                    '<td></td>'+
                    '<td>BR0001</td>'+
                    '<td>Barang 1</td>'+
                    '<td>3</td>'+
                    '<td><input name="" class="form-control"></input></td>'+
                    '<td><button class="btn btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></i></button></td>'+
                  '</tr>';
    $("#sj_body").append(html);
}

function tb_tambah(arr){
   var html = ' <tr id="'+arr[6]+'">'+
                    '<input type="hidden" name="id_terima_barang[]" id="id_terima_barang'+arr[6]+'" value="'+arr[7]+'"></input>'+
                    '<input type="hidden" name="id_barang[]" id="id_barang'+arr[6]+'" value="'+arr[5]+'"></input>'+
                    '<input type="hidden" name="id_kat[]" id="id_kat'+arr[6]+'" value="'+arr[1]+'"></input>'+
                    '<input type="hidden" name="harga_satuan[]" id="harga_satuan'+arr[6]+'" value="'+arr[3]+'"></input>'+
                    '<input type="hidden" name="jumlah[]" id="jumlah'+arr[6]+'" value="'+arr[4]+'"></input>'+
                    '<td>#</td>'+
                    '<td id="nama_barang_list'+arr[6]+'">'+arr[0]+'</td>'+
                    '<td id="">'+arr[2]+'</td>'+
                    '<td id="">'+arr[3]+'</td>'+
                    '<td id="">'+arr[4]+'</td>'+
                    '<td><button class="btn btn-warning" type="button" onclick="tb_edit('+arr[6]+')"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></i></button></td>'+
                  '</tr>';
    $("#tb_body").append(html);
}

function tb_edit(id){
  var id_terima_barang_list = $("#id_terima_barang_list"+id).val();
  var id_barang = $("#id_barang"+id).val();
  var id_kat = $("#id_kat"+id).val();
  var harga_satuan = $("#harga_satuan"+id).val();
  var jumlah = $("#jumlah"+id).val();
  var nama = $("#nama_barang_list"+id).val();
  
  $("#cmb_barang_terima").val(id_barang).trigger('change');
  $("#cmb_kat_terima").val(id_kat);
  $("#harga_terima").val(harga_satuan);
  $("#jumlah_terima").val(jumlah);
  $("#urut_list").val(id);
  $("#id_table").val(id_terima_barang_list);
  
  $("#modal-default").modal('show');
  $("#btn_selesai").hide();
  $("#btn_edit").show();
  console.log(id_terima_barang_list+' '+id);
}

function tb_tb(arr){
  var t = $('#example1').DataTable();
  t.row.add(['<input type="hidden" name="id_terima_barang[]" id="id_terima_barang_list'+arr[6]+'" value="'+arr[7]+'"></input>'+
                    '<input type="hidden" name="id_barang[]" id="id_barang'+arr[6]+'" value="'+arr[5]+'"></input>'+
                    '<input type="hidden" name="id_kat[]" id="id_kat'+arr[6]+'" value="'+arr[1]+'"></input>'+
                    '<input type="hidden" name="harga_satuan[]" id="harga_satuan'+arr[6]+'" value="'+arr[3]+'"></input>'+
                    '<input type="hidden" name="jumlah[]" id="jumlah'+arr[6]+'" value="'+arr[4]+'"></input>'+

                    '<input type="hidden" id="nama_barang_list'+arr[6]+'" value="'+arr[0]+'"></input>'+
          '<div id="barang_list'+arr[6]+'">'+arr[0]+'</div>',
          '<div id="kategori_list'+arr[6]+'">'+arr[2]+'</div>',
          '<div id="satuan_list'+arr[6]+'">'+arr[3]+'</div>',
          '<div id="jumlah_list'+arr[6]+'">'+arr[4]+'</div>',
          '<button class="btn btn-warning" type="button" onclick="tb_edit('+arr[6]+')"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" type="button" onclick="hapus($(this))"><i class="fa fa-trash"></i></button>']).draw(false);
}

function tb_ed(arr){
  $("#id_terima_barang_list"+arr[6]).val(arr[7]);
  $("#id_barang"+arr[6]).val(arr[5]);
  $("#id_kat"+arr[6]).val(arr[1]);
  $("#harga_satuan"+arr[6]).val(arr[3]);
  $("#jumlah"+arr[6]).val(arr[4]);
  $("#nama_barang_list"+arr[6]).val(arr[0]);
  $("#barang_list"+arr[6]).text(arr[0]);
  $("#kategori_list"+arr[6]).text(arr[2]);
  $("#satuan_list"+arr[6]).text(arr[3]);
  $("#jumlah_list"+arr[6]).text(arr[4]);

  console.log(arr.toString());
}

function hapus(d){
  var tb = $('#example1').DataTable();
  tb.row(d.parents('tr')).remove().draw();
//  alert(d);
}


function kb_tambah(arr){
  var t = $('#example1').DataTable();
  t.row.add(['<input name="id_kembali_list[]" type="hidden" id="id_kembali_list'+arr[0]+'" value="'+arr[6]+'"></input>'+
            '<input name="id_barang_kembali[]" type="hidden" id="id_barang_kembali'+arr[0]+'" value="'+arr[1]+'"></input>'+
            '<input name="kem_kembali[]" type="hidden" id="kem_kembali'+arr[0]+'" value="'+arr[5]+'"></input>'+
            '<input type="hidden" id="val'+arr[0]+'" value="'+arr[1]+'-'+arr[5]+'"></input>'+
            '<input type="hidden" id="kembali_stok'+arr[0]+'" value='+arr[4]+'></input>'+
    '<div id="kembali_barang'+arr[0]+'">'+arr[2]+'</div>',
    //'<div id="kembali_kategori'+arr[0]+'">'+arr[3]+'</div>',
    '<div id="kembali_jumlah'+arr[0]+'">'+arr[5]+'</div>',
    '<button class="btn btn-warning" type="button" onclick="kb_edit('+arr[0]+')"><i class="fa fa-pencil"></i></button><button class="btn btn-danger" type="button" onclick="hapus($(this))"><i class="fa fa-trash"></i></button>']).draw(false);

}

function kb_edit(id){
  var id_barang = $("#id_barang_kembali"+id).val();
  var id_kembali_barang = $("#id_kembali_list"+id).val();
  var kembali = $("#kembali_kembali"+id).val();

  var nama = $("#kembali_barang"+id).text();
  var kat = $("#kembali_kategori"+id).text();
  var stok = $("#kembali_stok"+id).val();
  var jum = $("#kem_kembali"+id).val();
  
  temp_barang['idbarang-'+id_barang]['jml_edit'] = parseInt(temp_barang['idbarang-'+id_barang]['jumlah'])+parseInt(jum);
  reload_cmb_barang(temp_barang);

 // get_dtable(id_barang);

  /*$("#detail_cmb").html("");
   html = '<form class="form-horizontal">'+
          '<div class="form-group">'+
          '  <label class="col-sm-3">Nama Barang</label>'+
            '<label class="col-sm-3" id="kembali_barang"></label>'+
          '</div>'+
          '<div class="form-group">'+
            '<label class="col-sm-3">Kategori</label>'+
            '<label class="col-sm-3" id="kembali_kategori"></label>'+
          '</div>'+
          '<div class="form-group">'+
            '<label class="col-sm-3">Stok</label>'+
            '<label class="col-sm-3" id="kembali_jumlah"></label>'+
          '</div>'+
          '<div class="form-group">'+
            '<label class="col-sm-3">Dikembalikan</label>'+
            '<div class="col-sm-4">'+
              '<input type="number" name="kembali" id="kembali_kembali" class="form-control" value="">'+
              '<p class="help-block" id="peringatan"></p>'+
            '</div>'+
        '</div>'+
        '</form>';
  $("#detail_cmb").append(html);*/

  // var val_d = parseInt($("#temp_").val());
  // $("#id_barang_modal").val(id_barang);
  // $("#nama_barang_modal").val(nama);
  // $("#kembali_barang").text(nama);
  // $("#kembali_kategori").text(kat);
  // $("#kembali_jumlah").text(stok);
  // $("#kembali_kembali").val(jum);
  // $("#urut_list").val(id);
  
  // $("#modal-default").modal('show');
  // $("#form_barang").hide();
  // $("#btn_edit").show();
  // $("#btn_selesai").hide();
 

  function a(){
    var val_d = parseInt($("#temp_").val());
    $("#cmb_barang_kembali").val(id_barang).change();
    $("#nama_barang_modal").val(nama);
    $("#kembali_barang").text(nama);
    $("#kembali_kategori").text(kat);
    $("#id_kembali_barang").val(id_kembali_barang);
    //  console.log(id_kembali_barang);
    $("input[name=jumlah]").val(jum);
   
    $("#id_barang_kembali").val(id_barang);
    $("#urut_list").val(id);
    $("#modal-default").modal('show');
    //$("#form_barang").hide();
    $("#btn_edit").show();
    $("#btn_selesai").hide();
    }
   setTimeout(a, 1000);
  // console.log(get_dtable(id_barang));
}

function kb_ed(arr){
  $("#id_barang_kembali"+arr[0]).val(arr[1]);
  $("#id_kembali_list"+arr[0]).val(arr[6]);
  $("#kem_kembali"+arr[0]).val(arr[5]);
  $("#kembali_barang"+arr[0]).text(arr[2]);
 // $("#kembali_kategori"+arr[0]).text(arr[3]);
  $("#kembali_stok"+arr[0]).val(arr[4]);
  $("#kembali_jumlah"+arr[0]).text(arr[5]);
}

function del(id, ur, link){
  swal({
    title: 'Anda yakin?',
    text: "",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya'
    }).then((result) => {
      $.ajax({
          url: ur,
          dataType: 'json',
          data: {id : id},
          type: 'post',
          success: function(result){
                if(result.status == 0){
                      window.location = link;
                }else{
                 }
              }
          })
  })

  function notifswal(d, d2){
    swal(d, d2, "info");
  }
}

function reload_cmb_barang(respon) {
  $("#cmb_barang_kembali").html('');
  $("#cmb_barang_kembali").append('<option value=""> -- Pilih Barang --</option>');
  for(i in respon){
    var newOption = new Option(respon[i].barang+' ( '+respon[i].jml_edit+' '+respon[i].nm_satuan+' )', respon[i].id_barang, false, false);
    newOption.setAttribute("jumlah",respon[i].jml_edit);
    newOption.setAttribute("satuan",respon[i].nm_satuan);
    newOption.setAttribute("barang",respon[i].barang);
    $("#cmb_barang_kembali").append(newOption);
  }
}