<?php if($form): ?>
<p>
    <label for="<?=$form['title']['id']; ?>">
        <?=__('Title:', 'fl_bridge'); ?>
    </label>
    <input id="<?=$form['title']['id']; ?>" name="<?=$form['title']['name']; ?>" value="<?=$form['title']['value'];?>" style="width:100%;"/>
</p>

<p>
    <label for="<?=$form['l_count']['id']; ?>">
        <?= __('Listings count:', 'fl_bridge'); ?>
    </label>
    <input id="<?=$form['l_count']['id']; ?>" name="<?=$form['l_count']['name']; ?>" value="<?=$form['l_count']['value'];?>" style="width:100%;"/>
</p>

<p>
    <label for="<?=$form['l_count']['id']; ?>">
        <?= __('Select type of listings to show:', 'fl_bridge'); ?>
    </label>
    <select id="<?= $form['l_mode']['id']; ?>" name="<?= $form['l_mode']['name']; ?>">
        <option <?php selected($instance['l_mode'], 'recently_added');?> value="recently_added"><?=__("Recently Added",'fl_bridge')?></option>
        <option <?php selected($instance['l_mode'], 'featured');?> value="featured"><?=__("Featured",'fl_bridge')?></option>
    </select>
</p>

<p>
    <label for="<?=$form['l_count']['id']; ?>">
        <?= __('Listing type:', 'fl_bridge'); ?>
    </label>
    <select id="<?= $form['l_type']['id']; ?>" name="<?= $form['l_type']['name']; ?>">
        <?php foreach ($listingTypes as $key => $type): ?>
            <option <?php selected($instance['l_type'], $type['key']);?> value="<?=$type['key']?>"><?=__($type['name'],'fl_bridge')?></option>
        <?php endforeach; ?>
    </select>
</p>

<p>
    <label for="<?=$form['img_width']['id']; ?>">
        <?=__('Image width:', 'fl_bridge'); ?>
    </label>
    <input id="<?=$form['img_width']['id']; ?>" name="<?=$form['img_width']['name']; ?>" value="<?=$form['img_width']['value'];?>" style="width:100%;"/>
</p>

<p>
    <label for="<?=$form['img_height']['id']; ?>">
        <?=__('Image height:', 'fl_bridge'); ?>
    </label>
    <input id="<?=$form['img_height']['id']; ?>" name="<?=$form['img_height']['name']; ?>" value="<?=$form['img_height']['value'];?>" style="width:100%;"/>
</p>

<?php else :?>
    <p> <?=__("Can't connect to the WordPress bridge plugin", 'fl_bridge'); ?> </p>
<?php endif; ?>


