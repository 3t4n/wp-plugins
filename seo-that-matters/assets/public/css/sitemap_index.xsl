<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
	xmlns:html="http://www.w3.org/TR/REC-html40"
	xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
	xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>XML Sitemap (Index)</title>
		<meta charset="utf-8" />
		<style>
			* {
				box-sizing: border-box;
			}
			::-webkit-scrollbar {
            	height: 0px;
            	width: 0
            }
			body {
				font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
				font-family:"Lucida Grande","Lucida Sans Unicode",Tahoma,Verdana,sans-serif;
			    font-size: 12px;
			    font-size: calc(10.2px + (12.25 - 10.2) * ((100vw - 300px) / (1680 - 300)));
			    line-height: 1.6;
			    color: #495057;
			    background: #f5f7fb;
			    background: #f7f9ff;
			    background: #fbfcff;
			    margin: 0;
			    text-align: center;
			    width: 100vw;
			    overflow-x:hidden
			}
			main {
				margin: 30px auto;
				display: inline-block;
				text-align: left;
				max-width: 880px;
			}
			table {
				border-collapse: collapse;
				width: 100%;
                max-width: 100%;
			}
			#header>p,
			.info {
			    padding: 0 2px
			}
			h1 {
				text-align: center;
				line-height: 1.1;
				font-weight: 600;
				margin-bottom: 0.75em;
				font-size: calc(19.5px + (21.35 - 19.5) * ((100vw - 300px) / (1680 - 300)));
			}
			.list {
				border: 1px solid rgba(0, 40, 100, .12);
				border-radius: 4px;
				background: #fff;
				box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .05);
			}
			a {
				text-decoration: none;
				color: #495057;
				transition: color .2s;
			}
			strong { color: #7d8185 }
			a:hover {
				color: #9aa0ac;
			}
			tr:first-child {
			    border-bottom: 2px solid rgba(0, 40, 100, .12);
			    background: none;
			}
			tr:nth-child(2n) {
			    background: rgba(0, 0, 0, .03);
			    background: #f7f9ff;
			}
			th,
			td {
			    padding: .6em 1em;
			    color: #9aa0ac;
			}
			th {
				text-align: left;
				font-weight: normal;
				text-transform: uppercase;
			}
			th {
			    padding: .85em 1em;
			}
			td {
			    padding: .75em 1em;
			    padding: 0.9em 1em;
			}
			#header {
			    margin-bottom: calc(17.5px + (15.35 - 17.5) * ((100vw - 300px) / (1680 - 300)))
			}
			.info {
				margin-top: calc(17.5px + (12.35 - 17.5) * ((100vw - 300px) / (1680 - 300)));
				color: #9aa0ac
			}
			.text-center {
			    text-align: center;
			}
			.text-smaller {
			    font-size: 11.75px;
			    font-size: calc(13.5px + (11.75 - 13.5) * ((100vw - 300px) / (1680 - 300)))
			}
			.info a,
			#header>p a {
			    font-weight: bold
			}
			
			tr td {
			    min-width: 5%;
			}
			
			tr td:first-child {
                    width: 300px;
                    max-width: 585px;
                    overflow: scroll;
                    white-space: nowrap;
            }
            
            tr td:nth-child(4) {
                min-width: 115px;
            }
			
			tr td:last-child {
			    width: 25%
			}
			/*
			.hide {
			    display: none!important
			}
			*/
			@media (min-width: 768px) {
			    table {
                    font-size: 12.35px;
                }
            }
            
            @media (max-width: 767px) {
			    table {
                    font-size: 19.5px;
                }
            }
		</style>
	</head>
	<body>
	<main>
		<h1>XML Sitemap (Index)</h1>
		<div id="header">
    		<p>Used to inform search engines like <a href="https://www.google.com">Google</a>, <a href="https://www.bing.com/">Bing</a>, and <a href="https://www.yahoo.com">Yahoo!</a> about the content of this website, so that they can crawl and index this site more effectively. Learn more about XML sitemaps on <a href="https://www.sitemaps.org/">Sitemaps.org</a>.</p>
    	</div>

		<xsl:if test="count(sitemap:sitemapindex/sitemap:sitemap) &gt; 0">
			<div class="list">
				<table width="100%">
					<tr>
						<th width="100%">Sitemap</th>
					</tr>
					<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
						<xsl:variable name="sitemapURL">
							<xsl:value-of select="sitemap:loc"/>
						</xsl:variable>
						<tr>
							<td>
								<a href="{$sitemapURL}"><xsl:value-of select="sitemap:loc"/></a>
							</td>
						</tr>
					</xsl:for-each>
				</table>
			</div>
		</xsl:if>

		<xsl:if test="count(sitemap:sitemapindex/sitemap:sitemap) &lt; 1">
			<div class="list">
				<table>
					<tr>
						<th >URL</th>
						<th class="text-center">Last Modified</th>
					</tr>
					<xsl:for-each select="sitemap:urlset/sitemap:url">
						<tr>
							<td>
								<xsl:variable name="itemURL">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:variable>
								<a href="{$itemURL}">
									<xsl:value-of select="sitemap:loc"/>
								</a>
							</td>
							<td class="text-center text-smaller">
							    <xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,8)))"/> (<xsl:value-of select="substring(sitemap:lastmod,20,6)"/>)
							</td>
						</tr>
					</xsl:for-each>
				</table>
			</div>
		</xsl:if>
			<div class="info">
				This Sitemap Index contains <xsl:value-of select="count( sitemap:sitemapindex/sitemap:sitemap )" /> post types. Generated from <strong><a href="https://wordpress.org/plugins/seo-that-matters/">SEO That Matters</a></strong> by <a href="https://dhiratara.me">Arya Dhiratara</a>.
			</div>
	</main>
	</body>
	</html>
</xsl:template>
</xsl:stylesheet>