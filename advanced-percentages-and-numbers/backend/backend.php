<?php add_action('media_buttons','add_percentage_button', 999999);
function add_percentage_button(){ ?>
<a href="#" class="button percentage-button">Add percentage or Number</a>
<?php } ?>
<?php add_action('admin_footer','add_percentage_form');
function add_percentage_form(){ ?>
<div class="percentage-background">
<div class="percentage-form">
	<div class="percentage-form-title">
		Insert a percentage or counting number
		<div class="percentage-close-button">
			x
		</div>
	</div>
	
	<div class="percentage-buttons">
	<h3>What would you like to insert?</h3>
	<a id="percentage-option" class="button">Percentage</a>
	<a id="number-option" class="button">Counting Number</a>
	</div>
	
	
	<form id="percentage" class="add-percentage-form">
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Percentage Amount</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	What percentage do you require?
	</div>
	</div>
		</div>
		<div class="right-side">
			<select name="percentage" required>
			<?php for($i = 0; $i <= 100; $i++){ ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?>%</option>
			<?php } ?>
			</select>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Color</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	The color of the percentage
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="text" name="color" class="percentage-color-picker" required>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Width</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Width of the percentage relevant to its container.
	</div>
	</div>
		</div>
		<div class="right-side">
			<select name="width" required>
			<?php for($i = 0; $i <= 100; $i++){ ?>
			<option value="<?php echo $i; ?>%"><?php echo $i; ?>%</option>
			<?php } ?>
			</select>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label>Outline Path?</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Enable a grey outline of the percentage circle 
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="checkbox" name="outline_path" value="false">
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Line width</label>
			
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Line width of the percentage circle?
	</div>
	</div>
		</div>
		<div class="right-side">
			<select name="line_width" required>
			<option value="thin">Thin</option>
			<option value="medium">Medium</option>
			<option value="thick">Thick</option>
			</select>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Speed (ms)</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Speed the percentage will grow to your chosen percentage in milliseconds (e.g, 1 second = 1000)
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="number" name="speed" required>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label>Delay (ms)</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Delay before animation starts in milliseconds (e.g, 1 second = 1000) (Animation starts when the item enters the viewport by default)
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="number" name="delay">
		</div>
		</div>
		
		<input type="submit" value="Insert Percentage">
		
	</form>
	
	<form id="number" class="add-percentage-form">
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Number Amount</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	What number to be counted to?
	</div>
	</div>
		</div>
		<div class="right-side">
			<input name="number" type="number" required>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Colour</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	The color of the percentage
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="text" name="color" class="percentage-color-picker" required>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label class="required">Speed (ms)</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Speed the number will grow from your 0 to your chosen number in milliseconds (e.g 1 second = 1000)
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="number" name="speed" required>
		</div>
		</div>
		
		<div class="percentage-control">
		<div class="left-side">
			<label>Delay (ms)</label>
			<div class="more-info">
	<i class="fas fa-info"></i>
	<div class="hovered-text">
	Delay before the number will grow from your 0 to your chosen number in milliseconds (e.g 1 second = 1000) (Animation starts when the item enters the viewport by default)
	</div>
	</div>
		</div>
		<div class="right-side">
			<input type="number" name="delay">
		</div>
		</div>
		
		<input type="submit" value="Insert Number">
		
	</form>
	
	
</div>
</div>


<?php }