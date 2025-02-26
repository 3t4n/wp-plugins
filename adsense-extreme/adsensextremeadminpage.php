<?php
if(isset($_POST['adsensextreme']['lang']))
{
   if($_POST['adsensextreme']['lang'] == 'it')
   {
      include_once('it.php');
   }
   else if($_POST['adsensextreme']['lang'] == 'es')
   {
      include_once('es.php');
   }
   else
   {
      include_once('en.php');
   }
}
else
{
   include_once($this->opts['lang'] . '.php');
}
$lbsizes = array();
$lbsizes[] = array('desc' => '728 x 15', 'text' => '728x15');
$lbsizes[] = array('desc' => '468 x 15', 'text' => '468x15');
$lbsizes[] = array('desc' => '200 x 90', 'text' => '200x90');
$lbsizes[] = array('desc' => '180 x 90', 'text' => '180x90');
$lbsizes[] = array('desc' => '160 x 90', 'text' => '160x90');
$lbsizes[] = array('desc' => '120 x 90', 'text' => '120x90');
if(isset($_POST["adsensextreme_update"]))
{
   $this->opts = $this->ripulisci_parametri($_POST['adsensextreme'], $sizes, $lbsizes);
   $this->save_opts();
   echo '<div id="message" class="updated fade"><p><strong>Options Updated!</strong></p></div>';
}
$this->opts['is_only_tagged'] = $this->opts['only_tagged'] ? "checked" : "";
$this->opts['is_omit_page'] = $this->opts['omit_page'] ? "checked" : "";
$this->opts['is_policy_protect'] = $this->opts['policy_protect'] ? "checked" : "";
$this->opts['is_omit_home'] = $this->opts['omit_home'] ? "checked" : "";
$this->opts['is_omit_search'] = $this->opts['omit_search'] ? "checked" : "";
$this->opts['is_omit_category'] = $this->opts['omit_category'] ? "checked" : "";
$this->opts['is_omit_tag'] = $this->opts['omit_tag'] ? "checked" : "";
$this->opts['is_omit_date'] = $this->opts['omit_date'] ? "checked" : "";
$this->opts['is_omit_author'] = $this->opts['omit_author'] ? "checked" : "";
$this->opts['is_overrule'] = $this->opts['overrule'] ? "checked" : "";
?>

<script
  type="text/javascript"
  src="<?php echo(WP_PLUGIN_URL . '/' . $this->aeopt_menu);?>/jscolor/jscolor.js"></script>

<script type="text/javascript">
    function toggleInformativaPrivacy() {
      jQuery(".container").slideToggle("slow");
    }
    function toggleUsertype(val) {
      if (val=="") {jQuery(".pro").hide(10);jQuery(".link").hide(10);}
      if (val=="link") {jQuery(".pro").hide(10);jQuery(".link").show(10);}
      if (val=="pro") {jQuery(".pro").show(10);jQuery(".link").show(10);}
    }
    function toggleAdtype(val) {
      if (val=="link") {jQuery(".normal_ad").hide(10);jQuery(".lb_ad").show(10);}
      else {jQuery(".normal_ad").show(10);jQuery(".lb_ad").hide(10);}
    }
    function checkradio(feld){
      for (i=0; i < feld.length; i++){
        if(feld[i].checked == true){
          return feld[i].value;
        }
      }
    }
    </script>

<div class="wrap">
  <br>
  <div
    style="background-color: #F5F5F5; padding: 10px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; border-radius: 3px;">
    <a href="http://www.adsenseplugin.it/" target="_blank">
<?php
echo '<img src="' .plugins_url( 'adseb.jpg' , __FILE__ ). '" />';
?>
    </a>
    <p>
      <a
        href="http://www.adsenseplugin.it/support/"
        target="_blank"><h3>Adsense Extreme Support</h3> </a>
    </p>
    <form name="mainform" method="post"
      action="<?php echo $_SERVER["REQUEST_URI"];?>">
      <h2><?php echo $impostazioniGenerali;?></h2>
      <table>
        <tr>
          <td><?php echo $campoLingua;?></td>
          <td><select onchange="document.getElementById('ae_update').click();" name="adsensextreme[lang]" size="1">
              <option value="en"
