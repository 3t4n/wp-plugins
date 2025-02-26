<input type="text" id="attendance_<?php echo $setting['key']; ?>" name="attendance_<?php echo $setting['key']; ?>" value="<?php echo $attendance[$setting['key']]; ?>" class="regular-text media-url" data-dependency="<?php if (isset($setting['dependency'])) echo $setting['dependency']; ?>" placeholder="https://url.to/image.png">

<br>

<?php if (!empty($attendance[$setting['key']])): ?>
    <img src="<?php echo $attendance[$setting['key']]; ?>" class="media-preview">
<?php endif ?>

<a href="#" class="button button-secondary upload-media" data-title="<?php echo $setting['title']; ?>" data-key="attendance_<?php echo $setting['key']; ?>">
    Upload
</a>

<style type="text/css">
    .media-preview {
        width: 100px;
        border: 1px solid #ddd;
        display: inline-block;
        padding: 3px;
        margin-right: 5px;
    }

    .media-url {
        margin-bottom: 5px;
    }
</style>
