<?php
if(!class_exists('colorPicker')){
	class colorPicker{
		function colorPicker(){
			
		}
		
		function output_picker($default_color = '0033ff'){
			static $gg = 0;
			$picker = '';
			$picker .= "<div id=\"grand_cp_".$gg."\" class=\"grand_cp\">";//invisible div
			$picker .= "<div style=\"background-color:#".$default_color.";\" class=\"color_box_cp\" onclick=\"drop_activate('color_div_cp_".$gg."','grand_cp_".$gg."','".$gg."');\" id=\"color_box_cp_".$gg."\" onmouseover=\"this.style.cursor = 'default';\">";//smaller inner div
			#$picker .= "&nbsp;";
			$picker .= "</div>";//end smaller inner div
			$picker .= "<div class=\"overall_div_cp\" id=\"overall_div_cp_".$gg."\">";//overall container div
			$picker .= "<div class=\"top_container_div_cp\">";//top container div
			$picker .= "<div class=\"left\">";//first float left
			$picker .= "<div style=\"background-color:#".$default_color.";\" class=\"color_div_cp\" onclick=\"drop_activate('color_div_cp_".$gg."','overall_div_cp_".$gg."','".$gg."');\" id=\"color_div_cp_".$gg."\">";//larger outer div
			$picker .= "&nbsp;";
			$picker .= "</div>";//end larger outer div
			$picker .= "</div>";//end first float left
			$picker .= "<div class=\"left\">";//second float left
			$picker .= "<div class=\"second_inside_cp\">";//inside 2nd float
			$picker .= "<input type=\"text\" name=\"chosen_color_cp_".$gg."\" class=\"chosen_color_cp\" id=\"chosen_color_cp_".$gg."\" value=\"#".$default_color."\" onblur=\"color_choice(this.value.replace(/\#/g,''),'color_div_cp_".$gg."','overall_div_cp_".$gg."','".$gg."')\" />";
			$picker .= "</div>";//end inside 2nd float
			$picker .= "</div>";//end second float left
			$picker .= "<div class=\"left show_rollover_cp\" id=\"show_rollover_cp_".$gg."\">";
			$picker .= "&nbsp;";
			$picker .= "</div>";
			$picker .= "<div class=\"clr\"></div>";//formatting div
			$picker .= "</div>";//end top container div
			$picker .= "<div class=\"bottom_container_div_cp\">";//bottom container div
			$picker .= "<div class=\"left\">";//bottom 1st float left
			$picker .= "<div class=\"first_inside_bottom_cp\">";//inside 1st float bottom
			$picker .= "<div class=\"single_stripe\">";//holding single stripe
			//loop
			for($i=1;$i<=12;$i++)
			{
				$picker .= "<div class=\"single_column\" style=\"background-color:";
				$picker .= "#".$this->single_column($i).";";
				$picker .= "\"";
				$picker .= " onmouseover=\"this.style.cursor = 'default';color_roll(1,'".$this->single_column($i)."','".$gg."');\"";
				$picker .= " onmouseout=\"this.style.cursor = 'default';color_roll(0,'".$this->single_column($i)."','".$gg."');\"";
				$picker .= " onclick=\"color_choice('".$this->single_column($i)."','color_div_cp_".$gg."','overall_div_cp_".$gg."', '".$gg."');\"";
				$picker .= ">";//single stripe loop
				$picker .= "&nbsp;";
				$picker .= "</div>";//end single stripe loop
			}
			//end loop
			$picker .= "</div>";//end holding single stripe
			$picker .= "</div>";//end inside 1st float bottom
			$picker .= "</div>";//end bottom 1st float left
			$picker .= "<div class=\"left\">";//bottom 2nd float left
			$picker .= "<div class=\"second_inside_bottom_cp\">";//inside 2nd float bottom
			$picker .= "<div class=\"multi_stripe\">";//holding multi stripe

			$j=1;
			//loop
			for($jjj=1;$jjj<=6;$jjj++)
			{
				$picker .= "<div class=\"left div_multi_column\">";
				for($i=1;$i<=36;$i++)
				{
					if($i%6==0)
					{
						$picker .= "<div>";
					}
					if($i==1 || $i==7 || $i==13 || $i==19 || $i==25 || $i==31)
					{
						$jj=1;
					}
					$picker .= "<div class=\"left multi_column\" style=\"";
					$picker .= "background-color:#".$this->first_set($j).$this->second_set($jj).$this->third_set($i).";";
					$picker .= "\"";
					$picker .= " onmouseover=\"this.style.cursor = 'default';color_roll(1,'".$this->first_set($j).$this->second_set($jj).$this->third_set($i)."','".$gg."');\"";
					$picker .= " onmouseout=\"this.style.cursor = 'default';color_roll(0,'".$this->first_set($j).$this->second_set($jj).$this->third_set($i)."','".$gg."');\"";
					$picker .= " onclick=\"color_choice('".$this->first_set($j).$this->second_set($jj).$this->third_set($i)."','color_div_cp_".$gg."','overall_div_cp_".$gg."','".$gg."');\"";
					$picker .= ">";//mutli stripe loop
					$picker .= "&nbsp;";
					$picker .= "</div>";//end multi stripe loop
					if($i%6==0)
					{
						$picker .= "<div class=\"clr\"></div>";//formatting div
						$picker .= "</div>";
					}
					$j++;
					$jj++;
				}
				//end loop
				$picker .= "</div>";
			}
			//end loop
			$picker .= "</div>";//end holding multi stripe
			$picker .= "</div>";//end inside 2nd float bottom
			$picker .= "</div>";//end bottom 2nd float left
			$picker .= "<div class=\"clr\"></div>";//formatting div
			$picker .= "</div>";//end bottom container div
			$picker .= "</div>";//end overall container div
			$picker .= "</div>";//end invisible div
			$gg++;
			return $picker;
		}

		function first_set($box_number)
		{	
			if($box_number<=36)
			{
				$color_number = '00';
			}
			elseif($box_number<=72)
			{
				$color_number = '33';
			}
			elseif($box_number<=108)
			{
				$color_number = '66';
			}
			elseif($box_number<=144)
			{
				$color_number = '99';
			}
			elseif($box_number<=180)
			{
				$color_number = 'CC';
			}
			elseif($box_number<=216)
			{
				$color_number = 'FF';
			}
			return $color_number;
		}

		function second_set($box_number)
		{
			if($box_number==6)
			{
				$color_number = 'FF';
			}
			elseif($box_number==5)
			{
				$color_number = 'CC';
			}
			elseif($box_number==4)
			{
				$color_number = '99';
			}
			elseif($box_number==3)
			{
				$color_number = '66';
			}
			elseif($box_number==2)
			{
				$color_number = '33';
			}
			elseif($box_number==1)
			{
				$color_number = '00';
			}
			/*
			else
			{
				$color_number = 'gg';
			}
			*/
			return $color_number;
		}

		function third_set($box_number)
		{
			if($box_number%6<=6 && $box_number<=6)
			{
				$color_number = '00';
			}
			elseif($box_number%6<=6 && $box_number<=12)
			{
				$color_number = '33';
			}
			elseif($box_number%6<=6 && $box_number<=18)
			{
				$color_number = '66';
			}
			elseif($box_number%6<=6 && $box_number<=24)
			{
				$color_number = '99';
			}
			elseif($box_number%6<=6 && $box_number<=30)
			{
				$color_number = 'CC';
			}
			elseif($box_number%6<=6 && $box_number<=36)
			{
				$color_number = 'FF';
			}
			return $color_number;
		}

		function single_column($box_number)
		{
			if($box_number==1)
			{
				$color_number = '000000';
			}
			elseif($box_number==2)
			{
				$color_number = '333333';
			}
			elseif($box_number==3)
			{
				$color_number = '666666';
			}
			elseif($box_number==4)
			{
				$color_number = '999999';
			}
			elseif($box_number==5)
			{
				$color_number = 'CCCCCC';
			}
			elseif($box_number==6)
			{
				$color_number = 'FFFFFF';
			}
			elseif($box_number==7)
			{
				$color_number = 'FF0000';
			}
			elseif($box_number==8)
			{
				$color_number = '00FF00';
			}
			elseif($box_number==9)
			{
				$color_number = '0000FF';
			}
			elseif($box_number==10)
			{
				$color_number = 'FFFF00';
			}
			elseif($box_number==11)
			{
				$color_number = '00FFFF';
			}
			elseif($box_number==12)
			{
				$color_number = 'FF00FF';
			}
			return $color_number;
		}
	}
}
?>