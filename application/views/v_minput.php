<div class="row clearfix hide" id="form_add_input">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-blue">
                <h2>
                    <?php echo $option['title2']; ?>
                    <small></small>
                </h2>
            </div>
            <div class="body">
                <form id="fm_add" role="form" method="post">
                    <?php
                        for($i=0; $i<count($input); $i++){
                              echo $input[$i];
                        }
                    ?>

                    <br>
                    <?php
                        for($i=0; $i<count($button2); $i++){
                              echo $button2[$i];
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>