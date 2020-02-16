var tabel;
/*-- Tabel --*/
function master(){  
    tabel =  $("#m_carkim").DataTable({
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
            url: 'Master_carkim/get_datatables',
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
            $('td:eq(2)', nRow).html('<button type="button" class="btn btn-info btn-xs waves-effect" onclick=edit("'+mData[0]+'") id="bt_edit" title="edit"><i class="material-icons">edit</i> </button> <button type="button" class="btn btn-warning btn-xs  waves-effect" id="bt_delete" title="delete" onclick=hapus("'+mData[0]+'")><i class="material-icons">delete</i> </button>');
        }
    }) 

};

/*-------*/

function hapus(a){ 
    swal({
        title: "Hapus Master Cara Kirim",
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
                    url: 'Master_carkim/delete',
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

            
           
        } else {
           
        }
    });       
}

function edit(a) {
    var m_url = 'Master_carkim/caridata';
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

   
    $('#bt_save').click(function(){     
        
        if(_cek_inputan('#fm_add')){     
            $('#bt_save').addClass('disabled');
                $.ajax({
                    url: 'Master_carkim/proses',
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
                    }    
                }); 
        }

    });


     $('#bt_edit').click( function () {
        var oSelectRows = tabel.rows(".selected").data();
        if ((oSelectRows.length > 1)||(oSelectRows.length < 1)) {
            info('Pilih Salah Satu !!! ');
        }else{
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

    $('#bt_del').click( function () {
        var oSelectRows = tabel.rows(".selected").data();
        if (oSelectRows.length < 1) {
            info('Pilih Satu !!! ');
        }else{
                swal({
                    title: "Hapus Master Satuan",
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
                                url: 'Master_carkim/delete',
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


/*
   var apiUrl = '<?php echo base_url();?>';                
    Vue.use(VeeValidate);
    var app = new Vue({
        el: '#app',
        data: {
            newItems: {
                selected: false,
                code: '',
                name: ''
            },
            rows: [],
            onEdit: false,
            selectedAll: false,
            delete: [],
            loading: true,
            message: []
        },
        created() {
            this.getRows()
        },
        methods: {
            validateBeforeSubmit: function() {
                var vm = this
                
                this.$validator.validateAll().then(function(isValid) {
                    if(!isValid) return;
                    vm.startLoading()
                    var url = apiUrl+'home/insert'
                    var message = 'Items added successfully'

                    if(vm.onEdit) {
                        url = apiUrl+'home/update/'+vm.onEdit
                        message = 'Items Updated successfully'
                    } 

                    axios.post(url,
                    new FormData($('#itemsForm')[0])).then(function(response) {
                        vm.getRows()
                        vm.createNew()
                        vm.showMessage(message)
                        vm.endLoading()                        
                    }).catch(function(e) {
                        
                    })
                });
            },
            getRows: function() {
                axios.get('Master_satuan/get_datatables').then(
                    result => {
                        this.rows = result.data,
                        this.endLoading()
                    }
                );
            },
            createNew: function() {               
                this.onEdit = false
                this.newItems = {
                    selected:false,
                    code:'', 
                    name:''
                }
            },
            edit: function(id) {
                this.onEdit = id
                this.startLoading()
                this.newItems = {
                    selected:false,
                    code:'', 
                    name:''
                }
                axios.get(apiUrl+'home/edit/'+id).then(
                    result => {
                        this.newItems.code = result.data.code,
                        this.newItems.name = result.data.name,
                        this.endLoading()
                    }
                );
            },
            checkAll: function() {
                if(this.selectedAll) {
                    this.selectedAll = true;
                    this.rows.forEach(function(row) {
                        row.selected = true
                    })
                } else {
                    this.selectedAll = false;
                    this.rows.forEach(function(row) {
                        row.selected = false
                    })
                }
            },
            checkSelectAll: function() {
                var check = true;
                this.rows.forEach(function (row) {
                    if (row.selected == false) {
                        check = false;
                    } 
                });
                this.selectedAll = check;
            },
            deleteSelected: function() {
                var conf = confirm("Are you sure to delete?");
                if(!conf) return true;
                var vm = this;
                this.startLoading()
                this.rows.forEach(function(row) {
                    if(row.selected) {
                        vm.delete.push({id:row.id})
                    }
                })
                axios.post(apiUrl+'home/delete/',this.delete).then(function(response) {
                        
                    vm.getRows()
                    vm.selectedAll = false
                    vm.createNew()
                    vm.showMessage('Deleted items successfully')
                    vm.endLoading()
                })
                
            },
            startLoading: function() {
                this.loading = true
            },
            endLoading: function() {
                this.loading = false
            },
            showMessage: function(message, status = 'success') {
                this.message = {text:message, status:status}
                this.removeMessage()
            },
            removeMessage: function() {
                var msg = this
                setTimeout(function() {
                    msg.message = {text:'', status:''}
                }, 5000)
            }
        }
    })  
*/
});

