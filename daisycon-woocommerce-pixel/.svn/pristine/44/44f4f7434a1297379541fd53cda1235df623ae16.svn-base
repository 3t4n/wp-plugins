<div class="wrap" id="dc-core-container">
	<div class="dc-core-container__header">
		<div class="dc-core-container__logo-auth">
			<img
				class="dc-core-container__header-logo"
				src="<?php echo plugin_dir_url(dirname(__FILE__)) . '../public/images/logo_transparent_daisycon.svg'; ?>"
				alt="<?php echo 'Daisycon WooCommerce pixel settings'; ?>"
				title="<?php echo 'Daisycon WooCommerce pixel settings'; ?>"
			/>
			<div class="dc-core-container__authenticated-user">
				<?php if (null !== $this->authenticatedUser): ?>
				<img
					class="dc-core-container__profile-image"
					src="<?= false === empty($this->authenticatedUser->profile_image) ? $this->authenticatedUser->profile_image : 'https://my.daisycon.com/images/profile/avatars/genderless-asian.svg'; ?>"
					alt="'Connected user image'"
				/>
				<div class="dc-core-container__logged-in-name">
					<span><b><?= 'Connected to Daisycon with' ?>:</b></span>
					<span><?= false === empty($this->authenticatedUser->name) ? esc_attr($this->authenticatedUser->name) : ''; ?></span>
					<span><?= false === empty($this->authenticatedUser->username) ? esc_attr($this->authenticatedUser->username) : ''; ?></span>
					<span>
						<a class="button button-secondary button-small" href="<?php echo esc_url(add_query_arg('logout', 'true')); ?>"><?='Disconnect' ?></a>
					</span>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<h1 class="dc-core-container__header-title">
			<?php echo 'Daisycon WooCommerce pixel settings'; ?>
		</h1>
	</div>

	<?php
		if (true === isset($_SESSION['dc_woocommerce_notices']) && true === is_array($_SESSION['dc_woocommerce_notices'])) {
			foreach($_SESSION['dc_woocommerce_notices'] as $index => $notice) {
				echo $notice;
				unset($_SESSION['dc_woocommerce_notices'][$index]);
			}
		}
	?>

	<?php if (null === $this->authenticatedUser): ?>
		<div class="dc-core-container__notice dc-core-container__notice--info">
			<p>The plugin is not connected to the Daisycon system. Please (re) connect to the Daisycon system to start configuration.</p>
			<p>
				<a class="button button-primary" href="<?= esc_attr($this->oAuthRedirectUri); ?>">Connect</a>
			</p>
		</div>
	<?php else: ?>

		<form method="post" action="options.php" id="dc-woocommerce-pixel-form" onsubmit="deleteCustomSetting('\\{id\\}', true)">
			<div id="is-general">
				<?php settings_fields($this->plugin_name); ?>
				<?php do_settings_sections($this->plugin_name); ?>
				<?php do_action('daisycon_woocommerce_pixel_general_tab'); ?>
			</div>

			<?php $nonce = wp_create_nonce('daisycon-woocommerce'); ?>
			<input type="hidden" name="nonce" value="<?php echo $nonce; ?>"/>
			<?php submit_button(); ?>
		</form>
		<script>
			if (document.readyState === 'complete' || document.readyState === 'interactive') {
				init();
			} else {
				document.addEventListener('DOMContentLoaded', () => init());
			}

			document.addEventListener('change', (event) => campaignChangeEvent(event));

			function init() {
				hideDummySection();
				updateMissingMatchingDomains();
				document.querySelector('[name*="updated_at"]').setAttribute('value', new Date().toLocaleString());
			}

			function updateMissingMatchingDomains() {
				[...document.querySelectorAll('[name*="[campaign_id]"]')]
					.filter((element) => {
						return true;
					})
					.filter((element) => {
						if (element.name.includes('dummy')) {
							return false;
						}

						return element.tagName === 'SELECT'
							? Boolean(element.options[element.selectedIndex].value)
							: Boolean(element.value);
					})
					.forEach((element) => loadMatchingDomains(element.name));
			}

			function createNewSection() {
				const dummyContainer = getDummyContainer();
				const nextId = getNextCustomId();

				document.getElementById('daisycon_woocommerce_options_dummy[dummy_add_another_language]')
					.closest('table')
					.insertAdjacentHTML(
						'beforebegin',
						dummyContainer.outerHTML.replaceAll('{id}', nextId)
							.replaceAll('dummy_', '')
					);

				[...document.body.querySelectorAll('[class*="dc-core-container__title--custom-"]')]
					.filter((element) => false === element.classList.contains('dc-core-container__title--custom-{id}'))
					.forEach((element) => element.closest('table').style.display = '');

				updateMissingMatchingDomains();

				return false;
			}

			function hideDummySection() {
				getDummyContainer().style.display = 'none';
			}

			function getNextCustomId() {
				return ([...document.body.querySelectorAll('[class*="dc-core-container__title--custom-"]')]
					.filter((element) => false === element.classList.contains('dc-core-container__title--custom-{id}'))
					.reduce((maxId, element) => Math.max(maxId, Number.parseInt(element.classList.toString().split('-').pop(), 10)), 0)) + 1;
			}

			function deleteCustomSetting(deleteId, force) {
				if (deleteId === '{id}' && !force) {
					return;
				}

				if (!force && !confirm('Are you sure you want to delete this custom configuration?')) {
					return;
				}

				const container = document.body.querySelector('.dc-core-container__title--custom-' + deleteId)
					.closest('table');
				container.parentNode.removeChild(container);
				return false;
			}

			function getDummyContainer() {
				return document.body.querySelector('.dc-core-container__title--custom-\\{id\\}')
					.closest('table');
			}

			function handleResponse(response) {
				if (!response.ok) {
					throw new Error(`Network response was not ok: ${response.statusText}`);
				}
				return response.json();
			}

			function campaignChangeEvent(event) {
				if (event.target && event.target.matches('[name*="campaign_id"]')) {
					loadMatchingDomains(event.target.name);
				}
			}

			function getValue(element, name) {
				return ([...element.closest('table').querySelectorAll('[name*="[' + name + ']"]')] ?? [])
					.filter((element) => {
						if (element.name?.includes('dummy')) {
							return false;
						}

						return element.tagName === 'SELECT'
							? Boolean(element.options[element.selectedIndex].value)
							: Boolean(element.value);
					})
					.reduce(
						(value, element) => {
							return value
								|| (element.tagName === 'SELECT' ? element.options[element.selectedIndex].value : element.value)
								|| null
						},
						null
					);
			}

			function loadMatchingDomains(campaignSelectName) {
				const domainInputName = campaignSelectName.replace('campaign_id', 'matching_domain').replace('[]', '');
				const domainElement = document.querySelector('[name="' + domainInputName + '"]');
				const advertiserId = getValue(domainElement, 'advertiser_id');
				const campaignId = getValue(domainElement, 'campaign_id');

				if (!advertiserId || !campaignId) {
					return;
				}

				const requestParameters = new URLSearchParams({
					action: 'load_matching_domains',
					advertiser_id: advertiserId,
					campaign_id: campaignId,
					key: campaignSelectName.toString(),
				});

				showMatchingDomainLoader(campaignSelectName);

				fetch(`${ajaxurl}?${requestParameters.toString()}`, {headers: {'Content-Type': 'application/json'}})
					.then((response) => handleResponse(response))
					.then((matchingDomains) => {
						populateMatchingDomainDropdown(campaignSelectName, campaignId, matchingDomains);
						hideMatchingDomainLoader(campaignSelectName);
					});
			}

			function showMatchingDomainLoader(campaignSelectName) {
				const domainInputName = campaignSelectName.replace('campaign_id', 'matching_domain').replace('[]', '');
				const loaderId = domainInputName + '_loader';
				const loader = document.getElementById(loaderId);
				if (!loader) {
					document.querySelector('[name="' + domainInputName + '"]')
						.insertAdjacentHTML('afterend', '<div id="' + loaderId + '" class="dc-woocommerce-spin" style="font-size: 1rem; width: 1rem; height: 1rem; color: #cccccc"><?= trim(file_get_contents(__DIR__ . '/../assets/spinner.svg')); ?></span>');
					return;
				}
				loader.style.display = '';
			}

			function hideMatchingDomainLoader(campaignSelectName) {
				const domainInputName = campaignSelectName.replace('campaign_id', 'matching_domain').replace('[]', '');
				const loaderId = domainInputName + '_loader';
				const loader = document.getElementById(loaderId);
				if (!loader) {
					return;
				}
				loader.style.display = 'none';
			}

			function populateMatchingDomainDropdown(campaignSelectName, selectedCampaign, matchingDomains) {
				const domainInputName = campaignSelectName.replace('campaign_id', 'matching_domain').replace('[]', '');

				const domainInput = document.querySelector('[name="' + domainInputName + '"]');

				domainInput.value = matchingDomains.matching_domain;
			}

			function createOption(matchingDomains, selectedMatchingDomains) {
				const selectOption = document.createElement('option');

				selectOption.value = matchingDomains.tracking_segment;
				selectOption.textContent = matchingDomains.tracking_segment;

				selectOption.selected = matchingDomains && matchingDomains.tracking_segment.toString() === selectedMatchingDomains.toString()

				return selectOption;
			}
		</script>
	<?php endif; ?>
</div>
