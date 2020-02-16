var tabel;
/*-- Tabel --*/
function master(){  
    tabel =  $("#m_sup").DataTable({
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        responsive: true,   
        serverSide: true,
        processing: true,
        autoWidth: true,
        destroy:true,
        Scrollx:true,
        language: {
            processing: "<img alt='12' src='assets/images/ajax-loader.gif')'><br><small>Loading</small>"
        },
        ajax: {
            url: 'Master_sup/get_datatables',
            type: 'POST',
            dataType: 'json'
        },
        columnDefs: [
            {targets: 0, className: 'text-center',"bSortable":false},
            {targets: 1, className: 'text-center',"bSortable":false},
            {targets: 2, className: 'text-center',"bSortable":false},
            {targets: 3, className: 'text-center',"bSortable":false},
            {targets: 4, className: 'text-center',"bSortable":false},
            {targets: 5, className: 'text-center',"bSortable":false}
        ],
        sorting: [[0, 'asc']],
        fnCreatedRow: function( nRow, mData, iDataIndex ) { 
            $('td:eq(5)', nRow).html('<button type="button" class="btn btn-info btn-xs waves-effect" onclick=edit("'+mData[0]+'") id="bt_edit" title="edit"><i class="material-icons">edit</i> </button> <button type="button" class="btn btn-warning btn-xs  waves-effect" id="bt_delete" title="delete" onclick=hapus("'+mData[0]+'")><i class="material-icons">delete</i> </button>');
        }
    }) 

};

function edit(a) {
    var m_url = 'Master_sup/caridata';
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
            $("#edAlamat").val(data.alamat);
            $("#edTelepon").val(data.telepon);
            $("#edFax").val(data.fax);
            document.getElementById('edKode').readOnly = true;
            
        }
    });
}

function hapus(a){ 
    swal({
        title: "Hapus Master Supplier",
        text: " Yakin Akan Menghapus data !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            var data={edKode:a};
            $.ajax({
                url: 'Master_sup/delete',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data){
                    if(data.status){
                        page2();
                    }else{
                        info('Gagal Delete !!!!! ');
                    }
                },
                error: function(data){
                        info('Gagal Delete, Eror !!!!! ');
                }   
            }); 
        } 
    });       
}
/*-------*/


$(document).ready(function(){

    master();
    hanya_angka(); 
    
    $('#bt_add').click( function () {
       page(fm_add);   
    });
    $('#bt_cancel').click( function () {
        page2();
    });

    /*--simpan--*/
    $('#bt_save').click(function(){     
        
        if(_cek_inputan('#fm_add')){     
            $('#bt_save').addClass('disabled');
                $.ajax({
                    url: 'Master_sup/proses',
                    type: 'POST',
                    data: $('#fm_add').serialize(),
                    dataType: 'json',
                    success: function(data){
                       page2();
                       $('#bt_save').removeClass('disabled');
                    },
                    error: function(data){
                      $('#bt_save').html('Save');  
                      $('#bt_save').removeClass('disabled');
                      info('Gagal Simpan, Eror !!!!! ');
                    }    
                }); 
        }

    });
    /*----*/

     $('#bt_edit').click( function () {
        var oSelectRows = tabel.rows(".selected").data();
        if ((oSelectRows.length > 1)||(oSelectRows.length < 1)) {
            info('Pilih Salah Satu !!! ');
        }else{
              page(); 
              for (var i = 0; i < oSelectRows.length; i++) { 
                    //alert((oSelectRows[i][2]));
                    $('#edKode').val(oSelectRows[i][0]);
                    $('#edNama').val(oSelectRows[i][1]);
                    $('#edAlamat').val(oSelectRows[i][2]);
                    $('#edTelp').val(oSelectRows[i][3]);
                    $('#edFax').val(oSelectRows[i][4]);
                    $('#edAtasnama').val(oSelectRows[i][5]);
                    $('#kode').addClass('focused');
                    $('#nama').addClass('focused');
                    $('#alamat').addClass('focused');
                    $('#telp').addClass('focused');
                    $('#fax').addClass('focused');
                    $('#atasnama').addClass('focused');
                    $('#nama').focus();
               }    
        }
    });

    $('#bt_del').click( function () {
        var oSelectRows = tabel.rows(".selected").data();
        if (oSelectRows.length < 1) {
            info('Pilih Satu !!! ');
        }else{
                swal({
                    title: "Hapus Master Supplier",
                    text: " Yakin Akan Menghapus data !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        for (var i = 0; i < oSelectRows.length; i++) { 
                            var data={kode:oSelectRows[i][0]};
                            $.ajax({
                                url: 'Master_sup/delete',
                                type: 'POST',
                                data: data,
                                dataType: 'json',
                                success: function(data){
                                    if(data.status){
                                        page2();
                                    }else{
                                        info('Gagal Delete !!!!! ');
                                    }
                                },
                                error: function(data){
                                        info('Gagal Delete, Eror !!!!! ');
                                }   
                            }); 

                        }    
                       
                    } else {
                       
                    }
                });       
        }
    });

     

});