<?php if($this->opts['lang'] == "en") echo(" selected");?>>English</option>
              <option value="es"
<?php if($this->opts['lang'] == "es") echo(" selected");?>>Espa&#241;ol</option>
              <option value="it"
<?php if($this->opts['lang'] == "it") echo(" selected");?>>Italiano</option>
          </select></td>
          <td><span class="ao_explain"><?php echo $campoLinguaDescr;?></span></td>
        </tr>
        <tr>
          <td>Adsense Publisher ID:</td>
          <td><input name="adsensextreme[gen_id]" type="text"
            value="<?php echo $this->opts['gen_id'];?>"></td>

          <td><span class="ao_explain"><?php echo $campoAdSenseIdDescr;?></span></td>
        </tr>
        <tr>
          <td>Adsense Channel</td>
          <td><input name="adsensextreme[gen_channel]" type="text"
            value="<?php echo $this->opts['gen_channel'];?>"></td>
          <td><span class="ao_explain"><?php echo $campoAdSenseChannelDescr;?></span>
          </td>
        </tr>
        <tr>
          <td><?php echo $campoProblema3Annuncio;?></td>
          <td><input type="checkbox" value="1" name="adsensextreme[overrule]"
<?php echo $this->opts['is_overrule'];?>>
          </td>
          <td><span class="ao_explain"><?php echo $campoProblema3AnnuncioDescr;?></span></td>
        </tr>
      </table>
      <br />
  </div>







  <p><?php echo $cheTipoDiUtenteSei;?></p>

  <input type="radio" id="usertypebasic" name="adsensextreme[usertype]"
    onchange="toggleUsertype('')" value=""
<?php if($this->opts['usertype'] == "") echo('checked');echo($utenteBase);?><br> <input
    type="radio" id="usertypepro" name="adsensextreme[usertype]"
    onchange="toggleUsertype('pro')" value="pro"
<?php if($this->opts['usertype'] == "pro") echo('checked');echo($utenteEsperto);?><br> <br>
  <div
    style="background-color: #D6D1FF; padding: 10px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; border-radius: 3px;">
    <h2><?php echo $configuraTuoiAnnunci;?></h2>

    <p><?php echo $puoiImpostareFino8DiversiTipiDiAnnuncio;?></p>







    <script type="text/javascript">

   function raiseEvent (eventType, elementID)

   {

       var o = document.getElementById(elementID);

       if (document.createEvent) {

           var evt = document.createEvent("Events");

           evt.initEvent(eventType, true, true);

           o.dispatchEvent(evt);

       }

       else if (document.createEventObject)

       {

           var evt = document.createEventObject();

           o.fireEvent('on' + eventType, evt);

       }

       o = null;

   }

</script>





