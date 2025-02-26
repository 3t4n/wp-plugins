<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//XML

//Headers
rankology_get_service('SitemapHeaders')->printHeaders();

//WPML - Home URL
if ( 2 == apply_filters( 'wpml_setting', false, 'language_negotiation_type' ) ) {
    add_filter('rankology_sitemaps_home_url', function($home_url) {
        $home_url = apply_filters( 'wpml_home_url', get_option( 'home' ));
        return trailingslashit($home_url);
    });
} else {
    add_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20, 5);
}

function rankology_xml_sitemap_index_xsl() {
	$home_url = home_url().'/';

	if (function_exists('pll_home_url')) {
        $home_url = site_url().'/';
	}

	$home_url = apply_filters( 'rankology_sitemaps_home_url', $home_url );

	$rankology_sitemaps_xsl ='<?xml version="1.0" encoding="UTF-8"?><xsl:stylesheet version="2.0"
				xmlns:html="http://www.w3.org/TR/REC-html40"
				xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
				xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">';
	$rankology_sitemaps_xsl .="\n";
	$rankology_sitemaps_xsl .='<head>';
	$rankology_sitemaps_xsl .="\n";
	$rankology_sitemaps_xsl .='<title>XML Sitemaps</title>';
	$rankology_sitemaps_xsl .='<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	$rankology_sitemaps_xsl .="\n";
	$rankology_sitemaps_xsl_css = '<style type="text/css">';

	$rankology_sitemaps_xsl_css .= apply_filters('rankology_sitemaps_xsl_css', '
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	body {
		background: #F7F7F7;
		font-size: 14px;
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
	}
	h1 {
		color: #23282d;
		font-weight:bold;
		font-size:20px;
		margin: 20px 0;
	}
	p {
		margin: 0 0 15px 0;
	}
	p a {
		color: rgb(0, 135, 190);
	}
	p.footer {
		padding: 15px;
	    background: rgb(250, 251, 252) none repeat scroll 0% 0%;
	    margin: 10px 0px 0px;
	    display: inline-block;
	    width: 100%;
	    color: rgb(68, 68, 68);
	    font-size: 13px;
	    border-top: 1px solid rgb(224, 224, 224);
	}
	#main {
		margin: 0 auto;
		max-width: 55rem;
		padding: 1.5rem;
		width: 100%;
	}
	#sitemaps {
		width: 100%;
		box-shadow: 0 0 0 1px rgba(224, 224, 224, 0.5),0 1px 2px #a8a8a8;
		background: #fff;
		margin-top: 20px;
		display: inline-block;
	}
	#sitemaps .loc, #sitemaps .lastmod {
	    font-weight: bold;
	    display: inline-block;
	    border-bottom: 1px solid rgba(224, 224, 224, 1);
	    padding: 15px;
	}
	#sitemaps .loc {
		width: 70%;
	}
	#sitemaps .lastmod {
		width: 30%;
		padding-left: 0;
	}
	#sitemaps ul {
	    margin: 10px 0;
	    padding: 0;
	}
	#sitemaps li {
	    list-style: none;
	    padding: 10px 15px;
	}
	#sitemaps li a {
	    color: rgb(0, 135, 190);
	    text-decoration: none;
	}
	#sitemaps li:hover{
		background:#F3F6F8;
	}
	#sitemaps .item-loc {
	    width: 70%;
	    display: inline-block;
	}
	#sitemaps .item-lastmod {
		width: 30%;
	    display: inline-block;
		padding: 0 10px;
	}');

	$rankology_sitemaps_xsl_css .= '</style>';

    $rankology_sitemaps_xsl .= $rankology_sitemaps_xsl_css;
	$rankology_sitemaps_xsl .='</head>';
	$rankology_sitemaps_xsl .='<body>';
	$rankology_sitemaps_xsl .='<div id="main">';
	$rankology_sitemaps_xsl .='<h1>'.__('XML Sitemaps','wp-rankology').'</h1>';
	$rankology_sitemaps_xsl .='<p><a href="'.$home_url.'sitemaps.xml">Index sitemaps</a></p>';
	$rankology_sitemaps_xsl .='<xsl:if test="sitemap:sitemapindex/sitemap:sitemap">';
	$rankology_sitemaps_xsl .='<p>'.sprintf(__('This XML Sitemap Index file contains %s sitemaps.','wp-rankology'),'<xsl:value-of select="count(sitemap:sitemapindex/sitemap:sitemap)"/>').'</p>';
	$rankology_sitemaps_xsl .='</xsl:if>';
	$rankology_sitemaps_xsl .='<xsl:if test="sitemap:urlset/sitemap:url">';
	$rankology_sitemaps_xsl .='<p>'.sprintf(__('This XML Sitemap contains %s URL(s).','wp-rankology'),'<xsl:value-of select="count(sitemap:urlset/sitemap:url)"/>').'</p>';
	$rankology_sitemaps_xsl .='</xsl:if>';
	$rankology_sitemaps_xsl .='<div id="sitemaps">';
	$rankology_sitemaps_xsl .='<div class="loc">';
	$rankology_sitemaps_xsl .='URL';
	$rankology_sitemaps_xsl .='</div>';
	$rankology_sitemaps_xsl .='<div class="lastmod">';
	$rankology_sitemaps_xsl .=__('Last update','wp-rankology');
	$rankology_sitemaps_xsl .='</div>';
	$rankology_sitemaps_xsl .='<ul>';
	$rankology_sitemaps_xsl .='<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">';
    $rankology_sitemaps_xsl .='<li>';
    $rankology_sitemaps_xsl .='<xsl:variable name="sitemap_loc"><xsl:value-of select="sitemap:loc"/></xsl:variable>';
    $rankology_sitemaps_xsl .='<span class="item-loc"><a href="{$sitemap_loc}"><xsl:value-of select="sitemap:loc" /></a></span>';
    $rankology_sitemaps_xsl .='<span class="item-lastmod"><xsl:value-of select="sitemap:lastmod" /></span>';
    $rankology_sitemaps_xsl .='</li>';
    $rankology_sitemaps_xsl .='</xsl:for-each>';
    $rankology_sitemaps_xsl .='</ul>';

    $rankology_sitemaps_xsl .='<ul>';
	$rankology_sitemaps_xsl .='<xsl:for-each select="sitemap:urlset/sitemap:url">';
    $rankology_sitemaps_xsl .='<li>';
    $rankology_sitemaps_xsl .='<xsl:variable name="url_loc"><xsl:value-of select="sitemap:loc"/></xsl:variable>';
	$rankology_sitemaps_xsl .='<span class="item-loc"><a href="{$url_loc}"><xsl:value-of select="sitemap:loc" /></a></span>';

	$rankology_sitemaps_xsl .= '<xsl:if test="sitemap:lastmod">';
	$rankology_sitemaps_xsl .='<span class="item-lastmod"><xsl:value-of select="sitemap:lastmod" /></span>';
	$rankology_sitemaps_xsl .='</xsl:if>';
    $rankology_sitemaps_xsl .='</li>';
    $rankology_sitemaps_xsl .='</xsl:for-each>';
    $rankology_sitemaps_xsl .='</ul>';

    $rankology_sitemaps_xsl .='</div>';
    $rankology_sitemaps_xsl .='</div>';
	$rankology_sitemaps_xsl .='</body>';
	$rankology_sitemaps_xsl .='</html>';

	$rankology_sitemaps_xsl .='</xsl:template>';

	$rankology_sitemaps_xsl .='</xsl:stylesheet>';

    $rankology_sitemaps_xsl = apply_filters('rankology_sitemaps_xsl', $rankology_sitemaps_xsl);

	return $rankology_sitemaps_xsl;
}
echo rankology_xml_sitemap_index_xsl();
