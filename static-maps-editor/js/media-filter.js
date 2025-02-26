jQuery( document ).ready( function () {
	var AttachmentFiltersAll = wp.media.view.AttachmentFilters.All;
	wp.media.view.AttachmentFilters.All = wp.media.view.AttachmentFilters.extend({
		createFilters: function () {
			AttachmentFiltersAll.prototype.createFilters.call(this);
			this.filters.staticmaps = {
				text: "Static maps",
				props: {
					status: null,
					type: "static_maps_editor",
					uploadedTo: null,
					orderby: "date",
					order: "DESC",
				},
			};
		}
	});
});
