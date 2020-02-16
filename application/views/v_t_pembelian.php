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
                 <form id="fm_add" role="form" method="post">
                   <div class="input-group">
                        <span class="input-group-addon">
                          NO FAKTUR PEMBELIAN
                        </span>
                    </div>
                    <div class="input-group" style="text-align:center;">
                         <div class="form-line" style="width: 200px; " id="user">
                            <input type="text" name="edIdCode" id="edIdCode" value="MM00113101000001" class="form-control harusdiisi postdata" style="margin-top:-40px;text-align: center;" />
                        </div>
                    </div>
                    <div class="input-group" style="text-align:center;margin-left:5px ">
                        <div class="form-line " id="pass" style="width: 400px; ">
                            <input type="text" name="edPass" style="text-align: center;" value="" id="edPass" class="form-control harusdiisi postdata" maxlength="" placeholder="Supplier" />
                        </div>
                        <span class="input-group-addon">
                            <i class="material-icons" style="margin-left:-500px">search</i>
                        </span>
                     </div>    
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix" id="form_add_detail">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <div class="input-group" style="text-align:center;margin-left:10px ">
                    <div class="form-line " id="pass" style="width: 400px; ">
                        <input type="text" name="edPass" style="text-align: center;" value="" id="edPass" class="form-control harusdiisi postdata" maxlength="" placeholder="Barang" />
                    </div>
                    <span class="input-group-addon">
                        <i class="material-icons" style="margin-left:-500px">search</i>
                    </span>
                </div>
                <div class="input-group" style="text-align:center; ">
                    <div class="form-line " id="pass" ">
                        <input type="number" name="edPass" style="text-align: center;" value="" id="edPass" class="form-control harusdiisi postdata" maxlength="" placeholder="Jumlah" />
                    </div>
                </div>  
                 <div class="input-group" style="text-align:left;margin-left:200px ">
                    <div class="form-line " id="pass" style="width: 300px; ">
                       <span class="input-group-addon">
                            <button type="button" id="bt_add" class="btn btn-danger waves-effect" title="Add"  style="margin-left:-400px"><i class="material-icons">add</i></button>
                        </span>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>