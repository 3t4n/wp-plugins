/**
 * Copyright 2016 GoWorks Incorporated. All rights reserved.
 * License: GPLv3 or later.
 *
 * This program is free software: you can redistribute it and/or modify it under the terms
 * of the GNU General Public License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program.
 * If not, see <http://www.gnu.org/licenses/>.
 */

var go = go || {};
go.styler = go.styler || {};

go.styler.cols = 8;

/**
 * Set the colors, defaulting to standard editor colors when available.
 */
go.styler.mapColors = function(editor) {
	var i, colors = [], colorMap;
	colorMap = editor.settings.textcolor_map || [
         "000000", "Black",
         "993300", "Burnt orange",
         "333300", "Dark olive",
         "003300", "Dark green",
         "003366", "Dark azure",
         "000080", "Navy Blue",
         "333399", "Indigo",
         "333333", "Very dark gray",
         "800000", "Maroon",
         "FF6600", "Orange",
         "808000", "Olive",
         "008000", "Green",
         "008080", "Teal",
         "0000FF", "Blue",
         "666699", "Grayish blue",
         "808080", "Gray",
         "FF0000", "Red",
         "FF9900", "Amber",
         "99CC00", "Yellow green",
         "339966", "Sea green",
         "33CCCC", "Turquoise",
         "3366FF", "Royal blue",
         "800080", "Purple",
         "999999", "Medium gray",
         "FF00FF", "Magenta",
         "FFCC00", "Gold",
         "FFFF00", "Yellow",
         "00FF00", "Lime",
         "00FFFF", "Aqua",
         "00CCFF", "Sky blue",
         "993366", "Red violet",
         "FFFFFF", "White",
         "FF99CC", "Pink",
         "FFCC99", "Peach",
         "FFFF99", "Light yellow",
         "CCFFCC", "Pale green",
         "CCFFFF", "Pale cyan",
         "99CCFF", "Light sky blue",
         "CC99FF", "Plum"
    ];

	for (i = 0; i < colorMap.length; i += 2) {
		colors.push({
			text: colorMap[i + 1],
			color: '#' + colorMap[i]
		});
	}

	return colors;
};

/**
 * Common code for rendering the color selection section.
 */
go.styler.renderColorSection = function(editor, id, colorVal, opacityVal) {
	
	// Colors
	function getColorCellHtml(color, title, idStr) {
		var isNoColor = (color == 'transparent');
		var html = (
			'<td class="mce-grid-cell' + (isNoColor ? ' mce-colorbtn-trans' : '') + '">' +
				'<div id="' + idStr + '"' +
					' class="go-selectable"' +
					' data-mce-color="' + (color ? color : '') + '"' +
					(color == colorVal ? ' selected' : '') + 
					' role="option"' +
					' tabIndex="-1"' +
					' style="' + (color ? 'background-color: ' + color : '') + '"' +
					' title="' + tinymce.translate(title) + '">' +
					(isNoColor ? '&#215;' : '') +
				'</div>' +
			'</td>'
		);
		return html;
	}

	var colors = go.styler.mapColors(editor);
	colors.push({
		text: tinymce.translate('Remove'),
		color: 'transparent'
	});

	var html = '';
	var last = colors.length - 1;
	var count = 0;
	var rows = editor.settings.textcolor_rows || 5;
	var cols = go.styler.cols;
	
	for (var y = 0; y < rows; y++) {
		html += '<tr>';
		for (var x = 0; x < cols; x++) {
			var i = y * cols + x;
			if (i > last) {
				html += '<td></td>';
			} else {
				var color = colors[i];
				html += getColorCellHtml(color.color, color.text, id + '-' + (count++));
			}
		}
		html += '</tr>';
	}
	
	// Custom colors
	if (editor.settings.color_picker_callback) {
		html += (
			'<tr>' +
				'<td colspan="' + cols + '" class="mce-custom-color-btn">' +
					'<div id="' + id + '-c" class="mce-widget mce-btn mce-btn-small mce-btn-flat" ' +
						'role="button" tabindex="-1" aria-labelledby="' + id + '-c" style="width: 100%">' +
						'<button type="button" role="presentation" tabindex="-1">' + tinymce.translate('Custom...') + '</button>' +
					'</div>' +
				'</td>' +
			'</tr>'
		);

		html += '<tr id="' + id + '-customColorCells">';
		for (x = 0; x < cols; x++) {
			html += getColorCellHtml('', 'Custom color', id + '-' + (count++));
		}
		html += '</tr>';
	}
	
	// Opacity
	count = 0;
	html += go.styler.renderVerticalSpacing();
	html += go.styler.renderLabel('Opacity');
	html += '<tr>';
	for (x = 1; x <= cols; x++) {
		var opacity = 1 / cols * x;
		var _id = id + '-o' + (count++);
		html += (
			'<td class="mce-grid-cell">' +
				'<div id="' + _id + '"' +
					' class="go-selectable"' +
					' data-go-opacity="' + opacity + '"' +
					(opacity == opacityVal ? ' selected' : '') + 
					' role="option"' +
					' tabIndex="-1"' +
					' style="color:rgba(173,173,173,' + (1 - opacity) + ');background:rgba(0,0,0,' + opacity + ');"' +
					' title="' + (opacity * 100) + '%"><i class="mce-ico mce-i-go-opacity-bg"></i>' +
				'</div>' +
			'</td>');
	}
	html += '</tr>';
	return html;
};

