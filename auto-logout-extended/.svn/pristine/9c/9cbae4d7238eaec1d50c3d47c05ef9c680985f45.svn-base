<?php foreach ( $exclude_users as $role => $exclude_user ): ?>
    <div class="logout-exclude-user">
        <label>
            <input type="hidden"
                   name="_al_ext[exclude_users][<?php echo esc_attr( $role ); ?>]"
                   value="0">
            <input class="select_exclude_checkbox" type="checkbox"
                   name="_al_ext[exclude_users][<?php echo esc_attr( $role ); ?>]"
				<?php checked( $this->check_exclude_user( $role ), 1 ); ?>
                   value="1">
			<?php echo esc_html( $exclude_user ); ?>
        </label>
    </div>
<?php endforeach; ?>