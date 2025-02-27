<?php

/**
 * Table data template
 *
 * This file is used to display the table data
 *
 * @link       http://www.wcvendors.com
 * @since      2.5.2
 * @version    2.5.2
 */

?>

<tbody>
<?php foreach ( $this->rows as $row ) : ?>

    <?php
    if ( isset( $row->action_before ) ) {
        echo $row->action_before; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
    ?>

    <tr>

        <?php foreach ( $this->columns as $key => $column ) : ?>

            <?php
            if ( strtolower( $column ) === 'id' ) {
                continue;
            }
            ?>

            <td class="<?php echo esc_attr( $key ); ?>"><?php echo $row->$key; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <!-- Row Action output -->
                <?php if ( $this->action_column === $key ) : ?>
                    <?php
                    if ( isset( $row->row_actions ) ) {
                        $this->actions = $row->row_actions;
                    }
                    ?>
                    <?php $this->display_actions( $row->ID ); ?>
                    <?php
                    if ( isset( $row->action_after ) ) {
                        echo $row->action_after; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    }
                    ?>
                <?php endif; ?>
            </td>

        <?php endforeach; ?>

    </tr>

<?php endforeach; ?>
</tbody>
