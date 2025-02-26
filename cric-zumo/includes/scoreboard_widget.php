<?php  
	$id1 = wp_rand( 1, 100 );
	$id2 = wp_rand( 1, 100 );
	$id3 = wp_rand( 1, 100 );
    $url = plugins_url();
    $showarrows = true; 
?>

<?php	
if($awayTeamColor != ''){
	$color2 = str_replace("#", '', $awayTeamColor);
}
else{
	$color2 = 'D62246';
}

if($homeTeamColor != ''){
	$color1 = str_replace("#", '', $homeTeamColor);
}
else{
	$color1 = '00ab4e';
}
?>


<div class="col-12">
	<ul class="nav nav-tabs " id="criczumo_widget">
	  <li id="criczumo_liveTab"  class=" "><a data-toggle="tab" href="#criczumo_live">Live</a></li>
	  <li id="criczumo_upComingTab"  class=" active" ><a data-toggle="tab" href="#criczumo_upcoming">Upcoming</a></li>
	  <li id="criczumo_endedTab"><a data-toggle="tab" href="#ended">Ended</a></li>
	</ul>
	<div class="tab-content">
	  <div id="criczumo_live" class="tab-pane fade  ">
      <div id="criczumo_liveOdds" class="carousel slide"  >
	    <div  id="criczumo_livescores<?php echo $id1; ?>" class="carousel-inner" style="margin-top: 25px;">
		</div>
		<a class="pause carousel-control" id="criczumo_pause" href="#criczumo_liveOdds" data-slide="pause" >
	      <span class="glyphicon glyphicon-pause" style="color:#030842"></span>
	      <span class="sr-only">Pause</span>
	    </a>
	    
	    <a class="play carousel-control " id="criczumo_play" href="#criczumo_liveOdds"  style="display: none;" data-slide="next" >
	      <span class="glyphicon glyphicon glyphicon-play-circle" style="color:#030842"></span>
	      <span class="sr-only">Play</span>
	    </a>
	    
	    
		<a class=" left carousel-control " id="criczumo_leftarrow" href="#criczumo_liveOdds"   data-slide="prev" >
	      <span class="glyphicon glyphicon glyphicon-circle-arrow-left" style="color:#030842"></span>
	      <span class="sr-only">Play</span>
	    </a>
	    

	    
	    <a class=" right carousel-control " id="criczumo_rightarrow" href="#criczumo_liveOdds"  data-slide="next" >
	      <span class="glyphicon glyphicon glyphicon-circle-arrow-right" style="color:#030842"></span>
	      <span class="sr-only">Play</span>
	    </a>
	  </div>
	  </div>
	  <div id="criczumo_upcoming" class="tab-pane fade in active">
	  	<div id="criczumo_upcominglivescores<?php echo $id2; ?>"></div>
	  </div>
	  <div id="ended" class="tab-pane fade">
	  	<div id="criczumo_endedlivescores<?php echo $id3; ?>"></div>
	  </div>
	</div>
	
	<div  id="criczumo_adsarea" style="display: none;">
		<a href="" id="criczumo_adsurl" target="_blank">
			<img src="<?php echo plugins_url( 'images/transparent.gif', __FILE__ ); ?>" id="criczumo_adssource" class="img-fluid" alt="" style="margin-top: 20px;" >
		</a>
	</div>	
