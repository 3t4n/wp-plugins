<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<link href="css/jquery-ui-1.8.custom.css" rel="stylesheet" type="text/css" />	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="http://bazaagentov.ru/highslide/highslide.css" rel="stylesheet" type="text/css" /> 
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.custom.min.js"></script>
	<script type="text/javascript" src="http://bazaagentov.ru/highslide/highslide-full.min.js"></script> 
	<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAALgNkeL1_8gM4SolTlFf9yBQzwAwYZeI_myG87vrVMcIB2N_t3xRbj9MMswJZn8PH-BOQKKMI-hrVDA" type="text/javascript"></script>
    <script type="text/javascript">

    var map = null;
    var geocoder = null;

    function initialize() {
	$("#map_canvas").css({height:(document.body.parentNode.clientHeight-25)+'px', width:(document.body.parentNode.clientWidth-690)+'px'});
	$("#main_search").css({height:(document.body.parentNode.clientHeight-70)+'px'});
	$("#search_row_data").css({height:(document.body.parentNode.clientHeight-75)+'px'});

      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(59.93988, 30.316772), 14);
	map.setUIToDefault();
        geocoder = new GClientGeocoder();
      }
	

    }

	function resize(){
		$("#map_canvas").css({height:(document.body.parentNode.clientHeight-25)+'px', width:(document.body.parentNode.clientWidth-700)+'px'});
		$("#main_search").css({height:(document.body.parentNode.clientHeight-70)+'px'});
		$("#search_row_data").css({height:(document.body.parentNode.clientHeight-75)+'px'});
		map.checkResize();
	}

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 14);
              var marker = new GMarker(point);
              map.addOverlay(marker);
            //  marker.openInfoWindowHtml(address);
            }
          }
        );
      }
    }

	hs.graphicsDir = 'http://bazaagentov.ru/highslide/graphics/';
	hs.outlineType = 'rounded-white';
	hs.wrapperClassName = 'draggable-header';
	hs.fadeInOut = true;
	var hs_p = { objectType: 'iframe',  headingText: 'Заявка на просмотр объекта', width:350, height:440 };
	function chref(mhref,id,agent){
	 
		mhref.href = 'http://bazaagentov.ru/api/index.php?c=request&id='+id+'&agent=105&form=full';
		return false;
	}
    </script>


<script type="text/javascript">
var base_url = "http://baza-sdam.ru/api/";

