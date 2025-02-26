<form id="<?php echo esc_attr($form['id']) ?>" method="POST" class="ui form">
    <?php wp_nonce_field(AnyChatAdmin::NONCE) ?>
    <?php foreach ($fields as $attr => $params){?>
        <div class="field <?php echo esc_attr($params['form_group_class']) ?>">
            <?php if ($params['type'] == 'switch'){ ?>
                <div class="ui toggle checkbox">
                    <input id="<?php echo esc_attr($params['id']) ?>_OFF" name="<?php echo esc_attr($params['name']) ?>" value="0" tabindex="0" autocomplete="off" class="hidden" type="hidden">
                    <input id="<?php echo esc_attr($params['id']) ?>" name="<?php echo esc_attr($params['name']) ?>" value="1" tabindex="0" autocomplete="off" <?php echo $params['value']? 'checked="true"' : '' ?> class="hidden" type="checkbox">
                    <label for="<?php echo esc_attr($params['id']) ?>"><?php echo esc_html($params['label']) ?></label>
                </div>
            <?php } ?>
            <?php if ($params['type'] == 'text'){ ?>
                <label for="<?php echo esc_attr($params['id']) ?>"><?php echo esc_html($params['label']) ?></label>
                <?php if ($params['suffix']){?>
                    <div class="ui right labeled input">
                        <input id="<?php echo esc_attr($params['id']) ?>" name="<?php echo esc_attr($params['name']) ?>" value="<?php echo esc_attr($params['value']) ?>" placeholder="<?php echo esc_attr($params['placeholder']) ?>" type="text">
                        <div class="ui basic label"><?php echo esc_html($params['suffix']) ?></div>
                    </div>
                <?php }else{ ?>
                    <?php if ($params['lang'] && $wpml) { ?>
                        <div class="ui grid arcu-lang-group">
                            <div class="sixteen column row">
                                <div class="fourteen wide column arcu-lang-content">
                                    <?php foreach($languages as $k => $lang) {?>
                                    <div data-lang-id="<?php echo esc_attr($lang['id']) ?>" data-lang-code="<?php echo esc_attr($lang['language_code']) ?>" class="arcu-lang-field <?php echo ($k == $defaultLang)? 'active' : 'hidden' ?>">
                                        <input id="<?php echo esc_attr($params['id']) ?><?php echo ($k == $defaultLang)? '' : esc_attr('_' . $k) ?>" data-lang-id="<?php echo esc_attr($lang['id']) ?>" data-lang-code="<?php echo esc_attr($lang['language_code']) ?>" name="<?php echo esc_attr($params['name']) ?><?php echo ('[' . esc_attr($k) . ']') ?>" 
                                                <?php if (is_array($params['value'])){?>
                                                    value="<?php echo esc_attr($params['value'][$k]) ?>" 
                                                <?php }elseif(is_object($params['value'])){ ?>
                                                    value="<?php echo esc_attr($params['value']->$k) ?>" 
                                                <?php }else{ ?>
                                                    value="<?php echo esc_attr($params['value']) ?>" 
                                                <?php } ?>
                                               placeholder="<?php echo esc_attr($params['placeholder']) ?>" type="text">
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="two wide column arcu-lang">
                                    <div class="ui inline dropdown button">
                                        <div class="text">
                                            <img class="ui image" src="<?php echo esc_url($languages[$defaultLang]['country_flag_url']) ?>">
                                            <?php echo esc_html($languages[$defaultLang]['language_code']) ?>
                                        </div>
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                        <?php foreach($languages as $k => $lang) {?>
                                            <div class="item <?php echo ($k == $defaultLang)? 'active selected' : '' ?>" data-lang-code="<?php echo esc_attr($lang['language_code']) ?>" onclick="arCU.switchLang('<?php echo esc_attr($lang['language_code']) ?>');">
                                                <img class="ui image" src="<?php echo esc_url($lang['country_flag_url']) ?>">
                                                <?php echo esc_html($lang['language_code']) ?>
                                            </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <?php if (is_array($params['value'])){
                            $fieldValue = reset($params['value']);
                        }else{
                            $fieldValue = $params['value'];
                        } ?>
                        <input id="<?php echo esc_attr($params['id']) ?>" name="<?php echo esc_attr($params['name']) ?>" value="<?php echo esc_attr($fieldValue) ?>" placeholder="<?php echo esc_attr($params['placeholder']) ?>" type="text">
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <?php if ($params['type'] == 'textarea'){ ?>
                <label for="<?php echo esc_attr($params['id']) ?>"><?php echo esc_html($params['label']) ?></label>
                <?php if ($params['lang'] && $wpml) { ?>
                    <div class="ui grid arcu-lang-group">
                        <div class="sixteen column row">
                            <div class="fourteen wide column arcu-lang-content">
                                <?php foreach($languages as $k => $lang) {?>
                                <div data-lang-id="<?php echo esc_attr($lang['id']) ?>" data-lang-code="<?php echo esc_attr($lang['language_code']) ?>" class="arcu-lang-field <?php echo ($k == $defaultLang)? 'active' : 'hidden' ?>">
                                    <textarea data-lang-id="<?php echo esc_attr($lang['id']) ?>" data-lang-code="<?php echo esc_attr($lang['language_code']) ?>" rows="3" id="<?php echo esc_attr($params['id']) ?><?php echo ($k == $defaultLang)? '' : esc_attr('_' . $k) ?>" name="<?php echo esc_attr($params['name']) ?><?php echo ('[' . esc_attr($k) . ']') ?>" 
                                        placeholder="<?php echo esc_attr($params['placeholder']) ?>"><?php if (is_array($params['value'])){?><?php echo esc_html($params['value'][$k]) ?><?php }elseif(is_object($params['value'])){ ?><?php echo esc_html($params['value']->$k) ?><?php }else{ ?><?php echo esc_html($params['value']) ?><?php } ?></textarea>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="two wide column arcu-lang">
                                <div class="ui inline dropdown button">
                                    <div class="text">
                                        <img class="ui image" src="<?php echo esc_url($languages[$defaultLang]['country_flag_url']) ?>">
                                        <?php echo esc_html($languages[$defaultLang]['language_code']) ?>
                                    </div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                    <?php foreach($languages as $k => $lang) {?>
                                        <div class="item <?php echo ($k == $defaultLang)? 'active selected' : '' ?>" data-lang-code="<?php echo esc_attr($lang['language_code']) ?>" onclick="arCU.switchLang('<?php echo esc_attr($lang['language_code']) ?>');">
                                            <img class="ui image" src="<?php echo esc_url($lang['country_flag_url']) ?>">
                                            <?php echo esc_html($lang['language_code']) ?>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <?php if (is_array($params['value'])){
                        $fieldValue = reset($params['value']);
                    }else{
                        $fieldValue = $params['value'];
                    } ?>
                    <textarea rows="3" id="<?php echo esc_attr($params['id']) ?>" name="<?php echo esc_attr($params['name']) ?>" placeholder="<?php echo esc_attr($params['placeholder']) ?>"><?php echo esc_html($fieldValue) ?></textarea>
                <?php } ?>
            <?php } ?>
            <?php if ($params['type'] == 'html'){ ?>
                <?php echo wp_kses($params['html_content'], array(
                    'div' => array(
                        'class' => array(),
                        'id' => array(),
                        'data-value' => array()
                    ),
                    'input' => array(
                        'value' => array(),
                        'name' => array(),
                        'type' => array(),
                        'id' => array()
                    ),
                    'img' => array(
                        'class' => array(),
                        'src' => array()
                    )
                )) ?>
            <?php } ?>
            <?php if ($params['desc']){?>
                <div class="help-block">
                    <?php echo esc_html($params['desc']) ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="text-right">
        <input name="<?php echo esc_attr($form['id']) ?>" class="button button-primary button-large" value="<?php echo esc_html__('Save', 'anychat') ?>" type="submit" />
    </div>
</form>