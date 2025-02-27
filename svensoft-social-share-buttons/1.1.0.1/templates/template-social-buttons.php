<ul class="svensoft-social-buttons-list-<?php echo ( intval( $options['size'] ) ) ? $options['size'] : '35'; ?> share-buttons-list">
    <li class="svensoft-social-share-info">
        <div class="title"><?php echo $title; ?></div>
        <div class="image-share"><?php echo $image_share; ?></div>
        <div class="excerpt"><?php echo $excerpt; ?></div>
    </li>
    <?php
        if ( isset( $options['facebook'] ) ) :
    ?>
            <li><a target="_blank" href="http://www.facebook.com/sharer.php?s=100&url=http://<?php echo $url; ?>" class="facebook-social" title="Поделиться в Facebook">Facebook</a></li>
    <?php
        endif;
        if ( isset( $options['twitter'] ) ) :
    ?>
            <li><a target="_blank" href="http://twitter.com/share?url=http://<?php echo $url;?>" class="twitter-social" title="Поделиться в Twitter">Twitter</a></li>
    <?php
        endif;
        if ( isset( $options['vkontakte'] ) ) :
    ?>
            <li><a target="_blank" href="http://vkontakte.ru/share.php?url=http://<?php echo $url;?>" class="vkontakte-social" title="Поделиться ВКонтакте"">ВКонтакте</a></li>
    <?php
        endif;
        if ( isset( $options['odnoklassniki'] ) ) :
    ?>
            <li><a target="_blank" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=http://<?php echo $url; ?>" class="odnoklassniki-social" title="Поделиться в Одноклассники">Одноклассники</a></li>
    <?php
        endif;
        if ( isset( $options['mailru'] ) ) :
    ?>
            <li><a target="_blank" href="http://connect.mail.ru/share?url=http://<?php echo $url;?>" class="mailru-social" title="Поделиться в Mail.ru">Mail.ru</a></li>
    <?php
        endif;
        if ( isset( $options['google-plus'] ) ) :
    ?>
            <li><a target="_blank" href="https://plus.google.com/share?url=http://<?php echo $url; ?>" class="googleplus-social" title="Поделиться в Google+">Google+</a></li>
    <?php
        endif;
        if ( isset( $options['livejournal'] ) ) :
    ?>
            <li><a target="_blank" href="http://livejournal.com/update.bml?url=http://<?php echo $url; ?>" class="livejournal-social" title="Поделиться в LiveJournal">Livejournal</a></li>
    <?php
        endif;
    ?>

</ul>