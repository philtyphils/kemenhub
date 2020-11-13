var siteurl = $("#txtsite").val();
var baseurl = $("#txtbase").val();
var table;

$(document).ready(function(){

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


    // var dataTable = $('#datatables').dataTable();
    $("#searchbox").keyup(function() {
        table.fnFilter(this.value);
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
    $.post(siteurl+"/Data/getData",postvar,function(data){
      var arrData = new Array();
        arrData = eval(data);

        alert(arrData[0]["html"]);
        $("#isiData").html(arrData[0]["html"]);
        $('#myModal').hide();
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
