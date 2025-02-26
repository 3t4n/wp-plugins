<?php 

function rs_duplicate_page_form()
{
	global $wpdb;
	$args = array(
		'authors'     => '',
		'child_of'    => 0,
		'date_format' => get_option( 'date_format' ),
		'depth'       => 0,
		'echo'        => 1,
		'exclude'     => '',
		'include'     => '',
		'link_after'  => '',
		'link_before' => '',
		'post_type'   => 'page',
		'post_status' => 'publish',
		'show_date'   => '',
		'sort_column' => 'menu_order, post_title',
		'sort_order'  => '',
		'title_li'    => __( 'Pages' ),
		'walker'      => ''
	);

	$pages = get_pages( $args );

	?>
    <h1><?php _e( 'Duplicate Page' ) ?></h1>

    <div class="wrap">
        <div class="icon32" id="icon-options-general"><br/></div>
        <h2><?php _e( 'Seleziona la pagina da replicare per le Provincie Italiane' ) ?></h2>
        <p>&nbsp;</p>
        <form method="post" action="">
            <table>
                <tbody>
                <tr valign="top">
                    <th scope="row"><label for="ylb_close_box_effect"><?php _e( 'Seleziona Pagina' ) ?></label></th>
                    <td>
                        <select id="ylb_close_box_effect" name="rs_duplacate_page">
							<?php foreach ( $pages AS $page ): ?>
                                <option value="<?php echo $page->ID ?>" <?php selected( get_option( 'rs_duplacate_page' ), $page->ID ); ?>><?php echo $page->post_title; ?> </option>
							<?php endforeach; ?>
                        </select>
                        <span class="description"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <p>
                            <input type="submit" class="button-primary" id="submit" name="submit"
                                   value="<?php _e( 'Save Changes' ) ?>"/>
                        </p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"></th>
                    <td>
                        <a target="_blank" href="www.moskitothemes.com"> <img src="images/plugin-FAQ.png"/> </a>
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>
	<?php

	$pages_duplicate = $wpdb->get_results( "
		SELECT P.post_title, D.page_id, D.sub_page 
		FROM " . $wpdb->prefix . 'duplicate_page D' . "
		INNER JOIN " . $wpdb->prefix . 'posts P ON P.ID = D.page_id' . "
		GROUP BY D.page_id "
	);

	//echo $wpdb->last_query;

	foreach ( $pages_duplicate as $duplicate )
	{
	    ?>
        <table width="90%" style="padding: 5px; border: 1px solid #000;">
            <thead style="background-color: #c6c6c6; color: #fff;">
            <th style="padding: 3px;" align="left"> Pagina</th>
            <th style="padding: 3px;" align="left"> actions</th>
            </thead>
            <tr>
                <td style="padding: 3px; width: 60%;"> <?php echo $duplicate->post_title ?> </td>
                <td style="padding: 3px; width: 40%; text-align: right;">
                    <a href="">refresh pages duplicate</a> &nbsp;
                    <a href="">hide pages</a>
                </td>
            </tr>
        </table>
		<?php
	}
}

?>