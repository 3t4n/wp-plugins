import { getAttributeValueDynamic } from "../../helper/globalFunctions";


export const wrapperStyle = (attributes, attribute_name, device) => {
    return {
        backgroundColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `background_color${device}`)],
        backgroundImage: attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "gradient" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_gradient${device}`)] : attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_image${device}`)] && `url(${attributes[getAttributeValueDynamic(attributes, attribute_name, `background_image${device}`)]?.url})` : attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "video" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_bg_fallback${device}`)] && `url(${attributes[getAttributeValueDynamic(attributes, attribute_name, `background_bg_fallback${device}`)]})` : "",
        backgroundPosition: attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_image${device}`)] ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_position${device}`)] : "" : "",
        backgroundRepeat: attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_image${device}`)] ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_repeat${device}`)] : "" : "",
        backgroundSize: attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_image${device}`)] ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_size${device}`)] : "" : "",
        backgroundAttachment: attributes[getAttributeValueDynamic(attributes, attribute_name, `background_type${device}`)] === "solid" ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_image${device}`)] ? attributes[getAttributeValueDynamic(attributes, attribute_name, `background_attachment${device}`)] : "" : "", 
        marginTop: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_margin${device}`)]?.top,
        marginRight: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_margin${device}`)]?.right,
        marginBottom: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_margin${device}`)]?.bottom,
        marginLeft: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_margin${device}`)]?.left,
        paddingTop: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.top ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.top}!important` :"",
        paddingRight: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.right ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.right}!important` :"",
        paddingBottom: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.bottom ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.bottom}!important` :"",
        paddingLeft: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.left ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.left}!important` :"",
        borderTopLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.top,
        borderTopRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.right,
        borderBottomLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.bottom,
        borderBottomRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.left,
        borderStyle: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_style${device}`)],
        borderTopWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.top,
        borderRightWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.right,
        borderBottomWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.bottom,
        borderLeftWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.left,
        borderColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_color${device}`)],
        boxShadow: attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_has${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_horizontal${device}`)]}  ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_vertical${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_blur${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_spread${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_color${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_type${device}`)]}` : ""
    }
}

export const fontStyle = (attributes, attribute_name, device) => {
    return {
        fontSize: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_size${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `font_size${device}`)]} !important` : "",
        marginBottom: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_spacing${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `font_spacing${device}`)]} !important` : "",
        fontFamily: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_family${device}`)],
        fontStyle: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_style${device}`)],
        fontWeight: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_weight${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `font_weight${device}`)]} !important`:"" ,
        textTransform: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_text_transform${device}`)],
        textDecoration: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_text_decoration${device}`)],
        lineHeight: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_line_height${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `font_line_height${device}`)]} !important`:"",
        wordSpacing: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_word_spacing${device}`)],
        letterSpacing: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_letter_spacing${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `font_letter_spacing${device}`)]} !important`:"",
        WebkitTextStrokeWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_stroke_width${device}`)],
        strokeWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_stroke_width${device}`)],
        WebkitTextStrokeColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_stroke_color${device}`)],
        strokeColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_stroke_color${device}`)],
        color: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_color${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `font_color${device}`)]} !important` : "",
        mixBlendMode: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_blendmode${device}`)],
        textShadow: attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_has${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_horizontal${device}`)]}  ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_vertical${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_blur${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_color${device}`)]}` : ""
    }
}

export const buttonStyle = (attributes, attribute_name, device) => {
    return {
        backgroundColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `button_background_color${device}`)],
        paddingTop: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.top,
        paddingRight: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.right,
        paddingBottom: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.bottom,
        paddingLeft: attributes[getAttributeValueDynamic(attributes, attribute_name, `spacing_padding${device}`)]?.left,
        borderTopLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.top,
        borderTopRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.right,
        borderBottomLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.bottom,
        borderBottomRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.left,
        borderStyle: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_style${device}`)],
        borderTopWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.top,
        borderRightWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.right,
        borderBottomWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.bottom,
        borderLeftWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.left,
        borderColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_color${device}`)],
        '& .em-button-icon svg': {
            fill: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_color${device}`)],
            strokeWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_stroke_width${device}`)],
            stroke: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_stroke_color${device}`)],
        }
    }
}

export const textalign = (attributes, attribute_name, device) => {
    return {
        textAlign: attributes[getAttributeValueDynamic(attributes, attribute_name, `font_align${device}`)]
    }
}

export const imageStyle = (attributes, attribute_name, device) => {
    return {
        width: attributes[getAttributeValueDynamic(attributes, attribute_name, `media_width${device}`)],
        maxWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `media_max_width${device}`)],
        height: attributes[getAttributeValueDynamic(attributes, attribute_name, `media_height${device}`)],
        objectFit: attributes[getAttributeValueDynamic(attributes, attribute_name, `media_object_fit${device}`)],
        opacity: attributes[getAttributeValueDynamic(attributes, attribute_name, `media_opacity${device}`)],
        borderTopLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.top,
        borderTopRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.right,
        borderBottomLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.bottom,
        borderBottomRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_radius${device}`)]?.left,
        borderStyle: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_style${device}`)],
        borderTopWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.top,
        borderRightWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.right,
        borderBottomWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.bottom,
        borderLeftWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_width${device}`)]?.left,
        borderColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `border_color${device}`)],
        boxShadow: attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_has${device}`)] ? `${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_horizontal${device}`)]}  ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_vertical${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_blur${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_spread${device}`)]} ${attributes[getAttributeValueDynamic(attributes, attribute_name, `shadow_color${device}`)]}` : ""
    }
}

export const iconStyle = (attributes, attribute_name, device) => {
    return {
        fontSize: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_size${device}`)],
        color: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_color${device}`)],
        fill: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_color${device}`)],
        backgroundColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_background_color${device}`)],
        borderTopLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_radius${device}`)]?.top,
        borderTopRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_radius${device}`)]?.right,
        borderBottomLeftRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_radius${device}`)]?.bottom,
        borderBottomRightRadius: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_radius${device}`)]?.left,
        borderStyle: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_view${device}`)] === "framed" ? 'solid' : "",
        borderTopWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_border${device}`)]?.top,
        borderRightWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_border${device}`)]?.right,
        borderBottomWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_border${device}`)]?.bottom,
        borderLeftWidth: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_border${device}`)]?.left,
        borderColor: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_color${device}`)],
        paddingTop: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_view${device}`)] !== "default" && attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)] && `${attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)]}em`,
        paddingRight: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_view${device}`)] !== "default" && attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)] && `${attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)]}em`,
        paddingBottom: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_view${device}`)] !== "default" && attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)] && `${attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)]}em`,
        paddingLeft: attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_view${device}`)] !== "default" && attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)] && `${attributes[getAttributeValueDynamic(attributes, attribute_name, `icon_padding${device}`)]}em`,
    }
}