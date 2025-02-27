<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

?>

<p><a target="_blank" href="https://www.gsplugins.com/product/gs-books-showcase/#pricing"><b>Upgrade to PRO</b></a> to get these advanced features.</p>

<table id="repeatable-book-formats" class="pro-only" width="100%">
    <thead>
        <tr>
            <th width="20%"><?php esc_html_e( 'Format Name', 'gsbookshowcase' ); ?></th>
            <th width="20%"><?php esc_html_e( 'Regular Price', 'gsbookshowcase' ); ?></th>
            <th width="20%"><?php esc_html_e( 'Sale Price', 'gsbookshowcase' ); ?></th>
            <th width="20%"><?php esc_html_e( 'Link', 'gsbookshowcase' ); ?></th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" class="widefat" placeholder="paperback" /></td>
            <td style="text-align: center;"><input type="number" placeholder="$30"></td>					
            <td style="text-align: center;"><input type="number" placeholder="$20"></td>
            <td><input type="text" class="widefat" placeholder="https://www.gsplugins.com" value="" /></td>		
            <td><a class="button remove-book-format" href="#"><?php esc_html_e( 'Remove', 'gsbookshowcase' ); ?></a></td>
        </tr>
    </tbody>
</table>

<p><a id="add-book-format" class="button pro-only" href="#"><?php esc_html_e( 'Add Book Format', 'gsbookshowcase' ); ?></a></p>