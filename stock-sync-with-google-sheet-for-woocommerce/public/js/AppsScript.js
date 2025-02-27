const baseURL = "{site_url}",
  accessToken = "{token}",
  sheetTab = "{sheet_tab}"; 

  function RunSSGSW() {
    if (!ssgsw_current_sheet()) return;
    ssgsw_add_menus();
    try {
        ssgsw_apply_styles();
    } catch (error) {
        Logger.log('Already applied styles');
    }
}

function onOpen() {
    RunSSGSW();
}

function ssgsw_current_sheet() {
    return SpreadsheetApp.getActiveSheet().getSheetName() == sheetTab;
}

function ssgsw_check_other_tab_edit(e) {
    var sheet = e.source.getActiveSheet();
    return sheet.getName();
}

function ssgsw_products_information(key = 'ssgsw_data_info') {
    const properties = PropertiesService.getScriptProperties();
    const previous_info = properties.getProperty(key);
    return previous_info ? JSON.parse(previous_info) : [];
}

function ssgsw_save_product_to_cache(key = 'ssgsw_data_info', data = []) {
    const properties = PropertiesService.getScriptProperties();
    properties.setProperty(key, JSON.stringify(data));
    Logger.log("Products saved to cache.");
}

function ssgsw_save_temp_info(key = 'ssgsw_time_storage', data = '') {
    const properties = PropertiesService.getScriptProperties();
    properties.setProperty(key, data);
    Logger.log("Saved" + key + " information");
}

function ssgsw_delete_property(key = 'ssgsw_time_storage') {
    const properties = PropertiesService.getScriptProperties();
    properties.deleteProperty(key);
}

function ssgsw_get_temp_information(key = 'ssgsw_time_storage') {
    var new_properties = PropertiesService.getScriptProperties();
    return new_properties.getProperty(key) ? new_properties.getProperty(key) : null;
}

function onEdit(e) {
    if (e == null || e == 'undefined' || e == '') return;
    if (e.triggerUid == null) return;
    if (ssgsw_check_other_tab_edit(e) === sheetTab) {
        var check_non_edit = false;
        const currentColumn = ssgsw_current_column();
       
        var default_text = 'Updating product... Please wait!.';
        var ssgs_ui = SpreadsheetApp.getUi();
        if (["ID"].includes(currentColumn)) {
            ssgs_ui.alert("This column is not editable");
            return;
        } else if (["type", "sales","ssgsw_product_url"].includes(currentColumn)) {
            ssgs_ui.alert("This column is not editable");
            var default_text = 'The product is being processed again. Please do not close or interrupt the sync... Please wait!.';
            check_non_edit = true;
        }
        ssgsw_toast2(default_text, 'Loading...');
        let data = ssgsw_get_edited_data(e);
       
      
        let key_value = ssgsw_columns(currentColumn, true);
        if (typeof key_value === "undefined") {
            key_value = currentColumn;
        }
        if (typeof key_value === 'object' && key_value !== null) {
            return;
        }
        let message = key_value + " updated successfully!";
        if (check_non_edit) {
            message = key_value + " back successfully!"
        }
        if (data[0]['ID'] == "") {
            message = "Product created successfully!";
        }
        ssgsw_sync_data(data, message, check_non_edit, true);
    } else {
        var ssgsw_editedRange_other = e.range;
        var editedCell_nation_other = ssgsw_editedRange_other.getA1Notation();
        var range_other = editedCell_nation_other.split(":");
        var startCell_other = range_other[0];
        var endCell_other = range_other[1] || range_other[0];
        var startRow_other = parseInt(startCell_other.substring(1));
        var endRow_other = parseInt(endCell_other.substring(1));
        var startColumn_other = startCell_other.charAt(0);
        var references_data = [];
        if (range_other[1] === undefined) {
            references_data.push(ssgsw_reference_row_data(e, startColumn_other + startRow_other));
        } else {
            for (var i = startRow_other; i <= endRow_other; i++) {
                references_data.push(ssgsw_reference_row_data(e, startColumn_other + i));
            }
        }
        var all_edit_data = references_data[0];
        let message = "Formula data updated successfully!";
        if (all_edit_data.length === 0) {
            return;
        }
        ssgsw_toast2('Updating product... Please wait!.', 'Loading...');
        all_edit_data.sort((a, b) => a.index_number - b.index_number);
        ssgsw_sync_formula_data(all_edit_data, message);
    }
}

