<script>
    let urlBaseWordpress = '<?php echo get_site_url(); ?>/index.php';
</script>
<?php
    getTemplate(dirname(__FILE__).'/msgs.php');
    getTemplate(dirname(__FILE__).'/contacts.php');
    getTemplate(dirname(__FILE__).'/lists.php');
    getTemplate(dirname(__FILE__).'/campaigns.php');
    getTemplate(dirname(__FILE__).'/segments.php');
    getTemplate(dirname(__FILE__).'/customfields.php');
    getTemplate(dirname(__FILE__).'/contactsform7.php');