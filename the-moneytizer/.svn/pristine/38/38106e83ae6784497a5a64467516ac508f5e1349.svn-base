<div class="accordion" id="accordion_menu_sponsorship">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_sponsorship">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_sponsorship" aria-expanded="true" aria-controls="collapse_menu_sponsorship">
        <i class="bi bi-tags"></i>&nbsp;<?php echo esc_html(__('Parainage','themoneytizer'));?>
        </button>
        </h2>
        <div id="collapse_menu_sponsorship" class="accordion-collapse collapse" aria-labelledby="menu_sponsorship" data-bs-parent="#accordion_menu_sponsorship">
            <div class="accordion-body">
                <h5><?php echo esc_html(__('Code parrainage','themoneytizer'));?></h5>
                <div id="el-intro-6" class="themoneytizer_card">
                    <p class="themoneytizer_no_margin mid-size">
                        <?php echo esc_html(__('TRANSLATION_SPONSORSHIP_DESCRIPTION','themoneytizer'));?><span class="option_required">*</span>
                        <br/>
                        <a class="themoneytizer_link" href="https://<?php echo THEMONEYTIZER_SUBDOMAIN ?>.themoneytizer.com/&sponsor=073b22902f5e7d3c7d6bd7ffdfb36168#inscription" target="_blank"/>https://<?php echo THEMONEYTIZER_SUBDOMAIN ?>.themoneytizer.com/&sponsor=073b22902f5e7d3c7d6bd7ffdfb36168#inscription</a>
                        <br/>
                        <input type="text" id="input_sponsorship" class="sponsorship_code_input themoneytizer_input_w_300" value="<?php echo esc_html(get_option('themoneytizer_user_sponsorship_code')); ?>"/>
                        <button type="button" class="themoneytizer_button" onclick="contentToClipBoard('#input_sponsorship')"><i class="bi bi-clipboard-check"></i></button>
                        <br/><br/>
                        <span class="option_required">*</span><?php echo _e("Pour recevoir vos 15€, votre ami doit avoir généré au moins 1€ grâce à la diffusion des publicités de The Moneytizer. Les commissions ne sont créditées qu'une seule fois, quelque soit le nombre de sites inscrits sur le compte du parrainé.", "themoneytizer"); ?>
                    </p>
                    <p class="themoneytizer_no_margin mid-size">
                    </p>
                </div>
                <?php
                    $sponsored = (array)json_decode(get_option('themoneytizer_data_sponsored'));
                    if(gettype($sponsored) != 'array'){
                        $sponsored = [];
                        }
                ?>
                <!--
                <h5 class="themoneytizer_top_m_40"><?php echo esc_html(__('Filleuls','themoneytizer'));?>&nbsp;(<?php echo sizeof($sponsored) ?>)</h5>
                <div class="themoneytizer_card">
                    <p class="themoneytizer_no_margin mid-size">
                        <?php
                        if(sizeof($sponsored)>0){ ?>
                            <div class="themoneytizer_flex_list_sponsored themoneytizer_bottom_m_20">
                                <div><b><?php echo esc_html(__("Site", "themoneytizer")); ?></b></div>
                                <div><b><?php echo esc_html(__("Status", "themoneytizer")); ?></b></div>
                                <div><b><?php echo esc_html(__("Montant gagné", "themoneytizer")); ?></b></div>
                            </div>
                        <?php } else { ?>
                            <div class="themoneytizer_flex_list_sponsored themoneytizer_card themoneytizer_bottom_m_20">
                                <?php echo esc_html(__("Vous n'avez pas de filleul", "themoneytizer")); ?>
                            </div>
                        <?php }
                        foreach($sponsored as $site) { ?>
                            <div class="themoneytizer_flex_list_sponsored themoneytizer_card themoneytizer_bottom_m_20">
                                <div><?php echo $site->site_url; ?></div>
                                <div><?php echo ($site->site_moderation == 2 ? '<i class="text-danger bi bi-x-circle"></i>' : '<i class="text-success bi bi-check-circle"></i>'); ?></div>
                                <div><?php echo $site->parrainage_montant; ?></div>
                            </div>
                        <?php
                        }
                        ?>
                    </p>
                    <p class="themoneytizer_no_margin mid-size">
                    </p>
                </div>-->
            </div>
        </div>
    </div>
</div>
