<?php

class ARB_EXP_Templates
{
    public function arb_exp_formView($text, $width, $height, $shortcode, $type, $id)
    {
        $view = "<div><label>Arbitrage Mirror:</label>"
            . "<textarea readonly class='text-iframe' name='text[]'>" . $text . "</textarea>"
            . "</div>"
            . "<div><label>Arbitrage view:</label> <p class='text-hide'>View type - advanced.</p>"
            . "<select class='type' name='type[]'>"
            . "<option value='0'>View basic</option>";
            if ($type == 1){
                $view .= "<option selected value='1'>View advaced</option>";
            }
            else{
                $view .= "<option value='1'>View advaced</option>";
            }
        $view .= "</select></div>"
            . "<div><label>Width:</label>"
            . "<input class='width-in' type='text' name='width[]' value='" . $width . "'>"
            . "<p>Choose width of the arbitrage table.</p></div>"
            . "<div><label>Height:</label>"
            . "<input class='height-in' type='text' name='height[]' value='" . $height . "'>"
            . "<p>Choose height of the arbitrage table.</p></div>"
            . "<div>"
            . "<label>Shortcode:</label>"
            . "<input readonly type='text' name='shortcode[]' value='" . $shortcode . "'>"
            . "<p>Copy short code and paste it on any page or post, where you'd like the widget to be displayed.</p> "
            . "</div>"
            . "<div><label>ID Widget:</label>"
            . "<input readonly type='text' name='' value='" . $id . "'>"
            .  "<p>Copy widget ID and paste it inside the widget.</p></div>";
        return $view;
    }

    public function arb_exp_constructForm()
    {
        $manage = new ARB_EXP_Helpers();
        $iframe = $manage->arb_exp_getIframe();
        $iframeDef = $manage->arb_exp_getIframeDefault();

        ?>

        <main class="o-main">
            <form action="" method='post'>
                <div class="o-container">
                    <div class="o-section">
                        <div id="tabs" class="c-tabs no-js">
                            <div class="c-tabs-nav">
                                <?php foreach ($iframe as $key => $value) { ?>
                                    <a href="#" class="c-tabs-nav__link <?php if ($key == 0) echo 'is-active'; ?>">
                                        <span>Mirror <?php echo $key + 1 ?></span>
                                        <div class="close-tab"></div>
                                    </a>
                                <?php } ?>
                            </div>

                            <?php foreach ($iframe as $key => $value) {
                                $id_if = $key + 1;
                                $shortcode = '[shortcode_arbitrage id="'. $id_if .'" type="'. $value['type_iframe'] .'"]';
                                $type = $value['type_iframe'];
                                ?>
                                <div style="display: none" class="c-tab <?php if ($key == 0) echo 'is-active'; ?>">
                                    <div class="c-tab__content">
                                        <?php echo $this->arb_exp_formView($value['text'], $value['width'], $value['height'], $shortcode, $type, $value['id']); ?>

                                        <div class="bottom-text">To store new mirror, click on the save link.</div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <input class="button button-primary button-large" type='submit' value='Save'>
                    </div>
                </div>
            </form>
        </main>

    <?php }

    public function arb_exp_formViewDefault($text, $width, $height)
    {
        $view = "<div class='def-iframe'>"
            . "<div><label>Iframe</label>"
            . "<textarea  name='iframe1'></textarea>"
            . "<div><label>Width</label>"
            . "<input type='hidden' name='h-iframe1'>"
            . "<label>Iframe2</label>"
            . "<textarea  name='iframe2' name='h-iframe2'></textarea>";
        return $view;
    }
}

?>