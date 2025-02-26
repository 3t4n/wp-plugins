////////////////Data from the Administration menu of the Widget.  WP Admin > Appearance > Widgets///////////////
// your ID: userid
userid =  php_data.userid;
//The URL of the auction program: main_url
main_url =  php_data.main_url;

///////////////////////////////////////////
jQuery(document).ready(function(){



url = main_url +'/test?';
auctionArr = new Array(); 

pointer =0;

jQuery.getJSON(url,'callback=?&userid='+userid ,function(res){


//test, list all products of the user.
/*
for (var i = 0; i < res.length; i++) { 
console.log(res[i].id+','+res[i].title+','+res[i].image1+','+res[i].opening_price+','+res[i].currency+','+res[i].name+','+res[i].code);
}
*/
auctionArr = res;

jQuery("#service_for_multivendor_auction_image").attr('src',main_url+'/uploads/products/thumbs/small/'+auctionArr[0].image1 );
jQuery("#service_for_multivendor_auction_info").text(auctionArr[ 0].opening_price + ' ' +auctionArr[ 0].currency );
jQuery("#service_for_multivendor_auction_name").text(auctionArr[ 0].name );
jQuery("#service_for_multivendor_auction_info").attr("href", main_url+ "/product/"+auctionArr[0].id );
jQuery("#service_for_multivendor_auction_image_link").attr("href", main_url+ "/product/"+auctionArr[0].id );



});

jQuery( "#service_for_multivendor_auction_btn_left" ).click(function() {
//console.log(pointer+ ', '+auctionArr.length);
if( pointer>0){
   pointer--;
jQuery("#service_for_multivendor_auction_image").attr('src',main_url+'/uploads/products/thumbs/small/'+auctionArr[ pointer].image1 );
jQuery("#service_for_multivendor_auction_info").text(auctionArr[pointer].opening_price + ' ' +auctionArr[pointer].currency );
jQuery("#service_for_multivendor_auction_name").text(auctionArr[pointer].name );
jQuery("#service_for_multivendor_auction_info").attr("href", main_url+ "/product/"+auctionArr[pointer].id );
jQuery("#service_for_multivendor_auction_image_link").attr("href", main_url+ "/product/"+auctionArr[pointer].id );

}
});

jQuery( "#service_for_multivendor_auction_btn_right" ).click(function() {
//console.log(pointer+ ', '+auctionArr.length);
if(auctionArr.length > pointer){
jQuery("#service_for_multivendor_auction_image").attr('src',main_url+'/uploads/products/thumbs/small/'+auctionArr[ pointer].image1 );
jQuery("#service_for_multivendor_auction_info").text(auctionArr[pointer].opening_price + ' ' +auctionArr[pointer].currency );
jQuery("#service_for_multivendor_auction_name").text(auctionArr[pointer].name );
jQuery("#service_for_multivendor_auction_info").attr("href", main_url+ "/product/"+auctionArr[pointer].id );
jQuery("#service_for_multivendor_auction_image_link").attr("href", main_url+ "/product/"+auctionArr[pointer].id );
pointer++;
}

});



});
