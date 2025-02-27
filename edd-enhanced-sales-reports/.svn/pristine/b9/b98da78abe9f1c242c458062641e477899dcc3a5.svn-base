( function($) {
	
	$( function() {

		// fire date range picker
		$( 'input[data-edd-enhanced-sales-reporting-range]' ).daterangepicker( {
			ranges: {
				'Today': [ moment(), moment() ],
				'Yesterday': [ moment().subtract( 1, 'days' ), moment().subtract( 1, 'days' ) ],
				'Last 7 Days': [ moment().subtract( 6, 'days' ), moment() ],
				'Last 30 Days': [ moment().subtract( 29, 'days' ), moment() ],
				'This Month': [ moment().startOf( 'month' ), moment().endOf( 'month' ) ],
				'Last Month': [ moment().subtract( 1, 'month' ).startOf( 'month' ), moment().subtract( 1, 'month' ).endOf( 'month' ) ],
				'This Year': [ moment().startOf( 'year' ), moment().endOf( 'year' ) ],
				'Last Year': [ moment().subtract( 1, 'year' ).startOf( 'year' ), moment().subtract( 1, 'year' ).endOf( 'year' ) ],
				'Lifetime': [ moment( '2010-01-01', 'YYYY-MM-DD' ), moment().endOf( 'month' ) ]
			},
			locale: {
				format: 'YYYY-MM-DD'
			}
		} );

		$( 'input[data-edd-enhanced-sales-reporting-renewal-range]' ).daterangepicker( {
			ranges: {
				'Today': [ moment(), moment() ],
				'Yesterday': [ moment().subtract( 1, 'days' ), moment().subtract( 1, 'days' ) ],
				'Last 7 Days': [ moment().subtract( 6, 'days' ), moment() ],
				'Last 30 Days': [ moment().subtract( 29, 'days' ), moment() ],
				'This Month': [ moment().startOf( 'month' ), moment().endOf( 'month' ) ],
				'Last Month': [ moment().subtract( 1, 'month' ).startOf( 'month' ), moment().subtract( 1, 'month' ).endOf( 'month' ) ],
				'This Year': [ moment().startOf( 'year' ), moment().endOf( 'year' ) ],
				'Last Year': [ moment().subtract( 1, 'year' ).startOf( 'year' ), moment().subtract( 1, 'year' ).endOf( 'year' ) ],
				'Lifetime': [ moment( '2010-01-01', 'YYYY-MM-DD' ), moment().endOf( 'month' ) ]
			},
			locale: {
				format: 'YYYY-MM-DD'
			}
		} );

		$( 'select[data-edd-enhanced-sales-reporting-selectbox]' ).each(function() {
			if ( '1' == $( this ).attr( 'data-edd-enhanced-sales-reporting-ajax' ) ) {
				$( this ).select2( {
					placeholder: 'Select an option',
					allowClear: true,
					ajax: {
						url: ajaxurl,
						delay: 300,
						type: 'POST',
						dataType: 'json',
						data: function( params ) {
							return {
								q: params.term,
								page: params.page,
								action: 'edd_esr_get_select_options',
								type: $( this ).attr( 'data-edd-enhanced-sales-reporting-source' ),
								security: $( this ).attr( 'data-nonce' )
							};
						}
					},
				} );

			} else {
				$( this ).select2( {
					placeholder: 'Select an option',
					allowClear: true,
				} );
			}
		} );

		var order_by = 0;
		if ( $( '.edd-enhanced-sales-reports-result table th[data-sortby]' ).length > 0 ) {
			order_by = $( '.edd-enhanced-sales-reports-result table th[data-sortby]' ).index();
		}

		$( '.edd-enhanced-sales-reports-result[data-type] table:not(.no-datatable)' ).each(function() {
			$( this ).DataTable( {
				dom: 'lfrtip',
				processing: true,
				serverSide: true,
				ajax: ajaxurl + '?action=edd_enhanced_sales_reports_get_filtered&type=' +  $( this ).closest( '.edd-enhanced-sales-reports-result' ).attr( 'data-type' ) + '&cache=' + $( this ).closest( '.edd-enhanced-sales-reports-result' ).attr( 'data-result' ),
				pageLength: 100,
				lengthMenu: [10, 25, 50, 100, 200, 500],
				order: [ [ order_by, 'desc' ] ]
			} );
		} );

		$( '.edd-enhanced-sales-reports-result:not([data-type]) table:not(.no-datatable)' ).DataTable( {
			dom: 'lfrtip',
			pageLength: 100,
			lengthMenu: [10, 25, 50, 100, 200, 500],
			order: [ [ order_by, 'desc' ] ]
		} );

		if ( $( '.edd-enhanced-sales-reports-chart' ).length > 0 ) {
			var config = {
				type: 'line',
				data: edd_enhanced_sales_reports_chart_data,
				options: {
					responsive: true,
					interaction: {
						intersect: false,
						axis: 'x'
					},
					scales: {
						y: {
							ticks: {
								callback: function( value, index, ticks ) {
									value = value.toFixed(0);
									value = value.split(/(?=(?:...)*$)/);
									value = value.join( edd_vars.thousands_separator );
									return edd_vars.currency_sign + value
								}
							}
						}
					},
					plugins: {
						tooltip: {
							callbacks: {
								label: function(context) {
									var label = context.dataset.label || '';

									if ( label ) {
										label += ': ';
									}
									
									if ( context.parsed.y !== null ) {
										label += edd_vars.currency_sign + context.parsed.y.toFixed( 0 )
									}
									
									return label;
								}
							}
						}
					},
					onClick: function( e ) {
						const points = earningsChart.getElementsAtEventForMode(e, 'nearest', { intersect: true }, true);

						if ( points.length ) {
							const firstPoint = points[0];
							const label = earningsChart.data.labels[firstPoint.index];
							let filtered_orders = window.location.search;
							filtered_orders = filtered_orders.replace( 'filter_date', 'orig_filter_date' );
							filtered_orders = filtered_orders.replace( 'sub-page', 'orig-sub-page' );
							filtered_orders += '&filter_date_range=' + label + '+-+' + label;
							filtered_orders += '&sub-page=by-ordered-products';

							window.location = filtered_orders;
						}
					}
				}
			};

			var ctx = document.getElementById( 'edd-enhanced-sales-reports-chart' ).getContext( '2d' );

			var earningsChart = new Chart( ctx, config );

			if ( $( '#edd-enhanced-sales-reports-secondary-chart' ).length > 0 ) {
				
				var config = {
					type: 'bar',
					data: edd_enhanced_sales_reports_secondary_chart_data,
					options: {
						responsive: true,
						interaction: {
							intersect: false,
							axis: 'x'
						},
						scales: {
							xAxes: {
								afterFit: function( scaleInstance ) {
									scaleInstance.width = 100;
								}
							},
							y: {
								ticks: {
									callback: function( value, index, ticks ) {
										value = value.toFixed(0);
										value = value.split(/(?=(?:...)*$)/);
										value = value.join( edd_vars.thousands_separator );
										return edd_vars.currency_sign + value
									}
								}
							}
						},
						plugins: {
							tooltip: {
								callbacks: {
									label: function( context ) {
										var label = context.dataset.label || '';

										if ( label ) {
											label += ': ';
										}
										
										if ( context.parsed.y !== null ) {
											label += edd_vars.currency_sign + context.parsed.y.toFixed( 0 )
										}
										
										return label;
									}
								}
							}
						}
					}
				};

				var ctx = document.getElementById( 'edd-enhanced-sales-reports-secondary-chart' ).getContext( '2d' );

				var earningsChartSecondary = new Chart( ctx, config );
			}

			if ( $( '#edd-enhanced-sales-reports-tertiary-chart' ).length > 0 ) {
				
				var config = {
					type: 'bar',
					data: edd_enhanced_sales_reports_tertiary_data,
					options: {
						responsive: true,
						interaction: {
							intersect: false,
							axis: 'x'
						},
						scales: {
							xAxes: {
								afterFit: function( scaleInstance ) {
									scaleInstance.width = 100;
								}
							},
							y: {
								ticks: {
									callback: function( value, index, ticks ) {
										value = value.toFixed(0);
										value = value.split(/(?=(?:...)*$)/);
										value = value.join( edd_vars.thousands_separator );
										return edd_vars.currency_sign + value
									}
								}
							}
						},
						plugins: {
							tooltip: {
								callbacks: {
									label: function( context ) {
										var label = context.dataset.label || '';

										if ( label ) {
											label += ': ';
										}
										
										if ( context.parsed.y !== null ) {
											label += edd_vars.currency_sign + context.parsed.y.toFixed( 0 )
										}
										
										return label;
									}
								}
							}
						}
					}
				};

				var ctx = document.getElementById( 'edd-enhanced-sales-reports-tertiary-chart' ).getContext( '2d' );

				var earningsChartSecondary = new Chart( ctx, config );
			}

		}

		if ( $( '.edd-enhanced-sales-reports-day-sales-chart' ).length > 0 ) {
			var config = {
				type: 'line',
				data: edd_enhanced_sales_reports_day_chart_data,
				options: {
					responsive: true,
					interaction: {
						intersect: false,
						axis: 'x'
					},
					scales: {
						y: {
							ticks: {
								callback: function( value, index, ticks ) {
									value = value.toFixed(0);
									value = value.split(/(?=(?:...)*$)/);
									value = value.join( edd_vars.thousands_separator );
									return edd_vars.currency_sign + value
								}
							}
						}
					},
					plugins: {
						tooltip: {
							callbacks: {
								label: function( context ) {
									var label = context.dataset.label || '';

									if ( label ) {
										label += ': ';
									}
									
									if ( context.parsed.y !== null ) {
										label += edd_vars.currency_sign + context.parsed.y.toFixed( 0 )
									}
									
									return label;
								}
							}
						}
					},
					onClick: function( e ) {
						const points = earningsChart.getElementsAtEventForMode( e, 'nearest', { intersect: true }, true );
					}
				}
			};

			var ctx = document.getElementById( 'edd-enhanced-sales-reports-view-chart' ).getContext( '2d' );

			var earningsDayChart = new Chart( ctx, config );

		}

		$( '.edd-esr-chart-tabs-hds a' ).on( 'click', function( e ) {
			e.preventDefault();
			if ( $( this ).hasClass( 'edd-esr-chart-tab-active' ) ) {
				return;
			}

			$( this ).addClass( 'edd-esr-chart-tab-active' )
				.siblings( 'a' )
				.removeClass( 'edd-esr-chart-tab-active' );
			
			if ( 'sales' === $( this ).attr( 'data-type' ) ) {
				$( '.edd-esr-active' ).removeClass( 'edd-esr-active' );
			} else if( 'tertiary-chart' === $( this ).attr( 'data-type' ) ) {
				$( '.edd-esr-tertiary-chart' )
					.addClass( 'edd-esr-active' )
					.siblings( '.edd-esr-active' )
						.removeClass( 'edd-esr-active' );
			} else {
				$( '.edd-esr-secondary-chart' )
					.addClass( 'edd-esr-active' )
					.siblings( '.edd-esr-active' )
						.removeClass( 'edd-esr-active' );
			}

		} );

		$ ( '.edd-advanced-sales-reports-filters-hide' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.edd-advanced-sales-reports-filters-toggle' ).addClass( 'edd-advanced-sales-reports-filters-hidden' );
			$( '.edd-enhanced-sales-reports-form-filters-wrap' ).stop().slideUp()
		} );
		
		$ ( '.edd-advanced-sales-reports-filters-show' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.edd-advanced-sales-reports-filters-toggle' ).removeClass( 'edd-advanced-sales-reports-filters-hidden' );
			$( '.edd-enhanced-sales-reports-form-filters-wrap' ).stop().slideDown()
		} );

		$( 'body' ).on( 'click', '.edd-enhanced-sales-reports-view-details', function( e ) {
			e.preventDefault();
			$( '.edd-enhanced-sales-reports-reporting-body' ).html( $( this ).next( '.edd-enhanced-sales-reports-details' ).html() );
			$( '.edd-enhanced-sales-reports-reporting-modal-overlay' ).addClass( 'edd-enhanced-sales-reports-reporting-modal-active' );

			if ( $( '.edd-enhanced-sales-reports-reporting-body table' ).length > 0 ) {
				$( '.edd-enhanced-sales-reports-reporting-body table' ).DataTable( {
					dom: 'lfrtip',
					pageLength: 10,
				} );
			}

		} );

		$( '.edd-enhanced-sales-reports-reporting-modal-close,.edd-enhanced-sales-reports-reporting-modal-overlay' ).on( 'click', function( e ) {
			e.preventDefault();
			$( '.edd-enhanced-sales-reports-reporting-modal-overlay' ).removeClass( 'edd-enhanced-sales-reports-reporting-modal-active' );
		} );

		if ( $( '.edd-enhanced-sales-reports-subscription-callout-wrapper' ).length > 0 ) {
			// Overtake the form submission request.
			$( '.edd-enhanced-sales-reports-subscription-form' ).on( 'submit', function( e ) {
				e.preventDefault();
				
				if ( $( '.edd-enhanced-sales-reports-subscription-callout' ).hasClass( 'edd-enhanced-sales-reports-ajaxing' ) ) {
					return; // request is already in progress.
				}

				$( '.edd-enhanced-sales-reports-subscription-callout' ).addClass( 'edd-enhanced-sales-reports-ajaxing' );

				$.ajax( {
					url: ajaxurl,
					type: 'POST',
					dataType: 'JSON',
					data: {
						action: 'edd_enhanced_sales_reports_handle_subscription_request',
						email: $( '.edd-enhanced-sales-reports-subscription-form input' ).val(),
						security: $( '.edd-enhanced-sales-reports-subscription-form input[name="_wpnonce"]' ).val(),
						from_callout: 1,
					},
					success: function( data ) {
						$( '.edd-enhanced-sales-reports-subscription-callout-main' ).hide();
						$( '.edd-enhanced-sales-reports-subscription-callout-thanks' ).show();
					}
				} )
				.fail( function() {
					$( '.edd-enhanced-sales-reports-subscription-error' ).show();
				} )
				.always( function() {
					$( '.edd-enhanced-sales-reports-subscription-callout' ).removeClass( 'edd-enhanced-sales-reports-ajaxing' );
				} );
			} );
		}
	} );

} )( jQuery );