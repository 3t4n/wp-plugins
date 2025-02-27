/**
 * @summary Track moved nodes in the front-end builder.
 *
 * @author WEBDOGS
 * @since  1.0.0
 */

import restRequest from '../rest-request/rest-request';

/**
 * @summary Track the builder nodes that may have been moved during an editor session.
 * @since      1.0.0
 *
 * @see restRequest
 */
export default function () {
	if (
		! window.FLBuilder ||
		! window.jQuery ||
		! window.simpleHistoryBuilderTracking
	) {
		/* eslint-disable no-console -- Log errors */
		console.log( window.FLBuilder );
		console.log( window.jQuery );
		console.log( window.simpleHistoryBuilderTracking );
		/* eslint-enable no-console */
		return;
	}

	window.simpleHistoryBuilderTracking.postData = {};

	// Fetch the current post state.
	restRequest(
		'GET',
		null,
		window.simpleHistoryBuilderTracking.postTypeRestBase,
		window.simpleHistoryBuilderTracking.postId,
		null,
		null,
		{
			'X-WP-Nonce': window.simpleHistoryBuilderTracking.restNonce,
			'Content-Type': 'application/json;charset=UTF-8',
		},
		( response ) => {
			if ( response && response.id ) {
				window.simpleHistoryBuilderTracking.postData = response;
			} else {
				/* eslint-disable no-console -- Log errors */
				console.log( {
					response,
					simpleHistoryBuilderTracking:
						window.simpleHistoryBuilderTracking,
				} );
				/* eslint-enable no-console */
			}
		}
	);

	// Listen for the sortchange event on builder nodes and save the node id of any moved nodes.
	window
		.jQuery(
			[
				`${ window.FLBuilder._contentClass } .fl-col-content`,
				`${ window.FLBuilder._contentClass } .fl-row-drop-target`,
				`${ window.FLBuilder._contentClass } .fl-col-group-drop-target`,
				`${ window.FLBuilder._contentClass } .fl-col-drop-target`,
				`${ window.FLBuilder._contentClass } .fl-drop-target`,
			].join( ',' )
		)
		.on( 'sortchange', function ( event, ui ) {
			let movedNodeId = null;

			if ( ui && ui.item && ui.item.content ) {
				movedNodeId = ui.item.context.getAttribute( 'data-node' );
			} else if (
				ui &&
				ui.item &&
				ui.item[ 0 ] &&
				ui.item[ 0 ].getAttribute
			) {
				movedNodeId = ui.item[ 0 ].getAttribute( 'data-node' );
			}

			if ( ! movedNodeId ) {
				const draggingElements = document.getElementsByClassName(
					'fl-node-dragging'
				);

				if ( draggingElements && draggingElements.length ) {
					movedNodeId = draggingElements[ 0 ].getAttribute(
						'data-node'
					);
				}
			}

			if ( ! movedNodeId ) {
				return;
			}

			if ( ! window.simpleHistoryBuilderTracking.postData.meta ) {
				window.simpleHistoryBuilderTracking.postData.meta = {};
			}

			if (
				! window.simpleHistoryBuilderTracking.postData.meta.node_moved
			) {
				window.simpleHistoryBuilderTracking.postData.meta.node_moved = [];
			}

			// Update the node_moved post meta to include new moved nodes.
			restRequest(
				'POST',
				null,
				window.simpleHistoryBuilderTracking.postTypeRestBase,
				window.simpleHistoryBuilderTracking.postId,
				null,
				{
					meta: {
						node_moved: [
							movedNodeId,
							...window.simpleHistoryBuilderTracking.postData.meta
								.node_moved,
						].filter(
							( value, index, array ) =>
								array.indexOf( value ) === index
						),
					},
				},
				{
					'X-WP-Nonce': window.simpleHistoryBuilderTracking.restNonce,
					'Content-Type': 'application/json;charset=UTF-8',
				},
				( response ) => {
					if ( response && response.id ) {
						window.simpleHistoryBuilderTracking.postData = response;
					}
				}
			);
		} );

	// Clear the local cache of moved nodes on didPublishLayout.
	window.FLBuilder.addHook( 'didPublishLayout', () => {
		if ( ! window.simpleHistoryBuilderTracking.postData.meta ) {
			window.simpleHistoryBuilderTracking.postData.meta = {};
		}

		window.simpleHistoryBuilderTracking.postData.meta.node_moved = [];
	} );
}
