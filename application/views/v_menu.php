<div class="menu">

    <ul class="list">

        <li class="header">MAIN NAVIGATION</li>

        <li class="<?php echo menuaktif('Home',$option['aktif']); ?>">

            <a href="<?php echo site_url('Welcome'); ?>">

                <i class="material-icons">dashboard</i>

                <span>Home</span>

            </a>

        </li>

        <li class="<?php echo menuaktif('Master',$option['aktif']); ?>">

            <a href="javascript:void(0);" class="menu-toggle">

                <i class="material-icons">assignment</i>

                <span>Master</span>

            </a>

            <ul class="ml-menu">

                <li  class="<?php echo menuaktif('M_Kat',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_katbrg'); ?>">Kategori Barang</a>

                </li>

                <li  class="<?php echo menuaktif('M_Sat',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_satuan'); ?>">Satuan </a>

                </li>

                <li  class="<?php echo menuaktif('M_Brg',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_brg'); ?>">Barang</a>

                </li>

                <li  class="<?php echo menuaktif('M_Sup',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_sup'); ?>">Supplier</a>

                </li>

                <li  class="<?php echo menuaktif('M_Sales',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_sales'); ?>">Sales</a>

                </li>

                <li  class="<?php echo menuaktif('M_Carkim',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_carkim'); ?>">Cara Kirim</a>

                </li>

                <li  class="<?php echo menuaktif('M_Carpem',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_carpem'); ?>">Cara Pembayaran</a>

                </li>

                <li  class="<?php echo menuaktif('M_merk',$option['aktif2']); ?>">

                    <a href="<?php echo site_url('Master_merk'); ?>">Merk</a>

                </li>

            </ul>

        </li>

        <li>

            <a href="<?php echo site_url('Welcome/logout'); ?>">

                <i class="material-icons">input</i>

                <span>Sign Out</span>

            </a>

        </li>

    </ul>

</div>