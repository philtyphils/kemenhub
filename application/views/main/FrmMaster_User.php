<link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>assets/css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/utility.js"></script> 
<script type="text/javascript">
            arrRole = eval(<?php echo json_encode($this->session->userdata("validRole"));?>);
</script>
<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/master/frmMasterUser.js?v=<?php echo uniqid(); ?>"></script> 
<div class="container" id="c_content" style="padding:0; background: transparent!important; border: none!important;" >
	<div class="panel panel-info" style=" margin-bottom: 0!important;">
        <div class="panel-heading"><h4><i class="fa fa-paperclip"></i>&nbsp;DATA USER</h4></div>
        <div class="panel-body" style="height: auto; min-height: 500px;">
            <div class="row">

                <div class="col-md-12">
                    <button type="button" id="btnTambah" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Baru</button> 
                    &nbsp; <br /><br />
                    
                         <table class="table-striped table-bordered table-responsive compact" cellspacing="0" id="tblUser" style="font-size: 14px; width: 100%">
                            <thead>
                                <tr>
                                    <th class="caps" width="5%">NO</th>
                                    <th class="caps" width="20%">USERID</th>
                                    <th class="caps" width="25%">NAMA</th>
                                    <th class="caps" width="5%">LEVEL</th>
                                    <th class="caps" width="25%">STATYS</th>
                                    <th class="caps" width="20%">ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="isiData">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="caps" width="5%">NO</th>
                                    <th class="caps" width="20%">USERID</th>
                                    <th class="caps" width="25%">NAMA</th>
                                    <th class="caps" width="5%">LEVEL</th>
                                    <th class="caps" width="25%">STATYS</th>
                                    <th class="caps" width="20%">ACTION</th>
                                </tr>
                            </tfoot>
                        </table>
                    
                    <br />
                </div>
            </div>
        </div>
   	</div>
</div>


<div class="modal fade bs-example-modal-md" id="modalUser" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="fa fa-info-circle"></i>&nbsp;TAMBAH USER
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="frmUser">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="iduser" >USERID</label>
                        <div class="col-md-7">
                            <input type="text" id="iduser" name="iduser" class="validate[required] form-control"  data-errormessage-value-missing ="User id tidak boleh kosong" placeholder="USERID..." />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="nmuser" >NAMA</label>
                        <div class="col-md-7">
                            <input type="text" id="nmuser" name="nmuser" class="validate[required] form-control"  data-errormessage-value-missing ="Nama tidak boleh kosong" placeholder="Nama ..." value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="txtemail" >EMAIL</label>
                        <div class="col-md-7">
                            <input type="email" id="txtemail" name="txtemail" class="validate[required] form-control" data-errormessage-value-missing ="Email tidak boleh kosong" placeholder="Email ..." value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="level" >LEVEL</label>
                        <div class="col-md-7">
                            <input type="number" id="level" name="level" class="validate[required] form-control" min="1" max="9" value="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="lock" >STATUS</label>
                        <div class="col-md-7">
                            <select id="lock" name="lock" class="validate[required] selectpicker form-control">
                                    <option value="0">Aktif</option>
                                    <option value="1">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="divpass">
                        <label class="col-md-3 control-label" for="password" >PASSWORD</label>
                        <div class="col-md-7">
                            <input type="text" id="password" name="password" class="validate[required] form-control" ata-errormessage-value-missing ="Password tidak boleh kosong" placeholder="Password ..." value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                             <button type="submit" id="btnEdit" class="btn btn-primary">SIMPAN</button>

                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

