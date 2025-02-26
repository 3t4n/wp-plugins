jQuery( document ).ready( function()
{
	var geolinks= jQuery( 'a[href^="geo:"]' );

	var makeGeobox = function( geouri )
	{
	    var loc = geouri.replace( /^geo:/i, "" ).split("%2C");
	    var buttons =
			+ geoLink ( loc[1], loc[0] )
			+ geoGmaps( loc[1], loc[0] )
			+ geoOSM  ( loc[1], loc[0] );
	    return buttons;
	};
	
	var geoLink = function( lat, lon, z )
	{
		z = typeof z !== 'undefined' ? z : 10;
	    return '<span class="geouri-button geouri-direct"><a target="_blank" href="geo:' + lat + '%2C' + lon + '%2C' + z + '">geoURI</a></span>';
	};
	var geoGmaps = function( lat, lon, z )
	{
		z = typeof z !== 'undefined' ? z : 10;
	    return '<span class="geouri-button geouri-gmail"><a target="_blank" href="https://maps.google.com/maps?q=' + lon + '%2C' + lat + '">Google Maps</a></span>';
	};
	var geoOSM = function( lon, lat, z )
	{
		z = typeof z !== 'undefined' ? z : 10;
	    return '<span class="geouri-button geouri-osm"><a target="_blank" href="http://www.openstreetmap.org/?mlat=' + lat + '&mlon=' + lon + '#map=' + z + '/' + lat + '/' + lon + '">Open Street Map</a></span>';
	};

	geolinks.bind( 'mouseenter', function()
	{
	    jQuery( ".geouri-box" ).remove();
	    var link = jQuery( this );
	    var x=link.offset().left;
	    var y=link.offset().top + link.height();
	    console.log(link);
	    geocode = link.attr( 'href' );
	    box     = jQuery( '<div class="geouri-box"></div>' );
	    box.css('position', 'absolute');
	    box.css('left', x);
	    box.css('top', y)
	    if( !geocode || geocode == '' )
		return false;

	    box.html( makeGeobox( geocode ) ).appendTo( 'body' );
	 
	 
	    var remove_tooltip = function()
	    {
		box.animate( { top: '-=10', opacity: 0 }, 50, function()
		{
		    jQuery( this ).remove();
		});
	    };
	 
	    box.bind( 'mouseleave', remove_tooltip );
	    return false;
	});
});
