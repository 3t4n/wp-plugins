jQuery().AJAXCounters( 'YaMetrika', new Ya.Metrika({
	id: YaMetrikaConfig.ua,
	defer: true,
	accurateTrackBounce: true
}) );
/* example for custom counter:
jQuery().AJAXCounters( 'test', {
	hit: function (url, title, referrer, params) {
		alert(
			'test. url='
			+ url
			+ ', title='
			+ title
			+ ', referrer='
			+ referrer
		);
	}
});
*/