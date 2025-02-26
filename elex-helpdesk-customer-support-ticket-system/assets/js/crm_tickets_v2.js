var dt_columns, dt_available_fields, dt_active_fields, dt_page_columns, dtTable, templates, accesses, dtFilter = {
	action: 'eh_crm_v2_tickets',
	view: {}
};

(function ($) {
	const get_field_label = (slug, default_val) => {
		const field       = dt_available_fields.filter( avail_field => avail_field.slug === slug );
		return field.length ? field[0].title : default_val;
	};

	$.noConflict();
    const dataTable = $.fn.dataTable;

	function initDataTable() {
    $.fn.dataTable = dataTable;
		$.fn.dataTable.ext.buttons.advance_filter = {
			text: '<span class="glyphicon glyphicon-filter"></span>',
			action: function ( e, dt, node, config ) {
				node.toggleClass( 'btn-focused' );
				jQuery( '#all_tickets_advanced_filters' ).toggleClass( 'hidden btn-focused' );
			}
		};
		$.fn.dataTable.ext.buttons.reload         = {
			text: '<span class="glyphicon glyphicon-refresh"></span>',
			action: function ( e, dt, node, config ) {
				dtFilter.selectAll = false;
				dtTable.rows().deselect();
				// reset_dtfilter();
				dtTable.draw();
				loadCount();
			}
		};
		$.fn.dataTable.ext.buttons.trash          = {
			dom: {
				button: {
					className: 'dt-trash'
				}
			},
			text: '<span title="Delete" class="glyphicon glyphicon-trash"></span>',
			action: function ( e, dt, node, config ) {
				if ( ! User().can( 'delete_tickets' )) {
					alert( "You dont have access to delete tickets" );
					return;
				}
				var params       = {};
				var selectedRows = dtTable.rows( {selected: true} ).data();

				if ( ! dtFilter.selectAll) {
					params.tickets_id = [];
					for (var i = 0; i < selectedRows.length; i++) {
						params.tickets_id.push( selectedRows[i].ticket_id );
					}
				}
				promptDeleteTicket( params );
			}
		};
		$.fn.dataTable.ext.buttons.edit           = {
			dom: {
				button: {
					className: 'dt-edit'
				}
			},
			text: '<span title="Edit" class="glyphicon glyphicon-edit"></span>',
			action: function ( e, dt, node, config ) {
				var ticket_id    = [];
				var selectedRows = dtTable.rows( {selected: true} ).data();

				if ( ! dtFilter.selectAll) {
					for (var i = 0; i < selectedRows.length; i++) {
						ticket_id.push( selectedRows[i].ticket_id );
					}
				}
				jQuery('#assignee_ticket_edit').val('').trigger('change');
				jQuery('#label_ticket_edit').val('').trigger('change');
				jQuery('#tags_ticket_edit').val('').trigger('change');
				jQuery('#title_ticket_edit').val('').trigger('change');
				jQuery('#reply_textarea_edit').val('').trigger('change');
				jQuery('#reply_textarea_edit').find('.ql-editor').html('');

				jQuery( "#edit_tickets_modal" ).modal( "toggle" );
				jQuery( "#edit_ticket_ids" ).val( ticket_id );
				jQuery( ".number_of_tickets" ).html( ticket_id.length );
				jQuery('.attachment_reply').val('')
				jQuery('.upload_preview_edit').html('')
			}
		};
		let table_sorted_columns                  = [
			{
				data: "checkbox",
				orderable: false,
				className: 'select-checkbox',
				sort_index: -3,
				render: function () {
					return '';
				},
				title: '<input id="selectCurrentPageRows" type="checkbox" onchange="toggleRowSelection(this.checked)">'
		},
			{
				data: "view",
				orderable: false,
				title: "View",
				sort_index: -2,
				render: function (data, type, row) {
					var html = jQuery(
						'<button class="btn btn-default btn-xs btn_quick_view_ticket">' +
						'<span class="glyphicon glyphicon-eye-open" ></span>' +
						'</button>'
					);
					if (row.badge_color && row.badge_color.badge_color) {
						html.css( {'background-color': row.badge_color.badge_color} );
					}
					return html[0].outerHTML;
				}
		},
			{
				data: "ticket_id",
				title: "#",
				sort_index: -1,
				render: function (data) {
					return '<a href="#" class="ticket_row_item" onclick="loadSingleTicketTab(' + data + ')">' + data + '</a>';
				},
				visible: dt_page_columns.indexOf( 'id' ) > -1,
				className: dt_page_columns.indexOf( 'id' ) > -1 ? '' : 'never',
		},
			{
				data: "ticket_email",
				title: get_field_label( 'request_email', "Requestor" ),
				orderable: false,
				visible: dt_page_columns.indexOf( 'requestor' ) > -1,
				className: dt_page_columns.indexOf( 'requestor' ) > -1 ? '' : 'never',
		},
			{
				data: "ticket_title",
				title: get_field_label( 'request_title', "Subject" ),
				orderable: false,
				autoWidth: false,
				visible: dt_page_columns.indexOf( 'subject' ) > -1,
				className: dt_page_columns.indexOf( 'subject' ) > -1 ? '' : 'never',
				render: title => {
					let html                      = `<p class="wrap_content m-0" title="${title}" data-toggle="wsdesk_tooltip" data-container="body" data-original-title="${title}" >${title}</p> `;
					return html;
				}
		},
			].concat( dt_columns ).concat(
				[
				{
					data: "ticket_date",
					title: get_field_label( 'ticket_date', "Requested" ),
					visible: dt_page_columns.indexOf( 'requested' ) > -1,
					className: dt_page_columns.indexOf( 'requested' ) > -1 ? '' : 'never',
				},
				{
					data: "ticket_updated",
					title: "Updated",
					title: get_field_label( 'ticket_updated', "Updated" ),
					visible: dt_page_columns.indexOf( 'updated' ) > -1,
					className: dt_page_columns.indexOf( 'updated' ) > -1 ? '' : 'never',
				},
				{
					data: "assignees",
					title: "Assignee",
					title: get_field_label( 'assignees', "Assignee" ),
					orderable: false,
					visible: dt_page_columns.indexOf( 'assignee' ) > -1,
					className: dt_page_columns.indexOf( 'assignee' ) > -1 ? '' : 'never',
					render: function (data) {
						return data.join( ', ' );
					}
				},
				{
					data: "ticket_rating",
					orderable: false,
					visible: dt_page_columns.indexOf( 'feedback' ) > -1,
					className: dt_page_columns.indexOf( 'feedback' ) > -1 ? '' : 'never',
					title: "Feedback",
					render: function (data) {
						if (data === undefined) {
							return '<span class="glyphicon glyphicon-time"></span>';
						}
						if (data === 'great') {
							return '<span class="glyphicon glyphicon-thumbs-up" style="color: green"></span>';
						}

						return '<span class="glyphicon glyphicon-thumbs-down" style="color: red"></span>'
					}
				},
				]
			);

			table_sorted_columns = table_sorted_columns.map(
				(column) => {
					if (typeof column.sort_index !== 'undefined') {
						return column;
					}
				const page_column_field_map = {
						ticket_email: 'requestor',
						ticket_title: 'subject',
						ticket_date: 'requested',
						ticket_updated: 'updated',
						ticket_rating: 'feedback',
						assignees: 'assignee',
					};
				let slug                    = page_column_field_map[column.data] || column.data;
				let index                   = dt_page_columns.indexOf( slug );
					if (++index) {
						column.sort_index = index;
					}
				return column;
				}
			);

			table_sorted_columns = table_sorted_columns.map(
				(column) => {
				let slug         = column.data;
					if (['checkbox', 'view', 'id'].indexOf( column.data ) > -1) {
						return column;
					}
				/*
				if (dt_active_fields.indexOf(slug) < 0) {
					column.visible = false;
				} */

				return column;
				}
			);
			table_sorted_columns = table_sorted_columns.map(
				(column) => {
				let slug         = column.data;
					if (slug.indexOf( 'request_' ) >= 0) {
						slug = slug.replace( 'request_', 'ticket_' )
					}
				return column;
				}
			);

        table_sorted_columns.sort((a, b) => (a.sort_index ) - (b.sort_index ));

        const order_column_index = table_sorted_columns.findIndex(column => {
            return column.data === 'ticket_updated';
        });

		if (jQuery('#all_tickets_table_v2').length) {
		dtTable = $('#all_tickets_table_v2').DataTable({
            stateSave: true,
			dom:
			"<'row'<'#all_tickets_action_buttons.col-sm-12'B>>" +
			"<'#all_tickets_advanced_filters.hidden mb-1 mt-1 bg-info pt-1 pb-1 row'>" +
			"<'row'<'col-sm-8'i><'col-sm-4'>>" +
			"<'table-responsive'<'row'<'col-sm-12'tr>>>" +
			"<'row'<'col-sm-5'l><'col-sm-7'p>>",
			select: {
				style: 'multi',
				selector: 'td:first-child '
			},
			deferRender: true,
			buttons: [
				{
					extend: 'reload',
				},
				{
					extend: "selectAll",
					action: function (e, dT) {
						dtFilter.selectAll = true;
						dtTable.rows().select();
						jQuery( '#selectCurrentPageRows' ).prop( 'checked', true );
						jQuery( '.select-info .select-item' ).eq( 0 ).text( dtTable.page.info().recordsDisplay + ' rows selected' );
					}
				},
				{
					extend: "selectNone",
					action: function () {
						dtFilter.selectAll = false;
						dtTable.rows().deselect();
						jQuery( '#selectCurrentPageRows' ).prop( 'checked', false );
					}
				},
						{
							extend: 'trash',
							enabled: false,
				},
				{
					extend: 'edit',
					enabled: false,
				},
				'advance_filter',
				],
				"columns": table_sorted_columns,
				order: [
				[order_column_index, 'desc'],
				],
				rowGroup: {
					dataSrc: 'view_group_title',
				},
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": ajaxurl,
					method: "post",
					"data": function ( d ) {
						getTicketsFilter( d );
						if (typeof d.ticket_id !== 'string') {
							d.ticket_id = [];
						}
					}
				}
			}
		);
		loadCount();
		}

		if ($( '#archive_tickets_table_v2' ).length) {
		dtTable = $( '#archive_tickets_table_v2' ).DataTable(
			{
				dom:
				"<'row'<'col-sm-8'i><'col-sm-4'>f>" +
				"<'table-responsive'<'row'<'col-sm-12'tr>>>" +
				"<'row'<'col-sm-5'l><'col-sm-7'p>>",
				select: {
					style: 'multi',
					selector: 'td:first-child '
				},
				deferRender: true,
				columns: table_sorted_columns,
				order: [
				[order_column_index, 'desc'],
				],
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": ajaxurl,
					"data": function ( d ) {
						getArchiveTicketsFilter( d );
						d.ticket_id = [];
					}
				}
			}
		);
		}
	}


	$( document ).ready(
		function () {
			if ( $( '#archive_tickets_table_v2, #all_tickets_table_v2' ).length) {
				deepview();
				initDataTable();
			}
		}
	);

	if ($( '#all_tickets_table_v2' ).length) {
		let elex_wsdesk_url = new URL( window.location );
		if (elex_wsdesk_url.searchParams.has( 'filter' )) {
			let filter_string = elex_wsdesk_url.searchParams.get( 'filter' );
			try {
				dtFilter          = JSON.parse(crypto_dec(filter_string));
			} catch (f) {
				console.error('Unable to decrypt the filter query');
			};
		}
	}
})( jQuery );

