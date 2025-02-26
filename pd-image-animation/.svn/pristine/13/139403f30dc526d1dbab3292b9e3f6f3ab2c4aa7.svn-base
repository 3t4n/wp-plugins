<?php
/*
Plugin Name: PDImageAnimation
Plugin URI: http://www.slideshine.de/categories/tags.php/PDImageAnimation
Description: Displays thumbnails and GIF animations of your favourite images and slideshows from the online slideshow site slideshine.de.
Version: 2.6.0
Author: mfard
Author URI: http://www.slideshine.de/categories/tags.php/PDImageAnimation
*/

# @date 2010-09-23 15-30-40
abstract class Moflxccnfdv {
   const Saihaqtksdby = 'options';
    const Dkrratppefzkcl = 'submit';
 const Ccoetehfrnrs = 'title';
    const Visdshktxvqcytl = 'count';
 const Dcryumlidyrvx = 'mode';
        const Louywtnkzx = 'lang';
const Ojguygfgx = 'compids';
    const Fhekmlhankq = 0;
       const Hobcxnzohvgqnz = 1;
     const Cwxijzwtpsb = 2;		
       const Ybvlgbefmv = 'backend-title';
 const Afmssbrjkrqaaj = 'backend-count';
 const Pmygcgjtqeil = 'backend-compids';
        const Aollvcwhpgxe = 'backend-mode';
     const Nmyxowoeb = 'backend-lang';
       const Jbkxvgsnhtz = 'backend-head';
      const Ulpkrfccjh = 'backend-foot';
        const Lxcgpmlcyytd = 'backend-news';
const Aapcpmdsaxvdzf = 'backend-info';
      const Pbgwdafkbgu = 101;
const Jympafrufvjzeyh = 102;
      const Fgrjbmioyej = 103;
        const Yrsawvdiazalt = 104;
         const Rxqtljtafohklx = 105;
        const Utwglvtcgebzm = 106;
     const Cqiybjnicq = 107;
     const Hgywfjvzib = 108;
 const Uurkkktwctbymxhh = 109;
      const Azmfbbkdawb = 110;
    const Tarqhcfbm = 111;
       const Ngtyocpzbksy = 113;
         const Ltwxrweicziapc = 112;
     const Qfbjpidztc = 120;
    const Sehjdmumywv = 0;
     const Qvitwfofmhmd = 1;
     const Mvzphzglyegj = 2;
    const Qtwxepxhwrq = 3;
    const Eumaeenthzw = 4;
public function setDsabtrivyd($szkagbdowilfdv, $vuvoopdrhsmv, $hmypsplvlb, $bozejjwib) {
        $options = get_option($this->setIotrmguqsznh(self::Saihaqtksdby));
         $title = $options['title'];
     $compids = $this->getSxdftinzrmf($options['compids'], $options['count']);
       $mode = $options['mode'];
       $lang = $options['lang'];
     $karma_data = Rbmgaixhdaukrs::getInstance()->querySpzwzdilsbie($compids);
  $translator = new Smohpgrpbnyqpb($lang);
     $renderer = $this->constructJsqisvoafzoigj($translator, $mode);
   echo $szkagbdowilfdv;
 echo $hmypsplvlb . $title . $bozejjwib;
    echo $renderer->getLudhrovml($karma_data);
 echo $vuvoopdrhsmv;
   }
    public function createJuqwbadbsgozjojn() {
         $options = $this->queryZxiozhuendp();
         $title = $options['title'];
   $translator = new Smohpgrpbnyqpb($options['lang']);
       echo '<p>' . $translator->getQdzuqkfxawprt('backend.widgets.control.redirection', array(Smohpgrpbnyqpb::Uiwpluznuii => $this->setJzskwaakdckv())) . '</p>';
 echo '<input type="hidden" id="' . $this->setIotrmguqsznh(self::Dkrratppefzkcl) . '" name="' . $this->setIotrmguqsznh(self::Dkrratppefzkcl) . '" value="1" />';
   }
        public function queryZxiozhuendp() {
     $translator = new Smohpgrpbnyqpb($this->createVpwvoolydnghl());
     $compids = explode(',', $this->buildAnvbbwxjktxec());
shuffle($compids);
     $compids = array_slice(
     $compids, 0, 
      min(
    $this->constructSdluwaesbndpfevj(Moflxccnfdv::Ltwxrweicziapc),
       count($compids)
   )
    );
    for($strHklczhbcurfjsgg = 0; $strHklczhbcurfjsgg < count($compids); $strHklczhbcurfjsgg++) {
$compids[$strHklczhbcurfjsgg] = trim($compids[$strHklczhbcurfjsgg]);
   }
         $options = array(
         'title'=>$translator->getQdzuqkfxawprt('frontend.title'),
       'compids'=>implode(', ', $compids),
        'mode'=>self::Cwxijzwtpsb,
         'lang'=>$this->createVpwvoolydnghl(),
'count'=>$this->constructSdluwaesbndpfevj(Moflxccnfdv::Ngtyocpzbksy)
    );
     $opts = get_option($this->setIotrmguqsznh(self::Saihaqtksdby));
  if (!empty($opts)) {
     foreach ($opts as $key=>$value) {
      $options[$key] = $value;
   }
   }
update_option($this->setIotrmguqsznh(self::Saihaqtksdby), $options);
        return $options;
   }
   public function queryVjunihqgkqibyyyg() {
     $result = '';
         $options = $this->queryZxiozhuendp();
   $translator = new Smohpgrpbnyqpb($options['lang']);
  if ( $_POST[$this->setIotrmguqsznh(self::Dkrratppefzkcl)] !== null ) {
      $valid = true;
if ($this->constructSdluwaesbndpfevj(self::Pbgwdafkbgu)) {
   $options['title'] = $_POST[$this->setIotrmguqsznh(self::Ccoetehfrnrs)];
   }
    if ($this->constructSdluwaesbndpfevj(self::Jympafrufvjzeyh)) {
      if (
preg_match('/^\s*[0-9]+\s*$/', $_POST[$this->setIotrmguqsznh(self::Visdshktxvqcytl)]) &&
      (int) $_POST[$this->setIotrmguqsznh(self::Visdshktxvqcytl)] >= $this->constructSdluwaesbndpfevj(Moflxccnfdv::Azmfbbkdawb) &&
 (int) $_POST[$this->setIotrmguqsznh(self::Visdshktxvqcytl)] <= $this->constructSdluwaesbndpfevj(Moflxccnfdv::Tarqhcfbm)
     ) {
      $options['count'] = $_POST[$this->setIotrmguqsznh(self::Visdshktxvqcytl)];
} else {
    $result .= '
   <div class="updated">
 <p><strong>' . $translator->getQdzuqkfxawprt('backend.validation.count') . '</strong></p>
        </div>
    ';
   }
   }
  if ($this->constructSdluwaesbndpfevj(self::Yrsawvdiazalt)) {
   $options['mode'] = $_POST[$this->setIotrmguqsznh(self::Dcryumlidyrvx)];
   }
   if ($this->constructSdluwaesbndpfevj(self::Rxqtljtafohklx)) {
$options['lang'] = $_POST[$this->setIotrmguqsznh(self::Louywtnkzx)];
 $translator->buildDcsxrnshkgqw($options['lang']);
   }
if ($this->constructSdluwaesbndpfevj(self::Fgrjbmioyej)) {
 if (preg_match('/^\s*([0-9]+,\s*)*[0-9]+\s*$/', $_POST[$this->setIotrmguqsznh(self::Ojguygfgx)])) {
  $options['compids'] = $_POST[$this->setIotrmguqsznh(self::Ojguygfgx)];
} else {
    $result .= '
   <div class="updated">
   <p><strong>' . $translator->getQdzuqkfxawprt('backend.validation.compids') . '</strong></p>
        </div>
    ';
   }
   }
   if ($result === '') {
    $result .= '
   <div class="updated">
  <p><strong>' . $translator->getQdzuqkfxawprt('backend.updated') . '</strong></p>
        </div>
    ';
update_option($this->setIotrmguqsznh(self::Saihaqtksdby), $options);
   }
   }
         $title = $options['title'];
         $count = $options['count'];
   $compids = $options['compids'];
       $mode = $options['mode'];
       $lang = $options['lang'];
         $infoButton = '<span class="' . $this->constructSfpidtsvyijghzmvc(self::Aapcpmdsaxvdzf) . '" onclick="document.getElementsByName(\'' . $this->constructSfpidtsvyijghzmvc(self::Ulpkrfccjh) . '\')[0].style.display=\'block\'; return false;">?</span>';
    $result .= '
 <div class="wrap"> 
      <form name="form1" method="post" action="' . $_SERVER['REQUEST_URI'] . '">
<h2>' . $translator->getQdzuqkfxawprt('backend.title', array(Smohpgrpbnyqpb::Uiwpluznuii => $this->setJzskwaakdckv())) . '</h2> 
    ';
  if ($this->constructSdluwaesbndpfevj(self::Utwglvtcgebzm)) {
    $result .= '
<div class="' . $this->constructSfpidtsvyijghzmvc(self::Jbkxvgsnhtz) . '">' . 
      $translator->getQdzuqkfxawprt('backend.manual.top') . 
         '</div>
        <br />
    ';
   }
if ($this->constructSdluwaesbndpfevj(self::Pbgwdafkbgu)) {
    $result .= '
      <!-- title -->
   <p class="' . $this->constructSfpidtsvyijghzmvc(self::Ybvlgbefmv) . '">
      <label for="' . $this->setIotrmguqsznh(self::Ccoetehfrnrs) . '">
 <b>' . $translator->getQdzuqkfxawprt('backend.fieldlabel.title') . '</b>:<br />
  <span>' . $translator->getQdzuqkfxawprt('backend.manual.title') . '</span><br />
      <input id="' . $this->setIotrmguqsznh(self::Ccoetehfrnrs) . '" name="' . $this->setIotrmguqsznh(self::Ccoetehfrnrs) . '" type="text" value="'.$title.'" />
</label>
      </p>
    ';
   }
    if ($this->constructSdluwaesbndpfevj(self::Jympafrufvjzeyh)) {
    $result .= '
      <!-- count -->
       <p class="' . $this->constructSfpidtsvyijghzmvc(self::Afmssbrjkrqaaj) . '">
         <label for="' . $this->setIotrmguqsznh(self::Visdshktxvqcytl) . '">
 <b>' . $translator->getQdzuqkfxawprt('backend.fieldlabel.count') . '</b>:<br />
  <span>' . $translator->getQdzuqkfxawprt('backend.manual.count') . '</span><br />
  <input id="' . $this->setIotrmguqsznh(self::Visdshktxvqcytl) . '" name="' . $this->setIotrmguqsznh(self::Visdshktxvqcytl) . '" type="text" value="'.$count.'" />
</label>
      </p>
    ';
   }
if ($this->constructSdluwaesbndpfevj(self::Fgrjbmioyej)) {
    $result .= '
        <!-- compids -->
     <p class="' . $this->constructSfpidtsvyijghzmvc(self::Pmygcgjtqeil) . '">
   <label for="' . $this->setIotrmguqsznh(self::Ojguygfgx) . '">
   <b>' . $translator->getQdzuqkfxawprt('backend.fieldlabel.compids') . '</b>:<br />
 <span>' . $translator->getQdzuqkfxawprt('backend.manual.compids', array(Smohpgrpbnyqpb::Uyeeluxgffv => $this->constructSdluwaesbndpfevj(Moflxccnfdv::Hgywfjvzib))) . '</span><br />
  <input id="' . $this->setIotrmguqsznh(self::Ojguygfgx) . '" name="' . $this->setIotrmguqsznh(self::Ojguygfgx) . '" type="text" value="'.$compids.'" />
</label>
      </p>
    ';
   }
  if ($this->constructSdluwaesbndpfevj(self::Yrsawvdiazalt)) {
    $result .= '
     <!-- mode -->
     <p class="' . $this->constructSfpidtsvyijghzmvc(self::Aollvcwhpgxe) . '">
       <label for="' . $this->setIotrmguqsznh(self::Dcryumlidyrvx) . '">
<b>' . $translator->getQdzuqkfxawprt('backend.fieldlabel.mode') . '</b>:<br />
 <span>' . $translator->getQdzuqkfxawprt('backend.manual.mode') . '</span><br />
      <select id="' . $this->setIotrmguqsznh(self::Dcryumlidyrvx) . '" name="' . $this->setIotrmguqsznh(self::Dcryumlidyrvx) . '">
     ' . $this->constructMnwhpvqka(self::Fhekmlhankq, $translator->getQdzuqkfxawprt('backend.fieldlabel.image-mode'), $mode) . '
  ' . $this->constructMnwhpvqka(self::Hobcxnzohvgqnz, $translator->getQdzuqkfxawprt('backend.fieldlabel.animation-mode'), $mode) . '
     ' . $this->constructMnwhpvqka(self::Cwxijzwtpsb, $translator->getQdzuqkfxawprt('backend.fieldlabel.image-animation-mode'), $mode) . '
 </select>
</label>
      </p>
    ';
   }
   if ($this->constructSdluwaesbndpfevj(self::Rxqtljtafohklx)) {
    $result .= '
     <!-- lang -->
  <p class="' . $this->constructSfpidtsvyijghzmvc(self::Nmyxowoeb) . '">
    <label for="' . $this->setIotrmguqsznh(self::Louywtnkzx) . '">
    <b>' . $translator->getQdzuqkfxawprt('backend.fieldlabel.language') . '</b>:<br />
     <span>' . $translator->getQdzuqkfxawprt('backend.manual.language') . '</span><br />
<select id="' . $this->setIotrmguqsznh(self::Louywtnkzx) . '" name="' . $this->setIotrmguqsznh(self::Louywtnkzx) . '">
   ' . $this->constructMnwhpvqka($this->createVpwvoolydnghl(), $translator->getQdzuqkfxawprt('backend.fieldlabel.default'), $lang) . '
    ' . $this->constructMnwhpvqka(Smohpgrpbnyqpb::Vtdtpkcbuypqm, $translator->getQdzuqkfxawprt('backend.fieldlabel.english'), $lang) . '
       ' . $this->constructMnwhpvqka(Smohpgrpbnyqpb::Uzrzshjppaseqmrtn, $translator->getQdzuqkfxawprt('backend.fieldlabel.german'), $lang) . '
  ' . $this->constructMnwhpvqka(Smohpgrpbnyqpb::Hffxquktvyu, $translator->getQdzuqkfxawprt('backend.fieldlabel.spanish'), $lang) . '
 </select>
</label>
      </p>
    ';
   }
         if ($this->constructSdluwaesbndpfevj(self::Cqiybjnicq)) {
    $result .= '
 ' . $infoButton . '
  <div name="' . $this->constructSfpidtsvyijghzmvc(self::Ulpkrfccjh) . '" class="' . $this->constructSfpidtsvyijghzmvc(self::Ulpkrfccjh) . '">
' . $translator->getQdzuqkfxawprt('backend.manual.bottom')
   ;
     if ($this->constructSdluwaesbndpfevj(self::Uurkkktwctbymxhh)) {
   $result .= 
 '<div class="' . $this->constructSfpidtsvyijghzmvc(self::Lxcgpmlcyytd) . '">' .
$this->constructKvbtsfogmldnltnni($translator) .
 '</div>';
   }
    $result .= '
        </div>
    ';
   }
    $result .= '
    <!-- update switch -->
       <input type="hidden" id="' . $this->setIotrmguqsznh(self::Dkrratppefzkcl) . '" name="' . $this->setIotrmguqsznh(self::Dkrratppefzkcl) . '" value="1" />				
  <div class="submit">
         <input type="submit" name="submit" value="' . $translator->getQdzuqkfxawprt('backend.save') . ' &raquo;" />
        </div>
         </form>
        </div>
    ';
     echo $result;
   }
 protected function constructMnwhpvqka($htlxwqwtob, $hysrgvaoiauht, $ryriejis) {
         $selected = ($ryriejis == $htlxwqwtob ? 'selected' : '');
       return '<option value="' . $htlxwqwtob . '" ' . $selected . '>' . $hysrgvaoiauht . '</option>';
   }
    protected function createVpwvoolydnghl() {
    $arrQshmsbiqxagi = get_locale();
  $arrQshmsbiqxagi = substr($arrQshmsbiqxagi, 0, 2);
         switch ($arrQshmsbiqxagi) {
       case Smohpgrpbnyqpb::Vtdtpkcbuypqm:
 case Smohpgrpbnyqpb::Uzrzshjppaseqmrtn:
     case Smohpgrpbnyqpb::Hffxquktvyu:
        break;
default:
 $arrQshmsbiqxagi = Smohpgrpbnyqpb::Vtdtpkcbuypqm;
        break;
   }
      return $arrQshmsbiqxagi;
   }
   public function createPviifebgnerkdhn() {
     echo '<link rel="stylesheet" href="' . WP_PLUGIN_URL . '/' . $this->buildPdsedieiccosspyxw() . '/style.css" type="text/css" media="screen" />';
   }
     public function createGuixtqqdpxxebvytm() {
      echo '<link rel="stylesheet" href="' . WP_PLUGIN_URL . '/' . $this->buildPdsedieiccosspyxw() . '/style2.css" type="text/css" media="screen" />';
   }
   public function constructKvbtsfogmldnltnni($gryrklxporthqq) {
     $result = '';
       $nc = $this->createZgrunadffejwu();
        $pluginName = $this->buildPdsedieiccosspyxw();
      $transKey = 'news://plugins/' . $pluginName;
       if (	false === ( $json = get_transient($transKey) ) && 
    !preg_match('/localhost/', get_option('siteurl')) &&
 !preg_match('/127.0.0.1/', get_option('siteurl'))
     ) {
    $msgs = $nc->constructQybibrjat(
     $pluginName, 
    WP_PLUGIN_DIR . '/' . $pluginName . '/' . $pluginName . '.php'
    );
$json = @json_encode($msgs);
         $isTransientSet = set_transient($transKey, $json, 1*24*60*60 + mt_rand(0, 3*24*60*60));
   }
       if ($json == null || $json == '') {
         return;
   }
      $msgs = @json_decode($json, true);
  if (count($msgs) > 0 && $msgs[Gkkxneolksacpi::Kxfefvffafk] === true) {
 $result .= $gryrklxporthqq->getQdzuqkfxawprt('backend.news.upgrade');
   }
       return $result;
   }
   protected function getSxdftinzrmf($otraladdla, $qaizqtjfau) {
  $otraladdla = explode(',', $otraladdla);
      $rotationMode = $this->constructSdluwaesbndpfevj(Moflxccnfdv::Qfbjpidztc);
      switch ($rotationMode) {
         case 0:
   shuffle($otraladdla);
        break;
         case 1:
 $otraladdla = $this->getFukbwnprexfuu($otraladdla, $this->buildChiphmhfajsg());
        break;
         case 2:
         $dateid = round(time() / (60*60*24));
  $otraladdla = $this->getFukbwnprexfuu($otraladdla, $dateid);
        break;
         case 3:
      $combinedid = $this->buildChiphmhfajsg() + ( round(time() / (60*60*24)) );
      $otraladdla = $this->getFukbwnprexfuu($otraladdla, $combinedid);
        break;
         case 4:
default:
        break;
   }
       $otraladdla = array_slice($otraladdla, 0, $qaizqtjfau);
  for ($strDjhfdyacjyffg = 0; $strDjhfdyacjyffg < count($otraladdla); $strDjhfdyacjyffg++) {
  $otraladdla[$strDjhfdyacjyffg] = trim($otraladdla[$strDjhfdyacjyffg]);
   }
 return $otraladdla;
   }
private function buildChiphmhfajsg() {
       return round(crc32($_SERVER['REQUEST_URI']));
   }
   private function getFukbwnprexfuu($lfbrbmukmdy, $hcwucvdwu) {
        $arrPkqjdodeu = count($lfbrbmukmdy);
        if ($arrPkqjdodeu === 0) {
  return $lfbrbmukmdy;
   }
   for ($limitMvvzssawwtiia = 0; $limitMvvzssawwtiia < $arrPkqjdodeu; $limitMvvzssawwtiia++) {
      $pos = ($arrPkqjdodeu + $limitMvvzssawwtiia + $hcwucvdwu) % $arrPkqjdodeu;
        $reorderedArr[$limitMvvzssawwtiia] = $lfbrbmukmdy[$pos];
   }
   return $reorderedArr;
   }
     public abstract function setJzskwaakdckv();
  public abstract function buildPdsedieiccosspyxw();
        public abstract function setIotrmguqsznh($iooifyamgilq);
      public abstract function constructSfpidtsvyijghzmvc($liplajidg);
        public abstract function constructJsqisvoafzoigj($oqjsszkblntfh, $fkzuvlhr);
         public abstract function createZgrunadffejwu();
         public abstract function constructSdluwaesbndpfevj($xgmpmqvajshjr);
        public abstract function buildAnvbbwxjktxec();
   }
      class Idnmjueoaw extends Vyivsxmqdoxrbdoby {
         public function getLudhrovml(&$mwfppeckeuzod) {
         $oqjsszkblntfh = $this->zhicjsawumul;
 $fkzuvlhr = $this->phtpgxluz;
        $html = '<div class="' . $this->constructSfpidtsvyijghzmvc(self::Qwgasvhzwsnj) . '">';
       foreach ($mwfppeckeuzod as $data) {
    $title = $this->buildIvexlncmnhulhs($data['title']);
$author = $this->buildIvexlncmnhulhs($data['user']['username'], 15);
  $html .= '
         <div class="' . $this->constructSfpidtsvyijghzmvc(self::Wyiyzvvbhvjewp) . '">
        <a href="' . $data['slideshowUrl'] . '" target="_blank">
 ' . $this->getSvdhjdecpthyx($data, $fkzuvlhr) . '
      </a>
       <div>
       <div class="' . $this->constructSfpidtsvyijghzmvc(self::Jpzqvbfaijwk) . '">
   <strong>' . $title . '</strong>
        </div>
  <div class="' . $this->constructSfpidtsvyijghzmvc(self::Rliobzsksfxdhscja) . '">
       <div class="' . $this->constructSfpidtsvyijghzmvc(self::Bfrdqfdrkcov) . '">
    ' . $oqjsszkblntfh->getQdzuqkfxawprt('frontend.author') . ' <strong>' . $author . '</strong>
        </div>
       <div>
    <ul class="' . $this->constructSfpidtsvyijghzmvc(self::Tqwwimcixu) . '">
<li class="' . $this->constructSfpidtsvyijghzmvc(self::Kthyrovywrx) . '">' . $oqjsszkblntfh->getQdzuqkfxawprt('frontend.slideshows') . ': ' . $data['user']['slideshows'] . '</li>
     <li class="' . $this->constructSfpidtsvyijghzmvc(self::Nfiezuydoplnak) . '">' . $oqjsszkblntfh->getQdzuqkfxawprt('frontend.images') . ': ' . $data['user']['images'] . '</li>
    <li class="' . $this->constructSfpidtsvyijghzmvc(self::Cksczkyng) . '">' . $oqjsszkblntfh->getQdzuqkfxawprt('frontend.comments') . ': ' . $data['user']['comments'] . '</li>
       </ul>
        </div>
         <div class="' . $this->constructSfpidtsvyijghzmvc(self::Qyllhlujzdnduf) . '">
    <span>' . $oqjsszkblntfh->getQdzuqkfxawprt('frontend.karma') . ':</span>
 <div class="' . $this->constructSfpidtsvyijghzmvc(self::Vjeugvfzan) . '">' . $this->getFpacsidtlgpyzwxtwq($data['user']['karma']) . '</div>
        </div>
        </div>
        </div>
        </div>
    ';
   }
$html .= '</div>';
     return $html;
   }
        public function constructSfpidtsvyijghzmvc($cvlbdyomp) {
return 'pdia-' . $cvlbdyomp;
   }
   }
 class Nvdoxuxbtiq extends Moflxccnfdv {
  const Qhkropfetk = '
  26809, 29491, 29904,
        27027,
   21780, 21759, 21738, 21721, 23303, 24256, 26645, 27147, 27273, 28217, 28680, 28928, 29042, 29777, 30333, 30423,
      27546, 27589, 
   27816, 27941, 28101, 28273, 31668, 31795,
       31493
    ';
   public function __construct() {
   }
       public function setJzskwaakdckv() {
        return 'PDImageAnimation';
   }
    public function buildPdsedieiccosspyxw() {
return 'pd-image-animation';
   }
        public function setIotrmguqsznh($lqqjdfzuhq) {
   return 'pdimageanimation-' . $lqqjdfzuhq;
   }
 public function constructSfpidtsvyijghzmvc($jikxjauhlryu) {
   return 'pdia-' . $jikxjauhlryu;
   }
       public function constructJsqisvoafzoigj($jsqbrztbf, $sbhaybvbg) {
   $renderer = new Idnmjueoaw($jsqbrztbf, $sbhaybvbg);
         return $renderer;
   }
 public function createZgrunadffejwu() {
        $nc = Gkkxneolksacpi::getInstance();
   return $nc;
   }
         public function constructSdluwaesbndpfevj($zhkdcqxtycx) {
        $result = false;
     switch ($zhkdcqxtycx) {
  case Moflxccnfdv::Azmfbbkdawb:
case Moflxccnfdv::Tarqhcfbm:
   case Moflxccnfdv::Ngtyocpzbksy:
    $result = 1;
        break;
     case Moflxccnfdv::Ltwxrweicziapc:
     $countYzsasttuzjhe = 5;
        break;
      case Moflxccnfdv::Jympafrufvjzeyh:
         $countYzsasttuzjhe = false;
        break;
 case Moflxccnfdv::Qfbjpidztc:
        $countYzsasttuzjhe = Moflxccnfdv::Qtwxepxhwrq;
        break;
 case Moflxccnfdv::Hgywfjvzib:
         $countYzsasttuzjhe = array(
      'Clipart' => 'http://slideshine.de/categories/tags.php/Clipart',
        'Cartoons' => 'http://slideshine.de/categories/tags.php/Cartoons',
      'Digital Art' => 'http://slideshine.de/categories/tags.php/Digital%20Art',
    'Fractal Images' => 'http://slideshine.de/categories/tags.php/Fraktale',
     'Slideshow of the day' => 'http://slideshine.de/categories/tags.php/Slideshow%20des%20Tages',
      'Slideshow of the week' => 'http://slideshine.de/categories/tags.php/Slideshow%20der%20Woche',
    'Best of' => 'http://slideshine.de/categories/tags.php/Best%20of%20slideshine.de',
      'I\'m Feeling Lucky' => 'http://slideshine.de/index.php?page=Posts.RandomSlideshow',
    'more ...' => 'http://slideshine.de/categories/tags.php/Alle',
    );
        break;
       case Moflxccnfdv::Uurkkktwctbymxhh:
        $countYzsasttuzjhe = true;
        break;
default:
        $countYzsasttuzjhe = true;
        break;
   }
        return $countYzsasttuzjhe;
   }
public function buildAnvbbwxjktxec() {
      return self::Qhkropfetk;
   }
   }
    class Smohpgrpbnyqpb {
         const Vtdtpkcbuypqm = 'en';
   const Uzrzshjppaseqmrtn = 'de';
       const Hffxquktvyu = 'es';
   const Uiwpluznuii = 'widgetId';
const Uyeeluxgffv = 'links';
     private $fcpuwizqgdggp;
  public function __construct($fealzuzetce = null) {
      $this->fcpuwizqgdggp = ($fealzuzetce === null ? self::Vtdtpkcbuypqm : $fealzuzetce);
   }
        public function getQdzuqkfxawprt($sbfwofdbc, $mqarpelmvd = null) {
    $en = array(
        'frontend.author' => 'by',
'frontend.slideshows' => 'Slideshows',
  'frontend.images' => 'Images',
      'frontend.comments' => 'Comments',
'frontend.karma' => 'Karma',
    'frontend.title' => 'My images',
         'backend.validation.compids' => 'Slideshow-IDs invalid.',
   'backend.validation.count' => 'Number of images invalid (i.e. not an integer, too low or too high).',
   'backend.updated' => 'Settings updated.',
'backend.title' => '' . $mqarpelmvd[Smohpgrpbnyqpb::Uiwpluznuii] . ' Options',
 'backend.manual.top' => 'Configuration of <ul style="list-style-type: square; padding-left: 15px;"><li>widget title</li><li>Slideshow-IDs</li><li>View</li><li>Language</li></ul>',
        'backend.manual.bottom' => 'Server requests are cached by default. Therefore when a slideshow is displayed for the first time, the widget will need a few seconds to retrieve the data from the server. Then however it will load the data from the internal cache and widget will be rendered faster.',
  'backend.manual.title' => 'Your title for this widget as it will be displayed at the top of the widget in the sidebar.',
'backend.manual.count' => 'This value determines how many images will be displayed in this sidebar widget.',
   'backend.manual.compids' => 'Comma-separated list of Slideshow-IDs which is used to select a slideshow randomly and to display its images as GIF-animation. If a slideshow has the URL http://www.slideshine.de/12345, then its ID is 12345. By default some slideshows already are specified. Please replace this list with IDs of your favourite slideshows, which you can find and/or create here:<br>' . $this->queryDqyfyryiv($mqarpelmvd[Smohpgrpbnyqpb::Uyeeluxgffv]),
'backend.manual.mode' => 'Select display mode.',
     'backend.manual.language' => 'Select your language.',
       'backend.save' => 'Save',
'backend.fieldlabel.title' => 'Title',
 'backend.fieldlabel.count' => 'Number of images',
'backend.fieldlabel.compids' => 'Slideshow-IDs',
        'backend.fieldlabel.mode' => 'Mode',
      'backend.fieldlabel.language' => 'Language',
        'backend.fieldlabel.default' => '(automatic)',
    'backend.fieldlabel.english' => 'english',
  'backend.fieldlabel.german' => 'german',
    'backend.fieldlabel.spanish' => 'spanish',
'backend.fieldlabel.image-mode' => 'Image only',
  'backend.fieldlabel.animation-mode' => 'GIF-Animation only',
    'backend.fieldlabel.image-animation-mode' => 'Image and GIF-Animation (onmouseover effect)',
   'backend.news.upgrade' => 'To keep this plugin up-to-date, please check for new versions.',
         'backend.widgets.control.redirection' => 'Please go to [Admin Menu] -> [Settings] -> [' . $mqarpelmvd[Smohpgrpbnyqpb::Uiwpluznuii] . ']',
    );
    $de = array(
         'frontend.author' => 'von',
'frontend.slideshows' => 'Slideshows',
  'frontend.images' => 'Bilder',
        'frontend.comments' => 'Kommentare',
'frontend.karma' => 'Karma',
       'frontend.title' => 'Meine Bilder',
 'backend.validation.compids' => 'Slideshow-IDs ungültig.',
        'backend.validation.count' => 'Anzahl von Bildern ungültig (d.h. keine Ganzzahl, zu klein or zu groß).',
  'backend.updated' => 'Einstellungen gespeichert.',
      'backend.title' => '' . $mqarpelmvd[Smohpgrpbnyqpb::Uiwpluznuii] . ' Einstellungen',
 'backend.manual.top' => 'Configuration of <ul style="list-style-type: square; padding-left: 15px;"><li>widget title</li><li>Slideshow-IDs</li><li>View</li><li>Language</li></ul>',
        'backend.manual.bottom' => 'Server requests are cached by default. Therefore when a slideshow is displayed for the first time, the widget will need a few seconds to retrieve the data from the server. Then however it will load the data from the internal cache and widget will be rendered faster.',
  'backend.manual.title' => 'Your title for this widget as it will be displayed at the top of the widget in the sidebar.',
'backend.manual.count' => 'This value determines how many images will be displayed in this sidebar widget.',
   'backend.manual.compids' => 'Comma-separated list of Slideshow-IDs which is used to select a slideshow randomly and to display its images as GIF-animation. If a slideshow has the URL http://www.slideshine.de/12345, then its ID is 12345. By default some slideshows already are specified. Please replace this list with IDs of your favourite slideshows, which you can find and/or create here:<br>' . $this->queryDqyfyryiv($mqarpelmvd[Smohpgrpbnyqpb::Uyeeluxgffv]),
'backend.manual.mode' => 'Select display mode.',
     'backend.manual.language' => 'Select your language.',
  'backend.save' => 'Speichern',
'backend.fieldlabel.title' => 'Titel',
   'backend.fieldlabel.count' => 'Anzahl von Bildern',
'backend.fieldlabel.compids' => 'Slideshow-IDs',
         'backend.fieldlabel.mode' => 'Modus',
     'backend.fieldlabel.language' => 'Sprache',
'backend.fieldlabel.default' => '(automatisch)',
     'backend.fieldlabel.english' => 'englisch',
   'backend.fieldlabel.german' => 'deutsch',
     'backend.fieldlabel.spanish' => 'spanisch',
'backend.fieldlabel.image-mode' => 'Image only',
  'backend.fieldlabel.animation-mode' => 'GIF-Animation only',
    'backend.fieldlabel.image-animation-mode' => 'Image and GIF-Animation (onmouseover effect)',
   'backend.news.upgrade' => 'To keep this plugin up-to-date, please check for new versions.',
  'backend.widgets.control.redirection' => 'Siehe [Admin Menu] -> [Settings] -> [' . $mqarpelmvd[Smohpgrpbnyqpb::Uiwpluznuii] . ']',
    );
    $es = array(
        'frontend.author' => 'de',
'frontend.slideshows' => 'Slideshows',
    'frontend.images' => 'Imagenes',
         'frontend.comments' => 'Comentarios',
'frontend.karma' => 'Karma',
   'frontend.title' => 'Imagenes',
    'backend.validation.compids' => 'Slideshow-IDs están nulos.',
   'backend.validation.count' => 'Number of images invalid (i.e. not an integer, too low or too high).',
     'backend.updated' => 'Opciones guardadas.',
 'backend.title' => '' . $mqarpelmvd[Smohpgrpbnyqpb::Uiwpluznuii] . ' Opciones',
        'backend.manual' => 'Configuration',
 'backend.manual.top' => 'Configuration of <ul style="list-style-type: square; padding-left: 15px;"><li>widget title</li><li>Slideshow-IDs</li><li>View</li><li>Language</li></ul>',
        'backend.manual.bottom' => 'Server requests are cached by default. Therefore when a slideshow is displayed for the first time, the widget will need a few seconds to retrieve the data from the server. Then however it will load the data from the internal cache and widget will be rendered faster.',
  'backend.manual.title' => 'Your title for this widget as it will be displayed at the top of the widget in the sidebar.',
'backend.manual.count' => 'This value determines how many images will be displayed in this sidebar widget.',
   'backend.manual.compids' => 'Comma-separated list of Slideshow-IDs which is used to select a slideshow randomly and to display its images as GIF-animation. If a slideshow has the URL http://www.slideshine.de/12345, then its ID is 12345. By default some slideshows already are specified. Please replace this list with IDs of your favourite slideshows, which you can find and/or create here:<br>' . $this->queryDqyfyryiv($mqarpelmvd[Smohpgrpbnyqpb::Uyeeluxgffv]),
'backend.manual.mode' => 'Select display mode.',
     'backend.manual.language' => 'Select your language.',
        'backend.save' => 'Guardar Cambios',
  'backend.fieldlabel.title' => 'Título',
   'backend.fieldlabel.count' => 'Imagenes',
'backend.fieldlabel.compids' => 'Slideshow-IDs',
        'backend.fieldlabel.mode' => 'Modo',
    'backend.fieldlabel.language' => 'Lingua',
'backend.fieldlabel.default' => '(automático)',
   'backend.fieldlabel.english' => 'ingles',
   'backend.fieldlabel.german' => 'alemán',
     'backend.fieldlabel.spanish' => 'español',
'backend.fieldlabel.image-mode' => 'Image only',
  'backend.fieldlabel.animation-mode' => 'GIF-Animation only',
    'backend.fieldlabel.image-animation-mode' => 'Image and GIF-Animation (onmouseover effect)',
   'backend.news.upgrade' => 'To keep this plugin up-to-date, please check for new versions.',
      'backend.widgets.control.redirection' => '[Admin Menu] -> [Settings] -> [' . $mqarpelmvd[Smohpgrpbnyqpb::Uiwpluznuii] . ']',
    );
      $limitNmwppvkiz = array(
         self::Vtdtpkcbuypqm => $en,
   self::Uzrzshjppaseqmrtn => $de,
      self::Hffxquktvyu => $es
    );
         return $limitNmwppvkiz[$this->fcpuwizqgdggp][$sbfwofdbc];
   }
 public function buildDcsxrnshkgqw($yjfltocsdpc) {
        $this->fcpuwizqgdggp = $yjfltocsdpc;
   }
 private function queryDqyfyryiv($zbjrrudlrcvvz) {
  if ($zbjrrudlrcvvz === null) {
         return;
   }
     $Horvqqxaidy = array();
      foreach ($zbjrrudlrcvvz as $key => $value) {
    $Horvqqxaidy[] .= '<a href="' . $value . '">' . $key . '</a>';
   }
   return implode(' &bull; ', $Horvqqxaidy);
   }
   }
      abstract class Vyivsxmqdoxrbdoby {
    const Fhekmlhankq = 0;
       const Hobcxnzohvgqnz = 1;
    const Cwxijzwtpsb = 2;
     const Qwgasvhzwsnj = 'container';
     const Wyiyzvvbhvjewp = 'element';
   const Qyllhlujzdnduf = 'karma';
  const Vjeugvfzan = 'karmabar';
   const Ztmzihndbamyiz = 'karmabar-filled';
 const Wqjcntnoidi = 'karmabar-default';
 const Beiolqqbkmwyds = 'img';
 const Jpzqvbfaijwk = 'title';
  const Bfrdqfdrkcov = 'author';
      const Rliobzsksfxdhscja = 'stats';
        const Tqwwimcixu = 'list';
     const Kthyrovywrx = 'slideshows';
    const Nfiezuydoplnak = 'images';
 const Cksczkyng = 'comments';
   protected $zhicjsawumul = null;
protected $phtpgxluz = null;
      public function __construct($tjrfjuxp, $zjxddjdovxqtwu = null) {
    $this->zhicjsawumul = $tjrfjuxp;
         $this->phtpgxluz = ($zjxddjdovxqtwu === null ? self::Hobcxnzohvgqnz : $zjxddjdovxqtwu);
   }
     protected function buildIvexlncmnhulhs($ihvkchghtehazy, $ywmnfftmbx = 0, $vlhlxnqdlriz = 0) {
        $limitQlffngembsyyb = htmlspecialchars($ihvkchghtehazy);
         if ($ywmnfftmbx > 0 && strlen($limitQlffngembsyyb) > $ywmnfftmbx) {
 $limitQlffngembsyyb = substr($limitQlffngembsyyb, 0, $ywmnfftmbx) . '&hellip;';
   }
         return $limitQlffngembsyyb;
   }
   public function getFpacsidtlgpyzwxtwq($uhxexiahv) {
       $karmabar = "<span class='" . $this->constructSfpidtsvyijghzmvc(self::Ztmzihndbamyiz) . "'>" . str_repeat("|", $uhxexiahv) . "</span>";
       $tail = "<span class='" . $this->constructSfpidtsvyijghzmvc(self::Wqjcntnoidi) . "'>" . str_repeat("|", (25 - $uhxexiahv)) . "</span>";
       return $karmabar . $tail;
   }
     protected function getSvdhjdecpthyx(&$cnumyccva, $heryctbkfu) {
  $img = '';
   $thumbSrc = $this->queryVtzmhvzwhbsbdk($cnumyccva);
      $gifSrc = $this->queryXnfrjvtcynuauavomwr($cnumyccva);
    switch ($heryctbkfu) {
     case self::Fhekmlhankq:
         $img = '<img src="' . $thumbSrc . '" 
   class="' . $this->constructSfpidtsvyijghzmvc(self::Beiolqqbkmwyds) . '"
   alt="' . $this->buildIvexlncmnhulhs($cnumyccva['title']) . '"
     title="' . $this->buildIvexlncmnhulhs($cnumyccva['title']) . '"
      />';
        break;
     case self::Cwxijzwtpsb:
         $img = '<img src="' . $thumbSrc . '" 
   class="' . $this->constructSfpidtsvyijghzmvc(self::Beiolqqbkmwyds) . '"
   alt="' . $this->buildIvexlncmnhulhs($cnumyccva['title']) . '"
     title="' . $this->buildIvexlncmnhulhs($cnumyccva['title']) . '"
     onmouseover="this.src=\'' . $gifSrc . '\'" 
     onmouseout="this.src=\'' . $thumbSrc . '\'"
      />';
        break;
        case self::Hobcxnzohvgqnz:
       $img = '<img src="' . $gifSrc . '" 
   class="' . $this->constructSfpidtsvyijghzmvc(self::Beiolqqbkmwyds) . '"
   alt="' . $this->buildIvexlncmnhulhs($cnumyccva['title']) . '"
     title="' . $this->buildIvexlncmnhulhs($cnumyccva['title']) . '"
      />';
        break;
default:
  $img = '';
   }
    return $img;
   }
 protected function queryVtzmhvzwhbsbdk(&$pgerroadqtim, $bzygewjaghrhk = null) {
     $imgSrc = '';
 if ($bzygewjaghrhk != null) {
       $imgSrc = $bzygewjaghrhk;
   }
if ($pgerroadqtim != null) {
  $imgSrc = $pgerroadqtim['thumbnailUrl'];
   }
       return $imgSrc;
   }
       protected function getCtjcbzobsgchty(&$wjjboddlktaq, $oknuqnyvaup = null) {
     $imgSrc = '';
         if ($oknuqnyvaup != null) {
     $imgSrc = $oknuqnyvaup;
   }
if ($wjjboddlktaq != null) {
      $imgSrc = $wjjboddlktaq['gifUrl'];
   }
       return $imgSrc;
   }
   protected function queryXnfrjvtcynuauavomwr(&$yaepueayf, $fthbcdordfwbr = null) {
     $imgSrc = '';
 if ($fthbcdordfwbr != null) {
       $imgSrc = $fthbcdordfwbr;
   }
       if ($yaepueayf != null) {
   $imgSrc = $yaepueayf['gifUrl'];
   }
        $intNoftyfoktwf = str_replace('.animation_', '.animation_scaled_', $imgSrc);
   $intNoftyfoktwf = str_replace('-300.gif', '-100.gif', $intNoftyfoktwf);
     return $intNoftyfoktwf;
   }
    public abstract function getLudhrovml(&$ewckkausyp);
      public abstract function constructSfpidtsvyijghzmvc($zlnwajdxs);
   }
    class Rbmgaixhdaukrs {
      const Vyxdjsndzoat = "wohsedils/nosj/ed.enihsedils.www//:ptth"; 
    private function __construct() {
   }
public static function getInstance() {
         static $instance;
      if(is_null($instance)) {
     $instance = new Rbmgaixhdaukrs();
} else {
   }
         return $instance;
   }
       private function getWjkofxphmyi() {
         $func = 'st' . "rr" . 'ev';
     return $func(self::Vyxdjsndzoat);
   }
 private function queryJkffzvmtvfsac() {
       $arrNohhzxrzwqltts = '_';
         return rawurlencode(preg_replace('/(\/)/', $arrNohhzxrzwqltts, get_option('siteurl')));
   }
 public function querySpzwzdilsbie($rhflwxqqifw) {
       $Xmzbcsikvahpq = array();
       foreach ($rhflwxqqifw as $compid) {
     $url = $this->getWjkofxphmyi() . '/' . $compid . '/' . $this->queryJkffzvmtvfsac();
     $json = null;
if (false === ( $json = get_transient(dirname($url)) ) ) {
     $json = @file_get_contents($url);
if ($json == '') {
 continue;
   }
   $isTransientSet = set_transient(dirname($url), $json, 7*24*60*60 + mt_rand(0, 7*24*60*60));
   }
      $arrPynwggsujugr = json_decode($json, true);
        $Xmzbcsikvahpq[] = $arrPynwggsujugr;
   }
    return $Xmzbcsikvahpq;
   }
   }
  class Dsrcnlmfajjge {
   private function __construct() {
  }
         public static function getInstance() {
        static $instance;
     if(is_null($instance)) {
   $instance = new Dsrcnlmfajjge();
         } else {
  }
        return $instance;
  }
 private function createRxigyslbhruswpv($mwzbqeluskxxu = 0) {
    $timearray = ($mwzbqeluskxxu == 0) ? getdate() : getdate($mwzbqeluskxxu);
   if ($timearray['year'] < 1980) {
       $timearray['year'] = 1980;
   $timearray['mon'] = 1;
    $timearray['mday'] = 1;
     $timearray['hours'] = 0;
       $timearray['minutes'] = 0;
       $timearray['seconds'] = 0;
     } 		
  return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
 ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    } 	
    private function constructEbdvvlejwxbud($nfhuucaua) {
      $sec = 2 * ($nfhuucaua     & 0x1f);
     $min = ($nfhuucaua >> 5)   & 0x3f;
     $hrs = ($nfhuucaua >> 11)  & 0x1f;
     $day = ($nfhuucaua >> 16)  & 0x1f;
     $mon = ($nfhuucaua >> 21)  & 0x0f;
     $year = (($nfhuucaua >> 25) & 0x7f) + 1980; 
  return mktime($hrs, $min, $sec, $mon, $day, $year);
   } 
  private function constructRufqnekbbgf($otkvvobew) {
$offsetKndwnyyedv = dechex($otkvvobew);
   $hexdtime = '\x' . $offsetKndwnyyedv[6] . $offsetKndwnyyedv[7]
   . '\x' . $offsetKndwnyyedv[4] . $offsetKndwnyyedv[5]
   . '\x' . $offsetKndwnyyedv[2] . $offsetKndwnyyedv[3]
    . '\x' . $offsetKndwnyyedv[0] . $offsetKndwnyyedv[1];
  eval('$hexdtime = "' . $hexdtime . '";');
        return $hexdtime;
  }
   private function createDutwtgnzulsgqk($qbskusduok) {
  $dtime = array_map("dechex", array_map("ord", str_split($qbskusduok)));
         $hexdtime = $dtime[3] . $dtime[2] . $dtime[1] . $dtime[0];
      $arrGkbdzhieao = hexdec($hexdtime);
   return $arrGkbdzhieao;
  }
public function createAlybjzxtivnvc($ultnnupyv) {
return strftime("%Y-%m-%d %H:%M:%S", $ultnnupyv);
  }
   public function getJkfvycrkznxmkuhq($bkjjfbfgaiub) {
      $isQnutnnqgnh = substr($bkjjfbfgaiub, 10, 4);
        $timestamp = $this->constructEbdvvlejwxbud($this->createDutwtgnzulsgqk($isQnutnnqgnh));
         return $timestamp;
  }
  }
    class Gkkxneolksacpi {
   const Tmzvsrzwxpyqn = "snigulp/dnetxe/gro.sserpdrow//:ptth"; 
    const Emxnaotyezbcww = 'strrev';
        const Ljrutabcxeeyt = 100;
     const Gwzgxmynpg = 101;
      const Kxfefvffafk = 120;
    private function __construct() {
   }
public static function getInstance() {
         static $instance;
      if(is_null($instance)) {
     $instance = new Gkkxneolksacpi();
} else {
   }
         return $instance;
   }
private function constructIepqnbjjvlupha($wvidtrgqdsydb) {
 $func = self::Emxnaotyezbcww;
        return $func(self::Tmzvsrzwxpyqn) . '/' . $wvidtrgqdsydb . '.zip';
   }
   public function setRykmxcasjzfvx($fhqdyiydbfxvhz) {
         $phpData = @file_get_contents($fhqdyiydbfxvhz);
preg_match_all('/#\s*@date\s*[0-9]{4}-[0-9]{2}-[0-9]{2}\s*[0-9]{2}:[0-9]{2}:[0-9]{2}/', $phpData, $matches);
return 	strtotime(
       trim(
preg_replace('/[a-zA-Z#@]/', '', $matches[0][0])
   )
    );
   }
public function constructGzflhjtfdsqbhtf($gcbhjxykvcjsk) {
      $url = $this->constructIepqnbjjvlupha($gcbhjxykvcjsk);
        $zipData = @file_get_contents($url);
     $timestamp = Dsrcnlmfajjge::getInstance()->getJkfvycrkznxmkuhq($zipData);
return $timestamp;
   }
       public function constructQybibrjat($bculzvmhlu, $lzhssekhmjpui) {
     $Cjnbmqjqsbc = array();
   $tsLocal = $this->setRykmxcasjzfvx($lzhssekhmjpui);
         $tsRemote = $this->constructGzflhjtfdsqbhtf($bculzvmhlu);
        $Cjnbmqjqsbc[self::Ljrutabcxeeyt] = Dsrcnlmfajjge::getInstance()->createAlybjzxtivnvc($tsLocal);
      $Cjnbmqjqsbc[self::Gwzgxmynpg] = Dsrcnlmfajjge::getInstance()->createAlybjzxtivnvc($tsRemote);
         if ($tsRemote > $tsLocal) {
 $Cjnbmqjqsbc[self::Kxfefvffafk] = true;
   }
  return $Cjnbmqjqsbc;
   }
   }
  $pd_image_animation = new Nvdoxuxbtiq();
      $pd_image_animation_id = $pd_image_animation->setJzskwaakdckv();
        if ( ! defined( 'WP_CONTENT_URL' ) )