var metro_base = {
2:   {line:'1', name:'Автово'},
3:   {line:'1', name:'Академическая'},
4:   {line:'1', name:'Балтийская'},
5:   {line:'3', name:'Василеостровская'}, 
6:   {line:'1', name:'Владимирская'},
21:  {line:'5', name:'Волковская'},
7:   {line:'1', name:'Выборгская'},
8:   {line:'2', name:'Горьковская'},
9:   {line:'3', name:'Гостиный Двор'},
10:  {line:'1', name:'Гражданский пр.'},
11:  {line:'1', name:'Девяткино'},
12:  {line:'4', name:'Достоевская'},
13:  {line:'3', name:'Елизаровская'},
14:  {line:'2', name:'Звездная'},
27:  {line:'5', name:'Звенигородская'},
15:  {line:'1', name:'Кировский з-д'},
16:  {line:'5', name:'Комендантск.пр.'},
17:  {line:'5', name:'Крестовск.остров'},
18:  {line:'2', name:'Купчино'},
19:  {line:'4', name:'Ладожская'},
20:  {line:'1', name:'Ленинский пр.'},
22:  {line:'1', name:'Лесная'},
23:  {line:'4', name:'Лиговский пр.'},
24:  {line:'3', name:'Ломоносовская'},
229: {line:'3', name:'Маяковская'},
25:  {line:'2', name:'Московск.ворота'},
26:  {line:'2', name:'Московская'},
28:  {line:'1', name:'Нарвская'},
29:  {line:'2', name:'Невский пр.'},
31:  {line:'4', name:'Новочеркасская'},
32:  {line:'3', name:'Обухово'},
33:  {line:'2', name:'Озерки '},
34:  {line:'2', name:'Парк Победы'},
35:  {line:'2', name:'Парнас'},
36:  {line:'2', name:'Петроградская'},
37:  {line:'2', name:'Пионерская'},
38:  {line:'3', name:'Пл.Ал.Невск.'},
40:  {line:'1', name:'Пл.Восстания'},
42:  {line:'1', name:'Пл.Ленина'},
44:  {line:'1', name:'Пл.Мужества'},
45:  {line:'1', name:'Политехническая'},
46:  {line:'4', name:'Пр.Большевиков'},
47:  {line:'1', name:'Пр.Ветеранов'},
49:  {line:'2', name:'Пр.Просвещения'},
50:  {line:'3', name:'Приморская'},
51:  {line:'3', name:'Пролетарская'},
52:  {line:'1', name:'Пушкинская'},
53:  {line:'3', name:'Рыбацкое'},
54:  {line:'5', name:'Садовая'},
55:  {line:'2', name:'Сенная пл.'},
56:  {line:'5', name:'Спортивная'},
57:  {line:'5', name:'Старая Деревня'},
58:  {line:'2', name:'Технологич.ин.'},
60:  {line:'2', name:'Удельная'},
61:  {line:'4', name:'Ул.Дыбенко'},
62:  {line:'2', name:'Фрунзенская'},
63:  {line:'2', name:'Черная речка'},
64:  {line:'1', name:'Чернышевская'},
65:  {line:'5', name:'Чкаловская'},
66:  {line:'2', name:'Электросила'}
}

			$(function(){

			<?
				@$m = $_REQUEST['metro'];
				if(is_array($m)){
					foreach($m as $v){
						echo "$('#m".intval($v)."').attr('checked', true);";
					}
				?>
			var data = $('#metro_form').serializeArray();
			var tpl = '';
			$.each(data, function(i,item){
				tpl = tpl + '<div class="clearfix cleft" style="width:100%"><div class="m'+metro_base[item.value].line+'"></div><span class="filter_location">'+metro_base[item.value].name+'</span><input type="hidden" value="'+item.value+'" name="lm[]" ><div class="filter_right" style="display: block;">[<a href="#" onclick="$(\'#m'+item.value+'\').attr(\'checked\',false);$(this).parent().parent().remove();go()">х</a>]</div></div>';
			});
			$('#location_filters').html(tpl);
				<?	



				}

				?>	

				$("#metro_dialog").dialog({width: 330,autoOpen: false, 
					buttons: { 
						"Отмена": function() {  $(this).dialog("close"); },
						"Выбрать": function() {
							var data = $('#metro_form').serializeArray();
							var tpl = '';
							$.each(data, function(i,item){
								tpl = tpl + '<div class="clearfix cleft" style="width:100%"><div class="m'+metro_base[item.value].line+'"></div><span class="filter_location">'+metro_base[item.value].name+'</span><input type="hidden" value="'+item.value+'" name="lm[]" ><div class="filter_right" style="display: block;">[<a href="#" onclick="$(\'#m'+item.value+'\').attr(\'checked\',false);$(this).parent().parent().remove();go()">х</a>]</div></div>';
							});
							$('#location_filters').html(tpl);
							go();
							$(this).dialog("close"); 
						}
					}
				});


				go();
			});


function metro_show(){
	$('#metro_dialog').dialog('open');
}


function go(){
	 $.ajax({
	   beforeSend: function(){
		$('#ajax_status').show();
	   },
	   complete: function(){
		$('#ajax_status').hide();
	   }
	 });
	$.getJSON(base_url+"index.php?c=api&m=jsonp2&"+$('#filters').serialize()+"&jsoncallback=?", function(data){
	  $('#search_row_data').html(data.data);
	  page.set(data.page_count);
	});
}




function full_info(id){
	$("#tabs"+id).toggle();
	$("#buton_row_"+id).toggle();
	$("#butoff_row_"+id).toggle();
}

var page = {
	now:1,
	max:1,
	next:function(){ 
		if(this.now<this.max){
			this.now++;
			$("#page_now").html(this.now);
			$("#page_input").val(this.now);
			$.ajax({
			   beforeSend: function(){
				$('#ajax_status').show();
			   },
			   complete: function(){
				$('#ajax_status').hide();
			   }
			});
			$.getJSON(base_url+"index.php?c=api&m=jsonp2&pmax="+this.max+"&"+$('#filters').serialize()+"&jsoncallback=?", function(data){
				$('#search_row_data').html(data.data);
			});
		}
	},
	prev:function(){ 
		if(this.now>1){
			this.now--;
			$("#page_now").html(this.now);
			$("#page_input").val(this.now);
			$.ajax({
			   beforeSend: function(){

				$('#ajax_status').show();
			   },
			   complete: function(){
				$('#ajax_status').hide();
			   }
			 });
			$.getJSON(base_url+"index.php?c=api&m=jsonp2&pmax="+this.max+"&"+$('#filters').serialize()+"&jsoncallback=?", function(data){
			  $('#search_row_data').html(data.data);
			  
			});

		}
	},
	set:function(count){
		this.now = 1;
		this.max = count;
		$("#page_max").html(count);
	}
};

