/* global ajaxurl */
jQuery(function ($) {
	const
		$cw = $('div.icount_settings_context'),
		$form = $cw
			.closest('form#mainform')
			.on(
				'submit',
				function (e) {
					let $errors_elems = $();
					if($payment_page_select.val() === '')
						$errors_elems = $errors_elems.add($payment_page_select);
					if(!$token_access_button.data('is-authorized'))
						$errors_elems = $errors_elems.add($token_access_button);

					$errors_elems
						.closest('.forminp')
						.one(
							'click',
							function (e) {
							$(this).removeClass('icount_settings_error')
						})
						.addClass('icount_settings_error')
						.first()
						.each(() => {
							e.preventDefault();
						});
				}
			),
		plugin_id = $cw.data('plugin-id'),
		$payment_page_select = $cw
			.find(':input[data-type=paypage]'),
		$token_access_button = $cw
			.find('[data-type=token_access]')
			.click(function () {
				$token_access_dialog.dialog('open');
			}),
		$token_access_dialog = $token_access_button
			.next()
			.dialog(
				{
					width: 450,
					closeText: '',
					autoOpen: false,
					modal: true,
					buttons: {
						Apply: function () {
							const $dialog = $(this);
							let form_data = {};
							$dialog
								.find(':input')
								.each(function () {
									const $this = $(this);
									form_data[$this.attr('name')] = $this.val();
								});
							$.post(
								'/',
								{
									'wc-api': plugin_id + '-token_access',
									...form_data,
								},
								function (data) {
									const {
										status = false,
										info = '',
										cid = null,
										user = null,
										token_masked = null,
									} = data ?? [];
									if (status) {
										window.location.reload();
										// $dialog.dialog('close');
										// $token_access_button.val(`Authorized ${cid}/${user} (${token_masked}) `);
									} else {
										$dialog
											.find('.warning')
											.text(info);
									}
								},
								'json'
							);
						}
					},
					close: function (event) {
						$(event.target)
							.find('input')
							.val('')
							.end()
							.find('.warning')
							.empty()
							.end();
					}
				});

	$payment_page_select
		.closest('td')
		.find('button:first')
		.click(
			e => {
				e.preventDefault();
				$.post(
					'/',
					{
						'wc-api': plugin_id + '-paypage_generate',
					},
					function (data) {
						const {
							status = false,
							paypage_id = null,
							paypage_name = null,
							info = '',
						} = data;

						if (status) {
							$payment_page_select
								.append(
									$('<option>')
										.prop({
											value: paypage_id,
											selected: true
										})
										.text(paypage_name)
								)
						} else {
							console.log(info);
						}
					},
					'json'
				);
			}
		)
});

