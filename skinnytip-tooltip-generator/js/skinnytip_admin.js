/*
Plugin Name: Skinnytip Tooltips
Plugin URI: http://www.ebrueggeman.com/skinnytip
Description: Easy JavaScript tooltip generator for your pages and posts. 
Version: 1.03
Author: Elliott Brueggeman
Author URI: http://www.ebrueggeman.com
Please see readme.txt version for more information.
*/
/*  Copyright 2008  Elliott Brueggeman  (email : ebrueggeman@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3. 

License on the web: http://www.gnu.org/licenses/gpl-3.0.txt

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//function to hide/unhide image and link input areas
function skinnytip_manage_type() {
	var image = self.document.getElementById('skinnytip_type_image');
	var link = self.document.getElementById('skinnytip_type_link');
	var image_div = self.document.getElementById('skinnytip_image_div');
	var link_div = self.document.getElementById('skinnytip_link_div');

	if (image.checked) {
		image_div.style.display = 'block';
	}
	else {
		image_div.style.display = 'none';
	}
	
	if (link.checked) {
		link_div.style.display = 'block';
	}
	else {
		link_div.style.display = 'none';
	}
}

//function to hide/unhide advanced options area
function skinnytip_manage_advanced() {
	var advanced_on = self.document.getElementById('skinnytip_advanced_options_on');
	var advanced_off = self.document.getElementById('skinnytip_advanced_options_off');
	var advanced_div = self.document.getElementById('skinnytip_advanced_div');

	if(advanced_on.checked) {
		advanced_div.style.display = 'block';
	}
	else {
		advanced_div.style.display = 'none';
	}
}

//reset to default variables
function skinnytip_reset_advanced() {
	self.document.getElementById('skinnytip_width').value = '300';
	self.document.getElementById('skinnytip_border_width').value = '2';
	self.document.getElementById('skinnytip_title_padding').value = '1px';
	self.document.getElementById('skinnytip_text_padding').value = '1px 3px';
	self.document.getElementById('skinnytip_backcolor').value = '#FFFFCC';
	self.document.getElementById('skinnytip_titlecolor').value = '#000000';
	self.document.getElementById('skinnytip_textcolor').value = '#000000';
	self.document.getElementById('skinnytip_bordercolor').value = '#FFCC66';
}

//creates skinnytip code and displays in textarea
function skinnytip_manage_code() {
	var image_radio = self.document.getElementById('skinnytip_type_image');
	var link_radio = self.document.getElementById('skinnytip_type_link');
	var code_textarea = self.document.getElementById('skinnytip_code');
	var preview = self.document.getElementById('skinnytip_preview');
	var advanced_options = self.document.getElementById('skinnytip_advanced_options_on');
	var skinnytip_text = skinnytip_trim(self.document.getElementById('skinnytip_text').value);
	var skinnytip_title = skinnytip_trim(self.document.getElementById('skinnytip_title').value);
	var image = skinnytip_trim(self.document.getElementById('skinnytip_image').value);
	var link = skinnytip_trim(self.document.getElementById('skinnytip_link').value);
	var dest = skinnytip_trim(self.document.getElementById('skinnytip_link_dest').value);
	
	//adv options
	var skinnytip_width = skinnytip_trim(self.document.getElementById('skinnytip_width').value);
	var skinnytip_border_width = skinnytip_trim(self.document.getElementById('skinnytip_border_width').value);
	var skinnytip_title_padding = skinnytip_trim(self.document.getElementById('skinnytip_title_padding').value);
	var skinnytip_text_padding = skinnytip_trim(self.document.getElementById('skinnytip_text_padding').value);
	var skinnytip_backcolor = skinnytip_trim(self.document.getElementById('skinnytip_backcolor').value);
	var skinnytip_titlecolor = skinnytip_trim(self.document.getElementById('skinnytip_titlecolor').value);
	var skinnytip_textcolor = skinnytip_trim(self.document.getElementById('skinnytip_textcolor').value);
	var skinnytip_bordercolor = skinnytip_trim(self.document.getElementById('skinnytip_bordercolor').value);
	
	var code_base = '';
	
	if(image_radio.checked) {
		//using image
		code_base += '<img src="' + image + '" ';
	}
	else {
		//using link
		code_base += '<a href="' + dest + '" ';
	}
	
	var code = 'onMouseOver="return tooltip(\''+ skinnytip_text + '\'';
	
	if (skinnytip_title && skinnytip_title.length > 0) {
		code += ', \'' + skinnytip_title + '\'';
	}
	
	if (advanced_options.checked) {
		var has_advanced = false;
		var advanced_code = '';
		
		if (skinnytip_width.length > 0 && skinnytip_width != '300') {
			advanced_code += 'width:' + skinnytip_width + ',';
			has_advanced = true;
		}
		if (skinnytip_border_width.length > 0 && skinnytip_border_width != '2') {
			advanced_code += 'border:' + skinnytip_border_width + ',';
			has_advanced = true;
		}
		if (skinnytip_title_padding.length > 0 && skinnytip_title_padding != '1px') {
			advanced_code += 'title_padding:' + skinnytip_title_padding + ',';
			has_advanced = true;
		}
		if (skinnytip_text_padding.length > 0 && skinnytip_text_padding != '1px 3px') {
			advanced_code += 'content_padding:' + skinnytip_text_padding + ',';
			has_advanced = true;
		}
		if (skinnytip_backcolor.length > 0 && skinnytip_backcolor != '#FFFFCC') {
			advanced_code += 'backcolor:' + skinnytip_backcolor + ',';
			has_advanced = true;
		}
		if (skinnytip_titlecolor.length > 0 && skinnytip_titlecolor != '#000000') {
			advanced_code += 'titletextcolor:' + skinnytip_titlecolor + ',';
			has_advanced = true;
		}
		if (skinnytip_textcolor.length > 0 && skinnytip_textcolor != '#000000') {
			advanced_code += 'textcolor:' + skinnytip_textcolor + ',';
			has_advanced = true;
		}
		if (skinnytip_bordercolor.length > 0 && skinnytip_bordercolor != '#FFCC66') {
			advanced_code += 'bordercolor:' + skinnytip_bordercolor + ',';
			has_advanced = true;
		}
		
		if (has_advanced) {
		
			//remove last comma from advanced_code
			var len = advanced_code.length;
			if (advanced_code.substring(len-1,len) == ',') {
				advanced_code = advanced_code.substring(0, len-1);
			}
			
			//if no title, add as empty param, so we can set advanced options
			if (skinnytip_title.length == 0) {
				code +=", ''";
			}
		
			code += ', \'' + advanced_code +  '\'';
		}
	}
	
	code += ');"';
	code += ' onMouseOut="return hideTip();"';
	
	//output preview to preview widget
	preview.innerHTML = '<a href="#" ' + code + ' onClick="return false;"><strong>Preview this tooltip</strong></a>';
	
	//after preview, add code base back to code
	code = code_base + code + '>';
	
	//if we are making a link, close the link
	if(!image_radio.checked) {
		code += link + '</a>';
	}
	
	//output to textarea
	code_textarea.value = code;
}

//trim function to remove whitespace
function skinnytip_trim(str) {
	if (typeof(str) != 'undefined' && str.length > 0) {
		while (str.charAt(0) == (" ") ) {  
			str = str.substring(1);
		}
		while (str.charAt(str.length-1) == " " ) {  
			str = str.substring(0,str.length-1);
		}
	}
	return str;
}

//helper function to display instructions inside text input boxes
function skinnytip_manage_greyed_input(input, focus, default_value) {
	if (focus == 'true' && input.value == default_value) {
		input.value = '';
	}
	else if (focus == 'false' && input.value.length == 0) {
		input.value = default_value;
	}
}