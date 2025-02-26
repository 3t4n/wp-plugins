jQuery(document).ready(function($){
    var font = $('#gravurfont').val();
    $('input[name="gfont"]').val(font);
    $('#gravurfont').change(function(){
        var ftxt = $(this).val()
        $('input[name="gfont"]').val(ftxt);
    });
    var gravurImgServer = "https://sahu.media";

    var fontMap = {
        "Philosopher": "PhilosopherMrcouple",
        "Yanone Kaffeesatz": "Yanone Kaffeesatz RegularSilvit",
        "Spectral": "SpectralMrcouple",
        "Pacifico": "PacificoMrcouple",
        "Gloria Hallelujah": "Gloria HallelujahMrcouple"
	};
	
    var allowedChars = new RegExp(/^[a-z_0-9 @\!#\$\^%&*()+=\-[\]\\\';,\.\/\{\}\|\":<>\?\u00E0-\u017E\u0195-\u01DF]$/i);
    if ($(".gravurmodul").length == 1) {

		if ($("#gravur1").length > 0) {

			var gravurtexts = [];
			gravurtexts.push({
				input: $("#gravurtext"),
				svgtext: $("#gravurpreview #textcontent"),
                textlimit: $("#gravur1 .textlimit"),
                inputbox: $("input[name='en_text']")
			});
			if ($("#gravur2").length > 0) {
				gravurtexts.push({
					input: $("#gravurtext2"),
					svgtext: $("#gravurpreview #textcontent2"),
                    textlimit: $("#gravur2 .textlimit"),
                    inputbox: $("input[name='en_text2']")
				});
			}

			$(".gravurmodul .inputs input, .gravurmodul .inputs select").on("change input", function(){
                

				var font = $("#gravurfont").val();
				var fontClass = font.split(" ").join("");
				if(fontMap[font]) font = fontMap[font];

				$(".gravurmodul").removeClass(function (index, className) {
					return (className.match (/(^|\s)font-\S+/g) || []).join(' ');
				}).addClass("font-"+fontClass);

				$("#gravurpreview text").attr("class", fontClass);
				


				if (typeof window.showSlide === 'function') {
					window.showSlide(0);
				}
				
				var allempty = true;
				var oxidstring = "";

				gravurtexts.forEach(function(gravurtext,index){
					var rawText = gravurtext.input.val();
					var text = "";
					for (var i = 0; i < rawText.length; i++) {
						if (allowedChars.test(rawText.charAt(i))) {
							text += rawText.charAt(i);
						}
					}

					var limit = parseInt(gravurtext.textlimit.find('.textlimit_max').text());
					var size = text.length;

					if (size <= limit) {
						if (size > 0) {
							allempty = false;
						}

						gravurtext.textlimit.find('.textlimit_actual').text(size);

						gravurtext.svgtext.text(text);
                        gravurtext.input.val(text);
                        gravurtext.inputbox.val(text);
						
						if (oxidstring.length > 0) oxidstring += "|||";
						if (text.length > 0) {
							oxidstring += text;
						}
					}

				});
				

				$("#persistentParam").val(oxidstring + "####" + font);
				

				if (allempty == false) {
					$("#toBasket").removeClass("disabled");
				} else {
					$("#toBasket").addClass("disabled");
				}

            });
            $(".symbolbox > div").click(function(){
				var input = $(".gravurmodul .row1 input.marked");
				if (input.length == 0) {
					input = $(".gravurmodul .row1 input").first();
				}
				if (input.val().length >= parseInt(input.closest(".cell").find(".textlimit_max").text())) return;
				var textPosition = input.prop("selectionStart");
				var inp1 = $('#gravur1 input');
				var inp2 = $('#gravur2 input');
				var symb = $(this).text();
				if(inp1.length)
				{
					var vl = inp1.val();
					inp1.val(vl+symb);
					inp1.change();
				}
				if(inp2.length)
				{
					var vl = inp2.val();
					inp2.val(vl+symb);
					inp2.change();
				}
				/*
				var newText = [input.val().slice(0, textPosition), $(this).text(), input.val().slice(textPosition)].join('');
				input.val(newText);
				input.change();
				*/
			});
        }
    }
});
   