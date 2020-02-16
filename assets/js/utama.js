function info(pesan){
        swal({
          title: "Warning",
          text: pesan,
          type:"warning"
        });
    }
function hanya_angka(){
    $(".hanyaangka").keydown(function (e) {
        // backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Ctrl+A, Command+A
            ((e.keyCode === 65 || e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 116) && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}
function inputan_harus_diisi(element){
  $('.harusdiisi', element).each(function(){
    $(this).closest('.form-group').find('label').html('<small>*</small> '+$(this).closest('.form-group').find('label').html());
  });
}
function _pesan_err($string){
    return '<div class="text-danger"><i class="fa fa-exclamation"></i> '+$string+'</div>';
}
function _cek_inputan($form){
    var $status=true;
    $('.harusdiisi', $form).each(function(){
        if($(this).is(':enabled')){
            if($(this).prop('nodeName')!='SELECT'){
                if($(this).val().trim()=='') $status=false;
            }else{
                if($(this).val()==null || $(this).val()=='') $status=false;
            }
            if(! $status){
                if($(".modal").hasClass("in"))
                    $(".modal").scrollTop(($(this).offset().top));
                else $("html, body").scrollTop($(this).offset().top);

                if($(this).prop('nodeName')!='SELECT'){
                    $(this).attr('data-content', _pesan_err('Harus diisi'));
                    pesan($(this));
                    return false;
                }else{
                    $(this).focus();
                    $(this).select2('open');
                    return false;
                }
            }
        }
    });
    return $status;
}
function pesan(komponen){
    $(komponen).removeAttr('title');
    $(komponen)
        .popover({
            live: true,
            placement: 'top',
            offset: 5,
            html: true,
            container: 'body',
            trigger: 'focus'
        }).popover('show');
    if(!$(komponen).prop('disabled')){
        $(komponen).focus().select();
    }
}
function page($form){
    $('#form_add_input').removeClass('hide');
    $('#form_add_detail').addClass('hide');
    $('.form-control', $form).each(function(){ 
        $(this).val('');
    });
    $('.form-line', $form).each(function(){ 
        $(this).removeClass('focused');
    });       
};

function page2(){
    $('#form_add_input').addClass('hide');
    $('#form_add_detail').removeClass('hide');
     tabel.ajax.reload(); 
};