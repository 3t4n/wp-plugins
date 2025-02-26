$.fn.setCursorPosition=function(pos) {
	if ($(this).get(0).setSelectionRange) {
		$(this).get(0).setSelectionRange(pos, pos);
	}
	else if($(this).get(0).createTextRange) {
		var range=$(this).get(0).createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		//range.select();
	}
}

$.fn.translate=function(checkID){
	// Tracking characters
	var trCh=Array();
	trCh[33]='Է';
	trCh[34]='"';
	trCh[35]='Փ';
	trCh[36]='Ձ';
	trCh[37]='Ջ';
	trCh[39]='՛';
	trCh[40]='Չ';
	trCh[41]='Ճ';
	trCh[42]='Ր';
	trCh[43]='Ժ';
	trCh[48]='ճ';
	trCh[49]='է';
	trCh[50]='թ';
	trCh[51]='փ';
	trCh[52]='ձ';
	trCh[53]='ջ';
	trCh[54]='ւ';
	trCh[55]='և';
	trCh[56]='ր';
	trCh[57]='չ';
	trCh[61]='ժ';
	trCh[63]='՞';
	trCh[64]='Թ';
	trCh[65]='Ա';
	trCh[66]='Բ';
	trCh[67]='Ց';
	trCh[68]='Դ';
	trCh[69]='Ե';
	trCh[70]='Ֆ';
	trCh[71]='Գ';
	trCh[72]='Հ';
	trCh[73]='Ի';
	trCh[74]='Յ';
	trCh[75]='Կ';
	trCh[76]='Լ';
	trCh[77]='Մ';
	trCh[78]='Ն';
	trCh[79]='Օ';
	trCh[80]='Պ';
	trCh[81]='Ք';
	trCh[82]='Ռ';
	trCh[83]='Ս';
	trCh[84]='Տ';
	trCh[85]='Ւ';
	trCh[86]='Վ';
	trCh[87]='Ո';
	trCh[88]='Ղ';
	trCh[89]='Ը';
	trCh[90]='Զ';
	trCh[91]='խ';
	trCh[92]='շ';
	trCh[93]='ծ';
	trCh[96]='՝';
	trCh[97]='ա';
	trCh[98]='բ';
	trCh[99]='ց';
	trCh[100]='դ';
	trCh[101]='ե';
	trCh[102]='ֆ';
	trCh[103]='գ';
	trCh[104]='հ';
	trCh[105]='ի';
	trCh[106]='յ';
	trCh[107]='կ';
	trCh[108]='լ';
	trCh[109]='մ';
	trCh[110]='ն';
	trCh[111]='օ';
	trCh[112]='պ';
	trCh[113]='ք';
	trCh[114]='ռ';
	trCh[115]='ս';
	trCh[116]='տ';
	trCh[117]='ւ';
	trCh[118]='վ';
	trCh[119]='ո';
	trCh[120]='ղ';
	trCh[121]='ը';
	trCh[122]='զ';
	trCh[123]='Խ';
	trCh[124]='Շ';
	trCh[125]='Ծ';
	trCh[126]='՜';

	// Get Keydown ID
	$(this).keydown(function(event) {
		keydownWhich=event.which;
	});

	$(this).keypress(function(event) {
		// Numbers in right
		if(keydownWhich>=96 && keydownWhich<=105){
			return;
		}

		if(!checkID || $('#'+checkID).attr('checked')=='checked'){
			if(trCh[event.which] && event.ctrlKey==false && event.altKey==false){
				event.preventDefault();
				// For all browsers excepting (as always) IE
				if(window.getSelection){
					cursorPosition=this.selectionStart+1;
					$(this).val(
						$(this).val().substring(0, this.selectionStart)+
						trCh[event.which]+
						$(this).val().substring(this.selectionEnd)
					);
					$(this).setCursorPosition(cursorPosition);
				}
				// IE
				else{
					if(document.selection.createRange){
						var range = document.selection.createRange();
						range.text=trCh[event.which];

						var textInputRange = this.createTextRange();
						var precedingRange = this.createTextRange();
						var bookmark = range.getBookmark();
						textInputRange.moveToBookmark(bookmark);
						precedingRange.setEndPoint("EndToStart", textInputRange);
						start = precedingRange.text.length;
						end = start + range.text.length;
						textInputRange = this.createTextRange();
						textInputRange.collapse(true);
						textInputRange.move("character", start - (this.value.slice(0, start).split("\r\n").length - 1));
						textInputRange.select();

					}
				}
			}
		}
	});
	
	//Checkbox switcher
	if(checkID){
		$(document).keydown(function(event){
			if(event.ctrlKey==true && event.shiftKey==true){
				$('#'+checkID).click();
			}
		});
	}
}