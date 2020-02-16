var tabel;

/*-- Tabel --*/

function master(){  

    tabel =  $("#m_katbrg").DataTable({

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

            url: 'Master_katbrg/get_datatables',

            type: 'POST',

            dataType: 'json'

        },

        columnDefs: [

            {targets: 0, className: 'text-left', width:'15%',align:'left',"bSortable":false},

            {targets: 1, className: 'text-left',"bSortable":false},

            {targets: 2, className: 'text-center',"bSortable":false}

        ],

        sorting: [[0, 'asc']],

        fnCreatedRow: function( nRow, mData, iDataIndex ) { 

            $('td:eq(2)', nRow).html('<button type="button" class="btn btn-info btn-xs  waves-effect" id="bt_edit" onclick=edit("'+mData[0]+'") title="edit"><i class="material-icons">edit</i> </button> <button type="button" class="btn btn-warning btn-xs  waves-effect" id="bt_delete" title="delete" onclick=hapus("'+mData[0]+'")><i class="material-icons">delete</i> </button>');

        }

    }) 



};



/*-------*/



function hapus(a){ 

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

    }, function (isConfirm) {

        if (isConfirm) {

            var data={edKode:a};

            $.ajax({

                url: 'Master_katbrg/delete',

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



function edit(a) {

    var m_url = 'Master_katbrg/caridata';

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

            document.getElementById('edKode').readOnly = true;

            

        }

    });

}



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

                    url: 'Master_katbrg/proses',

                    type: 'POST',

                    data: $('#fm_add').serialize(),

                    dataType: 'json',

                    success: function(data){

                       page2();

                       $('#bt_save').removeClass('disabled');

                    },

                    error: function(data){

                      $('#bt_save').html('Save');  

                      info('Gagal Simpan, Eror !!!!! ');

                      $('#bt_save').removeClass('disabled');

                    }    

                }); 

        }



    });

    /*----*/



     



     



});