<?php for($i = 1; $i <= 8; $i++){ ?>

    <br>

    <button style="display: inline"
      onclick="show_active('<?php echo $i; ?>'); return false;">
      Ad Type
<?php echo $i; ?>
    </button>

    <input type="text" name="adsensextreme[desc][<?php echo $i; ?>]"
      size="80" value="<?php echo($this->opts['desc'][$i]); ?>">

    <div id="ad<?php echo $i; ?>" class="adtype">

      <table width="100%" border="0" cellspacing="0" cellpadding="6">

        <tr valign="top">
          <td>Type: <select name="adsensextreme[type][<?php echo $i; ?>]"
            id="adtypeselect<?php echo $i; ?>"
            onchange="toggleAdtype(this.value)" size="1">

              <option value="text_image"
<?php if($this->opts['type'][$i] == "both") echo(" selected"); echo $TestoImmagini; ?></option>

              <option value="text"
<?php if($this->opts['type'][$i] == "text") echo(" selected"); echo $soloTesto; ?></option>

              <option value="image"
<?php if($this->opts['type'][$i] == "image") echo(" selected"); echo $soloImmagini; ?></option>

              <option value="link"
<?php if($this->opts['type'][$i] == "link") echo(" selected"); echo $blocchiDiLink; ?></option>

          </select> <br>



            <div class="normal_ad">
<?php echo $angoli; ?><select name="adsensextreme[corner][<?php echo $i; ?>]"
                size="1">

                <option value="rc:0"
<?php if($this->opts['corner'][$i] == "rc:0") echo(" selected"); echo $quadrati; ?></option>

                <option value="rc:6"
<?php if($this->opts['corner'][$i] == "rc:6") echo(" selected"); echo $arrotondati; ?></option>

                <option value="rc:10"
<?php if($this->opts['corner'][$i] == "rc:10") echo(" selected"); echo $moltoArrotondati; ?></option>

              </select>

            </div>



            <div class="lb_ad">

<?php echo $numeroDiLinks; ?> <select
                name="adsensextreme[links][<?php echo $i; ?>]" size="1">
                <option value="4"
<?php if($this->opts['links'][$i] == "4") echo(" selected"); ?>>4</option>

                <option value="5"
<?php if($this->opts['links'][$i] == "5") echo(" selected"); ?>>5</option>

              </select>

            </div>





            <div>
<?php echo $margineAttornoAnnuncio; ?><input
                name="adsensextreme[padding][<?php echo $i; ?>]" type="text"
                size="3" value="<?php echo $this->opts['padding'][$i]; ?>"><span
                class="ao_explain">px</span>

            </div>



            <div class="pro">

              <table>
                <tr>

                  <td>Adsense Publisher ID:</td>
                  <td><input name="adsensextreme[id][<?php echo $i; ?>]"
                    type="text" value="<?php echo $this->opts['id'][$i]; ?>">

                </tr>
                <tr>
                  <td></td>
                  <td><span class="ao_explain"><?php echo $soloSeDiversoDaImpostazioniGenerali; ?></span></td>
                </tr>



                <tr>
                  <td>Adsense Channel</td>
                  <td><input name="adsensextreme[channel][<?php echo $i; ?>]"
                    type="text" value="<?php echo $this->opts['channel'][$i]; ?>">

                </tr>
                <tr>
                  <td></td>
                  <td><span class="ao_explain"><?php echo $soloSeDiversoDaImpostazioniGenerali; ?></span></td>
                </tr>

              </table>

            </div>
          </td>
          <td><span class="ao_explain"><?php echo($cliccaQuiPerVedereEsempiBanner); ?></span>
          <br><?php echo('<div class="normal_ad">');
   foreach($sizes as $key => $size)
   {
      echo('<input type="radio" name="adsensextreme[sz][' . $i . ']" value="' . $size['text'] . '" ');
      if($this->opts['sz'][$i] == $size['text']) echo(' checked ');
      echo('> ' . $size['desc'] . '<br>');
   }

   echo('</div>');
   echo('<div class="lb_ad">');
   foreach($lbsizes as $key => $size)
   {
      echo('<input type="radio" name="adsensextreme[lbsz][' . $i . ']" value="' . $size['text'] . '" ');
      if($this->opts['lbsz'][$i] == $size['text']) echo(' checked ');
      echo('> ' . $size['desc'] . '<br>');
   }
   echo('</div>');
   if($this->opts['col_border'][$i] == "") $this->opts['col_border'][$i] = "336699";
   if($this->opts['col_link'][$i] == "") $this->opts['col_link'][$i] = "0000FF";
   if($this->opts['col_bg'][$i] == "") $this->opts['col_bg'][$i] = "FFFFFF";
   if($this->opts['col_text'][$i] == "") $this->opts['col_text'][$i] = "000000";
   if($this->opts['col_url'][$i] == "") $this->opts['col_url'][$i] = "008000";
?>

          </td>
          <td>Choose Colors:<br> Border: <input class="color"
            id="c_border<?php echo $i; ?>"
            name="adsensextreme[col_border][<?php echo $i; ?>]" size="6"
            value="<?php echo $this->opts['col_border'][$i]; ?>"><br> Link: <input
            class="color" id="c_link<?php echo $i; ?>"
            name="adsensextreme[col_link][<?php echo $i; ?>]" size="6"
            value="<?php echo $this->opts['col_link'][$i]; ?>"><br> Backgr.: <input
            class="color" id="c_bg<?php echo $i; ?>"
            name="adsensextreme[col_bg][<?php echo $i; ?>]" size="6"
            value="<?php echo $this->opts['col_bg'][$i]; ?>"><br>

            <div class="normal_ad">
              Text:<input class="color" id="c_text<?php echo $i; ?>"
                name="adsensextreme[col_text][<?php echo $i; ?>]" size="6"
                value="<?php echo $this->opts['col_text'][$i]; ?>"><br> URL: <input
                class="color" id="c_url<?php echo $i; ?>"
                name="adsensextreme[col_url][<?php echo $i; ?>]" size="6"
                value="<?php echo $this->opts['col_url'][$i]; ?>">
            </div>



            <hr>change to Palette<select
            onchange="document.getElementById('c_border<?php echo $i; ?>').value=this.value.substring(0,6);document.getElementById('c_link<?php echo $i; ?>').value=this.value.substring(6,12);document.getElementById('c_bg<?php echo $i; ?>').value=this.value.substring(12,18);document.getElementById('c_text<?php echo $i; ?>').value=this.value.substring(18,24);document.getElementById('c_url<?php echo $i; ?>').value=this.value.substring(24,30); raiseEvent('blur', 'c_border<?php echo $i; ?>');raiseEvent('blur', 'c_link<?php echo $i; ?>');raiseEvent('blur', 'c_bg<?php echo $i; ?>');raiseEvent('blur', 'c_text<?php echo $i; ?>');raiseEvent('blur', 'c_url<?php echo $i; ?>');"
            name="palette[<?php echo $i; ?>]" size="1">

              <option value="FFFFFF0000FFFFFFFF000000008000">Maritim</option>

              <option value="3366990000FFFFFFFF000000008000">Ocean</option>

              <option value="0000000000FFF0F0F0000000008000">Shadow</option>

              <option value="6699CCFFFFFF003366AECCEBAECCEB">Blue</option>

              <option value="000000FFFFFF000000CCCCCC999999">Tint</option>

              <option value="CCCCCC000000CCCCCC333333666666">Graphite</option>

          </select>




            <table class="normal_ad">
              <tr>
                <td><button
                    onclick="document.getElementById('<?php echo $i; ?>.iframe').src = 'https://securepubads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&adtest=on&format=160x70_as&color_border='+document.getElementsByName('adsensextreme[col_border][<?php echo $i; ?>]')[0].value+'&color_bg='+document.getElementsByName('adsensextreme[col_bg][<?php echo $i; ?>]')[0].value+'&color_link='+document.getElementsByName('adsensextreme[col_link][<?php echo $i; ?>]')[0].value+'&color_text='+document.getElementsByName('adsensextreme[col_text][<?php echo $i; ?>]')[0].value+'&color_url='+document.getElementsByName('adsensextreme[col_url][<?php echo $i; ?>]')[0].value+'&hl=en&url=www.google.com'; return false;">Refresh
                    Preview</button></td>
                <td><iframe name="0.iframe" id="<?php echo $i; ?>.iframe"
                    height="70" frameborder="0" width="160" scrolling="no"
                    src="https://securepubads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&adtest=on&format=160x70_as&color_border=<?php echo $this->opts['col_border'][$i]; ?>&color_bg=<?php echo $this->opts['col_bg'][$i]; ?>&color_link=<?php echo $this->opts['col_link'][$i]; ?>&color_text=<?php echo $this->opts['col_text'][$i]; ?>&color_url=<?php echo $this->opts['col_url'][$i]; ?>&hl=en&url=www.google.com"></iframe>
                </td>
              </tr>
            </table>


            <table class="lb_ad">
              <tr>
                <td><button
                    onclick="document.getElementById('lb<?php echo $i; ?>.iframe').src = 'http://googleads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&format=200x90_0ads_al&output=html&h=90&w=200&lmt=1270531704&channel=123456789&adtest=on&ea=0&color_bg='+document.getElementsByName('adsensextreme[col_bg][<?php echo $i; ?>]')[0].value+'&color_border='+document.getElementsByName('adsensextreme[col_border][<?php echo $i; ?>]')[0].value+'&color_link='+document.getElementsByName('adsensextreme[col_link][<?php echo $i; ?>]')[0].value; return false;">

                    Refresh Preview</button></td>
                <td><iframe name="lb0.iframe" id="lb<?php echo $i; ?>.iframe"
                    width="200" scrolling="no" height="90" frameborder="0"
                    allowtransparency="true" hspace="0" vspace="0"
                    marginheight="0" marginwidth="0"
                    src="http://googleads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&format=200x90_0ads_al&output=html&h=90&w=200&lmt=1270531704&channel=123456789&adtest=on&ea=0&color_bg=<?php echo($this->opts[col_bg][$i]); ?>&color_border=<?php echo($this->opts[col_border][$i]); ?>&color_link=<?php echo($this->opts[col_link][$i]); ?>"></iframe>
                </td>
              </tr>
            </table>
          </td>
        </tr>




<!--
        </td>
        </tr>
-->
      </table>

    </div>



<?php

}
?>



    <br> <br>
  </div>
