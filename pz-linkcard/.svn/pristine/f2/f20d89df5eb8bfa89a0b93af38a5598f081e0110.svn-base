( function( $ ) {
	tinymce.create( "tinymce.plugins.pz_linkcard_tinymce", {
		getInfo: function() {
			return {
				longname:  "Pz-LinkCard Insert Button",
				author:    "poporon",
				authorurl: "https://popozure.info",
				infourl:   "https://popozure.info/pz-linkcard",
				version:   "0.7"
			};
		},
		init: function( ed, url ) {
			var id = "pz_linkcard_insert_shortcode";
			ed.addButton(id, {
				title: 'Insert Linkcard',
				cmd:   id,
				image: url + "/mce-button.png"
			} );
			ed.addCommand(id, function() {
                $("#pz-overlay").css("display", "block");
                $("#pz-modal").css("display", "block");
				$("#pz-url").val("");
                var st = tinymce.activeEditor.selection.getContent();
                var ur = cut_url(st);

				$("#pz-url").val(ur);
				modal_move_center();
                $("#pz-url").focus();
				$("#pz-url").select();
			} );
		},
	} );

	tinymce.PluginManager.add( "pz_linkcard_tinymce", tinymce.plugins.pz_linkcard_tinymce );
	tinymce.PluginManager.requireLangPack('pz_linkcard_tinymce');

	// 画面のどこかをクリックしたらモーダルを閉じる
	$("#pz-overlay,#pz-close").unbind().click( function() {
	    $("#pz-overlay").css("display", "none");
	    $("#pz-modal").css("display"," none");
	    $("#pz-serif").val("");
		$("#pz-check").prop("checked", false);
	} ) ;
	
	// [ESC]キーが押されたらCLOSEをクリック
	$(document).keydown( function(e) {
		if (e.keyCode == 27) {
			$("#pz-close").click();
		}
	} ) ;
	
	// 貼り付け
	$("#pz-url").bind('paste', function(e) {
		if ($("#pz-url").val() == "") {
			var cb = undefined;
			if (window.clipboardData && window.clipboardData.getData) {
				cb = window.clipboardData.getData('Text');
			} else if (e.originalEvent.clipboardData && e.originalEvent.clipboardData.getData) {
				cb = e.originalEvent.clipboardData.getData('text/plain');
			}
	        var ur = cut_url(cb);
			if (ur != null) {
				ur = ur[1];
				$("#pz-url").val(ur);
				$("#pz-url").select();
				return false;
			}
		}
	} ) ;
	
	// 挿入ボタン
	$("#pz-insert").unbind().click( function() {
	    $("#pz-overlay").css("display","none");
	    $("#pz-modal").css("display","none");
		if ($("#pz-url").val() != "") {
	    	var sc = "<p>[" + $("#pz-code").val() + " url=\"" + $("#pz-url").val() + "\"]</p>";
	    	tinymce.activeEditor.selection.setContent(sc);
	    }
	    tinymce.activeEditor.focus()
	    $("#pz-serif").val("");
		$("#pz-check").prop("checked", false);
	} ) ;

	// ウィンドウのリサイズ
	$(window).resize(modal_move_center);
	function modal_move_center() {
	    var w = $(window).width();
	    var h = $(window).height();
	    var mw = $("#pz-modal").outerWidth();
	    var mh = $("#pz-modal").outerHeight();
	    $("#pz-modal").css( {"left": ((w - mw)/2) + "px","top": ((h - mh)/2) + "px"} );
	}

	// 文字列からURLを切り出す
	function cut_url(s) {
	    // var reg = '((https?|file|ftp|data|ogg):\/\/[^ \'"<]+)';
	    var reg = '((https?|file|ftp|data|ogg):\/\/[^ "<]+)';
	    var ur = s.match(reg );
	    return ur;
	}
	
} ) ( jQuery );
