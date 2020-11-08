var siteurl = $("#txtsite").val();
var baseurl = $("#txtbase").val();
var table;


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
function delete_User(id){
	var aaa = confirm("Apakah anda yakin ingin menghapus data "+id+"?");
	if(aaa){
		
		var postvars = {iduser:id};
		$.post(siteurl+"/Master_User/ajax_delete",postvars,function(data){
			if(data=="OK"){
				alert("Data User berhasil dihapus!");
				reload_table();
			}else{
				alert(data);	
			}
		});
		
	}
}

function edit_User(id,nama,email,level,status){
	// alert(status);
	$('#divpass').hide();
	$('#iduser').attr('disabled','disabled');
	$('#iduser').val(id);
	$('#nmuser').val(nama);
	$('#txtemail').val(email);
	$('#level').val(level);
	$('#lock').val(status);
	$('[name="lock"]').selectpicker('refresh');
	var modalx=$("#modalUser");
	modalx.modal('show');
	$("#btnEdit").removeAttr("value");
	$("#btnEdit").attr("value",'Edit');
	$("#btnEdit").html("<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Edit");
	$("#nmuser").focus();
}



$(document).ready(function(){
	$('.modal').on("hidden.bs.modal", function (e) {
	    if($('.modal:visible').length)
	    {
	        $('.modal-backdrop').first().css('z-index', parseInt($('.modal:visible').last().css('z-index')) - 10);
	        $('body').addClass('modal-open');
	    }
	}).on("show.bs.modal", function (e) {
	    if($('.modal:visible').length)
	    {
	        $('.modal-backdrop.in').first().css('z-index', parseInt($('.modal:visible').last().css('z-index')) + 10);
	        $(this).css('z-index', parseInt($('.modal-backdrop.in').first().css('z-index')) + 10);
	    }
	});
	arrRoleX = $.grep(arrRole, function(v,i) {
		return v["id_menu"] == '7';
	});
	if(arrRoleX[0]["add"]=="false"){
		$("#btnTambah").attr("disabled","disabled");
	}

	$('#frmUser').validationEngine('attach');
		

	table = $('#tblUser').DataTable({ 
                "responsive": true,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": siteurl+'/Master_User/ajax_list/',
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [ 0,-1 ], //last column
                    "orderable": false, //set not orderable
                },
                ],
		  "createdRow": function( row, data ) {
		        if ( arrRoleX[0]["add"]=="false" ) {
			  	$("td", row).eq(3).find(".btn-role").attr("disabled","disabled");
		   	 }
		  }
            });

	$('#frmUser').bind("submit",function(){
		if($('#frmUser').validationEngine('validate')){
			var ok = confirm("Simpan data?");
			if(ok){
	
				if($("#btnEdit").val()=="Simpan"){
					var postvars = {iduser:$('#iduser').val(),
									nmuser:$('#nmuser').val(),
									email:$('#txtemail').val(),
									level:$('#level').val(),
									lock:$('#lock').val(),
									password:$('#password').val()};
					$.post(siteurl+"/Master_User/ajax_add",postvars,function(data){
				
						if(data=="OK"){
							alert("Data berhasil disimpan");
							$("#btnEdit").removeAttr('value');
							$("#btnEdit").attr('value','Edit');
							$("#btnEdit").text('Edit');
							var modalx=$("#modalUser");
							modalx.modal('hide');
							reload_table();
						}else{
							alert(data);
							reload_table();
						}
					});
					
					
				}else{
					
					var postvars = {iduser:$('#iduser').val(),
									nmuser:$('#nmuser').val(),
									email:$('#txtemail').val(),
									level:$('#level').val(),
									lock:$('#lock').val(),
									password:$('#password').val()};
					$.post(siteurl+"/Master_User/ajax_update",postvars,function(data){
						if(data=="OK"){
							alert("Data berhasil diedit");
							$("#btnEdit").removeAttr('value');
							$("#btnEdit").attr('value','Edit');
							$("#btnEdit").text('Edit');
							var modalx=$("#modalUser");
							modalx.modal('hide');
							reload_table();
						}else{
							alert(data);
							reload_table();

						}
					});
				}

			}
			
			
		}
		return false;
	});
	$('#btnTambah').bind('click',function(){
	    $('#divpass').show();
	    $('[name="password"]').prop("disabled", false);
	    $('#frmUser')[0].reset(); // reset form on modals
		// $('#txtkodeMinat').val('');
		// $('#txtnamaMinat').val('');
		// $("#txturut").val('');
		// $('#txtkodeMinat').removeAttr('disabled');
		// $('#txtnamaMinat').removeAttr('disabled');

		$("#btnHapus").attr("disabled","disabled");
		$("#btnEdit").removeAttr("value");
		$("#btnEdit").attr("value",'Simpan');
		$("#btnEdit").html("<i class=\"fa fa-save\" aria-hidden=\"true\"></i> Simpan");
		$("#iduser").focus();
		var  modalx = $('#modalUser');
		modalx.modal('show');
	
	});
	
});