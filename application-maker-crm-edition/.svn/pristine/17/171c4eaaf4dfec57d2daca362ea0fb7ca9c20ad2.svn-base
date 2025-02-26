



<!DOCTYPE html>
<html>
<head>
 <link rel="icon" type="image/vnd.microsoft.icon" href="http://www.gstatic.com/codesite/ph/images/phosting.ico">
 
 
 <script type="text/javascript">
 
 
 
 
 var codesite_token = null;
 
 
 var CS_env = {"profileUrl":null,"token":null,"assetHostPath":"http://www.gstatic.com/codesite/ph","domainName":null,"assetVersionPath":"http://www.gstatic.com/codesite/ph/8191733833915822820","projectHomeUrl":"/p/cropzoom","relativeBaseUrl":"","projectName":"cropzoom","loggedInUserEmail":null};
 var _gaq = _gaq || [];
 _gaq.push(
 ['siteTracker._setAccount', 'UA-18071-1'],
 ['siteTracker._trackPageview']);
 
 _gaq.push(
 ['projectTracker._setAccount', 'UA-12533608-1'],
 ['projectTracker._trackPageview']);
 
 
 </script>
 
 
 <title>jquery.cropzoom.js - 
 cropzoom -
 
 
 jQuery plugin to crop, zoom and rotate images - Google Project Hosting
 </title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
 
 <meta name="ROBOTS" content="NOARCHIVE">
 
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/8191733833915822820/css/core.css">
 
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/8191733833915822820/css/ph_detail.css" >
 
 
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/8191733833915822820/css/d_sb.css" >
 
 
 
<!--[if IE]>
 <link type="text/css" rel="stylesheet" href="http://www.gstatic.com/codesite/ph/8191733833915822820/css/d_ie.css" >
