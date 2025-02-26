<div class="wrap">
    <?php    echo "<h2>" . __( 'Live Scores - Settings', 'oscimp_trdom' ) . "</h2>"; ?>
     
 <p><font size="4">Other Plugins by LSW: <a href="http://livescores.website/ls-go-sports-news-plugin" target="_blank">Sports News Widget</a> | <a href="http://livescores.website/ls-go-league-table-standings" target="_blank">League Table Standings</a></font></p>
 <br />
 <p><small>NOTE: More languages & interface colors will be available shortly. ( Probably until the end of December / 2015 )</small></p>
 <br />
<h2>Short Code Generator - More languages are added every week!</h2><p>
<body>
<form id="example" name="example">
    <p style="display:inline">Select a language :</p>
        <select id="language">
        <option value="1">English</option>
        <option value="2">Français</option>
        <option value="3">Italian</option>
        <option value="4">Spanish</option>

    </select>
    <p style="display: inline;margin-left: 30px;">Select a sport :</p>
    <select id="sports">
        <option value="0">Soccer</option>
        <option value="1">Basketball</option>
        <option value="2">Hockey</option>
        <option value="3">Handball</option>
        <option value="4">Volleyball</option>
        <option value="5">Tennis</option>
        <option value="6">American Football</option>
    </select>

    <br />
    <p style="display: inline">Shortcode <small>(Copy and paste it where you want to display the live scores)</small>:</p>
    <input type="text" value="[soccerblue]" id="sensorText" />
</form>

<script type="text/javascript">
    jQuery(document).ready(function(){
        var shortcodes=[];
        for(var i=0;i<5;i++)
        {
            shortcodes[i]=[];
        }
        shortcodes[1][0]="[soccerblue]";
        shortcodes[1][1]="[basketballblue]";
        shortcodes[1][2]="[hockeyblue]";
        shortcodes[1][3]="[handballblue]";
        shortcodes[1][4]="[volleyballblue]";
        shortcodes[1][5]="[tennisblue]";
        shortcodes[1][6]="[americanfootballblue]";
        shortcodes[2][0]="[footballbluefr]";
        shortcodes[2][1]="[basketballbluefr]";
        shortcodes[2][2]="[hockeybluefr]";
        shortcodes[2][3]="[handballbluefr]";
        shortcodes[2][4]="[volleyballbluefr]";
        shortcodes[2][5]="[tennisbluefr]";
        shortcodes[2][6]="[americanfootballbluefr]";
        shortcodes[3][0]="[calcioit]";
        shortcodes[3][1]="[basketballit]";
        shortcodes[3][2]="[hockeyit]";
        shortcodes[3][3]="[tennisit]";
        shortcodes[3][4]="[pallamanoit]";
        shortcodes[3][5]="[pallavoloit]";
        shortcodes[3][6]="[footballit]";
        shortcodes[4][0]="[futboles]";
        shortcodes[4][1]="[baloncestoes]";
        shortcodes[4][2]="[hockeyes]";
        shortcodes[4][3]="[balonmanoes]";
        shortcodes[4][4]="[voleiboles]";
        shortcodes[4][5]="[tenises]";
        shortcodes[4][6]="[futbolamericanes]";
        var sports=[];
        for(var k=0;k<5;k++)
        {
            sports[k]=[];
        }

        sports[1][0]="Soccer";
        sports[1][1]="Basketball";
        sports[1][2]="Hockey";
        sports[1][3]="Handball";
        sports[1][4]="Volleyball";
        sports[1][5]="Tennis";
        sports[1][6]="American Football";
        sports[2][0]="Football";
        sports[2][1]="Basketball";
        sports[2][2]="Hockey";
        sports[2][3]="Handball";
        sports[2][4]="Volleyball";
        sports[2][5]="Tennis";
        sports[2][6]="Football Americain";
        sports[3][0]="Calcio";
        sports[3][1]="Basketball";
        sports[3][2]="Hockey";
        sports[3][3]="Tennis";
        sports[3][4]="Pallamano";
        sports[3][5]="Pallavolo";
        sports[3][6]="Football American";
        sports[4][0]="Futbol";
        sports[4][1]="Baloncesto";
        sports[4][2]="Hockey";
        sports[4][3]="Balonmano";
        sports[4][4]="Voleibol";
        sports[4][5]="Tenis";
        sports[4][6]="Futbol American";
        var index_language;
        var index_sport;
        jQuery('#language').on('change',function(){
            index_language= jQuery('#language').val();
                jQuery("#sports option").each(function(index){
                    jQuery(this).text(sports[index_language][index]);
                })
             index_sport=jQuery('#sports').val();
              jQuery('#sensorText').val(shortcodes[index_language][index_sport]);
            });
        jQuery('#sports').on('change',function(){
           index_language=jQuery('#language').val();
            index_sport=jQuery('#sports').val();
            jQuery('#sensorText').val(shortcodes[index_language][index_sport]);
        })
        });

</script>
</body></p>
<br /><hr />
<br />
<center>Please <a href="http://livescores.website/contact-us/" target="_blank">contact us</a> to report bugs, suggest new features or give us a suggestion.</center>
<hr />

<h3>Support our plugin - Help us keep it free!</h3>
    <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-11">
            <label style="width: 100%;">

                <input type="checkbox" onclick="wls_click_credit_link();" id="wls_author_linking" <?php echo WLS_Main::$settings['wls_author_linking'] == 1? 'checked':'';?>>
                Activate Author Credit Link.
            </label>
        </div>
    </div>
<p>Thank you for using our free Live Scores plugin.</p>
</div>