function location_clear(){
	$('#location_filters').empty();
	$('.FF0000').attr('checked',false);
	$('.0000FF').attr('checked',false);
	$('.00FF00').attr('checked',false);
	$('.FFFF00').attr('checked',false);
	$('.FF00FF').attr('checked',false);
	$('#checkFF0000').attr('checked',false);
	$('#check0000FF').attr('checked',false);
	$('#check00FF00').attr('checked',false);
	$('#checkFFFF00').attr('checked',false);
	$('#checkFF00FF').attr('checked',false);

	go();
}


  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15766496-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<body onload="initialize()" onunload="GUnload()" onresize="resize()">

<div id="left_content" class="left_content" >
  <form id="filters">
	<input type="hidden" value="1" name="page" id="page_input" >
	<input type="hidden" name="order_by" id="order_by" >
        <div class="clearfix" id="filters_header">
          <p>
           Поиск
          </p>
        </div>
     
        <div id="filters_body">
		<div class="clearfix" id="filter_content">
			<label for="filter_type" class="filter_title">Объект</label>
            
            <select class="prop_type_select cleft" id="filter_type" onchange="go()" name="type">
		<option <? if(@$_REQUEST['type']==1){ echo 'selected="selected"';}?> value="1">Комната</option>
		<option <? if(@$_REQUEST['type']==0){ echo 'selected="selected"';}?> value="0">Квартира</option>
            </select>
            
	 <div class="clearfix ">
              <label for="" class="filter_title fleft">Колличество комнат</label>
        </div>
	<div class="cleft">
            	<label  for="lt_0" id="lt_0_label">
		<input type="checkbox" onclick="go()" value="1" name="room[]" class="f_checkbox" id="room_1">1</label>
		<label  for="lt_1" id="lt_1_label">
		<input type="checkbox" onclick="go()" value="2" name="room[]" class="f_checkbox" id="room_2">2</label>
		<label for="lt_2" id="lt_2_label">
		<input type="checkbox" onclick="go()" value="3" name="room[]" class="f_checkbox" id="room_3">3</label>
		<label  for="lt_2" id="lt_3_label">
		<input type="checkbox" onclick="go()" value="4" name="room[]" class="f_checkbox" id="room_4">4+</label>
	</div>
        	<label for="" class="filter_title">Метро</label>
		<div class="filter_right " style="display: block;margin-top:7px;">[<a href="#" onclick="location_clear()">убр. все</a>]   </div> 
	         
	          <div id="location_filters" class="location_filters">

        	  </div>
              	<a onclick="metro_show();" id="more_location_options_link" class="sel_metro cleft ajax_lnk" href="#" rel="nofollow">Выбрать станции</a>
          <div class="filter cleft">
            <label for="" class="filter_title">Стоимость</label>
            <div id="filter_price_section_content" class="cleft">
            <table border="0" width="100%" cellspacing="0" cellpadding="0" >
            <tbody><tr>
              <td>
                <select class="price_select" id="filter_price_min" name="price_min" onchange="go()">
                  <option value="0">От</option>
                  <option value="8000">8 000руб.</option>
                  <option value="9000">9 000руб.</option>
                  <option value="10000">10 000руб.</option>
                  <option value="11000">11 000руб.</option>
                  <option value="15000">15 000руб.</option>
                  <option value="16000">16 000руб.</option>
                  <option value="17000">17 000руб.</option>
                  <option value="18000">18 000руб.</option>
                  <option value="19000">19 000руб.</option>
                  <option value="20000">20 000руб.</option>
                  <option value="21000">21 000руб.</option>
                  <option value="22000">22 000руб.</option>
                  <option value="23000">23 000руб.</option>
                  <option value="24000">24 000руб.</option>
                  <option value="25000">25 000руб.</option>
                  <option value="30000">30 000руб.</option>
                  <option value="35000">35 000руб.</option>
                </select>
              </td>
              <td>
                <select class="price_select" id="filter_price_max" name="price_max" onchange="go()">
                  <option value="0">До</option>
                  <option value="9000" <? if(@$_REQUEST['price_max']==9000){ echo 'selected="selected"';}?>>9 000руб.</option>
                  <option value="10000" <? if(@$_REQUEST['price_max']==10000){ echo 'selected="selected"';}?>>10 000руб.</option>
                  <option value="11000" <? if(@$_REQUEST['price_max']==11000){ echo 'selected="selected"';}?>>11 000руб.</option>
                  <option value="15000" <? if(@$_REQUEST['price_max']==15000){ echo 'selected="selected"';}?>>15 000руб.</option>
                  <option value="16000" <? if(@$_REQUEST['price_max']==16000){ echo 'selected="selected"';}?>>16 000руб.</option>
                  <option value="17000" <? if(@$_REQUEST['price_max']==17000){ echo 'selected="selected"';}?>>17 000руб.</option>
                  <option value="18000" <? if(@$_REQUEST['price_max']==18000){ echo 'selected="selected"';}?>>18 000руб.</option>
                  <option value="19000" <? if(@$_REQUEST['price_max']==19000){ echo 'selected="selected"';}?>>19 000руб.</option>
                  <option value="20000" <? if(@$_REQUEST['price_max']==20000){ echo 'selected="selected"';}?>>20 000руб.</option>
                  <option value="21000" <? if(@$_REQUEST['price_max']==21000){ echo 'selected="selected"';}?>>21 000руб.</option>
                  <option value="22000" <? if(@$_REQUEST['price_max']==22000){ echo 'selected="selected"';}?>>22 000руб.</option>
                  <option value="23000" <? if(@$_REQUEST['price_max']==23000){ echo 'selected="selected"';}?>>23 000руб.</option>
                  <option value="24000" <? if(@$_REQUEST['price_max']==24000){ echo 'selected="selected"';}?>>24 000руб.</option>
                  <option value="25000" <? if(@$_REQUEST['price_max']==25000){ echo 'selected="selected"';}?>>25 000руб.</option>
                  <option value="30000" <? if(@$_REQUEST['price_max']==30000){ echo 'selected="selected"';}?>>30 000руб.</option>
                  <option value="35000" <? if(@$_REQUEST['price_max']==35000){ echo 'selected="selected"';}?>>35 000руб.</option>
               </select>
              </td>
            </tr>
          </tbody></table>
            </div>
          
          <label for="" class="filter_title">Условия</label><!-- <a rel="nofollow" onclick="return false;" href="" style="margin-top:7px;" class="imgsheet action info_white">Инфо</a>!-->
            <div class="cleft">
            <label class="block" for="telephone" id="telephone_label">
            <input type="checkbox" onclick="go()" name="telephone" id="telephone" class="f_checkbox">Телефон</label>
            <label class="block" for="washingmachine" id="washingmachine_label">
            <input type="checkbox" onclick="go()" name="washingmachine" id="washingmachine" class="f_checkbox">Стиральная машина</label>
            <label class="block" for="holod" id="holod_label">
            <input type="checkbox" onclick="go()" name="holod" id="holod" class="f_checkbox">Холодильник</label>
            <label class="block" for="mebel" id="mebel_label">
            <input type="checkbox" name="mebel" onclick="go()" id="mebel" class="f_checkbox">Мебель</label>

          	</div>
        </div>


	</div>