<?php ?>





  <div
    style="background-color: #F0E878; padding: 10px; margin-top: 20px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; border-radius: 3px;">

    <h2><?php echo $doveMostrareGliAnnunci;?></h2>
    <p><?php echo $doveMostrareGliAnnunciDescr;?>
    </p>
    <br> <br>

    <h3><?php echo $postSingoliPagStatiche;?></h3>
    <p><?php echo $postSingoliPagStaticheDescr;?></p>

    <table>
      <tr>
        <th>Ad Nr.</th>
        <th>Ad Type</th>
        <th>Position</th>
        <th>Aligment</th>
      </tr>

<?php

for($i = 1; $i <= 5; $i++)
{
?>

      <tr>
        <td><?php echo $i; ?></td>

        <td><select name="adsensextreme[single][<?php echo $i; ?>]" size="1">

            <option value="0"
<?php if($this->opts['single'][$i] == "0") echo(" selected"); echo $nascondi; ?></option>
            <option value="1"
<?php if($this->opts['single'][$i] == "1") echo(" selected"); ?>>1</option>
            <option value="2"
<?php if($this->opts['single'][$i] == "2") echo(" selected"); ?>>2</option>
            <option value="3"
<?php if($this->opts['single'][$i] == "3") echo(" selected"); ?>>3</option>
            <option value="4"
<?php if($this->opts['single'][$i] == "4") echo(" selected"); ?>>4</option>
            <option value="5"
<?php if($this->opts['single'][$i] == "5") echo(" selected"); ?>>5</option>
            <option value="6"
<?php if($this->opts['single'][$i] == "6") echo(" selected"); ?>>6</option>
            <option value="7"
<?php if($this->opts['single'][$i] == "7") echo(" selected"); ?>>7</option>
            <option value="8"
<?php if($this->opts['single'][$i] == "8") echo(" selected"); ?>>8</option>

        </select>
        </td>
        <td><select name="adsensextreme[single_pos][<?php echo $i; ?>]"
          size="1">

<?php ?>>replace &lt;--adsenseopt--&gt; Tag
            </option> ?>

            <option value="Top"
<?php if($this->opts['single_pos'][$i] == "Top") echo(" selected"); echo $alto; ?></option>
            <option value="Middle"
<?php if($this->opts['single_pos'][$i] == "Middle") echo(" selected"); echo $mezzo; ?></option>
            <option value="Bottom"
<?php if($this->opts['single_pos'][$i] == "Bottom") echo(" selected"); echo $basso; ?></option>
            <option value="Random"
<?php if($this->opts['single_pos'][$i] == "Random") echo(" selected"); echo $caso; ?></option>

        </select>
        </td>
        <td><select name="adsensextreme[single_align][<?php echo $i; ?>]"
          size="1">

            <option value="center"
<?php if($this->opts['single_align'][$i] == "center") echo(" selected"); echo $centro; ?></option>
            <option value="right"
<?php if($this->opts['single_align'][$i] == "right") echo(" selected"); echo $destra; ?></option>
            <option value="left"
<?php if($this->opts['single_align'][$i] == "left") echo(" selected"); echo $sinistra; ?></option>
            <option value="random"
<?php if($this->opts['single_align'][$i] == "random") echo(" selected"); echo $caso; ?></option>

        </select>
        </td>
        <td><?php echo $mostraSoloSeArticoloPiuLungoDi; ?> <input
          name="adsensextreme[single_long][<?php echo $i; ?>]"
          value="<?php echo $this->opts['single_long'][$i]; ?>" size="3">
<?php echo $caratteri; ?></td>
      </tr>
      <tr>

<?php }?>

    </table>

    <span class="ao_explain"><?php echo $caratteriDescr;?></span>

    <div class="pro">

      <p>
        <input name="adsensextreme[only_tagged]" type="checkbox" value="1"
