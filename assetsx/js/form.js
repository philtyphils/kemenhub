var siteurl = $("#txtsite").val();
var baseurl = $("#txtbase").val();

$(document).ready(function(){

	$('#multifield').multifield({
        section: '.group',
        btnAdd:'#btnAdd',
        btnRemove:'.btnRemove',
    });

    $('.datepicker').datepicker();

});