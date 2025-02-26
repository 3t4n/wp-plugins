<?php

class FFW_Security_Tools {

	/**
	 * How much strict should be file permitions
	 */
	/**
	 * Normal - readable and writable only by user and group
	 */
	const FILE_PERM_STRICT_NORMAL = 1;

	/**
	 * Hard - also no writable by group
	 */
	const FILE_PERM_STRICT_HARD = 2;

	protected $pluginUrl;

	protected function getPluginUrl() {
		if ($this->pluginUrl == NULL) {
			$this->pluginUrl = plugins_url('', __FILE__);
		}
		return $this->pluginUrl;
	}

	protected function checkPerm($path, & $isOk, $desiredDirPermission, $desiredFilePermission) {
		$dp = @opendir($path);
		while($file = @readdir($dp)) {
			if ($file != "." and $file != "..") {
				if (is_dir($path . $file)) {
					if (!$this->isCorrectPermission($desiredDirPermission, $this->getPermission($path . $file))) {
						$isOk = false;
						return;
					}
					
					$this->checkPerm($path . $file . '/', $isOk, $desiredDirPermission, $desiredFilePermission);
				}
				else {
					if (!$this->isCorrectPermission($desiredDirPermission, $this->getPermission($path . $file))) {
						$isOk = false;
						return;
					}
				}
			}
		}
		@closedir($dp);
	}

	protected function getPermission($path) {
		return substr(sprintf('%o', fileperms($path)), -4);
	}