function ssgsw_reference_row_data(e, startColumn_otherTest) {
    var all_data = ssgsw_reference_row_data_same_tab(e, startColumn_otherTest);
    var parent_sheet = e.source.getSheetByName(sheetTab);
    var sheet1Range = parent_sheet.getDataRange();
    var formulas = sheet1Range.getFormulas();
    var rowsWithReferences = [];
    all_data.forEach(function(charNation) {
        for (var i = 1; i <= formulas.length; i++) {
            for (var j = 1; j <= formulas[0].length; j++) {
                var formula = formulas[i - 1][j - 1];
                if (formula && formula.indexOf(ssgsw_check_other_tab_edit(e)) != -1) {
                    if (formula && formula.indexOf(':') !== -1) {
                        var check_formula_exits = ssgsw_formula_processDynamicText(formula, charNation);
                        if (check_formula_exits) {
                            var columnIndices = [1, j];
                            
                            var rowValues = columnIndices.map(function(columnIndex) {
                                return parent_sheet.getRange(i, columnIndex).getValue();
                            });
                  

                            var keyss = ssgsw_ordered_keys();
                            var new_row = {};
                            new_row[keyss[0]] = rowValues[0];
                            new_row[keyss[j - 1]] = rowValues[1];
                            var numColumns_last = parent_sheet.getLastColumn();
                            
                            var rowValues_all = parent_sheet.getRange(i, 1, 1, numColumns_last).getValues()[0];
                             var formattedRow = {};
                              keyss.forEach((key, i) => {
                                formattedRow[key] = rowValues_all[i];
                              });
                            new_row['ssgsw_extra_data_info'] = JSON.stringify(formattedRow);
                            rowsWithReferences.push(new_row);
                        }
                    } else if (formula && formula.indexOf(charNation) != -1) {
                        var columnIndices = [1, j];
                        var rowValues = columnIndices.map(function(columnIndex) {
                            return parent_sheet.getRange(i, columnIndex).getValue();
                        });
                     
                        var keyss = ssgsw_ordered_keys();
                        var new_row = {};
                        new_row[keyss[0]] = rowValues[0];
                        new_row[keyss[j - 1]] = rowValues[1];
                        var numColumns_last = parent_sheet.getLastColumn();
                        var rowValues_all = parent_sheet.getRange(i, 1, 1, numColumns_last).getValues()[0];
                        var formattedRow = {};
                        keyss.forEach((key, i) => {
                          formattedRow[key] = rowValues_all[i];
                        });
                        new_row['ssgsw_extra_data_info'] = JSON.stringify(formattedRow);
                        rowsWithReferences.push(new_row);
                    }
                }
            }
        }
    });
    return rowsWithReferences;
}

function ssgsw_reference_row_data_same_tab(e, startColumn_otherTest) {
    var path = ssgsw_find_formula_relations(e, startColumn_otherTest);
    return path;
}

function ssgsw_find_formula_relations(e, startCell) {
    var visited = {};
    var paths = [];
    var activeSheet = e.source.getActiveSheet();
    var sheet1Range = activeSheet.getDataRange();
    var formulas = sheet1Range.getFormulas();

    function ssgsw_explore(cell, path) {
        var cellAddress = cell;
        if (visited[cellAddress]) {
            return;
        }
        visited[cellAddress] = true;
        path.push(cellAddress);
        paths.push(cellAddress);
        for (var i = 1; i <= formulas.length; i++) {
            for (var j = 1; j <= formulas[0].length; j++) {
                var formula = formulas[i - 1][j - 1];
                if (formula && formula.indexOf(':') !== -1) {
                    var check_formula_exits = ssgsw_formula_processDynamicText(formula, cellAddress);
                    if (check_formula_exits) {
                        var referencedRow = sheet1Range.getCell(i, j);
                        var referencedCellA1Notation = referencedRow.getA1Notation();
                        ssgsw_explore(referencedCellA1Notation, path);
                    }
                } else if (formula && formula.indexOf(cellAddress) !== -1) {
                    var referencedRow = sheet1Range.getCell(i, j);
                    var referencedCellA1Notation = referencedRow.getA1Notation();
                    ssgsw_explore(referencedCellA1Notation, path);
                }
            }
        }
    }
    ssgsw_explore(startCell, []);
    return paths;
}

