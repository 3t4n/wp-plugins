<?php
function gol_field_type( $params = array() ){
    $field_params = array(
        'label'       => '',
        'description' => '',
        'icon'        => '',
        'name'        => '',
        'id'          => '',
        'class'       => '',
        'column'      => '',
        'type'        => '',
        'select'      => array(),
        'default'     => '',
    );

    if( is_array( $params ) && $params ){
        foreach ( $field_params as $key => $val ){
            if( isset( $params[ $key ] ) ){
                $$key = $params[ $key ];
            } else {
                $$key = $val;
            }
        }
    }

    if( $name && $type ){
        $column = ( $column ) ? $column : '12';
        $value = GreyOwllightboxOBJ::get_field_value( $name );
        switch ( $type ) {
            case 'text':
            $value = preg_replace( ['/</', '/>/', "/'/", '/"/'],['&#60;', '&#62;', '&#39;', '&#34;'], $value ); ?>
                <div class="field-column-<?php echo $column; ?>">
                    <label for="<?php echo $id; ?>">
                        <span class="label-text">
                            <?php if( $icon ): ?>
                                <span class="iconbox"><?php echo $icon; ?></span>
                            <?php endif; ?>
                            <?php echo $label; ?>
                        </span>
                        <?php if( $description ): ?>
                            <span class="label-description">
                                <?php echo $description; ?>
                            </span>
                        <?php endif; ?>
                        <div class="input-wrapper">
                            <input id="<?php echo $id; ?>" type="text" class="<?php echo $class; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
                        </div>
                    </label>
                </div>
            <?php break;
            case 'select':
                if ( is_array( $select ) && $select ){ ?>
                <div class="field-column-<?php echo $column; ?>">
                    <label for="<?php echo $id; ?>">
                        <span class="label-text">
                            <?php if( $icon ): ?>
                                <span class="iconbox"><?php echo $icon; ?></span>
                            <?php endif; ?>
                            <?php echo $label; ?>
                        </span>
                        <?php if( $description ): ?>
                            <span class="label-description">
                                <?php echo $description; ?>
                            </span>
                        <?php endif; ?>
                        <div class="input-wrapper">
                            <select class="<?php echo $class; ?>" name="<?php echo $name; ?>">
                                <?php foreach ( $select as $key => $val ): ?>
                                    <?php $selected = ( $value == $key ) ? 'selected' : ''; ?>
                                    <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </label>
                </div>
            <?php }
                break;
                case 'number': ?>
                <div class="field-column-<?php echo $column; ?>">
                    <label for="<?php echo $id; ?>">
                        <span class="label-text">
                            <?php if( $icon ): ?>
                                <span class="iconbox"><?php echo $icon; ?></span>
                            <?php endif; ?>
                            <?php echo $label; ?>
                        </span>
                        <?php if( $description ): ?>
                            <span class="label-description">
                                <?php echo $description; ?>
                            </span>
                        <?php endif; ?>
                        <div class="input-wrapper">
                            <input id="<?php echo $id; ?>" type="number" class="<?php echo $class; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
                        </div>
                    </label>
                </div>
            <?php break;
            case 'checkbox': ?>
            <div class="field-column-<?php echo $column; ?>">
                <label for="<?php echo $id; ?>">
                    <span class="label-text">
                        <?php if( $icon ): ?>
                            <span class="iconbox"><?php echo $icon; ?></span>
                        <?php endif; ?>
                        <?php echo $label; ?>
                    </span>
                    <?php if( $description ): ?>
                        <span class="label-description">
                            <?php echo $description; ?>
                        </span>
                    <?php endif; ?>
                    <div class="input-wrapper">
                        <?php $checked = ( $value == '1' ) ? 'checked' : ''; ?>
                        <input id="<?php echo $id; ?>" type="checkbox" class="<?php echo $class; ?>" name="<?php echo $name; ?>" value="1" <?php echo $checked; ?>>
                    </div>
                </label>
            </div>
        <?php break;
            case 'color': ?>
                <div class="field-column-<?php echo $column; ?>">
                    <label for="<?php echo $id; ?>">
                        <span class="label-text">
                            <?php if( $icon ): ?>
                                <span class="iconbox"><?php echo $icon; ?></span>
                            <?php endif; ?>
                            <?php echo $label; ?>
                        </span>
                        <?php if( $description ): ?>
                            <span class="label-description">
                                <?php echo $description; ?>
                            </span>
                        <?php endif; ?>
                        <div class="input-wrapper">
                            <input id="<?php echo $id; ?>" type="text" class="trigger-gol-colorpic <?php echo $class; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
                        </div>
                    </label>
                </div>
            <?php break;
            case 'color-alpha': ?>
                <div class="field-column-<?php echo $column; ?>">
                    <label for="<?php echo $id; ?>">
                        <span class="label-text">
                            <?php if( $icon ): ?>
                                <span class="iconbox"><?php echo $icon; ?></span>
                            <?php endif; ?>
                            <?php echo $label; ?>
                        </span>
                        <?php if( $description ): ?>
                            <span class="label-description">
                                <?php echo $description; ?>
                            </span>
                        <?php endif; ?>
                        <div class="input-wrapper">
                            <input id="<?php echo $id; ?>" type="text" class="trigger-gol-colorpic <?php echo $class; ?>" data-alpha="true" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
                        </div>
                    </label>
                </div>
            <?php break;
            default:
                break;
        }
    }
}
