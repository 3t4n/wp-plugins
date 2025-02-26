<?php
/*
    Plugin Name: JiraPress
    Plugin URI: http://god-object.com/
    Description: Easily link to JIRA issues from wordpress.
    Version: 1.1
    Author: Christoph Kempen
    Author URI: http://god-object.com/

    Copyright 2009, Webpatser

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


/**
 * Placeholder for install script, future use
 */
function jirapress_install() {

}

/**
 * Placeholder for admin page, future use
 */
function jirapress_add_pages() {

}

/**
 * Here the jira issues strings are replaced by links.
 *
 * @param array $matches
 * @return string
 */
function issueLinker($matches) {
	 $issue = trim($matches[0], '[]');
    $parts = explode("-", $issue);
    $jira = '';

    // Apache Foundation
    if (array_search($parts[0], array(  'IVY',
                                        'IVYDE',
                                        'ATTIC',
                                        'INFRA',
                                        'LEGAL',
                                        'PRC',
                                        'AVNSHARP',
                                        'STUDIO',
                                        'CENTRAL',
                                        'PLANET',
                                        'TOOLS',
                                        'PNIX',
                                        'BEEHIVE',
                                        'BUILDR',
                                        'STDCXX',
                                        'CAY',
                                        'COCOON',
                                        'COCOON3',
                                        'COMMONSSITE',
                                        'ATTRIBUTES',
                                        'BEANUTILS',
                                        'BETWIXT',
                                        'CHAIN',
                                        'CLI',
                                        'CODEC',
                                        'COLLECTIONS',
                                        'COMPRESS',
                                        'CONFIGURATION',
                                        'DEAMON',
                                        'DBCP',
                                        'DBUTILS',
                                        'DIGESTER',
                                        'DISCOVERY',
                                        'DORMANT',
                                        'EL',
                                        'EMAIL',
                                        'EXEC',
                                        'FILEUPLOAD',
                                        'IO',
                                        'JCI',
                                        'JELLY',
                                        'JXPATH',
                                        'LANG',
                                        'LAUNCHER',
                                        'LOGGING',
                                        'MATH',
                                        'MODELER',
                                        'NET',
                                        'POOL',
                                        'PRIMITIVES',
                                        'PROXY',
                                        'RESOURCES',
                                        'SANDBOX',
                                        'SANSELAN',
                                        'SCXML',
                                        'TRANSACTION',
                                        'VALIDATOR',
                                        'VFS',
                                        'COUCHDB',
                                        'CFX',
                                        'DDLUTILS',
                                        'DERBY',
                                        'JDO',
                                        'OJB',
                                        'TORQUE',
                                        'TORQUEOLD',
                                        'DIR',
                                        'DIRSERVER',
                                        'DIRAPI',
                                        'DIRGROOVY',
                                        'DIRKRB',
                                        'DIRNAMING',
                                        'DIRSHARED',
                                        'DISTURDIO',
                                        'DIRTSEC',
                                        'AVALON',
                                        'EXLBR',
                                        'FORTRESS',
                                        'FELIX',
                                        'FELIXM2',
                                        'FOR',
                                        'DAYTRADER',
                                        'GBUILD',
                                        'GERONIMO',
                                        'GERONIMODEVTOOLS',
                                        'GSHELL',
                                        'XBEAN',
                                        'YOKO',
                                        'GUMP',
                                        'AVRO',
                                        'CHUKWA',
                                        'HADOOP',
                                        'HBASE',
                                        'HDFS',
                                        'HDFS',
                                        'HIVE',
                                        'MAPREDUCE',
                                        'PIG',
                                        'ZOOKEEPER',
                                        'HARMONY',
                                        'MODPYTHON',
                                        'HTTPCLIENT',
                                        'HTTPCORE',
                                        'IBATISNET',
                                        'IBATIS',
                                        'RBATIS',
                                        'ACE',
                                        'BLUESKY',
                                        'CASSANDRA',
                                        'CMIS',
                                        'CLK',
                                        'DROIDS',
                                        'EMPIREDB',
                                        'ESME',
                                        'ETCH',
                                        'HAMA',
                                        'IPMERIUS',
                                        'INCUBATOR',
                                        'JSEC',
                                        'JSPWIKI',
                                        'KATO',
                                        'KI',
                                        'OLIO',
                                        'OWB',
                                        'PDFBOX',
                                        'PHOTARK',
                                        'PIVOT',
                                        'RAT',
                                        'RIVER',
                                        'SHINDIG',
                                        'SHIRO',
                                        'STONEHENGE',
                                        'TASHI',
                                        'THRIFT',
                                        'TS',
                                        'UIMA',
                                        'VCL',
                                        'WOOKIE',
                                        'JCR',
                                        'JCRBENCH',
                                        'JCRCL',
                                        'JCRSERVLET',
                                        'JCRTCK',
                                        'JCRRMI',
                                        'OCM',
                                        'JCRSITE',
                                        'BSF',
                                        'CACTUS',
                                        'ECS',
                                        'JCS',
                                        'MAILETBASE',
                                        'MAILETCRYPTO',
                                        'IMAP',
                                        'JSIEVE',
                                        'JSPF',
                                        'MAILETDOCS',
                                        'MIME4J',
                                        'MPT',
                                        'POSTAGE',
                                        'JAMES',
                                        'MAILETSTANDARD',
                                        'MAILET',
                                        'LABS',
                                        'HTTPDRAFT',
                                        'LOGCXX',
                                        'LOG4J2',
                                        'LOG4NET',
                                        'LOG4PHP',
                                        'LUCENE',
                                        'LUCENENET',
                                        'LUCY',
                                        'MAHOUT',
                                        'NUTCH',
                                        'ORP',
                                        'PYLUCENE',
                                        'SOLR',
                                        'TIKA',
                                        'ASYNCWEB',
                                        'FTPSERVER',
                                        'DIRMINA',
                                        'SSHD',
                                        'VYSPER',
                                        'MYFACESTEST',
                                        'ADFFACES',
                                        'MYCOMMONS',
                                        'MYFACES',
                                        'EXTSCRIPT',
                                        'EXTVAL',
                                        'ORCHESTRA',
                                        'PORTLETBRIDGE',
                                        'TOBAGO',
                                        'TOMAHAWK',
                                        'TRINIDAD',
                                        'RCF',
                                        'ODE',
                                        'OFBIZ',
                                        'OPENJPA',
                                        'JS1',
                                        'JS2',
                                        'PLUTO',
                                        'PORTALS',
                                        'APA',
                                        'PB',
                                        'AGILA',
                                        'ADDR',
                                        'ARMI',
                                        'FEEDPARSER',
                                        'DEPOT',
                                        'EWS',
                                        'GRFT',
                                        'HERALDRY',
                                        'HIVEMIND',
                                        'LOKAHI',
                                        'LCN4C',
                                        'MIRAE',
                                        'HERMES',
                                        'SOAP',
                                        'TRIPLES',
                                        'TSIK',
                                        'WADI',
                                        'APOLLO',
                                        'XAP',
                                        'ROL',
                                        'SLING',
                                        'SYNAPSE',
                                        'TAPESTRY',
                                        'TAP5',
                                        'TRB',
                                        'ANAKIA',
                                        'DBF',
                                        'DVSL',
                                        'TEXEN',
                                        'VELOCITY',
                                        'VELTOOLS',
                                        'AXIS',
                                        'AXIS2',
                                        'AXISCPP',
                                        'WSIF',
                                        'AXIS2C',
                                        'JAXME',
                                        'JUDDI',
                                        'KAND',
                                        'MUSE',
                                        'RAMPART',
                                        'RAMPARTC',
                                        'SAND',
                                        'SANDESHA2',
                                        'SANDESHA2C',
                                        'SAVAN',
                                        'SCOUT',
                                        'TUSCANY',
                                        'WODEN',
                                        'WSCOMMONS',
                                        'WSRP4J',
                                        'WSS',
                                        'XMLRPC',
                                        'WICKET',
                                        'JUICE',
                                        'XALANC',
                                        'XALANJ',
                                        'XERCESC',
                                        'XERCESP',
                                        'XERCESJ',
                                        'XMLBEANS',
                                        'ABDERA',
                                        'ARIES',
                                        'HUPA',
                                        'JDKIM',
                                        'QPID',
                                        'TST',
                                        'VXQUERY',
                                        'WINK')) !== FALSE) $jira = "apache_foundation";

    // Spring framework
    if (array_search($parts[0], array(  'SESPRINGACTIONSCRIPTAS',
                                        'SEDBFONET',
                                        'SEDBFO',
                                        'SE',
                                        'SEBATCHNET',
                                        'SECONFIGNET',
                                        'SENMSNET',
                                        'SERICHCLIENTNET',
                                        'SETHREADNET',
                                        'SESIA',
                                        'SESPRINGINTEGRATIONNET',
                                        'SEJCR',
                                        'SESPRINGPYTHONPY',
                                        'SES',
                                        'SESQLJ',
                                        'SEWORKFLOW',
                                        'BATCH',
                                        'FLEX',
                                        'FACES',
                                        'SPR',
                                        'IDE',
                                        'INT',
                                        'SJC',
                                        'SJS',
                                        'LDAP',
                                        'MOD',
                                        'OSGI',
                                        'RCP',
                                        'ROO',
                                        'SEC',
                                        'SHL',
                                        'SWF',
                                        'SWS',
                                        'SPRNET',
                                        'SAMPLESPET',
                                        'SAMPLESTRAVEL',
                                        'SAMPLESGETSTARTED',
                                        'SAMPLESWEBFLOW')) !== FALSE) $jira = "spring_framework";


    // Zend framework
    if (array_search($parts[0], array(  'ZF',
                                        'ZFINC')) !== FALSE) $jira = "zend_framework";



    switch ($jira) {
        // Apache Foundation
        case 'apache_foundation':
            $output = '<a href="https://issues.apache.org/jira/browse/' .
                 $issue .
                 '">' .
                 $matches[0] .
                 '</a>';
            break;
        // Zend Framework
        case "zend_framework":
            $output = '<a href="http://framework.zend.com/issues/browse/' .
                 $issue .
                 '">' .
                 $matches[0] .
                 '</a>';
            break;
        default:
            $output = $matches[0];
            break;
    }
    return $output;
}
/**
 * Scans the content for jira issues in format [XX-123] format
 * @param string $content
 * @return string
 */
function jirapress($content) {
	$output = preg_replace_callback ( "/\[[A-Za-z0-9]+\-[0-9]+\]/", "issueLinker", $content );
	return $output;
}
/**
 * Placeholder for options, future use
 */
function jirapress_options() {

}
/**
 * Placeholer for uninstall, future use
 */
function jirapress_uninstall() {

}

add_filter ( 'the_content', 'jirapress' );
register_activation_hook ( __FILE__, 'jirapress_install' );
register_deactivation_hook ( __FILE__, 'jirapress_uninstall' );
?>