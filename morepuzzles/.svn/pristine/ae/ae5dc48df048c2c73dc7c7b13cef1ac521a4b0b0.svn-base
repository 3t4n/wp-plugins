if(new URL(window.location.href).searchParams.get("page") == "morepuzzles_plugin"){
    jQuery(document).ready(function($) {
        $('#paste_btn').tooltip({
            container: '.tooltip_div_paste'
        });
        $('#copy_btn').tooltip({
            container: '.tooltip_div_copy'
        });

        $('#generate_shortcode').click(function(e) {
            e.preventDefault();
            var link = $('#crossword_key').val();

            if(link.includes("morepuzzles.com/") && link.includes("w=") && link.includes("h=")){
                var url = new URL(link);
                var ratio_width = url.searchParams.get("w") ? url.searchParams.get("w") : 1;
                var ratio_height = url.searchParams.get("h") ? url.searchParams.get("h") + '.5' : 1;
    
                link = link.substring(8);
                link = link.split("/");
                if (link[link.length - 1].includes("?")) {
                    link[link.length - 1] = link[link.length - 1].substring(0, link[link.length - 1].indexOf("?"));
                }
                if (morepuzzles_validateLink(link)) {
                    $('.errorDiv').hide();
                    $('#shortcode').addClass('filled');
                    $('#copy_btn').prop('disabled', false);
                    $('#shortcode').val('[morepuzzles type="' + link[1] + '" key="' + link[2] + '" ratio="' + (ratio_height / ratio_width) + '"]');
                } else {
                    $('#shortcode').removeClass('filled');
                    $('#shortcode').val('First create your shortcode');
                    $('#copy_btn').prop('disabled', true);
                    $('.errorDiv').show();
                }
            } else {
                $('#shortcode').removeClass('filled');
                $('#shortcode').val('First create your shortcode');
                $('#copy_btn').prop('disabled', true);
                $('.errorDiv').show();
            }
        })

        $('#paste_btn').click(function(e) {
            e.preventDefault();
            var text = morepuzzles_paste();
            text.then(function(value) {
                $('#crossword_key').val(value);
            })
        });

        $('#copy_btn').click(function(e) {
            e.preventDefault();
            var text = $('#shortcode').val();

            navigator.clipboard.writeText(text).then(function() {
                console.log('Async: Copying to clipboard was successful!');
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
            });
        });

        function morepuzzles_validateLink(link) {
            return (link.length == 3 &&
                link[0] == ("morepuzzles.com") &&
                link[2].length > 0 &&
                (link[1] == ("crossword") || link[1] == ("wordsearch") || link[1] == ("sudoku") || link[1] == ("minesweeper")) &&
                link[2][0] == 'p');
        }

        var modal = document.getElementById("myModal");

        var img = document.getElementById("wp_gif");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }

        $(document).click(function(event) {
            if (!$(event.target).is("#img01, #wp_gif")) {
                modal.style.display = "none";
            }
        });
    });
    
    async function morepuzzles_paste() {
        const text = await navigator.clipboard.readText();
        return text;
    }
}