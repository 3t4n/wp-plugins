(function($, pig){

    $(document).ready(function(){
        initAll();
    });

    function initAll(){
        $("#pig-submit").on("click", function(e){
            if($("#email").length > 0 && $("#email").val().length === 0){
                alert(pig.l10n["no_email"]);
                e.preventDefault();
                return false;
            }
            $("#search-page").val(1);
            submitForm(e);
        });

        $(".pig-post-draft").on("click", function(e){
            savePost("draft", $(this));
        });
        $(".pig-post-bookmark").on("click", function(e){
            savePost("bookmark", $(this));
        });
        $(".pig-post-remove").on("click", function(e){
            $(this).parent().parent().parent().parent().parent().hide("slow");
        });

        toggleEmail();

        $(".pig-page a").on("click", function(e){
            e.preventDefault();
            $("#search-page").val($(this).attr("data-page"));
            $("#pig-search-form").append("<input type='hidden' name='pig-submit' value='xxx'>");
            submitForm(e);
        });

        $(".refresh-form").on("change", function(e){
            $("#search-page").val(1);
            $("#pig-submit").trigger("click");
        });

        initPointer();
    }

    var left = -1;
    function initPointer(){
        var pointer = $("#pig-pointer").pointer( {
                pointerClass: "pig-pointer", 
                content: pig.pointer["html"], 
                position: {
                    edge: 'top',
                    align: 'left'
                }
        } );

        if(pig.pointer["reached"] === true) {
            $('#limits-description').addClass("reached");
            $('#limit-symbol').html("!");
        }
        $('#limits-description').on('mouseover', function(e){
            pointer.pointer('open');
            if(left == -1) {
                left = parseFloat($(".pig-pointer").css("left").replace("px", ""))*0.94;
            }
            $(".pig-pointer").css("left", left);
        });
        $(document).on('click', function(e){
            pointer.pointer('close');
        });
    }


    function submitForm(e){
        if($("#search-q").val() == ""){
            if(e) e.preventDefault();
            return false;
        }
        $(".pig-posts").remove();
        $(".loading").show();
        $("#pig-search-form").submit();
    }

    function toggleEmail(){
        $(".pig-email-toggle").on("click", function(e){
            $.ajax({
                url: ajaxurl,
                method: "post",
                data: {
                    action      : pig.ajax["action"],
                    _action     : "toggle",
                    id          : $(this).attr("data-id"),
                    nonce       : pig.ajax["nonce"]
                },
                success: function(data) {
                    if(data && data.data && data.data.redirect){
                        location.href = data.data.redirect;
                    }
                }
            });
        });
    }

    function savePost(type, thiss){
        thiss.parent().parent().parent().parent().parent().find(".pig-inner").hide();
        thiss.parent().parent().parent().parent().parent().find(".pig-inner-doing").show();
        thiss.parent().parent().parent().parent().parent().find(".pig-inner-doing ." + type).show();
        $.ajax({
            url: ajaxurl,
            method: "post",
            data: {
                action      : pig.ajax["action"],
                _action     : type,
                _bookmark   : thiss.parent().parent().parent().parent().parent().attr("data-bookmark"),
                _element    : thiss.parent().parent().parent().parent().parent().attr("data-epic"),
                nonce       : pig.ajax["nonce"]
            },
            success: function(data) {
                thiss.parent().parent().parent().parent().parent().find(".pig-inner-doing").hide();
                thiss.parent().parent().parent().parent().parent().addClass("pig-done");
                thiss.parent().parent().parent().parent().parent().find(".pig-inner-done ." + type).show();
                setTimeout(function(){
                    thiss.parent().parent().parent().parent().parent().hide("slow");
                }, 1000);
                if(data && data.data && data.data.redirect){
                    location.href = data.data.redirect;
                }
            }
        });
    }

})(jQuery, pig);