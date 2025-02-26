<?php
if (!class_exists('adt_i88_helper')) {

	class adt_i88_helper {

		public static $uploadDir;

		public function __construct() {
			self::$uploadDir = wp_upload_dir();
		}

		public static function adt_delete_folder($directory, $empty = false) {

			if (substr($directory, -1) == "/") {
				$directory = substr($directory, 0, -1);
			}

			if (!file_exists($directory) || !is_dir($directory)) {
				return false;
			}
			elseif (!is_readable($directory)) {
				return false;
			}
			else {
				$directoryHandle = opendir($directory);
				while ($contents = readdir($directoryHandle)) {
					if ($contents != '.' && $contents != '..') {
						$path = $directory . "/" . $contents;
						if (is_dir($path)) {
							@self::adt_delete_folder($path);
						}
						else {
							@unlink($path);
						}
					}
				}

				closedir($directoryHandle);
				if ($empty == false) {
					if (!rmdir($directory)) {
						return false;
					}
				}
				return true;
			}
		}

		public static function adt_get_all_users() {
			/* Sort the list by user_nicename */
			$szSort = "user_nicename";
			/* Now we build the custom query to get the ID of the users. */
			global $wpdb;
			$user_ids = $wpdb->get_col($wpdb->prepare("SELECT $wpdb->users.ID FROM $wpdb->users ORDER BY %s ASC", $szSort));
			return $user_ids;
		}

		public static function adt_get_user_photo($user_id) {
			global $wpdb;
			$user = get_userdata( $user_id );

			$ad_field_name = get_option('adt_ad_thumbnail');
			$pic_str = $user->$ad_field_name;

			$file_name = $user->user_nicename . $user_id . '.jpeg';
			$file_dir = self::$uploadDir['basedir'] . '/active-directory-thumbnails/'  . $file_name;
			$file_url = self::$uploadDir['baseurl'] . '/active-directory-thumbnails/' . $file_name;

			if ($pic_str) {
				$data = base64_decode($pic_str);
				$img_data = imagecreatefromstring($data);
				imagejpeg($img_data, $file_dir);
				imagedestroy($img_data);
				update_user_meta( $user_id, 'adt_user_photo_url', $file_url );
				update_user_meta( $user_id, 'adt_user_photo_filename', $file_name );
				_e('Picture processed for user: ', 'active-directory-thumbnails');
				echo $user->user_nicename . '<br>';
			} else {
				_e('The following user has no picture in WordPress: ', 'active-directory-thumbnails');
				echo $user->user_nicename . '<br>';
			}
		}

		public static function adt_bulk_get_users_and_save_pics() {
			_e('Starting.....', 'active-directory-thumbnails');
			echo '<br>';
			$user_ids = self::adt_get_all_users();
			foreach ( $user_ids as $current_user ) :
				self::adt_get_user_photo($current_user);
			endforeach; // end the users loop.
			_e('Done!', 'active-directory-thumbnails');
		}
	}
}