function crypto_enc(plainText){
    var b64 = CryptoJS.AES.encrypt(plainText, 'ticket').toString();
    var e64 = CryptoJS.enc.Base64.parse(b64);
    var eHex = e64.toString(CryptoJS.enc.Hex);
    return eHex;
}

function crypto_dec(cipherText){
   var reb64 = CryptoJS.enc.Hex.parse(cipherText);
   var bytes = reb64.toString(CryptoJS.enc.Base64);
   var decrypt = CryptoJS.AES.decrypt(bytes, 'ticket');
   var plain = decrypt.toString(CryptoJS.enc.Utf8);
   return plain;
}

function reset_dtfilter() {
	dtFilter = {
		view: {},
		action: dtFilter.action
	};
}


function getTemplatesBtn() {
	var html = '<div class="btn-group ml-1" id="reply_template_container">' +
	  '<button type="button" id="reply_template_button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
		'<span class="glyphicon glyphicon-envelope" style="margin-right:5px;"></span> <span class="caret"></span>' +
	  '</button>' +
	  '<ul class="dropdown-menu">' +
	  '<li>' +
	  '<a href="#"><input class="form-control input-sm" id="templates_live_search"></a>' +
	  '</li>' +
		templates.map(
			function (template) {
			return '<li>' +
					'<a href="#" class="reply_template_option" data-slug="' + template.slug + '">' +
					'<span class="title">' + template.title + '</span>' +
					(User().can( 'manage_tickets' ) ? '<span class="template_edit_icon pull-right"> <span class="glyphicon glyphicon-pencil ticket_template_edit_type" id="' + template.slug + '" data-toggle="wsdesk_tooltip" data-container="body" title="' + js_obj.Edit_Template + '" style="margin-right:5px;cursor:pointer;font-size: large;"></span></span>' : '') +
					'</a>' +
				'</li>';
			}
		).join( '' ) +
		'<li role="separator" class="divider"></li>' +
		(User().can( 'manage_tickets' ) ? '<li><a href="#" data-toggle="modal" data-target="#new_template_model" data-slug="create_new_template">' + js_obj.Create_Template + '</li>' : '') +
	  '</ul>' +
	'</div>';

	return html;
}

