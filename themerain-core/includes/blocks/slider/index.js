const { registerBlockType } = wp.blocks;
const { createElement, useEffect, useRef, useState } = wp.element;
const { useBlockProps, BlockControls, BlockVerticalAlignmentToolbar, InspectorControls, MediaPlaceholder, MediaReplaceFlow } = wp.blockEditor;
const { PanelBody, RangeControl, ToggleControl, SelectControl } = wp.components;

registerBlockType("themerain/slider", {
  edit: function(props) {
    const { attributes: { verticalAlign, images, columns, columnsTablet, columnsMobile, space, spaceTablet, spaceMobile, loop, autoplay, center, ratio }, setAttributes, isSelected } = props;
    const hasImages = !!images.length;
    const swiperContainerRef = useRef(null);
    const [swiperKey, setSwiperKey] = useState(0);
    const blockProps = useBlockProps({
      className: verticalAlign ? `is-vertically-aligned-${verticalAlign}` : ''
    });

    useEffect(() => {
      setSwiperKey(prevKey => prevKey + 1);
    }, [images, columns, columnsTablet, columnsMobile, space, spaceTablet, spaceMobile, loop, autoplay, center]);

    const imagesList = images.map(image =>
      createElement("swiper-slide", { key: image.id },
        createElement("img", { src: image.url, alt: image.alt })
      )
    );

    const onSelectImages = function(newImages) {
      setAttributes({
        images: newImages.map(newImage => ({
          id: newImage.id,
          url: newImage.url
        }))
      });
    };

    const mediaPlaceholder = createElement(MediaPlaceholder, {
      onSelect: onSelectImages,
      allowedTypes: ["image"],
      accept: "image/*",
      multiple: "add",
      labels: {
        title: "Slider",
        instructions: "Drag images, upload new ones or select files from your library."
      }
    });

    if (!hasImages) {
      return createElement(
        "div",
        blockProps,
        mediaPlaceholder
      );
    }

    return createElement(
      "div",
      blockProps,
      createElement(
        BlockControls,
        null,
        createElement(
          BlockVerticalAlignmentToolbar, {
            value: verticalAlign,
            onChange: (value) => {
              setAttributes({ verticalAlign: value })
            }
          }
        )
      ),
      createElement(
        BlockControls,
        { group: "other" },
        createElement(
          MediaReplaceFlow, {
            onSelect: onSelectImages,
            allowedTypes: ["image"],
            accept: "image/*",
            multiple: "add",
            name: "Edit",
            mediaIds: images.filter((image) => image.id).map((image) => image.id),
            addToGallery: hasImages
          }
        )
      ),
      createElement(
        InspectorControls,
        null,
        createElement(
          PanelBody,
          { title: "Slider Settings" },
          createElement(RangeControl, {
            label: "Columns",
            value: columns,
            min: 1,
            max: 7,
            step: 0.1,
            required: true,
            onChange: function(value) {
              setAttributes({ columns: value })
            }
          }),
          createElement(RangeControl, {
            label: "Space Between",
            value: space,
            min: 0,
            required: true,
            onChange: function(value) {
              setAttributes({ space: value })
            }
          }),
          createElement(ToggleControl, {
            label: "Loop",
            checked: loop,
            onChange: function() {
              setAttributes({ loop: !loop })
            }
          }),
          createElement(ToggleControl, {
            label: "Autoplay",
            checked: autoplay,
            onChange: function() {
              setAttributes({ autoplay: !autoplay })
            }
          }),
          createElement(ToggleControl, {
            label: "Centered slides",
            checked: center,
            onChange: function() {
              setAttributes({ center: !center })
            }
          }),
          createElement(SelectControl, {
            label: "Ratio",
            value: ratio,
            options: [
              { label: "Original", value: "original" },
              { label: "Square - 1:1", value: "1/1" },
              { label: "Standard - 4:3", value: "4/3" },
              { label: "Portrait - 3:4", value: "3/4" },
              { label: "Classic - 3:2", value: "3/2" },
              { label: "Classic Portrait - 2:3", value: "2/3" },
              { label: "Wide - 16:9", value: "16/9" },
              { label: "Tall - 9:16", value: "9/16" }
            ],
            onChange: function(value) {
              setAttributes({ ratio: value })
            }
          })
        ),
        createElement(
          PanelBody,
          { title: "Table Settings", initialOpen: false },
          createElement(RangeControl, {
            label: "Columns",
            value: columnsTablet,
            min: 1,
            max: 7,
            step: 0.1,
            required: true,
            onChange: function(value) {
              setAttributes({ columnsTablet: value })
            }
          }),
          createElement(RangeControl, {
            label: "Space Between",
            value: spaceTablet,
            min: 0,
            required: true,
            onChange: function(value) {
              setAttributes({ spaceTablet: value })
            }
          }),
        ),
        createElement(
          PanelBody,
          { title: "Mobile Settings", initialOpen: false },
          createElement(RangeControl, {
            label: "Columns",
            value: columnsMobile,
            min: 1,
            max: 7,
            step: 0.1,
            required: true,
            onChange: function(value) {
              setAttributes({ columnsMobile: value })
            }
          }),
          createElement(RangeControl, {
            label: "Space Between",
            value: spaceMobile,
            min: 0,
            required: true,
            onChange: function(value) {
              setAttributes({ spaceMobile: value })
            }
          }),
        )
      ),
      createElement(
        "swiper-container",
        {
          key: swiperKey,
          ref: swiperContainerRef,
          "slides-per-view": columnsMobile,
          "space-between": spaceMobile,
          "loop": loop,
          "centered-slides": center,
          "data-ratio": ratio,
          breakpoints: '{"600": {"slidesPerView": '+columnsTablet+', "spaceBetween": '+spaceTablet+'}, "1024": {"slidesPerView": '+columns+', "spaceBetween": '+space+'}}'
        },
        imagesList
      )
    );
  }
});
