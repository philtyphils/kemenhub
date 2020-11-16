
            <div class="contents">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="header" style="background-color: #43425D">
                                    <h4 class="title" style="color: #ffff;">Create Data</h4>
                                </div>
                                <div class="card-form">
                                <form action="" method="">
                                    <div id="multifield" class="col" style="margin-bottom: 2rem;">
                                        <div class="row">
                                            <div class="form-group col-md-12" style="padding:0">
                                                <label for="name" class="label-font" style="margin-bottom: 1rem;">Nama Perusahaan</label>
                                                <input type="text" name="name" id="" class="form-control" required placeholder="Nama Perusahaan" >
                                            </div>

                                            <!-- <div class="form-group col-md-12" style="padding:0">
                                                <label for="kategori usaha"  class="label-font" style="margin-bottom: 1rem;">KATEGORI USAHA</label>
                                                <select class="form-control selectpicker" multiple data-live-search="true" title="Kategori Usaha" id="box" name="kategori_usaha[]">
                                                        <option >ENERGI</option>
                                                        <option>PERTAMBANGAN</option>
                                                        <option>INDUSTRI</option>
                                                        <option>ENERGI</option>
                                                        <option>DOK DAN GALANGAN</option>
                                                        <option>PERTANIAN</option>
                                                        <option>KEHUTANAN</option>
                                                        <option>PARIWISATA</option>
                                                        <option>PERIKANAN</option>
                                                </select>                 
                                            </div> -->
                                            <div class="wrap">
                                               
                                                <div class="form-group col-md-6 border-right">
                                                    <label for="alamat">Alamat Kantor</label>
                                                    <textarea name="alamat[]" id="alamat"  rows="11" class="form-control" required></textarea> 
                                                </div>
                                                <div class="form-group col-md-6" >
                                                    <div class="form-group">
                                                        <label for="provinsi">Provinsi</label>
                                                        <select name="provinsi[]" class="form-control" id="provinsi" required >
                                                            <option value="">Pilih Provinsi</option>
                                                            <option value="">aceh</option>
                                                            <option value="">bali</option>
                                                            <option value="">bangka belitung</option>
                                                            <option value="">banten</option>
                                                            <option value="">bengkulu</option>
                                                            <option value="">jawa tengah</option>
                                                            <option value="">kalimantan tengah</option>
                                                            <option value="">sulawesi tengah</option>
                                                            <option value="">jawa timur</option>
                                                            <option value="">kalimantan timur</option>
                                                            <option value="">nusa tenggara timur</option>
                                                            <option value="">gorontalo</option>
                                                            <option value="">jakarta</option>
                                                            <option value="">jambi</option>
                                                            <option value="">lampung</option>
                                                            <option value="">maluku</option>
                                                            <option value="">kalimantan utara</option>
                                                            <option value="">maluku utara</option>
                                                            <option value="">sulawesi utara</option>
                                                            <option value="">sumatra utara</option>
                                                            <option value="">papua</option>
                                                            <option value="">riau</option>
                                                            <option value="">kepulauan riau</option>
                                                            <option value="">kalimantan selatan</option>
                                                            <option value="">sulawesi selatan</option>
                                                            <option value="">sumatra selatan</option>
                                                            <option value="">sulawesi tenggara</option>
                                                            <option value="">yogyakarta</option>
                                                            <option value="">jawa barat</option>
                                                            <option value="">kalimantan barat</option>
                                                            <option value="">nusa tenggara barat</option>
                                                            <option value="">papua barat</option>
                                                            <option value="">sulawesi barat</option>
                                                            <option value="">sumatra barat</option>
                                                        </select>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="kecamatan">Kecamatan</label>
                                                            <select name="kecamatan[]" class="form-control" id="kecamatan" required >
                                                                <option value="">Pilih Kecamatan</option>
                                                                <option value="kecamatan A">Kecamatan A</option>
                                                                <option value="kecamatan B">kecamatan B</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="kecamatan">Kelurahan</label>
                                                            <select name="Kelurahan[]" class="form-control" id="Kelurahan" required >
                                                                <option value="">Pilih Kelurahan</option>
                                                                <option value="kelurahan a">Kelurahan A</option>
                                                                <option value="kelurahan b">Kelurahan B</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="kodepos">KodePos</label>
                                                            <input type="number" name="kodepos" id="kodepos" class="form-control" required placeholder="KodePos">  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="contactperson">Contact Person</label>
                                                            <input type="number" name="contactperson" id="contactperson" class="form-control" required placeholder="Contact Person"> 
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row group">
                                            <div class="wrap-3">
                                                <h4 class="headingtitle">FORM LOKASI</h4> 
                                            </div> 
                                           
                                            <div class="wrap-2">
                                                <div class="form-group col-md-5">
                                                    <label for="lokasi">Lokasi</label>
                                                    <textarea name="lokasi[]" id="lokasi"  rows="19" class="form-control" required></textarea> 
                                                </div>
                                                <div class="form-group col-md-7">
                                                    <div class="form-group">
                                                        <label for="provinsi">Provinsi</label>
                                                        <select name="provinsi[]" class="form-control" id="provinsi" required >
                                                            <option value="">Pilih Provinsi</option>
                                                            <option value="">aceh</option>
                                                            <option value="">bali</option>
                                                            <option value="">bangka belitung</option>
                                                            <option value="">banten</option>
                                                            <option value="">bengkulu</option>
                                                            <option value="">jawa tengah</option>
                                                            <option value="">kalimantan tengah</option>
                                                            <option value="">sulawesi tengah</option>
                                                            <option value="">jawa timur</option>
                                                            <option value="">kalimantan timur</option>
                                                            <option value="">nusa tenggara timur</option>
                                                            <option value="">gorontalo</option>
                                                            <option value="">jakarta</option>
                                                            <option value="">jambi</option>
                                                            <option value="">lampung</option>
                                                            <option value="">maluku</option>
                                                            <option value="">kalimantan utara</option>
                                                            <option value="">maluku utara</option>
                                                            <option value="">sulawesi utara</option>
                                                            <option value="">sumatra utara</option>
                                                            <option value="">papua</option>
                                                            <option value="">riau</option>
                                                            <option value="">kepulauan riau</option>
                                                            <option value="">kalimantan selatan</option>
                                                            <option value="">sulawesi selatan</option>
                                                            <option value="">sumatra selatan</option>
                                                            <option value="">sulawesi tenggara</option>
                                                            <option value="">yogyakarta</option>
                                                            <option value="">jawa barat</option>
                                                            <option value="">kalimantan barat</option>
                                                            <option value="">nusa tenggara barat</option>
                                                            <option value="">papua barat</option>
                                                            <option value="">sulawesi barat</option>
                                                            <option value="">sumatra barat</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6" style="margin-bottom: 1rem;">
                                                            <label for="kota">Kabupaten / Kota</label>
                                                            <select name="kota[]" class="form-control" id="kota" required >
                                                                <option value="">Pilih Kabupaten / Kota</option>
                                                                <option value="">Simeulue</option> 
                                                                <option value="">Aceh Singkil</option>
                                                                <option value="">Aceh Selatan</option> 
                                                                <option value="">Aceh Tenggara</option> 
                                                                <option value="">Aceh Timur</option> 
                                                                <option value="">Aceh Tengah</option>
                                                                <option value="">Aceh Barat</option> 
                                                                <option value="">Aceh Besar</option>
                                                                <option value="">Pidie</option> 
                                                                <option value="">Bireuen</option> 
                                                                <option value="">Aceh Utara</option> 
                                                                <option value="">Aceh Barat Daya</option> 
                                                                <option value="">Gayo Lues</option> 
                                                                <option value="">Aceh Tamiang</option> 
                                                                <option value="">Nagan Raya</option> 
                                                                <option value="">Aceh Jaya</option> 
                                                                <option value="">Bener Meriah</option> 
                                                                <option value="">Pidie Jaya</option> 
                                                                <option value="">Kota Banda Aceh</option> 
                                                                <option value="">Kota Sabang</option> 
                                                                <option value="">Kota Lhokseumawe</option> 
                                                                <option value="">Kota Subulussalam</option> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6" style="margin-bottom: 1rem;">
                                                            <label for="kecamatan">Kecamatan</label>
                                                            <select name="kecamatan[]" class="form-control" id="kecamatan" required >
                                                                <option value="">Pilih Kecamatan</option>
                                                                <option value="kecamatan A">Kecamatan A</option>
                                                                <option value="kecamatan B">kecamatan B</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="kecamatan">Kelurahan / Desa</label>
                                                            <input type="text" name="dermaga" id="dermaga" class="form-control" required placeholder="Kelurahan / Desa">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row" id="latitude">
                                                        <div class="form-group col-md-3" >
                                                            <label for="dms">Degrees</label>
                                                            <div class="input-group">
                                                                <input type="number" name="dms[]" id="dms" class="form-control" required placeholder="Degrees" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">°</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Minutes</label>
                                                            <div class="input-group">  
                                                                <input type="number" name="dms[]" id="dms" class="form-control" required placeholder="Minutes" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">'</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Seconds</label>
                                                            <div class="input-group">    
                                                                <input type="number" name="dms[]" id="dms" class="form-control" required placeholder="Seconds" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">"</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="direction">Direction</label>
                                                            <select name="direction[]" class="form-control" id="direction" required>
                                                                <option value="">Pilih</option>
                                                                <option value="">LU</option>
                                                                <option value="">LS</option>
                                                            </select>
                                                        </div>
                                                    </div>
    
                                                    <div class="row" id="longitude">
                                                        <div class="form-group col-md-3" >
                                                            <label for="dms">Degrees</label>
                                                            <div class="input-group">
                                                                <input type="number" name="dms[]" id="dms" class="form-control" required placeholder="Degrees" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">°</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Minutes</label>
                                                            <div class="input-group">
                                                                <input type="number" name="dms[]" id="dms" class="form-control" required placeholder="Minutes" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">'</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="dms">Seconds</label>
                                                            <div class="input-group">
                                                                <input type="number" name="dms[]" id="dms" class="form-control" required placeholder="Seconds" aria-describedby="basic-addon1">
                                                                <span class="input-group-addon" id="basic-addon1">"</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="direction">Direction</label>
                                                            <select name="direction[]" class="form-control" id="direction" required disabled>
                                                                <option value="">Pilih</option>
                                                                <option value="" selected>BT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div id="dermagamulti" class="wrap-2">
                                                        <div class="col-md-12">
                                                            <button type="button" id="btnTambah" class="btn btn-fill btn-primary" style="margin: 10px 0 20px 0;">
                                                            Tambah Dermaga
                                                            </button>    
                                                        </div>  
                                                        <div class="groupdermaga">
                                                            <div class="form-group col-md-12" id="dermaga type">  
                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="dermaga">Dermaga Tipe</label>
                                                                    <input type="text" name="dermaga" id="dermaga" class="form-control" required placeholder="Dermaga Type">
                                                                </div>

                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="spesifikasi">Spesifikasi</label>
                                                                    <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" required placeholder="Spesifikasi">
                                                                </div>

                                                                <div class="col-md-6" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="peruntukan">Peruntukan</label>
                                                                    <input type="text" name="peruntukan[]" id="peruntukan" class="form-control" required placeholder="Peruntukan">
                                                                </div>

                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="kedalaman">Kedalaman</label>
                                                                    <div class="input-group">
                                                                        <input type="number" name="meter[]" id="meter" class="form-control" required placeholder="Meter" aria-describedby="basic-addon1">
                                                                        <span class="input-group-addon" id="basic-addon1">M LWS</span>
                                                                    </div>                                                       
                                                                    <!-- <input type="number" name="meter[]" id="kedalaman" class="form-control" required placeholder="Meter"> -->
                                                                </div>
                                                                
                                                                <div class="col-md-3" style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="kapasitas">Kapasitas</label>
                                                                    <input type="number" name="dermaga" id="kapasitas" class="form-control" required placeholder="Kapasitas">
                                                                </div>

                                                                <div class="col-md-3"style="padding-left:0;margin-top: 1rem;">
                                                                    <label for="satuan">Satuan</label>
                                                                    <select class="form-control" id="satuan" name="satuan[]" required>
                                                                        <option value="">Pilih Satuan</option>
                                                                        <option>FEET</option>
                                                                        <option>GT</option>
                                                                        <option>DWT</option>
                                                                    </select>    
                                                                </div>

                                                                <button type="button" class="btn btn-fill btn-danger btnHapus" style="margin-top: 3.3rem;margin-left: 10px;">Hapus</button>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                 
                                                    <div class="wrap-2">
                                                        <div class="form-group col-md-6">
                                                            <label for="name">Legalitas</label>
                                                            <input type="text" name="nosk" id="" class="form-control" required placeholder="Input No SK">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="jenissk">Jenis SK / Legalitas</label>
                                                            <select name="jenissk[]" class="form-control" id="jenissk" required>
                                                                <option value="">Pilih Jenis SK / Legalitas</option>
                                                                <option value="">Pembangunan</option>
                                                                <option value="">Pengembangan</option>
                                                                <option value="">Pengoperasian</option>
                                                                <option value="">Perpajangan / Pembangunan / Pengembangan</option>
                                                                <option value="">Perpanjangan Pengoperasian</option>
                                                                <option value="">Penyesuaian</option>
                                                                <option value="">Pendaftaran</option>
                                                            </select>
                                                        </div>
        
                                                        <div class="form-group col-md-6">
                                                            <label for="bidang usaha">BIDANG USAHA</label>
                                                            <input type="text" name="bidangusaha" id="" class="form-control" required placeholder="Bidang Usaha"> 
                                                        </div>
        
                                                        <div class="form-group col-md-6">
                                                            <label for="kelas">Wilayah Kerja</label>
                                                            <select name="kelas[]" class="form-control" id="kelas" required>
                                                                <option value="">Pilih Wilayah Kerja</option>
                                                                <option value="">KSOP KELAS II TERNATE</option>
                                                                <option value="">KUPP KELAS III DARUBA</option>
                                                                <option value="">KUPP KELAS III JAILOLO</option>
                                                                <option value="">KUPP KELAS III SOASIO</option>
                                                                <option value="">KUPP KELAS III LAIWUI</option>
                                                                <option value="">KUPP KELAS II LABUHA/BABANG</option>
                                                                <option value="">KUPP KELAS II SANANA</option>
                                                            </select>
                                                        </div>
    
                                                        <div class="form-group col-md-3" >
                                                            <label for="tersus_tuks">TERSUS / TUKS</label>
                                                            <select name="tersus_tuks[]" class="form-control" id="provinsi" required>
                                                                <option value="">Pilih</option>
                                                                <option value="">TERSUS</option>
                                                                <option value="">TUKS</option>
                                                            </select>  
                                                        </div>
        
                                                        <div class="form-group col-md-3" >
                                                            <label for="status">STATUS OPERASIONAL</label>
                                                            <select name="status[]" class="form-control" id="status" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="aktif">AKTIF</option>
                                                                <option value="nonaktif">NON AKTIF</option>
                                                            </select>  
                                                        </div>
        
                                                        <div class="col-md-3">
                                                            <label for="terbit">Tgl Terbit</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                                <input placeholder="Tanggal Terbit" type="text" class="form-control datepicker" name="tgl_terbit[]" autocomplete="off">
                                                            </div>
                                                        </div>
            
                                                        <div class="col-md-3">
                                                            <label for="akhir">Masa Berlaku</label>
                                                            <div class="input-group date" data-provide="datepicker">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                                <input placeholder="Masa Berlaku" type="text" class="form-control datepicker" name="tgl_akhir[]" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                            <div class="wrap-3" style="padding-left: 0;">
                                                <button type="button" id="btnAdd" class="btn btn-fill btn-primary" style="margin-right: 1rem;">
                                                <i class="fa fa-plus" style="margin-right: 5px;"></i>
                                                Tambah Lokasi
                                                </button>
                                                <button type="button" class="btn btn-fill btn-danger btnRemove">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <button type="submit" class="btn btn-fill btn-success" style="margin-right: 1rem;margin-left: -15px;">SIMPAN DATA</button>
                                    <a href="<?php echo $baseurl;?>Data"  class="btn btn-fill btn-default" >KEMBALI</a> 
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo $baseurl;?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo $baseurl;?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $baseurl;?>assets/js/light-bootstrap-dashboard.js"></script>
<script src="<?php echo $baseurl;?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo $baseurl;?>assets/js/jquery.datatables.js"></script>
<script src="<?php echo $baseurl;?>assets/js/bootstrap-datepicker.js"></script>

<script>
    $('select').selectpicker();
</script>
<script>
    $('#multifield').multifield({
        section: '.group',
        btnAdd:'#btnAdd',
        btnRemove:'.btnRemove',
    });
</script>
<script>
    $('#dermagamulti').multifield({
        section: '.groupdermaga',
        btnAdd:'#btnTambah',
        btnRemove:'.btnHapus',
    });
</script>
<script>
 $('.datepicker').datepicker();
</script>


</html>