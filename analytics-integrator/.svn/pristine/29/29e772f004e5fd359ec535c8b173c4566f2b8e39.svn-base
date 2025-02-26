<style>
	.description-box {
		max-width: 700px;
		line-height: 1.1;
		color: #7d7a7a;
	}

	.more-info-box {
		max-width: 700px;
	}

	label {
		min-width: 150px;
		display: inline-block;
		font-weight: bold;
	}

	input::placeholder {
		opacity: 0.5;
		font-size: 11px;
	}

	h2 {
		border-top: 1px solid darkgray;
		margin-right:  20px;
		line-height: 2;
	}

	.active {
		color: green;
	}

</style>

<h1>Analytics integrator settings</h1>

<h2>Google Analytics <?php echo !empty(get_option('analytics-integrator-google-analytics-id')) ? '<span class="active">(Active)</span>' : '' ?></h2>

<p class="description-box">Google Analytics is a powerful tool that allows website owners to track and analyze their website's traffic and user behavior. With its user-friendly interface and robust features, Google Analytics enables businesses to make data-driven decisions and improve their online presence. From tracking website traffic sources to analyzing user engagement and conversion rates, Google Analytics provides valuable insights into how users interact with your website. Get started with Google Analytics today and unlock the full potential of your website.</p>
<p class="more-info-box">
	To create project visit the official <a href="http://bit.ly/40Jc3oe">Google Analytics website</a>.<br/>You can find your measurement ID in <b>Settings > Data steams > Select your stream</b>. Read more in the <a href="http://bit.ly/3M9NLQi">official docs</a>.
</p>

<form method="post" action="options.php">
	<label for="analytics-integrator-google-analytics-id" class="<?php echo !empty(get_option('analytics-integrator-google-analytics-id')) ? 'active' : '' ?>">Measurement ID</label>
	<input type="text" id="analytics-integrator-google-analytics-id" name="analytics-integrator-google-analytics-id" value="<?php echo esc_attr(get_option('analytics-integrator-google-analytics-id')); ?>" placeholder="Leave blank to disable">
	<?php settings_fields('analytics-integrator-google-analytics'); ?>
	<?php submit_button('Save', 'primary', 'submit', false); ?>
</form>

<h2>FullStory <?php echo !empty(get_option('analytics-integrator-fullstory-id')) ? '<span class="active">(Active)</span>' : '' ?></h2>

<p class="description-box">FullStory is a web analytics and session replay platform that helps businesses understand and improve user experiences on their websites and mobile apps. It captures every user interaction and provides detailed insights through session replays, heatmaps, and conversion funnels. FullStory's powerful search and segmentation capabilities enable businesses to identify and prioritize areas for improvement, leading to increased conversions and customer satisfaction.</p>
<p class="more-info-box">
	To create project visit the official <a href="http://bit.ly/3JTQ1by">FullStory website</a>.<br/>You can find your Org ID in <b>Settings > Data Capture and Privacy > FullStory Setup</b> embedded in the FullStory snippet. Read more in the <a href="https://bit.ly/3M4hGJy">official docs</a>.
</p>

<form method="post" action="options.php">
	<label for="analytics-integrator-fullstory-id" class="<?php echo !empty(get_option('analytics-integrator-fullstory-id')) ? 'active' : '' ?>">Org ID</label>
	<input type="text" id="analytics-integrator-fullstory-id" name="analytics-integrator-fullstory-id" value="<?php echo esc_attr(get_option('analytics-integrator-fullstory-id')); ?>" placeholder="Leave blank to disable">
	<?php settings_fields('analytics-integrator-fullstory'); ?>
	<?php submit_button('Save', 'primary', 'submit', false); ?>
</form>