function ssgsw_formula_processDynamicText(text, referenceCell) {
    var texts = [text];
    var cells = [];
    texts.forEach(function(text) {
        cells = cells.concat(ssgsw_formula_extractCellReferences(text));
    });
    var columns = [];
    var rows = [];
    cells.forEach(function(cell) {
        var split = ssgsw_formula_splitCell(cell);
        columns.push(split[0]);
        if (split[1]) {
            rows.push(parseInt(split[1]));
        }
    });
    var smallestColumn = ssgsw_formula_findSmallestColumn(columns);
    var largestColumn = ssgsw_formula_findLargestColumn(columns);
    var smallestRow = rows.length > 0 ? Math.min.apply(null, rows) : null;
    var largestRow = rows.length > 0 ? Math.max.apply(null, rows) : null;
    var referenceSplit = ssgsw_formula_splitCell(referenceCell);
    var referenceColumn = referenceSplit[0];
    var referenceRow = parseInt(referenceSplit[1]);
    return ssgsw_formula_compare(referenceColumn, referenceRow, smallestColumn, smallestRow, largestColumn, largestRow);
}

function ssgsw_formula_extractCellReferences(text) {
    var regex = /(?:[A-Za-z0-9]+!)?([A-Z]+[0-9]*)(?=:|$|,|\))/g;
    var matches = [];
    var match;
    while ((match = regex.exec(text)) !== null) {
        matches.push(match[1]);
    }
    return matches;
}

function ssgsw_formula_splitCell(cell) {
    var match = cell.match(/([A-Z]+)([0-9]*)/);
    return [match[1], match[2]];
}

function ssgsw_formula_findSmallestColumn(columns) {
    return columns.reduce(function(a, b) {
        return a < b ? a : b;
    });
}

function ssgsw_formula_findLargestColumn(columns) {
    return columns.reduce(function(a, b) {
        return a > b ? a : b;
    });
}

function ssgsw_formula_compare(referenceColumn, referenceRow, smallestColumn, smallestRow, largestColumn, largestRow) {
    if (smallestRow == largestRow) {
        var isUnderColumn = referenceColumn >= smallestColumn && referenceColumn <= largestColumn;
        return isUnderColumn;
    } else {
        var isUnderColumn = referenceColumn >= smallestColumn && referenceColumn <= largestColumn;
        var isUnderRow = referenceRow >= smallestRow && referenceRow <= largestRow;
        return isUnderColumn && isUnderRow;
    }
}

function ssgsw_add_menus() {
    try {
        SpreadsheetApp.getUi().createMenu("Stock Sync").addItem("⟱ Fetch from WooCommerce", "ssgsw_fetch_from_WordPress").addItem("⟰ Sync on WooCommerce", "ssgsw_sync_all").addSeparator().addItem(" Format Styles", "ssgsw_apply_styles").addItem(" About Stock Sync", "ssgsw_about_us").addToUi();
    } catch (e) {
        Logger.log('Already Setup');
    }
}

function ssgsw_apply_styles() {
    const Columns = ssgsw_column_char(ssgsw_max_column());
    const Headers = "A1:" + Columns + 1;
    const StaticColumns = ssgsw_column_index(["ID", "type", "sales", 'ssgsw_product_url']).filter((index) => index >= 0).map(ssgsw_column_char);
    Logger.log(StaticColumns);
    const StockColumn = ssgsw_column_index(["stock"]).map((index) => ssgsw_column_char(index))[0];
    const StaticColumnHeaders = StaticColumns.map((column) => column + 1);
    const StaticColumnValues = StaticColumns.map((column) => column + 2 + ":" + column);
    const StockColumnValues = StockColumn + 2 + ":" + StockColumn;
    const CenterableColumns = ssgsw_column_index(["stock", "regular_price", "sale_price", "sales", ]).filter((index) => index >= 0).map((char) => ssgsw_column_char(char) + "1:" + ssgsw_column_char(char));
    const Color = {
        primary: "#686de0",
        white: "white",
        black: "black",
        grey: "#dedede",
        success: "green",
        error: "indianred",
        info: "purple",
        warning: "orange",
    };
    const CurrentSheet = SpreadsheetApp.getActive().getSheetByName(sheetTab);
    CurrentSheet.getRange("A1:Z1").setFontWeight("normal").setBackground(Color.white).setFontColor(Color.black);
    CurrentSheet.getRange(Headers).setFontWeight("bold").setBackground(Color.primary).setFontColor(Color.white);
    CurrentSheet.autoResizeColumns(1, ssgsw_max_column());
    CurrentSheet.getRangeList(StaticColumnHeaders).setBackground(Color.error);
    CurrentSheet.getRangeList(StaticColumnValues).setBackground(Color.grey).setFontColor(Color.black);
    CurrentSheet.getRangeList(CenterableColumns).setHorizontalAlignment("center");
    let rules = [];
    rules.push(SpreadsheetApp.newConditionalFormatRule().whenTextEqualTo("In Stock").setBackground("#f7fff9").setFontColor("green").setRanges([SpreadsheetApp.getActiveSheet().getRange(StockColumnValues)]).build());
    rules.push(SpreadsheetApp.newConditionalFormatRule().whenTextEqualTo("Out of Stock").setBackground("#fff8f7").setFontColor(Color.error).setRanges([SpreadsheetApp.getActiveSheet().getRange(StockColumnValues)]).build());
    rules.push(SpreadsheetApp.newConditionalFormatRule().whenTextEqualTo("On Backorder").setBackground("#fffdf7").setFontColor("orange").setRanges([SpreadsheetApp.getActiveSheet().getRange(StockColumnValues)]).build());
    rules.push(SpreadsheetApp.newConditionalFormatRule().whenNumberGreaterThan(0).setBackground("#f7fff9").setFontColor(Color.success).setRanges([SpreadsheetApp.getActiveSheet().getRange(StockColumnValues)]).build());
    rules.push(SpreadsheetApp.newConditionalFormatRule().whenNumberLessThan(1).setBackground("#fff8f7").setFontColor(Color.error).setRanges([SpreadsheetApp.getActiveSheet().getRange(StockColumnValues)]).build());
    if (ssgsw_column_index(["sales"]) >= 0) {
        const SaleColumn = ssgsw_column_index(["sales"]).map((index) => ssgsw_column_char(index))[0];
        const SaleColumnValues = SaleColumn + 2 + ":" + SaleColumn;
        rules.push(SpreadsheetApp.newConditionalFormatRule().whenNumberLessThan(1).setFontColor(Color.error).setRanges([SpreadsheetApp.getActiveSheet().getRange(SaleColumnValues)]).build());
    }
    CurrentSheet.setConditionalFormatRules(rules);
    Logger.log("Stock Sync Initialized!");
}

