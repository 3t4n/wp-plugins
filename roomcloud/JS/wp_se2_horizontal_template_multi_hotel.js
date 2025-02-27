
jQuery( document ).ready(function() {
	
	var drop=jQuery("#rc-traveler_details").prop('outerHTML');
	jQuery("#rc-traveler_details").remove();
	jQuery("body").append(drop);

	var drop_w=jQuery("#rc-travelers_group").width();
	jQuery("#rc-traveler_details").css("width", drop_w);

	var drop_x=jQuery("#rc-travelers_group").offset().left;
	var drop_y=jQuery("#rc-travelers_group").offset().top;

	jQuery("#rc-traveler_details").css('top', drop_y + jQuery("#rc-travelers_group").outerHeight());
	jQuery("#rc-traveler_details").css('left', drop_x);


    
	
	jQuery("#rc-btn-search").click(function(e){
		
		e.preventDefault();
		var roomEmpty=false;
		jQuery(".rm-cnt").each(function(x){
			
			if (jQuery(this).find("input[name='adults']").val()==0 && jQuery(this).find("input[name='children']").val()==0){
				
				jQuery("#rc-room_error_"+x).text(str_remove_room);
				roomEmpty=true;
			}
			
		});
		
		
		if (!roomEmpty){
		
						
			jQuery("#rc-formSearch").find("input").each(function(){
				
				let $input=jQuery(this);
				let $name=$input.attr('name');
				if($name==undefined){
					
				}else if($name.startsWith('adults')){
					$input.remove();
				}else if($name.startsWith('children')){
					$input.remove();
				}else if($name.startsWith('age')){
					$input.remove();
				}
				
			});
			
			jQuery("#rc-traveler_details").find("input").each(function(){
				
				let $name=jQuery(this).attr('name');
				let $value=jQuery(this).attr('value');
				if($name!=undefined){
					jQuery("#rc-formSearch").append('<input type="hidden" name="'+$name+'" value="'+$value+'">');
				}
			});
			
			
			jQuery("#rc-formSearch").submit();
		
		}
		else return false;
			
	});

	/******************			DROPDOWN			****************/
	
    jQuery("#rc-travelers_group").click(function(e){
    	

    	drop_x=jQuery("#rc-travelers_group").offset().left;
    	drop_y=jQuery("#rc-travelers_group").offset().top;
		
		if (openDropdownsOnTop){
			jQuery("#rc-traveler_details").css('top', drop_y - jQuery("#rc-traveler_details").outerHeight()-1);
		}else{
			jQuery("#rc-traveler_details").css('top', drop_y + jQuery("#rc-travelers_group").outerHeight());
    	}

    	jQuery("#rc-traveler_details").css('left', drop_x);

        jQuery(".rc-dropdown-menu").slideToggle("fast");
        e.stopPropagation();
    });

    // Hide dropdown menu on click outside
    jQuery(document).on("click", function(event){
        if(!jQuery(event.target).closest("#rc-traveler_details").length){
        	
        	
    		var roomEmpty=false;
    		jQuery(".rm-cnt").each(function(x){
    		
    			if (jQuery(this).find("input[name='adults']").val()==0 && jQuery(this).find("input[name='children']").val()==0){
    			
    				jQuery("#rc-room_error_"+x).text(str_room_error);
    				roomEmpty=true;
    			}
    			
    		});
    	
    		
    		
    	
    		if (roomEmpty) return;
        	
            jQuery(".rc-dropdown-menu").slideUp("fast");
            
            jQuery("#rc-travelers").val(getUpdatedText());
        }
    });
	
    jQuery("#rc-close_dropdown").on("click", function(event){
       	
    	
    		var roomEmpty=false;
    		jQuery(".rm-cnt").each(function(x){
    		
    			if (jQuery(this).find("input[name='adults']").val()==0 && jQuery(this).find("input[name='children']").val()==0){
    			
    				jQuery("#rc-room_error_"+x).text(str_room_error);
    				roomEmpty=true;
    			}
    			
    		});
    	
    		
    		
   	
    		if (roomEmpty) {
				drop_y=jQuery("#rc-travelers_group").offset().top;

				if (openDropdownsOnTop){
					jQuery("#rc-traveler_details").css('top', drop_y - jQuery("#rc-traveler_details").outerHeight()-1);
				} 
			
				return;
				
			}
    		
            jQuery(".rc-dropdown-menu").slideUp("fast");
            
            jQuery("#rc-travelers").val(getUpdatedText());
        
    });
    
    
    
    function getUpdatedText(){
    	
    	var rooms=0;
    	var adults=0;
    	var children=0;
    	jQuery(".rm-cnt").each(function(){
    		
    		rooms++;
    		var target=(jQuery(this).attr("id")).split("_")[1];
     		
    		adults+=parseInt(jQuery("#rc-adults_"+target).val(), 10);
    		children+=parseInt(jQuery("#rc-children_"+target).val(), 10);
    		
    	});
    	
    	
    	
    	var text=""
    	
    	text+=rooms; 
    	
    	if (rooms==1) text+=" "+str_room+" - ";
    	else text+=" "+str_rooms+" - ";
    	
    	text+=adults;
    	
    	if (adults==1) text+=" "+str_adult;
    	else text+=" "+str_adults;
    	
    	if (children!=0) text+=" - ";
		
		if (children>1)text+=children+" "+str_children;
    	else if (children==1)text+="1 "+str_child;
    	return (text);
    	
    }

/*#############################					LITEPICKER				#####################################*/

var today= new moment();
var tomorrow= new moment();
tomorrow=tomorrow.add(1,'days');


jQuery("#rc-checkin").val(today.format("YYYYMMDD"));
jQuery("#rc-checkout").val(tomorrow.format("YYYYMMDD"));

var position="bottom left";
if (openDropdownsOnTop) position="top left";

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
	

	
	position: position,
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

jQuery("#rc-room_add_span").click(function(){
	
	new_room="";
	
	new_idx=jQuery(".rm-cnt").length;
	
	
	new_room+="<div id=\"rc-room_"+new_idx+"_container\" class=\"rm-cnt\"><!--  ROOM CONTAINER  -->";
	
	
		new_room+="<div class=\"rc-row\">";
			new_room+="<div class=\"rc-col-xs-12\">";
				new_room+="<hr class=\"room-num-hr\">";
			new_room+="</div>";
		new_room+="</div>";
	
		new_room+="<div class=\"rc-row\">";
		
		
		new_room+="<div class=\"rc-col-xs-12\">";
			new_room+="<span class=\"room-error\" id=\"rc-room_error_"+new_idx+"\"></span>";
		new_room+="</div>";

		
			new_room+="<div class=\"rc-col-xs-6 rc-text-right\">";
				new_room+="<div class=\"room-num-div\">";
					new_room+="<span class=\"room-num-span\" id=\"rc-room-num-span-"+new_idx+"\">"+str_room+" "+(parseInt(new_idx, 10)+1)+"</span>";
				new_room+="</div>";
			new_room+="</div>";
			new_room+="<div class=\"rc-col-xs-6\"></div>";
		new_room+="</div>";
	
		new_room+="<div class=\"rc-row\">";
					
			new_room+="<div class=\"rc-col-xs-6 rc-text-center\">";
				new_room+="<div class=\"rc-text-center div-room-adult-occupancy flex\">";
					new_room+="<span class=\"name-span\">"+str_adults+"</span>";
					new_room+="<span class=\"icon-span\">";
						new_room+="<i class=\"fa fa-male occupancy-icon src-occupancy-icon\" aria-hidden=\"true\"></i>";
					new_room+="</span>";
				new_room+="</div>";
			new_room+="</div>";
				
			new_room+="<div class=\"rc-col-xs-6 rc-text-align-auto\">";					
				new_room+="<div class=\"rc-text-center inline-block div-room-adult-quantity\">";
					new_room+="<span class=\"box-btn-round btn-less disabled_btn\" id=\"adults_less_"+new_idx+"\">-</span>";							
					new_room+="<div class=\"form-search-div\">";
						new_room+="<span id=\"rc-adults_span_"+new_idx+"\" class=\"src-span\">0</span>";
						new_room+="<input type=\"hidden\" id=\"rc-adults_"+new_idx+"\" name=\"adults\" value=\"0\">";
					new_room+="</div>";
					new_room+="<span class=\"box-btn-round btn-plus \" id=\"rc-adults_more_"+new_idx+"\">+</span>";
				new_room+="</div>";
			new_room+="</div>";
		
		new_room+="</div>";
		new_room+="<div class=\"rc-row children-row\">";
			
			new_room+="<div class=\"rc-col-xs-6 rc-text-center app_child_cnt\">";
				new_room+="<div class=\"rc-text-center div-room-child-occupancy flex\">";
					new_room+="<span class=\"name-span\">"+str_children+"</span>";
					new_room+="<span class=\"icon-span\">";
					new_room+="<i class=\"fa fa-child occupancy-icon src-occupancy-icon\" aria-hidden=\"true\"></i>";
					new_room+="</span>";
				new_room+="</div>";
			new_room+="</div>";
		
			new_room+="<div class=\"rc-col-xs-6 rc-text-align-auto\">";
				new_room+="<div class=\" rc-text-center inline-block div-room-child-quantity\">";
					new_room+="<span class=\"box-btn-round btn-less disabled_btn\" id=\"rc-children_less_"+new_idx+"\">-</span>";
					new_room+="<div class=\"form-search-div\">";
						new_room+="<span class=\"src-span\" id=\"rc-children_span_"+new_idx+"\">0</span>";
						new_room+="<input type=\"hidden\" name=\"children\" id=\"rc-children_"+new_idx+"\" value=\"0\">";
					new_room+="</div>";
				new_room+="<span class=\"box-btn-round btn-plus \" id=\"rc-children_more_"+new_idx+"\">+</span>";
				new_room+="</div>";
			new_room+="</div>";
		
		new_room+="</div>";		
				
			
		new_room+="<div class=\"rc-row  children-row\" id=\"rc-room_"+new_idx+"_children_append_container\"><!--  START CHILDREN AGES   -->";
		new_room+="<div class=\"rc-col-xs-12\">";				
	
		new_room+="</div>";
		new_room+="</div>	<!--  END CHILDREN AGES   -->";
	
		new_room+="<div class=\"rc-row\">";	
			new_room+="<div class=\"rc-col-xs-12 rc-text-right\">";
				new_room+="<span class=\"room-remove\" id=\"rc-room-remove-"+new_idx+"\">"+str_remove_room+"</span>";
			new_room+="</div>";
		new_room+="</div>";
	
	new_room+="</div>";
	
	jQuery("#rc-rooms_container").append(new_room);
	
    drop_y=jQuery("#rc-travelers_group").offset().top;

    if (openDropdownsOnTop){
		jQuery("#rc-traveler_details").css('top', drop_y - jQuery("#rc-traveler_details").outerHeight()-1);
	}	
	
   
	
});

jQuery(document).on('click', ".room-remove", function(e) {
	 
	e.stopPropagation();
	
	var room_to_remove=jQuery(this).attr("id").split("-")[3];
	
	/**/
	
	room_counter=jQuery(".rm-cnt").length;	
	jQuery("#rc-room_"+room_to_remove+"_container").remove();
	
	
	
	for (k=(parseInt(room_to_remove,10)+1);k<room_counter;k++){		
		switchId(k);
		
	}
	/**/
	
	drop_y=jQuery("#rc-travelers_group").offset().top;

    if (openDropdownsOnTop){
		jQuery("#rc-traveler_details").css('top', drop_y - jQuery("#rc-traveler_details").outerHeight()-1);
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
		
		jQuery("#rc-age_room_"+k+"_child_"+i).attr("name","rc-ages_"+newk);
		jQuery("#rc-age_room_"+k+"_child_"+i).attr("id","rc-age_room_"+newk+"_child_"+i);
		
		jQuery("#rc-age_span_room_"+k+"_child_"+i).attr("id","rc-age_span_room_"+newk+"_child_"+i);
	
	}
	
	
	jQuery("#rc-room_"+k+"_container").attr("id","rc-room_"+newk+"_container");	    
	jQuery("#rc-room-num-span-"+k).text("Room "+k);	    	
	jQuery("#rc-room-num-span-"+k).attr("id","#rc-room-num-span-"+newk);	    
	jQuery("#rc-room-remove-"+k).attr("id","#rc-room-remove-"+newk);	    

	jQuery("#rc-room_error_"+k).attr("id","rc-room_error_"+newk);

	jQuery("#rc-room_"+k+"_children_append_container").attr("id","rc-room_"+newk+"_children_append_container");
//	jQuery("#room_"+k+"_header_div").attr("id","room_"+newk+"_header_div");
//	jQuery("#room_"+k+"_header_room_number").html(' #'+k);
//	jQuery("#room_"+k+"_header_room_number").attr("id","room_"+newk+"_header_room_number")
//	jQuery("#room_"+k+"_header_remove").attr("id","room_"+newk+"_header_remove");
//	jQuery("#room_"+k+"_header_add").attr("id","room_"+newk+"_header_add");
//	jQuery("#room_body_div_"+k).attr("id","room_body_div_"+newk);
	jQuery("#rc-adults_less_"+k).attr("id","rc-adults_less_"+newk);
	jQuery("#rc-adults_span_"+k).attr("id","rc-adults_span_"+newk);
	jQuery("#rc-adults_"+k).attr("id","rc-adults_"+newk);
	jQuery("#rc-adults_more_"+k).attr("id","rc-adults_more_"+newk);
	jQuery("#rc-children_less_"+k).attr("id","rc-children_less_"+newk);
	jQuery("#rc-children_span_"+k).attr("id","rc-children_span_"+newk);
	jQuery("#rc-children_"+k).attr("id","rc-children_"+newk);
	jQuery("#rc-children_more_"+k).attr("id","rc-children_more_"+newk);

	
}

/******************			GUEST BUTTONS + -			****************/



jQuery(document).on('click','.box-btn-round', function() {

	

	
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
		
	drop_y=jQuery("#rc-travelers_group").offset().top;

    if (openDropdownsOnTop){
		jQuery("#rc-traveler_details").css('top', drop_y - jQuery("#rc-traveler_details").outerHeight()-1);
	} 		
	    
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
			
			name="ages_";
			child_trg=btn_target_room;

				
			html+='<div class="rc-text-center inline-block div-room-ages-quantity">';
			
				html+='<span class="box-btn-round btn-less disabled_btn" id="rc-age_room_'+btn_target_room+'_child_'+index+'_less">-</span>';
				html+='<div class="form-search-div inline-block">';
					html+='<span id="rc-age_span_room_'+btn_target_room+'_child_'+index+'"  class="src-span">0</span>';

					html+='<input type="hidden" id="rc-age_room_'+btn_target_room+'_child_'+index+'" name="'+name+child_trg+'" value="0"/>';
				html+='</div>';
				html+='<span class="box-btn-round btn-plus" id="rc-age_room_'+btn_target_room+'_child_'+index+'_more" >+</span>';
				
			html+='</div>';		
								
				
		

	html+='</div>';

	
	
	jQuery("#rc-room_"+btn_target_room+"_children_append_container").append(html);
}

jQuery("#rc-hotel_search").click(function(){
	
	jQuery("#rc-hotel").show();
	
});




});
