jQuery(document).ready(function($){

$("#akmname").focus(function(){
if ($(this).val()=="Name" || $(this).val()=="Name is required!")
{
$(this).val("");
}
});

$("#akmemail").focus(function(){
if ($(this).val()=="Email" || $(this).val()=="Email is required!" || $(this).val()=="Invalid Email!")
{
$(this).val("");
}
});

$("#akmsg").focus(function(){
if ($(this).val()=="Message" || $(this).val()=="Your feedback is important to us!")
{
$(this).val("");
}
});

$("#akmname").blur(function(){
if ($(this).val()=="")
{
$(this).val("Name is required!");
$(this).css({"background":"#FFE2E2"});
$("#akmsend").prop('disabled', true);
}
else
{
var name = $("#akmname").val();
var email = $("#akmemail").val();
var msg = $("#akmsg").val();

$(this).css({"background":"#E5FFE2"});
if(name !="Name is required!" && email !="Email is required!" && msg !="Your feedback is important to us!")
{
$("#akmsend").prop('disabled', false);
}
}
});

$("#akmemail").blur(function(){
if ($(this).val()=="")
{
$(this).val("Email is required!");
$(this).css({"background":"#FFE2E2"});
$("#akmsend").prop('disabled', true);
}

else
{
var sEmail = $('#akmemail').val();
if (validateEmail(sEmail)) {
var name = $("#akmname").val();
var email = $("#akmemail").val();
var msg = $("#akmsg").val();
$(this).css({"background":"#E5FFE2"});
if(name !="Name is required!" && email !="Email is required!" && msg !="Your feedback is important to us!")
{
$("#akmsend").prop('disabled', false);
}
}
else {
$("#akmemail").val("Invalid Email!");
$("#akmemail").css({"background":"#FFE2E2"});
$("#akmsend").prop('disabled', true);
}
}
});


$("#akmsg").blur(function(){
if ($(this).val()=="")
{
$(this).val("Your feedback is important to us!");
$(this).css({"background":"#FFE2E2"});
$("#akmsend").prop('disabled', true);
}
else
{
var name = $("#akmname").val();
var email = $("#akmemail").val();
var msg = $("#akmsg").val();
$(this).css({"background":"#E5FFE2"});
if(name !="Name is required!" && email !="Email is required!" && msg !="Your feedback is important to us!")
{
$("#akmsend").prop('disabled', false);
}
}
});


$("#akmsend").click(function(e){
var name = $("#akmname").val();
var email = $("#akmemail").val();
var msg = $("#akmsg").val();
if(name =="Name" || email =="Email" || msg =="Message")
{
$("#akmsend").prop('disabled', true);
$("#akmname, #akmemail, #akmsg").css({"background":"#FFE2E2"});
return false;
}
});
});

function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}