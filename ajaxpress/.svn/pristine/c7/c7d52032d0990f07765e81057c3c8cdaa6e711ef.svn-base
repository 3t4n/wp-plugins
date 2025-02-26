<?php
/**
 * AjaxPress Settings Page
 *
 * @package AjaxPress
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<div class="wrap ajaxpress" x-data="ajaxpress">
	<h1 class="wp-heading-inline">AjaxPress Settings</h1>

	<h2 class="nav-tab-wrapper">
		<a href="#general" class="nav-tab" :class="{ 'nav-tab-active' : 'general' === state.tab }" @click="state.tab = 'general'">General</a>
		<a href="#advanced" class="nav-tab" :class="{ 'nav-tab-active' : 'advanced' === state.tab }" @click="state.tab = 'advanced'">Advanced</a>
		<a href="#docs" class="nav-tab" :class="{ 'nav-tab-active' : 'docs' === state.tab }" @click="state.tab = 'docs'">Documentation</a>
	</h2>

	<div x-show="state.tab === 'general'" class="tab-content" :class="state.saving ? 'blur' : ''">

		<table class="form-table">
			<!-- navigation  -->
			<tr>
				<th scope="row"><label for="navigation">Fastest Navigation</label></th>
				<td>
					<input type="checkbox" id="navigation" name="navigation" x-model="options.navigation"/> 
					<label for="navigation">Enable Ajax navigation</label>
					<p class="description">Load posts, pages, products without reloading. </p>
				</td>
			</tr>

			<!-- search  -->
			<tr>
				<th scope="row"><label for="search">Fastest Search</label></th>
				<td>
					<input type="checkbox" id="search" name="search" x-model="options.search"/> 
					<label for="search">Enable Ajax search</label>
					<p class="description">Allow searching without reload the page. </p>
				</td>
			</tr>

			<!-- live search  -->
			<tr x-show="options.search">
				<th scope="row"><label for="search">Real-time Search</label></th>
				<td>
					<input type="checkbox" id="live_search" name="live_search" x-model="options.live_search"/> 
					<label for="live_search">Enable Real-time search <strong>(beta)</strong> </label>
					<p class="description">Allow real time searching while typing. </p>
				</td>
			</tr>

			<!-- comments  -->
			<tr>
				<th scope="row"><label for="comment">Fastest Comment</label></th>
				<td>
					<input type="checkbox" id="comment" name="comment" x-model="options.comment"/> 
					<label for="comment">Enable Ajax comment</label>
					<p class="description">Allow commenting without reload the page. </p>

				</td>
			</tr>


		</table>


		<button @click.prevent="Submit" class="button button-primary" x-text="buttonText"></button>
	</div>

	<div x-show="state.tab === 'advanced'" class="tab-content" :class="state.saving ? 'blur' : ''">
		<table class="form-table">

			<tr x-show="!options.navigation">
				<td></td>
				<td><a href="#" @click.prevent="state.tab = 'general'">Enable Ajax Navigation</a> to use these features</td>
			</tr>
			<!-- target  -->
			<tr :class="options.navigation ? '' : 'blur'">
				<th scope="row"><label for="target">Target element</label></th>
				<td>
					<input required type="text" id="target" name="target" x-model="options.target" placeholder="Target element"/>
					<p class="description">Target element to load content in.  Default: main </p>
					<p><a href="#" @click.prevent="state.tab = 'docs'">Still confused?</a></p>
				</td>
			</tr>
			<!-- excludes  -->
			<tr :class="options.navigation ? '' : 'blur'">
				<th scope="row"><label for="excludes">Exclude elements</label></th>
				<td>
					<textarea
					class="large-text"
					id="excludes" name="excludes" x-model="options.excludes" placeholder="Exclude elements"></textarea>
					<p class="description">Excludes elements from AjaxPress (separated by comma).</p>
				</td>
			</tr> 
		</table>

		<!-- error message -->
		<div x-show="error" class="notice notice-error">
			<p x-text="error"></p>
		</div>

		<button :disabled="error" @click.prevent="Submit" class="button button-primary" x-text="buttonText"></button>
	</div>

	<div x-show="state.tab === 'docs'" class="tab-content">
		<p>
			<h1>AjaxPress not working?</h1>
			<p>
				Make sure you properly configured
				<ul class="ul-disc">
					<li>Enable Ajax Navigation</li>
					<li>Target element</li>
				</ul>
			</p>
			<p><strong>Target element</strong> is a HTML element, acts as a container where content will be loaded. It may vary on your theme or template. You will find your desired target element by inspecting your website on frontend.
			If you didn't find your target element, just put #wp-content as target element. It will work for most of the themes.
		<br>Valid examples of target element are #content, .wp-content, main
		</p>
			<p>Default: main</p>
		</p>
		<hr />
		<h3>Extend AjaxPress?</h3>
		<p>
			You can extend AjaxPress by using hooks and events. <br />
		<a href="https://github.com/imjafran/AjaxPress" target="_blank"> Explore developer docs </a>
		</p>
		<p>
			<h3>Contributors</h3>
			<a href="https://github.com/imjafran" target="_blank"> Jafran Hasan </a> and 
			<a href="https://github.com/benni1516" target="_blank"> !Benni </a>
		</p>
		<p>
			<h3>Useful links</h3>
			<a href="https://wordpress.org/support/plugin/ajaxpress/reviews/#new-post" target="_blank">Rate us ★★★★★</a><br />
			<a href="https://wordpress.org/plugins/ajaxpress/#faq" target="_blank"> Frequently Asked Questions  </a><br />
			<a href="https://wordpress.org/support/plugin/ajaxpress/" target="_blank"> Support forum </a><br />
				<a href="https://wordpress.org/plugins/ajaxpress/#reviews" target="_blank"> User's feedbacks </a>
		</p>
	</div>

</div>


<style>
	.blur {
		opacity: 0.4;
		pointer-events: none;
	}
</style>