<?php
return array(
   array(
    'type' => 'toggle',
    'name' => 'amp_story_tg',
    'label' => __('Activate Amp Story', 'amp_story_toogle'),
    'description' => __('Activate Amp Story on this post.', 'amp_story_toogle_desc'),
    'default' => '0',
), array(
    'type' => 'toggle',
    'name' => 'amp_story_tg_primary',
    'label' => __('Show Amp Story instead of post.', 'amp_story_tg_primary_label'),
    'description' => __('Story will be shown instead of post. Otherwise, use ?amp=1 after the url to show story.', 'amp_story_tg_primary_desc'),
    'default' => '0',
),
   array(
    'type' => 'textbox',
    'name' => 'amp_story_cover_title_tb',
    'label' => __('Cover Title', 'amp_story_cover_title_tb_label'),
    'description' => __('Enter **Cover** title.', 'amp_story_cover_title_tb_desc'),
    'default' => '',
),
   array(
    'type' => 'textbox',
    'name' => 'amp_story_cover_sub_tb',
    'label' => __('Cover Subtitle', 'amp_story_cover_sub_tb_label'),
    'description' => __('Enter **Cover** subtitle.', 'amp_story_cover_sub_tb_desc'),
    'default' => '',
),
   array(
    'type' => 'upload',
    'name' => 'amp_story_cover_upload',
    'label' => __('Upload', 'amp_story_cover_upload_label'),
    'description' => __('Upload **Cover** background image', 'amp_story_cover_upload_desc'),
    'default' => '',
),
   array(
    'type'      => 'group',
    'repeating' => true,
    'name'      => 'amp_group',
    'title'     => __('Amp Story Page', 'amp_story_group_title'),
    'fields'    => array(
     array(
        'type' => 'textbox',
        'name' => 'amp_story_tb_1',
        'label' => __('Title', 'amp_story_textbox_label'),
        'description' => __('Enter **Amp Page** title.', 'amp_story_textbox_desc'),
        'default' => '',
    ),
     array(
        'type' => 'toggle',
        'name' => 'amp_story_tg_title',
        'label' => __('Show Title on Page', 'amp_story_tg_title_label'),
        'description' => __('Activate to show the title at the beginning of the AMP Page.', 'amp_story_tg_title_desc'),
        'default' => '1',
    ),
     array(
        'type' => 'upload',
        'name' => 'amp_story_up_1',
        'label' => __('Upload', 'amp_story_upload_label'),
        'description' => __('Upload **Amp Page** background image or video (only mp4 allowed and must have https).', 'amp_story_upload_desc'),
        'default' => '',
    ),
     array(
        'type' => 'upload',
        'name' => 'amp_story_poster_up',
        'label' => __('Poster Image (only for video)', 'amp_story_upload_poster_label'),
        'description' => __('Upload **Amp Page** poster for your mp4 video.', 'amp_story_upload_poster_img'),
        'default' => '',
    ),
     array(
        'type' => 'upload',
        'name' => 'amp_story_audio_up',
        'label' => __('Background Audio (optional)', 'amp_story_upload_audio'),
        'description' => __('Upload **Amp Page** Audio.', 'amp_story_upload_audio_desc'),
        'default' => '',
    ),
     array(
        'type'      => 'group',
        'repeating' => true,
        'name'      => 'amp_story_blocks',
        'title'     => __('Text Blocks', 'amp_story_blocks_title'),
        'fields'    => array(
            array(
                'type'  => 'textarea',
                'label' => __('Text Block', 'amp_story_block_label'),
                'description' => __('Enter **AMP PAGE BLOCK** text', 'amp_story_blocks_title_desc'),
                'name'  => 'amp_story_block_ta',
            ),
            array(
                'type' => 'radiobutton',
                'name' => 'amp_story_block_rb_position',
                'label' => __('Text Position', 'amp_story_block_rb_position_label'),
                'description' => __('Block position in the **AMP PAGE**', 'amp_story_block_rb_position_desc'),
                'items' => array(
                    array(
                        'value' => 'top',
                        'label' => __('Top', 'amp_story_block_rb_position_top'),
                    ),
                    array(
                        'value' => 'center',
                        'label' => __('Center', 'amp_story_block_rb_position_center'),
                    ),
                    array(
                        'value' => 'bottom',
                        'label' => __('Bottom', 'amp_story_block_rb_position_bottom'),
                    ),
                ),
                'default' => array(
                    'bottom',
                ),
            ),
            array(
                'type' => 'color',
                'name' => 'amp_story_block_color',
                'label' => __('Text Block Color', 'amp_story_block_color_label'),
                'description' => __('Choose text block color.', 'amp_story_block_color_dex'),
                'default' => 'rgb(255, 255, 255)',
                'format' => 'rgba',
            ),
            array(
                'type' => 'textbox',
                'name' => 'amp_story_block_text_size',
                'label' => __('Text Block Font Size', 'amp_story_block_text_size_label'),
                'description' => __('Enter numeric font size. Default: 20px.', 'amp_story_block_text_size_desc'),
                'default' => '20',
                'validation' => 'numeric',
            ),
            array(
                'type' => 'toggle',
                'name' => 'amp_story_block_tg_bold',
                'label' => __('Text Block Bold', 'amp_story_block_tg_bold_label'),
                'description' => __('Check to make the text bold.', 'amp_story_block_tg_bold_desc'),
                'default' => '0',
            ),
            array(
                'type' => 'select',
                'name' => 'amp_story_block_text_animation',
                'label' => __('Animation', 'amp_story_block_text_animation_label'),
                'description' => __('Select text block animation. (optional)', 'amp_story_block_text_size_desc'),
                'items' => array(
                    array(
                        'value' => 'none',
                        'label' => __('No Animation', 'amp_story_block_text_animation_1'),
                    ),
                    array(
                        'value' => 'drop',
                        'label' => __('Drop', 'amp_story_block_text_animation_2'),
                    ),
                    array(
                        'value' => 'fade-in',
                        'label' => __('Fade In', 'amp_story_block_text_animation_3'),
                    ),
                    array(
                        'value' => 'fly-in-bottom',
                        'label' => __('Fly in bottom', 'amp_story_block_text_animation_4'),
                    ),
                    array(
                        'value' => 'fly-in-left',
                        'label' => __('Fly in left', 'amp_story_block_text_animation_5'),
                    ),
                    array(
                        'value' => 'fly-in-right',
                        'label' => __('Fly in right', 'amp_story_block_text_animation_6'),
                    ),
                    array(
                        'value' => 'fly-in-top',
                        'label' => __('Fly in top', 'amp_story_block_text_animation_7'),
                    ),
                    array(
                        'value' => 'pulse',
                        'label' => __('Pulse', 'amp_story_block_text_animation_8'),
                    ),
                    array(
                        'value' => 'rotate-in-left',
                        'label' => __('Rotate in left', 'amp_story_block_text_animation_9'),
                    ),
                    array(
                        'value' => 'rotate-in-right',
                        'label' => __('Rotate in right', 'amp_story_block_text_animation_10'),
                    ),
                    array(
                        'value' => 'twirl-in',
                        'label' => __('Twirl in', 'amp_story_block_text_animation_11'),
                    ),
                    array(
                        'value' => 'whoosh-in-left',
                        'label' => __('Whoosh in left', 'amp_story_block_text_animation_12'),
                    ),
                    array(
                        'value' => 'whoosh-in-right',
                        'label' => __('Whoosh in right', 'amp_story_block_text_animation_13'),
                    ),
                    array(
                        'value' => 'pan-left',
                        'label' => __('Pan left', 'amp_story_block_text_animation_14'),
                    ),
                    array(
                        'value' => 'pan-right',
                        'label' => __('Pan right', 'amp_story_block_text_animation_15'),
                    ),
                    array(
                        'value' => 'pan-down',
                        'label' => __('Pan down', 'amp_story_block_text_animation_16'),
                    ),
                    array(
                        'value' => 'pan-up',
                        'label' => __('Pan up', 'amp_story_block_text_animation_17'),
                    ),
                    array(
                        'value' => 'zoom-in',
                        'label' => __('Zoom in', 'amp_story_block_text_animation_18'),
                    ), 
                    array(
                        'value' => 'zoom-out',
                        'label' => __('Zoom out', 'amp_story_block_text_animation_19'),
                    ),
                ),
                'default' => array(
                    'value_1',
                ),

            ),
            array(
                'type' => 'textbox',
                'name' => 'amp_story_block_tb_url',
                'label' => __('Include Url instead', 'mp_story_block_tb_url_label'),
                'description' => __('Url will be displayed instead textbox.', 'mp_story_block_tb_url_desc'),
                'validation' => 'url',
            ),
             array(
                'type' => 'textbox',
                'name' => 'amp_story_block_tb_url_text',
                'label' => __('Include Url Anchor Text', 'mp_story_block_tb_url_tb_label'),
                'description' => __('Include Anchor text for Url', 'mp_story_block_tb_url_ta_desc'),
            )

        ),
    )
 ),
),
);