function ssgsw_about_us() {
    let htmlOutput = HtmlService.createHtmlOutput(`<h3>Stock Sync with Google Sheet for WooCommerce</h3> <p>Sync your WooCommerce product stock with Google Sheets.</p> <p><a href="https://wordpress.org/plugins/stock-sync-with-google-sheet-for-woocommerce/" target="_blank">Download Free</a> version from WordPress.org</p> <p><a href="http://wppool.dev/stock-sync-for-woocommerce-with-google-sheet" target="_blank">Get Ultimate</a> version to enjoy all premium features and official updates.</p> `).setWidth(550).setHeight(200);
    SpreadsheetApp.getUi().showModalDialog(htmlOutput, "Stock Sync with Google Sheet for WooCommerce");
}

function ssgsw_api_access_block_notice() {
    let htmlOutput = HtmlService.createHtmlOutput(`<p><strong>Oopss!</strong> It looks like REST API access is blocked on your website. The REST API access is needed to connect to the Google Sheets. Please enable the REST API access. <a href="https://wppool.dev/docs/possible-errors-and-solutions/" target="_blank">Click</a> here to learn more about this error and the solutions</p> `).setWidth(550).setHeight(200);
    SpreadsheetApp.getUi().showModalDialog(htmlOutput, "Stock Sync with Google Sheet for WooCommerce");
}

function ssgsw_headers() {
    let header = SpreadsheetApp.getActive().getSheetByName(sheetTab).getRange("A1:Z1").getValues();
    header = header[0].filter((column) => column.length);
    return header;
}

function ssgsw_columns($key = null, $reversed = false) {
    let columns = {
        ID: "ID",
        Type: "type",
        Name: "name",
        Stock: "stock",
        "Product URL": "ssgsw_product_url",
        SKU: "sku",
        "Regular price": "regular_price",
        "Sale price": "sale_price",
        "Short description": "post_excerpt",
        "Long description": "post_content",
        Categories: "category",
        "No of Sales": "sales",
        Attributes: "attributes",
    };
    if ($key) {
        if (!$reversed) {
            return columns[$key];
        } else {
            let reverse = {};
            for (let key in columns) {
                reverse[columns[key]] = key;
            }
            return reverse[$key];
        }
    }
    return columns;
}

function ssgsw_available_columns() {
    let columns = ssgsw_columns();
    let headers = ssgsw_headers();
    let keys = {};
    headers.forEach((header) => {
        if (Object.keys(columns).includes(header)) {
            keys[header] = columns[header];
        } else {
            keys[header] = header;
        }
    });
    return keys;
}

function ssgsw_max_column() {
    let maxColumn = SpreadsheetApp.getActive().getSheetByName(sheetTab).getLastColumn();
    return maxColumn;
}

