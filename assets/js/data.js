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
   
   $('#btnsearch').bind('click',function()
   {
      $('#frmcari')[0].reset(); // reset form on modals
      $('.selectpicker').selectpicker('refresh');
      $('#myModal').modal('show'); // show bootstrap modal
           
   });



});



function setsearch()
{
    alert(1);
      $('#frmcari')[0].reset(); // reset form on modals
    
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
