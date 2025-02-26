
<div class="input-group-cols">
	<div class="input-col">
		<label for="profession_name"><?php esc_html_e('Stanowisko','ateliercv'); ?>:</label>
		<input type="text"  class="pe-prof-name" id="profession_name" name="atl_cv_profession_name" placeholder="<?php esc_html_e('Stanowisko...','ateliercv'); ?>">
	</div>

	<div class="input-col">
		<label for="profession_city" class="m-4"><?php esc_html_e('Miasto','ateliercv'); ?>:</label>
		<input type="text" class="pe-prof-city" id="profession_city" name="atl_cv_profession_city" placeholder="<?php esc_html_e('Miasto...','ateliercv'); ?>">
	</div>
</div>
<br>

<div class="input-group">
	<label for="employer_name"><?php esc_html_e('Nazwa pracodawcy','ateliercv'); ?>:</label>
	<input type="text" id="employer_name" name="atl_cv_employer_name" placeholder="<?php esc_html_e('Nazwa pracodawcy...','ateliercv'); ?>">
</div>
<br>

<div class="input-group-cols">
	<div class="input-col">
		<label for="start_date"><?php esc_html_e('Data rozpoczęcia','ateliercv'); ?>:</label>
		<input type="date" class="pe-start-date" id="start_date" name="atl_cv_pr_start_date" placeholder="<?php esc_html_e('Data rozpoczęcia...','ateliercv'); ?>">
	</div>

	<div class="input-col">
		<label for="end_date" class="m-4"><?php esc_html_e('Data zakończenia','ateliercv'); ?>:</label>
		<input type="date" class="pe-end-date" id="end_date" name="atl_cv_pr_end_date" placeholder="<?php esc_html_e('Data zakończenia','ateliercv'); ?>">
	</div>
</div>
<div class="check">
    <label for="atl_cv_to_present"></label>
    <input type="checkbox" id="atl_cv_to_present" name="atl_cv_pr_end_date" value="01-01-2040">
    <span class="desc"><?php esc_html_e('Do chwili obecnej','ateliercv'); ?></span>
</div>
<br>

<div class="input-group">
	<label for="pe_desc"><?php esc_html_e('Opis','ateliercv'); ?>:</label>
	<textarea id="pe_desc" name="atl_cv_pr_desc" cols="60" rows="8" placeholder="<?php esc_html_e('Opis...','ateliercv'); ?>"></textarea>
</div>

<br>

