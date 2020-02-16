var tabel;
/*-- Tabel --*/
function master() {
    tabel = $("#m_brg").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        responsive: true,
        serverSide: true,
        processing: true,
        autoWidth: true,
        destroy: true,
        Scrollx: true,
        language: {
            processing: "<img alt='12' src='assets/images/ajax-loader.gif')'><br><small>Loading</small>"
        },
        ajax: {
            url: 'Master_brg/get_datatables',
            type: 'POST',
            dataType: 'json'
        },
        columnDefs: [
            { targets: 0, className: 'text-center', "bSortable": false },
            { targets: 1, className: 'text-center', "bSortable": false },
            { targets: 2, className: 'text-center', "bSortable": false,visible:false },
            { targets: 3, className: 'text-center', "bSortable": false,visible:false },
            { targets: 4, className: 'text-center', "bSortable": false,visible:false },
            { targets: 5, className: 'text-center', "bSortable": false },
            { targets: 6, className: 'text-center', "bSortable": false },
            { targets: 7, className: 'text-center', "bSortable": false },
            { targets: 8, className: 'text-center', "bSortable": false },
            { targets: 9, className: 'text-center', "bSortable": false },
            { targets: 10, className: 'text-center', "bSortable": false },
            { targets: 11, className: 'text-center', "bSortable": false }
        ],
        sorting: [
            [0, 'asc']
        ],
        fnCreatedRow: function(nRow, mData, iDataIndex) {
           $('td:eq(7)', nRow).html('<button type="button" class="btn btn-danger btn-xs  waves-effect" id="bt_setting" onclick=setting("' + mData[0] + '") title="setting"><i class="material-icons">input</i> </button> ');
           $('td:eq(8)', nRow).html('<button type="button" class="btn btn-info btn-xs  waves-effect" id="bt_edit" onclick=edit("' + mData[0] + '") title="edit"><i class="material-icons">edit</i> </button> <button type="button" class="btn btn-success btn-xs  waves-effect" id="bt_file" onclick=lihat_file("' + mData[0] + '") title="Lihat File"><i class="material-icons">search</i> </button> <button type="button" class="btn btn-warning btn-xs  waves-effect" id="bt_delete" title="delete" onclick=hapus("' + mData[0] + '")><i class="material-icons">delete</i> </button>');
        }
    })

};

function master2(a) {
    tabel2 = $("#tb_msetting_modal").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        responsive: true,
        serverSide: true,
        processing: true,
        autoWidth: true,
        destroy: true,
        Scrollx: true,
        language: {
            processing: "<img alt='12' src='assets/images/ajax-loader.gif')'><br><small>Loading</small>"
        },
        ajax: {
            url: 'Master_brg/get_datatables_setting',
            type: 'POST',
            dataType: 'json',
            data:a
        },
        columnDefs: [
            { targets: 0, className: 'text-center', "bSortable": false, visible:false },
            { targets: 1, className: 'text-center', "bSortable": false },
            { targets: 2, className: 'text-center', "bSortable": false, visible:false },
            { targets: 3, className: 'text-center', "bSortable": false },
            { targets: 4, className: 'text-center', "bSortable": false },
            { targets: 5, className: 'text-center', "bSortable": false },
            { targets: 6, className: 'text-center', "bSortable": false }
        ],
        sorting: [
            [0, 'asc']
        ],
        fnCreatedRow: function(nRow, mData, iDataIndex) {
            $('td:eq(4)', nRow).html('<button type="button" class="btn btn-danger btn-xs  waves-effect" id="bt_setting" onclick=delete_setting("' + mData[0] + '","' + mData[2] + '") title="hapus"><i class="material-icons">delete</i> </button> ');
         //   $('td:eq(8)', nRow).html('<button type="button" class="btn btn-info btn-xs  waves-effect" id="bt_edit" onclick=edit("' + mData[0] + '") title="edit"><i class="material-icons">edit</i> </button> <button type="button" class="btn btn-success btn-xs  waves-effect" id="bt_file" onclick=lihat_file("' + mData[0] + '") title="Lihat File"><i class="material-icons">search</i> </button> <button type="button" class="btn btn-warning btn-xs  waves-effect" id="bt_delete" title="delete" onclick=hapus("' + mData[0] + '")><i class="material-icons">delete</i> </button>');
        }
    })

};

function hapus(a) {
    swal({
        title: "Hapus Master Barang",
        text: " Yakin Akan Menghapus data !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            var data = { edKode: a };
            $.ajax({
                url: 'Master_brg/delete',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        page2();
                    } else {
                        info('Gagal Delete !!!!! ');
                    }
                },
                error: function(data) {
                    info('Gagal Delete, Eror !!!!! ');
                }
            });
        }
    });
}

