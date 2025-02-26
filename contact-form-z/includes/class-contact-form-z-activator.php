<?php

class ZCForm_Activator{

    public static function activate(){

        global $wpdb;

        $wpdb->hide_errors();

        require_once ABSPATH.'wp-admin/includes/upgrade.php';

        $prefix = $wpdb->prefix;
        $collate = 'DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci';

        if($wpdb->has_cap('collation')){
            $collate = $wpdb->get_charset_collate();
        }

        $wpdb->query(
            "DROP TABLE IF EXISTS {$prefix}zcf_form_list, {$prefix}zcf_form_list_history;"
        );

        dbDelta("
             CREATE TABLE IF NOT EXISTS {$prefix}zcf_form_list (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                title VARCHAR(1000) NOT NULL,
                fields TEXT NOT NULL,
                mail TEXT NOT NULL,
                style TEXT NOT NULL,
                message TEXT NOT NULL,
                options TEXT NOT NULL,
                paste TEXT NOT NULL,
                plugin TEXT NOT NULL,
                rank TEXT NOT NULL,
                field_patterns TEXT NOT NULL,
                patterns TEXT NOT NULL,
                add_user INT NOT NULL DEFAULT '0',
                add_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                version FLOAT NOT NULL DEFAULT '1',
                PRIMARY KEY (id),
                KEY add_user_form_list_idx (add_user),
                KEY add_date_form_list_idx (add_date)
              ) ENGINE=InnoDB {$collate};
             ");

        dbDelta("
             CREATE TABLE IF NOT EXISTS {$prefix}zcf_form_list_history (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                form_list_id BIGINT UNSIGNED NOT NULL,
                title VARCHAR(1000) NOT NULL,
                fields TEXT NOT NULL,
                mail TEXT NOT NULL,
                style TEXT NOT NULL,
                message TEXT NOT NULL,
                options TEXT NOT NULL,
                paste TEXT NOT NULL,
                plugin TEXT NOT NULL,
                rank TEXT NOT NULL,
                field_patterns TEXT NOT NULL,
                patterns TEXT NOT NULL,
                add_user INT NOT NULL DEFAULT '0',
                add_date TIMESTAMP NOT NULL,
                version FLOAT NOT NULL DEFAULT '1',
                PRIMARY KEY (id),
                KEY id_form_list_idx (form_list_id),
                KEY add_user_form_list_idx (add_user),
                KEY add_date_form_list_idx (add_date)
              ) ENGINE=InnoDB {$collate};
             ");

        dbDelta("
             CREATE TABLE IF NOT EXISTS {$prefix}zcf_form_list_post (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                form_id BIGINT NOT NULL,
                post_id BIGINT NOT NULL,
                post_position VARCHAR(20) NOT NULL,
                PRIMARY KEY (id),
                KEY form_id_form_list_post_idx (form_id),
                KEY post_id_form_list_post_idx (post_id)
              ) ENGINE=InnoDB {$collate};
             ");
              
          dbDelta("
             CREATE TABLE IF NOT EXISTS {$prefix}zcf_form_save (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                form_list_id BIGINT UNSIGNED NOT NULL,
                data_patterns TEXT NOT NULL,
                add_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (id),
                KEY id_form_list_idx (form_list_id),
                KEY add_date_form_list_idx (add_date)
              ) ENGINE=InnoDB {$collate};
             ");

        $wpdb->query(
            "DROP TRIGGER IF EXISTS {$prefix}update_b_zcf_form_list;"
        );

        $wpdb->query(
            "CREATE TRIGGER {$prefix}update_b_zcf_form_list 
              BEFORE UPDATE ON {$prefix}zcf_form_list 
              FOR EACH ROW 
              SET NEW.version = NEW.version + 0.1;"
        );

        $wpdb->query(
            "DROP TRIGGER IF EXISTS {$prefix}update_a_zcf_form_list;"
        );

        $wpdb->query(
            "CREATE TRIGGER {$prefix}update_a_zcf_form_list 
              AFTER UPDATE ON {$prefix}zcf_form_list 
              FOR EACH ROW 
              INSERT INTO {$prefix}zcf_form_list_history (
                  form_list_id, title, fields, mail, style, message, options, 
                  paste, plugin, rank, field_patterns, patterns,
                  add_user, add_date, version
                  ) 
              VALUES (
              OLD.id, OLD.title, OLD.fields, OLD.mail, OLD.style, OLD.message, OLD.options, 
              OLD.paste, OLD.plugin, OLD.rank, OLD.field_patterns, OLD.patterns,
              OLD.add_user, OLD.add_date, OLD.version
              );"
        );

        $wpdb->query(
            "DROP TRIGGER IF EXISTS {$prefix}delete_a_zcf_form_list;"
        );

        $wpdb->query(
            "CREATE TRIGGER {$prefix}delete_a_zcf_form_list 
              AFTER DELETE ON {$prefix}zcf_form_list 
              FOR EACH ROW 
              INSERT INTO {$prefix}zcf_form_list_history (
                  form_list_id, title, fields, mail, style, message, options, 
                  paste, plugin, rank, field_patterns, patterns,
                  add_user, add_date, version
                  ) 
              VALUES (
              OLD.id, OLD.title, OLD.fields, OLD.mail, OLD.style, OLD.message, OLD.options, 
              OLD.paste, OLD.plugin, OLD.rank, OLD.field_patterns, OLD.patterns,
              OLD.add_user, OLD.add_date, OLD.version
              );"
        );
    }

}