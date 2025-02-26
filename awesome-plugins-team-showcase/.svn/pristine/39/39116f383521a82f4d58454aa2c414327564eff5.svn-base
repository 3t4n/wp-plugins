(function ($) {
    'use strict';

    ////////////////////////////////////////////////////////////////////////////
    // GLOBAL VARS /////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    var delay_show_posts = false;

    ////////////////////////////////////////////////////////////////////////////
    // EVENTS //////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    $(document).ready(function ($) {

        if ($("#aws-teams-list").length > 0)
        {
            do_sortable();
        }


        if ($("[data-hide]").length > 0)
        {
            show_hide_settings();
        }

        if ($("#aws-teams-list li").length >= ($(".js-add-new-member-list option").length - 1))
        {
            $(".js-add-new-member-list").hide();
        }
        else
        {
            $(".js-add-new-member-list").show();
        }

        if ($("[name='aws-ts-related-posts']").length > 0)
        {
            hide_show_posts_connection();
        }

        if ($(".js-aws-preview-layover .preview-inner a").length > 0 && $("[name='skin_documentation']").length > 0)
        {
            $(".js-aws-preview-layover .preview-inner a").attr("href", $("[name='skin_documentation']").val());
            $(".js-aws-preview-layover .preview-inner a").attr("target", "_blank");
        }

        if( $("[name='aws_ts_posts[flag]']").length > 0 )
        {
            show_hide_views_settings();
        }

    });

    $(document).on("change", "[name='aws_ts_posts[members]'], [name='aws_ts_posts[teams]']", function () {
        show_hide_views_settings();
    });
    
    $(document).on("change", ".js-add-new-member-list", function () {

        var member_id = $(this).val();

        if (member_id === "add")
        {
            return true;
        }

        if (member_id === "all")
        {
            
            $.each($(".js-add-new-member-list option"), function (i, val) {

                if (!$(val).hasClass("added") && $(val).attr("value") !== "all" && $(val).attr("value") !== "add")
                {

                    add_team_member($(val).attr("value"));

                }

            });

            return true;
        }

        add_team_member(member_id);

    });

    $(document).on("click", ".js-add-new-member-list [data-member]", function () {

        var member_id = $(this).data("member");

        var input = "<input type='hidden' name='aws_ts_members[]' value='" + member_id + "' />";

        var member_html = '<li class="team-item js-team-item ui-state-default"><div class="team-title portlet-header">';
        member_html += input;
        member_html += $(this).data("name");
        member_html += '</li>';

        $("#aws-teams-list").append(member_html);
        do_sortable();

        $(".team-add-layover").removeClass("active");

    });

    $(document).on("click", ".js-aws-remove-member", function () {

        var member_id = $(this).closest("li").find("input").val();

        $(this).closest("li").remove();

        $(".js-add-new-member-list option[value='" + member_id + "']").removeClass("added");

        if ($("#aws-teams-list li").length >= ($(".js-add-new-member-list option").length - 1))
        {
            $(".js-add-new-member-list").hide();
        }
        else
        {
            $(".js-add-new-member-list").show();
        }

    });

    $(document).on("change", "[name='teams-to-connect']", function () {

        var key = $(this).val();
        var title = $(this).find("option:checked").text();

        if( key === "all" )
        {
            
            console.log("flag all")
            
            var opvis = $(this).find("option");
            
            $.each(opvis, function(i,val){
                
                if( !$(val).hasClass("hidden") )
                {
                    var op_key = $(val).attr("value") 
                    var op_tit = $(val).text();
                    
                    var newli = "<li>" +
                            '<input type="hidden" name="teams_connected[]" value="' + op_key + '">' +
                            '<span class="dashicons dashicons-dismiss js-remove-team-connected"></span>' +
                            '<span class="title">' + op_tit + '</span>' +
                            "</li>";

                    $("#current-teams-connected").append(newli);
                    
                    $(val).addClass("hidden");
                }
                
                
            });
            
            $(this).hide();
            
        }
        else
        {
            
            var newli = "<li>" +
                    '<input type="hidden" name="teams_connected[]" value="' + key + '">' +
                    '<span class="dashicons dashicons-dismiss js-remove-team-connected"></span>' +
                    '<span class="title">' + title + '</span>' +
                    "</li>";

            $("#current-teams-connected").append(newli);
            
        }

    });

    $(document).on("click", ".js-remove-team-connected", function () {
        var key = $(this).closest("li").find("input").val();
        $(this).closest("li").remove();
        $("[name='teams-to-connect']").find("option[value='" + key + "']").removeClass("hidden");
        
        $("[name='teams-to-connect']").show();
        $("[name='teams-to-connect']").val("");
        $("[name='teams-to-connect'] option[value='all']").removeClass("hidden");
        $("[name='teams-to-connect'] option[value='']").removeClass("hidden");
        
    });

    $(document).on("change", "[name='aws_team_settings[orderby]']", function () {

        if ($(this).val() === "post__in")
        {
            $("[data-hide='order']").hide();
        }
        else
        {
            $("[data-hide='order']").show();
        }

    });

    $(document).on("change", "[name='aws_team_settings[skin]'], [name='aws_team_settings[grid]']", function () {

        show_hide_settings();

    });

    $(document).on("keyup paste", "#type_to_show_posts", function () {

        var $this = $(this);

        if (delay_show_posts)
        {
            clearInterval(delay_show_posts);

        }

        delay_show_posts = setInterval(function () {

            var key = $this.val();

            var data = {
                action: "aws_ts_search_posts_to_connect",
                key: key
            };

            $.post(ajaxurl, data, function (res) {

                $("#list_to_show_posts").html(res).addClass("open");
                $("#list_to_show_posts").append('<span class="showcase-related-close"></span>');

            });

            clearInterval(delay_show_posts);

        }, 750);

    });

    $(document).on("click", ".showcase-related-close", function () {
        $("#list_to_show_posts").html("").removeClass("open");
    });

    $(document).on("click", "[data-team-connection-post]", function () {

        var id = $(this).data("team-connection-post");
        $("[name='aws_team_post_connected']").val(id);

        $("#type_to_show_posts").val($(this).text());
        $("#list_to_show_posts").html("").removeClass("open");

    });

    $(document).on("change click", "[name='aws_team_settings[extrainfo]']", function () {

        var key = $(this).val();

        var hidden = ["nolink", "no-action", "page", "link-to-member"];

        $("[data-skin='extra_info_card']").removeClass("visible");
        
        if ( $.inArray(key, hidden) < 0 )
        {
            $("[data-skin='extra_info_card']").addClass("visible");
        }
        
    });

    $(document).on("change", "[name='aws-ts-related-post-types']", function () {
        hide_show_posts_connection();
    });

    $(document).on("change", "[name='aws-ts-related-posts']", function () {

        var p = $(this).val();

        if (p === "select-post")
        {
            return true;
        }

        var title = $("[name='aws-ts-related-posts'] option[value='" + p + "']").text();

        var newli = "<li>" +
                "<input type='hidden' name='aws_team_post_connected[]' value='" + p + "' />" +
                "<span class='dashicons dashicons-dismiss js-remove-ts-pt'></span>" +
                "<span class='title'>" + title + "</span>" +
                "</li>";

        $("#current-related-types").append(newli);

    });

    $(document).on("click", ".js-remove-ts-pt", function () {

        $(this).closest("li").remove();

    });

    $(document).on("click", ".js-open-ats-preview", function () {

        $(".js-aws-preview-layover").addClass("active");
        $("body").addClass("aws-preview-layover-opened");

    });

    $(document).on("click", ".js-close-ats-preview", function () {

        $(".js-aws-preview-layover").removeClass("active");
        $("body").removeClass("aws-preview-layover-opened");

    });

    $(document).on("click", "[name='aws_team_settings_extrainfo']", function () {
        $("[name='aws_team_settings[extrainfo]']").val($(this).val());
    });

    ////////////////////////////////////////////////////////////////////////////
    // FUNCTIONS ///////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function add_team_member(member_id)
    {
        var $this = $(".js-add-new-member-list");

        var option = $("option[value='" + member_id + "']", $this);
        option.addClass("added");

        var input = "<input type='hidden' name='aws_ts_members[]' value='" + member_id + "' />";

        var member_html = '<li class="team-item js-team-item ui-state-default">';
        member_html += '<div class="team-title portlet-header ui-sortable-handle">';
        member_html += input;
        member_html += option.data("name");
        member_html += '<span class="dashicons dashicons-trash js-aws-remove-member"></span>';
        member_html += '</div>';
        member_html += '</li>';

        $("#aws-teams-list").append(member_html);
        do_sortable();

        $this.val("add");

        if ($("#aws-teams-list li").length >= ($(".js-add-new-member-list option").length - 1))
        {
            $(".js-add-new-member-list").hide();
        }
        else
        {
            $(".js-add-new-member-list").show();
        }
    }

    function do_sortable()
    {

        if ($("#aws-teams-list").length > 0)
        {

            $("#aws-teams-list").sortable({

                handle: ".portlet-header",
                start: function (event, ui)
                {


                },
                stop: function (event, ui) {


                }
            });

            $("#aws-teams-list").disableSelection();

        }

    }

    function show_hide_settings()
    {
        
        var skin = $("[name='aws_team_settings[skin]']").val();
        
        $("[data-skin]").removeClass("visible");
        
        if ($("[name='aws_team_settings[orderby]']").val() === "post__in")
        {
            $("[data-hide='order']").hide();
        }
        else
        {
            $("[data-hide='order']").show();
        }
        
        $("[name='aws_team_settings[columns]']").removeAttr("max")

        if ($("[name='aws_team_settings[skin]']").val() === "custom")
        {

            $("[data-skin]").addClass("visible");

            if ($("[name='aws_team_settings[grid]']").val() !== "carousel")
            {

                $("[data-skin='autoslide']").removeClass("visible");
                $("[data-skin='indicators']").removeClass("visible");
                $("[data-skin='arrows']").removeClass("visible");
                $("[data-skin='interval']").removeClass("visible");

            }

            if ($("[name='aws_team_settings[grid]']").val() === "list")
            {
                $("[data-skin='columns']").removeClass("visible");
            }

            if ($("[name='aws_team_settings[grid]']").val() === "table")
            {
                $("[data-skin='columns']").removeClass("visible");
            }

        }
        else
        {


            var settings = $("[name='aws_team_settings[skin]'] option:selected").data("settings");
            var columns  = $("[name='aws_team_settings[skin]'] option:selected").data("columns");

            if (typeof (settings) !== "undefined" && settings !== "")
            {

                settings = settings.split(",");

                $.each(settings, function (i, val) {

                    $("[data-skin='" + val + "']").addClass("visible");

                });

            }
            console.log("columns")
            console.log(columns)
            $("[name='aws_team_settings[columns]']").attr("max", columns)

        }
        
        
        
        var extrainfo_select = $("[name='aws_team_settings[extrainfo]']");

        $("option[data-option-skin]", extrainfo_select).removeClass("visible");

        $("option[data-option-skin='" + skin + "']", extrainfo_select).addClass("visible");

        if ($("option[data-option-skin='" + skin + "'].visible", extrainfo_select).length > 0) {

            $("tr[data-skin='extrainfo']").addClass("visible");

        }
        else
        {
            $("[data-skin='extra_info_card']").removeClass("visible");
        }


        $("[name='aws_team_settings[extrainfo]'] option[value='expanded']").css("display", "block");

        if ($("[name='aws_team_settings[grid]']").val() === "carousel")
        {

            if ($("[name='aws_team_settings[extrainfo]']").val() === "expanded")
            {
                $("[name='aws_team_settings[extrainfo]']").val("");
            }

            $("[name='aws_team_settings[extrainfo]'] option[value='expanded']").css("display", "none");

        }

        if ($("[name='aws_team_settings[grid]']").val() === "list")
        {

            if ($("[name='aws_team_settings[extrainfo]']").val() === "expanded")
            {
                $("[name='aws_team_settings[extrainfo]']").val("");
            }

            $("[name='aws_team_settings[extrainfo]'] option[value='expanded']").css("display", "none");

        }

    }

    function hide_show_posts_connection()
    {

        var ptype = $("[name='aws-ts-related-post-types']").val();

        $.each($("[name='aws-ts-related-posts'] option"), function (i, val) {

            $(val).hide();

            if ($(val).data("type") === ptype)
            {
                $(val).show();
            }

        });

        $("[name='aws-ts-related-posts']").val("select-post");

        if (ptype !== "select-ptype")
        {
            $("[name='aws-ts-related-posts']").removeAttr("disabled");
        }
        else
        {
            $("[name='aws-ts-related-posts']").prop("disabled", true);
        }

    }
    
    function show_hide_views_settings()
    {
        console.log("CHC")
        var team = $("[name='aws_ts_posts[teams]']");
        
        if( team.prop("checked") === true )
        {
            $("tr[data-row='team']").show();
        }
        else
        {
            $("tr[data-row='team']").hide();
        }
        
        
        var member = $("[name='aws_ts_posts[members]']");
        
        if( member.prop("checked") === true )
        {
            $("tr[data-row='member']").show();
        }
        else
        {
            $("tr[data-row='member']").hide();
        }
        
    }
    

})(jQuery);