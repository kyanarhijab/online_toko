<div class="user-info">
    <div class="image">
        <img src="<?php echo 'assets/images/find_user.png'; ?>" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->session->userdata('nama')?> - <?php echo $this->session->userdata('akses')?>
        </div>
        <div class="email" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->session->userdata('toko')?>
        </div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="<?php echo site_url('Welcome/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
            </ul>
        </div>
    </div>
</div>