define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
        if ( ! defined( 'WP_CONTENT_DIR' ) )
   define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
       if ( ! defined( 'WP_PLUGIN_URL' ) )
      define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
       if ( ! defined( 'WP_PLUGIN_DIR' ) )
       define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
  if (!function_exists(queryGrcvuhwrf)) { 
function queryGrcvuhwrf() { 
global $pd_image_animation; 
       if (!isset($pd_image_animation)) { 
return; 
   }
  $pd_image_animation->queryZxiozhuendp();
   }
   }
   if (!function_exists(setNtvwiwhrfwsy)) { 
 function setNtvwiwhrfwsy() { 
  global $pd_image_animation_id;
         global $pd_image_animation;
       if (!isset($pd_image_animation)) { 
return; 
   }
    if (function_exists('add_options_page')) {
      add_options_page($pd_image_animation_id, $pd_image_animation_id, 'administrator', basename(__FILE__), array(&$pd_image_animation, queryVjunihqgkqibyyyg));
   }
   }
   }
       if (!function_exists(setYarfhgsqwygzmttf)) { 
     function setYarfhgsqwygzmttf($kpyelaivd) { 
  extract($kpyelaivd);
global $pd_image_animation; 
       if (!isset($pd_image_animation)) { 
return; 
   }
  echo $pd_image_animation->setDsabtrivyd($before_widget, $after_widget, $before_title, $after_title);
   }
   }
    if (!function_exists(queryQhfendmjaip)) { 
  function queryQhfendmjaip() { 
global $pd_image_animation; 
       if (!isset($pd_image_animation)) { 
return; 
   }
   echo $pd_image_animation->createJuqwbadbsgozjojn();
   }
   }
   if (!function_exists(buildIjwrzgltkx)) { 
 function buildIjwrzgltkx() { 
global $pd_image_animation; 
       if (!isset($pd_image_animation)) { 
return; 
   }
  echo $pd_image_animation->createPviifebgnerkdhn();
   }
   }
    if (!function_exists(queryWoiyvqdrxnh)) { 
  function queryWoiyvqdrxnh() { 
global $pd_image_animation; 
       if (!isset($pd_image_animation)) { 
return; 
   }
    echo $pd_image_animation->createGuixtqqdpxxebvytm();
   }
   }
 if (function_exists('register_sidebar_widget')) {
 register_sidebar_widget($pd_image_animation_id, setYarfhgsqwygzmttf);
   }
 if (function_exists('register_sidebar_widget')) {
        register_widget_control($pd_image_animation_id, queryQhfendmjaip);
   }
  if (function_exists('register_activation_hook')) {
   register_activation_hook(__FILE__, queryGrcvuhwrf);
   }
        if (function_exists('add_action')) {
    add_action('admin_menu', setNtvwiwhrfwsy);
 add_action('wp_head', buildIjwrzgltkx);
     add_action('admin_head', queryWoiyvqdrxnh);
   }
   ?>
