<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/kelas.js?v=<?php echo uniqid(); ?>"></script>

<div class="contents">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="title"></h2>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">WILAYAH KERJA</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah KELAS KUPP KSOP & OP</p>
                                    </div>
                                    <span class="fa fa-bar-chart"></span>
                                </div>
                               
                                <div class="content">

                                    <h2 class="description">Total Wilayah Kerja : </h4> 

                                    <div class="warp-toolbar" style="margin: 1rem 0;">
                                        <form action="" style="display: contents;">
                                            <input type="text" id="searchbox" class="searchbutton" placeholder="Silahkan cari data disini" style="margin-right: 1rem;">
                                        </form>
                                        
                                        <select class="selectpicker" title="Provinsi">
                                            <option>Aceh</option>
                                            <option>Sumatera Selatan</option>
                                            <option>Jawa</option>
                                        </select>
                                        <a href="formkelas.html" class="btn btn-success btn-fill" style="float: right;">
                                            <i class="fa fa-plus"></i>
                                            <span>Buat Kelas Baru</span>  
                                        </a>
                                    </div>

                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-responsive table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead style="color: #FFFFFF;font-weight: 600;font-size: 12px;">
                                                    <tr role="row" style="background-color:#43425D;">
                                                        <th>No</th>
                                                        <th>NAMA WILAYAH KERJA</th>
                                                        <th>PROVINSI</th>
                                                        <th class="disabled-sorting">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row">
                                                        <td>1</td>
                                                        <td>KUPP KELAS IV MANOKWARI</td>
                                                        <td>SULAWESI</td>
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td>2</td>
                                                        <td>KUPP KELAS IV MANOKWARI</td>
                                                        <td>ACEH</td>
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td>3</td>                                                   
                                                        <td>KSOP KELAS IV MANOKWARI</td>
                                                        <td>PAPUA</td>
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td>4</td>
                                                        <td>KSOP KELAS IV MANOKWARI</td>
                                                        <td>JAWA BARAT</td>
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
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