/**
 * Common code for rendering line thickness selection sections.
 */
go.styler.renderLineThicknessSection = function(isVertical, id, idSuffix, currentValue, widths, dataName) {
	var count = 0;
	var html = '<tr>';
	for (var x = 0; x < go.styler.cols; x++) {
		var _id = id + idSuffix + (count++);
		var marginOffset = isVertical ? 'left' : 'top';
		html += (
			'<td class="mce-grid-cell">' +
				'<div id="' + _id + '"' +
					' class="go-line-container go-selectable"' +
					' data-' + dataName + '="' + widths[x] + '"' +
					(widths[x] == currentValue ? ' selected' : '') + 
					' role="option" tabIndex="-1"' +
					' style="background:#fff;"' +
					' title="' + widths[x] + 'px">' +
					'<div class="go-line-width-' + marginOffset + '" style="border-width:' + widths[x] + 'px;' +
						'margin-' + marginOffset + ':' + ((13 - widths[x])/2) + 'px;"></div>' + 
				'</div>' +
			'</td>'
		);
	}
	html += '</tr>';
	return html;
};

/**
 * Render a section label.
 */
go.styler.renderLabel = function(label) {
	return '<tr><td colspan="' + go.styler.cols + '"><div class="go-styler-picker-lbl">' + label + '</div></td></tr>';
};

/**
 * Apply vertical spacing between sections.
 */
go.styler.renderVerticalSpacing = function() {
	return '<tr><td class="go-styler-picker-lbl-spacer" colspan="' + go.styler.cols + '">&nbsp;</td></tr>';
};

//----------------------------------------------
// Text color and Background Color button plugin
//----------------------------------------------