	protected function getFilesForPermissions($strictType) {
		$files = array(
			array(
				'.',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0755' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0775' 
					) 
				),
				'(root dir)' 
			),
			array(
				'wp-includes/',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0664' 
					) 
				) 
			),
			array(
				'.htaccess',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0644',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0664',
						'0664' 
					) 
				) 
			),
			array(
				'wp-admin/index.php',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0644',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0664',
						'0664' 
					) 
				) 
			),
			array(
				'wp-admin/js/',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0664' 
					) 
				) 
			),
			array(
				'wp-admin/',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0664' 
					) 
				) 
			),
			array(
				'wp-content/themes/',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0664' 
					) 
				) 
			),
			array(
				'wp-content/plugins/',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0664' 
					) 
				) 
			),
			array(
				'wp-content/',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0755',
						'0644' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0775',
						'0664' 
					) 
				) 
			),
			array(
				'wp-config.php',
				array(
					self::FILE_PERM_STRICT_HARD => array(
						'0640',
						'0640' 
					),
					self::FILE_PERM_STRICT_NORMAL => array(
						'0660',
						'0660' 
					) 
				) 
			) 
		);
		return $files;
	}

	protected function getImgBasicUrl() {
		return FFWSecurityPluginAdmin::getAdminPluginUrl('assets/img');
	}

	private function isCorrectPermission($desiredDirPermission, $actualPermission) {
		$isOk = true;
		
		list($pD, $uD, $gD, $oD) = str_split($desiredDirPermission);
		list($p, $u, $g, $o) = str_split($actualPermission);
		
		// actual permission must be equal or less, so when it is greater, than it is wrong
		// user
		if ($u > $uD) {
			$isOk = false;
		}
		// group
		if ($g > $gD) {
			$isOk = false;
		}
		// others
		if ($o > $oD) {
			$isOk = false;
		}
		
		return $isOk;
	}

	public function showFilePermissionsInfo() {
		$isOk = true;
		$output = NULL;
		
		$homePath = get_home_path();
		
		$output .= '<table style="width:100%;">';
		$output .= '<tr>';
		$output .= '<td style="width:60%; font-weight:bold;">File or dir</td>';
		$output .= '<td style="font-weight:bold;">Permission should be</td>';
		$output .= '</tr>';
		
		// FIXME: ?
		// clearstatcache();
		
		// we start with "Normal" restriction
		$strictType = self::FILE_PERM_STRICT_NORMAL;
		
		foreach($this->getFilesForPermissions($strictType) as $file) {
			
			$isOk = true;
			
			$filePath = $homePath . $file[0];
			$desiredDirPermission = $file[1][$strictType][0];
			$desiredFilePermission = $file[1][$strictType][1];
			
			// root dir
			if ($file[0] == '.') {
				if (!$this->isCorrectPermission($desiredDirPermission, $this->getPermission($filePath))) {
					$isOk = false;
				}
			}
			// other dir
			else if (is_dir($filePath)) {
				
				// first check entire directory
				if (!$this->isCorrectPermission($desiredDirPermission, $this->getPermission($filePath))) {
					$isOk = false;
				}
				
				// than check directory content
				$this->checkPerm($filePath, $isOk, $desiredDirPermission, $desiredFilePermission);
			}
			// file
			else {
				// check file
				if (!$this->isCorrectPermission($desiredDirPermission, $this->getPermission($filePath))) {
					$isOk = false;
				}
			}
			
			$output .= '<tr>';
			$output .= '<td>';
			if (!$isOk) {
				$output .= '<img src="' . $this->getImgBasicUrl() . '/wrong.png" alt="" style="vertical-align:middle"/> ';
			}
			else {
				$output .= '<img src="' . $this->getImgBasicUrl() . '/ok.png" alt="" style="vertical-align:middle"/> ';
			}
			
			$output .= !empty($file[2]) ? $file[2] : $file[0];
			$output .= '</td><td>';
			// $output .= is_dir($filePath) ? $desiredDirPermission : $desiredFilePermission;
			if (is_dir($filePath)) {
				$output .= 'dir: ' . $desiredDirPermission . ' / ';
			}
			$output .= 'files: ' . $desiredFilePermission;
			$output .= '</td>';
			$output .= '</tr>';
		}
		$output .= '</table>';
		
		if (!$isOk) {
			$output .= '<p style="color:red;"><img src="' . $this->getImgBasicUrl() . '/wrong.png" alt="" style="vertical-align:middle"/> Fix file permissions!!!</p>';
		}
		return $output;
	}

	public function showSecureLogin() {
		$output = NULL;
		$isBad = false;
		// check of SSL
		if (!defined('FORCE_SSL_LOGIN') || FORCE_SSL_LOGIN == false) {
			$isBad = true;
			$output .= '<div style="color:red;"><img src="' . $this->getImgBasicUrl() . '/wrong.png" alt="" style="vertical-align:middle"/> You must set FORCE_SSL_LOGIN in wp-config file.</div>';
		}
		else {
			$output .= '<div><img src="' . $this->getImgBasicUrl() . '/ok.png" alt="" style="vertical-align:middle"/> SSL Secure login enabled.</div>';
		}
		if (!defined('FORCE_SSL_ADMIN') || FORCE_SSL_ADMIN == false) {
			$isBad = true;
			$output .= '<div style="color:red;"><img src="' . $this->getImgBasicUrl() . '/wrong.png" alt="" style="vertical-align:middle"/> You must set FORCE_SSL_ADMIN in wp-config file.</div>';
		}
		else {
			$output .= '<div><img src="' . $this->getImgBasicUrl() . '/ok.png" alt="" style="vertical-align:middle"/> SSL Secure admin enabled.</div>';
		}
		if ($isBad) {
			$output .= '<div style="color:red;">Go and edit your wp-config.php file !!!</div>';
		}
		
		return $output;
	}

	public function showAutomaticUpdates() {
		$output = NULL;
		
		if (!(defined('WP_AUTO_UPDATE_CORE') && WP_AUTO_UPDATE_CORE == false)) {
			$output .= '<div style="color:orange;font-weight:bold;">Attention - Enabled</div>';
		}
		else {
			$output .= '<div style="color:orange;font-weight:bold;">Attention - Disabled</div>';
		}
		
		return $output;
	}

	public function getAdministratorUsers() {
		$users = array();
		
		$user_query = new WP_User_Query(array(
			'role' => 'Administrator' 
		));
		$results = $user_query->get_results();
		
		foreach($results as $result) {
			$isBadNiceName = false;
			$isBadDisplayName = false;
			
			$login = mb_strtolower(remove_accents($result->user_login));
			$niceName = mb_strtolower(remove_accents($result->user_nicename));
			$displayName = mb_strtolower(remove_accents($result->display_name));
			
			if ($login == $niceName) {
				$isBadNiceName = true;
			}
			if ($login == $displayName) {
				$isBadDisplayName = true;
			}
			
			$users[] = array(
				'id' => $result->ID,
				'user_login' => $result->user_login,
				'user_nicename' => $result->user_nicename,
				'display_name' => $result->display_name,
				'is_bad_nicename' => $isBadNiceName,
				'is_bad_displayname' => $isBadDisplayName 
			);
		}
		return $users;
	}
}
