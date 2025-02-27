
<?php if ( empty($has_cat) || empty($image) ) : ?>

    <?php echo __('Please select a category with an image.', 'echelon-so'); ?>

<?php else : ?>

    <a href="<?php echo $link; ?>">

        <div class="eso-category-box-wrap eso-category-box-badge uk-transition-toggle uk-position-relative">

            <div class="eso-category-box-image uk-overflow-hidden">
                <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image;?>">
            </div>

            <div class="eso-badge-wrap uk-position-bottom uk-margin-medium-bottom">

                <?php if ( !empty($name_visibility) ) : ?>

                    <div class="eso-category-box-name <?php echo esc_attr(implode(' ', $name_class)); ?>">
                        <?php echo $name; ?>
                    </div>

                <?php endif; ?>

                <?php if ( !empty($count_visibility) || !empty($count_visibility_label) ) : ?>

                    <div class="eso-category-box-count <?php echo esc_attr(implode(' ', $count_class)); ?>">

                        <?php if ( !empty($count_visibility) ) : ?>

                            <?php echo $count; ?>

                        <?php endif ;?>

                        <?php if ( !empty($count_visibility_label) ) : ?>

                            <?php echo esc_html($count_label); ?>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </a>

<?php endif; ?>
