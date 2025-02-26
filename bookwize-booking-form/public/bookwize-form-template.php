<?php
/**
 * Created by PhpStorm.
 * User: araksya.kantikyan
 * Date: 2/6/2016
 * Time: 2:21 μμ
 */
?>
<style type="text/css">
    <?php if(!empty($bwf_input_color)): ?>
    .reservation .fields__item, .reservation-form .form__input {
        background-color: <?php echo $bwf_input_color;?>;
    }

    <?php endif;?>
    <?php if(!empty($bwf_button_color)): ?>
    .reservation .field__item-button--plus, .reservation .field__item-button--minus {
        background: <?php echo $bwf_button_color; ?>;
    }

    .reservation .field__item-button--plus:hover, .reservation .field__item-button--minus:hover {
        background: <?php echo $bwf_button_color; ?>;
        opacity: 0.5;
    }

    <?php endif; ?>
    <?php if(!empty($bwf_small_edition) && ($bwf_small_edition === '1' || $bwf_small_edition === 'true')) :?>
    .reservation .field__item {
        display: none !important;
    }

    <?php endif;?>
    <?php if(!empty($bwf_text_color)): ?>
    .reservation-form .form__input {
        color: <?php echo $bwf_text_color; ?>
    }

    .reservation .list {
        color: <?php echo $bwf_text_color; ?>
    }

    <?php endif;?>
    <?php if(!empty($bwf_text_label_color)): ?>
    .reservation .field__item-label {
        color: <?php echo $bwf_text_label_color; ?>
    }

    <?php endif;?>
    <?php if(!empty($bwf_submit_button_color)): ?>
    .reservation .form__submit {
        background: <?php echo $bwf_submit_button_color; ?>;
    }

    .reservation .form__submit:hover {
        background: <?php echo $bwf_submit_button_color; ?>;
        opacity: 0.5;
    }

    <?php endif;?>

</style>
<?php if (!empty($bwf_custom_style)): ?>
    <style type="text/css">
        <?php echo $bwf_custom_style; ?>
    </style>
<?php endif; ?>

<form action="<?php echo $bwf_hotel_url; ?>" method="get" name="reservation-form"
      class="sidebar__form reservation-form reservation" data-reservation-form
      data-key="<?php echo $bwf_api_key; ?>" target="_blank"
      data-id="<?php echo $bwf_hotel_id; ?>" data-vertical="<?php if (!empty($bwf_horizontal)) {
    echo '1';
} else {
    echo 'false';
} ?>">
    <div class="fields__wrapper"  style="background-color:<?php if (!empty($bwf_background_color)) { echo $bwf_background_color;} ?>">
        <div class="fields__item">
            <div class="form__field form__field--date">
                <label for="check-in" class="field__item-label">
                    <?php echo __('Check-in', 'bookwize-form'); ?>
                </label>
                <input type="text" id="check-in" name="ci" class="form__input check-in-datepicker"
                       data-date="check-in" autocomplete="off" readonly="true"
                       placeholder="<?php echo __('Check-in', 'bookwize-form'); ?>"/>
            </div>
        </div>

        <div class="fields__item">
            <div class="form__field form__field--date">
                <label for="check-out" class="field__item-label">
                    <?php echo __('Check-out', 'bookwize-form'); ?>
                </label>
                <input type="text" id="check-out" name="co" class="form__input check-out-datepicker"
                       data-date="check-out" autocomplete="off" readonly="true"
                       placeholder="<?php echo __('Check-out', 'bookwize-form'); ?>"/>
            </div>
        </div>

        <?php
        echo bwf_render('partials/bookwize-guest-types');
        ?>

        <div class="fields__item field__item" data-field-item id="board"
             data-enable="<?php if (!empty($bwf_board) && ($bwf_board === '1' || $bwf_board === 'true')) {
                 echo 'true';
             } else {
                 echo 'false';
             } ?>">
            <label for="board" class="field__item-label">
                <?php echo __('Board', 'bookwize-form'); ?>
            </label>
            <select name="board" class="board"></select>
        </div>
        <div class="fields__item field__item" data-field-item id="couponCode"
             data-enable="<?php if (!empty($bwf_promo_code) && ($bwf_promo_code === '1' || $bwf_promo_code === 'true')) {
                 echo 'true';
             } else {
                 echo 'false';
             } ?>">
            <label for="couponCode" class="field__item-label">
                <?php echo __('Coupon Code', 'bookwize-form'); ?>
            </label>
            <input type="text" name="couponCode" value=""
                   placeholder="<?php echo __('Coupon Code', 'bookwize-form'); ?>">
        </div>
        <input type="hidden" name="r" data-guests/>
        <input type="hidden" name="linkerParam" value="" class="linkerParam"/>
        <div class="form__input__container">
            <input type="submit" class="form__submit" value="<?php echo __('Book Now', 'bookwize-form'); ?>"/>
        </div>
    </div>
</form>