<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Quotes_Fonts_Database
{
	private $tablenames = [];
	private $dbVersion = "1.0.2";
	private $dbLock = false;

	private $variants = [];
	private $subsets = [];
	private $categories = [];
	private $families = [];

	public function __construct()
	{
		global $wpdb;
		$this->tablenames[0] = $wpdb->prefix . 'easy-quotes-categories';
		$this->tablenames[1] = $wpdb->prefix . 'easy-quotes-families';
		$this->tablenames[2] = $wpdb->prefix . 'easy-quotes-variants';
		$this->tablenames[3] = $wpdb->prefix . 'easy-quotes-files';
		$this->tablenames[4] = $wpdb->prefix . 'easy-quotes-subsets';
		$this->tablenames[5] = $wpdb->prefix . 'easy-quotes-family-subsets';
	}

	/**
	 * Create all font tables
	 *
	 * @return bool success = true / no success = false
	 */
	public function createTables()
	{
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		$sqls = [
			"CREATE TABLE IF NOT EXISTS `" . $this->tablenames[0] . "` (
                `category_id` INT NOT NULL AUTO_INCREMENT,
                `category` VARCHAR(20) NULL,
                PRIMARY KEY (`category_id`)
            ) ENGINE=InnoDB $charset_collate;",

			"CREATE TABLE IF NOT EXISTS `" . $this->tablenames[1] . "` (
                `family_id` INT NOT NULL AUTO_INCREMENT,
                `family` VARCHAR(45) NULL,
                `version` VARCHAR(4) NULL,
                `category_id` INT NULL,
                `lastModified` DATE NULL,
                PRIMARY KEY (`family_id`),
                INDEX `category_id_idx` (`category_id` ASC),
                CONSTRAINT `category_id`
                  FOREIGN KEY (`category_id`)
                  REFERENCES `" . $this->tablenames[0] . "` (`category_id`)
                  ON DELETE NO ACTION
                  ON UPDATE NO ACTION)
              ENGINE = InnoDB $charset_collate;",

			"CREATE TABLE IF NOT EXISTS `" . $this->tablenames[2] . "` (
                `variant_id` INT NOT NULL AUTO_INCREMENT,
                `variant` VARCHAR(18) NULL,
                PRIMARY KEY (`variant_id`))
              ENGINE = InnoDB $charset_collate;",

			"CREATE TABLE IF NOT EXISTS `" . $this->tablenames[3] . "` (
                `family_id` INT NOT NULL,
                `variant_id` INT NOT NULL,
                `file` VARCHAR(128) NULL,
                PRIMARY KEY (`family_id`, `variant_id`),
                INDEX `variant_id_idx` (`variant_id` ASC),
                CONSTRAINT `family_id`
                  FOREIGN KEY (`family_id`)
                  REFERENCES `" . $this->tablenames[1] . "` (`family_id`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE,
                CONSTRAINT `variant_id`
                  FOREIGN KEY (`variant_id`)
                  REFERENCES `" . $this->tablenames[2] . "` (`variant_id`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE)
              ENGINE = InnoDB $charset_collate;",

			"CREATE TABLE IF NOT EXISTS `" . $this->tablenames[4] . "` (
                `subset_id` INT NOT NULL AUTO_INCREMENT,
                `subset` VARCHAR(45) NULL,
                PRIMARY KEY (`subset_id`))
              ENGINE = InnoDB $charset_collate;",

			"CREATE TABLE IF NOT EXISTS `" . $this->tablenames[5] . "` (
                `family_id` INT NOT NULL,
                `subset_id` INT NOT NULL,
                PRIMARY KEY (`family_id`, `subset_id`),
                INDEX `subset_id_idx` (`subset_id` ASC),
                CONSTRAINT `family_id2`
                  FOREIGN KEY (`family_id`)
                  REFERENCES `" . $this->tablenames[1] . "` (`family_id`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE,
                CONSTRAINT `subset_id`
                  FOREIGN KEY (`subset_id`)
                  REFERENCES `" . $this->tablenames[4] . "` (`subset_id`)
                  ON DELETE CASCADE
                  ON UPDATE CASCADE)
              ENGINE = InnoDB $charset_collate;"
		];

		$result = true;
		foreach ($sqls as $sql) {
			$query_result = $wpdb->query($sql);
			$result = $result && $query_result;
		}
		return $result;
	}

	/**
	 * Drop all font tables
	 *
	 * @return void
	 */
	public function dropTables()
	{
		global $wpdb;
		for ($i = 5; $i >= 0; $i--) {
			$wpdb->query("DROP TABLE IF EXISTS `" . $this->tablenames[$i] . "`;");
		}
	}

	/**
	 * Inserts all Font Categories into datatable wp-prefix-easy-quotes-categories
	 *
	 * @param [type] $categories
	 * @return void
	 */
	private function insert_categories($categories)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		foreach ($categories as $category) {
			$wpdb->insert($this->tablenames[0], ['category' => $category], ['%s']);
		}
	}

	/**
	 * Inserts all Font Variants into datatable wp-prefix-easy-quotes-variants
	 *
	 * @param [type] $variants
	 * @return void
	 */
	private function insert_variants($variants)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		foreach ($variants as $variant) {
			$wpdb->insert($this->tablenames[2], ['variant' => $variant], ['%s']);
		}
	}

	/**
	 * Inserts all Font Subsets into datatable wp-prefix-easy-quotes-subsets
	 *
	 * @param [type] $subsets
	 * @return void
	 */
	private function insert_subsets($subsets)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		foreach ($subsets as $subset) {
			$wpdb->insert($this->tablenames[4], ['subset' => $subset], ['%s']);
		}
	}

	/**
	 * Inserts all Font Families and dependent data into wp-prefix-easy-quotes-families 
	 *
	 * @param [type] $families
	 * @return void
	 */
	private function insert_families($families)
	{
		/** @var wpdb $wpdb */
		global $wpdb;

		foreach ($families as $family) {
			$category_id = $this->get_category_id($family['category']);
			$data = [
				'family'		=> $family['family'],
				'version'		=> $family['version'],
				'category_id'	=> $category_id,
				'lastModified'	=> $family['lastModified']
			];
			$wpdb->insert($this->tablenames[1], $data, ['%s', '%s', '%d', '%s']);
			$family_id = $wpdb->insert_id;
			$this->insert_family_subsets($family_id, $family['subsets']);
			$this->insert_files($family_id, $family['files']);
		}
	}

	/**
	 * Returns Category id by category name
	 *
	 * @param string $category
	 * @return string category_id
	 */
	private function get_category_id($category)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		return $wpdb->get_var("SELECT `category_id` FROM `" . $this->tablenames[0] . "` WHERE `category` = '$category';");
	}

	/**
	 * Inserts all Font Family to Subsets relations into wp-prefix-easy-quotes-family-subsets
	 *
	 * @param string $family_id
	 * @param [string] $subsets
	 * @return void
	 */
	private function insert_family_subsets($family_id, $subsets)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		foreach ($subsets as $subset) {
			$subset_id = $this->get_subset_id($subset);
			$wpdb->insert($this->tablenames[5], ['family_id' => $family_id, 'subset_id' => $subset_id], ['%d', '%d']);
		}
	}

	/**
	 * Returns subset id by subset name
	 *
	 * @param string $subset
	 * @return string subset_id
	 */
	private function get_subset_id($subset)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		return $wpdb->get_var("SELECT `subset_id` FROM `" . $this->tablenames[4] . "` WHERE `subset` = '$subset';");
	}

	/**
	 * Inserts font files into lookup table wp-prefix-easy-quotes-files
	 *
	 * @param string $family_id
	 * @param [string] $files
	 * @return void
	 */
	private function insert_files($family_id, $files)
	{
		/** @var wpdb $wpdb */
		global $wpdb;

		foreach ($files as $variant => $file) {
			$variant_id = $this->get_variant_id($variant);
			$wpdb->insert($this->tablenames[3], ['family_id' => $family_id, 'variant_id' => $variant_id, 'file' => $file], ['%d', '%d', '%s']);
		}
	}

	/**
	 * Returns variant_id by variant name
	 *
	 * @param string 	$variant
	 * @return string	variant_id
	 */
	private function get_variant_id($variant)
	{
		/** @var wpdb $wpdb */
		global $wpdb;
		return $wpdb->get_var("SELECT `variant_id` FROM `" . $this->tablenames[2] . "` WHERE `variant` = '$variant';");
	}

	/**
	 * Loads information from Google Fonts json api response
	 * Creating database Tables and inserting Google Fonts data
	 * 
	 * @param string $filename
	 * @return void
	 */
	public function load_google_fonts_json($filename)
	{
		if ($this->dbLock) {
			return;
		}

		if ($this->is_db_up_to_date()) {
			return;
		}

		if (!file_exists($filename)) {
			return;
		}

		$this->dbLock = true;

		$data = file_get_contents($filename);
		$googleFontAPIResult = json_decode($data, true, 512);

		foreach ($googleFontAPIResult as $key => $value) {
			if ($key === "items") {
				for ($i = 0; $i < count($value); $i++) {
					$this->collect_data($value[$i]);
				}
			}
		}

		/** Insert all data into Database */
		$this->dropTables();
		if ($this->createTables()) {
			$this->insert_categories($this->categories);
			$this->insert_variants($this->variants);
			$this->insert_subsets($this->subsets);
			$this->insert_families($this->families);
			update_option('easy-quotes-db-version', $this->dbVersion);
		}

		$this->dbLock = false;
	}

	/**
	 * Check if db is up to date
	 *
	 * @return boolean true if is up to date
	 */
	private function is_db_up_to_date()
	{
		$dbVersion_old = get_option('easy-quotes-db-version');

		if ($dbVersion_old && $this->dbVersion) {
			if ($dbVersion_old === $this->dbVersion) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Collecting Data from one FontFamily
	 *
	 * @param array $font
	 * @return void
	 */
	private function collect_data($font)
	{
		$this->collect_variants($font);
		$this->collect_subsets($font);
		$this->collect_categories($font);
		$this->collect_families($font);
	}

	/**
	 * Collect the FontFamily Variants
	 *
	 * @param array $font
	 * @return void
	 */
	private function collect_variants($font)
	{
		foreach ($font['variants'] as $variant) {
			if (!in_array($variant, $this->variants))
				array_push($this->variants, $variant);
		}
	}

	/**
	 * Collect the FontFamily subsets
	 *
	 * @param array $font
	 * @return void
	 */
	private function collect_subsets($font)
	{
		foreach ($font['subsets'] as $subset) {
			if (!in_array($subset, $this->subsets))
				array_push($this->subsets, $subset);
		}
	}

	/**
	 * Collect the FontFamily categories
	 *
	 * @param array $font
	 * @return void
	 */
	private function collect_categories($font)
	{
		if (!in_array($font['category'], $this->categories))
			array_push($this->categories, $font['category']);
	}

	/**
	 * Collect the FontFamilies
	 *
	 * @param array $font
	 * @return void
	 */
	private function collect_families($font)
	{
		$files = [];
		for ($i = 0; $i < count($font['variants']); $i++) {
			$variant = $font['variants'][$i];
			$file = $font['files'][$variant];
			$files[strval($variant)] = basename($file);
		}

		$family = [
			'family'		=> $font['family'],
			'version'		=> $font['version'],
			'category'		=> $font['category'],
			'lastModified'	=> $font['lastModified'],
			'subsets'		=> $font['subsets'],
			'files'			=> $files
		];
		array_push($this->families, $family);
	}
}
