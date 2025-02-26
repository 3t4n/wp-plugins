var dbp = {

	widget : function( i )
	{
		this.init = function( i )
		{
			this.i = i;

			this.storage = '';

			this.has_content = false;
			this.has_control = false;

			this.is_content  = true;

			this.id = ( this.i == 1 ) ? 'dashpress' : 'dashpress_'+this.i;

			this.widget 	= 'div#'+this.id;

			this.wtitle     = this.widget + ' span.wtitle';
			this.postbox    = this.widget + ' span.postbox-title-action';
			jQuery( this.postbox ).html( dbpL10n.handlers );

			this.wtitle_hide= '#'+this.id+'-hide';

			this.configure 	= this.widget + ' a.edit-box.open-box';
			this.cancel 	= this.widget + ' a.edit-box.close-box';
			this.spinner 	= this.widget + ' a.edit-box.spin';

			this.inside 	= this.widget + ' div.inside';
			this.cache 	= this.widget + ' div.cache';
			this.form 	= this.inside + ' form';
			this.norequest 	= this.inside + ' .widget-norequest';

			jQuery( this.widget ).append('<div class="cache hidden"></div>');

			jQuery( this.configure ).click( function() {
				jQuery( this ).hide();
				_this.display_control();
				return false;
			});

			jQuery( this.cancel ).click( function() {
				jQuery( this ).hide();
				jQuery( _this.norequest ).removeClass( 'widget-norequest' );
				_this.no_change();
				return false;
			});

			this.get_content();
			this.get_control();
		};

		this.get_content = function()
		{
			if ( jQuery( this.norequest ).length ) return;					// in case there is nothing to look for !

			var parms = { action: 'dbp_ajax', dbp_action: 'get_content', i: this.i };

			jQuery.ajax({
				data: parms,
				type: "POST",
				url: ajaxurl,
				success: function( data ) { _this.got_content( data ); } 
			});
		};

		this.got_content = function( data )
		{
			var target = (this.is_content) ? this.inside : this.cache;

			if ( (typeof data.empty !=='undefined') && data.empty )
			{
				jQuery( target ).html( jQuery( '#tmpl-dbp-nocontent' ).html() );	// reset widget content (with (no)data)
			}
			else
			{
				var content = wp.template( 'dbp-content' );
				jQuery( target ).html( content( data ) );

				this.set_status( 'has_content', true );
			}
		};

		this.get_control = function()
		{
			var parms = { action: 'dbp_ajax', dbp_action: 'get_control', i: this.i };

			jQuery.ajax({
				data: parms,
				type: "POST",
				url: ajaxurl,
				success: function( data ) { _this.got_control( data ); } 
			});
		};

		this.got_control = function( data )
		{
			var target = (this.is_content) ? this.cache : this.inside;

			if ( data )
			{
				var control = wp.template( 'dbp-control' );
				jQuery( target ).html( control( data ) );

				this.set_status( 'has_control', true );
			}
		};

		this.display_control = function()
		{
			this.set_status( 'is_content', false );

			this.flip_viewport();

			jQuery( this.form ).on( 'submit', function() {
				jQuery( _this.form + ' input[type="submit"]' ).attr( 'disabled', 'disabled' );
				jQuery( _this.wtitle      ).html( jQuery( _this.form + " input[name='" + _this.id + "[wtitle]']").val() );
				jQuery( _this.wtitle_hide ).next( 'span.wtitle' ).html( jQuery( _this.form + " input[name='" + _this.id + "[wtitle]']").val() );
				var form = jQuery( this );
				_this.control_submitted( form );
				return false;
			});

			jQuery( this.form + " input[name='" + this.id + "[image]']").change( function() {
				if (this.checked) { alert( dbpL10n.images );	}
			});
		};

		this.no_change = function()
		{
			this.flip_viewport();

			this.set_status( 'is_content', true );
		};

		this.control_submitted = function( form )
		{
			this.set_status( 'has_control', false );
			this.set_status( 'has_content', false );
			this.set_status( 'is_content', true );

			this.flip_viewport();

			var parms = { action: 'dbp_ajax', dbp_action: 'control_submitted', i: this.i, form: jQuery( form ).serialize() };

			jQuery.ajax({
				data: parms,
				type: "POST",
				url: ajaxurl,
				success: function( data ) {
					jQuery( _this.norequest ).removeClass( 'widget-norequest' ); 
					_this.got_content( data );
					_this.get_control();
				} 
			});
		};

		this.flip_viewport = function()
		{
			this.storage = jQuery( this.inside ).html();
			jQuery( this.inside ).html( jQuery( this.cache ).html() );
			jQuery( this.cache ).html( this.storage );
		};

		this.set_status = function( s, b )
		{
			if ( s == 'has_control' ) this.has_control = b;
			if ( s == 'has_content' ) this.has_content = b;
			if ( s == 'is_content'  ) this.is_content = b;

			jQuery( this.configure ).hide();
			jQuery( this.cancel    ).hide();
			jQuery( this.spinner   ).hide();

			if (this.has_control && this.has_content)
			{
				(this.is_content) ? jQuery( this.configure ).show() : jQuery( this.cancel ).show();
			}
			else
			{
				if (this.has_content)
				{
					jQuery( this.spinner ).show();
				}
				else
				{
					if (this.has_control)
					{
						(this.is_content) ? jQuery( this.configure ).show() : jQuery( this.cancel ).show();
					}
					else
					{
						jQuery( this.spinner ).show();
					}
				}
			}
		};


		var _this = this;			// _this is this ( oop ! )

		this.init( i );
	},


	init : function()
	{
		// creating widget instances
		for( i = 1; i <= dbpL10n.count; i++ ) new dbp.widget( i );


		// everything done ?
		if ( dbpL10n.can_edit != '1' ) return;

		// dashboard settings panel
		jQuery( '#dashboard-options-link-wrap' ).appendTo( '#screen-meta-links' );
		jQuery( '#dashboard-options-wrap' ).prependTo( '#screen-meta' );

		// toggle new panel
		jQuery( '#dashboard-options-link' ).on( 'focus.scroll-into-view', function( e ){
			if ( e.target.scrollIntoView ) e.target.scrollIntoView( false );
		});

		// new number of widget(s)
		jQuery( '.widgets-prefs input[type="radio"]' ).click( function(){
			var parms = { action: 'dbp_ajax', dbp_action: 'update_count', count: jQuery( this ).val() };

			jQuery.ajax({
				data: parms,
				type: "POST",
				url: dbpL10n.url
			});
		});

		// select/deselect a widget
		jQuery( '.hide-dashbox-tog' ).change( function() {

			var box = jQuery( this ).val();
			var checked = ( jQuery( this ).prop( 'checked' ) == true ) ? 1 : 0;

			var parms = { action: 'dbp_ajax', dbp_action: 'update_visible', checked: checked , box: box };

			jQuery.ajax({
				data: parms,
				type: "POST",
				url: dbpL10n.url
			});
		});

		// globalize settings
		jQuery( '#dashpress-global-settings' ).click( function() {

			var parms = { action: 'dbp_ajax', dbp_action: 'set_global' };

			jQuery.ajax({
				data: parms,
				type: "POST",
				url: dbpL10n.url,
				success: function( response ) {
					jQuery( '#dashpress-global-settings' ).attr( 'value', ( response == '1' ) ? dbpL10n.erase : dbpL10n.set );
				}
			});
		});
	}
};
jQuery( document ).ready( function() { dbp.init(); } );