<?php echo $this->opts['is_only_tagged'] . $checkAdsenseopt;?>
      </p>



      <p>
        <input type="checkbox" value="1" name="adsensextreme[omit_page]"
<?php echo $this->opts['is_omit_page'] . $checkOmitPag?>
      </p>


    </div>



    <br> <br>

    <h3><?php echo $postMultipli;?></h3>

    <p><?php echo $nellePagineMostranoMoltiArticoli;?></p>

    <table>
      <tr>
<?php echo $intestazioniColonnePostMultipli;?>
      </tr>



<?php

for($i = 1; $i <= 8; $i++)
{
?>

      <tr>

        <td><?php echo $i; ?></td>

        <td><select name="adsensextreme[multi][<?php echo $i; ?>]" size="1">

            <option value="0"
<?php if($this->opts['multi'][$i] == "0") echo(" selected"); echo $nascondi; ?></option>

            <option value="1"
<?php if($this->opts['multi'][$i] == "1") echo(" selected"); ?>>1</option>

            <option value="2"
<?php if($this->opts['multi'][$i] == "2") echo(" selected"); ?>>2</option>

            <option value="3"
<?php if($this->opts['multi'][$i] == "3") echo(" selected"); ?>>3</option>

            <option value="4"
<?php if($this->opts['multi'][$i] == "4") echo(" selected"); ?>>4</option>

            <option value="5"
<?php if($this->opts['multi'][$i] == "5") echo(" selected"); ?>>5</option>

            <option value="6"
<?php if($this->opts['multi'][$i] == "6") echo(" selected"); ?>>6</option>

            <option value="7"
<?php if($this->opts['multi'][$i] == "7") echo(" selected"); ?>>7</option>

            <option value="8"
<?php if($this->opts['multi'][$i] == "8") echo(" selected"); ?>>8</option>

        </select>
        </td>



        <td><select name="adsensextreme[multi_pos][<?php echo $i; ?>]"
          size="1">

            <option value="1"
<?php if($this->opts['multi_pos'][$i] == "1") echo(" selected"); ?>>1st
              Post</option>

            <option value="2"
<?php if($this->opts['multi_pos'][$i] == "2") echo(" selected"); ?>>2nd
              Post</option>

            <option value="3"
<?php if($this->opts['multi_pos'][$i] == "3") echo(" selected"); ?>>3rd
              Post</option>

            <option value="4"
<?php if($this->opts['multi_pos'][$i] == "4") echo(" selected"); ?>>4th
              Post</option>

            <option value="5"
<?php if($this->opts['multi_pos'][$i] == "5") echo(" selected"); ?>>5th
              Post</option>

            <option value="6"
<?php if($this->opts['multi_pos'][$i] == "6") echo(" selected"); ?>>6th
              Post</option>

            <option value="7"
<?php if($this->opts['multi_pos'][$i] == "7") echo(" selected"); ?>>7th
              Post</option>

            <option value="8"
<?php if($this->opts['multi_pos'][$i] == "8") echo(" selected"); ?>>8th
              Post</option>

            <option value="9"
<?php if($this->opts['multi_pos'][$i] == "9") echo(" selected"); ?>>9th
              Post</option>

            <option value="10"
<?php if($this->opts['multi_pos'][$i] == "10") echo(" selected"); ?>>10th
              Post</option>

        </select>
        </td>

        <td><select name="adsensextreme[multi_align][<?php echo $i; ?>]"
          size="1">

            <option value="center"
<?php if($this->opts['multi_align'][$i] == "center") echo(" selected"); echo $centraleSopraTitolo; ?></option>

            <option value="left"
<?php if($this->opts['multi_align'][$i] == "left") echo(" selected"); echo $sinistraSopraTitolo; ?></option>

            <option value="right"
<?php if($this->opts['multi_align'][$i] == "right") echo(" selected"); echo $destraSopraTitolo; ?></option>

            <option value="cbt"
<?php if($this->opts['multi_align'][$i] == "cbt") echo(" selected"); echo $centraleSottoTitolo; ?></option>

            <option value="lbt"
<?php if($this->opts['multi_align'][$i] == "lbt") echo(" selected"); echo $sinistraSottoTitolo; ?></option>

            <option value="rbt"
<?php if($this->opts['multi_align'][$i] == "rbt") echo(" selected"); echo $destraSottoTitolo; ?></option>

        </select>
        </td>





      </tr>
      <tr>

<?php }?>

    </table>



    <div class="pro">



      <h4><?php echo $nonMostrareAdSuQuestePag;?></h4>

      <table>

        <tr>
          <td><input type="checkbox" value="1"
            name="adsensextreme[omit_home]"