function ssgsw_column_char(index = 0) {
    const alphabet = "abcdefghijklmnopqrstuvwxyz".toUpperCase().split("");
    return alphabet[index - 1] || null;
}

function ssgsw_current_row() {
    let currentCell = SpreadsheetApp.getActive().getSheetByName(sheetTab).getCurrentCell().getA1Notation();
    let row = currentCell.replace(/[^0-9]/g, "");
    return row;
}

function ssgsw_current_column() {
    let currentCell = SpreadsheetApp.getActive().getSheetByName(sheetTab).getCurrentCell().getA1Notation();
    let rowNotation = currentCell.replace(/[0-9]/g, "");
    rowNotation = "abcdefghijklmnopqrstuvwxyz".toUpperCase().split("").indexOf(rowNotation);
    let column = Object.values(ssgsw_available_columns())[rowNotation];
    return column;
}

function ssgsw_column_index(columns) {
    let indexes = [];
    let available_columns = ssgsw_available_columns();
    columns.forEach((column) => {
        let index = Object.values(available_columns).indexOf(column);
        if (index >= 0) index++;
        indexes.push(index);
    });
    return indexes;
}

function ssgsw_get_all_data() {
    var values = SpreadsheetApp.getActive().getSheetByName(sheetTab).getDataRange().getValues();
    values.shift();
    return ssgsw_format2(values, 2);
}

function merge_and_parse_image_urls(get_value, formulas) {
    var mergedArray = get_value.map((row, i) =>
      row.map((cellValue, j) => {
        var formula = formulas[i][j];
        var imageUrl = ssgsw_extract_image_url_from_formula(formula);
        return imageUrl ? imageUrl : cellValue;
      })
    );
  return mergedArray;

}

