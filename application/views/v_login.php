<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Toko</title>
    <!-- Favicon-->
    <!--  <link rel="icon" href="../../favicon.ico" type="image/x-icon"> -->
    <!-- css -->
    <?php
      for($i=0; $i<count($css); $i++){
          echo "<link href='".$identity['url_css']."$css[$i]' rel='stylesheet'>";
      }
    ?>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a>Backend<b>Toko</b></a>
            <small>Selamat Datang di Backend Toko</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="fLogin" role="form">
                    <div class="msg"></div>
                    <!-- Form Input -->
                 <?php
                      for($i=0; $i<count($input); $i++){
                             echo $input[$i];
                   }
                    ?>
                
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Form Button -->
                            <?php echo $button ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Js -->
    <?php
    for($i=0; $i<count($js); $i++){
        echo "<script src='".$identity['url_js']."$js[$i]'></script>";
    }
    ?>

</body>

</html>