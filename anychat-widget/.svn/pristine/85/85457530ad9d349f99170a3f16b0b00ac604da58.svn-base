<div id="anychat-plugin-container">
    <div class="anychat-masthead">
        <div class="anychat-masthead__inside-container">
            <div class="anychat-masthead__logo-container">
                <?php echo esc_html__('AnyChat - all-in-one support button', 'anychat') ?>
            </div>
        </div>
    </div>
    <div class="anychat-body">
        <?php if ($success){?>
            <div class="ui success message">
                <?php echo esc_html($success) ?>
            </div>
        <?php } ?>
        <?php if ($errors){?>
            <?php foreach ($errors as $fieldErrors){?>
                <?php foreach ($fieldErrors as $error){?>
                    <div class="ui negative message">
                        <?php echo esc_html($error) ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <div class="ui stackable grid">
            <div class="four wide column">
                <div class="ui vertical fluid pointing menu" id="anychat-menu">
                    <a class="item <?php echo ($activeSubmit == 'AnyChatConfigGeneral' || empty($activeSubmit))? 'active' : '' ?>" data-target="#anychat-general">
                        <?php echo esc_html__('General configuration', 'anychat') ?>
                    </a>
                    <a class="item" data-target="#anychat-setup">
                        <?php echo esc_html__('How to setup', 'anychat') ?>
                    </a>
                    <a class="item" href="https://docs.anychat.one/" target="_blank">
                        <?php echo esc_html__('Documentation', 'anychat') ?>
                        <span class="arcu-icon-svg">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-external-link fa-w-16 fa-2x"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM474.67,0H316a28,28,0,0,0-28,28V46.71A28,28,0,0,0,316.79,73.9L384,72,135.06,319.09l-.06.06a24,24,0,0,0,0,33.94l23.94,23.85.06.06a24,24,0,0,0,33.91-.09L440,128l-1.88,67.22V196a28,28,0,0,0,28,28H484a28,28,0,0,0,28-28V37.33h0A37.33,37.33,0,0,0,474.67,0Z" class=""></path></svg>
                        </span>
                    </a>
                    <a class="item" id="anychat-about-tab" data-target="#anychat-about">
                        <?php echo esc_html__('About', 'anychat') ?>
                    </a>
                </div>
            </div>
            <div class="twelve wide stretched column" id="anychat-tabs">
                <span class="hidden"></span>
                <?php echo AnyChatAdmin::render('/admin/_general.php', array(
                    'generalConfig' => $generalConfig,
                    'activeSubmit' => $activeSubmit
                )) ?>
                <?php echo AnyChatAdmin::render('/admin/_setup.php') ?>
                <?php echo AnyChatAdmin::render('/admin/_about.php') ?>
                <span class="hidden"></span>
            </div>
        </div>
    </div>
</div>