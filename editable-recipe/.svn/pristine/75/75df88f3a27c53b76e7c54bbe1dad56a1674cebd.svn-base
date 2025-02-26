<?php
if (!class_exists("er_Recipe")) {
	class er_Recipe {
		private $_name;
		private $_photo;
		private $_ingredients;
		private $_instructions;
		private $_yeild;
		private $_source;
		private $_source_url;
		private $_duration_h;
		private $_duration_m;
		private $_summary;
				
		function er_Recipe() { //constructor

		}
		
		public function name() { return $this->_name; }
		public function photo() { return $this->_photo; }
		public function ingredients() { return $this->_ingredients; }
		public function instructions() { return $this->_instructions; }
		public function yeild() { return $this->_yeild; }
		public function source() { return $this->_source; }
		public function source_url() { return $this->_source_url; }
		public function duration_h() { return $this->_duration_h; }
		public function duration_m() { return $this->_duration_m; }
		public function summary() { return $this->_summary; }
		
		public function setName($val) { $this->_name = $var; }
		public function setPhoto($val) { $this->_photo = $var; }
		public function setIngredients($val) { $this->_ingredients = $var; }
		public function setInstructions($val) { $this->_instructions = $var; }
		public function setYeild($val) { $this->_yeild = $var; }
		public function setSource($val) { $this->_source = $var; }
		public function setSource_url($val) { $this->_source_url = $var; }
		public function setDuration_h($val) { $this->_duration_h = $var; }
		public function setDuration_m($val) { $this->_duration_m = $var; }
		public function setSummary($val) { $this->_summary = $var; }
		
		public function ingredientText() {
			$text = '';
			$numIngredients = count($this->_ingredients);
			for($i=0;$i<$numIngredients;$i++) {
				$text = $text.$this->_ingredients[$i].'&#13;&#10;';
			}
			return $text;
		}
		
		public function ingredientListFromText($text) {
			$lines = preg_split('/\r\n|\r|\n/', $text);
			if (count($lines) == 1 && !$lines[0]) {
				return array();
			}
			return $lines;
		}
		
		public function setIngredientText($text) {
			
		}
		public function load() {
			$this->_name = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_fn', true));
			$this->_photo = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_photo', true));
			$this->_ingredients = get_post_meta(get_the_ID(), 'editableRecipe_ingredient', true);
			for($i=0;$i<count($this->_ingredients);$i++) {
				$this->_ingredients[$i] = esc_html($this->_ingredients[$i]);
			}
			// The instructions are not escaped because they are fed to TinyMCE
			$this->_instructions = get_post_meta(get_the_ID(), 'editableRecipe_instructions', true);
			$this->_yeild = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_yeild', true));
			$this->_source = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_source', true));
			$this->_source_url = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_source_url', true));
			$this->_duration_h = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_duration_h', true));
			$this->_duration_m = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_duration_m', true));
			$this->_summary = esc_html(get_post_meta(get_the_ID(), 'editableRecipe_summary', true));
				
		}
		
		public function loadFromForm() {
			$this->_name = $_POST['editableRecipe_fn_field'];
			$this->_photo = $_POST['editableRecipe_photo_field'];
			$text = $_POST['editableRecipe_ingredient_field'];
			$this->_ingredients = $this->ingredientListFromText($text);
			$this->_instructions = $_POST['editableRecipe_instructions_field'];
			$this->_yeild = $_POST['editableRecipe_yield_field'];
			$this->_source = $_POST['editableRecipe_source_field'];
			$this->_source_url = $_POST['editableRecipe_source_url_field'];
			$this->_duration_h = $_POST['editableRecipe_duration_h_field'];
			$this->_duration_m = $_POST['editableRecipe_duration_m_field'];
			$this->_summary = $_POST['editableRecipe_summary_field'];
					
		}
		
		public function save($post_id) {
			delete_post_meta($post_id,'editableRecipe_fn');
			delete_post_meta($post_id,'editableRecipe_photo');
			delete_post_meta($post_id,'editableRecipe_ingredient');
			delete_post_meta($post_id,'editableRecipe_instructions');
			delete_post_meta($post_id,'editableRecipe_yeild');
			delete_post_meta($post_id,'editableRecipe_source');
			delete_post_meta($post_id,'editableRecipe_source_url');
			delete_post_meta($post_id,'editableRecipe_duration_h');
			delete_post_meta($post_id,'editableRecipe_duration_m');
			delete_post_meta($post_id,'editableRecipe_summary');
			
			if(!empty($this->_name)) add_post_meta($post_id,'editableRecipe_fn',$this->_name,true);
			if(!empty($this->_photo)) add_post_meta($post_id,'editableRecipe_photo',$this->_photo,true);
			if(!empty($this->_ingredients)) add_post_meta($post_id,'editableRecipe_ingredient',$this->_ingredients,true);
			if(!empty($this->_instructions)) add_post_meta($post_id,'editableRecipe_instructions',$this->_instructions,true);
			if(!empty($this->_yeild)) add_post_meta($post_id,'editableRecipe_yeild',$this->_yeild,true);
			if(!empty($this->_source)) add_post_meta($post_id,'editableRecipe_source',$this->_source,true);
			if(!empty($this->_source_url)) add_post_meta($post_id,'editableRecipe_source_url',$this->_source_url,true);
			if(!empty($this->_duration_h)) add_post_meta($post_id,'editableRecipe_duration_h',$this->_duration_h,true);
			if(!empty($this->_duration_m)) add_post_meta($post_id,'editableRecipe_duration_m',$this->_duration_m,true);
			if(!empty($this->_summary)) add_post_meta($post_id,'editableRecipe_summary',$this->_summary,true);
							
		}
	}
}