<script type="text/javascript" src="<?php echo $baseurl;?>assets/js/kategori.js?v=<?php echo uniqid(); ?>"></script>

<div class="contents">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="title"></h2>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header-master">
                                    <div class="header">
                                        <h4 class="title">KATEGORI USAHA</h4>
                                        <p class="category" style="color: #AAAAAA; font-weight: 300;">Jumlah Kategori Usaha</p>
                                    </div>
                                    <span class="fa fa-cog"></span>
                                </div>
                               
                                <div class="content">

                                    <h2 class="description">Total Kategori Usaha : </h4> 

                                    <div class="warp-toolbar" style="margin: 1rem 0;">
                                        <form action="" style="display: contents;">
                                            <input type="text" id="searchbox" class="searchbutton" placeholder="Silahkan cari data disini">
                                        </form>
                                      
                                        <a href="formkategori.html" class="btn btn-success btn-fill" style="float: right;">
                                            <i class="fa fa-plus"></i>
                                            <span>Buat Kategori Usaha Baru</span>  
                                        </a>
                                    </div>

                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-responsive table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead style="color: #FFFFFF;font-weight: 600;font-size: 12px;">
                                                    <tr role="row" style="background-color:#43425D;">
                                                        <th>No</th>
                                                        <th>KATEGORI USAHA</th>
                                                        <th class="disabled-sorting">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row">
                                                        <td>1</td>
                                                        <td>PERTAMBANGAN</td> 
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td>2</td>
                                                        <td>INDUSTRI</td>          
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td>3</td>
                                                        <td>ENERGI</td>
                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                                            <button id="delete" data-toggle="modal" data-target="#delete-modal" class="btn btn-simple btn-danger btn-icon remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td>4</td>
                                                        <td>DOK DAN GALANGAN</td>
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