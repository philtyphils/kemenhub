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
        ],
    });

    // table = $('#datatables').DataTable({

    //     "pagingType": "full_numbers",
    //     "lengthMenu": [
    //         [10, 25, 50, -1],
    //         [10, 25, 50, "All"]
    //     ],
    //     "ajax": {
    //         "url": siteurl+'/Data/ajax_list',
    //         "type": "POST"
    //     },
       
    //     // responsive: true,
    //     language: {
    //         search: "_INPUT_",
    //         searchPlaceholder: "Search records",
    //     },
    //     "columnDefs": [
    //     { 
    //         "targets": [ -1 ], //last column
    //         "orderable": false, //set not orderable
    //     },
    //     ],
    //     "scrollX": true
    // });

   
        // var dataTable = $('#datatables').dataTable();
        // $("#searchbox").keyup(function() {
        //     dataTable.fnFilter(this.value);
        // });    
    
        // var table = $('#datatables').DataTable();

        // // Edit record
        // table.on('click', '.edit', function() {
        //     $tr = $(this).closest('tr');

        //     var data = table.row($tr).data();
        //     alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        // });

        // // Delete a record
        // table.on('click', '.remove', function(e) {
        //     $tr = $(this).closest('tr');
        //     table.row($tr).remove().draw();
        //     e.preventDefault();
        // });

        // //Like record
        // table.on('click', '.like', function() {
        //     alert('You clicked on Like button');
        // });

        // $('.card .material-datatables label').addClass('form-group');

       // $('#provinsi').change(function(option, checked){

       //      var param = {'provinsi':$('[name="provinsi"]').val()};
       //      $.ajax({
       //          url : siteurl+'/Data/get_selKelas/',
       //          type: "POST",
       //          data: param,
       //          dataType: "JSON",
       //          success: function(data)
       //          {
       //              $('#kelas').html(data);
       //              $('#kelas').selectpicker('refresh');
       //          },
       //          error: function (jqXHR, textStatus, errorThrown)
       //          {
       //              alert('Error get data'); 
       //          }
       //      });
       //  });

        $('#provinsi').multiselect({
            onChange:function(option, checked){
               $('#kelas').html('');
               $('#kelas').multiselect('rebuild');
               var selected = this.$select.val();
               if(selected.length > 0)
               {
                    $.ajax({
                         url:siteurl+'/Data/get_selKelas/',
                         method:"POST",
                         data:{selected:selected},
                         success:function(data)
                         {
                              $('#kelas').html(data);
                              $('#kelas').multiselect('rebuild');
                         }
                    })
                }
            }
        });
    
});
