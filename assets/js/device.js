var tabel;
/*-- Tabel --*/
function master(){  
    tabel =  $("#master_device").DataTable({
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
            url: 'CDevice/datatables_tabel_cari',
            type: 'POST',
            dataType: 'json'
        },
        columnDefs: [
            {targets: 0, className: 'text-center',"bSortable":false},
            {targets: 1, className: 'text-center',"bSortable":false},
            {targets: 2, className: 'text-center',"bSortable":false}
        ],
        sorting: [[0, 'asc']],
        fnInitComplete: function(oSettings, jSon){
            $('#master_device tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            } );
        }
    }) 

};

/*-------*/


$(document).ready(function(){

    master(); 
    
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
                    url: 'CDevice/proses',
                    type: 'POST',
                    data: $('#fm_add').serialize(),
                    dataType: 'json',
                    success: function(data){
                       alert(data);
                    },
                    error: function(data){
                      $('#bt_save').html('Save');  
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
                    $('#kode_device').val(oSelectRows[i][1]);
                    $('#kode').addClass('focused');
                    $('#nama').addClass('focused');
                    $('#nama_device').val(oSelectRows[i][2]);
                    $('#nama_device').focus();
               }    
        }
    });

    $('#bt_del').click( function () {
        var oSelectRows = tabel.rows(".selected").data();
        if (oSelectRows.length < 1) {
            info('Pilih Satu !!! ');
        }else{
                swal({
                    title: "Hapus Master Device",
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
                            var kode_device = oSelectRows[i][1];
                            var data={kode_device:kode_device};
                            $.ajax({
                                url: 'Master_Device/delete',
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