function ssgsw_extract_image_url_from_formula(formula) {
    var regex = /=image\("(.*)"/i;
    var matches = formula.match(regex);
    return matches ? matches[1] : null;
}

function ssgsw_get_edited_data(e) {
    var sheet = e.source.getSheetByName(sheetTab);
    var rowStart = e.range.rowStart;
    var rowEnd = e.range.rowEnd;
    var colStart = e.range.getColumn();
    var colEnd = colStart + e.range.getNumColumns() - 1;
    ssgsw_save_temp_info('ssgsw_start_colmun', colStart);
    ssgsw_save_temp_info('ssgsw_end_colmun', colEnd);
    var get_combined_range = sheet.getRange(rowStart, 1, rowEnd - rowStart + 1, sheet.getLastColumn()); 
    var data = get_combined_range.getValues();
    if (ssgsw_check_image_exits(colStart, colEnd)) {
      var get_formula = get_combined_range.getFormulas();
      data = merge_and_parse_image_urls(data, get_formula);
    }
    return ssgsw_on_edit_format(data, rowStart, colStart, colEnd);
}

function ssgsw_check_image_exits(colStart, colEnd ) {
    colStart = colStart- 1;
    colEnd = colEnd - 1;
    var exits = false;
    const keyss = ssgsw_ordered_keys();
     keyss.forEach((key, i) => {
        if ( i >= colStart && i <= colEnd ) {
          if(key == 'Image')
            exits = true;
        }
    });
    return exits;

}
function ssgsw_on_edit_format(data, rowStart, colStart, colEnd) {
    colStart = colStart- 1;
    colEnd = colEnd - 1;
   const keyss = ssgsw_ordered_keys();
    return data.map((row, index) => {
        let formattedRow = {};
        let formattedRow_extra = {};
        formattedRow["index_number"] = rowStart + index;
        formattedRow_extra["index_number"] = rowStart + index;
        keyss.forEach((key, i) => {
          if (i == 0 || (i >= colStart && i <= colEnd) ) {
            formattedRow[key] = row[i];
            formattedRow_extra[key] = row[i];
          } else {
            formattedRow_extra[key] = row[i];
          }
        });
        formattedRow["ssgsw_extra_data_info"] = JSON.stringify(formattedRow_extra);
        return formattedRow;
    });
}


function ssgsw_format2(data, rowStart) {
    const deletabless = ["type", "sales", "category"];
    const keyss = ssgsw_ordered_keys();
    return data.map((row, index) => {
        let formattedRow = {};
        formattedRow["index_number"] = rowStart + index;
        keyss.forEach((key, i) => {
            formattedRow[key] = row[i];
        });
        deletabless.forEach((key) => {
            if (key in formattedRow) delete formattedRow[key];
        });
        return formattedRow;
    });
}

function ssgsw_ordered_keys() {
    let orderedKeys = [];
    ssgsw_headers().forEach((header) => {
        orderedKeys.push(ssgsw_available_columns()[header]);
    });
    return orderedKeys;
}

function ssgsw_sync_all() {
    let data = ssgsw_get_all_data();
    ssgsw_sync_data(data, 'Products synced successfully', false, false,'');
}

function ssgsw_toast(message = null, title = null) {
    SpreadsheetApp.getActiveSpreadsheet().toast(message, title);
}

function ssgsw_toast_for_background_process(message = null, title = null, time_count = 1) {
    SpreadsheetApp.getActiveSpreadsheet().toast(message, title, time_count);
}

function ssgsw_toast2(message = null, title = null) {
    SpreadsheetApp.getActiveSpreadsheet().toast(message, title, -1);
}

function ssgsw_progress_bar(totalUpdated, totalProducts) {
    if (totalUpdated > totalProducts) {
        totalUpdated = totalProducts;
    }
    ssgsw_toast2("Successfully updated " + totalUpdated + " out of " + totalProducts + " products! Please do not close or interfere with the sync process. This may take a moment!", 'Success');
}

function ssgsw_get_dynamic_range_data(startIndex = 0, endIndex = 0, start_colmun = 0) {
    var sheet = SpreadsheetApp.getActive().getSheetByName(sheetTab);


    if (!sheet) {
        return;
    }
    if (endIndex < startIndex) {
        return;
    }

    if( start_colmun ) {
        var end_column = parseInt(ssgsw_get_temp_information('ssgsw_end_colmun'));

        var get_combined_range = sheet.getRange(startIndex, 1, endIndex - startIndex + 1, sheet.getLastColumn()); 
        var data = get_combined_range.getValues();
        if (ssgsw_check_image_exits(start_colmun, end_column)) {
          var get_formula = get_combined_range.getFormulas();
          data = merge_and_parse_image_urls(data, get_formula);
        }
        return ssgsw_on_edit_format(data, startIndex, start_colmun, end_column);
    } else {
      var numRows = endIndex - startIndex + 1;
      var get_all_range = sheet.getRange(startIndex, 1, numRows, sheet.getLastColumn());
      var get_values = get_all_range.getValues();
      var get_formula = get_all_range.getFormulas();
      var data = merge_and_parse_image_urls(get_values, get_formula);
      return ssgsw_format2(data, startIndex);
    }

}

function ssgsw_sync_data_in_background_process() {
    var start_index = parseInt(ssgsw_get_temp_information('ssgsw_start_index'));
    var end_index = parseInt(ssgsw_get_temp_information('ssgsw_end_index'));
    var start_colmun = parseInt(ssgsw_get_temp_information('ssgsw_start_colmun'));
    var products = ssgsw_get_dynamic_range_data(start_index, end_index, start_colmun);
    if (Array.isArray(products) && products.length > 0) {
        var message = ssgsw_get_temp_information('ssgsw_save_message');
        if(start_colmun) {
          ssgsw_sync_data(products, message, false, true, '', false, true);
        } else {
          ssgsw_sync_data(products, message, false, false, '', false, true);
        }

    }
    return;
}

function ssgsw_sync_formula_data(data, message = "Products synced successfully") {
    try {
        var totalProducts = data.length;
        if (!totalProducts) {
            ssgsw_toast('Empty formula selected', "Warning!");
            return;
        }
        ssgsw_toast2("Updating " + totalProducts + " products... Please wait!", 'Loading...');
        let response = UrlFetchApp.fetch(baseURL + "/wp-json/ssgsw/v1/update", {
            method: "POST",
            payload: JSON.stringify({
                products: data,
                formula: true,
                newapp: true
            }),
            contentType: "application/json",
            muteHttpExceptions: true,
            headers: {
                SSGSWKEY: "Bearer " + accessToken,
            }
        });
        if (response.getResponseCode() == 200) {
            response = JSON.parse(response.getContentText());
            Logger.log(response);
            if (response.success) {
                ssgsw_toast(message, "Success!");
            } else {
                ssgsw_toast(response.message, "Ops error!");
                return;
            }
        } else {
            if (response.getResponseCode() == 401 || response.getResponseCode() == 403) {
                ssgsw_api_access_block_notice();
                return;
            } else {
                ssgsw_toast("Something went wrong, please try again", "Oopss!");
                return;
            }
        }
    } catch (error) {
        Logger.log('something');
        ssgsw_toast("Something went wrong, please try again", "Oopss!");
        return;
    }
    return true;
}

function ssgsw_sync_data(data, message = "Products synced successfully", non_edit = false, single_bulk = false, sync_all = '', formula = false, time_triven = false) {
    try {
        let products = data.filter((row) => {
            return row.name !== '';
        });
        var hasEmptyId = products.some(function(item) {
            return item.ID == '';
        });
        var someEmptyName = data.some(function(item) {
            return item.name == '';
        });
        if (hasEmptyId) {
            if (message != 'Product created successfully!') {
                message = 'Product create and ' + message;
            }
        }
        if (!products.length) {
            ssgsw_toast('Product name cannot be empty! If you want to create a new product', "Warning!");
            return;
        }
        var chunkSize = 1000;
        var total_update_need = 4000;
        if(single_bulk) {
          chunkSize = 5000;
          total_update_need = 10000;
        }
        let totalUpdated = 0;
        let totalProducts = products.length;
        if (!time_triven) {
            ssgsw_save_temp_info('ssgsw_total_of_products', totalProducts);
            if(!single_bulk) {
              ssgsw_save_temp_info('ssgsw_start_colmun', 0);
              ssgsw_save_temp_info('ssgsw_end_colmun', 0);
            }
        }

        if (!non_edit) {
            ssgsw_toast2("Updating " + totalProducts + " products... Please wait!", 'Loading...');
        }
        for (let i = 0; i < totalProducts; i += chunkSize) {
            let productChunk = products.slice(i, i + chunkSize);
            const arrayLength = productChunk.length;
            const firstIndex = productChunk[0]['index_number'];
            const lastIndex = productChunk[arrayLength - 1]['index_number'];
            const newapp = true;
            if (!time_triven) {
                var start_time = new Date().getTime();
            }
            let response = UrlFetchApp.fetch(baseURL + "/wp-json/ssgsw/v1/update", {
                method: "POST",
                payload: JSON.stringify({
                    products: productChunk,
                    message,
                    sync_all,
                    arrayLength,
                    firstIndex,
                    lastIndex,
                    formula,
                    newapp
                }),
                contentType: "application/json",
                muteHttpExceptions: true,
                headers: {
                    SSGSWKEY: "Bearer " + accessToken,
                }
            });
            if (response.getResponseCode() == 200) {
                response = JSON.parse(response.getContentText());
                Logger.log(response);
                if (response.success) {
                    totalUpdated += arrayLength;
                    ssgsw_progress_bar(totalUpdated, totalProducts);
                    if (totalUpdated > total_update_need - 1 && total_update_need < totalProducts) {
                        var new_data = remove_first_data_from_array(products, total_update_need);
                        var new_data_length = new_data.length;
                        if (new_data_length) {
                            ssgsw_create_trigger();
                            var new_start_index = new_data[0]['index_number'];
                            var new_end_index = new_data[new_data_length - 1]['index_number'];
                            ssgsw_save_temp_info('ssgsw_start_index', new_start_index);
                            ssgsw_save_temp_info('ssgsw_end_index', new_end_index);
                            ssgsw_save_temp_info('ssgsw_save_message', message);
                            ssgsw_save_temp_info('ssgsw_non_edit', non_edit);
                            ssgsw_save_temp_info('ssgsw_sync_all', sync_all);
                            ssgsw_save_temp_info('ssgsw_formula', formula);
                            if (!time_triven) {
                                var end_time = new Date().getTime();
                                var execution_mili_second = end_time - start_time;
                                var excution_time = execution_mili_second / 1000;
                                var popup_stay_time = ssgsw_calculate_execution_time(totalProducts, excution_time, total_update_need);
                                ssgsw_toast_for_background_process("We're processing your request. An email will be sent to the admin when complete.", '!Notice', popup_stay_time);
                            }
                        }
                        return;
                    }
                    if (someEmptyName) {
                        ssgsw_toast('Product name cannot be empty! If you want to create a new product', "Warning!");
                        return;
                    }
                } else {
                    ssgsw_toast(response.message, "Ops error!");
                    return;
                }
            } else {
                if (response.getResponseCode() == 401 || response.getResponseCode() == 403) {
                    ssgsw_api_access_block_notice();
                    return;
                } else {
                    ssgsw_toast("Something went wrong, please try again", "Oopss!");
                    return;
                }
            }
        }
    } catch (error) {
        Logger.log('something');
        ssgsw_toast("Something went wrong, please try again", "Oopss!");
        return;
    }
    ssgsw_toast(message, "Success!");
    if (time_triven) {
        ssgsw_product_update_email();
    }
    return true;
}

function ssgsw_product_update_email() {
    var totalProducts = ssgsw_get_temp_information('ssgsw_total_of_products'); 
    var subject = "FlexStock Notice: Your Product Data Update/Sync is Complete";
    var body = `
        <p>Hi,</p>
        <p>Your product data update and sync process has been successfully completed!</p>
        <p><strong>Summary of the Process:</strong></p>
        <ul>
            <li><strong>Product Processed:</strong> ${totalProducts}</li>
        </ul>
        <p>You can review the updated data in WooCommerce or Google Sheets.</p>
        <p>We appreciate your patience while the batch processing was in progress.</p>
        <p>Thank you for using FlexStock!</p>
        <p>Best regards,<br>FlexStock Team</p>
    `;
    var email = Session.getActiveUser().getEmail();
    
    MailApp.sendEmail({
        to: email,
        subject: subject,
        htmlBody: body
    });

    Logger.log("Email sent to: " + email + " with total products: " + totalProducts);
}

function remove_first_data_from_array(data, total_update_need) {
    return data.slice(total_update_need);
}

function ssgsw_calculate_execution_time(totalProducts, excution_time, total_update_need) {
    var totalBatches_time = Math.ceil(totalProducts / total_update_need);
    var total_trigger = Math.ceil(totalProducts / total_update_need);
    var total_trigger_time = total_trigger * 70;
    var total_batch_time = totalBatches_time * excution_time;
    return total_batch_time + total_trigger_time;
}

function ssgsw_delete_trigger_by_id(triggerId) {
    var triggers = ScriptApp.getProjectTriggers();
    if (triggers.length === 0) {
        return;
    }
    for (var i = 0; i < triggers.length; i++) {
        var trigger = triggers[i];
        if (trigger.getUniqueId() === triggerId) {
            ScriptApp.deleteTrigger(trigger);
            return;
        }
    }
}

function ssgsw_create_trigger() {
    var get_trigger_id = ssgsw_get_temp_information('ssgsw_trigger_id');
    if (get_trigger_id) {
        ssgsw_delete_trigger_by_id(get_trigger_id);
    }
    var trigger = ScriptApp.newTrigger('ssgsw_sync_data_in_background_process').timeBased().after(60000).create();
    var triggerId = trigger.getUniqueId();
    Logger.log(triggerId);
    ssgsw_save_temp_info('ssgsw_trigger_id', triggerId);
}

function ssgsw_fetch_from_WordPress(message) {
    try {
        let response = UrlFetchApp.fetch(baseURL + "/wp-json/ssgsw/v1/action/?action=sync", {
            method: "POST",
            contentType: "application/json",
            muteHttpExceptions: true,
            headers: {
                SSGSWKEY: "Bearer " + accessToken,
            },
            payload: JSON.stringify({
                ssgsw_items: true,
            }),
        });
        if (response.getResponseCode() == 200) {
            response = JSON.parse(response.getContentText());
            if (response.success) {
                var batchSize = 700;
                const totalProducts = response.message;
                let offset = 0;
                var error_count = 0;
                let index_number = 1;
                var success_count = 0;
                while (offset < totalProducts) {
                    try {
                        let new_response = UrlFetchApp.fetch(baseURL + "/wp-json/ssgsw/v1/action/?action=sync", {
                            method: "POST",
                            contentType: "application/json",
                            muteHttpExceptions: true,
                            headers: {
                                SSGSWKEY: "Bearer " + accessToken,
                            },
                            payload: JSON.stringify({
                                ssgsw_items: false,
                                ssgsw_offset: offset,
                                ssgsw_batch_size: batchSize,
                                ssgsw_index: index_number
                            }),
                        });
                        if (new_response.getResponseCode() == 200) {
                            new_response = JSON.parse(new_response.getContentText());
                            if (new_response.success) {
                                index_number = index_number + new_response.message;
                                var uploadedProducts = offset + batchSize;
                                success_count++;
                                ssgsw_progress_bar(uploadedProducts, totalProducts);
                                offset += batchSize;
                            } else {
                                error_count++;
                            }
                        }
                        if (error_count > 5) {
                            offset += batchSize;
                        }
                    } catch (error) {
                        error_count++;
                    }
                }
                if (success_count) {
                    ssgsw_toast("Products fetched from WordPress", "Success!");
                }
            } else if (response.message) {
                ssgsw_toast(response.message, "Ops!");
            }
        } else {
            if (response.getResponseCode() == 401 || response.getResponseCode() == 403) {
                ssgsw_api_access_block_notice();
            } else {
                ssgsw_toast("Something went wrong, please try again", "Oopss!");
            }
        }
    } catch (error) {
        ssgsw_toast("Something went wrong, please try again", "Oopss!");
    }
}