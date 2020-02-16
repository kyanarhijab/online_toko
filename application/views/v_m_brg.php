<div class="row clearfix hide" id="form_add_input">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue">
                <h2>
                    Master Barang
                    <small></small>
                </h2>
            </div>
            <div class="body">
                <form  method="post"  id="fm_add" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Kode Barang</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edKode" name="edKode" class="form-control" readonly=readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Nama Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edNama" name="edNama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label hidden">
                            <label>Satuan</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7 hidden">
                            <div class="form-group">
                                <div class="form-line">
                                <select class="form-control show-tick" data-live-search="true" id="satuan" name="satuan">
                                    <option value="">-Pilihan-</option>';
                                        <?php $no=0; foreach($satuan as $row): $no++; 
                                            echo '<option value="'.$row->KD_SATUAN.'">'.$row->NM_SATUAN.'</option>';
                                            endforeach; 
                                        ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Kategori Barang</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                <select class="form-control show-tick" data-live-search="true" id="kategori" name="kategori">
                                    <option value="">-Pilihan-</option>';
                                        <?php $no=0; foreach($kategori as $row): $no++; 
                                            echo '<option value="'.$row->KD_KATEGORI.'">'.$row->NM_KATEGORI.'</option>';
                                            endforeach; 
                                        ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Supplier</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                <select class="form-control show-tick" data-live-search="true" id="supplier" name="supplier">
                                    <option value="">-Pilihan-</option>';
                                        <?php $no=0; foreach($supplier as $row): $no++; 
                                            echo '<option value="'.$row->KD_SUPPLIER.'">'.$row->NM_SUPPLIER.'</option>';
                                            endforeach; 
                                        ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Merk</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                <select class="form-control show-tick" data-live-search="true" id="merk" name="merk">
                                    <option value="">-Pilihan-</option>';
                                        <?php $no=0; foreach($merk as $row): $no++; 
                                            echo '<option value="'.$row->KD_MERK.'">'.$row->NM_MERK.'</option>';
                                            endforeach; 
                                        ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Deskripsi Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="edDeskripsi" id="edDeskripsi" cols="30" rows="2" class="form-control no-resize"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Cara Pemakaian</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="edCarapakai" id="edCarapakai" cols="30" rows="2" class="form-control no-resize"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix hidden">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Harga Jual</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edJual" name="edJual" class="form-control hanyaangka">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix hidden">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Harga Beli</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edBeli" name="edBeli" class="form-control hanyaangka">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Upload File</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                    <input type="file" id="uploadFile" name="uploadFile[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>     
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="submit" class="btn btn-success m-t-15 waves-effect" id="bt_save"> <i class="material-icons">save</i> Save</button>
                        <button type="button" class="btn btn-danger m-t-15 waves-effect" id="bt_cancel"> <i class="material-icons">clear</i> Cancel</button>                            
                    </div>                           
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix" id="form_add_detail">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue">
                <h2>
                    <?php echo $option['title2']; ?>
                    <small></small>
                </h2>
            </div>
            <div class="body">
            <button type="button" class="btn btn-danger btn-sm waves-effect" id="bt_add"><i class="material-icons">add</i>  Tambah Data </button>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable display select" cellspacing="0" width="100%" id="m_brg" style="cursor:pointer;">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>KD_Kategori</th>
                                <th>KD_Supplier</th>
                                <th>KD_Merk</th>
                                <th>Kategori</th>
                                <th>Supplier</th>
                                <th>Merk</th>
                                <th>Deskripsi Barang</th>
                                <th>Cara Pemakaian</th>
                                <th></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_msetting" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title">Setting Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="fm_add_modal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Barang</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edKodeMbarang" name="edKodeMbarang" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">                        
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Satuan</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                <select class="form-control show-tick" data-live-search="true" id="satuanm" name="satuanm">
                                    <option value="">-Pilihan-</option>';
                                        <?php $no=0; foreach($satuan as $row): $no++; 
                                            echo '<option value="'.$row->KD_SATUAN.'">'.$row->NM_SATUAN.'</option>';
                                            endforeach; 
                                        ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Harga Jual</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edJualm" name="edJualm" class="form-control hanyaangka">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Harga Beli</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edBelim" name="edBelim" class="form-control hanyaangka">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="button" class="btn btn-success m-t-15 waves-effect" id="bt_save_modal"> <i class="material-icons">save</i> Save</button>
                        <button type="button" class="btn btn-danger m-t-15 waves-effect" id="bt_cancel_modal"> <i class="material-icons">clear</i> Cancel</button>
                    </div>     
                </form>          
                <br><br>                     
                <div class="table-responsive">
                    <div class="dt-responsive table-responsive">
                        <table id="tb_msetting_modal" class="table compact table-striped table-hover table-bordered nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Nama Satuan</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_foto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-body">
                <center>
                    <div id="gambar">
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>