function edit(a) {
    var m_url = 'Master_brg/caridata';
    var data = { edKode: a };
    $.ajax({
        type: "POST",
        dataType: "json",
        data: data,
        url: m_url,
        success: function(data) {
            page(fm_add);
            $("#edKode").val(data.kode);
            $("#edNama").val(data.nama);
          //  $("#satuan").val(data.satuan).selectpicker('refresh');
            $("#kategori").val(data.kategori).selectpicker('refresh');
            $("#supplier").val(data.supplier).selectpicker('refresh');
            $("#merk").val(data.merk).selectpicker('refresh');
        //    $("#edJual").val(data.jual);
        //    $("#edBeli").val(data.beli);
            $("#edDeskripsi").val(data.deskripsi);
            $("#edCarapakai").val(data.cara_pakai);
            $("#supplier").val(data.supplier);
            $("#merk").val(data.merk);
            document.getElementById('edKode').readOnly = true;

        }
    });
}

function lihat_file(a) {
    var m_url = 'Master_brg/caridata';
    var data = { edKode: a };
    $.ajax({
        type: "POST",
        dataType: "json",
        data: data,
        url: m_url,
        success: function(data) {
           // page(fm_add);
           $("#gambar").html(' ');
           $("#gambar").html('<img src=assets/media/'+ data.file + ' width="50%" height="50%">');
           $("#modal_foto").modal('show');
        }
    });
}

function setting(a) {
    var m_url = 'Master_brg/caridata';
    var data = { edKode: a };
    $.ajax({
        type: "POST",
        dataType: "json",
        data: data,
        url: m_url,
        success: function(data) {
            $("#edKodeMbarang").val(data.kode+' - '+data.nama);
        }
    });
    master2(a);
    $("#satuanm").val('').selectpicker('refresh');
    $("#edJualm").val('');
    $("#edBelim").val('');
    $("#modal_msetting").modal('show');
}

function delete_setting(a,b) {
    swal({
        title: "Hapus Master Setting Harga Barang",
        text: " Yakin Akan Menghapus data !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            var data = { edKode: a , edSatuan:b };
            $.ajax({
                url: 'Master_brg/delete_setting',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        //page2();
                        master2($("#edKodeMbarang").val());
                    } else {
                        info('Gagal Delete !!!!! ');
                    }
                },
                error: function(data) {
                    info('Gagal Delete, Eror !!!!! ');
                }
            });
        }
    });
}

/*-------*/


$(document).ready(function() {

    master();
    hanya_angka();

    $('#bt_add').click(function() {
        page(fm_add);
        $("#kategori").val('').selectpicker('refresh');
        $("#supplier").val('').selectpicker('refresh');
        $("#merk").val('').selectpicker('refresh');
    });
    $('#bt_cancel').click(function() {
        page2();
    });

    /*--simpan--*/

    $('#fm_add').on('submit', function(e) {
        e.preventDefault();
        if (_cek_inputan('#fm_add')) {
            $('#bt_save').addClass('disabled');
            $.ajax({
                url: 'Master_brg/proses',
                method: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#bt_save').removeClass('disabled');
                    page2();
                },
                error: function(data) {
                    info('Gagal Simpan, Eror !!!!! ');
                }
            });
        }

    });


    /*----*/

    $('#bt_edit').click(function() {
        var oSelectRows = tabel.rows(".selected").data();
        if ((oSelectRows.length > 1) || (oSelectRows.length < 1)) {
            info('Pilih Salah Satu !!! ');
        } else {
            page();
            for (var i = 0; i < oSelectRows.length; i++) {
                //alert((oSelectRows[i][2]));
                $('#edKode').val(oSelectRows[i][0]);
                $('#kode').addClass('focused');
                $('#nama').addClass('focused');
                $('#edNama').val(oSelectRows[i][1]);
                $('#edNama').focus();
            }
        }
    });

    $('#bt_del').click(function() {
        var oSelectRows = tabel.rows(".selected").data();
        if (oSelectRows.length < 1) {
            info('Pilih Satu !!! ');
        } else {
            swal({
                title: "Hapus Master Kategori Barang",
                text: " Yakin Akan Menghapus data !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    for (var i = 0; i < oSelectRows.length; i++) {
                        var data = { kode: oSelectRows[i][0] };
                        $.ajax({
                            url: 'Master_brg/delete',
                            type: 'POST',
                            data: data,
                            dataType: 'json',
                            success: function(data) {
                                if (data.status) {
                                    page2();
                                } else {
                                    info('Gagal Delete !!!!! ');
                                }
                            },
                            error: function(data) {
                                info('Gagal Delete, Eror !!!!! ');
                            }
                        });

                    }

                } else {

                }
            });
        }
    });

    $('#bt_save_modal').click(function(){     
        
        if(_cek_inputan('#fm_add_modal')){     
            $('#bt_save_modal').addClass('disabled');
                $.ajax({
                    url: 'Master_brg/proses_modal',
                    type: 'POST',
                    data: $('#fm_add_modal').serialize(),
                    dataType: 'json',
                    success: function(data){
                       //page2();
                       $("#satuanm").val('').selectpicker('refresh');
                       $("#edJualm").val('');
                       $("#edBelim").val('');
                       master2($("#edKodeMbarang").val());
                       $('#bt_save_modal').removeClass('disabled');
                    },
                    error: function(data){
                      $('#bt_save_modal').html('Save');  
                      info('Gagal Simpan, Eror !!!!! ');
                    }    
                }); 
        }

    });

    $('#bt_cancel_modal').click(function() {
        $("#modal_msetting").modal('hide');
    });


});