jQuery( document ).on(
	'click',
	'#all_tickets_table_v2 > tbody > tr > td:not(:nth-child(-n+2))',
	function (e) {
		var ticket_id = dtTable.row( jQuery( this ).parent() ).data().ticket_id;
		loadSingleTicketTab( ticket_id );
	}
);
jQuery( document ).on(
	'click',
	'.reply_template_option',
	function (e) {
		if (jQuery( e.target ).hasClass( 'template_edit_icon' ) || jQuery( e.target ).parent().hasClass( 'template_edit_icon' )) {
			return ;
		}
	jQuery( ".table_loader" ).css( "display", "inline" );
	jQuery.ajax(
		{
			type: 'post',
			url: ajaxurl,
			data: {
				action: 'eh_crm_ticket_preview_template',
				nonce: js_obj ? js_obj.nonce : '',
				slug: this.getAttribute( 'data-slug' ),
				ticket: JSON.stringify( getDTSelectedTicketsId() ),
				type: 'bulk',
				test: 'sdf'
			},
			success: function (data) {
				jQuery( ".table_loader" ).css( "display", "none" );
				jQuery( '#preview_template_model_display' ).html( data.data.page );
				jQuery( '#preview_template_model' ).modal( 'show' );
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log( textStatus, errorThrown );
			}
		}
	);
	}
);

