<?php

namespace Kitab;

class GeneralSettings
{
    // declare option name
    public $option_name = 'kitab_general_settings';
    public function render()
    {
?>

<!-- TODO 3 checkboxes options for creating the book post type, publishers and authors taxonomies  -->

<!-- checkbox field for creating the book post type or not -->
<tr>
    <th scope="row"><?php esc_html_e('Book Post Type', 'kitab'); ?>
        <p class="kitab-tooltip">
            <span
                class="description"><?php esc_html_e('Check this box to create the book post type.', 'kitab'); ?></span>
            <span class="dashicons dashicons-editor-help"></span>
        </p>
    </th>
    <td>
        <?php
                $create_book_post_type = isset(get_option($this->option_name)['create_book_post_type']) ? get_option($this->option_name)['create_book_post_type'] : '';
                ?>
        <label for="<?php echo esc_attr($this->option_name); ?>_create_book_post_type">
            <input type="checkbox" id="<?php echo esc_attr($this->option_name); ?>_create_book_post_type"
                name="<?php echo esc_attr($this->option_name); ?>[create_book_post_type]" value="1"
                <?php checked($create_book_post_type, 1); ?>>
            <?php esc_html_e('Create Book Post Type', 'kitab'); ?>
        </label>
    </td>
</tr>

<!-- text field option to set the default taxonomy , default value is category -->
<tr>
    <th scope="row"><?php esc_html_e('Default Taxonomy', 'kitab'); ?>
        <p class="kitab-tooltip">
            <span
                class="description"><?php esc_html_e('Set the default taxonomy for the book post type.', 'kitab'); ?></span>
            <span class="dashicons dashicons-editor-help"></span>
        </p>
    </th>
    <td>
        <?php
                $default_taxonomy = isset(get_option($this->option_name)['default_taxonomy']) ? get_option($this->option_name)['default_taxonomy'] : 'category';
                ?>
        <input type="text" id="<?php echo esc_attr($this->option_name); ?>_default_taxonomy"
            name="<?php echo esc_attr($this->option_name); ?>[default_taxonomy]"
            value="<?php echo esc_attr($default_taxonomy); ?>">

        <!-- desc -->
        <p class="description">
            <?php esc_html_e('A new taxonomy will be created if the value is not category.', 'kitab'); ?>
        </p>
    </td>
</tr>
<!-- checkbox field for creating the publishers taxonomy or not -->
<tr>
    <th scope="row"><?php esc_html_e('Publishers Taxonomy', 'kitab'); ?>
        <p class="kitab-tooltip">
            <span
                class="description"><?php esc_html_e('Check this box to create the publishers taxonomy.', 'kitab'); ?></span>
            <span class="dashicons dashicons-editor-help"></span>
        </p>
    </th>
    <td>
        <?php
                $create_publishers_taxonomy = isset(get_option($this->option_name)['create_publishers_taxonomy']) ? get_option($this->option_name)['create_publishers_taxonomy'] : '';
                ?>
        <label for="<?php echo esc_attr($this->option_name); ?>_create_publishers_taxonomy">
            <input type="checkbox" id="<?php echo esc_attr($this->option_name); ?>_create_publishers_taxonomy"
                name="<?php echo esc_attr($this->option_name); ?>[create_publishers_taxonomy]" value="1"
                <?php checked($create_publishers_taxonomy, 1); ?>>
            <?php esc_html_e('Create Publishers Taxonomy', 'kitab'); ?>
        </label>
    </td>
</tr>

<!-- checkbox field for creating the authors taxonomy or not -->
<tr>
    <th scope="row"><?php esc_html_e('Authors Taxonomy', 'kitab'); ?>
        <p class="kitab-tooltip">
            <span
                class="description"><?php esc_html_e('Check this box to create the authors taxonomy.', 'kitab'); ?></span>
            <span class="dashicons dashicons-editor-help"></span>
        </p>
    </th>
    <td>
        <?php
                $create_authors_taxonomy = isset(get_option($this->option_name)['create_authors_taxonomy']) ? get_option($this->option_name)['create_authors_taxonomy'] : '';
                ?>
        <label for="<?php echo esc_attr($this->option_name); ?>_create_authors_taxonomy">
            <input type="checkbox" id="<?php echo esc_attr($this->option_name); ?>_create_authors_taxonomy"
                name="<?php echo esc_attr($this->option_name); ?>[create_authors_taxonomy]" value="1"
                <?php checked($create_authors_taxonomy, 1); ?>>
            <?php esc_html_e('Create Authors Taxonomy', 'kitab'); ?>
        </label>
    </td>
</tr>
<!-- Move the post types field here -->
<tr>
    <th scope="row"><?php esc_html_e('Select Post Type', 'kitab'); ?>
        <p class="kitab-tooltip">
            <span
                class="description"><?php esc_html_e('Select the post types you want to display the book post meta on.', 'kitab'); ?></span>
            <span class="dashicons dashicons-editor-help"></span>
        </p>
    </th>


    <td>
        <?php
                $selected_post_type = isset(get_option($this->option_name)['post_type']) ? get_option($this->option_name)['post_type'] : [];
                $post_types = get_post_types(array('public' => true), 'objects');
                ?>
        <?php foreach ($post_types as $post_type) : ?>
        <?php if ($post_type->name !== 'attachment') : // Exclude "media" post type 
                    ?>
        <label for="<?php echo esc_attr($this->option_name); ?>_post_type_<?php echo esc_attr($post_type->name); ?>">
            <input type="checkbox"
                id="<?php echo esc_attr($this->option_name); ?>_post_type_<?php echo esc_attr($post_type->name); ?>"
                name="<?php echo esc_attr($this->option_name); ?>[post_type][]"
                value="<?php echo esc_attr($post_type->name); ?>"
                <?php checked(in_array($post_type->name, (array)$selected_post_type)); ?>>
            <?php echo esc_html(sprintf(__('%s', 'kitlab'), $post_type->label)); ?>
        </label><br>
        <?php endif; ?>
        <?php endforeach; ?>
    </td>
</tr>


<?php
    }
}