</div>
<p>Тех. поддержка: +7 (812) 642-71-74</p>
</div>

</form>


<div class="main_search" id="main_search">

<div style="border-bottom: 1px solid rgb(204, 204, 204); margin: 0px 5px 10px; width: 100%; float: left;">

			<div style="margin: 6px 0px;" class="srp_result_rows_header fleft">
		                <label class="bold" for="order_by1">Сорт.: &nbsp;</label>
		                <select onchange="$('#order_by').val($(this).val());go()" name="order_by1" id="order_by1" style="width:100px">
					<option value="date"> по дате</option>	                 
					<option value="price_high_low">Цена по убыванию</option>
					<option value="price_low_high">Цена по возрастанию</option>
		                </select>
			</div>
            		<div id="ajax_status" style="padding: 12px 5px 5px 30px; float: left;">загрузка...<!--<img border="0" alt="Ajax load" src="/images/ajax-loader.gif">!--></div>
			
			<div class="pages_count" id="srp_result_for_sale_paging">   
				<span style="float:left" id="for_sale_top_paging">     Стр. <strong><span id="page_now">1</span></strong> из <strong><span id="page_max">?</span></strong>   </span>  
				 <div class="btn_previous">   <a onclick="page.prev()" class="imgsheet prev_button_disabled pg_btn_disabled" id="previous_btn0" href="#">    <span class="gone">&lt; Назад&nbsp;</span>   </a> </div>   
				 <div class="btn_next">   <a onclick="page.next()" class="imgsheet next_button pg_btn" id="next_btn0" href="#">   <span class="gone">&nbsp;Далее &gt;&nbsp;</span>   </a>  </div>  
			</div>
