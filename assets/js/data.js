var siteurl = $("#txtsite").val();
var baseurl = $("#txtbase").val();
var table;
var table2;


  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }


$(document).ready(function(){


    $('#datatables').DataTable({
        "scrollX": true
    });

    var dataTablex = $('#datatables').dataTable();
    $("#searchbox").keyup(function() {
        dataTablex.fnFilter(this.value);
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


 
   $('#provinsi').change(function(option, checked){

        var param = {'provinsi':$('[name="provinsi"]').val()};
        $.ajax({
            url : siteurl+'/Data/get_Kota/',
            type: "POST",
            data: param,
            dataType: "JSON",
            success: function(data)
            {
                $('#kota').html(data);
                $('#kota').selectpicker('refresh');

                setkelas($('[name="provinsi"]').val());
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data'); 
            }
        });
    });
   
   $('#btnsearch').bind('click',function()
   {
      //$('#frmcari')[0].reset(); // reset form on modals
      $('.selectpicker').selectpicker('refresh');
      $('#myModal').modal('show'); // show bootstrap modal
           
   });

    /* klik button export */
    $(".export-excel").click(function(e){
        var redirect = baseurl + "Export";
        var param   = {
            nm_perusahaan   : $("#Filt01").val(),
            provinsi        : $("#Filt02").val(),
            lokasi          : $("#Filt03").val(),
            wilayah_kerja   : $("#Filt04").val(),
            kategori        : $("#Filt05").val(),
            bidangusaha     : $("#Filt06").val(),
            dermagaType     : $("#Filt07").val(),
            kedalaman       : $("#Filt08").val(),
            kapasitas       : $("#Filt09").val(),
            ter_tuk         : $("#Filt10").val(),
            status          : $("#Filt11").val(),
            ms_berlaku      : $("#Filt12").val()
        };
        $.redirectPost(redirect, param);
     });
     /* klik button export CSV */
     $(".export-csv").click(function(e){
        var redirect = baseurl + "Export/csv";
        var param   = {
            nm_perusahaan   : $("#Filt01").val(),
            provinsi        : $("#Filt02").val(),
            lokasi          : $("#Filt03").val(),
            wilayah_kerja   : $("#Filt04").val(),
            kategori        : $("#Filt05").val(),
            bidangusaha     : $("#Filt06").val(),
            dermagaType     : $("#Filt07").val(),
            kedalaman       : $("#Filt08").val(),
            kapasitas       : $("#Filt09").val(),
            ter_tuk         : $("#Filt10").val(),
            status          : $("#Filt11").val(),
            ms_berlaku      : $("#Filt12").val()
        };
        $.redirectPost(redirect, param);
     });

});

/* Extender for posting Export Excel */
$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            //value = value.split('"').join('\"')
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="' + location + '" method="POST" target="_BLANK">' + form + '</form>').appendTo($(document.body)).submit();
    }
});



function setsearch()
{
      ///$('#frmcari')[0].reset(); // reset form on modals
    
      $('#myModal').modal('show'); // show bootstrap modal
         
    
};


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
