<div class="row clearfix hide" id="form_add_input">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue">
                <h2>
                    Master Supplier
                    <small></small>
                </h2>
            </div>
            <div class="body">
                <form id="fm_add">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Kode Supplier</label>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edKode" name="edKode" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Nama Supplier</label>
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
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Alamat Supplier</label>
                        </div>
                        <div class="col-lg-10 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edAlamat" name="edAlamat" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Telepon Toko</label>
                        </div>
                        <div class="col-lg-10 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edTelepon" name="edTelepon" class="form-control hanyaangka">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Fax Toko</label>
                        </div>
                        <div class="col-lg-10 col-md-4 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edFax" name="edFax" class="form-control hanyaangka">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="button" class="btn btn-success m-t-15 waves-effect" id="bt_save"> <i class="material-icons">save</i> Save</button>
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
                    <table class="table table-bordered table-striped table-hover dataTable display select" cellspacing="0" width="100%" id="m_sup" style="cursor:pointer;" >
                        <thead>
                            <tr>
                                <th style="text-align:left">Kode Supplier</th>
                                <th style="text-align:left">Nama Supplier</th>
                                <th style="text-align:left">Alamat Supplier</th>
                                <th style="text-align:left">Telepon Supplier</th>
                                <th style="text-align:left">Fax Supplier</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>