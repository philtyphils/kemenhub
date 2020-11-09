<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/data.js?v=<?php echo uniqid(); ?>"></script> 

        <div class="contents">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="title"></h2>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">TUKS & TERSUS DATATABLE</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">REKAPITULASI TERSUS DAN TUKS DATATABLE </p>
                                    </div>
                                    <span class="fa fa-folder-open"></span>
                                </div>
                                <div class="card-content" style="padding-top: 100px;">

                                    <div class="warp-toolbar">
                                        <input type="text" id="searchbox" class="searchbutton" placeholder="Silahkan cari data disini">
                                    </div>
                                   

                                    <div class="toolbar">
                                        <div class="warp-toolbar">
                                        <select class="selectpicker" multiple data-live-search="true" title="Provinsi">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>

                                        <select class="selectpicker" multiple data-live-search="true" title="Kelas" id="box">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>

                                        <select class="selectpicker" multiple data-live-search="true" title="Kategori" id="box">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                        </div>
                                        
                                    <div class="warp-toolbar">
                                        <a href="form.html" class="btn btn-success btn-fill" style="margin-right: 1rem;">
                                            <i class="fa fa-plus"></i>
                                            <span>Buat Data Baru</span>  
                                        </a>
                                        <a href="" class="btn btn-info btn-fill">
                                            <i class="fa fa-download"></i>
                                            <span>Export Data Excel</span>   
                                        </a>        
                                    </div>
                                    </div>

                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-responsive table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="color: #FFFFFF;font-weight: 600;font-size: 12px;">
                                                <tr role="row" style="background-color:#43425D;">
                                                    <th style="width:60px">No</th>
                                                    <th>NAMA</th>
                                                    <th>KELAS</th>
                                                    <th style="width:150px !important;">BIDANG USAHA</th>
                                                    <th>KATEGORI</th>
                                                    <th>LOKASI</th>
                                                    <th>DMS</th>
                                                    <th style="width:100px">TERSUS / TUSK</th>
                                                    <th >SK</th>
                                                    <th>TERBIT</th>
                                                    <th style="width:100px">STATUS</th>
                                                    <th style="width:100px">MASA BERLAKU</th>
                                                    <th class="disabled-sorting" style="width:50px">ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row">
                                                    <td>1</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>2</td>
                                                    <td>PT.MEDCOPAPUA HIJAU SELARAS</td>
                                                    <td>KSOP KELAS I SORONG</td>
                                                    <td>PERKEBUNAN JELAPA SAWIT</td>
                                                    <td>PERTANIAN</td>
                                                    <td>DESA KAIRONI,DISTRIK SIDEY, KAB. MANOKWARI, PAPUA BARAT</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TERSUS</td>
                                                    <td>A. 1417/AL. 308/DJPL</td>
                                                    <td>02/12/2019</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>3</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>4</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>5</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>6</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>7</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>8</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>9</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>10</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>10</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>10</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>10</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>10</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td >
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <tr  role="row">
                                                    <td>10</td>
                                                    <td>PT.PERTAMINA (PERSERO)</td>
                                                    <td>KSOP KELAS IV MANOKWARI</td>
                                                    <td>NIAGA MIGAS</td>
                                                    <td>ENERGI</td>
                                                    <td>PELABUHAN MANOKWARI</td>
                                                    <td> d + (min/60) + (sec/3600)</td>
                                                    <td>TUKS</td>
                                                    <td>SK Menhub Nomor : KM. 42/AL.106/Phb-80</td>
                                                    <td>15/02/1980</td>
                                                    <td>AKTIF</td>
                                                    <td>02/12/2024</td>
                                                    <td>
                                                        <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>