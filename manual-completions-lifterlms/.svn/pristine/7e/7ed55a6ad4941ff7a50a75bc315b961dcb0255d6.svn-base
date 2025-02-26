<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
		<div id="manual_completions_lifter" class="manual_completions_lifter">
			<h2>
				<img style="margin-right: 10px;" src="<?php echo esc_url(plugin_dir_url(__FILE__)."img/icon_30x30.png"); ?>"/>
				Manual Completions for LifterLMS
			</h2>
			<hr>
			<table>
				<tr id="upload_csv">
					<td style="min-width: 100px"><?php esc_html_e('File', 'manual-completions-lifterlms') ?></td>
					<td>
						<?php
						if(!empty($upload_error)) {
							?>
							<div style="color: red">
								<?php echo esc_html($upload_error); ?>
							</div>
							<?php
						}
						?>
						<form  method="post" enctype="multipart/form-data"><input type="file" name="completions_file">
						<?php wp_nonce_field('manual_completions_lifter_csv', 'manual_completions_lifter_csv_nonce'); ?>
						<input type="submit" name="manual_completions_lifter" value="Upload">
						</form>
						<div>
							<?php esc_html_e("Upload a CSV file (expected columns: user_id, user_email, user_login, course_id, section_id, lesson_id, quiz_id) or select the options from below. Only one of user_id, user_email or user_login is required to identify the user.", "manual-completions-lifterlms"); ?>
							<a href="<?php echo esc_url(plugins_url("/vendor/example.csv", __FILE__)); ?>"><?php esc_html_e('Example CSV', 'manual-completions-lifterlms') ?></a>
							<br><br>
						</div>
					</td>
				</tr>
				<tr id="course">
					<td style="min-width: 100px"><?php esc_html_e("Course", "manual-completions-lifterlms"); ?></td>
					<td style="min-width: 400px">
						<select class="en_select2" id="course_id" name="course_id" onchange="manual_completions_lifter_course_selected(this)">
							<option value=""><?php esc_html_e("-- SELECT --", "manual-completions-lifterlms"); ?></option>
							<?php foreach ($courses as $key => $course): ?>
								<option value="<?php echo absint($course->ID); ?>"><?php echo esc_html($course->post_title); ?></option>
							<?php endforeach ?>
						</select>
						<div class="" id="gb_loading_animation" style="display:none;">
							<span class="dashicons dashicons-update"></span>
						</div>
					</td>
				</tr>
				<tr id="section" style="display: none;" onchange="manual_completions_lifter_section_selected(this)">
					<td><?php esc_html_e("Section", 'manual-completions-lifterlms') ?></td>
					<td>
						<select class="en_select2" id="section_id" name="section_id">
							<option value=""><?php esc_html_e("-- SELECT --", "manual-completions-lifterlms"); ?></option>
							<option value="all"><?php esc_html_e("-- Entire Course --", "manual-completions-lifterlms"); ?></option>
						</select>
					</td>
				</tr>
				<tr id="lesson" style="display: none;" onchange="manual_completions_lifter_lesson_selected(this)">
					<td><?php esc_html_e("Lesson", 'manual-completions-lifterlms') ?></td>
					<td>
						<select class="en_select2" id="lesson_id" name="lesson_id">
							<option value=""><?php esc_html_e("-- SELECT --", "manual-completions-lifterlms"); ?></option>
							<option value="all"><?php esc_html_e("-- Entire Section --", "manual-completions-lifterlms"); ?></option>
						</select>
					</td>
				</tr>
				<tr id="quiz" style="display: none;">
					<td><?php esc_html_e("Quiz", "manual-completions-lifterlms") ?></td>
					<td>
						<select class="en_select2" id="quiz_id" name="quiz_id" onchange="manual_completions_lifter_quiz_selected(this)">
							<option value=""><?php esc_html_e("-- SELECT --", "manual-completions-lifterlms"); ?></option>
						</select>
					</td>
				</tr>
				<tr id="users" style="display: none;">
					<td><?php esc_html_e("Users", "manual-completions-lifterlms") ?></td>
					<td>
						<input role="searchbox" value="" placeholder="<?php esc_html_e("Search User", "manual-completions-lifterlms"); ?>"/>
						<select id="user_ids" name="user_ids" onchange="manual_completions_lifter_users_selected(this)">
							<option value=""><?php esc_html_e("-- Select a User --", "manual-completions-lifterlms"); ?></option>
							<?php foreach ($users as $user) {
									$name = $user->ID.". ".$user->display_name;

									$additional_info = array();
									if($user->display_name != $user->user_login)
										$additional_info[] = $user->user_login;

									if($user->display_name != $user->user_email && $user->user_login != $user->user_email)
										$additional_info[] = $user->user_email;

									if(!empty($additional_info))
									$name = $name." (".implode(", ", $additional_info).")";
								?>
								<option value="<?php echo esc_attr( $user->ID ); ?>" data-user_login="<?php echo esc_attr(strtolower($user->user_login)); ?>" data-user_email="<?php echo esc_attr( strtolower( $user->user_email ) ); ?>"><?php echo esc_html($name); ?></option>
							<?php } ?>
						</select>
						<?php esc_html_e("(Select Users, or, enter comma separated or space separated user_id. You can even copy/paste from CSV. Hit SPACE BAR after pasting.)", "manual-completions-lifterlms"); ?>
					</td>
					<br>
					<td><button onclick="manual_completions_lifter_get_enrolled_users()" class="button"><?php esc_html_e("Get All Enrolled Users", "manual-completions-lifterlms"); ?></button></td>
				</tr>
			</table>
		</div>
		<div id="manual_completions_lifter_table" class="manual_completions_lifter">
			<div class="button-secondary" id="process_completions" onclick="manual_completions_lifter_mark_complete()"><?php esc_html_e("Process Selected Completions", "manual-completions-lifterlms"); ?> <span class="count"></span></div>
			<div class="button-secondary" id="check_completions" onclick="manual_completions_lifter_check_completion()"><?php esc_html_e("Check Completion Status", "manual-completions-lifterlms"); ?> <span class="count"></span></div>
			<span id="list_count"><?php echo sprintf( esc_html__("Total %s rows", "manual-completions-lifterlms"), '<span class="count">0</span>'); ?> </span>
			<br>
			<div class="force_completion">
				<input id="force_completion" type="checkbox"> <?php esc_html_e("Force Completion (Ignore xAPI Content Completion Status)", "manual-completions-lifterlms"); ?>
			</div>

			<table class="grassblade_table" style="width: 100%">
				<tr class="header">
					<th><input type="checkbox" id="select_all"></th>
					<th><?php esc_html_e("S.No", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("User", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("Course", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("Section", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("Lesson", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("Quiz", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("Actions", "manual-completions-lifterlms"); ?></th>
					<th><?php esc_html_e("Status", "manual-completions-lifterlms"); ?></th>
				</tr>
			</table>
		</div>