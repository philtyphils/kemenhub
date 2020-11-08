$(document).ready(function(){
	var siteurl = $("#txtsite").val();
	var baseurl = $("#txtbase").val();

	/*
        Fullscreen background
    */
    $.backstretch([                    
			    	baseurl+"assets/img/backgrounds/1.jpg"
	             ], {duration: 3000, fade: 750});
	 
	
	$("input:text:visible:first").focus();
	$('#frmLogin').validationEngine('attach');
	
	$("#frmLogin").submit(function(){
		if($(this).validationEngine('validate'))
		{
			$("#msg").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
			var postvars = {user:$("#username").val(),pass:$("#password").val()};
			$.post(siteurl+"/login/cekLogin",postvars,function(data){
				var arrHasil = new Array();
				arrHasil = eval(data);
				if(arrHasil[0]['msg']!='')
				{
					$('#msg').html(arrHasil[0]['msg']);
				}
				else
				{
					window.location.replace(siteurl+'/home');
				}
			})
		}
		return false;
	});
});