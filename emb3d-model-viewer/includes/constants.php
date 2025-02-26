<?php
class Emb3D
{
    public const PLUGIN_VERSION = '1.0.6';

    public const PLUGIN_TITLE = 'Emb3D Model Viewer';
    public const PLUGIN_SHORT_TITLE = 'Emb3D Viewer';
    public const PLUGIN_NAME = 'emb3d-model-viewer';
    public const PLUGIN_ICON = 'emb3d-model-viewer-icon';

    public const PREMIUM_URL = 'https://www.emb3d.com/emb3d-plugin-wordpress?hostname=';

    public const SUPPORTED_EXTENSIONS = [
        '3ds' => 'model/3ds',
        'emb3d' => 'model/emb3d',
        'fbx' => 'model/fbx',
        'glb' => 'model/gltf-binary',
        'gltf' => 'model/gltf+json',
        'ply' => 'model/ply',
        'stl' => 'model/stl',
        'mzip' => 'model/zip'
    ];

    public const META_BOX_ID = 'emv-metabox';
    public const META_BOX_MODEL_ID = 'emv-model-id';
    public const META_BOX_MODEL_FILENAME = 'emv-model-filename';
    public const META_BOX_MODEL_REPLACE_PRODUCT_IMAGE = 'emv-replace-product-image';
    public const META_BOX_MODEL_BACKGROUND_COLOR = 'emv-background-color';
    public const META_BOX_MODEL_PROGRESS_COLOR = 'emv-progress-color';

    public const META_BOX_NONCE = 'emv-meta-box-nonce';

    public const OPTIONS = 'emv-options';
    public const REGISTRATION_SECTION = 'emv-registration-section';
    public const REGISTRATION_KEY = 'emv-registration-key';
    public const REGISTRATION_NONCE = 'emv-registration-nonce';

    public const SCRIPT_ADMIN = 'emv-admin-script';
    public const SCRIPT_ELEMENT = 'emb3d-viewer-element';

    public const SCRIPT_WP_COLOR_PICKER_ALPHA = 'wp-color-picker-alpha';
    public const SCRIPT_WP_COLOR_PICKER_ALPHA_VERSION = '3.0.2';

    public const SCRIPT_LORD_ICON = 'lord-icon';
    public const SCRIPT_LORD_ICON_VERSION = '4.0.3';

    public const STYLE_ADMIN = 'emv-admin';
    public const STYLE_PUBLIC = 'emv-public';
    public const STYLE_ELEMENTOR_EDITOR = 'emv-elementor';
}