function show_loaders() {
	jQuery( '.spinner_loader.table_loader' ).show();
}

function hide_loaders() {
	jQuery( '.spinner_loader.table_loader' ).hide();

	var groupLable = jQuery( '#all_tickets_table_v2' ).find( 'tr.dtrg-group.dtrg-start > td' );

	if (groupLable.length && groupLable.text() == 'No group') {
		groupLable.parent().remove();
	}
}

function loadCount(params) {
	params = params || {};
	show_loaders();
	jQuery.post(
		ajaxurl,
		{action: 'eh_crm_v2_tickets_count', ...params},
		function (res) {
		jQuery( '#v2_all_tickets_section span.badge' ).text( res.all_tickets );

			if (jQuery( '#ticket_views_count > div' ).length === 0) {
				generateTicketCountView( res.views );
			}

		jQuery( 'span.badge.view_item_count' ).text( 0 );

		res.views.forEach(
			function (view) {
			view.data.forEach(
				function (item) {
				var badge = jQuery( '#' + view.title.toLowerCase() + " #view_item_" + item.slug + ' span.badge' );
				badge.text( item.count );

					if (item.badge_color) {
						badge.css( {'background-color': item.badge_color} );
					}
				}
			);
			}
		);
		hide_loaders();
		updateFilterActiveStatus();
		}
	);

}

function updateFilterActiveStatus(){
	jQuery( '#all_tickets_v2_left_bar ul li' ).removeClass( 'active' );

	if (Object.keys( dtFilter.view ).length === 0 || (Object.keys( dtFilter.view ).length === 1 && dtFilter.view.v2_all_tickets_section)) {
		jQuery( '#all_tickets_v2_left_bar #view_item_all_tickets' ).addClass( 'active' );
		return;
	}

	Object.keys( dtFilter.view ).forEach(
		function (viewLabel) {
		dtFilter.view[viewLabel].forEach(
			function (viewSlug) {
			jQuery( '#' + viewLabel + ' #view_item_' + viewSlug ).addClass( 'active' );
			}
		);
		}
	);
}