<?php echo $this->opts['is_omit_home'];?>>
          </td>
          <td>Home page</td>
          <td class="ao_explain"></td>
        </tr>

        <tr>
          <td><input type="checkbox" value="1"
            name="adsensextreme[omit_search]"
<?php echo $this->opts['is_omit_search'];?>>
          </td>
          <td>Searchresult pages</td>
        </tr>

        <tr>
          <td><input type="checkbox" value="1"
            name="adsensextreme[omit_category]"
<?php echo $this->opts['is_omit_category'];?>>
          </td>
          <td>Category archives</td>
        </tr>

        <tr>
          <td><input type="checkbox" value="1" name="adsensextreme[omit_tag]"
<?php echo $this->opts['is_omit_tag'];?>>
          </td>
          <td>Tag archives</td>
        </tr>

        <tr>
          <td><input type="checkbox" value="1"
            name="adsensextreme[omit_date]"
<?php echo $this->opts['is_omit_date'];?>>
          </td>
          <td>Date archives</td>
        </tr>

        <tr>
          <td><input type="checkbox" value="1"
            name="adsensextreme[omit_author]"
<?php echo $this->opts['is_omit_author'];?>>
          </td>
          <td>Author archives</td>
        </tr>

      </table>

      <br>

    </div>
<?php ?>









  </div>


  <div
    style="background-color: #B0E878; padding: 10px; margin-top: 20px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; border-radius: 3px;">

    <h2><?php echo $titoloPrivacy;?></h2>

    <h4>Ban</h4>
    <p><?php echo $spiegazioneBanPrivacy;?></p>
    <p><input type="checkbox" value="1" name="adsensextreme[policy_protect]"
    <?php echo $this->opts['is_policy_protect'] . $checkPolicyProtect ?>
    </p>

    <br />
    <h4>Cookie</h4>
    <p><?php echo $spiegazioneUtilizzoPrivacy;?></p>

    <h3><?php echo $informativaSullaPrivacy . ' [<a href="#" onclick="toggleInformativaPrivacy(); return false;">' . $dettagli;?></a>]</h3>
    <?php include_once($this->opts['lang'] . '_privacy.php'); ?>
    <div class="container" style="display:none;">
    <p><?php echo adsense_privacy_policy_display();?></p>
    </div>
  </div>











  <div class="submit">

    <input type="submit" name="adsensextreme_update" id="ae_update"
      value="<?php _e($aggiornaLeOpzioni);?> &raquo;" />

  </div>

  </form>





  <div
    style="background-color: #FFC96B; padding: 10px; margin-top: 20px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; border-radius: 3px;">





    <p><?php echo $puoInserireAnnunciUsandoWidget;?></p>

  </div>



  <script type="text/javascript">
    function show_active($type) {
      jQuery("div.adtype").hide(0);
      jQuery("div#ad"+$type).show(0);
      toggleAdtype(document.getElementById("adtypeselect"+$type).value);
      if(document.getElementById("usertypebasic").checked){toggleUsertype("");} else {toggleUsertype("pro");};
    }
    show_active("1");
        <?php echo ('toggleUsertype("'.$this->opts['usertype'].'");'); ?>
  </script>
</div>