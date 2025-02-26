jQuery(document).ready(function() {
	welcomeToTheBlockEditorBGone();
});

function welcomeToTheBlockEditorBGone() {
	if (wp.data) {
		wp.data.select( "core/edit-post" ).isFeatureActive( "welcomeGuide" ) && wp.data.dispatch( "core/edit-post" ).toggleFeature( "welcomeGuide" );
	}
}
