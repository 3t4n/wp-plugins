<?php

/**
 * Handles frontend display based on current optios
 */
class Handler {
	/**
	 * @var array $options (from FrontendMenu::getOptions())
	 */
	private $options;

	/**
	 * Constructor
	 *
	 * @var array $options Options to set at the beginning (from Frontendmenu::getOptions())
	 */
	public function __construct($options) {
		$this->options = $options;
	}

	public function isActive() {
		switch ($this->options['mode']) {
			case 0:
				//Wp-Lock is disabled permanently
				return false;
			case 1:
				//Wp-Lock is enabled permanently
				return true;
			case 2:
				//Wp-Lock is disabled for a specified time+unit (e.g. 3 weeks) - and will then be enabled
				if ($this->forIsOver(
					$this->options['lastUpdated'], 
					$this->options['dFor'], 
					$this->options['dForI']
				)) {
					// Werte zurücksetzen
					update_option('wpLockDisableFor', '');
					update_option('wpLockDisableForI', '');
					update_option('wpLockMode', '1');
					
					// Cache leeren
					if (function_exists('rocket_clean_domain')) {
						rocket_clean_domain();
					}
					
					do_action('wplock_status_changed');
					return true;
				}
				return false;
			case 3:
				//Wp-Lock is enabled for a specified time+unit (e.g. 3 weeks) - and will then be disabled
				if ($this->forIsOver(
					$this->options['lastUpdated'], 
					$this->options['eFor'], 
					$this->options['eForI']
				)) {
					FrontendMenu::disablePermanently();
					// Werte zurücksetzen
					update_option('wpLockEnableFor', '');
					update_option('wpLockEnableForI', '');
					update_option('wpLockMode', '0'); // Auf permanent entsperrt setzen
					
					// Cache leeren
					if (function_exists('rocket_clean_domain')) {
						rocket_clean_domain();
					}
					
					do_action('wplock_status_changed');
					return false;
				}
				return true;
			case 4:
				if (!$this->timespanIsReached($this->options['dFrom'], $this->options['dTo'])) {
					//Vor dem Startzeitpunkt - normaler Status ist an
					return true;
				} elseif($this->timespanIsOver($this->options['dFrom'], $this->options['dTo'])) {
					//Außerhalb der Zeitzone nach dem Endzeitpunkt - normaler Status ist an, und Status wird gewechselt
					FrontendMenu::enablePermanently();
					// Werte zurücksetzen
					update_option('wpLockUnlockFrom', '');
					update_option('wpLockUnlockTo', '');
					update_option('wpLockMode', '1'); // Auf permanent gesperrt setzen
					do_action('wplock_status_changed'); // Cache beim Statuswechsel leeren
					return true;
				}
				//Innerhalb der Zeitzone - spezieller Status: aus
				do_action('wplock_status_changed'); // Cache beim Erreichen des Zeitraums leeren
				return false;
			case 5:
				if (!$this->timespanIsReached($this->options['eFrom'], $this->options['eTo'])) {
					//Vor dem Startzeitpunkt - normaler Status ist aus
					return false;
				} elseif($this->timespanIsOver($this->options['eFrom'], $this->options['eTo'])) {
					//Außerhalb der Zeitzone nach dem Endzeitpunkt - normaler Status ist aus, und Status wird gewechselt
					FrontendMenu::disablePermanently();
					// Werte zurücksetzen
					update_option('wpLockLockFrom', '');
					update_option('wpLockLockTo', '');
					update_option('wpLockMode', '0'); // Auf permanent entsperrt setzen
					do_action('wplock_status_changed'); // Cache beim Statuswechsel leeren
					return false;
				}
				//Innerhalb der Zeitzone - spezieller Status: an
				do_action('wplock_status_changed'); // Cache beim Erreichen des Zeitraums leeren
				return true;
		}
	}


	/**
	 * Handles redirection based on current settings
	 */
	public function handle() {
		// Prüfen ob der Nutzer eine erlaubte Rolle hat
		$isAuthorized = false;
		
		if (is_user_logged_in()) {
			$user = wp_get_current_user();
			$allowed_roles = get_option('wpLockAllowedRoles', array('administrator'));
			
			// Debug-Logging
			error_log('WP Lock - User Roles: ' . print_r($user->roles, true));
			error_log('WP Lock - Allowed Roles: ' . print_r($allowed_roles, true));
			
			// Prüfe jede Rolle des Benutzers
			foreach ($user->roles as $role) {
				if (in_array($role, $allowed_roles)) {
					$isAuthorized = true;
					break;
				}
			}
			
			// Debug-Logging
			error_log('WP Lock - Is Authorized: ' . ($isAuthorized ? 'true' : 'false'));
		}

		// Wenn die Seite nicht gesperrt ist oder der Nutzer berechtigt ist
		if (!$this->isActive() || $isAuthorized) {
			return;
		}

		// Nur weiterleiten wenn nicht im Admin-Bereich und nicht auf der Login-Seite
		if (!is_admin() && !$this->isLoginPage()) {
			$this->redirect();
		}
	}

