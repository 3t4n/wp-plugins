

jQuery( document ).ready(function() {

jQuery("#rc-btn-search").click(function(){
	
	
	var roomEmpty=false;
	jQuery(".rm-cnt").each(function(x){
		
		if (jQuery(this).find("input[name='adults']").val()==0 && jQuery(this).find("input[name='children']").val()==0){
			
			jQuery("#rc-room_error_"+x).text(str_room_error);
			roomEmpty=true;
		}
		
	});
	
	
	if (!roomEmpty) jQuery("#rc-formSearch").submit();
	else return false;
	
	
});


/*#############################					LITEPICKER				#####################################*/

var today= new moment();
var tomorrow= new moment();
tomorrow=tomorrow.add(1,'days');


jQuery("#rc-checkin").val(today.format("YYYYMMDD"));
jQuery("#rc-checkout").val(tomorrow.format("YYYYMMDD"));


const picker = new Litepicker({ 
	element: document.getElementById('rc-search_calendar'),

	plugins: ['mobilefriendly'],
	autoApply: true,
	singleMode: false, //true picker - false range picker
	allowRepick: false, //can repick only one date of range
	
	startDate: today.format("YYYY-MM-DD"),
	endDate: tomorrow.format("YYYY-MM-DD"),
	
//	buttonText:{"apply":"Applyss","cancel":"Cancelss"/*,"previousMonth":"<svg>...</svg>","nextMonth":"<svg>...</svg>","reset":"<svg>...</svg>"*/},
	firstDay:first_dow,
	lang: locale,
	format:"YYYY-MM-DD",
	
	//desktop
	numberOfColumns: 2,
	numberOfMonths: 2,
	

	
	position: "bottom left",
	scrollToDate: false,
	
//	disallowLockDaysInRange: true,
	selectBackward:false,
	selectForward:true,
	showTooltip:true,
	
	tooltipNumber:(totalDays) => {
		return totalDays - 1;
	},
	tooltipText:{"one":str_night,"other":str_nights},
	minDays:2,
	minDate:today.format("YYYY-MM-DD"),
	setup: (picker) => {
		
		picker.on('before:show', (el) => {
    		// some action
    		jQuery('.litepicker').addClass('notranslate');
			//console.log('adding notranslate');
  		});
  		
		picker.on('selected', (date1, date2) => {
			
			jQuery(".dates_calendar").css("animation", "none");
			
			jQuery("#rc-search_group").addClass("search_calendar_border_fixed");

			//remove pulse effect on checkin/checout calendar when a value is setted
			jQuery(".dates_calendar").css("animation", "none");
			
			
			select_start = date1.format('YYYYMMDD');
			select_end = date2.format('YYYYMMDD');
			
			jQuery("#rc-checkin").val(select_start);
			jQuery("#rc-checkout").val(select_end);
			
		});
	
	}
	
  });


jQuery("#rc-calendar_search_span").click(function(){
	picker.show();
});
/******************			ADD AND REMOVE GUEST			****************/

jQuery(document).on('click','.box-btn', function() {

	

	
	btn_id=jQuery(this).attr("id");

	
	// children and adults
	
		
		btn_target=btn_id.split("_")[0];
		btn_action=btn_id.split("_")[1];
		btn_target_room=btn_id.split("_")[2];
		
		jQuery("#rc-room_error_"+btn_target_room).text('');
		
	 if (btn_target=="rc-age"){
		
		split=btn_id.split("_");
		 
		btn_target_room=split[1]+"_"+split[2]+"_"+split[3]+"_"+split[4];
		btn_action=split[5];
		
	}	
		
		//calculate new value
		new_val=parseInt(jQuery("#"+btn_target+"_"+btn_target_room).val(),10);

	
		if (isNaN(new_val)){
			new_val=0;
		}else{
			
			if (btn_action=="more")new_val+=1;
			
			if (btn_action=="less")new_val-=1;
			
			if (new_val<=-1)new_val=0;
							
			if (btn_target_room=="0" && btn_target=="rc-adults" && new_val==0) new_val=1;

			if (btn_target_room!="0" && btn_target=="rc-adults" && new_val==-1) new_val=0;

			
			if (new_val>=21) new_val=20;
			
			if (btn_target=="rc-age" && new_val>=17){
				new_val=17;
			}
			
		}
		
		
		
		//apply disabled if necessary
		if (btn_target=="rc-adults"){
			
			if (btn_target_room=="0"){
				if (jQuery("#"+btn_target+"_"+btn_target_room).val()==2 && new_val==1) jQuery("#"+btn_target+"_less_"+btn_target_room).addClass("disabled_btn");
				else if (jQuery("#"+btn_target+"_"+btn_target_room).val()==1 && new_val==2) jQuery("#"+btn_target+"_less_"+btn_target_room).removeClass("disabled_btn");
				
			}else{
				if (jQuery("#"+btn_target+"_"+btn_target_room).val()==1 && new_val==0) jQuery("#"+btn_target+"_less_"+btn_target_room).addClass("disabled_btn");
				else if (jQuery("#"+btn_target+"_"+btn_target_room).val()==0 && new_val==1) jQuery("#"+btn_target+"_less_"+btn_target_room).removeClass("disabled_btn");
			}				
			
		}
		if (btn_target=="rc-children"){
			if (jQuery("#"+btn_target+"_"+btn_target_room).val()==1 && new_val==0) jQuery("#"+btn_target+"_less_"+btn_target_room).addClass("disabled_btn");
			else if (jQuery("#"+btn_target+"_"+btn_target_room).val()==0 && new_val==1) jQuery("#"+btn_target+"_less_"+btn_target_room).removeClass("disabled_btn");
		}
		if (btn_target=="rc-age"){
			if (jQuery("#"+btn_target+"_"+btn_target_room).val()==1 && new_val==0) jQuery("#-"+btn_target+"_"+btn_target_room+"_less").addClass("disabled_btn");
			else if (jQuery("#"+btn_target+"_"+btn_target_room).val()==0 && new_val==1) jQuery("#"+btn_target+"_"+btn_target_room+"_less").removeClass("disabled_btn");
		}
		
		if (btn_target=="rc-adults" && jQuery("#"+btn_target+"_"+btn_target_room).val()==19 && new_val==20) jQuery("#"+btn_target+"_more_"+btn_target_room).addClass("disabled_btn");
		else if (btn_target=="rc-adults" && jQuery("#"+btn_target+"_"+btn_target_room).val()==20 && new_val==19) jQuery("#"+btn_target+"_more_"+btn_target_room).removeClass("disabled_btn");

		if (btn_target=="rc-age" && jQuery("#"+btn_target).val()==16 && new_val==17) jQuery("#"+btn_target+"_more").addClass("disabled_btn");
		else if (btn_target=="rc-age" && jQuery("#"+btn_target).val()==17 && new_val==16) jQuery("#"+btn_target+"_more").removeClass("disabled_btn");
	
		//update children fields
		if (btn_target=="rc-children") appendRemoveChildren(new_val,btn_action,btn_target_room);
		
		
			jQuery("#"+btn_target+"_"+btn_target_room).val(new_val);
			jQuery("#"+btn_target+"_span_"+btn_target_room).html(new_val);
		
		jQuery(this).fadeTo(100, 0.5).fadeTo(100, 1.0);
		
		

});


function appendRemoveChildren(idx,action,btn_target_room){
	
	
	
	
	child_cnt=jQuery(".app_child_cnt_"+btn_target_room).length;
	size=idx;
	
	
	
	if ("less"==action) size=child_cnt;
			
	
	for (k=0;k<size;k++){
		
		target_div=jQuery("#rc-room_"+btn_target_room+"_app_child_"+k);
		
		

		if (action=="more" && target_div.length==0){
			

			addChild(k,btn_target_room);
			
		}else if(action=="less" && k>=idx && target_div.length==1){
			
			target_div.remove();
			
		}
		
	}
	
	
	
}

function addChild(index,btn_target_room){
	

	
	html='<div class="rc-col-lg-5 rc-col-md-5 rc-col-sm-5 rc-col-xs-5 rc-col-5"></div>';
	html+='<div class="rc-col-lg-7 rc-col-md-7 rc-col-sm-7 rc-col-xs-7 rc-col-7 app_child_cnt_'+btn_target_room+'" id="rc-room_'+btn_target_room+'_app_child_'+index+'">';


			html+='<div class=" rc-text-left inline-block div-room-ages-occupancy vert-align-middle">';
				html+='<i class="fa fa-child occupancy-icon src-occupancy-icon" aria-hidden="true" style="display: none;"></i>';
				html+='<span>'+str_age+' '+(index+1)+'</span>';
			html+='</div>';
			
				
			name="ages_";
			child_trg=btn_target_room;

			html+='<div class="rc-text-center inline-block div-room-ages-quantity">';
			
				html+='<span class="box-btn btn-less disabled_btn" id="rc-age_room_'+btn_target_room+'_child_'+index+'_less">-</span>';
				html+='<div class="form-search-div inline-block">';
					html+='<span id="rc-age_span_room_'+btn_target_room+'_child_'+index+'"  class="src-span">0</span>';

					html+='<input type="hidden" id="rc-age_room_'+btn_target_room+'_child_'+index+'" name="'+name+child_trg+'" value="0"/>';
				html+='</div>';
				html+='<span class="box-btn btn-plus" id="rc-age_room_'+btn_target_room+'_child_'+index+'_more" >+</span>';
				
			html+='</div>';		
								
				
		

	html+='</div>';

	
	
	jQuery("#rc-room_"+btn_target_room+"_children_append_container").append(html);
}

jQuery('#rc-room_header_add').on('click',function() {
	
	console.log("add");
	var room_num=jQuery('div.col-rooms').length;
	
	//var room_num=jQuery(this).attr('data-target');
	var new_room_num=eval(room_num)+1;
	
	
	var append_room=createRoom(room_num);
	
	jQuery("#rc-rooms_search").append(append_room);
	
	
	
	
	

});

function createRoom(room_num){
	
	jQuery("#rc-room_"+room_num+"_header_add").html('&nbsp;');
	jQuery("#rc-room_"+room_num+"_header_add").hide();
	jQuery("#rc-room_"+room_num+"_header_add").removeClass('room_add_enabled');
	
	//room_num++;
	
//	alert(room_num);
	var room_html="";
	
			
	room_html+='<div id="rc-room_'+room_num+'_container" class="rm-cnt mrg-top">';	 

		room_html+='<div class="rc-row rc-text-center">';

			room_html+='<div class="rc-col-lg-12 rc-col-md-12 rc-col-sm-12 rc-col-xs-12 rc-col-12 col-rooms" id="rc-room_body_div_'+room_num+'">';
				room_html+='<div class="div-room-num rc-text-left rc-col-xs-12 rc-col-12">';
				
					room_html+='<span class="room-number" id="rc-room_'+room_num+'_header_room_number" > #'+(parseInt(room_num,10)+1)+' </span>';
				
					 
					room_html+='<div class="rc-text-left inline-block div-room-action-add"><a class="x-remove" id="rc-room_'+room_num+'_header_remove"><i class="fa fa-times"></i></a></div>';
					//room_html+='<div class="src-room-add pull-right">';
					//room_html+='<button id="room_'+room_num+'_header_add" type="button" class="btn be-btn room_header_span_add room_add_enabled"><%=p.getProperty("COMMON_ADD")%> <%=accommodation_dic%></button>';
					//room_html+='</div>';
				room_html+='</div>';
					
					
				room_html+='<div class="rc-row">';
				
				room_html+="<div class=\"rc-col-xs-12\">";
				room_html+="<span class=\"room-error\" id=\"rc-room_error_"+room_num+"\"></span>";
				room_html+="</div>";
				
				room_html+='<div class="rc-col-xs-6 rc-col-6 rc-text-center">';
					room_html+='<div class="rc-text-center inline-block div-room-adult-occupancy">';
					room_html+='<i class="fa fa-male occupancy-icon src-occupancy-icon" aria-hidden="true"></i>';
					room_html+='</div>';
					room_html+='<div class=" rc-text-center inline-block div-room-adult-quantity">';
						room_html+='<span class="box-btn btn-less disabled_btn" id="rc-adults_less_'+room_num+'">-</span>';
					room_html+='<div class="form-search-div">';
						room_html+='<span id="rc-adults_span_'+room_num+'" class="src-span">0</span>';
						room_html+='<input type="hidden" id="rc-adults_'+room_num+'" name="adults" value="0"/>';
					room_html+='</div>';
						room_html+='<span class="box-btn btn-plus" id="rc-adults_more_'+room_num+'">+</span>';
					room_html+='</div>';
				room_html+='</div>';
				room_html+='<div class="rc-col-xs-6 rc-col-6 rc-text-right app_child_cnt children-row">';
				room_html+='<div class=" rc-text-center inline-block div-room-child-occupancy">';
				room_html+='<i class="fa fa-child occupancy-icon src-occupancy-icon" aria-hidden="true"></i>';
				room_html+='</div>';
				room_html+='<div class=" rc-text-center inline-block div-room-child-quantity">';
					
					room_html+='<span class="box-btn btn-less disabled_btn" id="rc-children_less_'+room_num+'">-</span>';						
					room_html+='<div class="form-search-div">';
					room_html+='<span class="src-span" id="rc-children_span_'+room_num+'">0</span>';
					room_html+='<input type="hidden" name="children" id="rc-children_'+room_num+'" value="0"/>';
					room_html+='</div>';
					room_html+='<span class="box-btn btn-plus" id="rc-children_more_'+room_num+'">+</span>';
					
				room_html+='</div>';
				room_html+='</div>';
			room_html+='</div>';
				
				
			room_html+='</div>';
			

			
			
		room_html+='</div>';
		room_html+='<div class="rc-row children-row"  id="rc-room_'+room_num+'_children_append_container">';
		room_html+='</div>';
								
	room_html+='</div>';	

	return room_html;
		
}

jQuery(document).on('click','.x-remove', function() {
	
	room_to_remove=jQuery(this).attr("id").split("_")[1];
	
	room_counter=jQuery(".rm-cnt").length;
	
	
	jQuery("#rc-room_"+room_to_remove+"_container").remove();
	
	
	
	for (k=(parseInt(room_to_remove,10)+1);k<room_counter;k++){		
		
		switchId(k);
		
	}
	
	
});

function switchId(k){

	newk=k-1;
	
	num_children=jQuery("#rc-children_"+k).val();
	
	for (i=0;i<num_children;i++){
		
		jQuery("#rc-room_"+k+"_app_child_"+i).removeClass("app_child_cnt_"+k);
		jQuery("#rc-room_"+k+"_app_child_"+i).addClass("app_child_cnt_"+k);
	
		jQuery("#rc-room_"+k+"_app_child_"+i).attr("id","rc-room_"+newk+"_app_child_"+i);
		
		
		jQuery("#rc-age_room_"+k+"_child_"+i+"_less").attr("id","rc-age_room_"+newk+"_child_"+i+"_less");
		jQuery("#rc-age_room_"+k+"_child_"+i+"_more").attr("id","rc-age_room_"+newk+"_child_"+i+"_more");
		
		jQuery("#rc-age_room_"+k+"_child_"+i).attr("name","ages_"+newk);
		jQuery("#rc-age_room_"+k+"_child_"+i).attr("id","rc-age_room_"+newk+"_child_"+i);
		
		jQuery("#rc-age_span_room_"+k+"_child_"+i).attr("id","rc-age_span_room_"+newk+"_child_"+i);
	
	}
	jQuery("#rc-room_error_"+k).attr("id","rc-room_error_"+newk);	
	jQuery("#rc-room_"+k+"_container").attr("id","rc-room_"+newk+"_container");	    
	jQuery("#rc-room_"+k+"_children_append_container").attr("id","rc-room_"+newk+"_children_append_container");
	jQuery("#rc-room_"+k+"_header_div").attr("id","rc-room_"+newk+"_header_div");
	jQuery("#rc-room_"+k+"_header_room_number").html(' #'+k);
	jQuery("#rc-room_"+k+"_header_room_number").attr("id","rc-room_"+newk+"_header_room_number")
	jQuery("#rc-room_"+k+"_header_remove").attr("id","rc-room_"+newk+"_header_remove");
	jQuery("#rc-room_"+k+"_header_add").attr("id","rc-room_"+newk+"_header_add");
	jQuery("#rc-room_body_div_"+k).attr("id","rc-room_body_div_"+newk);
	jQuery("#rc-adults_less_"+k).attr("id","rc-adults_less_"+newk);
	jQuery("#rc-adults_span_"+k).attr("id","rc-adults_span_"+newk);
	jQuery("#rc-adults_"+k).attr("id","rc-adults_"+newk);
	jQuery("#rc-adults_more_"+k).attr("id","rc-adults_more_"+newk);
	jQuery("#rc-children_less_"+k).attr("id","rc-children_less_"+newk);
	jQuery("#rc-children_span_"+k).attr("id","rc-children_span_"+newk);
	jQuery("#vchildren_"+k).attr("id","rc-children_"+newk);
	jQuery("#rc-children_more_"+k).attr("id","rc-children_more_"+newk);

	
}



});
