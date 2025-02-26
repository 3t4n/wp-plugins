<div class="widget">

<?php if ($this->aviasales_value($instance, 'widget_title')) { ?>
<h2 class="aviasales_widget_title"<?php echo $instance['title_color'] ? ' style="color: ' . $instance['title_color'] . '"' : ''; ?>><?php echo $instance['widget_title']; ?></h2>
<?php } ?>

<div class="aviasales_widget aviasales_widget_<?php echo $instance['widget_width'] ? $instance['widget_width'] : 'slim' ; ?> aviasales_widget_<?php echo $instance['widget_lang']; ?>" style="<?php

echo 'background-color: ' . ( $instance['background_color'] ? $instance['background_color'] : '#fff' ) . ';' ;
echo ' border: 1px solid ' . ( $instance['border_color'] ? $instance['border_color'] : '#ccc' ) . ';' ;
echo ' color: ' . ( $instance['text_color'] ? $instance['text_color'] : '#000' ) . ';' ;

?>">

<form accept-charset="UTF-8" action="<?php echo $instance['white_label'] ? 'http://' . $instance['white_label'] . '/searches/new' : $this->aviasales_translate($instance, 'search_url'); ?>" method="get" target="_blank" id="aviasales_search" class="aviasales_form">

    <input name="utf8" type="hidden" value="✓" />
    <input name="currency" type="hidden" value="<?php echo $instance['currency']; ?>" />
    <input id="marker" name="marker" type="hidden" value="<?php echo $instance['affiliate_id']; ?>" />
    <input id="origin_iata" name="origin_iata" type="hidden" value="" />
    <input id="destination_iata" name="destination_iata" type="hidden" value="" />
    <input id="is_show_hotels" name="show_hotels" type="hidden" value="<?php echo $this->aviasales_value($instance, 'show_hotels') ? 'true' : 'false'; ?>" />
    <input id="with_request" name="with_request" type="hidden" value="true" />

    <?php echo $this->aviasales_logo($instance, 'top'); ?>

    <div class="aviasales_field_block aviasales_origin">
            <label for="origin_name"><?php echo $this->aviasales_translate($instance, 'origin'); ?></label>
            <div class="aviasales_field">
                <input type="text" name="origin" id="origin_name" placeholder="<?php echo $this->aviasales_translate($instance, 'origin_placeholder'); ?>" autocomplete="off" />
            </div>
        </div>

        <div class="aviasales_swap"></div>

        <div class="aviasales_field_block aviasales_destination">
            <label for="destination_name"><?php echo $this->aviasales_translate($instance, 'destination'); ?></label>
            <div class="aviasales_field">
                <input type="text" name="destination" id="destination_name" placeholder="<?php echo $this->aviasales_translate($instance, 'destination_placeholder'); ?>" autocomplete="off" />
            </div>
        </div>

        <div class="aviasales_field_block aviasales_departure">
            <label for="depart_date"><?php echo $this->aviasales_translate($instance, 'date_depart'); ?></label><label for="range" class="aviasales_checkbox aviasales_range"><input type="checkbox" id="range" name="range" autocomplete="off" /><?php echo $this->aviasales_translate($instance, 'range'); ?></label>
            <div class="aviasales_field aviasales_calendar">
                <input type="text" name="depart_date" id="depart_date" autocomplete="off" />
            </div>
        </div>

        <div class="aviasales_field_block aviasales_return">
            <label for="oneway" class="aviasales_checkbox aviasales_oneway"><input type="checkbox" id="oneway" name="oneway" autocomplete="off" /><?php echo $this->aviasales_translate($instance, 'oneway'); ?></label>
            <div class="aviasales_field aviasales_calendar">
                <input type="text" name="return_date" id="return_date" autocomplete="off" />
            </div>
        </div>

        <div class="clearblock"></div>

        <div class="aviasales_passenger aviasales_field_block">
            <label><?php echo $this->aviasales_translate($instance, 'passengers'); ?></label>

            <div class="aviasales_adult">
                <div class="aviasales_ico"></div>
                <div class="aviasales_select">
                    <span>1</span>
                    <select name="adults" id="adults" autocomplete="off">
                        <option selected="selected" value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
            </div>

            <div class="aviasales_child">
                <div class="aviasales_ico"></div>
                <div class="aviasales_select tiny">
                    <span>0</span>
                    <select name="children" id="children" autocomplete="off">
                        <option selected="selected" value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
            </div>

            <?php if ('slim' == $instance['widget_width'] || 'ultraslim' == $instance['widget_width']) { ?>
            <div class="aviasales_class aviasales_field_block">

                <label><?php echo $this->aviasales_translate($instance, 'class'); ?></label>

                <div class="aviasales_select medium">
                    <span><?php echo $this->aviasales_translate($instance, 'class_econom'); ?></span>
                    <select name="trip_class" id="trip_class" autocomplete="off">
                        <option selected="selected" value="0"><?php echo $this->aviasales_translate($instance, 'class_econom'); ?></option>
                        <option value="1"><?php echo $this->aviasales_translate($instance, 'class_business'); ?></option>
                    </select>
                </div>

            </div>
            <?php } ?>

            <div class="aviasales_infant">
                <div class="aviasales_ico"></div>
                <div class="aviasales_select tiny">
                    <span>0</span>
                    <select name="infants" id="infants" autocomplete="off">
                        <option selected="selected" value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
            </div>

        </div>

        <?php if ('wide' == $instance['widget_width'] || 'medium' == $instance['widget_width']) { ?>
        <div class="aviasales_class aviasales_field_block">

            <label><?php echo $this->aviasales_translate($instance, 'class'); ?></label>

            <div class="aviasales_select big">
                <span><?php echo $this->aviasales_translate($instance, 'class_econom'); ?></span>
                <select name="trip_class" id="trip_class" autocomplete="off">
                    <option selected="selected" value="0"><?php echo $this->aviasales_translate($instance, 'class_econom'); ?></option>
                    <option value="1"><?php echo $this->aviasales_translate($instance, 'class_business'); ?></option>
                </select>
            </div>

        </div>
        <?php } ?>

        <?php echo $this->aviasales_logo($instance, 'bottom'); ?>

        <div class="aviasales_submit">
            <input type="submit" value="" />
        </div>

        <div class="clearblock"></div>

    </form>

</div><!-- s|m|xxl --></div><!-- wrap -->