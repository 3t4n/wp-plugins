<?php
add_action('init', 'ppcode_register_shortcodes');
function ppcode_register_shortcodes() {
    //register shortcode
    add_shortcode('pp-code-vacation', 'ppcde_shortcode');
}

// The shortcode
function ppcde_shortcode($atts) {
	extract(shortcode_atts(array(
		"label_types" 		=> __('Address:') ,
		"label_submit" 		=> __('Submit') ,
	), $atts));
    $obje=new ppcde_plugin_admin();
    $data=$obje->regestered_locations();
    $select='<select name="address" id="addressid" onchange="showpoolhead();" class="form-control" >';
    $select.='<option value="select">Select Address</option>';
         foreach($data as $d)
         {            
            $select.='<option value="'.$d['lc_id'].'" data-nightr="'.$d['nightr'].'" data-weekr="'.$d['weekr'].'" data-monthr="'.$d['monthr'].'" data-start1="'.$d['start1'].'" data-end1="'.$d['end1'].'" data-night1="'.$d['night1'].'" data-week1="'.$d['week1'].'" data-month1="'.$d['month1'].'"
            data-start2="'.$d['start2'].'" data-end2="'.$d['end2'].'" data-night2="'.$d['night2'].'" data-week2="'.$d['week2'].'" data-month2="'.$d['month2'].'"
            data-start3="'.$d['start3'].'" data-end3="'.$d['end3'].'" data-night3="'.$d['night3'].'" data-week3="'.$d['week3'].'" data-month3="'.$d['month3'].'"
            data-saltax="'.$d['saltax'].'" data-toutax="'.$d['toutax'].'" data-othertax="'.$d['othertax'].'" data-poolheatd="'.$d['poolheatd'].'" data-poolheatw="'.$d['poolheatw'].'" data-poolheatm="'.$d['poolheatm'].'"
            data-parkf="'.$d['parkf'].'" data-parkrate="'.$d['parkrate'].'" data-othf="'.$d['othf'].'" data-othrate="'.$d['othrate'].'" data-wifif="'.$d['wifif'].'"
            data-wifirate="'.$d['wifirate'].'" data-clnf="'.$d['clnf'].'" data-clndys="'.$d['clndys'].'" data-discount="'.$d['discount'].'" data-disrate="'.$d['disrate'].'"
            data-damgp="'.$d['damgp'].'" data-curr="'.$d['curr'].'" >'.$d['address'].'</option>';
         } $select.='</select>';
    	$displayform='<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-7 col-xs-12" id="main1" style="background-color:#D4CFAC; padding-bottom: 15px">
					<form id="order" method="">			
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 15px;">
								'.$select.'</div>
						</div>
                        <div class="row">
							<label class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 20px">
                            <b>Check In Date: </b>
							</label>
							<label class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 20px">
                            <b>Check Out Date: </b>
							</label>
						</div>
                        <div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 15px;">
								<input class="form-control" type="text" name="startdate" id="startdate" placeholder="mm/dd/yyyy">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 15px;">
								<input class="form-control" type="text" name="enddate" id="enddate" placeholder="mm/dd/yyyy">
							</div>
						</div>
						<div class="calBlue_line">
						</div>
                        
                        <div class="row">
							<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:20px;" id="poolheatdiv">
                            <input type="checkbox" name="poolhincl" id="poolhincl" value="1">
							<b>Include Pool Heat </b>
							</label>
						</div>
						<div class="form-group">
							<div class="col-xs-12" style="text-align: center;padding-top: 15px; margin-bottom: 15px">
                            <button type="button" id="searchlc"  onclick="calculatefee();"class="btn btn-success">Calculate</button>
							</div>
                             <div id="hiddendata" >
                            </div>
						</div>
						<div class="table-float" style="text-align: center; margin-top: 10px; float: none">
							<div id="po" style="display: inline-block; text-align: left">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
<div class="clear"></div>
<div style="padding-top: 15px;">
    <div id="map_canvas" class="map" style="height:400px;"></div></div>';
return $displayform;
} 
?>
