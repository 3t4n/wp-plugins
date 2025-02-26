<?php
class au_t{
    function au_t(){
        if(is_admin() && isset($_GET['taxonomy']))
            add_action($_GET['taxonomy'] . '_edit_form', array(&$this,'__taf'), 10, 2);
        add_action('edit_term', array(&$this,'__ut'), 10, 3 );
    }
    function __taf($_t, $_x){
        $_mx = get_option('au_seo_m');
        $_os = _gso();
        if(isset($_mx[$_x][$_t->term_id]))
            $_mx = $_mx[$_x][$_t->term_id];
        echo '<h3>Alquemie SEO</h3>';
        echo '<table class="form-table">';
        $this->__fr('au_tt_', 'Title', '', $_mx);
        $this->__fr('au_de_', 'Description', '', $_mx);
        //if(isset($_os['_umkw_']) && $_os['_umkw_'])		//Metakeywords are allowed by default!!
        $this->__fr('au_mk_', 'Meta Keywords', '', $_mx);
        $this->__fr('au_cl_', 'Canonical', '', $_mx);
        $this->__fr('au_bct_', 'Breadcrumbs Title', '', $_mx);
        $this->__fr('au_noi_', 'no-index '.$_x, '', $_mx, 'checkbox');
        $this->__fr('au_nof_', 'no-follow '.$_x, '', $_mx, 'checkbox');
        echo '</table>';
    }
    function __fr($_i, $_l, $_d, $_mx, $_t = 'text', $_o = ''){
        $_v = '';
        if(isset($_mx[$_i]))
            $_v = stripslashes($_mx[$_i]);
        echo '<tr class="form-field">'."\n";
        echo "\t".'<th scope="row" valign="top"><label for="'.$_i.'">'.$_l.':</label></th>'."\n";
        echo "\t".'<td>'."\n";
        if($_t == 'text'){
        ?>
            <input name="<?php echo $_i; ?>" id="<?php echo $_i; ?>" type="text" value="<?php echo $_v; ?>" size="40"/>
            <p class="description"><?php echo $_d; ?></p>
        <?php	
        }else if($_t == 'checkbox'){
        ?>
            <input name="<?php echo $_i; ?>" id="<?php echo $_i; ?>" type="checkbox" <?php checked($_v); ?>/>
        <?php
        }
        echo "\t".'</td>'."\n";
        echo '</tr>'."\n";
    }
    function __ut($_t, $_i, $_x) {
        $_mx = get_option('au_seo_m');
        foreach (array('au_tt_', 'au_de_', 'au_mk_', 'au_bct_', 'au_cl_') as $_k){
            if(isset($_POST[$_k]))
                $_mx[$_x][$_t][$_k] = $_POST[$_k];
        }
        foreach(array('au_noi_', 'au_nof_') as $_k) {
            if(isset($_POST[$_k]))
                $_mx[$_x][$_t][$_k] = true;
            else
                $_mx[$_x][$_t][$_k] = false;			
        }
        update_option('au_seo_m', $_mx);
        if(defined('W3TC_DIR')){
            require_once W3TC_DIR . '/lib/W3/ObjectCache.php';
            $w3_objectcache = & W3_ObjectCache::instance();
            $w3_objectcache->flush();			
        }
    }	
}
$au_t = new au_t();