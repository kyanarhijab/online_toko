<?php 
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userdata('nama')){
        redirect('Welcome');
    }
}
function no_access()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('nama')){
        redirect('Login');
    }
}

function menuaktif($aktif,$menu){   
    if($aktif==$menu){
        return "active";
    }else{
        return "";
    }
}

function _identity(){
            return array(
                'url_css'=>base_url()."assets/",
                'url_js'=>base_url()."assets/",
            );
}

function _main_css(){
    return array(
            'css/bootstrap.css',
            'css/waves.css',
            'css/animate.css',
            'css/style.css',
            'font/font.css',
            'font/icon.css',
            'css/sweetalert.css',
            'css/all-themes.css'
        );
}
    
function _main_js(){
    return array(
            'js/jquery.min.js',
            'js/bootstrap.js',
            'js/waves.js',
            'js/jquery.validate.js',
 //           'js/jquery.slimscroll.js',
            'js/admin.js',
            'js/sweetalert.min.js'
        );
}


function _input_login($icon,$form,$id,$focused=''){
    return 
           '<div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">'.$icon.'</i>
                </span>
                <div class="form-line '.$focused.'" id="'.$id.'">
                    '.$form.'
                </div>
            </div>'
        ;
}

function _input_form($id_form_line,$form,$label){
    return 
           '<div class="form-group form-float">
                <div class="form-line" id='.$id_form_line.'>
                    '.$form.'
                    <label class="form-label">'.$label.'</label>
                </div>
            </div>'
        ;
}

function _button($id,$content,$class,$title=''){
     return(array(
            'id'=>$id,
            'content'=>$content,
            'class'=> $class,
            'title'=> $title
        ));
}

function _init_element_input($id, $name, $class, $length='', $placeholder='', $style='',$tambahan=''){
    return(array(
            'id'=>$id,
            'name'=>$name,
            'class'=>$class,
            'maxlength'=>$length,
            'placeholder'=>$placeholder,
            'style'=>$style,
             $tambahan=>'true'
        ));
}

function _option($title2='',$aktif='',$aktif2='',$content=''){
    $ci=& get_instance();
    return array(
        'title'=>'Minimarket CP',
        'title2'=>$title2,
        'aktif'=>$aktif,
        'aktif2'=>$aktif2,
        'loader'=>'v_loader.php',
        'header'=>'v_header.php',
        'user'=>'v_user.php',
        'menu'=>'v_menu.php',
        'footer'=>'v_footer.php',
        'content'=>$content,
        'minput'=>'v_minput.php'
    );
}

function cari_kolom($fields){   
    $i=0;
    $p='';
    while($i<count($fields)) {
            $p=$p."'".trim($fields[$i])."'";
            $p .=',';
            $i++;
    }; 

    $p = RTRIM($p,',');
    return $p;
}

function cari_nilai($fields){   
    $i=0;
    $p='';
    while($i<count($fields)) {
            $p=$p.trim($fields[$i]);
            $p .=',';
            $i++;
    }; 

    $p = RTRIM($p,',');
    return $p;
}


function cari_set_update($fields,$value){   
    $i=0;
    $p='';
    while($i<count($fields)) {
            $p=$p.$fields[$i];
            $p .='=';
            $p=$p."'".trim($value[$i])."'";
            $p .=',';
            $i++;
    }; 

    $p = RTRIM($p,',');
    return $p;
}

function cari_where($fields, $value)
{
    $i = 0;
    $p = '';
    while ($i < count($fields)) {
        $p = $p . trim($fields[$i]);
        $p .= '=';
        $p = $p . "'" . trim($value[$i]) . "'";
        $p .= ' and ';
        $i++;
    };

    $p = RTRIM($p, ' and ');
    return $p;
}

function getId($id,$tabel,$awal,$akhir)
{
	$ci=& get_instance();
    $q = $ci->db->query("select MAX(substr(".$id.",$awal,$akhir)) as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%03s", $tmp);
        }
    }
    else
    {
        $kd = "001";
    }
    return $kd;
}

function satuan(){  
    $ci =& get_instance();
    $q = $ci->db->query(" SELECT KD_SATUAN, NM_SATUAN 
                            FROM tabel_satuan_barang A 
                           ORDER BY KD_SATUAN ASC
                        ")->result();
    return $q;
}

function kategori(){  
    $ci =& get_instance();
    $q = $ci->db->query(" SELECT KD_KATEGORI, NM_KATEGORI 
                            FROM tabel_kategori_barang A 
                           ORDER BY KD_KATEGORI ASC
                        ")->result();
    return $q;
}

function merk(){  
    $ci =& get_instance();
    $q = $ci->db->query(" SELECT KD_MERK, NM_MERK 
                            FROM tabel_merk A 
                           ORDER BY KD_MERK ASC
                        ")->result();
    return $q;
}

function supplier(){  
    $ci =& get_instance();
    $q = $ci->db->query(" SELECT KD_SUPPLIER, NM_SUPPLIER 
                            FROM tabel_supplier A 
                           ORDER BY KD_SUPPLIER ASC
                        ")->result();
    return $q;
}


?>

