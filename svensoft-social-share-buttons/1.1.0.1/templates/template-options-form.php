<h1>Настройка кнопок &laquo;Поделиться в социальных сетях&raquo;</h1>
<hr/>
<div class="shortcode">
    <span class="blue">В шаблоне используйте следующий</span><span class="red"> SHORTCODE</span> <code>[SvenSoftSocialShareButtons]</code>
</div>
<h2>Выберите, какие социальные сети необходимо использовать</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'svensoft_social_share_buttons_option_group' ); ?>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[twitter]" <?php if ( $options['twitter'] ) echo 'checked'; ?> />
        <span class="social-icon icon-twitter"></span>Twitter
    </p>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[facebook]" <?php if ( $options['facebook'] ) echo 'checked'; ?> />
        <span class="social-icon icon-facebook"></span>Facebook
    </p>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[mailru]" <?php if ( $options['mailru'] ) echo 'checked'; ?> />
        <span class="social-icon icon-mailru"></span>Mail.ru
    </p>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[odnoklassniki]" <?php if ( $options['odnoklassniki'] ) echo 'checked'; ?> />
        <span class="social-icon icon-odnoklassniki"></span>Одноклассники
    </p>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[google-plus]" <?php if ( $options['google-plus'] ) echo 'checked'; ?> />
        <span class="social-icon icon-googleplus"></span>Google Plus
    </p>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[vkontakte]" <?php if ( $options['vkontakte'] ) echo 'checked'; ?> />
        <span class="social-icon icon-vkontakte"></span>ВКонтакте
    </p>
    <p>
        <input type="checkbox" name="svensoft_social_share_buttons_option[livejournal]" <?php if ( $options['livejournal'] ) echo 'checked'; ?> />
        <span class="social-icon icon-livejournal"></span>LiveJournal
    </p>
    <p>
        Размер иконок социальных сетей
        <select name="svensoft_social_share_buttons_option[size]">
            <?php if ( isset( $options['size'] ) ) : ?>
                <option value="0" <?php selected( intval( $options['size'] ), 0, true ); ?>>Выберите размер иконок</option>
                <option value="35" <?php selected( intval( $options['size'] ), 35, true ); ?>>35px x 35px</option>
                <option value="65" <?php selected( intval( $options['size'] ), 65, true ); ?>>65px x 65px</option>
            <?php else : ?>
                <option value="0" selected>Выберите размер иконок</option>
                <option value="35">35px x 35px</option>
                <option value="65">65px x 65px</option>
            <?php endif; ?>
        </select>
    </p>
    <p class="submit">
        <input type="submit" class="button-primary"  value="Сохранить настройки" />
    </p>
</form>

