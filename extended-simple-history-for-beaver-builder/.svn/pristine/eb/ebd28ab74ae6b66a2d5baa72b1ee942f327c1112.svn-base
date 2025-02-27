/**
 * @summary UI actions for the logger dashboard widget.
 *
 * @author WEBDOGS
 * @since  1.0.0
 */
{
	const init = () => {
		/**
		 * @summary Set up the expand/collapse buttons in the dashboard widget.
		 */
		const setupButtons = () => {
			[].forEach.call(
				document.querySelectorAll(
					`.SimpleHistoryLogitem--logger-${ window.extendedSimpleHistoryBeaverBuilder.loggerSlug } button.${ window.extendedSimpleHistoryBeaverBuilder.cssPrefix }-diff-label:not( .actions-set )`
				),
				( button ) => {
					if (
						! button.nextElementSibling ||
						! button.nextElementSibling.classList.contains(
							`${ window.extendedSimpleHistoryBeaverBuilder.cssPrefix }-diff-container`
						)
					) {
						return;
					}

					// On the button click event, toggle classes to expand/collapse the targeted sections.
					button.addEventListener( 'click', ( event ) => {
						event.preventDefault();
						event.target.nextElementSibling.classList.toggle(
							'active'
						);
						event.target.classList.toggle( 'active' );
					} );

					button.classList.add( 'actions-set' );
				}
			);
		};

		/*
		 * On the document click event, check to see if the click target is a button without set-up actions,
		 * then toggle classes to expand/collapse the targeted sections and set actions on any not-set-up buttons.
		 */
		document.documentElement.ownerDocument.addEventListener(
			'click',
			( event ) => {
				if (
					event.target.classList &&
					event.target.classList.contains(
						`${ window.extendedSimpleHistoryBeaverBuilder.cssPrefix }-diff-label`
					) &&
					! event.target.classList.contains( 'actions-set' ) &&
					event.target.nextElementSibling &&
					event.target.nextElementSibling.classList &&
					event.target.nextElementSibling.classList.contains(
						`${ window.extendedSimpleHistoryBeaverBuilder.cssPrefix }-diff-container`
					)
				) {
					event.preventDefault();
					event.target.nextElementSibling.classList.toggle(
						'active'
					);
					event.target.classList.toggle( 'active' );

					setupButtons();
				}
			}
		);
	};

	if (
		'complete' === document.readyState ||
		'interactive' === document.readyState
	) {
		init();
	} else {
		document.documentElement.ownerDocument.addEventListener(
			'DOMContentLoaded',
			init
		);
	}
}
