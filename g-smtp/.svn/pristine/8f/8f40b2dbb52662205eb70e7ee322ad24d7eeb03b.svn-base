/* global g_smtp_vars */
/**
 * Handling functionality in the backend
 */
class GSmtp {

	/**
	 * Setup method
	 *
	 * @return {void}
	 */
	static setup() {
		const smtp = new GSmtp();
		smtp.init();
	}

	/**
	 * Init method
	 *
	 * @return {void}
	 */
	init() {
		this.addEventListeners();
	}

	/**
	 * Add event listeners
	 *
	 * @return {void}
	 */
	addEventListeners() {
		document.querySelectorAll('.g-smtp-test-email-btn').forEach(btn => {
			btn.addEventListener('click', event => this.sendTestEmail(event));
		});

		document.querySelectorAll('.g-smtp-config-generator').forEach(generatorEl => {
			const configGenerator = new GSmtpConfigGenerator(generatorEl);
			generatorEl.gSmtpConfigGenerator = configGenerator;

			configGenerator.init();
		});
	}

	/**
	 * Send test e-mail
	 *
	 * @param {Event} event
	 * @return {void}
	 */
	sendTestEmail(event) {
		event.preventDefault();

		const btn = event.target.closest('.g-smtp-test-email-btn');

		const emailInput = btn.parentElement.querySelector('.g-smtp-test-email-input');

		const email = emailInput ? emailInput.value : '';

		const formData = new FormData();
		formData.append('security', btn.dataset.security);
		formData.append('action', 'g_smtp_test_email');
		formData.append('email', email);

		// Clear previous messages
		btn.parentElement.querySelectorAll('.g-smtp-test-email-message')
			.forEach(messageEl => messageEl.remove());

		fetch(
			g_smtp_vars.ajax_url,
			{
				method: 'POST',
				body: formData
			}
		).then(response => {
			response.json().then(data => {
				const classes = ['g-smtp-test-email-message', 'notice'];

				if (response.ok) {
					classes.push('notice-success');
				} else {
					classes.push('notice-error');
				}

				btn.insertAdjacentHTML(
					'afterend',
					'<div class="' + classes.join(' ') + '"><p>' + data.data.message + '</p></div>'
				);
			});
		});
	}

}

if (document.readyState === 'interactive' || document.readyState === 'complete') {
	GSmtp.setup();
} else {
	window.addEventListener('load', GSmtp.setup);
}

/**
 * Config generator
 */
class GSmtpConfigGenerator {
	/**
	 * Handles config generation
	 *
	 * @param {HTMLElement} wrapperEl 
	 */
	constructor(wrapperEl) {
		this.wrapperEl = wrapperEl;
		this.codeBlockCopyWrapperEl = this.wrapperEl.querySelector('.g-smtp-code-block-copy-wrapper');
		this.codeBlockEl = this.wrapperEl.querySelector('.g-smtp-code-block');
		this.smtpHostEl = this.wrapperEl.querySelector('[name="smtp_host"]');
		this.smtpPortEl = this.wrapperEl.querySelector('[name="smtp_port"]');
		this.smtpEncryptionEl = this.wrapperEl.querySelector('[name="smtp_encryption"]');
		this.smtpUsernameEl = this.wrapperEl.querySelector('[name="smtp_username"]');
		this.smtpPasswordEl = this.wrapperEl.querySelector('[name="smtp_password"]');
		this.smtpFromNameEl = this.wrapperEl.querySelector('[name="smtp_from_name"]');
		this.smtpFromAddressEl = this.wrapperEl.querySelector('[name="smtp_from_address"]');
		this.smtpForceFromEl = this.wrapperEl.querySelector('[name="smtp_force_from"]');
	}

	/**
	 * Initialize the functionality
	 *
	 * @return {void}
	 */
	init() {
		this.addEventListeners();
	}

	/**
	 * Add event listeners
	 *
	 * @return {void}
	 */
	addEventListeners() {
		this.wrapperEl.querySelectorAll('input').forEach(inputEl => {
			inputEl.addEventListener('input', () => this.updateConfig());
		});

		this.wrapperEl.querySelector('.g-smtp-code-block-copy')
			.addEventListener('click', event => this.copyToClipboard(event));
	}

	/**
	 * Copy code to clipboard
	 *
	 * @param {Event} event
	 * @return {void}
	 */
	copyToClipboard(event) {
		event.preventDefault();

		const btn = event.target.closest('.g-smtp-code-block-copy');

		const config = this.generateConfig();

		const copySuccessText = btn.dataset['success'];
		const copyFailText = btn.dataset['fail'];

		const printCopyNotice = (success) => {
			const copyNotice = document.createElement('span');
			copyNotice.classList.add('g-smtp-code-block-copy-notice');

			copyNotice.innerText = success ? copySuccessText : copyFailText;

			this.codeBlockCopyWrapperEl.appendChild(copyNotice);

			setTimeout(() => {
				copyNotice.remove();
			}, 1000);
		};

		try {
			navigator.clipboard.writeText(config).then(() => {
				// Successful copy
				printCopyNotice(true);
			}, () => {
				// Copy failed
				printCopyNotice(false);
			});
		} catch (e) {
			printCopyNotice(false);
		}
	}

	/**
	 * Generate config based on entered fields
	 *
	 * @return {String}
	 */
	generateConfig() {
		const NEW_LINE = "\n";

		let config = '// G-SMTP settings' + NEW_LINE;
		config += 'define( \'G_SMTP_ENABLED\', true );';

		const host = this.smtpHostEl.value;
		const port = this.smtpPortEl.value;
		const encryption = this.smtpEncryptionEl.value;
		const username = this.smtpUsernameEl.value;
		const password = this.smtpPasswordEl.value;
		const fromName = this.smtpFromNameEl.value;
		const fromAddress = this.smtpFromAddressEl.value;
		const forceFrom = this.smtpForceFromEl.checked;

		let hostPortBlock = '';

		if (host.length > 0) {
			hostPortBlock += NEW_LINE + 'define( \'G_SMTP_HOST\', \'' + host + '\' );';
		}

		if (port.length > 0) {
			hostPortBlock += NEW_LINE + 'define( \'G_SMTP_PORT\', \'' + port + '\' );';
		}

		if (hostPortBlock.length > 0) {
			config += hostPortBlock;
		}

		if (encryption.length > 0) {
			config += NEW_LINE + 'define( \'G_SMTP_ENCRYPTION\', \'' + encryption + '\' );';
		}

		let authBlock = '';

		if (username.length > 0) {
			authBlock += NEW_LINE + 'define( \'G_SMTP_USER\', \'' + username + '\' );';
		}

		if (password.length > 0) {
			authBlock += NEW_LINE + 'define( \'G_SMTP_PASSWORD\', \'' + password + '\' );';
		}

		if (authBlock.length > 0) {
			config += authBlock;
		}

		let fromBlock = '';

		if (fromName.length > 0) {
			fromBlock += NEW_LINE + 'define( \'G_SMTP_FROM_NAME\', \'' + fromName + '\' );';
		}

		if (fromAddress.length > 0) {
			fromBlock += NEW_LINE + 'define( \'G_SMTP_FROM_ADDRESS\', \'' + fromAddress + '\' );';
		}

		if (forceFrom) {
			fromBlock += NEW_LINE + 'define( \'G_SMTP_FORCE_FROM\', true );';
		}

		if (fromBlock.length > 0) {
			config += fromBlock;
		}

		return config;
	}

	/**
	 * Generate config based on entered fields
	 *
	 * @return {void}
	 */
	updateConfig() {
		this.codeBlockEl.innerHTML = this.generateConfig();
	}
}