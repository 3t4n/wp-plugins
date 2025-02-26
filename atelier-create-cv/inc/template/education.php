
<div class="input-group-cols">

    <div class="input-col">
        <label for="atl_degree_level"><?php esc_html_e('Stopień','ateliercv'); ?>:</label>
        <input type="text" class="atl-degree-level" id="atl_degree_level" name="atl_degree_level" placeholder="<?php esc_html_e('Stopień...','ateliercv'); ?>">
    </div>

    <div class="input-col">
        <label for="qf_city" class="m-4"><?php esc_html_e('Miasto','ateliercv'); ?>:</label>
        <input type="text" class="qf-city" id="qf_city" name="atl_cv_qf_city" placeholder="<?php esc_html_e('Miasto...','ateliercv'); ?>">
    </div>
</div>
<br>

<div class="input-group">
    <label for="qf_school"><?php esc_html_e('Szkoła','ateliercv'); ?>:</label>
    <input type="text" id="qf_school" name="atl_cv_qf_school" placeholder="<?php esc_html_e('Szkoła...','ateliercv'); ?>">
</div>
<br>

<div class="input-group-cols">
    <div class="input-col">
        <label for="qf_start_date"><?php esc_html_e('Data rozpoczęcia','ateliercv'); ?>:</label>
        <input type="date" class="qf-start-date" id="qf_start_date" name="qf_start_date" placeholder="<?php esc_html_e('Data rozpoczęcia...','ateliercv'); ?>">
    </div>
    <div class="input-col">
        <label for="qf_end_date" class="m-4"><?php esc_html_e('Data zakończenia...','ateliercv'); ?>:</label>
        <input type="date" class="qf-end-date" id="qf_end_date" name="qf_end_date" placeholder="<?php esc_html_e('Data zakończenia...','ateliercv'); ?>">
    </div>
</div>
<br>

<div class="input-group">
    <label for="qf_desc"><?php esc_html_e('Opis','ateliercv'); ?></label>
    <textarea id="qf_desc" name="qf_desc" cols="60" rows="8"></textarea>
</div>

<br>

<h2><?php esc_html_e('Języki','ateliercv'); ?></h2>
<div class="input-group-cols">
    <div class="input-col">
        <label for="qf_languages"><?php esc_html_e('Język','ateliercv'); ?></label>
        <input type="text" id="qf_languages" name="atl_cv_qf_languages">
    </div>

    <div class="input-col">
        <label for="qf_languages_lvl"><?php esc_html_e('Poziom','ateliercv'); ?></label>
        <input type="text" id="qf_languages_lvl" name="atl_cv_qf_languages_lvl">
    </div>
</div>

<h2><?php esc_html_e('Certyfikaty, Kursy','ateliercv'); ?></h2>

<div class="input-group">
    <label for="qf_curses"><?php esc_html_e('Kurs,certyfikat','ateliercv'); ?></label>
    <input type="text" id="qf_curses" name="atl_cv_qf_curses">
</div>

