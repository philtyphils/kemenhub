
<style>
    @media screen and (min-width: 768px) {
    .modal-dialog {

      width: 700px; /* New width for default modal */
    }
    .modal-sm {

      width: 350px; /* New width for small modal */
    }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {

          width: 95%; /* New width for large modal */
        } 
    }
    .celln
    {
        text-align:right;
    }
    .caps
    {
        text-align:center;
        background-color:#069;
        color:#FFF;
        border:1px solid #fff;     
    }
    
</style>

<script type="text/javascript">
$(document).ready(function() {
    var siteurl = $("#txtsite").val();
    var baseurl = $("#txtbase").val();
    var arrRole = new Array();  
    var postvar = {USER_ID:$("#txt1").val()};
    $.post(siteurl+"/Home/getDataRole",postvar,function(data){
        arrRole = eval(data);
        if(arrRole.length > 0){
            for(var j=0;j<arrRole.length;j++){
                if(arrRole[j]["read"]!="true"){
                    $("#"+arrRole[j]["id_menu"]).attr("href","#");
                    $("#"+arrRole[j]["id_menu"]).attr("style","background-color:#CCC;color:#999;");
                    $("#"+arrRole[j]["id_menu"]).hide();
                }
            }
        }
    });
    var tbludin;
    $.backstretch([                    
                  baseurl+"assets/img/backgrounds/1.jpg"
                 ], {duration: 3000, fade: 750});
    $("#ss1").hover(function(){
    	$("#txtpwdlama").attr('type','text');
    	$('#ss1.glyphicon-eye-close').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
    }).mouseout(function(){
    	$("#txtpwdlama").attr('type','password');
    	$('#ss1.glyphicon-eye-open').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
    });
    	
    $("#ss2.glyphicon-eye-close").hover(function(){
    	$("#txtpwdbaru1").attr('type','text');
    	$('#ss2.glyphicon-eye-close').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
    }).mouseout(function(){
    	$("#txtpwdbaru1").attr('type','password');
    	$('#ss2.glyphicon-eye-open').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
    });
    	
    $("#ss3.glyphicon-eye-close").hover(function(){
    	$("#txtpwdbaru2").attr('type','text');
    	$('#ss3.glyphicon-eye-close').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
    }).mouseout(function(){
    	$("#txtpwdbaru2").attr('type','password');
    	$('#ss3.glyphicon-eye-open').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
    });

    $("#change").validationEngine();
    $("#change").submit(function(event){
        if($(this).validationEngine('validate')){	
      			$.ajax({
      				  url: "<?php echo $siteurl;?>"+"/Login/ubah",  
      				  type: "POST",
      				  data:{
      				      username: $('#txtusername').val(),
                          passlama: $('#txtpwdlama').val(),
                          passbaru1: $('#txtpwdbaru1').val(),
                          passbaru2: $('#txtpwdbaru2').val(),
                          pry:$("#selProyek").val(),  

        				},
        				success: function(data) {
                            var arrData = new Array();
                            arrData = eval(data);
                            if(arrData.length > 0){
                                if(arrData[0]["status"]=='Not Found'){
                                    alert("Password Lama salah!");
                                }else if(arrData[0]["status"]=='GAGAL'){
                                    alert("Password gagal diubah");   
                                }else if(arrData[0]["status"]=='OK'){
                                    alert("Password berhasil diubah");
                                    $('#modal_change').modal('hide')
                                    $('#modal_change').on('hidden.bs.modal', function () {
                                        $(this).find("input").val('').end();
                                        $('#txtusername').val('<?php echo $this->session->userdata("validUser"); ?>');
                                    });
                                }
                            }
      				  }
      			});
    		}
        event.preventDefault();	
    });
    


});
</script>
<input type="hidden" id="txt1" value=<?php echo $validUser;?> />
<input type="hidden" id="txt2" value=<?php echo $validSession;?> />
<input type="hidden" id="txt3" value=<?php echo $validLevel;?> />
<input type="hidden" id="tglsistem" size="10" readonly value=<?php echo date('d-M-Y'); ?> />
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $siteurl;?>/home"><i class="fa fa-home"></i>&nbsp;KEMENHUB SYSTEM</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
            
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="1"><i class="fa fa-server" ></i>&nbsp; Data Master <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $siteurl;?>/MasterPerusahaan" id="2">Perusahaan</a></li>
                            <li><a href="<?php echo $siteurl;?>/MasterKategori" id="3">Kategori</a></li>
                            <li><a href="<?php echo $siteurl;?>/MasterKsop" id="4">SKOP</a></li>
                            <li><a href="<?php echo $siteurl;?>/MasterProvinsi" id="5">Provinsi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="6" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; System <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $siteurl;?>/Master_User" id="7">Data User</a></li>
                            <li><a href="<?php echo $siteurl;?>/MenuUser" id="8">Menu User</a></li>
                            <li><a href="<?php echo $siteurl;?>/RoleUser" id="9">Role User</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="10" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Laporan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $siteurl;?>/LaporanPerusahaan" id="11">Laporan Perusahaan</a></li>
                            <li><a href="<?php echo $siteurl;?>/LaporanKategori" id="12">Laporan Kategori</a></li>
                            <li><a href="<?php echo $siteurl;?>/LaporanSkop" id="13">Laporan Harian</a></li>
                            <li><a href="<?php echo $siteurl;?>/LaporanProvinsi" id="14">Laporan Provinsi</a></li>
                        
                        </ul>
                    </li>
                </ul>
              <!--tambahan navbar right-->
                <ul class="nav navbar-nav navbar-right">    
                    <li>
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" >
                            <?php echo $validNama; ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li class="dropdown-item" ><a href="#modal_change" data-toggle="modal">Change Password</a></li>
                            <li class="dropdown-item" ><a href="<?php echo $siteurl;?>/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul><!--end of nav right -->
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</div>


 <div class="modal fade bs-example-modal-md" id="modal_change" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="" id="change" class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Ubah Password</h3>
                </div>
                <div class="modal-body ">
                  
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">USERNAME</label>
                            <div class="col-md-9">
                                <input type="text" id="txtusername"  class="validate[required] form-control" disabled value="<?php echo  $this->session->userdata("validUser");?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">PASSWORD LAMA</label>
                            <div class="col-md-9"> 
                              	<div class="input-group">
                                    <input type="password" name="txtpwdlama" id="txtpwdlama" class="validate[required,custom[onlyLetterNumberUs]] form-control"  data-errormessage-value-missing ="Password lama tidak boleh kosong" placeholder="Password Lama..."/>
                                    <span id="s1" class="input-group-addon">
                                      <i id="ss1" class="glyphicon glyphicon-eye-close"></i>
                                    </span> 
                                </div>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">PASSWORD BARU</label>
                            <div class="col-md-9">
                              	<div class="input-group">
                                    <input type="password" name="txtpwdbaru1"  id="txtpwdbaru1" class="validate[required] form-control" data-errormessage-value-missing ="Password baru tidak boleh kosong" placeholder="Password Baru..." /> 
                                    <span id="s2" class="input-group-addon">
                                      <i id="ss2" class="glyphicon glyphicon-eye-close"></i>
                                    </span> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">RE-PASSWORD BARU</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="password" name="txtpwdbaru2" id="txtpwdbaru2"  class="validate[required,equals[txtpwdbaru1]] form-control" data-errormessage-value-missing ="RE-Password baru tidak boleh kosong" data-errormessage-pattern-mismatch ="Data Tidak sama dengan Password Baru"  placeholder="Re-Password Baru..."/>
                                    <span id="s3" class="input-group-addon">
                                      <i id="ss3" class="glyphicon glyphicon-eye-close"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
        		    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="width:100%; height:50px; font-size:24px;" >Ubah Password</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
