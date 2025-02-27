<?php

/**
 * Provide a public-facing view for the LinkedIn Insight Tag plugin option
 *
 * @link 		https://wpconcierges.com/plugins/lk-insight
 * @since 		1.0.0
 *
 * @package 	LkInsights
 * @subpackage 	LkInsights/public/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$tag_id=$this->options['lkinsight-tag-id'];
if(strlen($tag_id)){
?>
<script type="text/javascript">
_linkedin_partner_id = "<?php echo $tag_id;?>";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=<?php echo $tag_id;?>&fmt=gif" />
</noscript>
<?php }?>