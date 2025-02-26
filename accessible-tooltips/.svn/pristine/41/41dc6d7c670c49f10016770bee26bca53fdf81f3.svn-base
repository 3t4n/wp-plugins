import { insert, registerFormatType, toggleFormat } from '@wordpress/rich-text';
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

const MyCustomButton = props => {
    return <RichTextToolbarButton
        icon='admin-comments'
        title={__('Add tooltip', 'accessible-tooltips')}
        onClick={ () => {
          console.log(props);
          props.onChange(
            insert(
              props.value,
              '[accessible-tooltip]'+props.value.text.substring(props.value.start, props.value.end)+'[/accessible-tooltip]'
            )
          );
        } }
        isActive={ props.isActive }
    />;
};

registerFormatType(
    'accessible-tooltip-format/tooltip-output', {
        title: __('Add tooltip', 'accessible-tooltips'),
        tagName: 'none',
        className: null,
        edit: MyCustomButton,
    }
);