<![endif]-->
 <style type="text/css">
 .menuIcon.off { background: no-repeat url(http://www.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 -42px }
 .menuIcon.on { background: no-repeat url(http://www.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 -28px }
 .menuIcon.down { background: no-repeat url(http://www.gstatic.com/codesite/ph/images/dropdown_sprite.gif) 0 0; }
 
 
 
  tr.inline_comment {
 background: #fff;
 vertical-align: top;
 }
 div.draft, div.published {
 padding: .3em;
 border: 1px solid #999; 
 margin-bottom: .1em;
 font-family: arial, sans-serif;
 max-width: 60em;
 }
 div.draft {
 background: #ffa;
 } 
 div.published {
 background: #e5ecf9;
 }
 div.published .body, div.draft .body {
 padding: .5em .1em .1em .1em;
 max-width: 60em;
 white-space: pre-wrap;
 white-space: -moz-pre-wrap;
 white-space: -pre-wrap;
 white-space: -o-pre-wrap;
 word-wrap: break-word;
 font-size: 1em;
 }
 div.draft .actions {
 margin-left: 1em;
 font-size: 90%;
 }
 div.draft form {
 padding: .5em .5em .5em 0;
 }
 div.draft textarea, div.published textarea {
 width: 95%;
 height: 10em;
 font-family: arial, sans-serif;
 margin-bottom: .5em;
 }

 
 .nocursor, .nocursor td, .cursor_hidden, .cursor_hidden td {
 background-color: white;
 height: 2px;
 }
 .cursor, .cursor td {
 background-color: darkblue;
 height: 2px;
 display: '';
 }
 
 
.list {
 border: 1px solid white;
 border-bottom: 0;
}

 
 </style>
</head>
<body class="t4">
<script type="text/javascript">
 (function() {
 var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
 ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
 (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
 })();
</script>
<div class="headbg">

 <div id="gaia">
 

 <span>
 
 <a href="#" id="projects-dropdown" onclick="return false;"><u>My favorites</u> <small>&#9660;</small></a>
 | <a href="https://www.google.com/accounts/ServiceLogin?service=code&amp;ltmpl=phosting&amp;continue=http%3A%2F%2Fcode.google.com%2Fp%2Fcropzoom%2Fsource%2Fbrowse%2Ftrunk%2Fplugin%2Fjquery.cropzoom.js&amp;followup=http%3A%2F%2Fcode.google.com%2Fp%2Fcropzoom%2Fsource%2Fbrowse%2Ftrunk%2Fplugin%2Fjquery.cropzoom.js" onclick="_CS_click('/gb/ph/signin');"><u>Sign in</u></a>
 
 </span>

 </div>

 <div class="gbh" style="left: 0pt;"></div>
 <div class="gbh" style="right: 0pt;"></div>
 
 
 <div style="height: 1px"></div>
<!--[if lte IE 7]>
<div style="text-align:center;">
Your version of Internet Explorer is not supported. Try a browser that
contributes to open source, such as <a href="http://www.firefox.com">Firefox</a>,
<a href="http://www.google.com/chrome">Google Chrome</a>, or
<a href="http://code.google.com/chrome/chromeframe/">Google Chrome Frame</a>.
</div>
<![endif]-->




 <table style="padding:0px; margin: 0px 0px 10px 0px; width:100%" cellpadding="0" cellspacing="0"
 itemscope itemtype="http://schema.org/CreativeWork">
 <tr style="height: 58px;">
 
 <td id="plogo">
 <link itemprop="url" href="/p/cropzoom">
 <a href="/p/cropzoom/">
 
 <img src="http://www.gstatic.com/codesite/ph/images/defaultlogo.png" alt="Logo" itemprop="image">
 
 </a>
 </td>
 
 <td style="padding-left: 0.5em">
 
 <div id="pname">
 <a href="/p/cropzoom/"><span itemprop="name">cropzoom</span></a>
 </div>
 
 <div id="psum">
 <a id="project_summary_link"
 href="/p/cropzoom/"><span itemprop="description">jQuery plugin to crop, zoom and rotate images</span></a>
 
 </div>
 
 
 </td>
 <td style="white-space:nowrap;text-align:right; vertical-align:bottom;">
 
 <form action="/hosting/search">
 <input size="30" name="q" value="" type="text">
 
 <input type="submit" name="projectsearch" value="Search projects" >
 </form>
 
 </tr>
 </table>

</div>

 
<div id="mt" class="gtb"> 
 <a href="/p/cropzoom/" class="tab ">Project&nbsp;Home</a>
 
 
 
 
 
 
 
 
 <a href="/p/cropzoom/issues/list"
 class="tab ">Issues</a>
 
 
 
 
 
 <a href="/p/cropzoom/source/checkout"
 class="tab active">Source</a>
 
 
 
 
 
 <div class=gtbc></div>
</div>
<table cellspacing="0" cellpadding="0" width="100%" align="center" border="0" class="st">
 <tr>
 
 
 
 
 
 
 <td class="subt">
 <div class="st2">
 <div class="isf">
 
 


 <span class="inst1"><a href="/p/cropzoom/source/checkout">Checkout</a></span> &nbsp;
 <span class="inst2"><a href="/p/cropzoom/source/browse/">Browse</a></span> &nbsp;
 <span class="inst3"><a href="/p/cropzoom/source/list">Changes</a></span> &nbsp;
 
 
 &nbsp;
 <form action="http://www.google.com/codesearch" method="get" style="display:inline"
 onsubmit="document.getElementById('codesearchq').value = document.getElementById('origq').value + ' package:http://cropzoom\\.googlecode\\.com'">
 <input type="hidden" name="q" id="codesearchq" value="">
 <input type="text" maxlength="2048" size="38" id="origq" name="origq" value="" title="Google Code Search" style="font-size:92%">&nbsp;<input type="submit" value="Search Trunk" name="btnG" style="font-size:92%">
 
 
 
 
 
 
 </form>
 </div>
</div>

 </td>
 
 
 
 <td align="right" valign="top" class="bevel-right"></td>
 </tr>
</table>


<script type="text/javascript">
 var cancelBubble = false;
 function _go(url) { document.location = url; }
</script>
<div id="maincol"
 
>

 
<!-- IE -->




<div class="expand">
<div id="colcontrol">
<style type="text/css">
 #file_flipper { white-space: nowrap; padding-right: 2em; }
 #file_flipper.hidden { display: none; }
 #file_flipper .pagelink { color: #0000CC; text-decoration: underline; }
 #file_flipper #visiblefiles { padding-left: 0.5em; padding-right: 0.5em; }
</style>
<table id="nav_and_rev" class="list"
 cellpadding="0" cellspacing="0" width="100%">
 <tr>
 
 <td nowrap="nowrap" class="src_crumbs src_nav" width="33%">
 <strong class="src_nav">Source path:&nbsp;</strong>
 <span id="crumb_root">
 
 <a href="/p/cropzoom/source/browse/">svn</a>/&nbsp;</span>
 <span id="crumb_links" class="ifClosed"><a href="/p/cropzoom/source/browse/trunk/">trunk</a><span class="sp">/&nbsp;</span><a href="/p/cropzoom/source/browse/trunk/plugin/">plugin</a><span class="sp">/&nbsp;</span>jquery.cropzoom.js</span>
 
 

 </td>
 
 
 <td nowrap="nowrap" width="33%" align="right">
 <table cellpadding="0" cellspacing="0" style="font-size: 100%"><tr>
 
 
 <td class="flipper">
 <ul class="leftside">
 
 <li><a href="/p/cropzoom/source/browse/trunk/plugin/jquery.cropzoom.js?r=42" title="Previous">&lsaquo;r42</a></li>
 
 </ul>
 </td>
 
 <td class="flipper"><b>r45</b></td>
 
 </tr></table>
 </td> 
 </tr>
</table>

<div class="fc">
 
 
 
<style type="text/css">
.undermouse span {
 background-image: url(http://www.gstatic.com/codesite/ph/images/comments.gif); }
</style>
<table class="opened" id="review_comment_area"
><tr>
<td id="nums">
<pre><table width="100%"><tr class="nocursor"><td></td></tr></table></pre>
<pre><table width="100%" id="nums_table_0"><tr id="gr_svn45_1"

><td id="1"><a href="#1">1</a></td></tr
><tr id="gr_svn45_2"

><td id="2"><a href="#2">2</a></td></tr
><tr id="gr_svn45_3"

><td id="3"><a href="#3">3</a></td></tr
><tr id="gr_svn45_4"

><td id="4"><a href="#4">4</a></td></tr
><tr id="gr_svn45_5"

><td id="5"><a href="#5">5</a></td></tr
><tr id="gr_svn45_6"

><td id="6"><a href="#6">6</a></td></tr
><tr id="gr_svn45_7"

><td id="7"><a href="#7">7</a></td></tr
><tr id="gr_svn45_8"

><td id="8"><a href="#8">8</a></td></tr
><tr id="gr_svn45_9"

><td id="9"><a href="#9">9</a></td></tr
><tr id="gr_svn45_10"

><td id="10"><a href="#10">10</a></td></tr
><tr id="gr_svn45_11"

><td id="11"><a href="#11">11</a></td></tr
><tr id="gr_svn45_12"

><td id="12"><a href="#12">12</a></td></tr
><tr id="gr_svn45_13"

><td id="13"><a href="#13">13</a></td></tr
><tr id="gr_svn45_14"

><td id="14"><a href="#14">14</a></td></tr
><tr id="gr_svn45_15"

><td id="15"><a href="#15">15</a></td></tr
><tr id="gr_svn45_16"

><td id="16"><a href="#16">16</a></td></tr
><tr id="gr_svn45_17"

><td id="17"><a href="#17">17</a></td></tr
><tr id="gr_svn45_18"

><td id="18"><a href="#18">18</a></td></tr
><tr id="gr_svn45_19"

><td id="19"><a href="#19">19</a></td></tr
><tr id="gr_svn45_20"

><td id="20"><a href="#20">20</a></td></tr
><tr id="gr_svn45_21"

><td id="21"><a href="#21">21</a></td></tr
><tr id="gr_svn45_22"

><td id="22"><a href="#22">22</a></td></tr
><tr id="gr_svn45_23"

><td id="23"><a href="#23">23</a></td></tr
><tr id="gr_svn45_24"

><td id="24"><a href="#24">24</a></td></tr
><tr id="gr_svn45_25"

><td id="25"><a href="#25">25</a></td></tr
><tr id="gr_svn45_26"

><td id="26"><a href="#26">26</a></td></tr
><tr id="gr_svn45_27"

><td id="27"><a href="#27">27</a></td></tr
><tr id="gr_svn45_28"

><td id="28"><a href="#28">28</a></td></tr
><tr id="gr_svn45_29"

><td id="29"><a href="#29">29</a></td></tr
><tr id="gr_svn45_30"

><td id="30"><a href="#30">30</a></td></tr
><tr id="gr_svn45_31"

><td id="31"><a href="#31">31</a></td></tr
><tr id="gr_svn45_32"

><td id="32"><a href="#32">32</a></td></tr
><tr id="gr_svn45_33"

><td id="33"><a href="#33">33</a></td></tr
><tr id="gr_svn45_34"

><td id="34"><a href="#34">34</a></td></tr
><tr id="gr_svn45_35"

><td id="35"><a href="#35">35</a></td></tr
><tr id="gr_svn45_36"

><td id="36"><a href="#36">36</a></td></tr
><tr id="gr_svn45_37"

><td id="37"><a href="#37">37</a></td></tr
><tr id="gr_svn45_38"

><td id="38"><a href="#38">38</a></td></tr
><tr id="gr_svn45_39"

><td id="39"><a href="#39">39</a></td></tr
><tr id="gr_svn45_40"

><td id="40"><a href="#40">40</a></td></tr
><tr id="gr_svn45_41"

><td id="41"><a href="#41">41</a></td></tr
><tr id="gr_svn45_42"

><td id="42"><a href="#42">42</a></td></tr
><tr id="gr_svn45_43"

><td id="43"><a href="#43">43</a></td></tr
><tr id="gr_svn45_44"

><td id="44"><a href="#44">44</a></td></tr
><tr id="gr_svn45_45"

><td id="45"><a href="#45">45</a></td></tr
><tr id="gr_svn45_46"

><td id="46"><a href="#46">46</a></td></tr
><tr id="gr_svn45_47"

><td id="47"><a href="#47">47</a></td></tr
><tr id="gr_svn45_48"

><td id="48"><a href="#48">48</a></td></tr
><tr id="gr_svn45_49"

><td id="49"><a href="#49">49</a></td></tr
><tr id="gr_svn45_50"

><td id="50"><a href="#50">50</a></td></tr
><tr id="gr_svn45_51"

><td id="51"><a href="#51">51</a></td></tr
><tr id="gr_svn45_52"

><td id="52"><a href="#52">52</a></td></tr
><tr id="gr_svn45_53"

><td id="53"><a href="#53">53</a></td></tr
><tr id="gr_svn45_54"

><td id="54"><a href="#54">54</a></td></tr
><tr id="gr_svn45_55"

><td id="55"><a href="#55">55</a></td></tr
><tr id="gr_svn45_56"

><td id="56"><a href="#56">56</a></td></tr
><tr id="gr_svn45_57"

><td id="57"><a href="#57">57</a></td></tr
><tr id="gr_svn45_58"

><td id="58"><a href="#58">58</a></td></tr
><tr id="gr_svn45_59"

><td id="59"><a href="#59">59</a></td></tr
><tr id="gr_svn45_60"

><td id="60"><a href="#60">60</a></td></tr
><tr id="gr_svn45_61"

><td id="61"><a href="#61">61</a></td></tr
><tr id="gr_svn45_62"

><td id="62"><a href="#62">62</a></td></tr
><tr id="gr_svn45_63"

><td id="63"><a href="#63">63</a></td></tr
><tr id="gr_svn45_64"

><td id="64"><a href="#64">64</a></td></tr
><tr id="gr_svn45_65"

><td id="65"><a href="#65">65</a></td></tr
><tr id="gr_svn45_66"

><td id="66"><a href="#66">66</a></td></tr
><tr id="gr_svn45_67"

><td id="67"><a href="#67">67</a></td></tr
><tr id="gr_svn45_68"

><td id="68"><a href="#68">68</a></td></tr
><tr id="gr_svn45_69"

><td id="69"><a href="#69">69</a></td></tr
><tr id="gr_svn45_70"

><td id="70"><a href="#70">70</a></td></tr
><tr id="gr_svn45_71"

><td id="71"><a href="#71">71</a></td></tr
><tr id="gr_svn45_72"

><td id="72"><a href="#72">72</a></td></tr
><tr id="gr_svn45_73"

><td id="73"><a href="#73">73</a></td></tr
><tr id="gr_svn45_74"

><td id="74"><a href="#74">74</a></td></tr
><tr id="gr_svn45_75"

><td id="75"><a href="#75">75</a></td></tr
><tr id="gr_svn45_76"

><td id="76"><a href="#76">76</a></td></tr
><tr id="gr_svn45_77"

><td id="77"><a href="#77">77</a></td></tr
><tr id="gr_svn45_78"

><td id="78"><a href="#78">78</a></td></tr
><tr id="gr_svn45_79"

><td id="79"><a href="#79">79</a></td></tr
><tr id="gr_svn45_80"

><td id="80"><a href="#80">80</a></td></tr
><tr id="gr_svn45_81"

><td id="81"><a href="#81">81</a></td></tr
><tr id="gr_svn45_82"

><td id="82"><a href="#82">82</a></td></tr
><tr id="gr_svn45_83"

><td id="83"><a href="#83">83</a></td></tr
><tr id="gr_svn45_84"

><td id="84"><a href="#84">84</a></td></tr
><tr id="gr_svn45_85"

><td id="85"><a href="#85">85</a></td></tr
><tr id="gr_svn45_86"

><td id="86"><a href="#86">86</a></td></tr
><tr id="gr_svn45_87"

><td id="87"><a href="#87">87</a></td></tr
><tr id="gr_svn45_88"

><td id="88"><a href="#88">88</a></td></tr
><tr id="gr_svn45_89"

><td id="89"><a href="#89">89</a></td></tr
><tr id="gr_svn45_90"

><td id="90"><a href="#90">90</a></td></tr
><tr id="gr_svn45_91"

><td id="91"><a href="#91">91</a></td></tr
><tr id="gr_svn45_92"

><td id="92"><a href="#92">92</a></td></tr
><tr id="gr_svn45_93"

><td id="93"><a href="#93">93</a></td></tr
><tr id="gr_svn45_94"

><td id="94"><a href="#94">94</a></td></tr
><tr id="gr_svn45_95"

><td id="95"><a href="#95">95</a></td></tr
><tr id="gr_svn45_96"

><td id="96"><a href="#96">96</a></td></tr
><tr id="gr_svn45_97"

><td id="97"><a href="#97">97</a></td></tr
><tr id="gr_svn45_98"

><td id="98"><a href="#98">98</a></td></tr
><tr id="gr_svn45_99"

><td id="99"><a href="#99">99</a></td></tr
><tr id="gr_svn45_100"

><td id="100"><a href="#100">100</a></td></tr
><tr id="gr_svn45_101"

><td id="101"><a href="#101">101</a></td></tr
><tr id="gr_svn45_102"

><td id="102"><a href="#102">102</a></td></tr
><tr id="gr_svn45_103"

><td id="103"><a href="#103">103</a></td></tr
><tr id="gr_svn45_104"

><td id="104"><a href="#104">104</a></td></tr
><tr id="gr_svn45_105"

><td id="105"><a href="#105">105</a></td></tr
><tr id="gr_svn45_106"

><td id="106"><a href="#106">106</a></td></tr
><tr id="gr_svn45_107"

><td id="107"><a href="#107">107</a></td></tr
><tr id="gr_svn45_108"

><td id="108"><a href="#108">108</a></td></tr
><tr id="gr_svn45_109"

><td id="109"><a href="#109">109</a></td></tr
><tr id="gr_svn45_110"

><td id="110"><a href="#110">110</a></td></tr
><tr id="gr_svn45_111"

><td id="111"><a href="#111">111</a></td></tr
><tr id="gr_svn45_112"

><td id="112"><a href="#112">112</a></td></tr
><tr id="gr_svn45_113"

><td id="113"><a href="#113">113</a></td></tr
><tr id="gr_svn45_114"

><td id="114"><a href="#114">114</a></td></tr
><tr id="gr_svn45_115"

><td id="115"><a href="#115">115</a></td></tr
><tr id="gr_svn45_116"

><td id="116"><a href="#116">116</a></td></tr
><tr id="gr_svn45_117"

><td id="117"><a href="#117">117</a></td></tr
><tr id="gr_svn45_118"

><td id="118"><a href="#118">118</a></td></tr
><tr id="gr_svn45_119"

><td id="119"><a href="#119">119</a></td></tr
><tr id="gr_svn45_120"

><td id="120"><a href="#120">120</a></td></tr
><tr id="gr_svn45_121"

><td id="121"><a href="#121">121</a></td></tr
><tr id="gr_svn45_122"

><td id="122"><a href="#122">122</a></td></tr
><tr id="gr_svn45_123"

><td id="123"><a href="#123">123</a></td></tr
><tr id="gr_svn45_124"

><td id="124"><a href="#124">124</a></td></tr
><tr id="gr_svn45_125"

><td id="125"><a href="#125">125</a></td></tr
><tr id="gr_svn45_126"

><td id="126"><a href="#126">126</a></td></tr
><tr id="gr_svn45_127"

><td id="127"><a href="#127">127</a></td></tr
><tr id="gr_svn45_128"

><td id="128"><a href="#128">128</a></td></tr
><tr id="gr_svn45_129"

><td id="129"><a href="#129">129</a></td></tr
><tr id="gr_svn45_130"

><td id="130"><a href="#130">130</a></td></tr
><tr id="gr_svn45_131"

><td id="131"><a href="#131">131</a></td></tr
><tr id="gr_svn45_132"

><td id="132"><a href="#132">132</a></td></tr
><tr id="gr_svn45_133"

><td id="133"><a href="#133">133</a></td></tr
><tr id="gr_svn45_134"

><td id="134"><a href="#134">134</a></td></tr
><tr id="gr_svn45_135"

><td id="135"><a href="#135">135</a></td></tr
><tr id="gr_svn45_136"

><td id="136"><a href="#136">136</a></td></tr
><tr id="gr_svn45_137"

><td id="137"><a href="#137">137</a></td></tr
><tr id="gr_svn45_138"

><td id="138"><a href="#138">138</a></td></tr
><tr id="gr_svn45_139"

><td id="139"><a href="#139">139</a></td></tr
><tr id="gr_svn45_140"

><td id="140"><a href="#140">140</a></td></tr
><tr id="gr_svn45_141"

><td id="141"><a href="#141">141</a></td></tr
><tr id="gr_svn45_142"

><td id="142"><a href="#142">142</a></td></tr
><tr id="gr_svn45_143"

><td id="143"><a href="#143">143</a></td></tr
><tr id="gr_svn45_144"

><td id="144"><a href="#144">144</a></td></tr
><tr id="gr_svn45_145"

><td id="145"><a href="#145">145</a></td></tr
><tr id="gr_svn45_146"

><td id="146"><a href="#146">146</a></td></tr
><tr id="gr_svn45_147"

><td id="147"><a href="#147">147</a></td></tr
><tr id="gr_svn45_148"

><td id="148"><a href="#148">148</a></td></tr
><tr id="gr_svn45_149"

><td id="149"><a href="#149">149</a></td></tr
><tr id="gr_svn45_150"

><td id="150"><a href="#150">150</a></td></tr
><tr id="gr_svn45_151"

><td id="151"><a href="#151">151</a></td></tr
><tr id="gr_svn45_152"

><td id="152"><a href="#152">152</a></td></tr
><tr id="gr_svn45_153"

><td id="153"><a href="#153">153</a></td></tr
><tr id="gr_svn45_154"

><td id="154"><a href="#154">154</a></td></tr
><tr id="gr_svn45_155"

><td id="155"><a href="#155">155</a></td></tr
><tr id="gr_svn45_156"

><td id="156"><a href="#156">156</a></td></tr
><tr id="gr_svn45_157"

><td id="157"><a href="#157">157</a></td></tr
><tr id="gr_svn45_158"

><td id="158"><a href="#158">158</a></td></tr
><tr id="gr_svn45_159"

><td id="159"><a href="#159">159</a></td></tr
><tr id="gr_svn45_160"

><td id="160"><a href="#160">160</a></td></tr
><tr id="gr_svn45_161"

><td id="161"><a href="#161">161</a></td></tr
><tr id="gr_svn45_162"

><td id="162"><a href="#162">162</a></td></tr
><tr id="gr_svn45_163"

><td id="163"><a href="#163">163</a></td></tr
><tr id="gr_svn45_164"

><td id="164"><a href="#164">164</a></td></tr
><tr id="gr_svn45_165"

><td id="165"><a href="#165">165</a></td></tr
><tr id="gr_svn45_166"

><td id="166"><a href="#166">166</a></td></tr
><tr id="gr_svn45_167"

><td id="167"><a href="#167">167</a></td></tr
><tr id="gr_svn45_168"

><td id="168"><a href="#168">168</a></td></tr
><tr id="gr_svn45_169"

><td id="169"><a href="#169">169</a></td></tr
><tr id="gr_svn45_170"

><td id="170"><a href="#170">170</a></td></tr
><tr id="gr_svn45_171"

><td id="171"><a href="#171">171</a></td></tr
><tr id="gr_svn45_172"

><td id="172"><a href="#172">172</a></td></tr
><tr id="gr_svn45_173"

><td id="173"><a href="#173">173</a></td></tr
><tr id="gr_svn45_174"

><td id="174"><a href="#174">174</a></td></tr
><tr id="gr_svn45_175"

><td id="175"><a href="#175">175</a></td></tr
><tr id="gr_svn45_176"

><td id="176"><a href="#176">176</a></td></tr
><tr id="gr_svn45_177"

><td id="177"><a href="#177">177</a></td></tr
><tr id="gr_svn45_178"

><td id="178"><a href="#178">178</a></td></tr
><tr id="gr_svn45_179"

><td id="179"><a href="#179">179</a></td></tr
><tr id="gr_svn45_180"

><td id="180"><a href="#180">180</a></td></tr
><tr id="gr_svn45_181"

><td id="181"><a href="#181">181</a></td></tr
><tr id="gr_svn45_182"

><td id="182"><a href="#182">182</a></td></tr
><tr id="gr_svn45_183"

><td id="183"><a href="#183">183</a></td></tr
><tr id="gr_svn45_184"

><td id="184"><a href="#184">184</a></td></tr
><tr id="gr_svn45_185"

><td id="185"><a href="#185">185</a></td></tr
><tr id="gr_svn45_186"

><td id="186"><a href="#186">186</a></td></tr
><tr id="gr_svn45_187"

><td id="187"><a href="#187">187</a></td></tr
><tr id="gr_svn45_188"

><td id="188"><a href="#188">188</a></td></tr
><tr id="gr_svn45_189"

><td id="189"><a href="#189">189</a></td></tr
><tr id="gr_svn45_190"

><td id="190"><a href="#190">190</a></td></tr
><tr id="gr_svn45_191"

><td id="191"><a href="#191">191</a></td></tr
><tr id="gr_svn45_192"

><td id="192"><a href="#192">192</a></td></tr
><tr id="gr_svn45_193"

><td id="193"><a href="#193">193</a></td></tr
><tr id="gr_svn45_194"

><td id="194"><a href="#194">194</a></td></tr
><tr id="gr_svn45_195"

><td id="195"><a href="#195">195</a></td></tr
><tr id="gr_svn45_196"

><td id="196"><a href="#196">196</a></td></tr
><tr id="gr_svn45_197"

><td id="197"><a href="#197">197</a></td></tr
><tr id="gr_svn45_198"

><td id="198"><a href="#198">198</a></td></tr
><tr id="gr_svn45_199"

><td id="199"><a href="#199">199</a></td></tr
><tr id="gr_svn45_200"

><td id="200"><a href="#200">200</a></td></tr
><tr id="gr_svn45_201"

><td id="201"><a href="#201">201</a></td></tr
><tr id="gr_svn45_202"

><td id="202"><a href="#202">202</a></td></tr
><tr id="gr_svn45_203"

><td id="203"><a href="#203">203</a></td></tr
><tr id="gr_svn45_204"

><td id="204"><a href="#204">204</a></td></tr
><tr id="gr_svn45_205"

><td id="205"><a href="#205">205</a></td></tr
><tr id="gr_svn45_206"

><td id="206"><a href="#206">206</a></td></tr
><tr id="gr_svn45_207"

><td id="207"><a href="#207">207</a></td></tr
><tr id="gr_svn45_208"

><td id="208"><a href="#208">208</a></td></tr
><tr id="gr_svn45_209"

><td id="209"><a href="#209">209</a></td></tr
><tr id="gr_svn45_210"

><td id="210"><a href="#210">210</a></td></tr
><tr id="gr_svn45_211"

><td id="211"><a href="#211">211</a></td></tr
><tr id="gr_svn45_212"

><td id="212"><a href="#212">212</a></td></tr
><tr id="gr_svn45_213"

><td id="213"><a href="#213">213</a></td></tr
><tr id="gr_svn45_214"

><td id="214"><a href="#214">214</a></td></tr
><tr id="gr_svn45_215"

><td id="215"><a href="#215">215</a></td></tr
><tr id="gr_svn45_216"

><td id="216"><a href="#216">216</a></td></tr
><tr id="gr_svn45_217"

><td id="217"><a href="#217">217</a></td></tr
><tr id="gr_svn45_218"

><td id="218"><a href="#218">218</a></td></tr
><tr id="gr_svn45_219"

><td id="219"><a href="#219">219</a></td></tr
><tr id="gr_svn45_220"

><td id="220"><a href="#220">220</a></td></tr
><tr id="gr_svn45_221"

><td id="221"><a href="#221">221</a></td></tr
><tr id="gr_svn45_222"

><td id="222"><a href="#222">222</a></td></tr
><tr id="gr_svn45_223"

><td id="223"><a href="#223">223</a></td></tr
><tr id="gr_svn45_224"

><td id="224"><a href="#224">224</a></td></tr
><tr id="gr_svn45_225"

><td id="225"><a href="#225">225</a></td></tr
><tr id="gr_svn45_226"

><td id="226"><a href="#226">226</a></td></tr
><tr id="gr_svn45_227"

><td id="227"><a href="#227">227</a></td></tr
><tr id="gr_svn45_228"

><td id="228"><a href="#228">228</a></td></tr
><tr id="gr_svn45_229"

><td id="229"><a href="#229">229</a></td></tr
><tr id="gr_svn45_230"

><td id="230"><a href="#230">230</a></td></tr
><tr id="gr_svn45_231"

><td id="231"><a href="#231">231</a></td></tr
><tr id="gr_svn45_232"

><td id="232"><a href="#232">232</a></td></tr
><tr id="gr_svn45_233"

><td id="233"><a href="#233">233</a></td></tr
><tr id="gr_svn45_234"

><td id="234"><a href="#234">234</a></td></tr
><tr id="gr_svn45_235"

><td id="235"><a href="#235">235</a></td></tr
><tr id="gr_svn45_236"

><td id="236"><a href="#236">236</a></td></tr
><tr id="gr_svn45_237"

><td id="237"><a href="#237">237</a></td></tr
><tr id="gr_svn45_238"

><td id="238"><a href="#238">238</a></td></tr
><tr id="gr_svn45_239"

><td id="239"><a href="#239">239</a></td></tr
><tr id="gr_svn45_240"

><td id="240"><a href="#240">240</a></td></tr
><tr id="gr_svn45_241"

><td id="241"><a href="#241">241</a></td></tr
><tr id="gr_svn45_242"

><td id="242"><a href="#242">242</a></td></tr
><tr id="gr_svn45_243"

><td id="243"><a href="#243">243</a></td></tr
><tr id="gr_svn45_244"

><td id="244"><a href="#244">244</a></td></tr
><tr id="gr_svn45_245"

><td id="245"><a href="#245">245</a></td></tr
><tr id="gr_svn45_246"

><td id="246"><a href="#246">246</a></td></tr
><tr id="gr_svn45_247"

><td id="247"><a href="#247">247</a></td></tr
><tr id="gr_svn45_248"

><td id="248"><a href="#248">248</a></td></tr
><tr id="gr_svn45_249"

><td id="249"><a href="#249">249</a></td></tr
><tr id="gr_svn45_250"

><td id="250"><a href="#250">250</a></td></tr
><tr id="gr_svn45_251"

><td id="251"><a href="#251">251</a></td></tr
><tr id="gr_svn45_252"

><td id="252"><a href="#252">252</a></td></tr
><tr id="gr_svn45_253"

><td id="253"><a href="#253">253</a></td></tr
><tr id="gr_svn45_254"

><td id="254"><a href="#254">254</a></td></tr
><tr id="gr_svn45_255"

><td id="255"><a href="#255">255</a></td></tr
><tr id="gr_svn45_256"

><td id="256"><a href="#256">256</a></td></tr
><tr id="gr_svn45_257"

><td id="257"><a href="#257">257</a></td></tr
><tr id="gr_svn45_258"

><td id="258"><a href="#258">258</a></td></tr
><tr id="gr_svn45_259"

><td id="259"><a href="#259">259</a></td></tr
><tr id="gr_svn45_260"

><td id="260"><a href="#260">260</a></td></tr
><tr id="gr_svn45_261"

><td id="261"><a href="#261">261</a></td></tr
><tr id="gr_svn45_262"

><td id="262"><a href="#262">262</a></td></tr
><tr id="gr_svn45_263"

><td id="263"><a href="#263">263</a></td></tr
><tr id="gr_svn45_264"

><td id="264"><a href="#264">264</a></td></tr
><tr id="gr_svn45_265"

><td id="265"><a href="#265">265</a></td></tr
><tr id="gr_svn45_266"

><td id="266"><a href="#266">266</a></td></tr
><tr id="gr_svn45_267"

><td id="267"><a href="#267">267</a></td></tr
><tr id="gr_svn45_268"

><td id="268"><a href="#268">268</a></td></tr
><tr id="gr_svn45_269"

><td id="269"><a href="#269">269</a></td></tr
><tr id="gr_svn45_270"

><td id="270"><a href="#270">270</a></td></tr
><tr id="gr_svn45_271"

><td id="271"><a href="#271">271</a></td></tr
><tr id="gr_svn45_272"

><td id="272"><a href="#272">272</a></td></tr
><tr id="gr_svn45_273"

><td id="273"><a href="#273">273</a></td></tr
><tr id="gr_svn45_274"

><td id="274"><a href="#274">274</a></td></tr
><tr id="gr_svn45_275"

><td id="275"><a href="#275">275</a></td></tr
><tr id="gr_svn45_276"

><td id="276"><a href="#276">276</a></td></tr
><tr id="gr_svn45_277"

><td id="277"><a href="#277">277</a></td></tr
><tr id="gr_svn45_278"

><td id="278"><a href="#278">278</a></td></tr
><tr id="gr_svn45_279"

><td id="279"><a href="#279">279</a></td></tr
><tr id="gr_svn45_280"

><td id="280"><a href="#280">280</a></td></tr
><tr id="gr_svn45_281"

><td id="281"><a href="#281">281</a></td></tr
><tr id="gr_svn45_282"

><td id="282"><a href="#282">282</a></td></tr
><tr id="gr_svn45_283"

><td id="283"><a href="#283">283</a></td></tr
><tr id="gr_svn45_284"

><td id="284"><a href="#284">284</a></td></tr
><tr id="gr_svn45_285"

><td id="285"><a href="#285">285</a></td></tr
><tr id="gr_svn45_286"

><td id="286"><a href="#286">286</a></td></tr
><tr id="gr_svn45_287"

><td id="287"><a href="#287">287</a></td></tr
><tr id="gr_svn45_288"

><td id="288"><a href="#288">288</a></td></tr
><tr id="gr_svn45_289"

><td id="289"><a href="#289">289</a></td></tr
><tr id="gr_svn45_290"

><td id="290"><a href="#290">290</a></td></tr
><tr id="gr_svn45_291"

><td id="291"><a href="#291">291</a></td></tr
><tr id="gr_svn45_292"

><td id="292"><a href="#292">292</a></td></tr
><tr id="gr_svn45_293"

><td id="293"><a href="#293">293</a></td></tr
><tr id="gr_svn45_294"

><td id="294"><a href="#294">294</a></td></tr
><tr id="gr_svn45_295"

><td id="295"><a href="#295">295</a></td></tr
><tr id="gr_svn45_296"

><td id="296"><a href="#296">296</a></td></tr
><tr id="gr_svn45_297"

><td id="297"><a href="#297">297</a></td></tr
><tr id="gr_svn45_298"

><td id="298"><a href="#298">298</a></td></tr
><tr id="gr_svn45_299"

><td id="299"><a href="#299">299</a></td></tr
><tr id="gr_svn45_300"

><td id="300"><a href="#300">300</a></td></tr
><tr id="gr_svn45_301"

><td id="301"><a href="#301">301</a></td></tr
><tr id="gr_svn45_302"

><td id="302"><a href="#302">302</a></td></tr
><tr id="gr_svn45_303"

><td id="303"><a href="#303">303</a></td></tr
><tr id="gr_svn45_304"

><td id="304"><a href="#304">304</a></td></tr
><tr id="gr_svn45_305"

><td id="305"><a href="#305">305</a></td></tr
><tr id="gr_svn45_306"

><td id="306"><a href="#306">306</a></td></tr
><tr id="gr_svn45_307"

><td id="307"><a href="#307">307</a></td></tr
><tr id="gr_svn45_308"

><td id="308"><a href="#308">308</a></td></tr
><tr id="gr_svn45_309"

><td id="309"><a href="#309">309</a></td></tr
><tr id="gr_svn45_310"

><td id="310"><a href="#310">310</a></td></tr
><tr id="gr_svn45_311"

><td id="311"><a href="#311">311</a></td></tr
><tr id="gr_svn45_312"

><td id="312"><a href="#312">312</a></td></tr
><tr id="gr_svn45_313"

><td id="313"><a href="#313">313</a></td></tr
><tr id="gr_svn45_314"

><td id="314"><a href="#314">314</a></td></tr
><tr id="gr_svn45_315"

><td id="315"><a href="#315">315</a></td></tr
><tr id="gr_svn45_316"

><td id="316"><a href="#316">316</a></td></tr
><tr id="gr_svn45_317"

><td id="317"><a href="#317">317</a></td></tr
><tr id="gr_svn45_318"

><td id="318"><a href="#318">318</a></td></tr
><tr id="gr_svn45_319"

><td id="319"><a href="#319">319</a></td></tr
><tr id="gr_svn45_320"

><td id="320"><a href="#320">320</a></td></tr
><tr id="gr_svn45_321"

><td id="321"><a href="#321">321</a></td></tr
><tr id="gr_svn45_322"

><td id="322"><a href="#322">322</a></td></tr
><tr id="gr_svn45_323"

><td id="323"><a href="#323">323</a></td></tr
><tr id="gr_svn45_324"

><td id="324"><a href="#324">324</a></td></tr
><tr id="gr_svn45_325"

><td id="325"><a href="#325">325</a></td></tr
><tr id="gr_svn45_326"

><td id="326"><a href="#326">326</a></td></tr
><tr id="gr_svn45_327"

><td id="327"><a href="#327">327</a></td></tr
><tr id="gr_svn45_328"

><td id="328"><a href="#328">328</a></td></tr
><tr id="gr_svn45_329"

><td id="329"><a href="#329">329</a></td></tr
><tr id="gr_svn45_330"

><td id="330"><a href="#330">330</a></td></tr
><tr id="gr_svn45_331"

><td id="331"><a href="#331">331</a></td></tr
><tr id="gr_svn45_332"

><td id="332"><a href="#332">332</a></td></tr
><tr id="gr_svn45_333"

><td id="333"><a href="#333">333</a></td></tr
><tr id="gr_svn45_334"

><td id="334"><a href="#334">334</a></td></tr
><tr id="gr_svn45_335"

><td id="335"><a href="#335">335</a></td></tr
><tr id="gr_svn45_336"

><td id="336"><a href="#336">336</a></td></tr
><tr id="gr_svn45_337"

><td id="337"><a href="#337">337</a></td></tr
><tr id="gr_svn45_338"

><td id="338"><a href="#338">338</a></td></tr
><tr id="gr_svn45_339"

><td id="339"><a href="#339">339</a></td></tr
><tr id="gr_svn45_340"

><td id="340"><a href="#340">340</a></td></tr
><tr id="gr_svn45_341"

><td id="341"><a href="#341">341</a></td></tr
><tr id="gr_svn45_342"

><td id="342"><a href="#342">342</a></td></tr
><tr id="gr_svn45_343"

><td id="343"><a href="#343">343</a></td></tr
><tr id="gr_svn45_344"

><td id="344"><a href="#344">344</a></td></tr
><tr id="gr_svn45_345"

><td id="345"><a href="#345">345</a></td></tr
><tr id="gr_svn45_346"

><td id="346"><a href="#346">346</a></td></tr
><tr id="gr_svn45_347"

><td id="347"><a href="#347">347</a></td></tr
><tr id="gr_svn45_348"

><td id="348"><a href="#348">348</a></td></tr
><tr id="gr_svn45_349"

><td id="349"><a href="#349">349</a></td></tr
><tr id="gr_svn45_350"

><td id="350"><a href="#350">350</a></td></tr
><tr id="gr_svn45_351"

><td id="351"><a href="#351">351</a></td></tr
><tr id="gr_svn45_352"

><td id="352"><a href="#352">352</a></td></tr
><tr id="gr_svn45_353"

><td id="353"><a href="#353">353</a></td></tr
><tr id="gr_svn45_354"

><td id="354"><a href="#354">354</a></td></tr
><tr id="gr_svn45_355"

><td id="355"><a href="#355">355</a></td></tr
><tr id="gr_svn45_356"

><td id="356"><a href="#356">356</a></td></tr
><tr id="gr_svn45_357"

><td id="357"><a href="#357">357</a></td></tr
><tr id="gr_svn45_358"

><td id="358"><a href="#358">358</a></td></tr
><tr id="gr_svn45_359"

><td id="359"><a href="#359">359</a></td></tr
><tr id="gr_svn45_360"

><td id="360"><a href="#360">360</a></td></tr
><tr id="gr_svn45_361"

><td id="361"><a href="#361">361</a></td></tr
><tr id="gr_svn45_362"

><td id="362"><a href="#362">362</a></td></tr
><tr id="gr_svn45_363"

><td id="363"><a href="#363">363</a></td></tr
><tr id="gr_svn45_364"

><td id="364"><a href="#364">364</a></td></tr
><tr id="gr_svn45_365"

><td id="365"><a href="#365">365</a></td></tr
><tr id="gr_svn45_366"

><td id="366"><a href="#366">366</a></td></tr
><tr id="gr_svn45_367"

><td id="367"><a href="#367">367</a></td></tr
><tr id="gr_svn45_368"

><td id="368"><a href="#368">368</a></td></tr
><tr id="gr_svn45_369"

><td id="369"><a href="#369">369</a></td></tr
><tr id="gr_svn45_370"

><td id="370"><a href="#370">370</a></td></tr
><tr id="gr_svn45_371"

><td id="371"><a href="#371">371</a></td></tr
><tr id="gr_svn45_372"

><td id="372"><a href="#372">372</a></td></tr
><tr id="gr_svn45_373"

><td id="373"><a href="#373">373</a></td></tr
><tr id="gr_svn45_374"

><td id="374"><a href="#374">374</a></td></tr
><tr id="gr_svn45_375"

><td id="375"><a href="#375">375</a></td></tr
><tr id="gr_svn45_376"

><td id="376"><a href="#376">376</a></td></tr
><tr id="gr_svn45_377"

><td id="377"><a href="#377">377</a></td></tr
><tr id="gr_svn45_378"

><td id="378"><a href="#378">378</a></td></tr
><tr id="gr_svn45_379"

><td id="379"><a href="#379">379</a></td></tr
><tr id="gr_svn45_380"

><td id="380"><a href="#380">380</a></td></tr
><tr id="gr_svn45_381"

><td id="381"><a href="#381">381</a></td></tr
><tr id="gr_svn45_382"

><td id="382"><a href="#382">382</a></td></tr
><tr id="gr_svn45_383"

><td id="383"><a href="#383">383</a></td></tr
><tr id="gr_svn45_384"

><td id="384"><a href="#384">384</a></td></tr
><tr id="gr_svn45_385"

><td id="385"><a href="#385">385</a></td></tr
><tr id="gr_svn45_386"

><td id="386"><a href="#386">386</a></td></tr
><tr id="gr_svn45_387"

><td id="387"><a href="#387">387</a></td></tr
><tr id="gr_svn45_388"

><td id="388"><a href="#388">388</a></td></tr
><tr id="gr_svn45_389"

><td id="389"><a href="#389">389</a></td></tr
><tr id="gr_svn45_390"

><td id="390"><a href="#390">390</a></td></tr
><tr id="gr_svn45_391"

><td id="391"><a href="#391">391</a></td></tr
><tr id="gr_svn45_392"

><td id="392"><a href="#392">392</a></td></tr
><tr id="gr_svn45_393"

><td id="393"><a href="#393">393</a></td></tr
><tr id="gr_svn45_394"

><td id="394"><a href="#394">394</a></td></tr
><tr id="gr_svn45_395"

><td id="395"><a href="#395">395</a></td></tr
><tr id="gr_svn45_396"

><td id="396"><a href="#396">396</a></td></tr
><tr id="gr_svn45_397"

><td id="397"><a href="#397">397</a></td></tr
><tr id="gr_svn45_398"

><td id="398"><a href="#398">398</a></td></tr
><tr id="gr_svn45_399"

><td id="399"><a href="#399">399</a></td></tr
><tr id="gr_svn45_400"

><td id="400"><a href="#400">400</a></td></tr
><tr id="gr_svn45_401"

><td id="401"><a href="#401">401</a></td></tr
><tr id="gr_svn45_402"

><td id="402"><a href="#402">402</a></td></tr
><tr id="gr_svn45_403"

><td id="403"><a href="#403">403</a></td></tr
><tr id="gr_svn45_404"

><td id="404"><a href="#404">404</a></td></tr
><tr id="gr_svn45_405"

><td id="405"><a href="#405">405</a></td></tr
><tr id="gr_svn45_406"

><td id="406"><a href="#406">406</a></td></tr
><tr id="gr_svn45_407"

><td id="407"><a href="#407">407</a></td></tr
><tr id="gr_svn45_408"

><td id="408"><a href="#408">408</a></td></tr
><tr id="gr_svn45_409"

><td id="409"><a href="#409">409</a></td></tr
><tr id="gr_svn45_410"

><td id="410"><a href="#410">410</a></td></tr
><tr id="gr_svn45_411"

><td id="411"><a href="#411">411</a></td></tr
><tr id="gr_svn45_412"

><td id="412"><a href="#412">412</a></td></tr
><tr id="gr_svn45_413"

><td id="413"><a href="#413">413</a></td></tr
><tr id="gr_svn45_414"

><td id="414"><a href="#414">414</a></td></tr
><tr id="gr_svn45_415"

><td id="415"><a href="#415">415</a></td></tr
><tr id="gr_svn45_416"

><td id="416"><a href="#416">416</a></td></tr
><tr id="gr_svn45_417"

><td id="417"><a href="#417">417</a></td></tr
><tr id="gr_svn45_418"

><td id="418"><a href="#418">418</a></td></tr
><tr id="gr_svn45_419"

><td id="419"><a href="#419">419</a></td></tr
><tr id="gr_svn45_420"

><td id="420"><a href="#420">420</a></td></tr
><tr id="gr_svn45_421"

><td id="421"><a href="#421">421</a></td></tr
><tr id="gr_svn45_422"

><td id="422"><a href="#422">422</a></td></tr
><tr id="gr_svn45_423"

><td id="423"><a href="#423">423</a></td></tr
><tr id="gr_svn45_424"

><td id="424"><a href="#424">424</a></td></tr
><tr id="gr_svn45_425"

><td id="425"><a href="#425">425</a></td></tr
><tr id="gr_svn45_426"

><td id="426"><a href="#426">426</a></td></tr
><tr id="gr_svn45_427"

><td id="427"><a href="#427">427</a></td></tr
><tr id="gr_svn45_428"

><td id="428"><a href="#428">428</a></td></tr
><tr id="gr_svn45_429"

><td id="429"><a href="#429">429</a></td></tr
><tr id="gr_svn45_430"

><td id="430"><a href="#430">430</a></td></tr
><tr id="gr_svn45_431"

><td id="431"><a href="#431">431</a></td></tr
><tr id="gr_svn45_432"

><td id="432"><a href="#432">432</a></td></tr
><tr id="gr_svn45_433"

><td id="433"><a href="#433">433</a></td></tr
><tr id="gr_svn45_434"

><td id="434"><a href="#434">434</a></td></tr
><tr id="gr_svn45_435"

><td id="435"><a href="#435">435</a></td></tr
><tr id="gr_svn45_436"

><td id="436"><a href="#436">436</a></td></tr
><tr id="gr_svn45_437"

><td id="437"><a href="#437">437</a></td></tr
><tr id="gr_svn45_438"

><td id="438"><a href="#438">438</a></td></tr
><tr id="gr_svn45_439"

><td id="439"><a href="#439">439</a></td></tr
><tr id="gr_svn45_440"

><td id="440"><a href="#440">440</a></td></tr
><tr id="gr_svn45_441"

><td id="441"><a href="#441">441</a></td></tr
><tr id="gr_svn45_442"

><td id="442"><a href="#442">442</a></td></tr
><tr id="gr_svn45_443"

><td id="443"><a href="#443">443</a></td></tr
><tr id="gr_svn45_444"

><td id="444"><a href="#444">444</a></td></tr
><tr id="gr_svn45_445"

><td id="445"><a href="#445">445</a></td></tr
><tr id="gr_svn45_446"

><td id="446"><a href="#446">446</a></td></tr
><tr id="gr_svn45_447"

><td id="447"><a href="#447">447</a></td></tr
><tr id="gr_svn45_448"

><td id="448"><a href="#448">448</a></td></tr
><tr id="gr_svn45_449"

><td id="449"><a href="#449">449</a></td></tr
><tr id="gr_svn45_450"

><td id="450"><a href="#450">450</a></td></tr
><tr id="gr_svn45_451"

><td id="451"><a href="#451">451</a></td></tr
><tr id="gr_svn45_452"

><td id="452"><a href="#452">452</a></td></tr
><tr id="gr_svn45_453"

><td id="453"><a href="#453">453</a></td></tr
><tr id="gr_svn45_454"

><td id="454"><a href="#454">454</a></td></tr
><tr id="gr_svn45_455"

><td id="455"><a href="#455">455</a></td></tr
><tr id="gr_svn45_456"

><td id="456"><a href="#456">456</a></td></tr
><tr id="gr_svn45_457"

><td id="457"><a href="#457">457</a></td></tr
><tr id="gr_svn45_458"

><td id="458"><a href="#458">458</a></td></tr
><tr id="gr_svn45_459"

><td id="459"><a href="#459">459</a></td></tr
><tr id="gr_svn45_460"

><td id="460"><a href="#460">460</a></td></tr
><tr id="gr_svn45_461"

><td id="461"><a href="#461">461</a></td></tr
><tr id="gr_svn45_462"

><td id="462"><a href="#462">462</a></td></tr
><tr id="gr_svn45_463"

><td id="463"><a href="#463">463</a></td></tr
><tr id="gr_svn45_464"

><td id="464"><a href="#464">464</a></td></tr
><tr id="gr_svn45_465"

><td id="465"><a href="#465">465</a></td></tr
><tr id="gr_svn45_466"

><td id="466"><a href="#466">466</a></td></tr
><tr id="gr_svn45_467"

><td id="467"><a href="#467">467</a></td></tr
><tr id="gr_svn45_468"

><td id="468"><a href="#468">468</a></td></tr
><tr id="gr_svn45_469"

><td id="469"><a href="#469">469</a></td></tr
><tr id="gr_svn45_470"

><td id="470"><a href="#470">470</a></td></tr
><tr id="gr_svn45_471"

><td id="471"><a href="#471">471</a></td></tr
><tr id="gr_svn45_472"

><td id="472"><a href="#472">472</a></td></tr
><tr id="gr_svn45_473"

><td id="473"><a href="#473">473</a></td></tr
><tr id="gr_svn45_474"

><td id="474"><a href="#474">474</a></td></tr
><tr id="gr_svn45_475"

><td id="475"><a href="#475">475</a></td></tr
><tr id="gr_svn45_476"

><td id="476"><a href="#476">476</a></td></tr
><tr id="gr_svn45_477"

><td id="477"><a href="#477">477</a></td></tr
><tr id="gr_svn45_478"

><td id="478"><a href="#478">478</a></td></tr
><tr id="gr_svn45_479"

><td id="479"><a href="#479">479</a></td></tr
><tr id="gr_svn45_480"

><td id="480"><a href="#480">480</a></td></tr
><tr id="gr_svn45_481"

><td id="481"><a href="#481">481</a></td></tr
><tr id="gr_svn45_482"

><td id="482"><a href="#482">482</a></td></tr
><tr id="gr_svn45_483"

><td id="483"><a href="#483">483</a></td></tr
><tr id="gr_svn45_484"

><td id="484"><a href="#484">484</a></td></tr
><tr id="gr_svn45_485"

><td id="485"><a href="#485">485</a></td></tr
><tr id="gr_svn45_486"

><td id="486"><a href="#486">486</a></td></tr
><tr id="gr_svn45_487"

><td id="487"><a href="#487">487</a></td></tr
><tr id="gr_svn45_488"

><td id="488"><a href="#488">488</a></td></tr
><tr id="gr_svn45_489"

><td id="489"><a href="#489">489</a></td></tr
><tr id="gr_svn45_490"

><td id="490"><a href="#490">490</a></td></tr
><tr id="gr_svn45_491"

><td id="491"><a href="#491">491</a></td></tr
><tr id="gr_svn45_492"

><td id="492"><a href="#492">492</a></td></tr
><tr id="gr_svn45_493"

><td id="493"><a href="#493">493</a></td></tr
><tr id="gr_svn45_494"

><td id="494"><a href="#494">494</a></td></tr
><tr id="gr_svn45_495"

><td id="495"><a href="#495">495</a></td></tr
><tr id="gr_svn45_496"

><td id="496"><a href="#496">496</a></td></tr
><tr id="gr_svn45_497"

><td id="497"><a href="#497">497</a></td></tr
><tr id="gr_svn45_498"

><td id="498"><a href="#498">498</a></td></tr
><tr id="gr_svn45_499"

><td id="499"><a href="#499">499</a></td></tr
><tr id="gr_svn45_500"

><td id="500"><a href="#500">500</a></td></tr
><tr id="gr_svn45_501"

><td id="501"><a href="#501">501</a></td></tr
><tr id="gr_svn45_502"

><td id="502"><a href="#502">502</a></td></tr
><tr id="gr_svn45_503"

><td id="503"><a href="#503">503</a></td></tr
><tr id="gr_svn45_504"

><td id="504"><a href="#504">504</a></td></tr
><tr id="gr_svn45_505"

><td id="505"><a href="#505">505</a></td></tr
><tr id="gr_svn45_506"

><td id="506"><a href="#506">506</a></td></tr
><tr id="gr_svn45_507"

><td id="507"><a href="#507">507</a></td></tr
><tr id="gr_svn45_508"

><td id="508"><a href="#508">508</a></td></tr
><tr id="gr_svn45_509"

><td id="509"><a href="#509">509</a></td></tr
><tr id="gr_svn45_510"

><td id="510"><a href="#510">510</a></td></tr
><tr id="gr_svn45_511"

><td id="511"><a href="#511">511</a></td></tr
><tr id="gr_svn45_512"

><td id="512"><a href="#512">512</a></td></tr
><tr id="gr_svn45_513"

><td id="513"><a href="#513">513</a></td></tr
><tr id="gr_svn45_514"

><td id="514"><a href="#514">514</a></td></tr
><tr id="gr_svn45_515"

><td id="515"><a href="#515">515</a></td></tr
><tr id="gr_svn45_516"

><td id="516"><a href="#516">516</a></td></tr
><tr id="gr_svn45_517"

><td id="517"><a href="#517">517</a></td></tr
><tr id="gr_svn45_518"

><td id="518"><a href="#518">518</a></td></tr
><tr id="gr_svn45_519"

><td id="519"><a href="#519">519</a></td></tr
><tr id="gr_svn45_520"

><td id="520"><a href="#520">520</a></td></tr
><tr id="gr_svn45_521"

><td id="521"><a href="#521">521</a></td></tr
><tr id="gr_svn45_522"

><td id="522"><a href="#522">522</a></td></tr
><tr id="gr_svn45_523"

><td id="523"><a href="#523">523</a></td></tr
><tr id="gr_svn45_524"

><td id="524"><a href="#524">524</a></td></tr
><tr id="gr_svn45_525"

><td id="525"><a href="#525">525</a></td></tr
><tr id="gr_svn45_526"

><td id="526"><a href="#526">526</a></td></tr
><tr id="gr_svn45_527"

><td id="527"><a href="#527">527</a></td></tr
><tr id="gr_svn45_528"

><td id="528"><a href="#528">528</a></td></tr
><tr id="gr_svn45_529"

><td id="529"><a href="#529">529</a></td></tr
><tr id="gr_svn45_530"

><td id="530"><a href="#530">530</a></td></tr
><tr id="gr_svn45_531"

><td id="531"><a href="#531">531</a></td></tr
><tr id="gr_svn45_532"

><td id="532"><a href="#532">532</a></td></tr
><tr id="gr_svn45_533"

><td id="533"><a href="#533">533</a></td></tr
><tr id="gr_svn45_534"

><td id="534"><a href="#534">534</a></td></tr
><tr id="gr_svn45_535"

><td id="535"><a href="#535">535</a></td></tr
><tr id="gr_svn45_536"

><td id="536"><a href="#536">536</a></td></tr
><tr id="gr_svn45_537"

><td id="537"><a href="#537">537</a></td></tr
><tr id="gr_svn45_538"

><td id="538"><a href="#538">538</a></td></tr
><tr id="gr_svn45_539"

><td id="539"><a href="#539">539</a></td></tr
><tr id="gr_svn45_540"

><td id="540"><a href="#540">540</a></td></tr
><tr id="gr_svn45_541"

><td id="541"><a href="#541">541</a></td></tr
><tr id="gr_svn45_542"

><td id="542"><a href="#542">542</a></td></tr
><tr id="gr_svn45_543"

><td id="543"><a href="#543">543</a></td></tr
><tr id="gr_svn45_544"

><td id="544"><a href="#544">544</a></td></tr
><tr id="gr_svn45_545"

><td id="545"><a href="#545">545</a></td></tr
><tr id="gr_svn45_546"

><td id="546"><a href="#546">546</a></td></tr
><tr id="gr_svn45_547"

><td id="547"><a href="#547">547</a></td></tr
><tr id="gr_svn45_548"

><td id="548"><a href="#548">548</a></td></tr
><tr id="gr_svn45_549"

><td id="549"><a href="#549">549</a></td></tr
><tr id="gr_svn45_550"

><td id="550"><a href="#550">550</a></td></tr
><tr id="gr_svn45_551"

><td id="551"><a href="#551">551</a></td></tr
><tr id="gr_svn45_552"

><td id="552"><a href="#552">552</a></td></tr
><tr id="gr_svn45_553"

><td id="553"><a href="#553">553</a></td></tr
><tr id="gr_svn45_554"

><td id="554"><a href="#554">554</a></td></tr
><tr id="gr_svn45_555"

><td id="555"><a href="#555">555</a></td></tr
><tr id="gr_svn45_556"

><td id="556"><a href="#556">556</a></td></tr
><tr id="gr_svn45_557"

><td id="557"><a href="#557">557</a></td></tr
><tr id="gr_svn45_558"

><td id="558"><a href="#558">558</a></td></tr
><tr id="gr_svn45_559"

><td id="559"><a href="#559">559</a></td></tr
><tr id="gr_svn45_560"

><td id="560"><a href="#560">560</a></td></tr
><tr id="gr_svn45_561"

><td id="561"><a href="#561">561</a></td></tr
><tr id="gr_svn45_562"

><td id="562"><a href="#562">562</a></td></tr
><tr id="gr_svn45_563"

><td id="563"><a href="#563">563</a></td></tr
><tr id="gr_svn45_564"

><td id="564"><a href="#564">564</a></td></tr
><tr id="gr_svn45_565"

><td id="565"><a href="#565">565</a></td></tr
><tr id="gr_svn45_566"

><td id="566"><a href="#566">566</a></td></tr
><tr id="gr_svn45_567"

><td id="567"><a href="#567">567</a></td></tr
><tr id="gr_svn45_568"

><td id="568"><a href="#568">568</a></td></tr
><tr id="gr_svn45_569"

><td id="569"><a href="#569">569</a></td></tr
><tr id="gr_svn45_570"

><td id="570"><a href="#570">570</a></td></tr
><tr id="gr_svn45_571"

><td id="571"><a href="#571">571</a></td></tr
><tr id="gr_svn45_572"

><td id="572"><a href="#572">572</a></td></tr
><tr id="gr_svn45_573"

><td id="573"><a href="#573">573</a></td></tr
><tr id="gr_svn45_574"

><td id="574"><a href="#574">574</a></td></tr
><tr id="gr_svn45_575"

><td id="575"><a href="#575">575</a></td></tr
><tr id="gr_svn45_576"

><td id="576"><a href="#576">576</a></td></tr
><tr id="gr_svn45_577"

><td id="577"><a href="#577">577</a></td></tr
><tr id="gr_svn45_578"

><td id="578"><a href="#578">578</a></td></tr
><tr id="gr_svn45_579"

><td id="579"><a href="#579">579</a></td></tr
><tr id="gr_svn45_580"

><td id="580"><a href="#580">580</a></td></tr
><tr id="gr_svn45_581"

><td id="581"><a href="#581">581</a></td></tr
><tr id="gr_svn45_582"

><td id="582"><a href="#582">582</a></td></tr
><tr id="gr_svn45_583"

><td id="583"><a href="#583">583</a></td></tr
><tr id="gr_svn45_584"

><td id="584"><a href="#584">584</a></td></tr
><tr id="gr_svn45_585"

><td id="585"><a href="#585">585</a></td></tr
><tr id="gr_svn45_586"

><td id="586"><a href="#586">586</a></td></tr
><tr id="gr_svn45_587"

><td id="587"><a href="#587">587</a></td></tr
><tr id="gr_svn45_588"

><td id="588"><a href="#588">588</a></td></tr
><tr id="gr_svn45_589"

><td id="589"><a href="#589">589</a></td></tr
><tr id="gr_svn45_590"

><td id="590"><a href="#590">590</a></td></tr
><tr id="gr_svn45_591"

><td id="591"><a href="#591">591</a></td></tr
><tr id="gr_svn45_592"

><td id="592"><a href="#592">592</a></td></tr
><tr id="gr_svn45_593"

><td id="593"><a href="#593">593</a></td></tr
><tr id="gr_svn45_594"

><td id="594"><a href="#594">594</a></td></tr
><tr id="gr_svn45_595"

><td id="595"><a href="#595">595</a></td></tr
><tr id="gr_svn45_596"

><td id="596"><a href="#596">596</a></td></tr
><tr id="gr_svn45_597"

><td id="597"><a href="#597">597</a></td></tr
><tr id="gr_svn45_598"

><td id="598"><a href="#598">598</a></td></tr
><tr id="gr_svn45_599"

><td id="599"><a href="#599">599</a></td></tr
><tr id="gr_svn45_600"

><td id="600"><a href="#600">600</a></td></tr
><tr id="gr_svn45_601"

><td id="601"><a href="#601">601</a></td></tr
><tr id="gr_svn45_602"

><td id="602"><a href="#602">602</a></td></tr
><tr id="gr_svn45_603"

><td id="603"><a href="#603">603</a></td></tr
><tr id="gr_svn45_604"

><td id="604"><a href="#604">604</a></td></tr
><tr id="gr_svn45_605"

><td id="605"><a href="#605">605</a></td></tr
><tr id="gr_svn45_606"

><td id="606"><a href="#606">606</a></td></tr
><tr id="gr_svn45_607"

><td id="607"><a href="#607">607</a></td></tr
><tr id="gr_svn45_608"

><td id="608"><a href="#608">608</a></td></tr
><tr id="gr_svn45_609"

><td id="609"><a href="#609">609</a></td></tr
><tr id="gr_svn45_610"

><td id="610"><a href="#610">610</a></td></tr
><tr id="gr_svn45_611"

><td id="611"><a href="#611">611</a></td></tr
><tr id="gr_svn45_612"

><td id="612"><a href="#612">612</a></td></tr
><tr id="gr_svn45_613"

><td id="613"><a href="#613">613</a></td></tr
><tr id="gr_svn45_614"

><td id="614"><a href="#614">614</a></td></tr
><tr id="gr_svn45_615"

><td id="615"><a href="#615">615</a></td></tr
><tr id="gr_svn45_616"

><td id="616"><a href="#616">616</a></td></tr
><tr id="gr_svn45_617"

><td id="617"><a href="#617">617</a></td></tr
><tr id="gr_svn45_618"

><td id="618"><a href="#618">618</a></td></tr
><tr id="gr_svn45_619"

><td id="619"><a href="#619">619</a></td></tr
><tr id="gr_svn45_620"

><td id="620"><a href="#620">620</a></td></tr
><tr id="gr_svn45_621"

><td id="621"><a href="#621">621</a></td></tr
><tr id="gr_svn45_622"

><td id="622"><a href="#622">622</a></td></tr
><tr id="gr_svn45_623"

><td id="623"><a href="#623">623</a></td></tr
><tr id="gr_svn45_624"

><td id="624"><a href="#624">624</a></td></tr
><tr id="gr_svn45_625"

><td id="625"><a href="#625">625</a></td></tr
><tr id="gr_svn45_626"

><td id="626"><a href="#626">626</a></td></tr
><tr id="gr_svn45_627"

><td id="627"><a href="#627">627</a></td></tr
><tr id="gr_svn45_628"

><td id="628"><a href="#628">628</a></td></tr
><tr id="gr_svn45_629"

><td id="629"><a href="#629">629</a></td></tr
><tr id="gr_svn45_630"

><td id="630"><a href="#630">630</a></td></tr
><tr id="gr_svn45_631"

><td id="631"><a href="#631">631</a></td></tr
><tr id="gr_svn45_632"

><td id="632"><a href="#632">632</a></td></tr
><tr id="gr_svn45_633"

><td id="633"><a href="#633">633</a></td></tr
><tr id="gr_svn45_634"

><td id="634"><a href="#634">634</a></td></tr
><tr id="gr_svn45_635"

><td id="635"><a href="#635">635</a></td></tr
><tr id="gr_svn45_636"

><td id="636"><a href="#636">636</a></td></tr
><tr id="gr_svn45_637"

><td id="637"><a href="#637">637</a></td></tr
><tr id="gr_svn45_638"

><td id="638"><a href="#638">638</a></td></tr
><tr id="gr_svn45_639"

><td id="639"><a href="#639">639</a></td></tr
><tr id="gr_svn45_640"

><td id="640"><a href="#640">640</a></td></tr
><tr id="gr_svn45_641"

><td id="641"><a href="#641">641</a></td></tr
><tr id="gr_svn45_642"

><td id="642"><a href="#642">642</a></td></tr
><tr id="gr_svn45_643"

><td id="643"><a href="#643">643</a></td></tr
><tr id="gr_svn45_644"

><td id="644"><a href="#644">644</a></td></tr
><tr id="gr_svn45_645"

><td id="645"><a href="#645">645</a></td></tr
><tr id="gr_svn45_646"

><td id="646"><a href="#646">646</a></td></tr
><tr id="gr_svn45_647"

><td id="647"><a href="#647">647</a></td></tr
><tr id="gr_svn45_648"

><td id="648"><a href="#648">648</a></td></tr
><tr id="gr_svn45_649"

><td id="649"><a href="#649">649</a></td></tr
><tr id="gr_svn45_650"

><td id="650"><a href="#650">650</a></td></tr
><tr id="gr_svn45_651"

><td id="651"><a href="#651">651</a></td></tr
><tr id="gr_svn45_652"

><td id="652"><a href="#652">652</a></td></tr
><tr id="gr_svn45_653"

><td id="653"><a href="#653">653</a></td></tr
><tr id="gr_svn45_654"

><td id="654"><a href="#654">654</a></td></tr
><tr id="gr_svn45_655"

><td id="655"><a href="#655">655</a></td></tr
><tr id="gr_svn45_656"

><td id="656"><a href="#656">656</a></td></tr
><tr id="gr_svn45_657"

><td id="657"><a href="#657">657</a></td></tr
><tr id="gr_svn45_658"

><td id="658"><a href="#658">658</a></td></tr
><tr id="gr_svn45_659"

><td id="659"><a href="#659">659</a></td></tr
><tr id="gr_svn45_660"

><td id="660"><a href="#660">660</a></td></tr
><tr id="gr_svn45_661"

><td id="661"><a href="#661">661</a></td></tr
><tr id="gr_svn45_662"

><td id="662"><a href="#662">662</a></td></tr
><tr id="gr_svn45_663"

><td id="663"><a href="#663">663</a></td></tr
><tr id="gr_svn45_664"

><td id="664"><a href="#664">664</a></td></tr
><tr id="gr_svn45_665"

><td id="665"><a href="#665">665</a></td></tr
><tr id="gr_svn45_666"

><td id="666"><a href="#666">666</a></td></tr
><tr id="gr_svn45_667"

><td id="667"><a href="#667">667</a></td></tr
><tr id="gr_svn45_668"

><td id="668"><a href="#668">668</a></td></tr
><tr id="gr_svn45_669"

><td id="669"><a href="#669">669</a></td></tr
><tr id="gr_svn45_670"

><td id="670"><a href="#670">670</a></td></tr
><tr id="gr_svn45_671"

><td id="671"><a href="#671">671</a></td></tr
><tr id="gr_svn45_672"

><td id="672"><a href="#672">672</a></td></tr
><tr id="gr_svn45_673"

><td id="673"><a href="#673">673</a></td></tr
><tr id="gr_svn45_674"

><td id="674"><a href="#674">674</a></td></tr
><tr id="gr_svn45_675"

><td id="675"><a href="#675">675</a></td></tr
><tr id="gr_svn45_676"

><td id="676"><a href="#676">676</a></td></tr
><tr id="gr_svn45_677"

><td id="677"><a href="#677">677</a></td></tr
><tr id="gr_svn45_678"

><td id="678"><a href="#678">678</a></td></tr
><tr id="gr_svn45_679"

><td id="679"><a href="#679">679</a></td></tr
><tr id="gr_svn45_680"

><td id="680"><a href="#680">680</a></td></tr
><tr id="gr_svn45_681"

><td id="681"><a href="#681">681</a></td></tr
><tr id="gr_svn45_682"

><td id="682"><a href="#682">682</a></td></tr
><tr id="gr_svn45_683"

><td id="683"><a href="#683">683</a></td></tr
><tr id="gr_svn45_684"

><td id="684"><a href="#684">684</a></td></tr
><tr id="gr_svn45_685"

><td id="685"><a href="#685">685</a></td></tr
><tr id="gr_svn45_686"

><td id="686"><a href="#686">686</a></td></tr
><tr id="gr_svn45_687"

><td id="687"><a href="#687">687</a></td></tr
><tr id="gr_svn45_688"

><td id="688"><a href="#688">688</a></td></tr
><tr id="gr_svn45_689"

><td id="689"><a href="#689">689</a></td></tr
><tr id="gr_svn45_690"

><td id="690"><a href="#690">690</a></td></tr
><tr id="gr_svn45_691"

><td id="691"><a href="#691">691</a></td></tr
><tr id="gr_svn45_692"

><td id="692"><a href="#692">692</a></td></tr
><tr id="gr_svn45_693"

><td id="693"><a href="#693">693</a></td></tr
><tr id="gr_svn45_694"

><td id="694"><a href="#694">694</a></td></tr
><tr id="gr_svn45_695"

><td id="695"><a href="#695">695</a></td></tr
><tr id="gr_svn45_696"

><td id="696"><a href="#696">696</a></td></tr
><tr id="gr_svn45_697"

><td id="697"><a href="#697">697</a></td></tr
><tr id="gr_svn45_698"

><td id="698"><a href="#698">698</a></td></tr
><tr id="gr_svn45_699"

><td id="699"><a href="#699">699</a></td></tr
><tr id="gr_svn45_700"

><td id="700"><a href="#700">700</a></td></tr
><tr id="gr_svn45_701"

><td id="701"><a href="#701">701</a></td></tr
><tr id="gr_svn45_702"

><td id="702"><a href="#702">702</a></td></tr
><tr id="gr_svn45_703"

><td id="703"><a href="#703">703</a></td></tr
><tr id="gr_svn45_704"

><td id="704"><a href="#704">704</a></td></tr
><tr id="gr_svn45_705"

><td id="705"><a href="#705">705</a></td></tr
><tr id="gr_svn45_706"

><td id="706"><a href="#706">706</a></td></tr
><tr id="gr_svn45_707"

><td id="707"><a href="#707">707</a></td></tr
><tr id="gr_svn45_708"

><td id="708"><a href="#708">708</a></td></tr
><tr id="gr_svn45_709"

><td id="709"><a href="#709">709</a></td></tr
><tr id="gr_svn45_710"

><td id="710"><a href="#710">710</a></td></tr
><tr id="gr_svn45_711"

><td id="711"><a href="#711">711</a></td></tr
><tr id="gr_svn45_712"

><td id="712"><a href="#712">712</a></td></tr
><tr id="gr_svn45_713"

><td id="713"><a href="#713">713</a></td></tr
><tr id="gr_svn45_714"

><td id="714"><a href="#714">714</a></td></tr
><tr id="gr_svn45_715"

><td id="715"><a href="#715">715</a></td></tr
><tr id="gr_svn45_716"

><td id="716"><a href="#716">716</a></td></tr
><tr id="gr_svn45_717"

><td id="717"><a href="#717">717</a></td></tr
><tr id="gr_svn45_718"

><td id="718"><a href="#718">718</a></td></tr
><tr id="gr_svn45_719"

><td id="719"><a href="#719">719</a></td></tr
><tr id="gr_svn45_720"

><td id="720"><a href="#720">720</a></td></tr
><tr id="gr_svn45_721"

><td id="721"><a href="#721">721</a></td></tr
><tr id="gr_svn45_722"

><td id="722"><a href="#722">722</a></td></tr
><tr id="gr_svn45_723"

><td id="723"><a href="#723">723</a></td></tr
><tr id="gr_svn45_724"

><td id="724"><a href="#724">724</a></td></tr
><tr id="gr_svn45_725"

><td id="725"><a href="#725">725</a></td></tr
><tr id="gr_svn45_726"

><td id="726"><a href="#726">726</a></td></tr
><tr id="gr_svn45_727"

><td id="727"><a href="#727">727</a></td></tr
><tr id="gr_svn45_728"

><td id="728"><a href="#728">728</a></td></tr
><tr id="gr_svn45_729"

><td id="729"><a href="#729">729</a></td></tr
><tr id="gr_svn45_730"

><td id="730"><a href="#730">730</a></td></tr
><tr id="gr_svn45_731"

><td id="731"><a href="#731">731</a></td></tr
><tr id="gr_svn45_732"

><td id="732"><a href="#732">732</a></td></tr
><tr id="gr_svn45_733"

><td id="733"><a href="#733">733</a></td></tr
><tr id="gr_svn45_734"

><td id="734"><a href="#734">734</a></td></tr
><tr id="gr_svn45_735"

><td id="735"><a href="#735">735</a></td></tr
><tr id="gr_svn45_736"

><td id="736"><a href="#736">736</a></td></tr
><tr id="gr_svn45_737"

><td id="737"><a href="#737">737</a></td></tr
><tr id="gr_svn45_738"

><td id="738"><a href="#738">738</a></td></tr
><tr id="gr_svn45_739"

><td id="739"><a href="#739">739</a></td></tr
><tr id="gr_svn45_740"

><td id="740"><a href="#740">740</a></td></tr
><tr id="gr_svn45_741"

><td id="741"><a href="#741">741</a></td></tr
><tr id="gr_svn45_742"

><td id="742"><a href="#742">742</a></td></tr
><tr id="gr_svn45_743"

><td id="743"><a href="#743">743</a></td></tr
><tr id="gr_svn45_744"

><td id="744"><a href="#744">744</a></td></tr
><tr id="gr_svn45_745"

><td id="745"><a href="#745">745</a></td></tr
><tr id="gr_svn45_746"

><td id="746"><a href="#746">746</a></td></tr
><tr id="gr_svn45_747"

><td id="747"><a href="#747">747</a></td></tr
><tr id="gr_svn45_748"

><td id="748"><a href="#748">748</a></td></tr
><tr id="gr_svn45_749"

><td id="749"><a href="#749">749</a></td></tr
><tr id="gr_svn45_750"

><td id="750"><a href="#750">750</a></td></tr
><tr id="gr_svn45_751"

><td id="751"><a href="#751">751</a></td></tr
><tr id="gr_svn45_752"

><td id="752"><a href="#752">752</a></td></tr
><tr id="gr_svn45_753"

><td id="753"><a href="#753">753</a></td></tr
><tr id="gr_svn45_754"

><td id="754"><a href="#754">754</a></td></tr
><tr id="gr_svn45_755"

><td id="755"><a href="#755">755</a></td></tr
><tr id="gr_svn45_756"

><td id="756"><a href="#756">756</a></td></tr
><tr id="gr_svn45_757"

><td id="757"><a href="#757">757</a></td></tr
><tr id="gr_svn45_758"

><td id="758"><a href="#758">758</a></td></tr
><tr id="gr_svn45_759"

><td id="759"><a href="#759">759</a></td></tr
><tr id="gr_svn45_760"

><td id="760"><a href="#760">760</a></td></tr
><tr id="gr_svn45_761"

><td id="761"><a href="#761">761</a></td></tr
><tr id="gr_svn45_762"

><td id="762"><a href="#762">762</a></td></tr
><tr id="gr_svn45_763"

><td id="763"><a href="#763">763</a></td></tr
><tr id="gr_svn45_764"

><td id="764"><a href="#764">764</a></td></tr
><tr id="gr_svn45_765"

><td id="765"><a href="#765">765</a></td></tr
><tr id="gr_svn45_766"

><td id="766"><a href="#766">766</a></td></tr
><tr id="gr_svn45_767"

><td id="767"><a href="#767">767</a></td></tr
><tr id="gr_svn45_768"

><td id="768"><a href="#768">768</a></td></tr
><tr id="gr_svn45_769"

><td id="769"><a href="#769">769</a></td></tr
><tr id="gr_svn45_770"

><td id="770"><a href="#770">770</a></td></tr
><tr id="gr_svn45_771"

><td id="771"><a href="#771">771</a></td></tr
><tr id="gr_svn45_772"

><td id="772"><a href="#772">772</a></td></tr
><tr id="gr_svn45_773"

><td id="773"><a href="#773">773</a></td></tr
><tr id="gr_svn45_774"

><td id="774"><a href="#774">774</a></td></tr
><tr id="gr_svn45_775"

><td id="775"><a href="#775">775</a></td></tr
><tr id="gr_svn45_776"

><td id="776"><a href="#776">776</a></td></tr
><tr id="gr_svn45_777"

><td id="777"><a href="#777">777</a></td></tr
><tr id="gr_svn45_778"

><td id="778"><a href="#778">778</a></td></tr
><tr id="gr_svn45_779"

><td id="779"><a href="#779">779</a></td></tr
><tr id="gr_svn45_780"

><td id="780"><a href="#780">780</a></td></tr
><tr id="gr_svn45_781"

><td id="781"><a href="#781">781</a></td></tr
><tr id="gr_svn45_782"

><td id="782"><a href="#782">782</a></td></tr
><tr id="gr_svn45_783"

><td id="783"><a href="#783">783</a></td></tr
><tr id="gr_svn45_784"

><td id="784"><a href="#784">784</a></td></tr
><tr id="gr_svn45_785"

><td id="785"><a href="#785">785</a></td></tr
><tr id="gr_svn45_786"

><td id="786"><a href="#786">786</a></td></tr
><tr id="gr_svn45_787"

><td id="787"><a href="#787">787</a></td></tr
><tr id="gr_svn45_788"

><td id="788"><a href="#788">788</a></td></tr
><tr id="gr_svn45_789"

><td id="789"><a href="#789">789</a></td></tr
><tr id="gr_svn45_790"

><td id="790"><a href="#790">790</a></td></tr
><tr id="gr_svn45_791"

><td id="791"><a href="#791">791</a></td></tr
><tr id="gr_svn45_792"

><td id="792"><a href="#792">792</a></td></tr
><tr id="gr_svn45_793"

><td id="793"><a href="#793">793</a></td></tr
><tr id="gr_svn45_794"

><td id="794"><a href="#794">794</a></td></tr
><tr id="gr_svn45_795"

><td id="795"><a href="#795">795</a></td></tr
><tr id="gr_svn45_796"

><td id="796"><a href="#796">796</a></td></tr
><tr id="gr_svn45_797"

><td id="797"><a href="#797">797</a></td></tr
><tr id="gr_svn45_798"

><td id="798"><a href="#798">798</a></td></tr
><tr id="gr_svn45_799"

><td id="799"><a href="#799">799</a></td></tr
><tr id="gr_svn45_800"

><td id="800"><a href="#800">800</a></td></tr
><tr id="gr_svn45_801"

><td id="801"><a href="#801">801</a></td></tr
><tr id="gr_svn45_802"

><td id="802"><a href="#802">802</a></td></tr
><tr id="gr_svn45_803"

><td id="803"><a href="#803">803</a></td></tr
><tr id="gr_svn45_804"

><td id="804"><a href="#804">804</a></td></tr
><tr id="gr_svn45_805"

><td id="805"><a href="#805">805</a></td></tr
><tr id="gr_svn45_806"

><td id="806"><a href="#806">806</a></td></tr
><tr id="gr_svn45_807"

><td id="807"><a href="#807">807</a></td></tr
><tr id="gr_svn45_808"

><td id="808"><a href="#808">808</a></td></tr
><tr id="gr_svn45_809"

><td id="809"><a href="#809">809</a></td></tr
><tr id="gr_svn45_810"

><td id="810"><a href="#810">810</a></td></tr
><tr id="gr_svn45_811"

><td id="811"><a href="#811">811</a></td></tr
><tr id="gr_svn45_812"

><td id="812"><a href="#812">812</a></td></tr
><tr id="gr_svn45_813"

><td id="813"><a href="#813">813</a></td></tr
><tr id="gr_svn45_814"

><td id="814"><a href="#814">814</a></td></tr
><tr id="gr_svn45_815"

><td id="815"><a href="#815">815</a></td></tr
><tr id="gr_svn45_816"

><td id="816"><a href="#816">816</a></td></tr
><tr id="gr_svn45_817"

><td id="817"><a href="#817">817</a></td></tr
><tr id="gr_svn45_818"

><td id="818"><a href="#818">818</a></td></tr
><tr id="gr_svn45_819"

><td id="819"><a href="#819">819</a></td></tr
><tr id="gr_svn45_820"

><td id="820"><a href="#820">820</a></td></tr
><tr id="gr_svn45_821"

><td id="821"><a href="#821">821</a></td></tr
><tr id="gr_svn45_822"

><td id="822"><a href="#822">822</a></td></tr
><tr id="gr_svn45_823"

><td id="823"><a href="#823">823</a></td></tr
><tr id="gr_svn45_824"

><td id="824"><a href="#824">824</a></td></tr
><tr id="gr_svn45_825"

><td id="825"><a href="#825">825</a></td></tr
><tr id="gr_svn45_826"

><td id="826"><a href="#826">826</a></td></tr
><tr id="gr_svn45_827"

><td id="827"><a href="#827">827</a></td></tr
><tr id="gr_svn45_828"

><td id="828"><a href="#828">828</a></td></tr
><tr id="gr_svn45_829"

><td id="829"><a href="#829">829</a></td></tr
><tr id="gr_svn45_830"

><td id="830"><a href="#830">830</a></td></tr
><tr id="gr_svn45_831"

><td id="831"><a href="#831">831</a></td></tr
><tr id="gr_svn45_832"

><td id="832"><a href="#832">832</a></td></tr
><tr id="gr_svn45_833"

><td id="833"><a href="#833">833</a></td></tr
><tr id="gr_svn45_834"

><td id="834"><a href="#834">834</a></td></tr
><tr id="gr_svn45_835"

><td id="835"><a href="#835">835</a></td></tr
><tr id="gr_svn45_836"

><td id="836"><a href="#836">836</a></td></tr
><tr id="gr_svn45_837"

><td id="837"><a href="#837">837</a></td></tr
><tr id="gr_svn45_838"

><td id="838"><a href="#838">838</a></td></tr
><tr id="gr_svn45_839"

><td id="839"><a href="#839">839</a></td></tr
><tr id="gr_svn45_840"

><td id="840"><a href="#840">840</a></td></tr
><tr id="gr_svn45_841"

><td id="841"><a href="#841">841</a></td></tr
><tr id="gr_svn45_842"

><td id="842"><a href="#842">842</a></td></tr
><tr id="gr_svn45_843"

><td id="843"><a href="#843">843</a></td></tr
><tr id="gr_svn45_844"

><td id="844"><a href="#844">844</a></td></tr
><tr id="gr_svn45_845"

><td id="845"><a href="#845">845</a></td></tr
><tr id="gr_svn45_846"

><td id="846"><a href="#846">846</a></td></tr
><tr id="gr_svn45_847"

><td id="847"><a href="#847">847</a></td></tr
><tr id="gr_svn45_848"

><td id="848"><a href="#848">848</a></td></tr
><tr id="gr_svn45_849"

><td id="849"><a href="#849">849</a></td></tr
><tr id="gr_svn45_850"

><td id="850"><a href="#850">850</a></td></tr
><tr id="gr_svn45_851"

><td id="851"><a href="#851">851</a></td></tr
><tr id="gr_svn45_852"

><td id="852"><a href="#852">852</a></td></tr
><tr id="gr_svn45_853"

><td id="853"><a href="#853">853</a></td></tr
><tr id="gr_svn45_854"

><td id="854"><a href="#854">854</a></td></tr
><tr id="gr_svn45_855"

><td id="855"><a href="#855">855</a></td></tr
><tr id="gr_svn45_856"

><td id="856"><a href="#856">856</a></td></tr
><tr id="gr_svn45_857"

><td id="857"><a href="#857">857</a></td></tr
><tr id="gr_svn45_858"

><td id="858"><a href="#858">858</a></td></tr
><tr id="gr_svn45_859"

><td id="859"><a href="#859">859</a></td></tr
><tr id="gr_svn45_860"

><td id="860"><a href="#860">860</a></td></tr
><tr id="gr_svn45_861"

><td id="861"><a href="#861">861</a></td></tr
><tr id="gr_svn45_862"

><td id="862"><a href="#862">862</a></td></tr
><tr id="gr_svn45_863"

><td id="863"><a href="#863">863</a></td></tr
><tr id="gr_svn45_864"

><td id="864"><a href="#864">864</a></td></tr
><tr id="gr_svn45_865"

><td id="865"><a href="#865">865</a></td></tr
><tr id="gr_svn45_866"

><td id="866"><a href="#866">866</a></td></tr
><tr id="gr_svn45_867"

><td id="867"><a href="#867">867</a></td></tr
><tr id="gr_svn45_868"

><td id="868"><a href="#868">868</a></td></tr
><tr id="gr_svn45_869"

><td id="869"><a href="#869">869</a></td></tr
><tr id="gr_svn45_870"

><td id="870"><a href="#870">870</a></td></tr
><tr id="gr_svn45_871"

><td id="871"><a href="#871">871</a></td></tr
><tr id="gr_svn45_872"

><td id="872"><a href="#872">872</a></td></tr
><tr id="gr_svn45_873"

><td id="873"><a href="#873">873</a></td></tr
><tr id="gr_svn45_874"

><td id="874"><a href="#874">874</a></td></tr
><tr id="gr_svn45_875"

><td id="875"><a href="#875">875</a></td></tr
><tr id="gr_svn45_876"

><td id="876"><a href="#876">876</a></td></tr
><tr id="gr_svn45_877"

><td id="877"><a href="#877">877</a></td></tr
><tr id="gr_svn45_878"

><td id="878"><a href="#878">878</a></td></tr
><tr id="gr_svn45_879"

><td id="879"><a href="#879">879</a></td></tr
><tr id="gr_svn45_880"

><td id="880"><a href="#880">880</a></td></tr
><tr id="gr_svn45_881"

><td id="881"><a href="#881">881</a></td></tr
><tr id="gr_svn45_882"

><td id="882"><a href="#882">882</a></td></tr
><tr id="gr_svn45_883"

><td id="883"><a href="#883">883</a></td></tr
><tr id="gr_svn45_884"

><td id="884"><a href="#884">884</a></td></tr
><tr id="gr_svn45_885"

><td id="885"><a href="#885">885</a></td></tr
><tr id="gr_svn45_886"

><td id="886"><a href="#886">886</a></td></tr
><tr id="gr_svn45_887"

><td id="887"><a href="#887">887</a></td></tr
><tr id="gr_svn45_888"

><td id="888"><a href="#888">888</a></td></tr
><tr id="gr_svn45_889"

><td id="889"><a href="#889">889</a></td></tr
><tr id="gr_svn45_890"

><td id="890"><a href="#890">890</a></td></tr
><tr id="gr_svn45_891"

><td id="891"><a href="#891">891</a></td></tr
><tr id="gr_svn45_892"

><td id="892"><a href="#892">892</a></td></tr
><tr id="gr_svn45_893"

><td id="893"><a href="#893">893</a></td></tr
><tr id="gr_svn45_894"

><td id="894"><a href="#894">894</a></td></tr
><tr id="gr_svn45_895"

><td id="895"><a href="#895">895</a></td></tr
><tr id="gr_svn45_896"

><td id="896"><a href="#896">896</a></td></tr
><tr id="gr_svn45_897"

><td id="897"><a href="#897">897</a></td></tr
><tr id="gr_svn45_898"

><td id="898"><a href="#898">898</a></td></tr
><tr id="gr_svn45_899"

><td id="899"><a href="#899">899</a></td></tr
><tr id="gr_svn45_900"

><td id="900"><a href="#900">900</a></td></tr
><tr id="gr_svn45_901"

><td id="901"><a href="#901">901</a></td></tr
><tr id="gr_svn45_902"

><td id="902"><a href="#902">902</a></td></tr
><tr id="gr_svn45_903"

><td id="903"><a href="#903">903</a></td></tr
><tr id="gr_svn45_904"

><td id="904"><a href="#904">904</a></td></tr
><tr id="gr_svn45_905"

><td id="905"><a href="#905">905</a></td></tr
><tr id="gr_svn45_906"

><td id="906"><a href="#906">906</a></td></tr
><tr id="gr_svn45_907"

><td id="907"><a href="#907">907</a></td></tr
><tr id="gr_svn45_908"

><td id="908"><a href="#908">908</a></td></tr
><tr id="gr_svn45_909"

><td id="909"><a href="#909">909</a></td></tr
><tr id="gr_svn45_910"

><td id="910"><a href="#910">910</a></td></tr
><tr id="gr_svn45_911"

><td id="911"><a href="#911">911</a></td></tr
><tr id="gr_svn45_912"

><td id="912"><a href="#912">912</a></td></tr
><tr id="gr_svn45_913"

><td id="913"><a href="#913">913</a></td></tr
><tr id="gr_svn45_914"

><td id="914"><a href="#914">914</a></td></tr
><tr id="gr_svn45_915"

><td id="915"><a href="#915">915</a></td></tr
><tr id="gr_svn45_916"

><td id="916"><a href="#916">916</a></td></tr
><tr id="gr_svn45_917"

><td id="917"><a href="#917">917</a></td></tr
><tr id="gr_svn45_918"

><td id="918"><a href="#918">918</a></td></tr
><tr id="gr_svn45_919"

><td id="919"><a href="#919">919</a></td></tr
><tr id="gr_svn45_920"

><td id="920"><a href="#920">920</a></td></tr
><tr id="gr_svn45_921"

><td id="921"><a href="#921">921</a></td></tr
><tr id="gr_svn45_922"

><td id="922"><a href="#922">922</a></td></tr
><tr id="gr_svn45_923"

><td id="923"><a href="#923">923</a></td></tr
><tr id="gr_svn45_924"

><td id="924"><a href="#924">924</a></td></tr
><tr id="gr_svn45_925"

><td id="925"><a href="#925">925</a></td></tr
><tr id="gr_svn45_926"

><td id="926"><a href="#926">926</a></td></tr
><tr id="gr_svn45_927"

><td id="927"><a href="#927">927</a></td></tr
><tr id="gr_svn45_928"

><td id="928"><a href="#928">928</a></td></tr
><tr id="gr_svn45_929"

><td id="929"><a href="#929">929</a></td></tr
><tr id="gr_svn45_930"

><td id="930"><a href="#930">930</a></td></tr
><tr id="gr_svn45_931"

><td id="931"><a href="#931">931</a></td></tr
><tr id="gr_svn45_932"

><td id="932"><a href="#932">932</a></td></tr
><tr id="gr_svn45_933"

><td id="933"><a href="#933">933</a></td></tr
><tr id="gr_svn45_934"

><td id="934"><a href="#934">934</a></td></tr
><tr id="gr_svn45_935"

><td id="935"><a href="#935">935</a></td></tr
><tr id="gr_svn45_936"

><td id="936"><a href="#936">936</a></td></tr
><tr id="gr_svn45_937"

><td id="937"><a href="#937">937</a></td></tr
><tr id="gr_svn45_938"

><td id="938"><a href="#938">938</a></td></tr
><tr id="gr_svn45_939"

><td id="939"><a href="#939">939</a></td></tr
><tr id="gr_svn45_940"

><td id="940"><a href="#940">940</a></td></tr
><tr id="gr_svn45_941"

><td id="941"><a href="#941">941</a></td></tr
><tr id="gr_svn45_942"

><td id="942"><a href="#942">942</a></td></tr
><tr id="gr_svn45_943"

><td id="943"><a href="#943">943</a></td></tr
><tr id="gr_svn45_944"

><td id="944"><a href="#944">944</a></td></tr
><tr id="gr_svn45_945"

><td id="945"><a href="#945">945</a></td></tr
><tr id="gr_svn45_946"

><td id="946"><a href="#946">946</a></td></tr
><tr id="gr_svn45_947"

><td id="947"><a href="#947">947</a></td></tr
><tr id="gr_svn45_948"

><td id="948"><a href="#948">948</a></td></tr
><tr id="gr_svn45_949"

><td id="949"><a href="#949">949</a></td></tr
><tr id="gr_svn45_950"

><td id="950"><a href="#950">950</a></td></tr
><tr id="gr_svn45_951"

><td id="951"><a href="#951">951</a></td></tr
><tr id="gr_svn45_952"

><td id="952"><a href="#952">952</a></td></tr
><tr id="gr_svn45_953"

><td id="953"><a href="#953">953</a></td></tr
><tr id="gr_svn45_954"

><td id="954"><a href="#954">954</a></td></tr
><tr id="gr_svn45_955"

><td id="955"><a href="#955">955</a></td></tr
><tr id="gr_svn45_956"

><td id="956"><a href="#956">956</a></td></tr
><tr id="gr_svn45_957"

><td id="957"><a href="#957">957</a></td></tr
><tr id="gr_svn45_958"

><td id="958"><a href="#958">958</a></td></tr
><tr id="gr_svn45_959"

><td id="959"><a href="#959">959</a></td></tr
><tr id="gr_svn45_960"

><td id="960"><a href="#960">960</a></td></tr
><tr id="gr_svn45_961"

><td id="961"><a href="#961">961</a></td></tr
><tr id="gr_svn45_962"

><td id="962"><a href="#962">962</a></td></tr
><tr id="gr_svn45_963"

><td id="963"><a href="#963">963</a></td></tr
><tr id="gr_svn45_964"

><td id="964"><a href="#964">964</a></td></tr
><tr id="gr_svn45_965"

><td id="965"><a href="#965">965</a></td></tr
><tr id="gr_svn45_966"

><td id="966"><a href="#966">966</a></td></tr
><tr id="gr_svn45_967"

><td id="967"><a href="#967">967</a></td></tr
><tr id="gr_svn45_968"

><td id="968"><a href="#968">968</a></td></tr
><tr id="gr_svn45_969"

><td id="969"><a href="#969">969</a></td></tr
><tr id="gr_svn45_970"

><td id="970"><a href="#970">970</a></td></tr
><tr id="gr_svn45_971"

><td id="971"><a href="#971">971</a></td></tr
><tr id="gr_svn45_972"

><td id="972"><a href="#972">972</a></td></tr
><tr id="gr_svn45_973"

><td id="973"><a href="#973">973</a></td></tr
><tr id="gr_svn45_974"

><td id="974"><a href="#974">974</a></td></tr
><tr id="gr_svn45_975"

><td id="975"><a href="#975">975</a></td></tr
><tr id="gr_svn45_976"

><td id="976"><a href="#976">976</a></td></tr
><tr id="gr_svn45_977"

><td id="977"><a href="#977">977</a></td></tr
><tr id="gr_svn45_978"

><td id="978"><a href="#978">978</a></td></tr
><tr id="gr_svn45_979"

><td id="979"><a href="#979">979</a></td></tr
><tr id="gr_svn45_980"

><td id="980"><a href="#980">980</a></td></tr
><tr id="gr_svn45_981"

><td id="981"><a href="#981">981</a></td></tr
><tr id="gr_svn45_982"

><td id="982"><a href="#982">982</a></td></tr
><tr id="gr_svn45_983"

><td id="983"><a href="#983">983</a></td></tr
><tr id="gr_svn45_984"

><td id="984"><a href="#984">984</a></td></tr
><tr id="gr_svn45_985"

><td id="985"><a href="#985">985</a></td></tr
><tr id="gr_svn45_986"

><td id="986"><a href="#986">986</a></td></tr
><tr id="gr_svn45_987"

><td id="987"><a href="#987">987</a></td></tr
><tr id="gr_svn45_988"

><td id="988"><a href="#988">988</a></td></tr
><tr id="gr_svn45_989"

><td id="989"><a href="#989">989</a></td></tr
><tr id="gr_svn45_990"

><td id="990"><a href="#990">990</a></td></tr
><tr id="gr_svn45_991"

><td id="991"><a href="#991">991</a></td></tr
><tr id="gr_svn45_992"

><td id="992"><a href="#992">992</a></td></tr
><tr id="gr_svn45_993"

><td id="993"><a href="#993">993</a></td></tr
><tr id="gr_svn45_994"

><td id="994"><a href="#994">994</a></td></tr
><tr id="gr_svn45_995"

><td id="995"><a href="#995">995</a></td></tr
><tr id="gr_svn45_996"

><td id="996"><a href="#996">996</a></td></tr
><tr id="gr_svn45_997"

><td id="997"><a href="#997">997</a></td></tr
><tr id="gr_svn45_998"

><td id="998"><a href="#998">998</a></td></tr
><tr id="gr_svn45_999"

><td id="999"><a href="#999">999</a></td></tr
><tr id="gr_svn45_1000"

><td id="1000"><a href="#1000">1000</a></td></tr
><tr id="gr_svn45_1001"

><td id="1001"><a href="#1001">1001</a></td></tr
><tr id="gr_svn45_1002"

><td id="1002"><a href="#1002">1002</a></td></tr
><tr id="gr_svn45_1003"

><td id="1003"><a href="#1003">1003</a></td></tr
><tr id="gr_svn45_1004"

><td id="1004"><a href="#1004">1004</a></td></tr
><tr id="gr_svn45_1005"

><td id="1005"><a href="#1005">1005</a></td></tr
><tr id="gr_svn45_1006"

><td id="1006"><a href="#1006">1006</a></td></tr
><tr id="gr_svn45_1007"

><td id="1007"><a href="#1007">1007</a></td></tr
><tr id="gr_svn45_1008"

><td id="1008"><a href="#1008">1008</a></td></tr
><tr id="gr_svn45_1009"

><td id="1009"><a href="#1009">1009</a></td></tr
><tr id="gr_svn45_1010"

><td id="1010"><a href="#1010">1010</a></td></tr
><tr id="gr_svn45_1011"

><td id="1011"><a href="#1011">1011</a></td></tr
><tr id="gr_svn45_1012"

><td id="1012"><a href="#1012">1012</a></td></tr
><tr id="gr_svn45_1013"

><td id="1013"><a href="#1013">1013</a></td></tr
><tr id="gr_svn45_1014"

><td id="1014"><a href="#1014">1014</a></td></tr
><tr id="gr_svn45_1015"

><td id="1015"><a href="#1015">1015</a></td></tr
><tr id="gr_svn45_1016"

><td id="1016"><a href="#1016">1016</a></td></tr
><tr id="gr_svn45_1017"

><td id="1017"><a href="#1017">1017</a></td></tr
><tr id="gr_svn45_1018"

><td id="1018"><a href="#1018">1018</a></td></tr
><tr id="gr_svn45_1019"

><td id="1019"><a href="#1019">1019</a></td></tr
><tr id="gr_svn45_1020"

><td id="1020"><a href="#1020">1020</a></td></tr
><tr id="gr_svn45_1021"

><td id="1021"><a href="#1021">1021</a></td></tr
><tr id="gr_svn45_1022"

><td id="1022"><a href="#1022">1022</a></td></tr
><tr id="gr_svn45_1023"

><td id="1023"><a href="#1023">1023</a></td></tr
><tr id="gr_svn45_1024"

><td id="1024"><a href="#1024">1024</a></td></tr
><tr id="gr_svn45_1025"

><td id="1025"><a href="#1025">1025</a></td></tr
><tr id="gr_svn45_1026"

><td id="1026"><a href="#1026">1026</a></td></tr
><tr id="gr_svn45_1027"

><td id="1027"><a href="#1027">1027</a></td></tr
><tr id="gr_svn45_1028"

><td id="1028"><a href="#1028">1028</a></td></tr
><tr id="gr_svn45_1029"

><td id="1029"><a href="#1029">1029</a></td></tr
><tr id="gr_svn45_1030"

><td id="1030"><a href="#1030">1030</a></td></tr
><tr id="gr_svn45_1031"

><td id="1031"><a href="#1031">1031</a></td></tr
><tr id="gr_svn45_1032"

><td id="1032"><a href="#1032">1032</a></td></tr
><tr id="gr_svn45_1033"

><td id="1033"><a href="#1033">1033</a></td></tr
><tr id="gr_svn45_1034"

><td id="1034"><a href="#1034">1034</a></td></tr
><tr id="gr_svn45_1035"

><td id="1035"><a href="#1035">1035</a></td></tr
><tr id="gr_svn45_1036"

><td id="1036"><a href="#1036">1036</a></td></tr
><tr id="gr_svn45_1037"

><td id="1037"><a href="#1037">1037</a></td></tr
><tr id="gr_svn45_1038"

><td id="1038"><a href="#1038">1038</a></td></tr
><tr id="gr_svn45_1039"

><td id="1039"><a href="#1039">1039</a></td></tr
><tr id="gr_svn45_1040"

><td id="1040"><a href="#1040">1040</a></td></tr
><tr id="gr_svn45_1041"

><td id="1041"><a href="#1041">1041</a></td></tr
><tr id="gr_svn45_1042"

><td id="1042"><a href="#1042">1042</a></td></tr
><tr id="gr_svn45_1043"

><td id="1043"><a href="#1043">1043</a></td></tr
><tr id="gr_svn45_1044"

><td id="1044"><a href="#1044">1044</a></td></tr
><tr id="gr_svn45_1045"

><td id="1045"><a href="#1045">1045</a></td></tr
><tr id="gr_svn45_1046"

><td id="1046"><a href="#1046">1046</a></td></tr
><tr id="gr_svn45_1047"

><td id="1047"><a href="#1047">1047</a></td></tr
><tr id="gr_svn45_1048"

><td id="1048"><a href="#1048">1048</a></td></tr
><tr id="gr_svn45_1049"

><td id="1049"><a href="#1049">1049</a></td></tr
><tr id="gr_svn45_1050"

><td id="1050"><a href="#1050">1050</a></td></tr
><tr id="gr_svn45_1051"

><td id="1051"><a href="#1051">1051</a></td></tr
><tr id="gr_svn45_1052"

><td id="1052"><a href="#1052">1052</a></td></tr
><tr id="gr_svn45_1053"

><td id="1053"><a href="#1053">1053</a></td></tr
><tr id="gr_svn45_1054"

><td id="1054"><a href="#1054">1054</a></td></tr
><tr id="gr_svn45_1055"

><td id="1055"><a href="#1055">1055</a></td></tr
><tr id="gr_svn45_1056"

><td id="1056"><a href="#1056">1056</a></td></tr
><tr id="gr_svn45_1057"

><td id="1057"><a href="#1057">1057</a></td></tr
><tr id="gr_svn45_1058"

><td id="1058"><a href="#1058">1058</a></td></tr
><tr id="gr_svn45_1059"

><td id="1059"><a href="#1059">1059</a></td></tr
><tr id="gr_svn45_1060"

><td id="1060"><a href="#1060">1060</a></td></tr
><tr id="gr_svn45_1061"

><td id="1061"><a href="#1061">1061</a></td></tr
><tr id="gr_svn45_1062"

><td id="1062"><a href="#1062">1062</a></td></tr
><tr id="gr_svn45_1063"

><td id="1063"><a href="#1063">1063</a></td></tr
><tr id="gr_svn45_1064"

><td id="1064"><a href="#1064">1064</a></td></tr
><tr id="gr_svn45_1065"

><td id="1065"><a href="#1065">1065</a></td></tr
><tr id="gr_svn45_1066"

><td id="1066"><a href="#1066">1066</a></td></tr
><tr id="gr_svn45_1067"

><td id="1067"><a href="#1067">1067</a></td></tr
><tr id="gr_svn45_1068"

><td id="1068"><a href="#1068">1068</a></td></tr
><tr id="gr_svn45_1069"

><td id="1069"><a href="#1069">1069</a></td></tr
><tr id="gr_svn45_1070"

><td id="1070"><a href="#1070">1070</a></td></tr
><tr id="gr_svn45_1071"

><td id="1071"><a href="#1071">1071</a></td></tr
><tr id="gr_svn45_1072"

><td id="1072"><a href="#1072">1072</a></td></tr
><tr id="gr_svn45_1073"

><td id="1073"><a href="#1073">1073</a></td></tr
><tr id="gr_svn45_1074"

><td id="1074"><a href="#1074">1074</a></td></tr
><tr id="gr_svn45_1075"

><td id="1075"><a href="#1075">1075</a></td></tr
><tr id="gr_svn45_1076"

><td id="1076"><a href="#1076">1076</a></td></tr
><tr id="gr_svn45_1077"

><td id="1077"><a href="#1077">1077</a></td></tr
><tr id="gr_svn45_1078"

><td id="1078"><a href="#1078">1078</a></td></tr
><tr id="gr_svn45_1079"

><td id="1079"><a href="#1079">1079</a></td></tr
><tr id="gr_svn45_1080"

><td id="1080"><a href="#1080">1080</a></td></tr
><tr id="gr_svn45_1081"

><td id="1081"><a href="#1081">1081</a></td></tr
><tr id="gr_svn45_1082"

><td id="1082"><a href="#1082">1082</a></td></tr
><tr id="gr_svn45_1083"

><td id="1083"><a href="#1083">1083</a></td></tr
><tr id="gr_svn45_1084"

><td id="1084"><a href="#1084">1084</a></td></tr
><tr id="gr_svn45_1085"

><td id="1085"><a href="#1085">1085</a></td></tr
><tr id="gr_svn45_1086"

><td id="1086"><a href="#1086">1086</a></td></tr
><tr id="gr_svn45_1087"

><td id="1087"><a href="#1087">1087</a></td></tr
><tr id="gr_svn45_1088"

><td id="1088"><a href="#1088">1088</a></td></tr
><tr id="gr_svn45_1089"

><td id="1089"><a href="#1089">1089</a></td></tr
><tr id="gr_svn45_1090"

><td id="1090"><a href="#1090">1090</a></td></tr
><tr id="gr_svn45_1091"

><td id="1091"><a href="#1091">1091</a></td></tr
><tr id="gr_svn45_1092"

><td id="1092"><a href="#1092">1092</a></td></tr
><tr id="gr_svn45_1093"

><td id="1093"><a href="#1093">1093</a></td></tr
><tr id="gr_svn45_1094"

><td id="1094"><a href="#1094">1094</a></td></tr
><tr id="gr_svn45_1095"

><td id="1095"><a href="#1095">1095</a></td></tr
><tr id="gr_svn45_1096"

><td id="1096"><a href="#1096">1096</a></td></tr
><tr id="gr_svn45_1097"

><td id="1097"><a href="#1097">1097</a></td></tr
><tr id="gr_svn45_1098"

><td id="1098"><a href="#1098">1098</a></td></tr
><tr id="gr_svn45_1099"

><td id="1099"><a href="#1099">1099</a></td></tr
><tr id="gr_svn45_1100"

><td id="1100"><a href="#1100">1100</a></td></tr
><tr id="gr_svn45_1101"

><td id="1101"><a href="#1101">1101</a></td></tr
><tr id="gr_svn45_1102"

><td id="1102"><a href="#1102">1102</a></td></tr
><tr id="gr_svn45_1103"

><td id="1103"><a href="#1103">1103</a></td></tr
><tr id="gr_svn45_1104"

><td id="1104"><a href="#1104">1104</a></td></tr
><tr id="gr_svn45_1105"

><td id="1105"><a href="#1105">1105</a></td></tr
><tr id="gr_svn45_1106"

><td id="1106"><a href="#1106">1106</a></td></tr
><tr id="gr_svn45_1107"

><td id="1107"><a href="#1107">1107</a></td></tr
><tr id="gr_svn45_1108"

><td id="1108"><a href="#1108">1108</a></td></tr
><tr id="gr_svn45_1109"

><td id="1109"><a href="#1109">1109</a></td></tr
><tr id="gr_svn45_1110"

><td id="1110"><a href="#1110">1110</a></td></tr
><tr id="gr_svn45_1111"

><td id="1111"><a href="#1111">1111</a></td></tr
><tr id="gr_svn45_1112"

><td id="1112"><a href="#1112">1112</a></td></tr
><tr id="gr_svn45_1113"

><td id="1113"><a href="#1113">1113</a></td></tr
><tr id="gr_svn45_1114"

><td id="1114"><a href="#1114">1114</a></td></tr
><tr id="gr_svn45_1115"

><td id="1115"><a href="#1115">1115</a></td></tr
><tr id="gr_svn45_1116"

><td id="1116"><a href="#1116">1116</a></td></tr
><tr id="gr_svn45_1117"

><td id="1117"><a href="#1117">1117</a></td></tr
><tr id="gr_svn45_1118"

><td id="1118"><a href="#1118">1118</a></td></tr
><tr id="gr_svn45_1119"

><td id="1119"><a href="#1119">1119</a></td></tr
><tr id="gr_svn45_1120"

><td id="1120"><a href="#1120">1120</a></td></tr
><tr id="gr_svn45_1121"

><td id="1121"><a href="#1121">1121</a></td></tr
><tr id="gr_svn45_1122"

><td id="1122"><a href="#1122">1122</a></td></tr
><tr id="gr_svn45_1123"

><td id="1123"><a href="#1123">1123</a></td></tr
><tr id="gr_svn45_1124"

><td id="1124"><a href="#1124">1124</a></td></tr
><tr id="gr_svn45_1125"

><td id="1125"><a href="#1125">1125</a></td></tr
><tr id="gr_svn45_1126"

><td id="1126"><a href="#1126">1126</a></td></tr
><tr id="gr_svn45_1127"

><td id="1127"><a href="#1127">1127</a></td></tr
><tr id="gr_svn45_1128"

><td id="1128"><a href="#1128">1128</a></td></tr
><tr id="gr_svn45_1129"

><td id="1129"><a href="#1129">1129</a></td></tr
><tr id="gr_svn45_1130"

><td id="1130"><a href="#1130">1130</a></td></tr
><tr id="gr_svn45_1131"

><td id="1131"><a href="#1131">1131</a></td></tr
><tr id="gr_svn45_1132"

><td id="1132"><a href="#1132">1132</a></td></tr
><tr id="gr_svn45_1133"

><td id="1133"><a href="#1133">1133</a></td></tr
><tr id="gr_svn45_1134"

><td id="1134"><a href="#1134">1134</a></td></tr
><tr id="gr_svn45_1135"

><td id="1135"><a href="#1135">1135</a></td></tr
><tr id="gr_svn45_1136"

><td id="1136"><a href="#1136">1136</a></td></tr
><tr id="gr_svn45_1137"

><td id="1137"><a href="#1137">1137</a></td></tr
><tr id="gr_svn45_1138"

><td id="1138"><a href="#1138">1138</a></td></tr
><tr id="gr_svn45_1139"

><td id="1139"><a href="#1139">1139</a></td></tr
><tr id="gr_svn45_1140"

><td id="1140"><a href="#1140">1140</a></td></tr
><tr id="gr_svn45_1141"

><td id="1141"><a href="#1141">1141</a></td></tr
><tr id="gr_svn45_1142"

><td id="1142"><a href="#1142">1142</a></td></tr
><tr id="gr_svn45_1143"

><td id="1143"><a href="#1143">1143</a></td></tr
><tr id="gr_svn45_1144"

><td id="1144"><a href="#1144">1144</a></td></tr
><tr id="gr_svn45_1145"

><td id="1145"><a href="#1145">1145</a></td></tr
><tr id="gr_svn45_1146"

><td id="1146"><a href="#1146">1146</a></td></tr
><tr id="gr_svn45_1147"

><td id="1147"><a href="#1147">1147</a></td></tr
><tr id="gr_svn45_1148"

><td id="1148"><a href="#1148">1148</a></td></tr
><tr id="gr_svn45_1149"

><td id="1149"><a href="#1149">1149</a></td></tr
><tr id="gr_svn45_1150"

><td id="1150"><a href="#1150">1150</a></td></tr
><tr id="gr_svn45_1151"

><td id="1151"><a href="#1151">1151</a></td></tr
><tr id="gr_svn45_1152"

><td id="1152"><a href="#1152">1152</a></td></tr
><tr id="gr_svn45_1153"

><td id="1153"><a href="#1153">1153</a></td></tr
><tr id="gr_svn45_1154"

><td id="1154"><a href="#1154">1154</a></td></tr
><tr id="gr_svn45_1155"

><td id="1155"><a href="#1155">1155</a></td></tr
><tr id="gr_svn45_1156"

><td id="1156"><a href="#1156">1156</a></td></tr
><tr id="gr_svn45_1157"

><td id="1157"><a href="#1157">1157</a></td></tr
><tr id="gr_svn45_1158"

><td id="1158"><a href="#1158">1158</a></td></tr
><tr id="gr_svn45_1159"

><td id="1159"><a href="#1159">1159</a></td></tr
><tr id="gr_svn45_1160"

><td id="1160"><a href="#1160">1160</a></td></tr
><tr id="gr_svn45_1161"

><td id="1161"><a href="#1161">1161</a></td></tr
><tr id="gr_svn45_1162"

><td id="1162"><a href="#1162">1162</a></td></tr
><tr id="gr_svn45_1163"

><td id="1163"><a href="#1163">1163</a></td></tr
><tr id="gr_svn45_1164"

><td id="1164"><a href="#1164">1164</a></td></tr
><tr id="gr_svn45_1165"

><td id="1165"><a href="#1165">1165</a></td></tr
></table></pre>
<pre><table width="100%"><tr class="nocursor"><td></td></tr></table></pre>
</td>
<td id="lines">
<pre><table width="100%"><tr class="cursor_stop cursor_hidden"><td></td></tr></table></pre>
<pre class="prettyprint lang-js"><table id="src_table_0"><tr
id=sl_svn45_1

><td class="source">/*<br></td></tr
><tr
id=sl_svn45_2

><td class="source">CropZoom v1.1<br></td></tr
><tr
id=sl_svn45_3

><td class="source">Release Date: April 17, 2010<br></td></tr
><tr
id=sl_svn45_4

><td class="source"><br></td></tr
><tr
id=sl_svn45_5

><td class="source">Copyright (c) 2010 Gaston Robledo<br></td></tr
><tr
id=sl_svn45_6

><td class="source"><br></td></tr
><tr
id=sl_svn45_7

><td class="source">Permission is hereby granted, free of charge, to any person obtaining a copy<br></td></tr
><tr
id=sl_svn45_8

><td class="source">of this software and associated documentation files (the &quot;Software&quot;), to deal<br></td></tr
><tr
id=sl_svn45_9

><td class="source">in the Software without restriction, including without limitation the rights<br></td></tr
><tr
id=sl_svn45_10

><td class="source">to use, copy, modify, merge, publish, distribute, sublicense, and/or sell<br></td></tr
><tr
id=sl_svn45_11

><td class="source">copies of the Software, and to permit persons to whom the Software is<br></td></tr
><tr
id=sl_svn45_12

><td class="source">furnished to do so, subject to the following conditions:<br></td></tr
><tr
id=sl_svn45_13

><td class="source"><br></td></tr
><tr
id=sl_svn45_14

><td class="source">The above copyright notice and this permission notice shall be included in<br></td></tr
><tr
id=sl_svn45_15

><td class="source">all copies or substantial portions of the Software.<br></td></tr
><tr
id=sl_svn45_16

><td class="source"><br></td></tr
><tr
id=sl_svn45_17

><td class="source">THE SOFTWARE IS PROVIDED &quot;AS IS&quot;, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR<br></td></tr
><tr
id=sl_svn45_18

><td class="source">IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,<br></td></tr
><tr
id=sl_svn45_19

><td class="source">FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE<br></td></tr
><tr
id=sl_svn45_20

><td class="source">AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER<br></td></tr
><tr
id=sl_svn45_21

><td class="source">LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,<br></td></tr
><tr
id=sl_svn45_22

><td class="source">OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN<br></td></tr
><tr
id=sl_svn45_23

><td class="source">THE SOFTWARE.<br></td></tr
><tr
id=sl_svn45_24

><td class="source"> */<br></td></tr
><tr
id=sl_svn45_25

><td class="source">;<br></td></tr
><tr
id=sl_svn45_26

><td class="source">(function($) {<br></td></tr
><tr
id=sl_svn45_27

><td class="source"><br></td></tr
><tr
id=sl_svn45_28

><td class="source">	$.fn.cropzoom = function(options) {<br></td></tr
><tr
id=sl_svn45_29

><td class="source"><br></td></tr
><tr
id=sl_svn45_30

><td class="source">		return this<br></td></tr
><tr
id=sl_svn45_31

><td class="source">				.each(function() {<br></td></tr
><tr
id=sl_svn45_32

><td class="source"><br></td></tr
><tr
id=sl_svn45_33

><td class="source">					var _self = null;<br></td></tr
><tr
id=sl_svn45_34

><td class="source">					var tMovement = null;<br></td></tr
><tr
id=sl_svn45_35

><td class="source"><br></td></tr
><tr
id=sl_svn45_36

><td class="source">					var $selector = null;<br></td></tr
><tr
id=sl_svn45_37

><td class="source">					var $image = null;<br></td></tr
><tr
id=sl_svn45_38

><td class="source">					var $svg = null;<br></td></tr
><tr
id=sl_svn45_39

><td class="source"><br></td></tr
><tr
id=sl_svn45_40

><td class="source">					var defaults = {<br></td></tr
><tr
id=sl_svn45_41

><td class="source">						width : 500,<br></td></tr
><tr
id=sl_svn45_42

><td class="source">						height : 375,<br></td></tr
><tr
id=sl_svn45_43

><td class="source">						bgColor : &#39;#000&#39;,<br></td></tr
><tr
id=sl_svn45_44

><td class="source">						overlayColor : &#39;#000&#39;,<br></td></tr
><tr
id=sl_svn45_45

><td class="source">						selector : {<br></td></tr
><tr
id=sl_svn45_46

><td class="source">							x : 0,<br></td></tr
><tr
id=sl_svn45_47

><td class="source">							y : 0,<br></td></tr
><tr
id=sl_svn45_48

><td class="source">							w : 229,<br></td></tr
><tr
id=sl_svn45_49

><td class="source">							h : 100,<br></td></tr
><tr
id=sl_svn45_50

><td class="source">							aspectRatio : false,<br></td></tr
><tr
id=sl_svn45_51

><td class="source">							centered : false,<br></td></tr
><tr
id=sl_svn45_52

><td class="source">							borderColor : &#39;yellow&#39;,<br></td></tr
><tr
id=sl_svn45_53

><td class="source">							borderColorHover : &#39;red&#39;,<br></td></tr
><tr
id=sl_svn45_54

><td class="source">							bgInfoLayer : &#39;#FFF&#39;,<br></td></tr
><tr
id=sl_svn45_55

><td class="source">							infoFontSize : 10,<br></td></tr
><tr
id=sl_svn45_56

><td class="source">							infoFontColor : &#39;blue&#39;,<br></td></tr
><tr
id=sl_svn45_57

><td class="source">							showPositionsOnDrag : true,<br></td></tr
><tr
id=sl_svn45_58

><td class="source">							showDimetionsOnDrag : true,<br></td></tr
><tr
id=sl_svn45_59

><td class="source">							maxHeight : null,<br></td></tr
><tr
id=sl_svn45_60

><td class="source">							maxWidth : null,<br></td></tr
><tr
id=sl_svn45_61

><td class="source">							startWithOverlay : false,<br></td></tr
><tr
id=sl_svn45_62

><td class="source">							hideOverlayOnDragAndResize : true,<br></td></tr
><tr
id=sl_svn45_63

><td class="source">							onSelectorDrag : null,<br></td></tr
><tr
id=sl_svn45_64

><td class="source">							onSelectorDragStop : null,<br></td></tr
><tr
id=sl_svn45_65

><td class="source">							onSelectorResize : null,<br></td></tr
><tr
id=sl_svn45_66

><td class="source">							onSelectorResizeStop : null<br></td></tr
><tr
id=sl_svn45_67

><td class="source">						},<br></td></tr
><tr
id=sl_svn45_68

><td class="source">						image : {<br></td></tr
><tr
id=sl_svn45_69

><td class="source">							source : &#39;&#39;,<br></td></tr
><tr
id=sl_svn45_70

><td class="source">							rotation : 0,<br></td></tr
><tr
id=sl_svn45_71

><td class="source">							width : 0,<br></td></tr
><tr
id=sl_svn45_72

><td class="source">							height : 0,<br></td></tr
><tr
id=sl_svn45_73

><td class="source">							minZoom : 10,<br></td></tr
><tr
id=sl_svn45_74

><td class="source">							maxZoom : 150,<br></td></tr
><tr
id=sl_svn45_75

><td class="source">							startZoom : 0,<br></td></tr
><tr
id=sl_svn45_76

><td class="source">							x : 0,<br></td></tr
><tr
id=sl_svn45_77

><td class="source">							y : 0,<br></td></tr
><tr
id=sl_svn45_78

><td class="source">							useStartZoomAsMinZoom : false,<br></td></tr
><tr
id=sl_svn45_79

><td class="source">							snapToContainer : false,<br></td></tr
><tr
id=sl_svn45_80

><td class="source">							onZoom : null,<br></td></tr
><tr
id=sl_svn45_81

><td class="source">							onRotate : null,<br></td></tr
><tr
id=sl_svn45_82

><td class="source">							onImageDrag : null<br></td></tr
><tr
id=sl_svn45_83

><td class="source">						},<br></td></tr
><tr
id=sl_svn45_84

><td class="source">						enableRotation : true,<br></td></tr
><tr
id=sl_svn45_85

><td class="source">						enableZoom : true,<br></td></tr
><tr
id=sl_svn45_86

><td class="source">						zoomSteps : 1,<br></td></tr
><tr
id=sl_svn45_87

><td class="source">						rotationSteps : 5,<br></td></tr
><tr
id=sl_svn45_88

><td class="source">						expose : {<br></td></tr
><tr
id=sl_svn45_89

><td class="source">							slidersOrientation : &#39;vertical&#39;,<br></td></tr
><tr
id=sl_svn45_90

><td class="source">							zoomElement : &#39;&#39;,<br></td></tr
><tr
id=sl_svn45_91

><td class="source">							rotationElement : &#39;&#39;,<br></td></tr
><tr
id=sl_svn45_92

><td class="source">							elementMovement : &#39;&#39;,<br></td></tr
><tr
id=sl_svn45_93

><td class="source">							movementSteps : 5<br></td></tr
><tr
id=sl_svn45_94

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_95

><td class="source">					};<br></td></tr
><tr
id=sl_svn45_96

><td class="source"><br></td></tr
><tr
id=sl_svn45_97

><td class="source">					var $options = $.extend(true, defaults, options);<br></td></tr
><tr
id=sl_svn45_98

><td class="source">					<br></td></tr
><tr
id=sl_svn45_99

><td class="source"><br></td></tr
><tr
id=sl_svn45_100

><td class="source">					// Verificamos que esten los plugins necesarios<br></td></tr
><tr
id=sl_svn45_101

><td class="source">					if (!$.isFunction($.fn.draggable)<br></td></tr
><tr
id=sl_svn45_102

><td class="source">							|| !$.isFunction($.fn.resizable)<br></td></tr
><tr
id=sl_svn45_103

><td class="source">							|| !$.isFunction($.fn.slider)) {<br></td></tr
><tr
id=sl_svn45_104

><td class="source">						alert(&quot;You must include ui.draggable, ui.resizable and ui.slider to use cropZoom&quot;);<br></td></tr
><tr
id=sl_svn45_105

><td class="source">						return;<br></td></tr
><tr
id=sl_svn45_106

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_107

><td class="source"><br></td></tr
><tr
id=sl_svn45_108

><td class="source">					if ($options.image.source == &#39;&#39;<br></td></tr
><tr
id=sl_svn45_109

><td class="source">							|| $options.image.width == 0<br></td></tr
><tr
id=sl_svn45_110

><td class="source">							|| $options.image.height == 0) {<br></td></tr
><tr
id=sl_svn45_111

><td class="source">						alert(&#39;You must set the source, witdth and height of the image element&#39;);<br></td></tr
><tr
id=sl_svn45_112

><td class="source">						return;<br></td></tr
><tr
id=sl_svn45_113

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_114

><td class="source"><br></td></tr
><tr
id=sl_svn45_115

><td class="source">					_self = $(this);<br></td></tr
><tr
id=sl_svn45_116

><td class="source">					//Preserve options<br></td></tr
><tr
id=sl_svn45_117

><td class="source">					setData(&#39;options&#39;,$options);<br></td></tr
><tr
id=sl_svn45_118

><td class="source">					_self.empty();<br></td></tr
><tr
id=sl_svn45_119

><td class="source">					_self.css({<br></td></tr
><tr
id=sl_svn45_120

><td class="source">						&#39;width&#39; : $options.width,<br></td></tr
><tr
id=sl_svn45_121

><td class="source">						&#39;height&#39; : $options.height,<br></td></tr
><tr
id=sl_svn45_122

><td class="source">						&#39;background-color&#39; : $options.bgColor,<br></td></tr
><tr
id=sl_svn45_123

><td class="source">						&#39;overflow&#39; : &#39;hidden&#39;,<br></td></tr
><tr
id=sl_svn45_124

><td class="source">						&#39;position&#39; : &#39;relative&#39;,<br></td></tr
><tr
id=sl_svn45_125

><td class="source">						&#39;border&#39; : &#39;2px solid #333&#39;<br></td></tr
><tr
id=sl_svn45_126

><td class="source">					});<br></td></tr
><tr
id=sl_svn45_127

><td class="source"><br></td></tr
><tr
id=sl_svn45_128

><td class="source">					setData(&#39;image&#39;, {<br></td></tr
><tr
id=sl_svn45_129

><td class="source">						h : $options.image.height,<br></td></tr
><tr
id=sl_svn45_130

><td class="source">						w : $options.image.width,<br></td></tr
><tr
id=sl_svn45_131

><td class="source">						posY : $options.image.y,<br></td></tr
><tr
id=sl_svn45_132

><td class="source">						posX : $options.image.x,<br></td></tr
><tr
id=sl_svn45_133

><td class="source">						scaleX : 0,<br></td></tr
><tr
id=sl_svn45_134

><td class="source">						scaleY : 0,<br></td></tr
><tr
id=sl_svn45_135

><td class="source">						rotation : $options.image.rotation,<br></td></tr
><tr
id=sl_svn45_136

><td class="source">						source : $options.image.source,<br></td></tr
><tr
id=sl_svn45_137

><td class="source">						bounds : [ 0, 0, 0, 0 ],<br></td></tr
><tr
id=sl_svn45_138

><td class="source">						id : &#39;image_to_crop_&#39; + _self[0].id<br></td></tr
><tr
id=sl_svn45_139

><td class="source">					});<br></td></tr
><tr
id=sl_svn45_140

><td class="source"><br></td></tr
><tr
id=sl_svn45_141

><td class="source">					calculateFactor();<br></td></tr
><tr
id=sl_svn45_142

><td class="source">					getCorrectSizes();<br></td></tr
><tr
id=sl_svn45_143

><td class="source"><br></td></tr
><tr
id=sl_svn45_144

><td class="source">					setData(<br></td></tr
><tr
id=sl_svn45_145

><td class="source">							&#39;selector&#39;,<br></td></tr
><tr
id=sl_svn45_146

><td class="source">							{<br></td></tr
><tr
id=sl_svn45_147

><td class="source">								x : $options.selector.x,<br></td></tr
><tr
id=sl_svn45_148

><td class="source">								y : $options.selector.y,<br></td></tr
><tr
id=sl_svn45_149

><td class="source">								w : ($options.selector.maxWidth != null ? ($options.selector.w &gt; $options.selector.maxWidth ? $options.selector.maxWidth<br></td></tr
><tr
id=sl_svn45_150

><td class="source">										: $options.selector.w)<br></td></tr
><tr
id=sl_svn45_151

><td class="source">										: $options.selector.w),<br></td></tr
><tr
id=sl_svn45_152

><td class="source">								h : ($options.selector.maxHeight != null ? ($options.selector.h &gt; $options.selector.maxHeight ? $options.selector.maxHeight<br></td></tr
><tr
id=sl_svn45_153

><td class="source">										: $options.selector.h)<br></td></tr
><tr
id=sl_svn45_154

><td class="source">										: $options.selector.h)<br></td></tr
><tr
id=sl_svn45_155

><td class="source">							});<br></td></tr
><tr
id=sl_svn45_156

><td class="source"><br></td></tr
><tr
id=sl_svn45_157

><td class="source">					if ($.browser.msie) {<br></td></tr
><tr
id=sl_svn45_158

><td class="source"><br></td></tr
><tr
id=sl_svn45_159

><td class="source">						// Add VML includes and namespace<br></td></tr
><tr
id=sl_svn45_160

><td class="source">						_self[0].ownerDocument.namespaces<br></td></tr
><tr
id=sl_svn45_161

><td class="source">								.add(&#39;v&#39;, &#39;urn:schemas-microsoft-com:vml&#39;,<br></td></tr
><tr
id=sl_svn45_162

><td class="source">										&quot;#default#VML&quot;);<br></td></tr
><tr
id=sl_svn45_163

><td class="source">						// Add required css rules<br></td></tr
><tr
id=sl_svn45_164

><td class="source">						var style = document.createStyleSheet();<br></td></tr
><tr
id=sl_svn45_165

><td class="source">						style<br></td></tr
><tr
id=sl_svn45_166

><td class="source">								.addRule(&#39;v\\:image&#39;,<br></td></tr
><tr
id=sl_svn45_167

><td class="source">										&quot;behavior: url(#default#VML);display:inline-block&quot;);<br></td></tr
><tr
id=sl_svn45_168

><td class="source">						style.addRule(&#39;v\\:image&#39;, &quot;antiAlias: false;&quot;);<br></td></tr
><tr
id=sl_svn45_169

><td class="source"><br></td></tr
><tr
id=sl_svn45_170

><td class="source">						$svg = $(&quot;&lt;div /&gt;&quot;).attr(&quot;id&quot;, &quot;k&quot;).css({<br></td></tr
><tr
id=sl_svn45_171

><td class="source">							&#39;width&#39; : $options.width,<br></td></tr
><tr
id=sl_svn45_172

><td class="source">							&#39;height&#39; : $options.height,<br></td></tr
><tr
id=sl_svn45_173

><td class="source">							&#39;position&#39; : &#39;absolute&#39;<br></td></tr
><tr
id=sl_svn45_174

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_175

><td class="source">						if ($.support.leadingWhitespace) {<br></td></tr
><tr
id=sl_svn45_176

><td class="source">							$image = document.createElement(&#39;img&#39;);<br></td></tr
><tr
id=sl_svn45_177

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_178

><td class="source">							$image = document.createElement(&#39;v:image&#39;);<br></td></tr
><tr
id=sl_svn45_179

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_180

><td class="source">						$image.setAttribute(&#39;src&#39;, $options.image.source);<br></td></tr
><tr
id=sl_svn45_181

><td class="source">						$image.setAttribute(&#39;gamma&#39;, &#39;0&#39;);<br></td></tr
><tr
id=sl_svn45_182

><td class="source"><br></td></tr
><tr
id=sl_svn45_183

><td class="source">						$($image).css({<br></td></tr
><tr
id=sl_svn45_184

><td class="source">							&#39;position&#39; : &#39;absolute&#39;,<br></td></tr
><tr
id=sl_svn45_185

><td class="source">							&#39;left&#39; : getData(&#39;image&#39;).posX,<br></td></tr
><tr
id=sl_svn45_186

><td class="source">							&#39;top&#39; : getData(&#39;image&#39;).posY,<br></td></tr
><tr
id=sl_svn45_187

><td class="source">							&#39;width&#39; : getData(&#39;image&#39;).w,<br></td></tr
><tr
id=sl_svn45_188

><td class="source">							&#39;height&#39; : getData(&#39;image&#39;).h<br></td></tr
><tr
id=sl_svn45_189

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_190

><td class="source">						$image.setAttribute(&#39;coordsize&#39;, &#39;21600,21600&#39;);<br></td></tr
><tr
id=sl_svn45_191

><td class="source">						$image.outerHTML = $image.outerHTML;<br></td></tr
><tr
id=sl_svn45_192

><td class="source"><br></td></tr
><tr
id=sl_svn45_193

><td class="source">						var ext = getExtensionSource();<br></td></tr
><tr
id=sl_svn45_194

><td class="source">						if (ext == &#39;png&#39; || ext == &#39;gif&#39;)<br></td></tr
><tr
id=sl_svn45_195

><td class="source">							$image.style.filter = &quot;progid:DXImageTransform.Microsoft.AlphaImageLoader(src=&#39;&quot;<br></td></tr
><tr
id=sl_svn45_196

><td class="source">									+ $options.image.source<br></td></tr
><tr
id=sl_svn45_197

><td class="source">									+ &quot;&#39;,sizingMethod=&#39;scale&#39;);&quot;;<br></td></tr
><tr
id=sl_svn45_198

><td class="source">						$svg.append($image);<br></td></tr
><tr
id=sl_svn45_199

><td class="source"><br></td></tr
><tr
id=sl_svn45_200

><td class="source">					} else {<br></td></tr
><tr
id=sl_svn45_201

><td class="source">						$svg = _self[0].ownerDocument.createElementNS(<br></td></tr
><tr
id=sl_svn45_202

><td class="source">								&#39;http://www.w3.org/2000/svg&#39;, &#39;svg&#39;);<br></td></tr
><tr
id=sl_svn45_203

><td class="source">						$svg.setAttribute(&#39;id&#39;, &#39;k&#39;);<br></td></tr
><tr
id=sl_svn45_204

><td class="source">						$svg.setAttribute(&#39;width&#39;, $options.width);<br></td></tr
><tr
id=sl_svn45_205

><td class="source">						$svg.setAttribute(&#39;height&#39;, $options.height);<br></td></tr
><tr
id=sl_svn45_206

><td class="source">						$svg.setAttribute(&#39;preserveAspectRatio&#39;, &#39;none&#39;);<br></td></tr
><tr
id=sl_svn45_207

><td class="source">						$image = _self[0].ownerDocument.createElementNS(<br></td></tr
><tr
id=sl_svn45_208

><td class="source">								&#39;http://www.w3.org/2000/svg&#39;, &#39;image&#39;);<br></td></tr
><tr
id=sl_svn45_209

><td class="source">						$image.setAttributeNS(&#39;http://www.w3.org/1999/xlink&#39;,<br></td></tr
><tr
id=sl_svn45_210

><td class="source">								&#39;href&#39;, $options.image.source);<br></td></tr
><tr
id=sl_svn45_211

><td class="source">						$image.setAttribute(&#39;width&#39;, getData(&#39;image&#39;).w);<br></td></tr
><tr
id=sl_svn45_212

><td class="source">						$image.setAttribute(&#39;height&#39;, getData(&#39;image&#39;).h);<br></td></tr
><tr
id=sl_svn45_213

><td class="source">						$image.setAttribute(&#39;preserveAspectRatio&#39;, &#39;none&#39;);<br></td></tr
><tr
id=sl_svn45_214

><td class="source">						$($image).attr(&#39;x&#39;, 0);<br></td></tr
><tr
id=sl_svn45_215

><td class="source">						$($image).attr(&#39;y&#39;, 0);<br></td></tr
><tr
id=sl_svn45_216

><td class="source">						$svg.appendChild($image);<br></td></tr
><tr
id=sl_svn45_217

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_218

><td class="source">					// $($image).data(&#39;container_id&#39;, _self[0].id);<br></td></tr
><tr
id=sl_svn45_219

><td class="source">					_self.append($svg);<br></td></tr
><tr
id=sl_svn45_220

><td class="source"><br></td></tr
><tr
id=sl_svn45_221

><td class="source">					calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_222

><td class="source"><br></td></tr
><tr
id=sl_svn45_223

><td class="source">					// Bindear el drageo a la imagen a cortar<br></td></tr
><tr
id=sl_svn45_224

><td class="source">					$($image).draggable({<br></td></tr
><tr
id=sl_svn45_225

><td class="source">						refreshPositions : true,<br></td></tr
><tr
id=sl_svn45_226

><td class="source">						start : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_227

><td class="source">							// calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_228

><td class="source">						},<br></td></tr
><tr
id=sl_svn45_229

><td class="source">						drag : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_230

><td class="source">							getData(&#39;image&#39;).posY = ui.position.top;<br></td></tr
><tr
id=sl_svn45_231

><td class="source">							getData(&#39;image&#39;).posX = ui.position.left;<br></td></tr
><tr
id=sl_svn45_232

><td class="source">							if ($options.image.snapToContainer)<br></td></tr
><tr
id=sl_svn45_233

><td class="source">								limitBounds(ui);<br></td></tr
><tr
id=sl_svn45_234

><td class="source">							else<br></td></tr
><tr
id=sl_svn45_235

><td class="source">								calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_236

><td class="source">							// Fire the callback<br></td></tr
><tr
id=sl_svn45_237

><td class="source">							if ($options.image.onImageDrag != null)<br></td></tr
><tr
id=sl_svn45_238

><td class="source">								$options.image.onImageDrag($image);<br></td></tr
><tr
id=sl_svn45_239

><td class="source"><br></td></tr
><tr
id=sl_svn45_240

><td class="source">						},<br></td></tr
><tr
id=sl_svn45_241

><td class="source">						stop : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_242

><td class="source">							if ($options.image.snapToContainer)<br></td></tr
><tr
id=sl_svn45_243

><td class="source">								limitBounds(ui);<br></td></tr
><tr
id=sl_svn45_244

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_245

><td class="source">					});<br></td></tr
><tr
id=sl_svn45_246

><td class="source"><br></td></tr
><tr
id=sl_svn45_247

><td class="source">					// Creamos el selector<br></td></tr
><tr
id=sl_svn45_248

><td class="source">					createSelector();<br></td></tr
><tr
id=sl_svn45_249

><td class="source">					// Cambiamos el resizable por un color solido<br></td></tr
><tr
id=sl_svn45_250

><td class="source">					_self.find(&#39;.ui-icon-gripsmall-diagonal-se&#39;).css({<br></td></tr
><tr
id=sl_svn45_251

><td class="source">						&#39;background&#39; : &#39;#FFF&#39;,<br></td></tr
><tr
id=sl_svn45_252

><td class="source">						&#39;border&#39; : &#39;1px solid #000&#39;,<br></td></tr
><tr
id=sl_svn45_253

><td class="source">						&#39;width&#39; : 8,<br></td></tr
><tr
id=sl_svn45_254

><td class="source">						&#39;height&#39; : 8<br></td></tr
><tr
id=sl_svn45_255

><td class="source">					});<br></td></tr
><tr
id=sl_svn45_256

><td class="source">					// Creamos la Capa de oscurecimiento<br></td></tr
><tr
id=sl_svn45_257

><td class="source">					createOverlay();<br></td></tr
><tr
id=sl_svn45_258

><td class="source"><br></td></tr
><tr
id=sl_svn45_259

><td class="source">					if ($options.selector.startWithOverlay) {<br></td></tr
><tr
id=sl_svn45_260

><td class="source">						/* Make Overlays at Start */<br></td></tr
><tr
id=sl_svn45_261

><td class="source">						var ui_object = {<br></td></tr
><tr
id=sl_svn45_262

><td class="source">							position : {<br></td></tr
><tr
id=sl_svn45_263

><td class="source">								top : $selector.position().top,<br></td></tr
><tr
id=sl_svn45_264

><td class="source">								left : $selector.position().left<br></td></tr
><tr
id=sl_svn45_265

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_266

><td class="source">						};<br></td></tr
><tr
id=sl_svn45_267

><td class="source">						makeOverlayPositions(ui_object);<br></td></tr
><tr
id=sl_svn45_268

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_269

><td class="source">					/* End Make Overlay at start */<br></td></tr
><tr
id=sl_svn45_270

><td class="source"><br></td></tr
><tr
id=sl_svn45_271

><td class="source">					// Creamos el Control de Zoom<br></td></tr
><tr
id=sl_svn45_272

><td class="source">					if ($options.enableZoom)<br></td></tr
><tr
id=sl_svn45_273

><td class="source">						createZoomSlider();<br></td></tr
><tr
id=sl_svn45_274

><td class="source">					// Creamos el Control de Rotacion<br></td></tr
><tr
id=sl_svn45_275

><td class="source">					if ($options.enableRotation)<br></td></tr
><tr
id=sl_svn45_276

><td class="source">						createRotationSlider();<br></td></tr
><tr
id=sl_svn45_277

><td class="source">					if ($options.expose.elementMovement != &#39;&#39;)<br></td></tr
><tr
id=sl_svn45_278

><td class="source">						createMovementControls();<br></td></tr
><tr
id=sl_svn45_279

><td class="source"><br></td></tr
><tr
id=sl_svn45_280

><td class="source">					// Methods<br></td></tr
><tr
id=sl_svn45_281

><td class="source">					/*<br></td></tr
><tr
id=sl_svn45_282

><td class="source">					 * function getSelf(){ return _self; }<br></td></tr
><tr
id=sl_svn45_283

><td class="source">					 * <br></td></tr
><tr
id=sl_svn45_284

><td class="source">					 * function getOptions(){ return $options; }<br></td></tr
><tr
id=sl_svn45_285

><td class="source">					 */<br></td></tr
><tr
id=sl_svn45_286

><td class="source"><br></td></tr
><tr
id=sl_svn45_287

><td class="source">					function limitBounds(ui) {<br></td></tr
><tr
id=sl_svn45_288

><td class="source">						if (ui.position.top &gt; 0)<br></td></tr
><tr
id=sl_svn45_289

><td class="source">							getData(&#39;image&#39;).posY = 0;<br></td></tr
><tr
id=sl_svn45_290

><td class="source">						if (ui.position.left &gt; 0)<br></td></tr
><tr
id=sl_svn45_291

><td class="source">							getData(&#39;image&#39;).posX = 0;<br></td></tr
><tr
id=sl_svn45_292

><td class="source"><br></td></tr
><tr
id=sl_svn45_293

><td class="source">						var bottom = -(getData(&#39;image&#39;).h - ui.helper.parent()<br></td></tr
><tr
id=sl_svn45_294

><td class="source">								.parent().height()), right = -(getData(&#39;image&#39;).w - ui.helper<br></td></tr
><tr
id=sl_svn45_295

><td class="source">								.parent().parent().width());<br></td></tr
><tr
id=sl_svn45_296

><td class="source">						if (ui.position.top &lt; bottom)<br></td></tr
><tr
id=sl_svn45_297

><td class="source">							getData(&#39;image&#39;).posY = bottom;<br></td></tr
><tr
id=sl_svn45_298

><td class="source">						if (ui.position.left &lt; right)<br></td></tr
><tr
id=sl_svn45_299

><td class="source">							getData(&#39;image&#39;).posX = right;<br></td></tr
><tr
id=sl_svn45_300

><td class="source">						calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_301

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_302

><td class="source"><br></td></tr
><tr
id=sl_svn45_303

><td class="source">					function getExtensionSource() {<br></td></tr
><tr
id=sl_svn45_304

><td class="source">						var parts = $options.image.source.split(&#39;.&#39;);<br></td></tr
><tr
id=sl_svn45_305

><td class="source">						return parts[parts.length - 1];<br></td></tr
><tr
id=sl_svn45_306

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_307

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_308

><td class="source"><br></td></tr
><tr
id=sl_svn45_309

><td class="source">					function calculateFactor() {<br></td></tr
><tr
id=sl_svn45_310

><td class="source">						getData(&#39;image&#39;).scaleX = ($options.width / getData(&#39;image&#39;).w);<br></td></tr
><tr
id=sl_svn45_311

><td class="source">						getData(&#39;image&#39;).scaleY = ($options.height / getData(&#39;image&#39;).h);<br></td></tr
><tr
id=sl_svn45_312

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_313

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_314

><td class="source"><br></td></tr
><tr
id=sl_svn45_315

><td class="source">					function getCorrectSizes() {<br></td></tr
><tr
id=sl_svn45_316

><td class="source">						if ($options.image.startZoom != 0) {<br></td></tr
><tr
id=sl_svn45_317

><td class="source">							var zoomInPx_width = (($options.image.width * Math<br></td></tr
><tr
id=sl_svn45_318

><td class="source">									.abs($options.image.startZoom)) / 100);<br></td></tr
><tr
id=sl_svn45_319

><td class="source">							var zoomInPx_height = (($options.image.height * Math<br></td></tr
><tr
id=sl_svn45_320

><td class="source">									.abs($options.image.startZoom)) / 100);<br></td></tr
><tr
id=sl_svn45_321

><td class="source">							getData(&#39;image&#39;).h = zoomInPx_height;<br></td></tr
><tr
id=sl_svn45_322

><td class="source">							getData(&#39;image&#39;).w = zoomInPx_width;<br></td></tr
><tr
id=sl_svn45_323

><td class="source">							//Checking if the position was set before<br></td></tr
><tr
id=sl_svn45_324

><td class="source">							if (getData(&#39;image&#39;).posY != 0<br></td></tr
><tr
id=sl_svn45_325

><td class="source">									&amp;&amp; getData(&#39;image&#39;).posX != 0) {<br></td></tr
><tr
id=sl_svn45_326

><td class="source">								if (getData(&#39;image&#39;).h &gt; $options.height)<br></td></tr
><tr
id=sl_svn45_327

><td class="source">									getData(&#39;image&#39;).posY = Math<br></td></tr
><tr
id=sl_svn45_328

><td class="source">											.abs(($options.height / 2)<br></td></tr
><tr
id=sl_svn45_329

><td class="source">													- (getData(&#39;image&#39;).h / 2));<br></td></tr
><tr
id=sl_svn45_330

><td class="source">								else<br></td></tr
><tr
id=sl_svn45_331

><td class="source">									getData(&#39;image&#39;).posY = (($options.height / 2) - (getData(&#39;image&#39;).h / 2));<br></td></tr
><tr
id=sl_svn45_332

><td class="source">								if (getData(&#39;image&#39;).w &gt; $options.width)<br></td></tr
><tr
id=sl_svn45_333

><td class="source">									getData(&#39;image&#39;).posX = Math<br></td></tr
><tr
id=sl_svn45_334

><td class="source">											.abs(($options.width / 2)<br></td></tr
><tr
id=sl_svn45_335

><td class="source">													- (getData(&#39;image&#39;).w / 2));<br></td></tr
><tr
id=sl_svn45_336

><td class="source">								else<br></td></tr
><tr
id=sl_svn45_337

><td class="source">									getData(&#39;image&#39;).posX = (($options.width / 2) - (getData(&#39;image&#39;).w / 2));<br></td></tr
><tr
id=sl_svn45_338

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_339

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_340

><td class="source">							var scaleX = getData(&#39;image&#39;).scaleX;<br></td></tr
><tr
id=sl_svn45_341

><td class="source">							var scaleY = getData(&#39;image&#39;).scaleY;<br></td></tr
><tr
id=sl_svn45_342

><td class="source">							if (scaleY &lt; scaleX) {<br></td></tr
><tr
id=sl_svn45_343

><td class="source">								getData(&#39;image&#39;).h = $options.height;<br></td></tr
><tr
id=sl_svn45_344

><td class="source">								getData(&#39;image&#39;).w = Math<br></td></tr
><tr
id=sl_svn45_345

><td class="source">										.round(getData(&#39;image&#39;).w * scaleY);<br></td></tr
><tr
id=sl_svn45_346

><td class="source">							} else {<br></td></tr
><tr
id=sl_svn45_347

><td class="source">								getData(&#39;image&#39;).h = Math<br></td></tr
><tr
id=sl_svn45_348

><td class="source">										.round(getData(&#39;image&#39;).h * scaleX);<br></td></tr
><tr
id=sl_svn45_349

><td class="source">								getData(&#39;image&#39;).w = $options.width;<br></td></tr
><tr
id=sl_svn45_350

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_351

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_352

><td class="source"><br></td></tr
><tr
id=sl_svn45_353

><td class="source">						// Disable snap to container if is little<br></td></tr
><tr
id=sl_svn45_354

><td class="source">						if (getData(&#39;image&#39;).w &lt; $options.width<br></td></tr
><tr
id=sl_svn45_355

><td class="source">								&amp;&amp; getData(&#39;image&#39;).h &lt; $options.height) {<br></td></tr
><tr
id=sl_svn45_356

><td class="source">							$options.image.snapToContainer = false;<br></td></tr
><tr
id=sl_svn45_357

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_358

><td class="source">						calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_359

><td class="source"><br></td></tr
><tr
id=sl_svn45_360

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_361

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_362

><td class="source"><br></td></tr
><tr
id=sl_svn45_363

><td class="source">					function calculateTranslationAndRotation() {<br></td></tr
><tr
id=sl_svn45_364

><td class="source">						var rotacion = &quot;&quot;;<br></td></tr
><tr
id=sl_svn45_365

><td class="source">						var traslacion = &quot;&quot;;<br></td></tr
><tr
id=sl_svn45_366

><td class="source">						$(function() {<br></td></tr
><tr
id=sl_svn45_367

><td class="source">							// console.log(imageData.id);<br></td></tr
><tr
id=sl_svn45_368

><td class="source">							if ($.browser.msie) {<br></td></tr
><tr
id=sl_svn45_369

><td class="source">								if ($.support.leadingWhitespace) {<br></td></tr
><tr
id=sl_svn45_370

><td class="source">									rotacion = &quot;rotate(&quot;<br></td></tr
><tr
id=sl_svn45_371

><td class="source">											+ getData(&#39;image&#39;).rotation<br></td></tr
><tr
id=sl_svn45_372

><td class="source">											+ &quot;deg)&quot;;/*<br></td></tr
><tr
id=sl_svn45_373

><td class="source">														 * +<br></td></tr
><tr
id=sl_svn45_374

><td class="source">														 * (getData(&#39;image&#39;).posX +<br></td></tr
><tr
id=sl_svn45_375

><td class="source">														 * (getData(&#39;image&#39;).w /<br></td></tr
><tr
id=sl_svn45_376

><td class="source">														 * 2 )) + &quot;,&quot; +<br></td></tr
><tr
id=sl_svn45_377

><td class="source">														 * (getData(&#39;image&#39;).posY +<br></td></tr
><tr
id=sl_svn45_378

><td class="source">														 * (getData(&#39;image&#39;).h /<br></td></tr
><tr
id=sl_svn45_379

><td class="source">														 * 2)) +<br></td></tr
><tr
id=sl_svn45_380

><td class="source">														 */<br></td></tr
><tr
id=sl_svn45_381

><td class="source">									$($image).css({<br></td></tr
><tr
id=sl_svn45_382

><td class="source">										&#39;msTransform&#39; : rotacion,<br></td></tr
><tr
id=sl_svn45_383

><td class="source">										&#39;top&#39; : getData(&#39;image&#39;).posY,<br></td></tr
><tr
id=sl_svn45_384

><td class="source">										&#39;left&#39; : getData(&#39;image&#39;).posX<br></td></tr
><tr
id=sl_svn45_385

><td class="source">									});<br></td></tr
><tr
id=sl_svn45_386

><td class="source"><br></td></tr
><tr
id=sl_svn45_387

><td class="source">								} else {<br></td></tr
><tr
id=sl_svn45_388

><td class="source">									rotacion = getData(&#39;image&#39;).rotation;<br></td></tr
><tr
id=sl_svn45_389

><td class="source">									$($image).css({<br></td></tr
><tr
id=sl_svn45_390

><td class="source">										&#39;rotation&#39; : rotacion,<br></td></tr
><tr
id=sl_svn45_391

><td class="source">										&#39;top&#39; : getData(&#39;image&#39;).posY,<br></td></tr
><tr
id=sl_svn45_392

><td class="source">										&#39;left&#39; : getData(&#39;image&#39;).posX<br></td></tr
><tr
id=sl_svn45_393

><td class="source">									});<br></td></tr
><tr
id=sl_svn45_394

><td class="source">								}<br></td></tr
><tr
id=sl_svn45_395

><td class="source">							} else {<br></td></tr
><tr
id=sl_svn45_396

><td class="source">								rotacion = &quot;rotate(&quot;<br></td></tr
><tr
id=sl_svn45_397

><td class="source">										+ getData(&#39;image&#39;).rotation<br></td></tr
><tr
id=sl_svn45_398

><td class="source">										+ &quot;,&quot;<br></td></tr
><tr
id=sl_svn45_399

><td class="source">										+ (getData(&#39;image&#39;).posX + (getData(&#39;image&#39;).w / 2))<br></td></tr
><tr
id=sl_svn45_400

><td class="source">										+ &quot;,&quot;<br></td></tr
><tr
id=sl_svn45_401

><td class="source">										+ (getData(&#39;image&#39;).posY + (getData(&#39;image&#39;).h / 2))<br></td></tr
><tr
id=sl_svn45_402

><td class="source">										+ &quot;)&quot;;<br></td></tr
><tr
id=sl_svn45_403

><td class="source">								traslacion = &quot; translate(&quot;<br></td></tr
><tr
id=sl_svn45_404

><td class="source">										+ getData(&#39;image&#39;).posX + &quot;,&quot;<br></td></tr
><tr
id=sl_svn45_405

><td class="source">										+ getData(&#39;image&#39;).posY + &quot;)&quot;;<br></td></tr
><tr
id=sl_svn45_406

><td class="source">								rotacion += traslacion;<br></td></tr
><tr
id=sl_svn45_407

><td class="source">								$($image).attr(&quot;transform&quot;, rotacion);<br></td></tr
><tr
id=sl_svn45_408

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_409

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_410

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_411

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_412

><td class="source"><br></td></tr
><tr
id=sl_svn45_413

><td class="source">					function createRotationSlider() {<br></td></tr
><tr
id=sl_svn45_414

><td class="source"><br></td></tr
><tr
id=sl_svn45_415

><td class="source">						var rotationContainerSlider = $(&quot;&lt;div /&gt;&quot;).attr(&#39;id&#39;,<br></td></tr
><tr
id=sl_svn45_416

><td class="source">								&#39;rotationContainer&#39;).mouseover(function() {<br></td></tr
><tr
id=sl_svn45_417

><td class="source">							$(this).css(&#39;opacity&#39;, 1);<br></td></tr
><tr
id=sl_svn45_418

><td class="source">						}).mouseout(function() {<br></td></tr
><tr
id=sl_svn45_419

><td class="source">							$(this).css(&#39;opacity&#39;, 0.6);<br></td></tr
><tr
id=sl_svn45_420

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_421

><td class="source"><br></td></tr
><tr
id=sl_svn45_422

><td class="source">						var rotMin = $(&#39;&lt;div /&gt;&#39;).attr(&#39;id&#39;, &#39;rotationMin&#39;)<br></td></tr
><tr
id=sl_svn45_423

><td class="source">								.html(&quot;0&quot;);<br></td></tr
><tr
id=sl_svn45_424

><td class="source">						var rotMax = $(&#39;&lt;div /&gt;&#39;).attr(&#39;id&#39;, &#39;rotationMax&#39;)<br></td></tr
><tr
id=sl_svn45_425

><td class="source">								.html(&quot;360&quot;);<br></td></tr
><tr
id=sl_svn45_426

><td class="source"><br></td></tr
><tr
id=sl_svn45_427

><td class="source">						var $slider = $(&quot;&lt;div /&gt;&quot;).attr(&#39;id&#39;, &#39;rotationSlider&#39;);<br></td></tr
><tr
id=sl_svn45_428

><td class="source">						// Aplicamos el Slider<br></td></tr
><tr
id=sl_svn45_429

><td class="source">						var orientation = &#39;vertical&#39;;<br></td></tr
><tr
id=sl_svn45_430

><td class="source">						var value = Math.abs(360 - $options.image.rotation);<br></td></tr
><tr
id=sl_svn45_431

><td class="source"><br></td></tr
><tr
id=sl_svn45_432

><td class="source">						if ($options.expose.slidersOrientation == &#39;horizontal&#39;) {<br></td></tr
><tr
id=sl_svn45_433

><td class="source">							orientation = &#39;horizontal&#39;;<br></td></tr
><tr
id=sl_svn45_434

><td class="source">							value = $options.image.rotation;<br></td></tr
><tr
id=sl_svn45_435

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_436

><td class="source"><br></td></tr
><tr
id=sl_svn45_437

><td class="source">						$slider<br></td></tr
><tr
id=sl_svn45_438

><td class="source">								.slider({<br></td></tr
><tr
id=sl_svn45_439

><td class="source">									orientation : orientation,<br></td></tr
><tr
id=sl_svn45_440

><td class="source">									value : value,<br></td></tr
><tr
id=sl_svn45_441

><td class="source">									range : &quot;max&quot;,<br></td></tr
><tr
id=sl_svn45_442

><td class="source">									min : 0,<br></td></tr
><tr
id=sl_svn45_443

><td class="source">									max : 360,<br></td></tr
><tr
id=sl_svn45_444

><td class="source">									step : (($options.rotationSteps &gt; 360 || $options.rotationSteps &lt; 0) ? 1<br></td></tr
><tr
id=sl_svn45_445

><td class="source">											: $options.rotationSteps),<br></td></tr
><tr
id=sl_svn45_446

><td class="source">									slide : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_447

><td class="source">										getData(&#39;image&#39;).rotation = (value == 360 ? Math<br></td></tr
><tr
id=sl_svn45_448

><td class="source">												.abs(360 - ui.value)<br></td></tr
><tr
id=sl_svn45_449

><td class="source">												: Math.abs(ui.value));<br></td></tr
><tr
id=sl_svn45_450

><td class="source">										calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_451

><td class="source">										if ($options.image.onRotate != null)<br></td></tr
><tr
id=sl_svn45_452

><td class="source">											$options.image.onRotate($slider,<br></td></tr
><tr
id=sl_svn45_453

><td class="source">													getData(&#39;image&#39;).rotation);<br></td></tr
><tr
id=sl_svn45_454

><td class="source">									}<br></td></tr
><tr
id=sl_svn45_455

><td class="source">								});<br></td></tr
><tr
id=sl_svn45_456

><td class="source"><br></td></tr
><tr
id=sl_svn45_457

><td class="source">						rotationContainerSlider.append(rotMin);<br></td></tr
><tr
id=sl_svn45_458

><td class="source">						rotationContainerSlider.append($slider);<br></td></tr
><tr
id=sl_svn45_459

><td class="source">						rotationContainerSlider.append(rotMax);<br></td></tr
><tr
id=sl_svn45_460

><td class="source"><br></td></tr
><tr
id=sl_svn45_461

><td class="source">						if ($options.expose.rotationElement != &#39;&#39;) {<br></td></tr
><tr
id=sl_svn45_462

><td class="source">							$slider<br></td></tr
><tr
id=sl_svn45_463

><td class="source">									.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_464

><td class="source">							rotationContainerSlider<br></td></tr
><tr
id=sl_svn45_465

><td class="source">									.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_466

><td class="source">							rotMin.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_467

><td class="source">							rotMax.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_468

><td class="source">							$($options.expose.rotationElement).append(<br></td></tr
><tr
id=sl_svn45_469

><td class="source">									rotationContainerSlider);<br></td></tr
><tr
id=sl_svn45_470

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_471

><td class="source">							$slider.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_472

><td class="source">							rotationContainerSlider.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_473

><td class="source">							rotMin.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_474

><td class="source">							rotMax.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_475

><td class="source">							rotationContainerSlider.css({<br></td></tr
><tr
id=sl_svn45_476

><td class="source">								&#39;position&#39; : &#39;absolute&#39;,<br></td></tr
><tr
id=sl_svn45_477

><td class="source">								&#39;top&#39; : 5,<br></td></tr
><tr
id=sl_svn45_478

><td class="source">								&#39;left&#39; : 5,<br></td></tr
><tr
id=sl_svn45_479

><td class="source">								&#39;opacity&#39; : 0.6<br></td></tr
><tr
id=sl_svn45_480

><td class="source">							});<br></td></tr
><tr
id=sl_svn45_481

><td class="source">							_self.append(rotationContainerSlider);<br></td></tr
><tr
id=sl_svn45_482

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_483

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_484

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_485

><td class="source"><br></td></tr
><tr
id=sl_svn45_486

><td class="source">					function createZoomSlider() {<br></td></tr
><tr
id=sl_svn45_487

><td class="source"><br></td></tr
><tr
id=sl_svn45_488

><td class="source">						var zoomContainerSlider = $(&quot;&lt;div /&gt;&quot;).attr(&#39;id&#39;,<br></td></tr
><tr
id=sl_svn45_489

><td class="source">								&#39;zoomContainer&#39;).mouseover(function() {<br></td></tr
><tr
id=sl_svn45_490

><td class="source">							$(this).css(&#39;opacity&#39;, 1);<br></td></tr
><tr
id=sl_svn45_491

><td class="source">						}).mouseout(function() {<br></td></tr
><tr
id=sl_svn45_492

><td class="source">							$(this).css(&#39;opacity&#39;, 0.6);<br></td></tr
><tr
id=sl_svn45_493

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_494

><td class="source"><br></td></tr
><tr
id=sl_svn45_495

><td class="source">						var zoomMin = $(&#39;&lt;div /&gt;&#39;).attr(&#39;id&#39;, &#39;zoomMin&#39;).html(<br></td></tr
><tr
id=sl_svn45_496

><td class="source">								&quot;&lt;b&gt;-&lt;/b&gt;&quot;);<br></td></tr
><tr
id=sl_svn45_497

><td class="source">						var zoomMax = $(&#39;&lt;div /&gt;&#39;).attr(&#39;id&#39;, &#39;zoomMax&#39;).html(<br></td></tr
><tr
id=sl_svn45_498

><td class="source">								&quot;&lt;b&gt;+&lt;/b&gt;&quot;);<br></td></tr
><tr
id=sl_svn45_499

><td class="source"><br></td></tr
><tr
id=sl_svn45_500

><td class="source">						var $slider = $(&quot;&lt;div /&gt;&quot;).attr(&#39;id&#39;, &#39;zoomSlider&#39;);<br></td></tr
><tr
id=sl_svn45_501

><td class="source"><br></td></tr
><tr
id=sl_svn45_502

><td class="source">						// Aplicamos el Slider<br></td></tr
><tr
id=sl_svn45_503

><td class="source">						$slider<br></td></tr
><tr
id=sl_svn45_504

><td class="source">								.slider({<br></td></tr
><tr
id=sl_svn45_505

><td class="source">									orientation : ($options.expose.zoomElement != &#39;&#39; ? $options.expose.slidersOrientation<br></td></tr
><tr
id=sl_svn45_506

><td class="source">											: &#39;vertical&#39;),<br></td></tr
><tr
id=sl_svn45_507

><td class="source">									value : ($options.image.startZoom != 0 ? $options.image.startZoom<br></td></tr
><tr
id=sl_svn45_508

><td class="source">											: getPercentOfZoom(getData(&#39;image&#39;))),<br></td></tr
><tr
id=sl_svn45_509

><td class="source">									min : ($options.image.useStartZoomAsMinZoom ? $options.image.startZoom<br></td></tr
><tr
id=sl_svn45_510

><td class="source">											: $options.image.minZoom),<br></td></tr
><tr
id=sl_svn45_511

><td class="source">									max : $options.image.maxZoom,<br></td></tr
><tr
id=sl_svn45_512

><td class="source">									step : (($options.zoomSteps &gt; $options.image.maxZoom || $options.zoomSteps &lt; 0) ? 1<br></td></tr
><tr
id=sl_svn45_513

><td class="source">											: $options.zoomSteps),<br></td></tr
><tr
id=sl_svn45_514

><td class="source">									slide : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_515

><td class="source">										var value = ($options.expose.slidersOrientation == &#39;vertical&#39; ? ($options.image.maxZoom - ui.value)<br></td></tr
><tr
id=sl_svn45_516

><td class="source">												: ui.value);<br></td></tr
><tr
id=sl_svn45_517

><td class="source">										var zoomInPx_width = ($options.image.width<br></td></tr
><tr
id=sl_svn45_518

><td class="source">												* Math.abs(value) / 100);<br></td></tr
><tr
id=sl_svn45_519

><td class="source">										var zoomInPx_height = ($options.image.height<br></td></tr
><tr
id=sl_svn45_520

><td class="source">												* Math.abs(value) / 100);<br></td></tr
><tr
id=sl_svn45_521

><td class="source">										if ($.browser.msie) {<br></td></tr
><tr
id=sl_svn45_522

><td class="source">											$($image)<br></td></tr
><tr
id=sl_svn45_523

><td class="source">													.css(<br></td></tr
><tr
id=sl_svn45_524

><td class="source">															{<br></td></tr
><tr
id=sl_svn45_525

><td class="source">																&#39;width&#39; : zoomInPx_width<br></td></tr
><tr
id=sl_svn45_526

><td class="source">																		+ &quot;px&quot;,<br></td></tr
><tr
id=sl_svn45_527

><td class="source">																&#39;height&#39; : zoomInPx_height<br></td></tr
><tr
id=sl_svn45_528

><td class="source">																		+ &quot;px&quot;<br></td></tr
><tr
id=sl_svn45_529

><td class="source">															});<br></td></tr
><tr
id=sl_svn45_530

><td class="source"><br></td></tr
><tr
id=sl_svn45_531

><td class="source">										} else {<br></td></tr
><tr
id=sl_svn45_532

><td class="source">											$($image).attr(&#39;width&#39;,<br></td></tr
><tr
id=sl_svn45_533

><td class="source">													zoomInPx_width + &quot;px&quot;);<br></td></tr
><tr
id=sl_svn45_534

><td class="source">											$($image).attr(&#39;height&#39;,<br></td></tr
><tr
id=sl_svn45_535

><td class="source">													zoomInPx_height + &quot;px&quot;);<br></td></tr
><tr
id=sl_svn45_536

><td class="source">										}<br></td></tr
><tr
id=sl_svn45_537

><td class="source"><br></td></tr
><tr
id=sl_svn45_538

><td class="source">										var difX = (getData(&#39;image&#39;).w / 2)<br></td></tr
><tr
id=sl_svn45_539

><td class="source">												- (zoomInPx_width / 2);<br></td></tr
><tr
id=sl_svn45_540

><td class="source">										var difY = (getData(&#39;image&#39;).h / 2)<br></td></tr
><tr
id=sl_svn45_541

><td class="source">												- (zoomInPx_height / 2);<br></td></tr
><tr
id=sl_svn45_542

><td class="source"><br></td></tr
><tr
id=sl_svn45_543

><td class="source">										var newX = (difX &gt; 0 ? getData(&#39;image&#39;).posX<br></td></tr
><tr
id=sl_svn45_544

><td class="source">												+ Math.abs(difX)<br></td></tr
><tr
id=sl_svn45_545

><td class="source">												: getData(&#39;image&#39;).posX<br></td></tr
><tr
id=sl_svn45_546

><td class="source">														- Math.abs(difX));<br></td></tr
><tr
id=sl_svn45_547

><td class="source">										var newY = (difY &gt; 0 ? getData(&#39;image&#39;).posY<br></td></tr
><tr
id=sl_svn45_548

><td class="source">												+ Math.abs(difY)<br></td></tr
><tr
id=sl_svn45_549

><td class="source">												: getData(&#39;image&#39;).posY<br></td></tr
><tr
id=sl_svn45_550

><td class="source">														- Math.abs(difY));<br></td></tr
><tr
id=sl_svn45_551

><td class="source">										getData(&#39;image&#39;).posX = newX;<br></td></tr
><tr
id=sl_svn45_552

><td class="source">										getData(&#39;image&#39;).posY = newY;<br></td></tr
><tr
id=sl_svn45_553

><td class="source">										getData(&#39;image&#39;).w = zoomInPx_width;<br></td></tr
><tr
id=sl_svn45_554

><td class="source">										getData(&#39;image&#39;).h = zoomInPx_height;<br></td></tr
><tr
id=sl_svn45_555

><td class="source">										calculateFactor();<br></td></tr
><tr
id=sl_svn45_556

><td class="source">										calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_557

><td class="source">										if ($options.image.onZoom != null) {<br></td></tr
><tr
id=sl_svn45_558

><td class="source">											$options.image.onZoom($image,<br></td></tr
><tr
id=sl_svn45_559

><td class="source">													getData(&#39;image&#39;));<br></td></tr
><tr
id=sl_svn45_560

><td class="source">										}<br></td></tr
><tr
id=sl_svn45_561

><td class="source">									}<br></td></tr
><tr
id=sl_svn45_562

><td class="source">								});<br></td></tr
><tr
id=sl_svn45_563

><td class="source"><br></td></tr
><tr
id=sl_svn45_564

><td class="source">						if ($options.slidersOrientation == &#39;vertical&#39;) {<br></td></tr
><tr
id=sl_svn45_565

><td class="source">							zoomContainerSlider.append(zoomMax);<br></td></tr
><tr
id=sl_svn45_566

><td class="source">							zoomContainerSlider.append($slider);<br></td></tr
><tr
id=sl_svn45_567

><td class="source">							zoomContainerSlider.append(zoomMin);<br></td></tr
><tr
id=sl_svn45_568

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_569

><td class="source">							zoomContainerSlider.append(zoomMin);<br></td></tr
><tr
id=sl_svn45_570

><td class="source">							zoomContainerSlider.append($slider);<br></td></tr
><tr
id=sl_svn45_571

><td class="source">							zoomContainerSlider.append(zoomMax);<br></td></tr
><tr
id=sl_svn45_572

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_573

><td class="source"><br></td></tr
><tr
id=sl_svn45_574

><td class="source">						if ($options.expose.zoomElement != &#39;&#39;) {<br></td></tr
><tr
id=sl_svn45_575

><td class="source">							zoomMin<br></td></tr
><tr
id=sl_svn45_576

><td class="source">									.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_577

><td class="source">							zoomMax<br></td></tr
><tr
id=sl_svn45_578

><td class="source">									.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_579

><td class="source">							$slider<br></td></tr
><tr
id=sl_svn45_580

><td class="source">									.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_581

><td class="source">							zoomContainerSlider<br></td></tr
><tr
id=sl_svn45_582

><td class="source">									.addClass($options.expose.slidersOrientation);<br></td></tr
><tr
id=sl_svn45_583

><td class="source">							$($options.expose.zoomElement).append(<br></td></tr
><tr
id=sl_svn45_584

><td class="source">									zoomContainerSlider);<br></td></tr
><tr
id=sl_svn45_585

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_586

><td class="source">							zoomMin.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_587

><td class="source">							zoomMax.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_588

><td class="source">							$slider.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_589

><td class="source">							zoomContainerSlider.addClass(&#39;vertical&#39;);<br></td></tr
><tr
id=sl_svn45_590

><td class="source">							zoomContainerSlider.css({<br></td></tr
><tr
id=sl_svn45_591

><td class="source">								&#39;position&#39; : &#39;absolute&#39;,<br></td></tr
><tr
id=sl_svn45_592

><td class="source">								&#39;top&#39; : 5,<br></td></tr
><tr
id=sl_svn45_593

><td class="source">								&#39;right&#39; : 5,<br></td></tr
><tr
id=sl_svn45_594

><td class="source">								&#39;opacity&#39; : 0.6<br></td></tr
><tr
id=sl_svn45_595

><td class="source">							});<br></td></tr
><tr
id=sl_svn45_596

><td class="source">							_self.append(zoomContainerSlider);<br></td></tr
><tr
id=sl_svn45_597

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_598

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_599

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_600

><td class="source"><br></td></tr
><tr
id=sl_svn45_601

><td class="source">					function getPercentOfZoom() {<br></td></tr
><tr
id=sl_svn45_602

><td class="source">						var percent = 0;<br></td></tr
><tr
id=sl_svn45_603

><td class="source">						if (getData(&#39;image&#39;).w &gt; getData(&#39;image&#39;).h) {<br></td></tr
><tr
id=sl_svn45_604

><td class="source">							percent = $options.image.maxZoom<br></td></tr
><tr
id=sl_svn45_605

><td class="source">									- ((getData(&#39;image&#39;).w * 100) / $options.image.width);<br></td></tr
><tr
id=sl_svn45_606

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_607

><td class="source">							percent = $options.image.maxZoom<br></td></tr
><tr
id=sl_svn45_608

><td class="source">									- ((getData(&#39;image&#39;).h * 100) / $options.image.height);<br></td></tr
><tr
id=sl_svn45_609

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_610

><td class="source">						return percent;<br></td></tr
><tr
id=sl_svn45_611

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_612

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_613

><td class="source"><br></td></tr
><tr
id=sl_svn45_614

><td class="source">					function createSelector() {<br></td></tr
><tr
id=sl_svn45_615

><td class="source">						if ($options.selector.centered) {<br></td></tr
><tr
id=sl_svn45_616

><td class="source">							getData(&#39;selector&#39;).y = ($options.height / 2)<br></td></tr
><tr
id=sl_svn45_617

><td class="source">									- (getData(&#39;selector&#39;).h / 2);<br></td></tr
><tr
id=sl_svn45_618

><td class="source">							getData(&#39;selector&#39;).x = ($options.width / 2)<br></td></tr
><tr
id=sl_svn45_619

><td class="source">									- (getData(&#39;selector&#39;).w / 2);<br></td></tr
><tr
id=sl_svn45_620

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_621

><td class="source"><br></td></tr
><tr
id=sl_svn45_622

><td class="source">						$selector = $(&#39;&lt;div/&gt;&#39;)<br></td></tr
><tr
id=sl_svn45_623

><td class="source">								.attr(&#39;id&#39;, _self[0].id + &#39;_selector&#39;)<br></td></tr
><tr
id=sl_svn45_624

><td class="source">								.css(<br></td></tr
><tr
id=sl_svn45_625

><td class="source">										{<br></td></tr
><tr
id=sl_svn45_626

><td class="source">											&#39;width&#39; : getData(&#39;selector&#39;).w,<br></td></tr
><tr
id=sl_svn45_627

><td class="source">											&#39;height&#39; : getData(&#39;selector&#39;).h,<br></td></tr
><tr
id=sl_svn45_628

><td class="source">											&#39;top&#39; : getData(&#39;selector&#39;).y<br></td></tr
><tr
id=sl_svn45_629

><td class="source">													+ &#39;px&#39;,<br></td></tr
><tr
id=sl_svn45_630

><td class="source">											&#39;left&#39; : getData(&#39;selector&#39;).x<br></td></tr
><tr
id=sl_svn45_631

><td class="source">													+ &#39;px&#39;,<br></td></tr
><tr
id=sl_svn45_632

><td class="source">											&#39;border&#39; : &#39;1px dashed &#39;<br></td></tr
><tr
id=sl_svn45_633

><td class="source">													+ $options.selector.borderColor,<br></td></tr
><tr
id=sl_svn45_634

><td class="source">											&#39;position&#39; : &#39;absolute&#39;,<br></td></tr
><tr
id=sl_svn45_635

><td class="source">											&#39;cursor&#39; : &#39;move&#39;<br></td></tr
><tr
id=sl_svn45_636

><td class="source">										})<br></td></tr
><tr
id=sl_svn45_637

><td class="source">								.mouseover(<br></td></tr
><tr
id=sl_svn45_638

><td class="source">										function() {<br></td></tr
><tr
id=sl_svn45_639

><td class="source">											$(this)<br></td></tr
><tr
id=sl_svn45_640

><td class="source">													.css(<br></td></tr
><tr
id=sl_svn45_641

><td class="source">															{<br></td></tr
><tr
id=sl_svn45_642

><td class="source">																&#39;border&#39; : &#39;1px dashed &#39;<br></td></tr
><tr
id=sl_svn45_643

><td class="source">																		+ $options.selector.borderColorHover<br></td></tr
><tr
id=sl_svn45_644

><td class="source">															})<br></td></tr
><tr
id=sl_svn45_645

><td class="source">										})<br></td></tr
><tr
id=sl_svn45_646

><td class="source">								.mouseout(<br></td></tr
><tr
id=sl_svn45_647

><td class="source">										function() {<br></td></tr
><tr
id=sl_svn45_648

><td class="source">											$(this)<br></td></tr
><tr
id=sl_svn45_649

><td class="source">													.css(<br></td></tr
><tr
id=sl_svn45_650

><td class="source">															{<br></td></tr
><tr
id=sl_svn45_651

><td class="source">																&#39;border&#39; : &#39;1px dashed &#39;<br></td></tr
><tr
id=sl_svn45_652

><td class="source">																		+ $options.selector.borderColor<br></td></tr
><tr
id=sl_svn45_653

><td class="source">															})<br></td></tr
><tr
id=sl_svn45_654

><td class="source">										});<br></td></tr
><tr
id=sl_svn45_655

><td class="source">						// Aplicamos el drageo al selector<br></td></tr
><tr
id=sl_svn45_656

><td class="source">						$selector<br></td></tr
><tr
id=sl_svn45_657

><td class="source">								.draggable({<br></td></tr
><tr
id=sl_svn45_658

><td class="source">									containment : &#39;parent&#39;,<br></td></tr
><tr
id=sl_svn45_659

><td class="source">									iframeFix : true,<br></td></tr
><tr
id=sl_svn45_660

><td class="source">									refreshPositions : true,<br></td></tr
><tr
id=sl_svn45_661

><td class="source">									drag : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_662

><td class="source">										// Actualizamos las posiciones de la<br></td></tr
><tr
id=sl_svn45_663

><td class="source">										// mascara<br></td></tr
><tr
id=sl_svn45_664

><td class="source">										getData(&#39;selector&#39;).x = ui.position.left;<br></td></tr
><tr
id=sl_svn45_665

><td class="source">										getData(&#39;selector&#39;).y = ui.position.top;<br></td></tr
><tr
id=sl_svn45_666

><td class="source">										makeOverlayPositions(ui);<br></td></tr
><tr
id=sl_svn45_667

><td class="source">										showInfo();<br></td></tr
><tr
id=sl_svn45_668

><td class="source">										if ($options.selector.onSelectorDrag != null)<br></td></tr
><tr
id=sl_svn45_669

><td class="source">											$options.selector.onSelectorDrag(<br></td></tr
><tr
id=sl_svn45_670

><td class="source">													$selector,<br></td></tr
><tr
id=sl_svn45_671

><td class="source">													getData(&#39;selector&#39;));<br></td></tr
><tr
id=sl_svn45_672

><td class="source">									},<br></td></tr
><tr
id=sl_svn45_673

><td class="source">									stop : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_674

><td class="source">										// Ocultar la mascara<br></td></tr
><tr
id=sl_svn45_675

><td class="source">										if ($options.selector.hideOverlayOnDragAndResize)<br></td></tr
><tr
id=sl_svn45_676

><td class="source">											hideOverlay();<br></td></tr
><tr
id=sl_svn45_677

><td class="source">										if ($options.selector.onSelectorDragStop != null)<br></td></tr
><tr
id=sl_svn45_678

><td class="source">											$options.selector<br></td></tr
><tr
id=sl_svn45_679

><td class="source">													.onSelectorDragStop(<br></td></tr
><tr
id=sl_svn45_680

><td class="source">															$selector,<br></td></tr
><tr
id=sl_svn45_681

><td class="source">															getData(&#39;selector&#39;));<br></td></tr
><tr
id=sl_svn45_682

><td class="source">									}<br></td></tr
><tr
id=sl_svn45_683

><td class="source">								});<br></td></tr
><tr
id=sl_svn45_684

><td class="source">						$selector<br></td></tr
><tr
id=sl_svn45_685

><td class="source">								.resizable({<br></td></tr
><tr
id=sl_svn45_686

><td class="source">									aspectRatio : $options.selector.aspectRatio,<br></td></tr
><tr
id=sl_svn45_687

><td class="source">									maxHeight : $options.selector.maxHeight,<br></td></tr
><tr
id=sl_svn45_688

><td class="source">									maxWidth : $options.selector.maxWidth,<br></td></tr
><tr
id=sl_svn45_689

><td class="source">									minHeight : $options.selector.h,<br></td></tr
><tr
id=sl_svn45_690

><td class="source">									minWidth : $options.selector.w,<br></td></tr
><tr
id=sl_svn45_691

><td class="source">									containment : &#39;parent&#39;,<br></td></tr
><tr
id=sl_svn45_692

><td class="source">									resize : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_693

><td class="source">										// Actualizamos las posiciones de la<br></td></tr
><tr
id=sl_svn45_694

><td class="source">										// mascara<br></td></tr
><tr
id=sl_svn45_695

><td class="source">										getData(&#39;selector&#39;).w = $selector<br></td></tr
><tr
id=sl_svn45_696

><td class="source">												.width();<br></td></tr
><tr
id=sl_svn45_697

><td class="source">										getData(&#39;selector&#39;).h = $selector<br></td></tr
><tr
id=sl_svn45_698

><td class="source">												.height();<br></td></tr
><tr
id=sl_svn45_699

><td class="source">										makeOverlayPositions(ui);<br></td></tr
><tr
id=sl_svn45_700

><td class="source">										showInfo();<br></td></tr
><tr
id=sl_svn45_701

><td class="source">										if ($options.selector.onSelectorResize != null)<br></td></tr
><tr
id=sl_svn45_702

><td class="source">											$options.selector.onSelectorResize(<br></td></tr
><tr
id=sl_svn45_703

><td class="source">													$selector,<br></td></tr
><tr
id=sl_svn45_704

><td class="source">													getData(&#39;selector&#39;));<br></td></tr
><tr
id=sl_svn45_705

><td class="source">									},<br></td></tr
><tr
id=sl_svn45_706

><td class="source">									stop : function(event, ui) {<br></td></tr
><tr
id=sl_svn45_707

><td class="source">										if ($options.selector.hideOverlayOnDragAndResize)<br></td></tr
><tr
id=sl_svn45_708

><td class="source">											hideOverlay();<br></td></tr
><tr
id=sl_svn45_709

><td class="source">										if ($options.selector.onSelectorResizeStop != null)<br></td></tr
><tr
id=sl_svn45_710

><td class="source">											$options.selector<br></td></tr
><tr
id=sl_svn45_711

><td class="source">													.onSelectorResizeStop(<br></td></tr
><tr
id=sl_svn45_712

><td class="source">															$selector,<br></td></tr
><tr
id=sl_svn45_713

><td class="source">															getData(&#39;selector&#39;));<br></td></tr
><tr
id=sl_svn45_714

><td class="source">									}<br></td></tr
><tr
id=sl_svn45_715

><td class="source">								});<br></td></tr
><tr
id=sl_svn45_716

><td class="source"><br></td></tr
><tr
id=sl_svn45_717

><td class="source">						showInfo($selector);<br></td></tr
><tr
id=sl_svn45_718

><td class="source">						// Agregamos el selector al objeto contenedor<br></td></tr
><tr
id=sl_svn45_719

><td class="source">						_self.append($selector);<br></td></tr
><tr
id=sl_svn45_720

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_721

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_722

><td class="source"><br></td></tr
><tr
id=sl_svn45_723

><td class="source">					function showInfo() {<br></td></tr
><tr
id=sl_svn45_724

><td class="source"><br></td></tr
><tr
id=sl_svn45_725

><td class="source">						var _infoView = null;<br></td></tr
><tr
id=sl_svn45_726

><td class="source">						var alreadyAdded = false;<br></td></tr
><tr
id=sl_svn45_727

><td class="source">						if ($selector.find(&quot;#infoSelector&quot;).length &gt; 0) {<br></td></tr
><tr
id=sl_svn45_728

><td class="source">							_infoView = $selector.find(&quot;#infoSelector&quot;);<br></td></tr
><tr
id=sl_svn45_729

><td class="source">						} else {<br></td></tr
><tr
id=sl_svn45_730

><td class="source">							_infoView = $(&#39;&lt;div /&gt;&#39;)<br></td></tr
><tr
id=sl_svn45_731

><td class="source">									.attr(&#39;id&#39;, &#39;infoSelector&#39;)<br></td></tr
><tr
id=sl_svn45_732

><td class="source">									.css(<br></td></tr
><tr
id=sl_svn45_733

><td class="source">											{<br></td></tr
><tr
id=sl_svn45_734

><td class="source">												&#39;position&#39; : &#39;absolute&#39;,<br></td></tr
><tr
id=sl_svn45_735

><td class="source">												&#39;top&#39; : 0,<br></td></tr
><tr
id=sl_svn45_736

><td class="source">												&#39;left&#39; : 0,<br></td></tr
><tr
id=sl_svn45_737

><td class="source">												&#39;background&#39; : $options.selector.bgInfoLayer,<br></td></tr
><tr
id=sl_svn45_738

><td class="source">												&#39;opacity&#39; : 0.6,<br></td></tr
><tr
id=sl_svn45_739

><td class="source">												&#39;font-size&#39; : $options.selector.infoFontSize<br></td></tr
><tr
id=sl_svn45_740

><td class="source">														+ &#39;px&#39;,<br></td></tr
><tr
id=sl_svn45_741

><td class="source">												&#39;font-family&#39; : &#39;Arial&#39;,<br></td></tr
><tr
id=sl_svn45_742

><td class="source">												&#39;color&#39; : $options.selector.infoFontColor,<br></td></tr
><tr
id=sl_svn45_743

><td class="source">												&#39;width&#39; : &#39;100%&#39;<br></td></tr
><tr
id=sl_svn45_744

><td class="source">											});<br></td></tr
><tr
id=sl_svn45_745

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_746

><td class="source">						if ($options.selector.showPositionsOnDrag) {<br></td></tr
><tr
id=sl_svn45_747

><td class="source">							_infoView.html(&quot;X:&quot; + Math.round(getData(&#39;selector&#39;).x)<br></td></tr
><tr
id=sl_svn45_748

><td class="source">									+ &quot;px - Y:&quot; + Math.round(getData(&#39;selector&#39;).y) + &quot;px&quot;);<br></td></tr
><tr
id=sl_svn45_749

><td class="source">							alreadyAdded = true;<br></td></tr
><tr
id=sl_svn45_750

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_751

><td class="source">						if ($options.selector.showDimetionsOnDrag) {<br></td></tr
><tr
id=sl_svn45_752

><td class="source">							if (alreadyAdded) {<br></td></tr
><tr
id=sl_svn45_753

><td class="source">								_infoView.html(_infoView.html() + &quot; | W:&quot;<br></td></tr
><tr
id=sl_svn45_754

><td class="source">										+ getData(&#39;selector&#39;).w + &quot;px - H:&quot;<br></td></tr
><tr
id=sl_svn45_755

><td class="source">										+ getData(&#39;selector&#39;).h + &quot;px&quot;);<br></td></tr
><tr
id=sl_svn45_756

><td class="source">							} else {<br></td></tr
><tr
id=sl_svn45_757

><td class="source">								_infoView.html(&quot;W:&quot; + getData(&#39;selector&#39;).w<br></td></tr
><tr
id=sl_svn45_758

><td class="source">										+ &quot;px - H:&quot; + getData(&#39;selector&#39;).h<br></td></tr
><tr
id=sl_svn45_759

><td class="source">										+ &quot;px&quot;);<br></td></tr
><tr
id=sl_svn45_760

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_761

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_762

><td class="source">						$selector.append(_infoView);<br></td></tr
><tr
id=sl_svn45_763

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_764

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_765

><td class="source"><br></td></tr
><tr
id=sl_svn45_766

><td class="source">					function createOverlay() {<br></td></tr
><tr
id=sl_svn45_767

><td class="source">						var arr = [ &#39;t&#39;, &#39;b&#39;, &#39;l&#39;, &#39;r&#39; ];<br></td></tr
><tr
id=sl_svn45_768

><td class="source">						$.each(arr, function() {<br></td></tr
><tr
id=sl_svn45_769

><td class="source">							var divO = $(&quot;&lt;div /&gt;&quot;).attr(&quot;id&quot;, this).css({<br></td></tr
><tr
id=sl_svn45_770

><td class="source">								&#39;overflow&#39; : &#39;hidden&#39;,<br></td></tr
><tr
id=sl_svn45_771

><td class="source">								&#39;background&#39; : $options.overlayColor,<br></td></tr
><tr
id=sl_svn45_772

><td class="source">								&#39;opacity&#39; : 0.6,<br></td></tr
><tr
id=sl_svn45_773

><td class="source">								&#39;position&#39; : &#39;absolute&#39;,<br></td></tr
><tr
id=sl_svn45_774

><td class="source">								&#39;z-index&#39; : 2,<br></td></tr
><tr
id=sl_svn45_775

><td class="source">								&#39;visibility&#39; : &#39;visible&#39;<br></td></tr
><tr
id=sl_svn45_776

><td class="source">							});<br></td></tr
><tr
id=sl_svn45_777

><td class="source">							_self.append(divO);<br></td></tr
><tr
id=sl_svn45_778

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_779

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_780

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_781

><td class="source"><br></td></tr
><tr
id=sl_svn45_782

><td class="source">					function makeOverlayPositions(ui) {<br></td></tr
><tr
id=sl_svn45_783

><td class="source"><br></td></tr
><tr
id=sl_svn45_784

><td class="source">						_self.find(&quot;#t&quot;).css({<br></td></tr
><tr
id=sl_svn45_785

><td class="source">							&quot;display&quot; : &quot;block&quot;,<br></td></tr
><tr
id=sl_svn45_786

><td class="source">							&quot;width&quot; : $options.width,<br></td></tr
><tr
id=sl_svn45_787

><td class="source">							&#39;height&#39; : ui.position.top,<br></td></tr
><tr
id=sl_svn45_788

><td class="source">							&#39;left&#39; : 0,<br></td></tr
><tr
id=sl_svn45_789

><td class="source">							&#39;top&#39; : 0<br></td></tr
><tr
id=sl_svn45_790

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_791

><td class="source">						_self.find(&quot;#b&quot;).css(<br></td></tr
><tr
id=sl_svn45_792

><td class="source">								{<br></td></tr
><tr
id=sl_svn45_793

><td class="source">									&quot;display&quot; : &quot;block&quot;,<br></td></tr
><tr
id=sl_svn45_794

><td class="source">									&quot;width&quot; : $options.width,<br></td></tr
><tr
id=sl_svn45_795

><td class="source">									&#39;height&#39; : $options.height,<br></td></tr
><tr
id=sl_svn45_796

><td class="source">									&#39;top&#39; : (ui.position.top + $selector<br></td></tr
><tr
id=sl_svn45_797

><td class="source">											.height())<br></td></tr
><tr
id=sl_svn45_798

><td class="source">											+ &quot;px&quot;,<br></td></tr
><tr
id=sl_svn45_799

><td class="source">									&#39;left&#39; : 0<br></td></tr
><tr
id=sl_svn45_800

><td class="source">								});<br></td></tr
><tr
id=sl_svn45_801

><td class="source">						_self.find(&quot;#l&quot;).css({<br></td></tr
><tr
id=sl_svn45_802

><td class="source">							&quot;display&quot; : &quot;block&quot;,<br></td></tr
><tr
id=sl_svn45_803

><td class="source">							&#39;left&#39; : 0,<br></td></tr
><tr
id=sl_svn45_804

><td class="source">							&#39;top&#39; : ui.position.top,<br></td></tr
><tr
id=sl_svn45_805

><td class="source">							&#39;width&#39; : ui.position.left,<br></td></tr
><tr
id=sl_svn45_806

><td class="source">							&#39;height&#39; : $selector.height()<br></td></tr
><tr
id=sl_svn45_807

><td class="source">						});<br></td></tr
><tr
id=sl_svn45_808

><td class="source">						_self.find(&quot;#r&quot;).css(<br></td></tr
><tr
id=sl_svn45_809

><td class="source">								{<br></td></tr
><tr
id=sl_svn45_810

><td class="source">									&quot;display&quot; : &quot;block&quot;,<br></td></tr
><tr
id=sl_svn45_811

><td class="source">									&#39;top&#39; : ui.position.top,<br></td></tr
><tr
id=sl_svn45_812

><td class="source">									&#39;left&#39; : (ui.position.left + $selector<br></td></tr
><tr
id=sl_svn45_813

><td class="source">											.width())<br></td></tr
><tr
id=sl_svn45_814

><td class="source">											+ &quot;px&quot;,<br></td></tr
><tr
id=sl_svn45_815

><td class="source">									&#39;width&#39; : $options.width,<br></td></tr
><tr
id=sl_svn45_816

><td class="source">									&#39;height&#39; : $selector.height() + &quot;px&quot;<br></td></tr
><tr
id=sl_svn45_817

><td class="source">								});<br></td></tr
><tr
id=sl_svn45_818

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_819

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_820

><td class="source"><br></td></tr
><tr
id=sl_svn45_821

><td class="source">					function hideOverlay() {<br></td></tr
><tr
id=sl_svn45_822

><td class="source">						_self.find(&quot;#t&quot;).hide();<br></td></tr
><tr
id=sl_svn45_823

><td class="source">						_self.find(&quot;#b&quot;).hide();<br></td></tr
><tr
id=sl_svn45_824

><td class="source">						_self.find(&quot;#l&quot;).hide();<br></td></tr
><tr
id=sl_svn45_825

><td class="source">						_self.find(&quot;#r&quot;).hide();<br></td></tr
><tr
id=sl_svn45_826

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_827

><td class="source"><br></td></tr
><tr
id=sl_svn45_828

><td class="source">					function setData(key, data) {<br></td></tr
><tr
id=sl_svn45_829

><td class="source">						_self.data(key, data);<br></td></tr
><tr
id=sl_svn45_830

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_831

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_832

><td class="source"><br></td></tr
><tr
id=sl_svn45_833

><td class="source">					function getData(key) {<br></td></tr
><tr
id=sl_svn45_834

><td class="source">						return _self.data(key);<br></td></tr
><tr
id=sl_svn45_835

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_836

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_837

><td class="source"><br></td></tr
><tr
id=sl_svn45_838

><td class="source">					function createMovementControls() {<br></td></tr
><tr
id=sl_svn45_839

><td class="source">						var table = $(&#39;&lt;table&gt;\<br></td></tr
><tr
id=sl_svn45_840

><td class="source">                &lt;tr&gt;\<br></td></tr
><tr
id=sl_svn45_841

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_842

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_843

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_844

><td class="source">                &lt;/tr&gt;\<br></td></tr
><tr
id=sl_svn45_845

><td class="source">                &lt;tr&gt;\<br></td></tr
><tr
id=sl_svn45_846

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_847

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_848

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_849

><td class="source">                &lt;/tr&gt;\<br></td></tr
><tr
id=sl_svn45_850

><td class="source">                &lt;tr&gt;\<br></td></tr
><tr
id=sl_svn45_851

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_852

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_853

><td class="source">                &lt;td&gt;&lt;/td&gt;\<br></td></tr
><tr
id=sl_svn45_854

><td class="source">                &lt;/tr&gt;\<br></td></tr
><tr
id=sl_svn45_855

><td class="source">                &lt;/table&gt;&#39;);<br></td></tr
><tr
id=sl_svn45_856

><td class="source">						var btns = [];<br></td></tr
><tr
id=sl_svn45_857

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_no mvn&#39;));<br></td></tr
><tr
id=sl_svn45_858

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_n mvn&#39;));<br></td></tr
><tr
id=sl_svn45_859

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_ne mvn&#39;));<br></td></tr
><tr
id=sl_svn45_860

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_o mvn&#39;));<br></td></tr
><tr
id=sl_svn45_861

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_c&#39;));<br></td></tr
><tr
id=sl_svn45_862

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_e mvn&#39;));<br></td></tr
><tr
id=sl_svn45_863

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_so mvn&#39;));<br></td></tr
><tr
id=sl_svn45_864

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_s mvn&#39;));<br></td></tr
><tr
id=sl_svn45_865

><td class="source">						btns.push($(&#39;&lt;div /&gt;&#39;).addClass(&#39;mvn_se mvn&#39;));<br></td></tr
><tr
id=sl_svn45_866

><td class="source">						for ( var i = 0; i &lt; btns.length; i++) {<br></td></tr
><tr
id=sl_svn45_867

><td class="source">							btns[i].mousedown(function() {<br></td></tr
><tr
id=sl_svn45_868

><td class="source">								moveImage(this);<br></td></tr
><tr
id=sl_svn45_869

><td class="source">							}).mouseup(function() {<br></td></tr
><tr
id=sl_svn45_870

><td class="source">								clearTimeout(tMovement);<br></td></tr
><tr
id=sl_svn45_871

><td class="source">							}).mouseout(function(){<br></td></tr
><tr
id=sl_svn45_872

><td class="source">								clearTimeout(tMovement);<br></td></tr
><tr
id=sl_svn45_873

><td class="source">							});<br></td></tr
><tr
id=sl_svn45_874

><td class="source">							table.find(&#39;td:eq(&#39; + i + &#39;)&#39;).append(btns[i]);<br></td></tr
><tr
id=sl_svn45_875

><td class="source">							$($options.expose.elementMovement).append(table);<br></td></tr
><tr
id=sl_svn45_876

><td class="source"><br></td></tr
><tr
id=sl_svn45_877

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_878

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_879

><td class="source">					;<br></td></tr
><tr
id=sl_svn45_880

><td class="source"><br></td></tr
><tr
id=sl_svn45_881

><td class="source">					function moveImage(obj) {<br></td></tr
><tr
id=sl_svn45_882

><td class="source"><br></td></tr
><tr
id=sl_svn45_883

><td class="source">						if ($(obj).hasClass(&#39;mvn_no&#39;)) {<br></td></tr
><tr
id=sl_svn45_884

><td class="source">							getData(&#39;image&#39;).posX = (getData(&#39;image&#39;).posX - $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_885

><td class="source">							getData(&#39;image&#39;).posY = (getData(&#39;image&#39;).posY - $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_886

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_n&#39;)) {<br></td></tr
><tr
id=sl_svn45_887

><td class="source">							getData(&#39;image&#39;).posY = (getData(&#39;image&#39;).posY - $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_888

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_ne&#39;)) {<br></td></tr
><tr
id=sl_svn45_889

><td class="source">							getData(&#39;image&#39;).posX = (getData(&#39;image&#39;).posX + $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_890

><td class="source">							getData(&#39;image&#39;).posY = (getData(&#39;image&#39;).posY - $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_891

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_o&#39;)) {<br></td></tr
><tr
id=sl_svn45_892

><td class="source">							getData(&#39;image&#39;).posX = (getData(&#39;image&#39;).posX - $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_893

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_c&#39;)) {<br></td></tr
><tr
id=sl_svn45_894

><td class="source">							getData(&#39;image&#39;).posX = ($options.width / 2)<br></td></tr
><tr
id=sl_svn45_895

><td class="source">									- (getData(&#39;image&#39;).w / 2);<br></td></tr
><tr
id=sl_svn45_896

><td class="source">							getData(&#39;image&#39;).posY = ($options.height / 2)<br></td></tr
><tr
id=sl_svn45_897

><td class="source">									- (getData(&#39;image&#39;).h / 2);<br></td></tr
><tr
id=sl_svn45_898

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_e&#39;)) {<br></td></tr
><tr
id=sl_svn45_899

><td class="source">							getData(&#39;image&#39;).posX = (getData(&#39;image&#39;).posX + $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_900

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_so&#39;)) {<br></td></tr
><tr
id=sl_svn45_901

><td class="source">							getData(&#39;image&#39;).posX = (getData(&#39;image&#39;).posX - $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_902

><td class="source">							getData(&#39;image&#39;).posY = (getData(&#39;image&#39;).posY + $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_903

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_s&#39;)) {<br></td></tr
><tr
id=sl_svn45_904

><td class="source">							getData(&#39;image&#39;).posY = (getData(&#39;image&#39;).posY + $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_905

><td class="source">						} else if ($(obj).hasClass(&#39;mvn_se&#39;)) {<br></td></tr
><tr
id=sl_svn45_906

><td class="source">							getData(&#39;image&#39;).posX = (getData(&#39;image&#39;).posX + $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_907

><td class="source">							getData(&#39;image&#39;).posY = (getData(&#39;image&#39;).posY + $options.expose.movementSteps);<br></td></tr
><tr
id=sl_svn45_908

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_909

><td class="source">						if ($options.image.snapToContainer) {<br></td></tr
><tr
id=sl_svn45_910

><td class="source">							if (getData(&#39;image&#39;).posY &gt; 0) {<br></td></tr
><tr
id=sl_svn45_911

><td class="source">								getData(&#39;image&#39;).posY = 0;<br></td></tr
><tr
id=sl_svn45_912

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_913

><td class="source">							if (getData(&#39;image&#39;).posX &gt; 0) {<br></td></tr
><tr
id=sl_svn45_914

><td class="source">								getData(&#39;image&#39;).posX = 0;<br></td></tr
><tr
id=sl_svn45_915

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_916

><td class="source"><br></td></tr
><tr
id=sl_svn45_917

><td class="source">							var bottom = -(getData(&#39;image&#39;).h - _self.height());<br></td></tr
><tr
id=sl_svn45_918

><td class="source">							var right = -(getData(&#39;image&#39;).w - _self.width());<br></td></tr
><tr
id=sl_svn45_919

><td class="source">							if (getData(&#39;image&#39;).posY &lt; bottom) {<br></td></tr
><tr
id=sl_svn45_920

><td class="source">								getData(&#39;image&#39;).posY = bottom;<br></td></tr
><tr
id=sl_svn45_921

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_922

><td class="source">							if (getData(&#39;image&#39;).posX &lt; right) {<br></td></tr
><tr
id=sl_svn45_923

><td class="source">								getData(&#39;image&#39;).posX = right;<br></td></tr
><tr
id=sl_svn45_924

><td class="source">							}<br></td></tr
><tr
id=sl_svn45_925

><td class="source">						}<br></td></tr
><tr
id=sl_svn45_926

><td class="source">						calculateTranslationAndRotation();<br></td></tr
><tr
id=sl_svn45_927

><td class="source">						tMovement = setTimeout(function() {<br></td></tr
><tr
id=sl_svn45_928

><td class="source">							moveImage(obj);<br></td></tr
><tr
id=sl_svn45_929

><td class="source">						}, 100);<br></td></tr
><tr
id=sl_svn45_930

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_931

><td class="source"><br></td></tr
><tr
id=sl_svn45_932

><td class="source">					$.fn.cropzoom.getParameters = function(_self, custom) {<br></td></tr
><tr
id=sl_svn45_933

><td class="source">						var image = _self.data(&#39;image&#39;);<br></td></tr
><tr
id=sl_svn45_934

><td class="source">						var selector = _self.data(&#39;selector&#39;);<br></td></tr
><tr
id=sl_svn45_935

><td class="source">						var fixed_data = {<br></td></tr
><tr
id=sl_svn45_936

><td class="source">							&#39;viewPortW&#39; : _self.width(),<br></td></tr
><tr
id=sl_svn45_937

><td class="source">							&#39;viewPortH&#39; : _self.height(),<br></td></tr
><tr
id=sl_svn45_938

><td class="source">							&#39;imageX&#39; : image.posX,<br></td></tr
><tr
id=sl_svn45_939

><td class="source">							&#39;imageY&#39; : image.posY,<br></td></tr
><tr
id=sl_svn45_940

><td class="source">							&#39;imageRotate&#39; : image.rotation,<br></td></tr
><tr
id=sl_svn45_941

><td class="source">							&#39;imageW&#39; : image.w,<br></td></tr
><tr
id=sl_svn45_942

><td class="source">							&#39;imageH&#39; : image.h,<br></td></tr
><tr
id=sl_svn45_943

><td class="source">							&#39;imageSource&#39; : image.source,<br></td></tr
><tr
id=sl_svn45_944

><td class="source">							&#39;selectorX&#39; : selector.x,<br></td></tr
><tr
id=sl_svn45_945

><td class="source">							&#39;selectorY&#39; : selector.y,<br></td></tr
><tr
id=sl_svn45_946

><td class="source">							&#39;selectorW&#39; : selector.w,<br></td></tr
><tr
id=sl_svn45_947

><td class="source">							&#39;selectorH&#39; : selector.h<br></td></tr
><tr
id=sl_svn45_948

><td class="source">						};<br></td></tr
><tr
id=sl_svn45_949

><td class="source">						return $.extend(fixed_data, custom);<br></td></tr
><tr
id=sl_svn45_950

><td class="source">					};<br></td></tr
><tr
id=sl_svn45_951

><td class="source"><br></td></tr
><tr
id=sl_svn45_952

><td class="source">					$.fn.cropzoom.getSelf = function() {<br></td></tr
><tr
id=sl_svn45_953

><td class="source">						return _self;<br></td></tr
><tr
id=sl_svn45_954

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_955

><td class="source">					/*$.fn.cropzoom.getOptions = function() {<br></td></tr
><tr
id=sl_svn45_956

><td class="source">						return _self.getData(&#39;options&#39;);<br></td></tr
><tr
id=sl_svn45_957

><td class="source">					}*/<br></td></tr
><tr
id=sl_svn45_958

><td class="source"><br></td></tr
><tr
id=sl_svn45_959

><td class="source">					// Maintein Chaining<br></td></tr
><tr
id=sl_svn45_960

><td class="source">					return this;<br></td></tr
><tr
id=sl_svn45_961

><td class="source">				});<br></td></tr
><tr
id=sl_svn45_962

><td class="source"><br></td></tr
><tr
id=sl_svn45_963

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_964

><td class="source"><br></td></tr
><tr
id=sl_svn45_965

><td class="source">	/* Code taken from jquery.svgdom.js */<br></td></tr
><tr
id=sl_svn45_966

><td class="source">	/* Support adding class names to SVG nodes. */<br></td></tr
><tr
id=sl_svn45_967

><td class="source">	var origAddClass = $.fn.addClass;<br></td></tr
><tr
id=sl_svn45_968

><td class="source"><br></td></tr
><tr
id=sl_svn45_969

><td class="source">	$.fn.addClass = function(classNames) {<br></td></tr
><tr
id=sl_svn45_970

><td class="source">		classNames = classNames || &#39;&#39;;<br></td></tr
><tr
id=sl_svn45_971

><td class="source">		return this.each(function() {<br></td></tr
><tr
id=sl_svn45_972

><td class="source">			if (isSVGElem(this)) {<br></td></tr
><tr
id=sl_svn45_973

><td class="source">				var node = this;<br></td></tr
><tr
id=sl_svn45_974

><td class="source">				$.each(classNames.split(/\s+/), function(i, className) {<br></td></tr
><tr
id=sl_svn45_975

><td class="source">					var classes = (node.className ? node.className.baseVal<br></td></tr
><tr
id=sl_svn45_976

><td class="source">							: node.getAttribute(&#39;class&#39;));<br></td></tr
><tr
id=sl_svn45_977

><td class="source">					if ($.inArray(className, classes.split(/\s+/)) == -1) {<br></td></tr
><tr
id=sl_svn45_978

><td class="source">						classes += (classes ? &#39; &#39; : &#39;&#39;) + className;<br></td></tr
><tr
id=sl_svn45_979

><td class="source">						(node.className ? node.className.baseVal = classes<br></td></tr
><tr
id=sl_svn45_980

><td class="source">								: node.setAttribute(&#39;class&#39;, classes));<br></td></tr
><tr
id=sl_svn45_981

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_982

><td class="source">				});<br></td></tr
><tr
id=sl_svn45_983

><td class="source">			} else {<br></td></tr
><tr
id=sl_svn45_984

><td class="source">				origAddClass.apply($(this), [ classNames ]);<br></td></tr
><tr
id=sl_svn45_985

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_986

><td class="source">		});<br></td></tr
><tr
id=sl_svn45_987

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_988

><td class="source"><br></td></tr
><tr
id=sl_svn45_989

><td class="source">	/* Support removing class names from SVG nodes. */<br></td></tr
><tr
id=sl_svn45_990

><td class="source">	var origRemoveClass = $.fn.removeClass;<br></td></tr
><tr
id=sl_svn45_991

><td class="source"><br></td></tr
><tr
id=sl_svn45_992

><td class="source">	$.fn.removeClass = function(classNames) {<br></td></tr
><tr
id=sl_svn45_993

><td class="source">		classNames = classNames || &#39;&#39;;<br></td></tr
><tr
id=sl_svn45_994

><td class="source">		return this.each(function() {<br></td></tr
><tr
id=sl_svn45_995

><td class="source">			if (isSVGElem(this)) {<br></td></tr
><tr
id=sl_svn45_996

><td class="source">				var node = this;<br></td></tr
><tr
id=sl_svn45_997

><td class="source">				$.each(classNames.split(/\s+/), function(i, className) {<br></td></tr
><tr
id=sl_svn45_998

><td class="source">					var classes = (node.className ? node.className.baseVal<br></td></tr
><tr
id=sl_svn45_999

><td class="source">							: node.getAttribute(&#39;class&#39;));<br></td></tr
><tr
id=sl_svn45_1000

><td class="source">					classes = $.grep(classes.split(/\s+/), function(n, i) {<br></td></tr
><tr
id=sl_svn45_1001

><td class="source">						return n != className;<br></td></tr
><tr
id=sl_svn45_1002

><td class="source">					}).join(&#39; &#39;);<br></td></tr
><tr
id=sl_svn45_1003

><td class="source">					(node.className ? node.className.baseVal = classes : node<br></td></tr
><tr
id=sl_svn45_1004

><td class="source">							.setAttribute(&#39;class&#39;, classes));<br></td></tr
><tr
id=sl_svn45_1005

><td class="source">				});<br></td></tr
><tr
id=sl_svn45_1006

><td class="source">			} else {<br></td></tr
><tr
id=sl_svn45_1007

><td class="source">				origRemoveClass.apply($(this), [ classNames ]);<br></td></tr
><tr
id=sl_svn45_1008

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1009

><td class="source">		});<br></td></tr
><tr
id=sl_svn45_1010

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_1011

><td class="source"><br></td></tr
><tr
id=sl_svn45_1012

><td class="source">	/* Support toggling class names on SVG nodes. */<br></td></tr
><tr
id=sl_svn45_1013

><td class="source">	var origToggleClass = $.fn.toggleClass;<br></td></tr
><tr
id=sl_svn45_1014

><td class="source"><br></td></tr
><tr
id=sl_svn45_1015

><td class="source">	$.fn.toggleClass = function(className, state) {<br></td></tr
><tr
id=sl_svn45_1016

><td class="source">		return this.each(function() {<br></td></tr
><tr
id=sl_svn45_1017

><td class="source">			if (isSVGElem(this)) {<br></td></tr
><tr
id=sl_svn45_1018

><td class="source">				if (typeof state !== &#39;boolean&#39;) {<br></td></tr
><tr
id=sl_svn45_1019

><td class="source">					state = !$(this).hasClass(className);<br></td></tr
><tr
id=sl_svn45_1020

><td class="source">				}<br></td></tr
><tr
id=sl_svn45_1021

><td class="source">				$(this)[(state ? &#39;add&#39; : &#39;remove&#39;) + &#39;Class&#39;](className);<br></td></tr
><tr
id=sl_svn45_1022

><td class="source">			} else {<br></td></tr
><tr
id=sl_svn45_1023

><td class="source">				origToggleClass.apply($(this), [ className, state ]);<br></td></tr
><tr
id=sl_svn45_1024

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1025

><td class="source">		});<br></td></tr
><tr
id=sl_svn45_1026

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_1027

><td class="source"><br></td></tr
><tr
id=sl_svn45_1028

><td class="source">	/* Support checking class names on SVG nodes. */<br></td></tr
><tr
id=sl_svn45_1029

><td class="source">	var origHasClass = $.fn.hasClass;<br></td></tr
><tr
id=sl_svn45_1030

><td class="source"><br></td></tr
><tr
id=sl_svn45_1031

><td class="source">	$.fn.hasClass = function(className) {<br></td></tr
><tr
id=sl_svn45_1032

><td class="source">		className = className || &#39;&#39;;<br></td></tr
><tr
id=sl_svn45_1033

><td class="source">		var found = false;<br></td></tr
><tr
id=sl_svn45_1034

><td class="source">		this.each(function() {<br></td></tr
><tr
id=sl_svn45_1035

><td class="source">			if (isSVGElem(this)) {<br></td></tr
><tr
id=sl_svn45_1036

><td class="source">				var classes = (this.className ? this.className.baseVal : this<br></td></tr
><tr
id=sl_svn45_1037

><td class="source">						.getAttribute(&#39;class&#39;)).split(/\s+/);<br></td></tr
><tr
id=sl_svn45_1038

><td class="source">				found = ($.inArray(className, classes) &gt; -1);<br></td></tr
><tr
id=sl_svn45_1039

><td class="source">			} else {<br></td></tr
><tr
id=sl_svn45_1040

><td class="source">				found = (origHasClass.apply($(this), [ className ]));<br></td></tr
><tr
id=sl_svn45_1041

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1042

><td class="source">			return !found;<br></td></tr
><tr
id=sl_svn45_1043

><td class="source">		});<br></td></tr
><tr
id=sl_svn45_1044

><td class="source">		return found;<br></td></tr
><tr
id=sl_svn45_1045

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_1046

><td class="source"><br></td></tr
><tr
id=sl_svn45_1047

><td class="source">	/* Support attributes on SVG nodes. */<br></td></tr
><tr
id=sl_svn45_1048

><td class="source">	var origAttr = $.fn.attr;<br></td></tr
><tr
id=sl_svn45_1049

><td class="source"><br></td></tr
><tr
id=sl_svn45_1050

><td class="source">	$.fn.attr = function(name, value, type) {<br></td></tr
><tr
id=sl_svn45_1051

><td class="source">		if (typeof name === &#39;string&#39; &amp;&amp; value === undefined) {<br></td></tr
><tr
id=sl_svn45_1052

><td class="source">			var val = origAttr.apply(this, [ name, value, type ]);<br></td></tr
><tr
id=sl_svn45_1053

><td class="source">			return (val &amp;&amp; val.baseVal ? val.baseVal.valueAsString : val);<br></td></tr
><tr
id=sl_svn45_1054

><td class="source">		}<br></td></tr
><tr
id=sl_svn45_1055

><td class="source">		var options = name;<br></td></tr
><tr
id=sl_svn45_1056

><td class="source">		if (typeof name === &#39;string&#39;) {<br></td></tr
><tr
id=sl_svn45_1057

><td class="source">			options = {};<br></td></tr
><tr
id=sl_svn45_1058

><td class="source">			options[name] = value;<br></td></tr
><tr
id=sl_svn45_1059

><td class="source">		}<br></td></tr
><tr
id=sl_svn45_1060

><td class="source">		return this.each(function() {<br></td></tr
><tr
id=sl_svn45_1061

><td class="source">			if (isSVGElem(this)) {<br></td></tr
><tr
id=sl_svn45_1062

><td class="source">				for ( var n in options) {<br></td></tr
><tr
id=sl_svn45_1063

><td class="source">					this.setAttribute(n,<br></td></tr
><tr
id=sl_svn45_1064

><td class="source">							(typeof options[n] == &#39;function&#39; ? options[n]()<br></td></tr
><tr
id=sl_svn45_1065

><td class="source">									: options[n]));<br></td></tr
><tr
id=sl_svn45_1066

><td class="source">				}<br></td></tr
><tr
id=sl_svn45_1067

><td class="source">			} else {<br></td></tr
><tr
id=sl_svn45_1068

><td class="source">				origAttr.apply($(this), [ name, value, type ]);<br></td></tr
><tr
id=sl_svn45_1069

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1070

><td class="source">		});<br></td></tr
><tr
id=sl_svn45_1071

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_1072

><td class="source"><br></td></tr
><tr
id=sl_svn45_1073

><td class="source">	/* Support removing attributes on SVG nodes. */<br></td></tr
><tr
id=sl_svn45_1074

><td class="source">	var origRemoveAttr = $.fn.removeAttr;<br></td></tr
><tr
id=sl_svn45_1075

><td class="source"><br></td></tr
><tr
id=sl_svn45_1076

><td class="source">	$.fn.removeAttr = function(name) {<br></td></tr
><tr
id=sl_svn45_1077

><td class="source">		return this<br></td></tr
><tr
id=sl_svn45_1078

><td class="source">				.each(function() {<br></td></tr
><tr
id=sl_svn45_1079

><td class="source">					if (isSVGElem(this)) {<br></td></tr
><tr
id=sl_svn45_1080

><td class="source">						(this[name] &amp;&amp; this[name].baseVal ? this[name].baseVal.value = &#39;&#39;<br></td></tr
><tr
id=sl_svn45_1081

><td class="source">								: this.setAttribute(name, &#39;&#39;));<br></td></tr
><tr
id=sl_svn45_1082

><td class="source">					} else {<br></td></tr
><tr
id=sl_svn45_1083

><td class="source">						origRemoveAttr.apply($(this), [ name ]);<br></td></tr
><tr
id=sl_svn45_1084

><td class="source">					}<br></td></tr
><tr
id=sl_svn45_1085

><td class="source">				});<br></td></tr
><tr
id=sl_svn45_1086

><td class="source">	};<br></td></tr
><tr
id=sl_svn45_1087

><td class="source"><br></td></tr
><tr
id=sl_svn45_1088

><td class="source">	function isSVGElem(node) {<br></td></tr
><tr
id=sl_svn45_1089

><td class="source">		return (node.nodeType == 1 &amp;&amp; node.namespaceURI == &#39;http://www.w3.org/2000/svg&#39;);<br></td></tr
><tr
id=sl_svn45_1090

><td class="source">	}<br></td></tr
><tr
id=sl_svn45_1091

><td class="source">	;<br></td></tr
><tr
id=sl_svn45_1092

><td class="source"><br></td></tr
><tr
id=sl_svn45_1093

><td class="source">	// Css Hooks<br></td></tr
><tr
id=sl_svn45_1094

><td class="source">	/*<br></td></tr
><tr
id=sl_svn45_1095

><td class="source">	 * jQuery.cssHooks[&quot;MsTransform&quot;] = { set: function( elem, value ) {<br></td></tr
><tr
id=sl_svn45_1096

><td class="source">	 * elem.style.msTransform = value; } };<br></td></tr
><tr
id=sl_svn45_1097

><td class="source">	 */<br></td></tr
><tr
id=sl_svn45_1098

><td class="source"><br></td></tr
><tr
id=sl_svn45_1099

><td class="source">	$.fn.extend({<br></td></tr
><tr
id=sl_svn45_1100

><td class="source">		// Function to set the selector position and sizes<br></td></tr
><tr
id=sl_svn45_1101

><td class="source">		setSelector : function(x, y, w, h, animate) {<br></td></tr
><tr
id=sl_svn45_1102

><td class="source">			<br></td></tr
><tr
id=sl_svn45_1103

><td class="source">			var _self = $(this);<br></td></tr
><tr
id=sl_svn45_1104

><td class="source">			if (animate != undefined &amp;&amp; animate == true) {<br></td></tr
><tr
id=sl_svn45_1105

><td class="source">				_self.find(&#39;#&#39; + _self[0].id + &#39;_selector&#39;).animate({<br></td></tr
><tr
id=sl_svn45_1106

><td class="source">					&#39;top&#39; : y,<br></td></tr
><tr
id=sl_svn45_1107

><td class="source">					&#39;left&#39; : x,<br></td></tr
><tr
id=sl_svn45_1108

><td class="source">					&#39;width&#39; : w,<br></td></tr
><tr
id=sl_svn45_1109

><td class="source">					&#39;height&#39; : h<br></td></tr
><tr
id=sl_svn45_1110

><td class="source">				}, &#39;slow&#39;);<br></td></tr
><tr
id=sl_svn45_1111

><td class="source">			} else {<br></td></tr
><tr
id=sl_svn45_1112

><td class="source">				_self.find(&#39;#&#39; + _self[0].id + &#39;_selector&#39;).css({<br></td></tr
><tr
id=sl_svn45_1113

><td class="source">					&#39;top&#39; : y,<br></td></tr
><tr
id=sl_svn45_1114

><td class="source">					&#39;left&#39; : x,<br></td></tr
><tr
id=sl_svn45_1115

><td class="source">					&#39;width&#39; : w,<br></td></tr
><tr
id=sl_svn45_1116

><td class="source">					&#39;height&#39; : h<br></td></tr
><tr
id=sl_svn45_1117

><td class="source">				});<br></td></tr
><tr
id=sl_svn45_1118

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1119

><td class="source">			<br></td></tr
><tr
id=sl_svn45_1120

><td class="source">			_self.data(&#39;selector&#39;, {<br></td></tr
><tr
id=sl_svn45_1121

><td class="source">				x : x,<br></td></tr
><tr
id=sl_svn45_1122

><td class="source">				y : y,<br></td></tr
><tr
id=sl_svn45_1123

><td class="source">				w : w,<br></td></tr
><tr
id=sl_svn45_1124

><td class="source">				h : h<br></td></tr
><tr
id=sl_svn45_1125

><td class="source">			});<br></td></tr
><tr
id=sl_svn45_1126

><td class="source">			console.log(getData(&#39;selector&#39;));<br></td></tr
><tr
id=sl_svn45_1127

><td class="source">			_self.showInfo(_self.find(&#39;#&#39; + _self[0].id + &#39;_selector&#39;));<br></td></tr
><tr
id=sl_svn45_1128

><td class="source">		},<br></td></tr
><tr
id=sl_svn45_1129

><td class="source">		// Restore the Plugin<br></td></tr
><tr
id=sl_svn45_1130

><td class="source">		restore : function() {<br></td></tr
><tr
id=sl_svn45_1131

><td class="source">			var obj = $(this);<br></td></tr
><tr
id=sl_svn45_1132

><td class="source">			var $options = obj.data(&#39;options&#39;);<br></td></tr
><tr
id=sl_svn45_1133

><td class="source">			obj.empty();<br></td></tr
><tr
id=sl_svn45_1134

><td class="source">			obj.data(&#39;image&#39;, {});<br></td></tr
><tr
id=sl_svn45_1135

><td class="source">			obj.data(&#39;selector&#39;, {});<br></td></tr
><tr
id=sl_svn45_1136

><td class="source">			if ($options.expose.zoomElement != &quot;&quot;) {<br></td></tr
><tr
id=sl_svn45_1137

><td class="source">				$($options.expose.zoomElement).empty();<br></td></tr
><tr
id=sl_svn45_1138

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1139

><td class="source">			if ($options.expose.rotationElement != &quot;&quot;) {<br></td></tr
><tr
id=sl_svn45_1140

><td class="source">				$($options.expose.rotationElement).empty();<br></td></tr
><tr
id=sl_svn45_1141

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1142

><td class="source">			if ($options.expose.elementMovement != &quot;&quot;) {<br></td></tr
><tr
id=sl_svn45_1143

><td class="source">				$($options.expose.elementMovement).empty();<br></td></tr
><tr
id=sl_svn45_1144

><td class="source">			}<br></td></tr
><tr
id=sl_svn45_1145

><td class="source">			obj.cropzoom($options);<br></td></tr
><tr
id=sl_svn45_1146

><td class="source"><br></td></tr
><tr
id=sl_svn45_1147

><td class="source">		},<br></td></tr
><tr
id=sl_svn45_1148

><td class="source">		// Send the Data to the Server<br></td></tr
><tr
id=sl_svn45_1149

><td class="source">		send : function(url, type, custom, onSuccess) {<br></td></tr
><tr
id=sl_svn45_1150

><td class="source">			var _self = $(this);<br></td></tr
><tr
id=sl_svn45_1151

><td class="source">			var response = &quot;&quot;;<br></td></tr
><tr
id=sl_svn45_1152

><td class="source">			$.ajax({<br></td></tr
><tr
id=sl_svn45_1153

><td class="source">				url : url,<br></td></tr
><tr
id=sl_svn45_1154

><td class="source">				type : type,<br></td></tr
><tr
id=sl_svn45_1155

><td class="source">				data : (_self.cropzoom.getParameters(_self, custom)),<br></td></tr
><tr
id=sl_svn45_1156

><td class="source">				success : function(r) {<br></td></tr
><tr
id=sl_svn45_1157

><td class="source">					_self.data(&#39;imageResult&#39;, r);<br></td></tr
><tr
id=sl_svn45_1158

><td class="source">					if (onSuccess !== undefined &amp;&amp; onSuccess != null)<br></td></tr
><tr
id=sl_svn45_1159

><td class="source">						onSuccess(r);<br></td></tr
><tr
id=sl_svn45_1160

><td class="source">				}<br></td></tr
><tr
id=sl_svn45_1161

><td class="source">			});<br></td></tr
><tr
id=sl_svn45_1162

><td class="source">		}<br></td></tr
><tr
id=sl_svn45_1163

><td class="source">	});<br></td></tr
><tr
id=sl_svn45_1164

><td class="source"><br></td></tr
><tr
id=sl_svn45_1165

><td class="source">})(jQuery);<br></td></tr
></table></pre>
<pre><table width="100%"><tr class="cursor_stop cursor_hidden"><td></td></tr></table></pre>
</td>
</tr></table>

 
<script type="text/javascript">
 var lineNumUnderMouse = -1;
 
 function gutterOver(num) {
 gutterOut();
 var newTR = document.getElementById('gr_svn45_' + num);
 if (newTR) {
 newTR.className = 'undermouse';
 }
 lineNumUnderMouse = num;
 }
 function gutterOut() {
 if (lineNumUnderMouse != -1) {
 var oldTR = document.getElementById(
 'gr_svn45_' + lineNumUnderMouse);
 if (oldTR) {
 oldTR.className = '';
 }
 lineNumUnderMouse = -1;
 }
 }
 var numsGenState = {table_base_id: 'nums_table_'};
 var srcGenState = {table_base_id: 'src_table_'};
 var alignerRunning = false;
 var startOver = false;
 function setLineNumberHeights() {
 if (alignerRunning) {
 startOver = true;
 return;
 }
 numsGenState.chunk_id = 0;
 numsGenState.table = document.getElementById('nums_table_0');
 numsGenState.row_num = 0;
 if (!numsGenState.table) {
 return; // Silently exit if no file is present.
 }
 srcGenState.chunk_id = 0;
 srcGenState.table = document.getElementById('src_table_0');
 srcGenState.row_num = 0;
 alignerRunning = true;
 continueToSetLineNumberHeights();
 }
 function rowGenerator(genState) {
 if (genState.row_num < genState.table.rows.length) {
 var currentRow = genState.table.rows[genState.row_num];
 genState.row_num++;
 return currentRow;
 }
 var newTable = document.getElementById(
 genState.table_base_id + (genState.chunk_id + 1));
 if (newTable) {
 genState.chunk_id++;
 genState.row_num = 0;
 genState.table = newTable;
 return genState.table.rows[0];
 }
 return null;
 }
 var MAX_ROWS_PER_PASS = 1000;
 function continueToSetLineNumberHeights() {
 var rowsInThisPass = 0;
 var numRow = 1;
 var srcRow = 1;
 while (numRow && srcRow && rowsInThisPass < MAX_ROWS_PER_PASS) {
 numRow = rowGenerator(numsGenState);
 srcRow = rowGenerator(srcGenState);
 rowsInThisPass++;
 if (numRow && srcRow) {
 if (numRow.offsetHeight != srcRow.offsetHeight) {
 numRow.firstChild.style.height = srcRow.offsetHeight + 'px';
 }
 }
 }
 if (rowsInThisPass >= MAX_ROWS_PER_PASS) {
 setTimeout(continueToSetLineNumberHeights, 10);
 } else {
 alignerRunning = false;
 if (startOver) {
 startOver = false;
 setTimeout(setLineNumberHeights, 500);
 }
 }
 }
 function initLineNumberHeights() {
 // Do 2 complete passes, because there can be races
 // between this code and prettify.
 startOver = true;
 setTimeout(setLineNumberHeights, 250);
 window.onresize = setLineNumberHeights;
 }
 initLineNumberHeights();
</script>

 
 
 <div id="log">
 <div style="text-align:right">
 <a class="ifCollapse" href="#" onclick="_toggleMeta(this); return false">Show details</a>
 <a class="ifExpand" href="#" onclick="_toggleMeta(this); return false">Hide details</a>
 </div>
 <div class="ifExpand">
 
 
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="changelog">
 <p>Change log</p>
 <div>
 <a href="/p/cropzoom/source/detail?spec=svn45&amp;r=43">r43</a>
 by GastonRobledo
 on Oct 6, 2011
 &nbsp; <a href="/p/cropzoom/source/diff?spec=svn45&r=43&amp;format=side&amp;path=/trunk/plugin/jquery.cropzoom.js&amp;old_path=/trunk/plugin/jquery.cropzoom.js&amp;old=42">Diff</a>
 </div>
 <pre>Unhide selector</pre>
 </div>
 
 
 
 
 
 
 <script type="text/javascript">
 var detail_url = '/p/cropzoom/source/detail?r=43&spec=svn45';
 var publish_url = '/p/cropzoom/source/detail?r=43&spec=svn45#publish';
 // describe the paths of this revision in javascript.
 var changed_paths = [];
 var changed_urls = [];
 
 changed_paths.push('/trunk/plugin/jquery.cropzoom.js');
 changed_urls.push('/p/cropzoom/source/browse/trunk/plugin/jquery.cropzoom.js?r\x3d43\x26spec\x3dsvn45');
 
 var selected_path = '/trunk/plugin/jquery.cropzoom.js';
 
 
 function getCurrentPageIndex() {
 for (var i = 0; i < changed_paths.length; i++) {
 if (selected_path == changed_paths[i]) {
 return i;
 }
 }
 }
 function getNextPage() {
 var i = getCurrentPageIndex();
 if (i < changed_paths.length - 1) {
 return changed_urls[i + 1];
 }
 return null;
 }
 function getPreviousPage() {
 var i = getCurrentPageIndex();
 if (i > 0) {
 return changed_urls[i - 1];
 }
 return null;
 }
 function gotoNextPage() {
 var page = getNextPage();
 if (!page) {
 page = detail_url;
 }
 window.location = page;
 }
 function gotoPreviousPage() {
 var page = getPreviousPage();
 if (!page) {
 page = detail_url;
 }
 window.location = page;
 }
 function gotoDetailPage() {
 window.location = detail_url;
 }
 function gotoPublishPage() {
 window.location = publish_url;
 }
</script>

 
 <style type="text/css">
 #review_nav {
 border-top: 3px solid white;
 padding-top: 6px;
 margin-top: 1em;
 }
 #review_nav td {
 vertical-align: middle;
 }
 #review_nav select {
 margin: .5em 0;
 }
 </style>
 <div id="review_nav">
 <table><tr><td>Go to:&nbsp;</td><td>
 <select name="files_in_rev" onchange="window.location=this.value">
 
 <option value="/p/cropzoom/source/browse/trunk/plugin/jquery.cropzoom.js?r=43&amp;spec=svn45"
 selected="selected"
 >/trunk/plugin/jquery.cropzoom.js</option>
 
 </select>
 </td></tr></table>
 
 
 



 <div style="white-space:nowrap">
 Project members,
 <a href="https://www.google.com/accounts/ServiceLogin?service=code&amp;ltmpl=phosting&amp;continue=http%3A%2F%2Fcode.google.com%2Fp%2Fcropzoom%2Fsource%2Fbrowse%2Ftrunk%2Fplugin%2Fjquery.cropzoom.js&amp;followup=http%3A%2F%2Fcode.google.com%2Fp%2Fcropzoom%2Fsource%2Fbrowse%2Ftrunk%2Fplugin%2Fjquery.cropzoom.js"
 >sign in</a> to write a code review</div>


 
 </div>
 
 
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="older_bubble">
 <p>Older revisions</p>
 
 
 <div class="closed" style="margin-bottom:3px;" >
 <img class="ifClosed" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/plus.gif" >
 <img class="ifOpened" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/minus.gif" >
 <a href="/p/cropzoom/source/detail?spec=svn45&r=42">r42</a>
 by gastonrobledo
 on Sep 28, 2011
 &nbsp; <a href="/p/cropzoom/source/diff?spec=svn45&r=42&amp;format=side&amp;path=/trunk/plugin/jquery.cropzoom.js&amp;old_path=/trunk/plugin/jquery.cropzoom.js&amp;old=24">Diff</a>
 <br>
 <pre class="ifOpened">adding support IE9</pre>
 </div>
 
 <div class="closed" style="margin-bottom:3px;" >
 <img class="ifClosed" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/plus.gif" >
 <img class="ifOpened" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/minus.gif" >
 <a href="/p/cropzoom/source/detail?spec=svn45&r=24">r24</a>
 by gastonrobledo
 on Aug 13, 2011
 &nbsp; <a href="/p/cropzoom/source/diff?spec=svn45&r=24&amp;format=side&amp;path=/trunk/plugin/jquery.cropzoom.js&amp;old_path=/trunk/plugin/jquery.cropzoom.js&amp;old=23">Diff</a>
 <br>
 <pre class="ifOpened">Fix restore function with multiple
instances in the same page.</pre>
 </div>
 
 <div class="closed" style="margin-bottom:3px;" >
 <img class="ifClosed" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/plus.gif" >
 <img class="ifOpened" onclick="_toggleHidden(this)" src="http://www.gstatic.com/codesite/ph/images/minus.gif" >
 <a href="/p/cropzoom/source/detail?spec=svn45&r=23">r23</a>
 by gastonrobledo
 on Aug 13, 2011
 &nbsp; <a href="/p/cropzoom/source/diff?spec=svn45&r=23&amp;format=side&amp;path=/trunk/plugin/jquery.cropzoom.js&amp;old_path=/trunk/plugin/jquery.cropzoom.js&amp;old=22">Diff</a>
 <br>
 <pre class="ifOpened">Adding clearTimeout to movement
exposed control</pre>
 </div>
 
 
 <a href="/p/cropzoom/source/list?path=/trunk/plugin/jquery.cropzoom.js&start=43">All revisions of this file</a>
 </div>
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 
 <div class="pmeta_bubble_bg" style="border:1px solid white">
 <div class="round4"></div>
 <div class="round2"></div>
 <div class="round1"></div>
 <div class="box-inner">
 <div id="fileinfo_bubble">
 <p>File info</p>
 
 <div>Size: 35460 bytes,
 1165 lines</div>
 
 <div><a href="//cropzoom.googlecode.com/svn/trunk/plugin/jquery.cropzoom.js">View raw file</a></div>
 </div>
 
 <div id="props">
 <p>File properties</p>
 <dl>
 
 <dt>svn:executable</dt>
 <dd>*</dd>
 
 </dl>
 </div>
 
 </div>
 <div class="round1"></div>
 <div class="round2"></div>
 <div class="round4"></div>
 </div>
 </div>
 </div>


</div>

</div>
</div>

<script src="http://www.gstatic.com/codesite/ph/8191733833915822820/js/prettify/prettify.js"></script>
<script type="text/javascript">prettyPrint();</script>


<script src="http://www.gstatic.com/codesite/ph/8191733833915822820/js/source_file_scripts.js"></script>

 <script type="text/javascript" src="https://kibbles.googlecode.com/files/kibbles-1.3.3.comp.js"></script>
 <script type="text/javascript">
 var lastStop = null;
 var initialized = false;
 
 function updateCursor(next, prev) {
 if (prev && prev.element) {
 prev.element.className = 'cursor_stop cursor_hidden';
 }
 if (next && next.element) {
 next.element.className = 'cursor_stop cursor';
 lastStop = next.index;
 }
 }
 
 function pubRevealed(data) {
 updateCursorForCell(data.cellId, 'cursor_stop cursor_hidden');
 if (initialized) {
 reloadCursors();
 }
 }
 
 function draftRevealed(data) {
 updateCursorForCell(data.cellId, 'cursor_stop cursor_hidden');
 if (initialized) {
 reloadCursors();
 }
 }
 
 function draftDestroyed(data) {
 updateCursorForCell(data.cellId, 'nocursor');
 if (initialized) {
 reloadCursors();
 }
 }
 function reloadCursors() {
 kibbles.skipper.reset();
 loadCursors();
 if (lastStop != null) {
 kibbles.skipper.setCurrentStop(lastStop);
 }
 }
 // possibly the simplest way to insert any newly added comments
 // is to update the class of the corresponding cursor row,
 // then refresh the entire list of rows.
 function updateCursorForCell(cellId, className) {
 var cell = document.getElementById(cellId);
 // we have to go two rows back to find the cursor location
 var row = getPreviousElement(cell.parentNode);
 row.className = className;
 }
 // returns the previous element, ignores text nodes.
 function getPreviousElement(e) {
 var element = e.previousSibling;
 if (element.nodeType == 3) {
 element = element.previousSibling;
 }
 if (element && element.tagName) {
 return element;
 }
 }
 function loadCursors() {
 // register our elements with skipper
 var elements = CR_getElements('*', 'cursor_stop');
 var len = elements.length;
 for (var i = 0; i < len; i++) {
 var element = elements[i]; 
 element.className = 'cursor_stop cursor_hidden';
 kibbles.skipper.append(element);
 }
 }
 function toggleComments() {
 CR_toggleCommentDisplay();
 reloadCursors();
 }
 function keysOnLoadHandler() {
 // setup skipper
 kibbles.skipper.addStopListener(
 kibbles.skipper.LISTENER_TYPE.PRE, updateCursor);
 // Set the 'offset' option to return the middle of the client area
 // an option can be a static value, or a callback
 kibbles.skipper.setOption('padding_top', 50);
 // Set the 'offset' option to return the middle of the client area
 // an option can be a static value, or a callback
 kibbles.skipper.setOption('padding_bottom', 100);
 // Register our keys
 kibbles.skipper.addFwdKey("n");
 kibbles.skipper.addRevKey("p");
 kibbles.keys.addKeyPressListener(
 'u', function() { window.location = detail_url; });
 kibbles.keys.addKeyPressListener(
 'r', function() { window.location = detail_url + '#publish'; });
 
 kibbles.keys.addKeyPressListener('j', gotoNextPage);
 kibbles.keys.addKeyPressListener('k', gotoPreviousPage);
 
 
 }
 </script>
<script src="http://www.gstatic.com/codesite/ph/8191733833915822820/js/code_review_scripts.js"></script>
<script type="text/javascript">
 function showPublishInstructions() {
 var element = document.getElementById('review_instr');
 if (element) {
 element.className = 'opened';
 }
 }
 var codereviews;
 function revsOnLoadHandler() {
 // register our source container with the commenting code
 var paths = {'svn45': '/trunk/plugin/jquery.cropzoom.js'}
 codereviews = CR_controller.setup(
 {"profileUrl":null,"token":null,"assetHostPath":"http://www.gstatic.com/codesite/ph","domainName":null,"assetVersionPath":"http://www.gstatic.com/codesite/ph/8191733833915822820","projectHomeUrl":"/p/cropzoom","relativeBaseUrl":"","projectName":"cropzoom","loggedInUserEmail":null}, '', 'svn45', paths,
 CR_BrowseIntegrationFactory);
 
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_DRAFT_PLATE, showPublishInstructions);
 
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_PUB_PLATE, pubRevealed);
 codereviews.registerActivityListener(CR_ActivityType.REVEAL_DRAFT_PLATE, draftRevealed);
 codereviews.registerActivityListener(CR_ActivityType.DISCARD_DRAFT_COMMENT, draftDestroyed);
 
 
 
 
 
 
 
 var initialized = true;
 reloadCursors();
 }
 window.onload = function() {keysOnLoadHandler(); revsOnLoadHandler();};

</script>
<script type="text/javascript" src="http://www.gstatic.com/codesite/ph/8191733833915822820/js/dit_scripts.js"></script>

 
 
 
 <script type="text/javascript" src="http://www.gstatic.com/codesite/ph/8191733833915822820/js/ph_core.js"></script>
 
 
 
 
 <script type="text/javascript" src="/js/codesite_product_dictionary_ph.pack.04102009.js"></script>
</div> 
<div id="footer" dir="ltr">
 <div class="text">
 &copy;2011 Google -
 <a href="/projecthosting/terms.html">Terms</a> -
 <a href="http://www.google.com/privacy.html">Privacy</a> -
 <a href="/p/support/">Project Hosting Help</a>
 </div>
</div>
 <div class="hostedBy" style="margin-top: -20px;">
 <span style="vertical-align: top;">Powered by <a href="http://code.google.com/projecthosting/">Google Project Hosting</a></span>
 </div>
 
 


 
 </body>
</html>

