
function exportTableToExcel(tableID, filename = ''){

    var downloadLink;
    var dataType = 'application/vnd.ms-excel';

    var tableSelect = jQuery(tableID); 
    var sList='';
    var isAnyChecked = false;
    jQuery('.ctc_checked').each(function () {
        if(this.checked){
            isAnyChecked = true;
            return false;        
        }         
    });
    if(isAnyChecked){
        jQuery('.ctc_checked').each(function () {
            if(this.checked){
                sList +='<tr>'+jQuery(this).parent('th').parent('tr').html()+'</tr>';            
            }         
        });
        // var checked_value = '<tr><td class="name column-name has-row-actions column-primary" data-colname="Full Name">parth<button type="button" class="toggle-row"></button></td><td class="customer_date column-customer_date" data-colname="Date">2022-11-02 00:00:00</td><td class="customer_email column-customer_email" data-colname="Email">ram@gmail.com</td><td class="company column-company" data-colname="Company Name">abc</td><td class="is_subscribe column-is_subscribe" data-colname="Subscribe ?">Yes</td></tr>';
        // var ccvalue =checked_value.replace(/ /g, '%20');
        var tableHTML ='<table><thead><tr> <th></th><th><a href="http://localhost/divi_theme/wp-admin/admin.php?page=custom-table-csv-ctc&amp;orderby=name&amp;order=asc"><span>Full Name</span><span class="sorting-indicator"></span></a></th><th><a href="http://localhost/divi_theme/wp-admin/admin.php?page=custom-table-csv-ctc&amp;orderby=customer_date&amp;order=asc"><span>Date</span><span class="sorting-indicator"></span></a></th><th scope="col" id="customer_email" class="manage-column column-customer_email">Email</th><th scope="col" id="company" class="manage-column column-company">Company Name</th><th scope="col" id="is_subscribe" class="manage-column column-is_subscribe">Subscribe ?</th></tr></thead><tbody>'+sList+'</tbody></table>';
    }else{
        var tableHTML = tableSelect[0].outerHTML.replace(/ /g, '%20');
    }
    
     

    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}