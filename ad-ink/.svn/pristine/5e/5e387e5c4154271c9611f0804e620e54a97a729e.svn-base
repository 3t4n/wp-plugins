(function ($) {
    'use strict';

    $(function () {
        $("#ad-ink-admin [categories-wrapper] [categories] [category]").click(function () {
            var id = $(this).attr("category-id");
            // categories
            $("#ad-ink-admin [categories-wrapper] [categories] [category]").removeClass("text-green-500");
            $("#ad-ink-admin [categories-wrapper] [categories] [category][category-id=" + id + "]").addClass("text-green-500");
            // sub categories
            $("#ad-ink-admin [categories-wrapper] [sub-categories] [category]").addClass("hidden");
            $("#ad-ink-admin [categories-wrapper] [sub-categories] [category=" + id + "]").removeClass("hidden");
            $("#ad-ink-admin [categories-wrapper] [sub-categories] [sub-category]").removeClass("bg-green-500")
            $("#ad-ink-admin [categories-wrapper] [sub-categories] [category=" + id + "] [sub-category]").addClass("bg-green-500")
            // update form hidden input
            $("#ad-ink-admin [categories-wrapper] [category-input]").val(id).trigger('change');
        });
        $("#ad-ink-admin [categories-wrapper] [sub-categories] [sub-category]").click(function () {
            var id = $(this).attr("category-id");
            var category = $(this).parents("[category]").attr("category");
            // sub categories
            $("#ad-ink-admin [categories-wrapper] [sub-categories] [category=" + category + "] [sub-category]").removeClass("bg-green-500")
            $("#ad-ink-admin [categories-wrapper] [sub-categories] [category=" + category + "] [sub-category][category-id=" + id + "]").addClass("bg-green-500");
            // update form hidden input
            $("#ad-ink-admin [categories-wrapper] [category-input]").val(id).trigger('change');
        });
    });
})(jQuery);