<?php // Exit if accessed directly.
if(! defined('ABSPATH')){exit;}

echo"
<script>
function generate5() {

  var doc = new jsPDF('l', 'pt');

  var res = doc.autoTableHtmlToJson(document.getElementById('printReport5'));

  var header = function(data) {
    doc.setFontSize(5);
    doc.setTextColor(9);
    doc.setFontStyle('normal');
  };

  doc.autoTable(res.columns, res.data);

  doc.save('billing-list.pdf');
}
</script>
<input type='button' class='btn_gray5' style='display:inline-block;box-sizing:border-box;margin:5px;text-align:center;text-decoration:none;cursor:pointer;background-color:transparent;-webkit-transition:all .25s ease;-moz-transition:all .25s ease;-ms-transition:all .25s ease;-o-transition:all .25s ease;transition:all .25s ease;font-size:10px;font-size:0.9rem;line-height:15px;line-height:1.5rem;min-width:50px;min-width:5rem;padding:5px 5px;border-color:#666;border-width:1px;border-style:solid;border-radius:2.5px; border-color:#a794a7;background-color:#a794a7;color:#ffffff;' onclick='javascript:generate5();' value='PDF'>";
?>