
                                        <div class="row group">
                                            <div class="wrap-3">
                                                <h4 class="headingtitle">FORM LOKASI</h4> 
                                            </div> 
                                           
                                            <div class="wrap-2">
                                                <div class="form-group col-md-5">
                                                    <label for="lokasi">Lokasi</label>
                                                    <textarea name="lokasi_f[]" id="lokasi_f"  rows="19" class="form-control"></textarea> 
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <div class="form-group">
                                                        <label for="provinsi">Provinsi</label>
                                                        <select name="provinsi_f[]" class="form-control" id="provinsi_f<?php echo $id;?>" >
                                                           <option value="">Pilih Provinsi</option>
                                                            <?php for($i=0;$i<count($dataProvinsi);$i++){?>
                                                                <option value="<?php echo trim($dataProvinsi[$i]->kode);?>|<?php echo trim($dataProvinsi[$i]->nama);?>"><?php echo $dataProvinsi[$i]->nama; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6" style="margin-bottom: 1rem;">
                                                            <label for="kota">Kabupaten / Kota</label>
                                                            <select name="kota_f[]" class="form-control" id="kota_f"  >
                                                                <option value="">Pilih Kabupaten / Kota</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6" style="margin-bottom: 1rem;">
                                                            <label for="kecamatan">Kecamatan</label>
                                                            <select name="kecamatan_f[]" class="form-control" id="kecamatan_f<?php echo $id;?>" >
                                                                <option value="">Pilih Kecamatan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="kelurahan">Kelurahan / Desa</label>
                                                            <input type="text" name="kelurahan_f[]" id="kelurahan_f" class="form-control" placeholder="Kelurahan / Desa">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row" id="latitude">
                                                        <div class="form-group col-md-3" >
                                                            <label for="dms">Degrees</label>
                                                            <div class="input-group">
                                                                <input type="number" name="d_lat[]" id="d_lat" class="form-control" placeholder="Degrees" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">°</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Minutes</label>
                                                            <div class="input-group">  
                                                                <input type="number" name="m_lat[]" id="m_lat" class="form-control" placeholder="Minutes" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">'</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Seconds</label>
                                                            <div class="input-group">    
                                                                <input type="number" name="s_lat[]" id="s_lat" class="form-control" placeholder="Seconds" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">"</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="direction">Direction</label>
                                                            <select name="direction_lat[]" id="direction_lat" class="form-control" >
                                                                <option value="">Pilih</option>
                                                                <option value="LU">LU</option>
                                                                <option value="LS">LS</option>
                                                            </select>
                                                        </div>
                                                    </div>
    
                                                    <div class="row" id="longitude">
                                                        <div class="form-group col-md-3" >
                                                            <label for="dms">Degrees</label>
                                                            <div class="input-group">
                                                                <input type="number" name="d_long[]" id="d_long" class="form-control"  placeholder="Degrees" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">°</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Minutes</label>
                                                            <div class="input-group">
                                                                <input type="number" name="m_long[]" id="m_long" class="form-control"  placeholder="Minutes" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">'</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Seconds</label>
                                                            <div class="input-group">
                                                                <input type="number" name="s_long[]" id="s_long" class="form-control"  placeholder="Seconds" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">"</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="direction">Direction</label>
                                                            <select name="direction_long[]" id="direction_long" class="form-control"  disabled>
                                                                <option value="BT">BT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div id="dermagamulti" class="wrap-2">
                                                        <div class="col-md-12">
                                                            <button type="button" id="btnTambah" onclick="addFields()" class="btn btn-fill btn-primary" style="margin: 10px 0 20px 0;">
                                                            Tambah Dermaga
                                                            </button>    
                                                        </div>  
                                                        <div id="groupdermaga">
                                                            <div class="form-group col-md-12" id="dermaga type">  
                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="dermaga">Dermaga Tipe</label>
                                                                    <input type="text" name="dermaga[]" id="dermaga" class="form-control"  placeholder="Dermaga Type">
                                                                </div>

                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="spesifikasi">Spesifikasi</label>
                                                                    <input type="text" name="spesifikasi[]" id="spesifikasi" class="form-control"  placeholder="Spesifikasi">
                                                                </div>

                                                                <div class="col-md-6" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="peruntukan">Peruntukan</label>
                                                                    <input type="text" name="peruntukan[]" id="peruntukan" class="form-control"  placeholder="Peruntukan">
                                                                </div>

                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="kedalaman">Kedalaman</label>
                                                                    <div class="input-group">
                                                                        <input type="number" name="meter[]" id="meter" class="form-control"  placeholder="Meter" aria-describedby="basic-addon1">
                                                                        <span class="input-group-addon" id="basic-addon1">M LWS</span>
                                                                    </div>                  
                                                                </div>
                                                                
                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="kapasitas">Kapasitas</label>
                                                                    <input type="number" name="kapasitas[]" id="kapasitas" class="form-control"  placeholder="Kapasitas">
                                                                </div>

                                                                <div class="col-md-3"style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="satuan">Satuan</label>
                                                                    <select name="satuan[]" class="form-control" id="satuan" >
                                                                        <option value="">Pilih Satuan</option>
                                                                        <option>FEET</option>
                                                                        <option>GT</option>
                                                                        <option>DWT</option>
                                                                    </select>    
                                                                </div>

                                                                <!-- <button type="button" class="btn btn-fill btn-danger btnHapus" style="margin-top: 3.3rem;margin-left: 10px;">Hapus</button>   -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                 
                                                    <div class="wrap-2">
                                                        <div class="form-group col-md-6">
                                                            <label for="name">Legalitas</label>
                                                            <input type="text" name="nosk[]" id="nosk" class="form-control"  placeholder="Input No SK">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="jenissk">Jenis SK / Legalitas</label>
                                                            <select name="jenissk[]" class="form-control" id="jenissk" >
                                                                <option value="">Pilih Jenis SK / Legalitas</option>
                                                                <option value="Pembangunan">Pembangunan</option>
                                                                <option value="Pengembangan">Pengembangan</option>
                                                                <option value="Pengoperasian">Pengoperasian</option>
                                                                <option value="Perpajangan/Pembangunan/Pengembangan">Perpajangan / Pembangunan / Pengembangan</option>
                                                                <option value="PerpanjanganPengoperasian">Perpanjangan Pengoperasian</option>
                                                                <option value="Penyesuaian">Penyesuaian</option>
                                                                <option value="Pendaftaran">Pendaftaran</option>
                                                            </select>
                                                        </div>
        
                                                        <div class="form-group col-md-6">
                                                            <label for="bidang usaha">BIDANG USAHA</label>
                                                            <select class="selectpicker form-control" data-live-search="true" title="Bidang Usaha" name="bidangusaha[]" id="bidangusaha">
                                                                    <option value="" disabled>Pilih Bidang Usaha</option>
                                                                    <?php for($k=0;$k<count($dataBdgUsaha);$k++){?>
                                                                        <option value="<?php echo trim($dataBdgUsaha[$k]->bdg_usaha_id); ?>"><?php echo $dataBdgUsaha[$k]->nama; ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
        
                                                        <div class="form-group col-md-6">
                                                            <label for="kelas">Wilayah Kerja</label>
                                                            <select name="kelas[]" class="form-control" id="kelas" >
                                                                <option value="">Pilih Wilayah Kerja</option>
                                                            </select>
                                                        </div>
    
                                                        <div class="form-group col-md-3" >
                                                            <label for="tersus_tuks">TERSUS / TUKS</label>
                                                            <select name="tersus_tuks[]" class="form-control" id="tersus_tuks" >
                                                                <option value="">Pilih</option>
                                                                <option value="TERSUS">TERSUS</option>
                                                                <option value="TUKS">TUKS</option>
                                                            </select>  
                                                        </div>
        
                                                        <div class="form-group col-md-3" >
                                                            <label for="status">STATUS OPERASIONAL</label>
                                                            <select name="status[]" class="form-control" id="status" >
                                                                <option value="">Pilih Status</option>
                                                                <option value="Y">AKTIF</option>
                                                                <option value="N">NON AKTIF</option>
                                                            </select>  
                                                        </div>
        
                                                        <div class="col-md-3">
                                                            <label for="terbit">Tgl Terbit</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                                <input placeholder="Tanggal Terbit" type="text" class="form-control datepicker" id="tgl_terbit" name="tgl_terbit[]" autocomplete="off">
                                                            </div>
                                                        </div>
            
                                                        <div class="col-md-3">
                                                            <label for="akhir">Masa Berlaku</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                                <input placeholder="Masa Berlaku" type="text" class="form-control datepicker" id="tgl_akhir" name="tgl_akhir[]" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" id="count" value="1"/>
                                            <div class="wrap-3" style="padding-left: 0;">
                                                <button type="button" id="btnAdd" class="btn btn-fill btn-primary" style="margin-right: 1rem;">
                                                <i class="fa fa-plus" style="margin-right: 5px;"></i>
                                                Tambah Lokasi
                                                </button>
                                                <button type="button" class="btn btn-fill btn-danger btnRemove">Hapus</button>
                                            </div>
                                        </div>
<script type="text/javascript">

$('#provinsi_f<?php echo $id;?>').change(function(option, checked){
      
        var str = $('#provinsi_f<?php echo $id;?>').val();
        var provinsi = str.split("|");
        var param = {'provinsi':provinsi[0]};
        $.ajax({
            url : siteurl+'/Data/get_Kecamatan2/',
            type: "POST",
            data: param,
            dataType: "JSON",
            success: function(data)
            {
                $('#kecamatan_f<?php echo $id;?>').html(data);
                $('#kecamatan_f<?php echo $id;?>').selectpicker('refresh');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data'); 
            }
        });
    });
</script>