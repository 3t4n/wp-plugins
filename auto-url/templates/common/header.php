<div class="wrap">
    <h2>Auto URL</h2>
    <fieldset>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="KV4F86WK8GLLU">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="vertical-align:middle;">
            <span>to Support My Drinking Habit</span>
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </fieldset>
    <form method="post" action="<?php echo $url;?>">
        <?php if(!empty($message)){?>
        <div id="message" class="updated below-h2">
            <p><?php echo $message;?></p>
        </div>
        <?php } ?>