function generateTicketCountView(views) {
	views.forEach(
		function (view) {
		var viewDom = document.createElement( 'div' );
		//viewDom.id = view.title;

		var header       = document.createElement( 'h4' );
		header.innerText = view.title;
		viewDom.append( header );

		var list       = document.createElement( 'ul' );
		list.id        = view.title.toLowerCase();
		list.className = "nav nav-pills nav-stacked side-bar-filter";

		view.data.forEach(
			function (item) {
			list.innerHTML += '<li data-slug="' + item.slug + '" id="view_item_' + item.slug + '"><a href="#"><span class="view_item_count badge pull-right"></span>' + item.title + '</a></li>';
			}
		);

		viewDom.append( list );
		viewDom.innerHTML += '<hr />';
		document.getElementById( 'ticket_views_count' ).append( viewDom );
		}
	);
}


function promptDeleteTicket (params) {
	params        = getTicketsFilter( params );
	params.action = 'eh_crm_ticket_multiple_delete';
	params.nonce = js_obj.nonce;
	BootstrapDialog.show(
		{
			title: js_obj.WSDesk_Alert,
			message: js_obj.Do_You_want_to_Delete_Ticket,
			cssClass: 'wsdesk_wrapper',
			buttons: [{
				label: js_obj.Yes_Delete,
				// no title as it is optional
				cssClass: 'btn-primary',
				action: function (dialogItself) {
					jQuery( ".table_loader" ).css( "display", "inline" );
					jQuery.ajax(
						{
							type: 'post',
							url: ajaxurl,
							data: params,
							success: function (data) {
								dtTable.rows().deselect().draw();
								loadCount();
								jQuery( ".table_loader" ).css( "display", "none" );
								jQuery( ".alert-success" ).css( "display", "block" );
								jQuery( ".alert-success" ).css( "opacity", "1" );
								jQuery( "#success_alert_text" ).html( "<strong>" + js_obj.WSDesk_Tickets_Notification + "</strong><br>" + js_obj.Tickets_Deleted_Successfully + "!" );
								window.setTimeout(
									function () {
									jQuery( ".alert-success" ).fadeTo( 500, 0 ).slideUp(
										500,
										function () {
										jQuery( this ).css( "display", "none" );
										}
									);
									},
									4000
								);
							},
							error: function (jqXHR, textStatus, errorThrown) {
								console.log( textStatus, errorThrown );
							}
						}
					);
					dialogItself.close();
				}
			}, {
				label: 'Close',
				action: function (dialogItself) {
					dialogItself.close();
				}
			}]
		}
	);
}

function getTicketsFilter(d) {
	d        = d || {};
	d.action = dtFilter.action;
	d.view   = dtFilter.view;

	if (d.columns && d.order[0]) {
		d.sort = {
			column: d.columns[d.order[0].column].data,
			dir: d.order[0].dir,
		};
	};

	d.selectAll = d.selectAll || dtFilter.selectAll;

	if ( ! d.selectAll && ! d.ticket_id) {
		d.ticket_id = getDTSelectedTicketsId();
		if (d.ticket_id.length === 0) {
			d.ticket_id = jQuery( '#all_tickets_advanced_filters input[name=ticket_id]' ).val();
		}
	} else {
		//d.ticket_id = jQuery('#all_tickets_advanced_filters input[name=ticket_id]').val();
	}
	d.subject   = jQuery( '#all_tickets_advanced_filters input[name=subject]' ).val();
	d.requestor = jQuery( '#all_tickets_advanced_filters input[name=requestor]' ).val();

	return d;
}

function getArchiveTicketsFilter(d) {
	d        = getTicketsFilter( d );
	d.action = 'eh_crm_v2_archive_tickets'
	return d;
}

