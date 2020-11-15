var siteurl = $("#txtsite").val();
var baseurl = $("#txtbase").val();
var table;
var tablex;

$(document).ready(function(){

// table = $('#datatables').DataTable({
//           "scrollX": true,
//           "iDisplayLength": 10,
//           "responsive":false,
//           "bLengthChange": false,
//           "pagingType": "full_numbers",
//           "lengthMenu": [
//               [10, 25, 50, -1],
//               [10, 25, 50, "All"]
//           ],
//           "destroy":true,
//           "order": [],
//           "columnDefs": [
//           { 
//               "targets": [ -1 ], //last column
//               "orderable": false, //set not orderable
//           },
//           ]
//         });


    table = $('#datatables').DataTable({
        "responsive": false,
        "scrollX": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": siteurl+'/Data/ajax_list',
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ]
    });


    var dataTablex = $('#datatables').DataTable();
    $("#searchbox").keyup(function() {
        dataTablex.fnFilter(this.value);
    }); 


     $('#provinsi').change(function(option, checked){

          var param = {'provinsi':$('[name="provinsi[]"]').val()};
          $.ajax({
              url : siteurl+'/Data/get_Kota/',
              type: "POST",
              data: param,
              dataType: "JSON",
              success: function(data)
              {
                  $('#kota').html(data);
                  $('#kota').selectpicker('refresh');

                  setkelas($('[name="provinsi[]"]').val());
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error get data'); 
              }
          });
      });

     


    $('.datepicker').datepicker({
      format: "mm-yyyy",
      startView: "months",  
      minViewMode: "months"
    });


    $('#delete-modal').on('show.bs.modal',function() { 
        $('.btn-del').click('.remove',function(e) {
          $tr = $(this).closest('tr');
          table.row($tr).remove().draw();
          e.preventDefault();
        });
    });


    $('#btnCari').bind('click',function(){


      var barisTrans = 0;
      $("#isiData").html('');
      isiantbl="";


      $.ajaxSetup({async:false});
        var postvar = { name:$('#name').val(),
                        provinsi:$('#provinsi').val(),
                        kota:$('#kota').val(),
                        kelas:$('#kelas').val(),
                        kategori:$('#kategori').val(),
                        bidangusaha:$('#bidangusaha').val(),
                        dermaga:$('#dermaga').val(),
                        meter:$('#meter').val(),
                        kapasitas:$('#kapasitas').val(),
                        tuk_ter:$('#tuk_ter').val(),
                        status:$('#status').val(),
                        tgl_akhir:$('#tgl_akhir').val()};
        $.post(siteurl+"/Data/getData",postvar,function(dataxx){

          var arrData = new Array();
            arrData = eval(dataxx);


            if(arrData.length > 0){
        
              for(var j=0;j<arrData.length;j++){
                barisTrans++;
                
                isiantbl+="<tr role='row'>";
                isiantbl+="<td>"+barisTrans+"</font></td>";
                isiantbl+="<td>"+arrData[j]["nm_perusahaan"]+"</td>";
                isiantbl+="<td>"+arrData[j]["alamat"]+"</td>";
                isiantbl+="<td>"+arrData[j]["ksop_id"]+"</td>";
                isiantbl+="<td>"+arrData[j]["provinsi_id"]+"</td>";
                isiantbl+="<td>"+arrData[j]["bdgusaha_id"]+"</td>";
                isiantbl+="<td>"+arrData[j]["lokasi"]+"</td>";
                isiantbl+="<td>"+arrData[j]["kategori_id"]+"</td>";
                isiantbl+="<td>"+arrData[j]["koordinat"]+"</td>";
                isiantbl+="<td>"+arrData[j]["ter_tuk"]+"</td>";
                isiantbl+="<td>"+arrData[j]["sk"]+"</td>";
                isiantbl+="<td>"+arrData[j]["tgl_terbit"]+"</td>";
                isiantbl+="<td>"+arrData[j]["status"]+"</td>";
                isiantbl+="<td>"+arrData[j]["ms_berlaku"]+"</td>";
                isiantbl+="<td><a class='btn btn-simple btn-warning btn-icon btnedit' title='Ubah' onclick='edit_Datax("+arrData[j]['id']+")'><i class='fa fa-edit'></i></a><a class='btn btn-simple btn-danger btn-icon btndelete' title='Hapus' onclick='delete_Datax("+arrData[j]['id']+")'><i class='fa fa-times'></i></a></td></tr>";
                
              }

              $("#isiData").html(isiantbl);
                $('#myModal').hide();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }else{
              $("#isiData").html('');
            }

           

            // $("#isiData").html(arrData[0]["html"]);
            // $('#myModal').hide();
            // $('#data_perusahaanx').hide();
            // $('#data_perusahaan').show();
            // $('body').removeClass('modal-open');
            // $('.modal-backdrop').remove();
        });




      $.ajaxSetup({async:true});
    });





});

    










function setkelas(id){

      var param = {'kota':id};
      $.ajax({
          url : siteurl+'/Data/get_Kelas/',
          type: "POST",
          data: param,
          dataType: "JSON",
          success: function(data)
          {
              $('#kelas').html(data);
              $('#kelas').selectpicker('refresh');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data'); 
          }
      });

}