<h2>Hotjar <?php echo !empty(get_option('analytics-integrator-hotjar-id')) ? '<span class="active">(Active)</span>' : '' ?></h2>
<p class="description-box">Hotjar is a web analytics and user feedback tool that provides insights into user behavior on websites through session recordings, heatmaps, surveys, and feedback polls. With its easy-to-use interface, Hotjar helps businesses understand how users interact with their website, identify areas of improvement, and make data-driven decisions to optimize their user experience and increase conversions.</p>
<p class="more-info-box">
	To create project visit the official <a href="http://bit.ly/3ZCRBEu">Hotjar website</a>.<br/>You can find your Site ID in <b>Organization Settings > Organizations & sites</b>. Read more in the <a href="https://bit.ly/40WoBc5">official docs</a>.
</p>

<form method="post" action="options.php">
	<label for="analytics-integrator-hotjar-id" class="<?php echo !empty(get_option('analytics-integrator-hotjar-id')) ? 'active' : '' ?>">Site ID</label>
	<input type="text" id="analytics-integrator-hotjar-id" name="analytics-integrator-hotjar-id" value="<?php echo esc_attr(get_option('analytics-integrator-hotjar-id')); ?>" placeholder="Leave blank to disable">
	<?php settings_fields('analytics-integrator-hotjar'); ?>
	<?php submit_button('Save', 'primary', 'submit', false); ?>
</form>

<h2>Mouseflow <?php echo !empty(get_option('analytics-integrator-mouseflow-id')) ? '<span class="active">(Active)</span>' : '' ?></h2>
<p class="description-box">Mouseflow is a web analytics and user behavior tracking tool that helps businesses understand how visitors interact with their websites. It provides a range of features, including session replay, heatmaps, funnels, form analytics, and feedback tools. With Mouseflow, businesses can identify areas of improvement in their user experience, optimize their website's conversion rate, and ultimately increase customer satisfaction and retention.</p>
<p class="more-info-box">
	To create project visit the official <a href="http://bit.ly/3M7YRVG">Mouseflow website</a>.<br/>You can find your Website ID in <b>Settings > Website ID</b>. Read more in the <a href="https://bit.ly/42Ucu0J">official docs</a>.
</p>

<form method="post" action="options.php">
	<label for="analytics-integrator-mouseflow-id" class="<?php echo !empty(get_option('analytics-integrator-mouseflow-id')) ? 'active' : '' ?>">MouseFlow ID</label>
	<input type="text" id="analytics-integrator-mouseflow-id" name="analytics-integrator-mouseflow-id" value="<?php echo esc_attr(get_option('analytics-integrator-mouseflow-id')); ?>" placeholder="Leave blank to disable">
	<?php settings_fields('analytics-integrator-mouseflow'); ?>
	<?php submit_button('Save', 'primary', 'submit', false); ?>
</form>

<h2>Smartlook <?php echo !empty(get_option('analytics-integrator-smartlook-id')) ? '<span class="active">(Active)</span>' : '' ?></h2>
<p class="description-box">Smartlook is a web and mobile app analytics platform that allows users to track and analyze user behavior and interactions on their websites and mobile apps through session replays, heatmaps, funnels, and more. With its easy-to-use interface and powerful features, Smartlook helps businesses of all sizes improve their user experience and increase conversions.</p>
<p class="more-info-box">
	To create project visit the official <a href="http://bit.ly/3G9ioRR">Smartlook website</a>.<br/>You can find your Project key in <b>Project > Recording > Project key</b>. Read more in the <a href="http://bit.ly/3nEvxMv">official docs</a>.
</p>

<form method="post" action="options.php">
	<label for="analytics-integrator-smartlook-id" class="<?php echo !empty(get_option('analytics-integrator-smartlook-id')) ? 'active' : '' ?>">Project key</label>
	<input type="text" id="analytics-integrator-smartlook-id" name="analytics-integrator-smartlook-id" value="<?php echo esc_attr( get_option('analytics-integrator-smartlook-id') ); ?>" placeholder="Leave blank to disable">
	<?php settings_fields( 'analytics-integrator-smartlook' ); ?>
	<?php submit_button('Save', 'primary', 'submit',false); ?>
</form>