function promptArchiveTickets(params)
{
	params        = getTicketsFilter( params );
	params.action = 'eh_crm_ticket_multiple_ticket_action';
	params.nonce  = js_obj.nonce;
	params.label  = 'archive_tickets';
	BootstrapDialog.show(
		{
			title: js_obj.WSDesk_Alert,
			message: js_obj.Do_You_want_to_Archive_Tickets,
			cssClass: 'wsdesk_wrapper',
			buttons: [{
				label: js_obj.Yes_Archived,
				cssClass: 'btn-primary',
				action: function (dialogItself) {
					jQuery( ".table_loader" ).css( "display", "inline" );
					jQuery.ajax(
						{
							type: 'post',
							url: ajaxurl,
							data: params,
							success: function (data) {

								if (data) {
									var parse            = jQuery.parseJSON( data );
									archive_ticket_count = parse.count;
								}
								jQuery( ".ticket-delete-btn" ).hide();
								jQuery( ".ticket-edit-btn" ).hide();
								jQuery( ".table_loader" ).css( "display", "none" );
								jQuery( ".alert-success" ).css( "display", "block" );
								jQuery( ".alert-success" ).css( "opacity", "1" );
								jQuery( "#success_alert_text" ).html( "<strong>" + js_obj.WSDesk_Tickets_Notification + "</strong><br>" + archive_ticket_count + ' ' + js_obj.Tickets_Archived_Successfully + "!" );
								window.setTimeout(
									function () {
									jQuery( ".alert-success" ).fadeTo( 500, 0 ).slideUp(
										500,
										function () {
										jQuery( this ).css( "display", "none" );
										}
									);
									},
									4000
								);
								jQuery( window ).trigger( 'reloadDtTable', true );
							},
							error: function (jqXHR, textStatus, errorThrown) {
								console.log( textStatus, errorThrown );
							}
						}
					);
					dialogItself.close();
				}
			}, {
				label: 'Close',
				action: function (dialogItself) {
					dialogItself.close();
				}
			}]
		}
	);
}

function changeStatus (params){
	params        = getTicketsFilter( params );
	params.action = 'eh_crm_ticket_multiple_ticket_action';
	params.nonce  = js_obj.nonce;
	BootstrapDialog.show(
		{
			title: js_obj.WSDesk_Alert,
			message: js_obj.Do_You_want_to_Update_Tickets_Label,
			cssClass: 'wsdesk_wrapper',
			buttons: [{
				label: js_obj.Yes_Update,
				// no title as it is optional
				cssClass: 'btn-primary',
				action: function (dialogItself) {
					jQuery( ".table_loader" ).css( "display", "inline" );
					jQuery.ajax(
						{
							type: 'post',
							url: ajaxurl,
							data: params,
							success: function (data) {
								jQuery( ".ticket-delete-btn" ).hide();
								jQuery( ".ticket-edit-btn" ).hide();
								jQuery( ".table_loader" ).css( "display", "none" );
								jQuery( ".alert-success" ).css( "display", "block" );
								jQuery( ".alert-success" ).css( "opacity", "1" );
								jQuery( "#success_alert_text" ).html( "<strong>" + js_obj.WSDesk_Tickets_Notification + "</strong><br>" + js_obj.Tickets_Updated_Successfully + "!" );
								window.setTimeout(
									function () {
									jQuery( ".alert-success" ).fadeTo( 500, 0 ).slideUp(
										500,
										function () {
										jQuery( this ).css( "display", "none" );
										}
									);
									},
									4000
								);
								jQuery( window ).trigger( 'reloadDtTable', true );
							},
							error: function (jqXHR, textStatus, errorThrown) {
								console.log( textStatus, errorThrown );
							}
						}
					);
					dialogItself.close();
				}
			}, {
				label: 'Close',
				action: function (dialogItself) {
					dialogItself.close();
				}
			}]
		}
	);
}

jQuery( document ).on(
	'click',
	'#all_tickets_table_v2_wrapper ul li a[data-action]',
	function (e) {
	e.preventDefault();

	var action = jQuery( this ).data( 'action' );
	var params = {};

		if (jQuery( this ).hasClass( 'single_ticket_action_button' )) {
			params.ticket_id = [jQuery( this ).data( 'ticket_id' )];
		} else {
			params.ticket_id = getDTSelectedTicketsId();
		}

		if (action === 'archive_tickets') {
			return promptArchiveTickets( params );
		}

	params.label = action;
	changeStatus( params );
	}
);

function getDTSelectedTicketsId() {
	var tickets_id = [];

	if ( ! dtTable) {
		return tickets_id;
	}

    var selectedRows = dtTable.rows({selected: true}).data();

	for (var i = 0; i < selectedRows.length; i++) {
		tickets_id.push( selectedRows[i].ticket_id );
	}

	return tickets_id;
}

function User () {
	return {
		can : function (access) {
			return accesses.indexOf( access ) >= 0;
		}
	}
}

jQuery( window ).on(
	'reloadDtTable',
	function () {
	dtTable.rows().deselect();
	dtTable.draw();

	arguments[1] && loadCount();
	}
);
