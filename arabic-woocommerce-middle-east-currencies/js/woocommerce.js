/**
 * t3rep.com scripts Arabic v 0.4.5
 * @author t3rep.com
 * @url https://t3rep.com
 *
 * custom script by T3rep.com

 */
window.onload = function() {var lang = document.documentElement.lang
if (lang == "ar"){
function walkText(node) {
  if (node.nodeType == 3) {
    node.data = node.data.replace('item(s)', " منتج ");
    node.data = node.data.replace('View Cart', "مشاهدة السلة");
    node.data = node.data.replace('Subtotal:', "الاجمالي:");
    node.data = node.data.replace('Check Out', "انهاء الطلب والدفع");
    node.data = node.data.replace(' in your cart', " في سلة التسوق");
    node.data = node.data.replace('There are ', " يوجد ");
    node.data = node.data.replace('Add to wishlist', "اضف للرغبات");
    node.data = node.data.replace('Add to compare', "اضف للمقارنة");
    node.data = node.data.replace('Quickview', "معاينة سريعة");
    node.data = node.data.replace('Update Cart', "تحديث السلة");
    node.data = node.data.replace('Order Number', "رقم الطلب");
    node.data = node.data.replace('Payment Method', "طريقة الدفع");
    node.data = node.data.replace('Customer Details', "تفاصيل العميل");
    node.data = node.data.replace('Billing Address', "عنوان الفاتورة");
    node.data = node.data.replace('Telephone:', "الهاتف:");
    node.data = node.data.replace('Order Details', "تفاصيل الطلب");
    node.data = node.data.replace('Continue Shopping', "الاستمرار بالتسوق");
    node.data = node.data.replace('Cart Totals', "الاجمالى");
    node.data = node.data.replace('Proceed to Checkout', "الانتقال الى الدفع");
    node.data = node.data.replace('Billing Details', "تفاصيل الفاتورة");
    node.data = node.data.replace('Additional Information', "معلومات إضافية");
  }
  if (node.nodeType == 1 && node.nodeName != "SCRIPT") {
    for (var i = 0; i < node.childNodes.length; i++) {
      walkText(node.childNodes[i]);
    }
  }
}
walkText(document.body);
}
}