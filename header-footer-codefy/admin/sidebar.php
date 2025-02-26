<?php
/**
* Donations Sidebar
*/
?>

    <div class="row">
        <div class="banner">
           <div class="rw">
                <img src="<?php echo $this->plugin->url . '/admin/img/logo.png' ;?>" class="logorw">
                <p class="text-center"><?php _e("We'd love to talk", $this->plugin->name) ?></p>
                <p class="text-center"><a href="http://www.rwstudio.com.br">rwstudio.com.br</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="banner coffee clearfix">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <img src="<?php echo $this->plugin->url . '/admin/img/mug.png' ;?>" class="mug img-responsive">
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12 no">
                <p><?php _e('Buy us a coffee!', $this->plugin->name) ?></p>
                <p><small><?php _e('Support us:', $this->plugin->name) ?></small></p>

                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="8ZF9EYPJ5TAF8">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal">
					<img alt="Paypal" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

            </div>
        </div>
    </div>  