	/**
	 * Checks if the until date is over - so Wp-Lock will change its state
	 *
	 * @param string $date - any date string ('YYY-MM-DD')
	 * @return bool
	 */
	public function untilIsOver($date) {
		$untilDate = new DateTime($date, new DateTimeZone('Europe/Berlin'));
		$currentDate = new DateTime('now', new DateTimeZone('Europe/Berlin'));
		return $untilDate < $currentDate;
	}

	/**
	 * Checks if the for date is over - so Wp-Lock will change its state
	 *
	 * @param string $lastUpdatedDate Date when the last update of settings occured in the backend
	 * @param int $value Value of current setting
	 * @param int $unit Unit of current setting (0=Minutes, 1=Hours, 2=Days, 3=Weeks)
	 *
	 * @return bool
	 */
	public function forIsOver($lastUpdatedDate, $value, $unit) {
		$currentDate = new DateTime('now', new DateTimeZone('Europe/Berlin'));
		$lastUpdated = new DateTime($lastUpdatedDate, new DateTimeZone('Europe/Berlin'));
		$interval = $currentDate->diff($lastUpdated);
		
		switch($unit) {
			case 0: // Minuten
				$totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
				return $totalMinutes >= $value;
			case 1: // Stunden
				$totalHours = ($interval->days * 24) + $interval->h;
				return $totalHours >= $value;
			case 2: // Tage
				return $interval->days >= $value;
			case 3: // Wochen
				return floor($interval->days / 7) >= $value;
		}
		return false;
	}

	/**
	 * Checks if the timespan is reached
	 *
	 * @param string $lastUpdatedDate Date when the last update of settings occured in the backend
	 * @param int $value Value of current setting
	 * @param int $unit Unit of current setting (0=Minutes, 1=Hours, 2=Days, 3=Weeks)
	 *
	 * @return bool
	 */
	public function timespanIsReached($from, $to) {
		$currentDate = new DateTime('now', new DateTimeZone('Europe/Berlin'));
		$fromDate = new DateTime($from, new DateTimeZone('Europe/Berlin'));
		return $currentDate >= $fromDate;
	}

	/**
	 * Checks if the timespan is over
	 *
	 * @param string $lastUpdatedDate Date when the last update of settings occured in the backend
	 * @param int $value Value of current setting
	 * @param int $unit Unit of current setting (0=Minutes, 1=Hours, 2=Days, 3=Weeks)
	 *
	 * @return bool
	 */
	public function timespanIsOver($from, $to) {
		$currentDate = new DateTime('now', new DateTimeZone('Europe/Berlin'));
		$toDate = new DateTime($to, new DateTimeZone('Europe/Berlin'));
		return $currentDate >= $toDate;
	}

	/**
	 * Get the style url for frontend display
	 *
	 * @return string the url
	 */
	private function getStyleUrl() {
		return plugins_url('aweos-wp-lock', 'aweos-wp-lock') . '/styles/style.css';
	}

	/**
	 * Do final redirect
	 */
	private function redirect() {
		?>
		<!doctype html>
		<html>
			<head>
				<title>This site is currently offline.</title>
				<link rel="stylesheet" href="<?php echo $this->getStyleUrl(); ?>" type="text/css">
			</head>
			<body>
				<div id="wplog-message">
					<?php echo nl2br($this->options['message']); ?>
					<?php
						$logo = get_option('wpLockLogo');
						if ($logo) {
					?>
					<br>
					<br>
					<img alt='logo' src='<?php echo $logo ?>' style='width: 200px; heigth: auto;'>

				<?php } ?>
				</div>
			</body>
		</html>
		<?php
		exit;
	}

	// NEU: Statische Methode für den Cron-Job
	public static function checkStatus() {
		$handler = new self(FrontendMenu::getOptions());
		$previousStatus = $handler->isActive();
		
		// Status neu prüfen
		$currentStatus = $handler->isActive();
		
		// Wenn sich der Status geändert hat
		if ($previousStatus !== $currentStatus) {
			do_action('wplock_status_changed');
		}
	}

	/**
	 * Prüft, ob die aktuelle Seite die Login-Seite ist
	 * 
	 * @return bool
	 */
	private function isLoginPage() {
		global $pagenow;
		return in_array($pagenow, array('wp-login.php', 'wp-register.php'));
	}

	public static function registerAjaxHandlers() {
		add_action('wp_ajax_check_wplock_status', array(__CLASS__, 'handleAjaxStatusCheck'));
		add_action('wp_ajax_nopriv_check_wplock_status', array(__CLASS__, 'handleAjaxStatusCheck'));
	}

	public static function handleAjaxStatusCheck() {
		check_ajax_referer('wplock_ajax_nonce', 'nonce');
		
		$handler = new self(FrontendMenu::getOptions());
		$currentStatus = $handler->isActive();
		
		wp_send_json(array(
			'status' => $currentStatus,
			'reload' => true
		));
	}
}
