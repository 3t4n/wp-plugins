
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



(jQuery("#rc-formSearch").find(jQuery("#start_day"))).val(today.format("DD"));
(jQuery("#rc-formSearch").find(jQuery("#start_month"))).val(today.format("MM"));
(jQuery("#rc-formSearch").find(jQuery("#start_year"))).val(today.format("YYYY"));

(jQuery("#rc-formSearch").find(jQuery("#end_day"))).val(tomorrow.format("DD"));
(jQuery("#rc-formSearch").find(jQuery("#end_month"))).val(tomorrow.format("MM"));
(jQuery("#rc-formSearch").find(jQuery("#end_year"))).val(tomorrow.format("YYYY"));


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
			
			(jQuery("#rc-formSearch").find(jQuery("#start_day"))).val(date1.format("DD"));
			(jQuery("#rc-formSearch").find(jQuery("#start_month"))).val(date1.format("MM"));
			(jQuery("#rc-formSearch").find(jQuery("#start_year"))).val(date1.format("YYYY"));
			
			(jQuery("#rc-formSearch").find(jQuery("#end_day"))).val(date2.format("DD"));
			(jQuery("#rc-formSearch").find(jQuery("#end_month"))).val(date2.format("MM"));
			(jQuery("#rc-formSearch").find(jQuery("#end_year"))).val(date2.format("YYYY"));
			
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
			if (jQuery("#"+btn_target+"_"+btn_target_room).val()==1 && new_val==0) jQuery("#"+btn_target+"_"+btn_target_room+"_less").addClass("disabled_btn");
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
	
	html='<div class="rc-col-lg-6 rc-col-md-6 rc-col-sm-6 rc-col-xs-6 rc-text-center app_child_cnt_'+btn_target_room+'" id="rc-room_'+btn_target_room+'_app_child_'+index+'">';


			html+='<div class=" rc-text-left inline-block div-room-ages-occupancy vert-align-middle">';
				html+='<i class="fa fa-child occupancy-icon src-occupancy-icon" aria-hidden="true" style="display: none;"></i>';
				html+='<span>'+str_age+' '+(index+1)+'</span>';
			html+='</div>';
			

			name="child_"; 	 
			child_trg=index;

				
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



});