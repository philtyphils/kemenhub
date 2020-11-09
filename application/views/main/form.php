<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/form.js?v=<?php echo uniqid(); ?>"></script>

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
                                            <div class="form-group col-md-12">
                                                <label for="name">Nama Perusahaan</label>
                                                <input type="text" name="name" id="" class="form-control" required placeholder="Nama Perusahaan">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="kategori usaha">KATEGORI USAHA</label>
                                                <select name="kategori_usaha[]" class="form-control" id="kategori usaha" required>
                                                    <option value="">Pilih Kategori Usaha</option>
                                                    <option value="male">ENERGI</option>
                                                    <option value="female">PERTAMBANGAN</option>
                                                    <option value="female">INDUSTRI</option>
                                                    <option value="female">ENERGI</option>
                                                    <option value="female">DOK DAN GALANGAN</option>
                                                    <option value="female">PERTANIAN</option>
                                                    <option value="female">KEHUTANAN</option>
                                                    <option value="female">PARIWISATA</option>
                                                    <option value="female">PERIKANAN</option>
                                                </select>    
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="bidang usaha">BIDANG USAHA</label>
                                                <input type="text" name="bidangusaha" id="" class="form-control" required placeholder="Bidang Usaha"> 
                                            </div>
                                        </div>
        
                                      
                                        <div class="row group">
                                            <div class="form-group col-md-6">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat[]" id="alamat"  rows="21" class="form-control" required></textarea> 
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="provinsi">Provinsi</label>
                                                    <select name="provinsi[]" class="form-control" id="provinsi" required >
                                                        <option value="">Pilih Provinsi</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dms">Degrees minutes seconds (DMS)</label>
                                                    <input type="text" name="dms[]" id="dms" class="form-control" required placeholder="Input DMS">
                                                </div>

                                                <div class="form-group">
                                                    <label for="name">NO SK</label>
                                                    <input type="text" name="nosk" id="" class="form-control" required placeholder="Input No SK">
                                                </div>

                                                <div class="form-group">
                                                    <label for="kelas">KELAS</label>
                                                    <select name="kelas[]" class="form-control" id="kelas" required>
                                                        <option value="">Pilih Kelas</option>
                                                        <option value="">KSOP KELAS II TERNATE</option>
                                                        <option value="">KUPP KELAS III DARUBA</option>
                                                        <option value="">KUPP KELAS III JAILOLO</option>
                                                        <option value="">KUPP KELAS III SOASIO</option>
                                                        <option value="">KUPP KELAS III LAIWUI</option>
                                                        <option value="">KUPP KELAS II LABUHA/BABANG</option>
                                                        <option value="">KUPP KELAS II SANANA</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6" style="padding-left: 0;">
                                                    <label for="tersus_tuks">TUKS / TERSUS</label>
                                                    <select name="tersus_tuks[]" class="form-control" id="provinsi" required>
                                                        <option value="">Pilih</option>
                                                        <option value="tuks">TUKS</option>
                                                        <option value="tersus">TERSUS</option>
                                                    </select>  
                                                </div>

                                                <div class="form-group col-md-6" style="padding: 0;">
                                                    <label for="status">STATUS</label>
                                                    <select name="status[]" class="form-control" id="status" required>
                                                        <option value="">Pilih Status</option>
                                                        <option value="aktif">AKTIF</option>
                                                        <option value="nonaktif">NON AKTIF</option>
                                                    </select>  
                                                </div>

                                                <div class="col-md-6" style="padding-left: 0;" >
                                                    <label for="terbit">Tgl Terbit</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                        <input placeholder="Tanggal Terbit" type="text" class="form-control datepicker" name="tgl_terbit[]" autocomplete="off">
                                                    </div>
                                                </div>
    
                                                <div class="col-md-6" style="padding: 0;">
                                                    <label for="akhir">Masa Berlaku</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                        <input placeholder="Masa Berlaku" type="text" class="form-control datepicker" name="tgl_akhir[]" autocomplete="off">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-12" style="margin-bottom: 1rem;">
                                                <button type="button" id="btnAdd" class="btn btn-fill btn-primary" style="margin-right: 1rem;">Tambah</button>
                                                <button type="button" class="btn btn-fill btn-danger btnRemove">Hapus</button>
                                            </div>

                                        </div>

                                    </div>
                                   
                                    <button type="submit" class="btn btn-fill btn-success" style="margin-right: 1rem;">SIMPAN</button>
                                    <a href="<?php echo $siteurl;?>/Data"  class="btn btn-fill btn-default" >KEMBALI</a>
                                  
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>