</div>

<div style="overflow: auto; width: 475px; height: 650px; float: left; clear: left;" id="search_row_data">  

<h1>Загрузка...</h1>

</div>
	       
</div>

<div style="float:left;width: 500px; height: 300px" id="map_canvas">

</div>

 <div id="metro_dialog" title="Выбор метро" style="display:none">
<form name="metro_form" id="metro_form"><div style="clear:both;width:300px;height:200px;overflow:auto;border:1px solid #cccccc;" id="metro_content">
<div><input name="metro[]" class="FF0000" value="2" id="m2"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Автово</div></div>
<div><input name="metro[]" class="FF0000" value="3" id="m3"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Академическая</div></div>
<div><input name="metro[]" class="FF0000" value="4" id="m4"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Балтийская</div></div>
<div><input name="metro[]" class="00FF00" value="5" id="m5"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Василеостровская</div></div>
<div><input name="metro[]" class="FF0000" value="6" id="m6"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Владимирская</div></div>
<div><input name="metro[]" class="FF00FF" value="21" id="m21"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Волковская</div></div>
<div><input name="metro[]" class="FF0000" value="7" id="m7"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Выборгская</div></div>
<div><input name="metro[]" class="0000FF" value="8" id="m8"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Горьковская</div></div>
<div><input name="metro[]" class="00FF00" value="9" id="m9"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Гостиный Двор</div></div>
<div><input name="metro[]" class="FF0000" value="10" id="m10"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Гражданский пр.</div></div>
<div><input name="metro[]" class="FF0000" value="11" id="m11"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Девяткино</div></div>
<div><input name="metro[]" class="FFFF00" value="12" id="m12"  style="float: left; clear: left;" type="checkbox"><div class="m4"></div><div style="float: left;">Достоевская</div></div>
<div><input name="metro[]" class="00FF00" value="13" id="m13"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Елизаровская</div></div>
<div><input name="metro[]" class="0000FF" value="14" id="m14"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Звездная</div></div>
<div><input name="metro[]" class="FF00FF" value="27" id="m27"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Звенигородская</div></div>
<div><input name="metro[]" class="FF0000" value="15" id="m15"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Кировский з-д</div></div>
<div><input name="metro[]" class="FF00FF" value="16" id="m16"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Комендантск.пр.</div></div>
<div><input name="metro[]" class="FF00FF" value="17" id="m17"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Крестовск.остров</div></div>
<div><input name="metro[]" class="0000FF" value="18" id="m18"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Купчино</div></div>
<div><input name="metro[]" class="FFFF00" value="19" id="m19"  style="float: left; clear: left;" type="checkbox"><div class="m4"></div><div style="float: left;">Ладожская</div></div>
<div><input name="metro[]" class="FF0000" value="20" id="m20"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Ленинский пр.</div></div>
<div><input name="metro[]" class="FF0000" value="22" id="m22"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Лесная</div></div>
<div><input name="metro[]" class="FFFF00" value="23" id="m23"  style="float: left; clear: left;" type="checkbox"><div class="m4"></div><div style="float: left;">Лиговский пр.</div></div>
<div><input name="metro[]" class="00FF00" value="24" id="m24"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Ломоносовская</div></div>
<div><input name="metro[]" class="00FF00" value="229" id="m229"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Маяковская</div></div>
<div><input name="metro[]" class="0000FF" value="25" id="m25"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Московск.ворота</div></div>
<div><input name="metro[]" class="0000FF" value="26" id="m26"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Московская</div></div>
<div><input name="metro[]" class="FF0000" value="28" id="m28"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Нарвская</div></div>
<div><input name="metro[]" class="0000FF" value="29" id="m29"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Невский пр.</div></div>
<div><input name="metro[]" class="FFFF00" value="31" id="m31"  style="float: left; clear: left;" type="checkbox"><div class="m4"></div><div style="float: left;">Новочеркасская</div></div>
<div><input name="metro[]" class="00FF00" value="32" id="m32"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Обухово</div></div>
<div><input name="metro[]" class="0000FF" value="33" id="m33"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Озерки </div></div>
<div><input name="metro[]" class="0000FF" value="34" id="m34"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Парк Победы</div></div>
<div><input name="metro[]" class="0000FF" value="35" id="m35"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Парнас</div></div>
<div><input name="metro[]" class="0000FF" value="36" id="m36"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Петроградская</div></div>
<div><input name="metro[]" class="0000FF" value="37" id="m37"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Пионерская</div></div>
<div><input name="metro[]" class="00FF00" value="38" id="m38"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Пл.Ал.Невск.</div></div>
<div><input name="metro[]" class="FF0000" value="40" id="m40"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Пл.Восстания</div></div>
<div><input name="metro[]" class="FF0000" value="42" id="m42"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Пл.Ленина</div></div>
<div><input name="metro[]" class="FF0000" value="44" id="m44"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Пл.Мужества</div></div>
<div><input name="metro[]" class="FF0000" value="45" id="m45"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Политехническая</div></div>
<div><input name="metro[]" class="FFFF00" value="46" id="m46"  style="float: left; clear: left;" type="checkbox"><div class="m4"></div><div style="float: left;">Пр.Большевиков</div></div>
<div><input name="metro[]" class="FF0000" value="47" id="m47"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Пр.Ветеранов</div></div>
<div><input name="metro[]" class="0000FF" value="49" id="m49"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Пр.Просвещения</div></div>
<div><input name="metro[]" class="00FF00" value="50" id="m50"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Приморская</div></div>
<div><input name="metro[]" class="00FF00" value="51" id="m51"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Пролетарская</div></div>
<div><input name="metro[]" class="FF0000" value="52" id="m52"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Пушкинская</div></div>
<div><input name="metro[]" class="00FF00" value="53" id="m53"  style="float: left; clear: left;" type="checkbox"><div class="m3"></div><div style="float: left;">Рыбацкое</div></div>
<div><input name="metro[]" class="FF00FF" value="54" id="m54"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Садовая</div></div>
<div><input name="metro[]" class="0000FF" value="55" id="m55"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Сенная пл.</div></div>
<div><input name="metro[]" class="FF00FF" value="56" id="m56"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Спортивная</div></div>
<div><input name="metro[]" class="FF00FF" value="57" id="m57"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Старая Деревня</div></div>
<div><input name="metro[]" class="0000FF" value="58" id="m58"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Технологич.ин.</div></div>
<div><input name="metro[]" class="0000FF" value="60" id="m60"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Удельная</div></div>
<div><input name="metro[]" class="FFFF00" value="61" id="m61"  style="float: left; clear: left;" type="checkbox"><div class="m4"></div><div style="float: left;">Ул.Дыбенко</div></div>
<div><input name="metro[]" class="0000FF" value="62" id="m62"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Фрунзенская</div></div>
<div><input name="metro[]" class="0000FF" value="63" id="m63"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Черная речка</div></div>
<div><input name="metro[]" class="FF0000" value="64" id="m64"  style="float: left; clear: left;" type="checkbox"><div class="m1"></div><div style="float: left;">Чернышевская</div></div>
<div><input name="metro[]" class="FF00FF" value="65" id="m65"  style="float: left; clear: left;" type="checkbox"><div class="m5"></div><div style="float: left;">Чкаловская</div></div>
<div><input name="metro[]" class="0000FF" value="66" id="m66"  style="float: left; clear: left;" type="checkbox"><div class="m2"></div><div style="float: left;">Электросила</div></div>

</div></form>
	<div style="margin-top:10px" id="metro_content_head">
	<div style="float:left;width:100%;">Выбор всей ветки:</div>
<input type="checkbox" onclick="$('.FF0000').attr('checked',this.checked);" style="float: left;" value="2" id="checkFF0000">
<div class="metro1"></div>
<input type="checkbox" onclick="$('.0000FF').attr('checked',this.checked);" style="float: left;" value="8" id="check0000FF">
<div class="metro2"></div>
<input type="checkbox" onclick="$('.00FF00').attr('checked',this.checked);" style="float: left;" value="5" id="check00FF00">
<div class="metro3"></div>
<input type="checkbox" onclick="$('.FFFF00').attr('checked',this.checked);" style="float: left;" value="12" id="checkFFFF00">
<div class="metro4"></div>
<input type="checkbox" onclick="$('.FF00FF').attr('checked',this.checked);" style="float: left;" value="21" id="checkFF00FF">
<div class="metro5"></div>

	</div>
  </div>


</body>
</html>