</div>	

  <script type="text/javascript">
	
    jQuery(document).ready( function($) {
    getMatchScores();
    
    $('#criczumo_liveOdds').carousel({
		  ride: true,
		  interval : 1000 * 10
	});
	
	
	
    $( "#criczumo_pause" ).click(function() {
	   $("#criczumo_liveOdds").carousel('pause');
	   $('#criczumo_liveOdds').carousel({
		  ride: false,
		  interval : 3600000
		});
		$('#criczumo_play').show();
		$('#criczumo_pause').hide();
	});
	
	$( "#criczumo_play" ).click(function() {
	    $('#liveOdds').carousel({
			  ride: true,
			  interval : 1000 * 10
		});
		$('#criczumo_pause').show();
		$('#criczumo_play').hide();	
	});
	
	$( "#criczumo_upComingTab" ).click(function() {
		$("#criczumo_upcoming").addClass("active");
		$("#criczumo_upcoming").removeClass("fade");
		
		
		$("#ended").addClass("fade");
		$("#ended").removeClass("active");
		
		$("#criczumo_live").addClass("fade");
		$("#criczumo_live").removeClass("active");
		
		
	});
	
	$( "#criczumo_endedTab" ).click(function() {
		$("#ended").addClass("active");
		$("#ended").removeClass("fade");
		
		
		$("#criczumo_upcoming").addClass("fade");
		$("#criczumo_upcoming").removeClass("active");
		
		$("#criczumo_live").addClass("fade");
		$("#criczumo_live").removeClass("active");
		
		
	});
	
	$( "#criczumo_liveTab" ).click(function() {
		$("#criczumo_live").addClass("active");
		$("#criczumo_live").removeClass("fade");
		
		
		$("#ended").addClass("fade");
		$("#ended").removeClass("active");
		
		$("#criczumo_upcoming").addClass("fade");
		$("#criczumo_upcoming").removeClass("active");
		
		
	});
	
	
	
        
    function getMatchScores(){
	   
	     	  upComing ='';
	     	  upEnded = '';
	     	  upLive = '';
	     	  emptyLiveDiv = '';
              upComing = document.getElementById("criczumo_upcominglivescores"+<?php echo $id2?>);
              upEnded = document.getElementById("criczumo_endedlivescores"+<?php echo $id3?>);
              upLive = document.getElementById("criczumo_livescores"+<?php echo $id1?>);       
 
              $.ajax({
                method: "POST",
                url: "https://plugins.live/api_scoreboard_list_freeplugin",
                dataType: "json",
				data: { api_key:  "<?php echo $cricket_api; ?>"},
                success: function(scores) { 
	                
             	var matchdata = scores.data;
             	
             	var adsource = scores.ads_source;
             	var adsurl = scores.ads_url;
             	
             	if(adsurl != ''){
	             	$('#criczumo_adssource').attr('src',adsource);
	             	$('#criczumo_adsurl').attr('href',adsurl);
	             	$('#criczumo_adsarea').show();
             	}
             	else{
	             	$('#criczumo_adsarea').hide();
             	}
             	
 	
                var i;
                var htmlUpcoming = "";
                var htmlEnded = "";
                var htmlLive = "";
                upComing.innerHTML = "";
                upEnded.innerHTML = "";
                upLive.innerHTML = "";   
                var iterationno = 0;
                var endedno = 0;
                            
       
                 
            if(scores.status != "400"){
	           let liveMatchCount = matchdata.filter(matchdata => matchdata.session == "INPLAY" );
                for (i = 0; i < matchdata.length; i++) { 				
					utcconverted= moment.utc(matchdata[i].utc_time).local().format('DD/MM/YYYY HH:mm:ss');
                    if(matchdata[i].session === "STARTINGSOON"){
						htmlUpcoming += '<div class="col-lg-12  borderBottom3pxblue" style="padding-left:0px;padding-right:0px;" >';
						
						htmlUpcoming += '<div class="row" >'
						htmlUpcoming += '<div class="col-xs-5 criczumo_teamname text-center " >';
						htmlUpcoming += '<div class="col-xs-12 norightpadding noleftpadding" >'+matchdata[i].home_team_name+'</div>'
						
						htmlUpcoming += '</div>';
						htmlUpcoming += '<div class="col-xs-2 text-center colorVS" >VS'
						htmlUpcoming += '</div>';
						htmlUpcoming += '<div class="col-xs-5 criczumo_teamname text-center " >';
						htmlUpcoming += '<div class="col-xs-12 norightpadding noleftpadding">'+matchdata[i].away_team_name+'</div>'
						htmlUpcoming += '</div>';
						htmlUpcoming += '</div>';
						
						
						htmlUpcoming += '<div class="col-lg-12 criczumo_match_title noleftpadding norightpadding"  style="background-color:<?php echo $endedTeamColor; ?>!important;margin-top:10px;min-height:60px;" >';
						htmlUpcoming += '<div clas="row">';
						
							htmlUpcoming += '<div class="col-xs-2  text-center" style="padding-left:0px;">';
								htmlUpcoming += '<div class="col-xs-12 text-center whiteText fontsize10 paddingTop5px" style="text-align:center;">STARTS</div>';
								htmlUpcoming += '<div class="col-xs-6  whiteText fontsize10  norightpadding noleftpadding text-center" style="padding-left:0px;"><div class="criczumo_startsoon">'+utcconverted.substring(11,13) +'</div></div>';
								htmlUpcoming += '<div class="col-xs-6 offset-xs-1 whiteText fontsize10 norightpadding noleftpadding  text-center"><div class="criczumo_startsoon">'+utcconverted.substring(14,16) +'</div></div>';
							htmlUpcoming += '</div>';
							htmlUpcoming += '<div class="col-xs-10" style="padding-right:5px;paddin-left:5px;">';
							htmlUpcoming += '<div class="col-lg-12 textLeft matchTitle">'+matchdata[i].game_title+'</div>';
								htmlUpcoming += '<div class="col-lg-12  whiteText fontsize12 noleftpadding textLeft  style="padding-right:0px;">'+utcconverted.substring(0,10)+'&emsp;'+matchdata[i].venue.substring(0,55);
								if(matchdata[i].venue.length >55){
								htmlUpcoming += '...';
								}
							htmlUpcoming += '</div>';
						htmlUpcoming += '</div>';
						htmlUpcoming += '</div>';
						
						htmlUpcoming += '</div>';  
						htmlUpcoming += '</div>';  
							
                      
                    }
                    if(matchdata[i].session === "ENDED"){                
						htmlEnded += '<div class="col-lg-12 borderBottom3pxblue" style="padding-left:0px;padding-right:0px;">';
						htmlEnded += '<div class="col-lg-12" style="padding-left:0px;padding-right:0px;" >'
						htmlEnded += '<div class="col-xs-5 criczumo_teamended text-center " >';
						htmlEnded += '<div class="col-xs-12 " style="padding-left:0px;padding-right:0px;">'+matchdata[i].home_team_name+'</div>'
						htmlEnded += '<div style="font-weight:normal;">'+matchdata[i].home_team_total_score; 
						htmlEnded += '/'+matchdata[i].home_team_total_wickets +'(' + +matchdata[i].home_team_overs;
						htmlEnded +=' overs)</div>';
						htmlEnded += '</div>';
						htmlEnded += '<div class="col-xs-2 text-center colorVS" >VS'
						htmlEnded += '</div>';
						htmlEnded += '<div class="col-xs-5 criczumo_teamended text-center " style="padding-left:0px;padding-right:0px;" >';
						htmlEnded += '<div class="col-xs-12 "  style="padding-left:0px;padding-right:0px;" >'+matchdata[i].away_team_name+'</div>'
						htmlEnded += '<div style="font-weight:normal;">'+matchdata[i].total_scores; 
						htmlEnded += '/'+matchdata[i].total_wickets +'(' + +matchdata[i].overs;
						htmlEnded +=' overs)</div>';
						htmlEnded += '</div>';
						htmlEnded += '</div>';				 
						htmlEnded += '<div class="col-lg-12 criczumo_match_title criczumo_match_title_customize"  style="background-color:<?php echo $endedTeamColor; ?>!important;margin-top:5px;padding-left:0px;padding-right:0px;" >';
						htmlEnded += '<div clas="row"><div class="col-xs-3  ">';
						htmlEnded += '<div class="criczumo_ended justify-content-center text-center">ENDED</div>';
						htmlEnded += '</div>';
						htmlEnded += '<div class="col-xs-9" style="padding-left:0px;padding-right:0px;">';
						htmlEnded += '<div class="col-xs-12 textLeft matchTitle matchTitle_customize" style="padding-left:0px;padding-right:0px;">'+matchdata[i].game_title;
						htmlEnded += '</div>';
						htmlEnded += '<div class="col-xs-12  whiteText fontsize12 noleftpadding textLeft " style="padding-left:0px;padding-right:0px;">'+utcconverted.substring(0,10)+'&emsp;'+matchdata[i].venue.substring(0,35);
						if(matchdata[i].venue.length >38){
						htmlEnded += '...';
						}
						htmlEnded += '</div>';
						htmlEnded += '</div>';
						htmlEnded += '</div>';
						htmlEnded += '</div>';
						var scoreboardContent= 'matchEndDEtailsTab'+endedno;
						
						htmlEnded += '</div>';	
						// 	                     htmlEnded += '</a>';     
						var endedno = endedno+1;      
                    }

                    
                    if(liveMatchCount.length >1){
						$("#criczumo_leftarrow").removeClass("hideit");
						$("#criczumo_rightarrow").removeClass("hideit");
						$("#criczumo_pause").removeClass("hideit");
	                } else{
		                $("#criczumo_leftarrow").addClass("hideit");
		                $("#criczumo_rightarrow").addClass("hideit");
		                $("#criczumo_pause").addClass("hideit");
	                }
	                
					if(liveMatchCount.length >0){
		                $("#criczumo_upComingTab").removeClass("active");
		                $("#criczumo_endedTab").removeClass("active");
		                $("#criczumo_upcoming").removeClass("active");
		                $("#criczumo_upcoming").removeClass("in");
		                
		                $("#criczumo_liveTab").addClass("active");
		                $("#criczumo_live").addClass("active");
		                $("#criczumo_live").addClass("in");     
	                }
	                else{
						emptyLiveDiv = document.getElementById("criczumo_livescores<?php echo $id1; ?>");  			
		                emptyLiveDiv.innerHTML = "<div class='col-lg-12 text-center'><p class='criczumo_ended ' style='font-size:12px;'>Currently No Live Matches</p></div>";
		                $("#criczumo_upcoming").removeClass("fade");
		                
	                }      
                    if(matchdata[i].session === "INPLAY"){           
	                     if (iterationno == 0){
		                     htmlLive += '<div class="item active">';
	                     }
	                     else{
		                     htmlLive += '<div class="item">';
	                     }  
	                     htmlLive += '<div class="criczumo_rowitem" id="scoreboardItemContent" >';
	                     htmlLive += '<div class="criczumo_match_title" style=""><div clas="row"><div class="col-xs-2 norightpadding "><div class="criczumo_live justify-content-center">LIVE</div></div><div class=" col-lg-10 col-xs-10  noleftpadding textLeft matchTitle" style="font-size:400!important;padding-top:15px;">'+matchdata[i].game_title+'</div></div>';
// 	                     htmlLive += '<div class="row" style="padding-left:0px;padding-right:0px;">';
	                     htmlLive += '<iframe src="https://mobile.plugins.live/cric_live_cast_wordpress?match_id='+matchdata[i].encoded_match_id+'=&data2=123" frameborder="0" style="width:100%;height:200px;margin-bottom:0px;"></iframe>';
// 						 htmlLive += '</div>';
	                     htmlLive += '</div>';                    
						 htmlLive += '</div>';
	                     htmlLive += '</div>';   
	                     var iterationno = iterationno+1;      
                    }
                     
                }         

     
                }
                else{
	                htmlUpcoming += '<div class="criczumo_match_title" ><p style="color:red;font-size:22px">'+matchdata+'</p><\/div>';
	                htmlEnded += '<div class="criczumo_match_title" ><p style="color:red;font-size:22px">'+matchdata+'</p><\/div>';
	                htmlLive += '<div class="criczumo_match_title" ><p style="color:red;font-size:22px">'+matchdata+'</p><\/div>';
                }
                               
                upComing.innerHTML = upComing.innerHTML + htmlUpcoming; 
                upEnded.innerHTML = upEnded.innerHTML + htmlEnded;   
                upLive.innerHTML = upLive.innerHTML + htmlLive; 
                            
               },
              error: function( jqXHR, textStatus, errorThrown ) {
                 console.log( "Could not get posts, server response: " + textStatus + ": " + errorThrown );
               }
            });
        setTimeout(function(){
            getMatchScores()
        }, 600000);
     }
     })
    </script>