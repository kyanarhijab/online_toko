<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Backend Toko</title>
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.ico'); ?>"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- css -->
    <?php
      for($i=0; $i<count($css); $i++){
          echo "<link href='".$identity['url_css']."$css[$i]' rel='stylesheet'>";
      }
    ?>
</head>
<body style="background-image:url(<?php echo base_url('assets/images/back.jpg'); ?>) ;">
    
    <body class="theme-indigo">
    <!-- Page Loader -->
        <?php include $option['loader']; ?>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
        <?php include $option['header']; ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php include $option['user']; ?>
            <!-- #User Info -->
            <!-- Menu -->
            <?php include $option['menu']; ?>
            <!-- #Menu -->
            <!-- Footer -->
            <?php include $option['footer']; ?>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?php echo $option['title2']; ?></h2>
            </div>
            <?php include $option['content']; ?>
        </div>
    </section>

 <!-- Js -->
    <?php
    for($i=0; $i<count($js); $i++){
        echo "<script src='".$identity['url_js']."$js[$i]'></script>";
    }
    ?>
    
</body>
</html>