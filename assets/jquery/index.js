// JavaScript Document
$(document).ready(function() {
$('#frmlogin').validationEngine('attach');  
$("#frmlogin").submit(function(event){	
     
if($(this).validationEngine('validate')){
	$.ajax({
	url: $("#base").val()+"clogin/aksi_login",  
	type: "POST",
	data: 
	{
    username: $('#user').val(),
    password: $('#pwd').val()},
	success: function(data) 
	{
    	if(data=='1'){
			alert("Username atau Password salah!");
		}else if(data=='2'){
			alert("Mohon maaf anda tidak di izinkan login");
			}
		else {
			window.location.href = $("#base").val()+'cpilihpry/';
		}
	}
    });
}
	 event.preventDefault();
});
	$('#user').focus();
	
});
