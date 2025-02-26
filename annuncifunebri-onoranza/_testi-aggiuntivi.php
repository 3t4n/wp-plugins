<?php $campiTesto = annfu_get_testi_aggiuntivi(); ?>
<?php foreach ($campiTesto as $k => $v): ?>
    <div class="annfu_form_row">
        <p><?php echo $v ?></p>
        <?php wp_editor(get_option('annfu_' . $k), 'annfu_'.$k, ['textarea_name' => 'annfu_'.$k, 'rows' => 10]) ?>
    </div>
<?php endforeach; ?>
<input type="submit" value="<?php echo __('Salva testi personalizzati', 'af') ?>" class="button button-primary" id="submit" name="submit">