tinymce.PluginManager.add('goworks_styler_textcolor', function(editor) {
	
	var buttonCtrl; // The split button control on the toolbar
	var id;
	var rows = editor.settings.textcolor_rows || 5;
	go.styler.cols = editor.settings.textcolor_cols || go.styler.cols;
	var cols = go.styler.cols;
	var colorVal = '#000000';
	var opacityVal = 1;
	
	function getCurrentColor(format) {
		var color;
		editor.dom.getParents(editor.selection.getStart(), function(elm) {
			var value;
			if ((value = elm.style[format == 'forecolor' ? 'color' : 'background-color'])) {
				color = value;
			}
		});
		return color;
	}

	function renderPicker() {
		var html = '<table class="mce-grid mce-grid-border mce-colorbutton-grid" role="list" cellspacing="0"><tbody>';
		html += go.styler.renderColorSection(editor, this._id, colorVal, opacityVal);
		html += '</tbody></table>';
		return html;
	}

	function applyFormat(format, clr) {
		editor.undoManager.transact(function() {
			editor.focus();
			editor.formatter.apply(format, {value: clr});
			editor.nodeChanged();
		});
	}

	function removeFormat(format) {
		editor.undoManager.transact(function() {
			editor.focus();
			editor.formatter.remove(format, {value: null}, null, true);
			editor.nodeChanged();
		});
	}
	
	function onPanelClick(e) {
		buttonCtrl = this.parent();
		var target = e.target;
		if (!target.classList.contains('go-selectable')) target = target.parentElement;
		
		function selectColor() {
			var rgb = new tinymce.util.Color(colorVal).toRgb();
			var clr = 'rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ',' + opacityVal.toString() + ')';
			buttonCtrl.color(clr);
			applyFormat(buttonCtrl.settings.format, clr);
		}

		function resetColor() {
			buttonCtrl.resetColor();
			removeFormat(buttonCtrl.settings.format);
		}
		
		// 'Custom...' button
		if (tinymce.DOM.getParent(target, '.mce-custom-color-btn')) {
			editor.settings.color_picker_callback.call(editor, function(value) {
				var customColorCells, div, i;
				customColorCells = tinymce.map(document.getElementById(id + '-customColorCells').childNodes, function(elm) {
					return elm.firstChild;
				});
				for (i = 0; i < customColorCells.length; i++) {
					div = customColorCells[i];
					if (!div.getAttribute('data-mce-color')) {
						break;
					}
				}
				// Shift colors to the right
				if (i == cols) {
					for (i = 0; i < cols - 1; i++) {
						customColorCells[i].style.background = customColorCells[i + 1].getAttribute('data-mce-color');
						div.setAttribute('data-mce-color', value);
					}
				}
				div.style.background = value;
				div.setAttribute('data-mce-color', value);
				setTimeout(function() { buttonCtrl.showPanel(); }, 0);
			}, getCurrentColor(buttonCtrl.settings.format));
			return;
		}
		
		// Color
		var clr = target.getAttribute('data-mce-color');
		if (clr) {
			colorVal = clr;
			if (buttonCtrl.lastColorId) {
				document.getElementById(buttonCtrl.lastColorId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			buttonCtrl.lastColorId = target.id;
			if (colorVal == 'transparent') {
				var node = editor.selection.getNode();
				resetColor();
				try {
					editor.selection.select(node);
				} catch(err) {}
			} else {
				selectColor();
			}
			return;
		}
		
		// Opacity
		var opac = target.getAttribute('data-go-opacity');
		if (opac) {
			opacityVal = opac;
			if (buttonCtrl.lastOpacityId) {
				document.getElementById(buttonCtrl.lastOpacityId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			buttonCtrl.lastOpacityId = target.id;
			selectColor();
			return;
		}
	}

	// Button face click. Apply the current style.
	function onButtonClick() {
		var self = this;
		if (self._color) {
			applyFormat(self.settings.format, self._color);
		} else {
			removeFormat(self.settings.format);
		}
	}
	
	function onPostRender() {
		id = this._id;
	}
	
	editor.addButton('goworks_styler_forecolor', {
		type: 'colorbutton',
		tooltip: 'Text color',
		icon: 'forecolor',
		format: 'forecolor',
		panel: {
			role: 'application',
			ariaRemember: true,
			html: renderPicker,
			onclick: onPanelClick,
			onPostRender: onPostRender
		},
		onclick: onButtonClick
	});
	
	editor.addButton('goworks_styler_backcolor', {
		type: 'colorbutton',
		tooltip: 'Background color',
		icon: 'backcolor',
		format: 'hilitecolor',
		panel: {
			role: 'application',
			ariaRemember: true,
			html: renderPicker,
			onclick: onPanelClick,
			onPostRender: onPostRender
		},
		onclick: onButtonClick
	});

}); // End Text color and Background Color button plugin

// --------------------
// Border button plugin
// --------------------

tinymce.PluginManager.add('goworks_styler_border', function(editor) {
	var id;
	var buttonCtrl; // The split button control on the toolbar
	var FORMAT = 'goworks_styler_border_format';
	var rows = editor.settings.textcolor_rows || 5;
	go.styler.cols = editor.settings.textcolor_cols || go.styler.cols;
	var cols = go.styler.cols;
	var colorVal = '#000000';
	var opacityVal = 1;
	var lineThicknessVal = 1;
	var lineStyleVal = 'solid';
	var cornerRadiusVal = 0;
	
	var lastColorId, lastOpacityId, lastThicknessId, lastRadiusId;
	
	function getCurrentColor(format) {
		var color;
		editor.dom.getParents(editor.selection.getStart(), function(elm) {
			var value;
			if ((value = elm.style[format == 'border-color'])) {
				color = value;
			}
		});
		return color;
	}

	function renderPicker() {
		id = this._id;
		registerFormat();
		var html = '<table class="mce-grid mce-grid-border mce-colorbutton-grid" role="list" cellspacing="0"><tbody>';
		html += go.styler.renderColorSection(editor, id, colorVal, opacityVal);
		
		// Line thickness
		html += go.styler.renderVerticalSpacing();
		html += go.styler.renderLabel('Line thickness');
		html += go.styler.renderLineThicknessSection(false, id, '-w', lineThicknessVal, [1, 2, 3, 5, 7, 9, 12, 15], 'go-width');
		
		// Line style
		html += go.styler.renderVerticalSpacing();
		html += go.styler.renderLabel('Line style');
		html += (
			'<tr>' +
				'<td colspan="' + cols + '">' +
					'<select id="' + id + '-s" class="go-styler-picker-select">' +
					'<option value="dashed">Dashed</option>' +
						'<option value="dotted">Dotted</option>' +
						'<option value="double">Double</option>' +
						'<option value="groove">Groove</option>' +
						'<option value="inset">Inset</option>' +
						'<option value="outset">Outset</option>' +
						'<option value="solid" selected>Solid</option>' +
						'<option value="ridge">Ridge</option>' +
					'</select>' +
				'</td>' +
			'</tr>'
		);
		
		// Corner radius
		var count = 0;
		html += go.styler.renderVerticalSpacing();
		html += go.styler.renderLabel('Corner rounding');
		html += '<tr>';
		for (var x = 0; x < cols; x++) {
			var rad = x * 2;
			var title = (x == 0 ? 'None' : rad + 'px');
			var style = (x == 0 ? '' : ' style="border-radius:' + rad + 'px;"');
			var _id = id + '-r' + (count++);
			html += (
				'<td class="mce-grid-cell">' +
					'<div id="' + _id + '"' +
						' class="go-corner-container go-selectable"' +
						' data-go-radius="' + rad + '"' +
						(rad == cornerRadiusVal ? ' selected' : '') + 
						' role="option" tabIndex="-1"' +
						' style="background:#fff;"' +
						' title="' + title + '">' +
						'<div class="go-corner-radius"' + style + '></div>' + 
					'</div>' +
				'</td>'
			);
			if (rad == cornerRadiusVal) lastRadiusId = _id;
		}
		html += '</tr>';
		
		html += '</tbody></table>';
		return html;
	}

	function registerFormat() {
		editor.formatter.register(FORMAT, {
			remove: 'all',
			inline : 'span',
			styles : {
				'display': 'inline-block',
				'border': '%border',
				'border-radius': '%borderRadius'
			}
		});
	}
	
	function applyFormat() {
		var rgb = new tinymce.util.Color(colorVal).toRgb();
		var clr = 'rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ',' + opacityVal.toString() + ')';
		if (!buttonCtrl) return; 
		buttonCtrl.color(clr);
		editor.undoManager.transact(function() {
			editor.focus();
			editor.formatter.apply(FORMAT, { 
				border: lineThicknessVal + 'px ' + lineStyleVal + ' ' + clr,
				borderRadius: cornerRadiusVal + 'px'
			});
			editor.nodeChanged();
		});
	}

	function removeFormat() {
		buttonCtrl.resetColor();
		editor.undoManager.transact(function() {
			editor.formatter.remove(FORMAT);
			editor.nodeChanged();
		});
	}
	
	function onPanelClick(e) {
		var target = e.target;
		if (!target.classList.contains('go-selectable')) target = target.parentElement;
		
		// 'Custom...' button
		if (tinymce.DOM.getParent(target, '.mce-custom-color-btn')) {
			editor.settings.color_picker_callback.call(editor, function(value) {
				var customColorCells, div, i;
				customColorCells = tinymce.map(document.getElementById(id + '-customColorCells').childNodes, function(elm) {
					return elm.firstChild;
				});
				for (i = 0; i < customColorCells.length; i++) {
					div = customColorCells[i];
					if (!div.getAttribute('data-mce-color')) {
						break;
					}
				}
				// Shift colors to the right
				if (i == cols) {
					for (i = 0; i < cols - 1; i++) {
						customColorCells[i].style.background = customColorCells[i + 1].getAttribute('data-mce-color');
						div.setAttribute('data-mce-color', value);
					}
				}
				div.style.background = value;
				div.setAttribute('data-mce-color', value);
				setTimeout(function() { buttonCtrl.showPanel(); }, 0);
			}, getCurrentColor(buttonCtrl.settings.format));
			return;
		}
		
		// Color
		var clr = target.getAttribute('data-mce-color');
		if (clr) {
			colorVal = clr;
			if (lastColorId) {
				document.getElementById(lastColorId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastColorId = target.id;
			if (colorVal == 'transparent') {
				var node = editor.selection.getNode();
				removeFormat();
				try {
					editor.selection.select(node);
				} catch(err) {}
			} else {
				applyFormat();
			}
			return;
		}
		
		// Opacity
		var opac = target.getAttribute('data-go-opacity');
		if (opac) {
			opacityVal = opac;
			if (lastOpacityId) {
				document.getElementById(lastOpacityId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastOpacityId = target.id;
			applyFormat();
			return;
		}
		
		// Line thickness
		var width = target.getAttribute('data-go-width');
		if (width) {
			lineThicknessVal = width;
			if (lastThicknessId) {
				document.getElementById(lastThicknessId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastThicknessId = target.id;
			applyFormat();
			return;
		}
		
		// Line style - is determined by the 'change' listener set in onPostRender()
		
		// Corner radius
		var rad = target.getAttribute('data-go-radius');
		if (rad) {
			cornerRadiusVal = rad;
			if (lastRadiusId) {
				document.getElementById(lastRadiusId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastRadiusId = target.id;
			applyFormat();
			return;
		}
	}

	// Button face click. Apply the current style.
	function onBorderButtonClick() {
		applyFormat();
	}
	
	function onPostRender() {
		buttonCtrl = this.parent();
		var lineStyleSelector = document.getElementById(id + '-s');
		lineStyleSelector.addEventListener('change', function(e) {
			lineStyleVal = e.target.value;
			applyFormat();
		});
	}
	
	editor.addButton('goworks_styler_border', {
		type: 'colorbutton',
		tooltip: 'Border',
		icon: 'go-border',
		format: 'forecolor',
		panel: {
			role: 'application',
			ariaRemember: true,
			html: renderPicker,
			onclick: onPanelClick,
			onPostRender: onPostRender
		},
		onclick: onBorderButtonClick
	});

}); // End Border button plugin

//----------------------
// Spacing button plugin
//----------------------

tinymce.PluginManager.add('goworks_styler_spacing', function(editor) {
	var id;
	var FORMAT = 'goworks_styler_spacing_format';
	go.styler.cols = editor.settings.textcolor_cols || go.styler.cols;
	var cols = go.styler.cols;
	var vertPaddingVal = 0;
	var horzPaddingVal = 5;
	var vertMarginVal = 0;
	var horzMarginVal = 2;
	var lastVertPaddingId, lastHorzPaddingId, lastVertMarginId, lastHorzMarginId;

	function renderSpacingPicker() {
		id = this._id;
		registerFormat();
		var widths = [0, 1, 2, 5, 7, 9, 12, 16];
		var html = '<table class="mce-grid mce-grid-border mce-colorbutton-grid" role="list" cellspacing="0"><tbody>';

		// Padding
		html += go.styler.renderLabel('Padding');
		html += go.styler.renderLineThicknessSection(false, id, '-vp', vertPaddingVal, widths, 'go-vert-padding');
		html += go.styler.renderVerticalSpacing();
		html += go.styler.renderLineThicknessSection(true, id, '-hp', horzPaddingVal, widths, 'go-horz-padding');
				
		// Margins
		html += go.styler.renderVerticalSpacing();
		html += go.styler.renderLabel('Margin');
		html += go.styler.renderLineThicknessSection(false, id, '-vm', vertMarginVal, widths, 'go-vert-margin');
		html += go.styler.renderVerticalSpacing();
		html += go.styler.renderLineThicknessSection(true, id, '-hm', horzMarginVal, widths, 'go-horz-margin');
		
		html += '</tbody></table>';
		return html;
	}

	function registerFormat() {
		editor.formatter.register(FORMAT, {
			remove: 'all',
			inline : 'span',
			styles : {
				'display': 'inline-block',
				'padding': '%padding',
				'margin': '%margin'
			}
		});
	}
	
	function applyFormat() {
		editor.undoManager.transact(function() {
			editor.focus();
			editor.formatter.apply(FORMAT, { 
				padding: vertPaddingVal + 'px ' + horzPaddingVal + 'px',
				margin: vertMarginVal + 'px ' + horzMarginVal + 'px'
			});
			editor.nodeChanged();
		});
	}
	
	function onPanelClick(e) {
		var target = e.target;
		if (!target.classList.contains('go-selectable')) target = target.parentElement;
		
		// Vertical padding
		var width = target.getAttribute('data-go-vert-padding');
		if (width) {
			vertPaddingVal = width;
			if (lastVertPaddingId) {
				document.getElementById(lastVertPaddingId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastVertPaddingId = target.id;
			applyFormat();
			return;
		}
		
		// Horizontal padding
		width = target.getAttribute('data-go-horz-padding');
		if (width) {
			horzPaddingVal = width;
			if (lastHorzPaddingId) {
				document.getElementById(lastHorzPaddingId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastHorzPaddingId = target.id;
			applyFormat();
			return;
		}
		
		// Vertical margin
		width = target.getAttribute('data-go-vert-margin');
		if (width) {
			vertMarginVal = width;
			if (lastVertMarginId) {
				document.getElementById(lastVertMarginId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastVertMarginId = target.id;
			applyFormat();
			return;
		}
		
		// Horizontal margin
		width = target.getAttribute('data-go-horz-margin');
		if (width) {
			horzMarginVal = width;
			if (lastHorzMarginId) {
				document.getElementById(lastHorzMarginId).setAttribute('aria-selected', false);
			}
			target.setAttribute('aria-selected', true);
			lastHorzMarginId = target.id;
			applyFormat();
			return;
		}		
	}

	// Button face click. Apply the current style.
	function onButtonClick() {
		applyFormat();
	}
	
	function onButtonPostRender() {
		// Turn off the color preview bar
		this.color('transparent');
	}
	
	editor.addButton('goworks_styler_spacing', {
		type: 'colorbutton',
		tooltip: 'Spacing',
		icon: 'go-spacing',
		panel: {
			role: 'application',
			ariaRemember: true,
			html: renderSpacingPicker,
			onclick: onPanelClick
		},
		onclick: onButtonClick,
		onPostRender: onButtonPostRender
	});

}); // End Spacing button plugin

