(function (blocks, blockEditor, components, element) {
    var el = element.createElement;
    var InspectorControls = blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var ToggleControl = components.ToggleControl;
    var TextControl = components.TextControl;
    var SelectControl = components.SelectControl;
    var RangeControl = components.RangeControl;
    var ColorPalette = components.ColorPalette;
    var MediaUpload = blockEditor.MediaUpload;
    var Button = components.Button;
    var RichText = blockEditor.RichText;
    var useState = element.useState;
    var useEffect = element.useEffect;

    // List of Google Fonts

    function generateGoogleFontsUrl(fonts) {
    if (!Array.isArray(fonts) || fonts.length === 0) {
        return ''; // Return an empty string if fonts are not defined
    }

    const baseUrl = 'https://fonts.googleapis.com/css2?family=';
    
    // Check if each font is a valid string before replacing
    const fontFamilies = fonts
        .filter((font) => typeof font === 'string' && font.trim().length > 0)  // Only include valid fonts
        .map((font) => font.replace(' ', '+')); // Replace spaces with '+'

    return fontFamilies.length ? baseUrl + fontFamilies.join('&family=') + '&display=swap' : ''; 
}



    const googleFonts = [
        { label: 'Roboto', value: 'Roboto' },
        { label: 'Open Sans', value: 'Open Sans' },
        { label: 'Lato', value: 'Lato' },
        { label: 'Montserrat', value: 'Montserrat' },
        { label: 'Poppins', value: 'Poppins' },
        { label: 'Raleway', value: 'Raleway' },
        { label: 'Oswald', value: 'Oswald' },
        { label: 'Nunito', value: 'Nunito' },
        { label: 'Merriweather', value: 'Merriweather' },
        { label: 'Playfair Display', value: 'Playfair Display' },
        { label: 'Ubuntu', value: 'Ubuntu' },
        { label: 'Rubik', value: 'Rubik' },
        { label: 'PT Sans', value: 'PT Sans' },
        { label: 'Noto Sans', value: 'Noto Sans' },
        { label: 'Prata', value: 'Prata' },
        { label: 'Pangolin', value: 'Pangolin' },
        { label: 'Dosis', value: 'Dosis' },
        { label: 'Grand Hotel', value: 'Grand Hotel' }
    ];

    blocks.registerBlockType("mega/slider-block", {
        title: "mega Slider Block",
        icon: "images-alt2",
        category: "layout",

        attributes: {
            slides: {
                type: 'array',
                default: []
            },
            currentSlideIndex: { type: 'number', default: 0 }, // State for current slide preview
            socialIcons: { type: 'array', default: [] },
            iconPosition: { type: 'string', default: 'vertical-middle-right' },
            iconColor: { type: 'string', default: '#ffffff' },
            iconHoverColor: { type: 'string', default: '#000000' },
            iconSize: { type: 'number', default: 24 },
            padding: { type: "object", default: { top: 20, right: 20, bottom: 20, left: 20 } },
            margin: { type: "object", default: { top: 0, right: 0, bottom: 0, left: 0 } },
            borderRadius: { type: "object", default: { topLeft: 0, topRight: 0, bottomRight: 0, bottomLeft: 0 } },
            minHeight: { type: "number", default: 300 },
            maxHeight: { type: "number", default: 600 },
            showArrows: { type: "boolean", default: true },
            showDots: { type: "boolean", default: true },
            slidesToShow: { type: "number", default: 1 },
            dotAlignment: { type: "string", default: "center" },
            layoutStyle: { type: "string", default: "full-width" },
            buttonBackgroundColor: { type: 'string', default: '#000000' },

            overlayColor: { type: 'string', default: '#000000' }, // Overlay color attribute
            overlayOpacity: { type: 'number', default: 0.5 },     // Overlay opacity attribute

            leftColumnImageBorderRadius: { type: 'number', default: 0 }, // Added border radius for left column image
            backgroundSize: { type: 'string', default: 'cover' },       // Default: cover
            backgroundPosition: { type: 'string', default: 'center' },  // Default: center
            backgroundRepeat: { type: 'string', default: 'no-repeat' }, // Default: no-repeat
			
			buttonHoverColor: { type: 'string', default: '#ffffff' }, // Default hover color for the button
			
			particlesEnabled: { type: 'boolean', default: false },  // Enable/disable particles
			particleType: { type: 'string', default: 'default' },    // Particle type (e.g., snow, bubbles, etc.)
			
			animation: { type: 'string', default: 'none' },  // Animation attribute
			animationDelay: { type: 'number', default: 0 }, // Delay in seconds
			
			subheadAnimation: { type: 'string', default: 'none' }, // Subhead animation
    subheadAnimationDelay: { type: 'number', default: 0 }, // Subhead animation delay
    
    headingAnimation: { type: 'string', default: 'none' }, // Heading animation
    headingAnimationDelay: { type: 'number', default: 0 }, // Heading animation delay
    
    contentAnimation: { type: 'string', default: 'none' }, // Content (paragraph) animation
    contentAnimationDelay: { type: 'number', default: 0 }, // Content (paragraph) animation delay



        },

        edit: function (props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;
            const [currentSlideIndex, setCurrentSlideIndex] = useState(0); // State for current slide index

            // Initialize default slide if no slides exist
            useEffect(() => {
                if (!attributes.slides.length) {
                    setAttributes({
                        slides: [
                            {
                                subhead: "Revolution in block slider",
                                heading: "Mega Gutenberg Slider 2024",
                                content: "Lorem ipsum is simply dummy text of the printing and typesetting industry.",
                                buttonText: "Read More",
                                buttonUrl: "#iwd",
                                buttonBackgroundColor: "#000000",
                                buttonFontColor: "#ffffff",
                                buttonBorderRadius: 4,
                                buttonBorderColor: "#ffc000",
                                buttonBorderSize: 2,
                                backgroundImage: "",
                                backgroundSize: attributes.backgroundSize, // Apply background size
                                backgroundPosition: attributes.backgroundPosition, // Apply background position
                                backgroundRepeat: attributes.backgroundRepeat, // Apply background repeat
                                backgroundColor: "#000000",
                                customVideoUrl: "",
                                youtubeVideoUrl: "",
                                vimeoVideoUrl: "",
                                contentAlignment: "left",
                                layoutType: "full-width",
                                leftColumnImage: "",
                                leftColumnImageWidth: "100%",
                                leftColumnImageHeight: "auto",
                                leftColumnImageBorderRadius: 0, // Default border radius for left column image
                                isSwitchedLayout: false,
                                subheadFontFamily: 'Roboto',
                                subheadFontSize: 18,
                                subheadFontColor: '#a3a3a3',
                                subheadFontWeight: '400',
                                headingFontFamily: 'Roboto',
                                headingFontSize: 32,
                                headingFontColor: '#a3a3a3',
                                headingFontWeight: '700',
                                contentFontFamily: 'Roboto',
                                contentFontSize: 12,
                                contentFontColor: '#a3a3a3',
                                contentFontWeight: '400',
								
								
                            }
                        ]
                    });
                }
            }, []);

            // Add useEffect to track background image changes and force a rerender
           useEffect(() => {
    // Update attributes related to background settings
    setAttributes({
        backgroundSize: attributes.backgroundSize,
        backgroundPosition: attributes.backgroundPosition,
        backgroundRepeat: attributes.backgroundRepeat,
    });

    // Get all selected fonts from slides (e.g., headingFontFamily, contentFontFamily)
    const selectedFonts = attributes.slides.flatMap(slide => [slide.headingFontFamily, slide.contentFontFamily, slide.subheadFontFamily]);


    // Remove duplicates and generate the Google Fonts URL
    const uniqueFonts = [...new Set(selectedFonts)];
    const fontsUrl = generateGoogleFontsUrl(uniqueFonts);

    // Dynamically load the Google Fonts stylesheet
    const link = document.createElement('link');
    link.href = fontsUrl;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    document.head.appendChild(link);

    // Clean up the previous link when the component unmounts or updates
    return () => {
        document.head.removeChild(link);
    };
}, [
    attributes.backgroundSize,
    attributes.backgroundPosition,
    attributes.backgroundRepeat,
    attributes.slides // Adding slides to the dependency array to update when fonts are changed
]);


            // Function to update slide attributes
            function updateSlideAttribute(index, attribute, value) {
                const newSlides = [...attributes.slides];
                newSlides[index][attribute] = value;
                setAttributes({ slides: newSlides });
            }

            // Function to update global social icons
            function updateSocialIcons(icons) {
                setAttributes({ socialIcons: icons });
            }

            // Function to add a new social icon
            function addNewSocialIcon() {
                const newIcons = [...attributes.socialIcons];
                newIcons.push({ icon: 'fab fa-facebook-f', url: '' });
                setAttributes({ socialIcons: newIcons });
            }

            // Function to remove a social icon
            function removeSocialIcon(iconIndex) {
                const newIcons = [...attributes.socialIcons];
                newIcons.splice(iconIndex, 1);
                setAttributes({ socialIcons: newIcons });
            }

            // Function to add a new slide
            function addNewSlide() {
                const newSlides = [
                    ...attributes.slides,
                    {
                        subhead: "New Subhead",
                        heading: "New Heading",
                        content: "New Content",
                        buttonText: "Read More",
                        buttonUrl: "#",
                        buttonBackgroundColor: "#ffffff",
                        buttonFontColor: "#000000",
                        buttonBorderRadius: 4,
                        buttonBorderColor: "#ffffff",
                        buttonBorderSize: 2,
                        backgroundImage: "",
                        backgroundColor: "#000000",
                        customVideoUrl: "",
                        youtubeVideoUrl: "",
                        vimeoVideoUrl: "",
                        contentAlignment: "left",
                        layoutType: "full-width",
                        leftColumnImage: "",
                        leftColumnImageWidth: "100%",
                        leftColumnImageHeight: "auto",
                        isSwitchedLayout: false,
                    },
                ];
                setAttributes({ slides: newSlides });
            }

            // Function to delete a slide
            function deleteSlide(index) {
                if (attributes.slides.length === 1) {
                    alert("You must have at least one slide.");
                    return;
                }
                const newSlides = attributes.slides.filter((slide, i) => i !== index);
                setAttributes({ slides: newSlides });
            }
            // Function to navigate to the next slide
            function nextSlide() {
                if (currentSlideIndex < attributes.slides.length - 1) {
                    setCurrentSlideIndex(currentSlideIndex + 1);
                }
            }

            // Function to navigate to the previous slide
            function prevSlide() {
                if (currentSlideIndex > 0) {
                    setCurrentSlideIndex(currentSlideIndex - 1);
                }
            }

            return [
                // Inspector Controls: Display settings for all slides



                el(
                    InspectorControls,
                    {},
                    attributes.slides.map((slide, index) =>
                        el(
                            PanelBody,
                            { title: `Slide ${index + 1} Settings`, key: index },
                            el(TextControl, {
                                label: "Subhead",
                                value: slide.subhead,
                                onChange: (value) => updateSlideAttribute(index, "subhead", value),
                            }),
							
							el(SelectControl, {
            label: "Slide Animation",
            value: slide.animation,
            options: [
        // Attention Seekers
        { label: 'None', value: 'none' },
        { label: 'Bounce', value: 'bounce' },
        { label: 'Flash', value: 'flash' },
        { label: 'Pulse', value: 'pulse' },
        { label: 'Rubber Band', value: 'rubberBand' },
        { label: 'Shake X', value: 'shakeX' },
        { label: 'Shake Y', value: 'shakeY' },
        { label: 'Head Shake', value: 'headShake' },
        { label: 'Swing', value: 'swing' },
        { label: 'Tada', value: 'tada' },
        { label: 'Wobble', value: 'wobble' },
        { label: 'Jello', value: 'jello' },
        { label: 'Heart Beat', value: 'heartBeat' },
        
        // Back Entrances
        { label: 'Back In Down', value: 'backInDown' },
        { label: 'Back In Left', value: 'backInLeft' },
        { label: 'Back In Right', value: 'backInRight' },
        { label: 'Back In Up', value: 'backInUp' },

        // Back Exits
        { label: 'Back Out Down', value: 'backOutDown' },
        { label: 'Back Out Left', value: 'backOutLeft' },
        { label: 'Back Out Right', value: 'backOutRight' },
        { label: 'Back Out Up', value: 'backOutUp' },

        // Bouncing Entrances
        { label: 'Bounce In', value: 'bounceIn' },
        { label: 'Bounce In Down', value: 'bounceInDown' },
        { label: 'Bounce In Left', value: 'bounceInLeft' },
        { label: 'Bounce In Right', value: 'bounceInRight' },
        { label: 'Bounce In Up', value: 'bounceInUp' },

        // Bouncing Exits
        { label: 'Bounce Out', value: 'bounceOut' },
        { label: 'Bounce Out Down', value: 'bounceOutDown' },
        { label: 'Bounce Out Left', value: 'bounceOutLeft' },
        { label: 'Bounce Out Right', value: 'bounceOutRight' },
        { label: 'Bounce Out Up', value: 'bounceOutUp' },

        // Fading Entrances
        { label: 'Fade In', value: 'fadeIn' },
        { label: 'Fade In Down', value: 'fadeInDown' },
        { label: 'Fade In Down Big', value: 'fadeInDownBig' },
        { label: 'Fade In Left', value: 'fadeInLeft' },
        { label: 'Fade In Left Big', value: 'fadeInLeftBig' },
        { label: 'Fade In Right', value: 'fadeInRight' },
        { label: 'Fade In Right Big', value: 'fadeInRightBig' },
        { label: 'Fade In Up', value: 'fadeInUp' },
        { label: 'Fade In Up Big', value: 'fadeInUpBig' },

        // Fading Exits
        { label: 'Fade Out', value: 'fadeOut' },
        { label: 'Fade Out Down', value: 'fadeOutDown' },
        { label: 'Fade Out Down Big', value: 'fadeOutDownBig' },
        { label: 'Fade Out Left', value: 'fadeOutLeft' },
        { label: 'Fade Out Left Big', value: 'fadeOutLeftBig' },
        { label: 'Fade Out Right', value: 'fadeOutRight' },
        { label: 'Fade Out Right Big', value: 'fadeOutRightBig' },
        { label: 'Fade Out Up', value: 'fadeOutUp' },
        { label: 'Fade Out Up Big', value: 'fadeOutUpBig' },

        // Flippers
        { label: 'Flip', value: 'flip' },
        { label: 'Flip In X', value: 'flipInX' },
        { label: 'Flip In Y', value: 'flipInY' },
        { label: 'Flip Out X', value: 'flipOutX' },
        { label: 'Flip Out Y', value: 'flipOutY' },

        // Light Speed
        { label: 'Light Speed In Right', value: 'lightSpeedInRight' },
        { label: 'Light Speed In Left', value: 'lightSpeedInLeft' },
        { label: 'Light Speed Out Right', value: 'lightSpeedOutRight' },
        { label: 'Light Speed Out Left', value: 'lightSpeedOutLeft' },

        // Rotating Entrances
        { label: 'Rotate In', value: 'rotateIn' },
        { label: 'Rotate In Down Left', value: 'rotateInDownLeft' },
        { label: 'Rotate In Down Right', value: 'rotateInDownRight' },
        { label: 'Rotate In Up Left', value: 'rotateInUpLeft' },
        { label: 'Rotate In Up Right', value: 'rotateInUpRight' },

        // Rotating Exits
        { label: 'Rotate Out', value: 'rotateOut' },
        { label: 'Rotate Out Down Left', value: 'rotateOutDownLeft' },
        { label: 'Rotate Out Down Right', value: 'rotateOutDownRight' },
        { label: 'Rotate Out Up Left', value: 'rotateOutUpLeft' },
        { label: 'Rotate Out Up Right', value: 'rotateOutUpRight' },

        // Sliding Entrances
        { label: 'Slide In Up', value: 'slideInUp' },
        { label: 'Slide In Down', value: 'slideInDown' },
        { label: 'Slide In Left', value: 'slideInLeft' },
        { label: 'Slide In Right', value: 'slideInRight' },

        // Sliding Exits
        { label: 'Slide Out Up', value: 'slideOutUp' },
        { label: 'Slide Out Down', value: 'slideOutDown' },
        { label: 'Slide Out Left', value: 'slideOutLeft' },
        { label: 'Slide Out Right', value: 'slideOutRight' },

        // Zoom Entrances
        { label: 'Zoom In', value: 'zoomIn' },
        { label: 'Zoom In Down', value: 'zoomInDown' },
        { label: 'Zoom In Left', value: 'zoomInLeft' },
        { label: 'Zoom In Right', value: 'zoomInRight' },
        { label: 'Zoom In Up', value: 'zoomInUp' },

        // Zoom Exits
        { label: 'Zoom Out', value: 'zoomOut' },
        { label: 'Zoom Out Down', value: 'zoomOutDown' },
        { label: 'Zoom Out Left', value: 'zoomOutLeft' },
        { label: 'Zoom Out Right', value: 'zoomOutRight' },
        { label: 'Zoom Out Up', value: 'zoomOutUp' },

        // Specials
        { label: 'Hinge', value: 'hinge' },
        { label: 'Jack In The Box', value: 'jackInTheBox' },
        { label: 'Roll In', value: 'rollIn' },
        { label: 'Roll Out', value: 'rollOut' }
    ],
            onChange: (value) => updateSlideAttribute(index, "animation", value),
        }),
		
		el(RangeControl, {
    label: "Animation Delay (seconds)",
    value: slide.animationDelay,
    onChange: (value) => updateSlideAttribute(index, "animationDelay", value),
    min: 0,
    max: 10,
    step: 0.1 // Allows fine-grained control for delays like 0.5 seconds
}),

                            el(SelectControl, {
                                label: "Subhead Font Family",
                                value: slide.subheadFontFamily,
                                options: googleFonts,
                                onChange: (value) => updateSlideAttribute(index, "subheadFontFamily", value),
                            }),
                            el(RangeControl, {
                                label: "Subhead Font Size",
                                value: slide.subheadFontSize,
                                onChange: (value) => updateSlideAttribute(index, "subheadFontSize", value),
                                min: 10,
                                max: 100,
                            }),
                            el('p', {}, "Subhead Font Color"),
                            el(ColorPalette, {
                                label: "Subhead Font Color",
                                value: slide.subheadFontColor,
                                onChange: (value) => updateSlideAttribute(index, "subheadFontColor", value),
                            }),
                            el(SelectControl, {
                                label: "Subhead Font Weight",
                                value: slide.subheadFontWeight,
                                options: [
                                    { label: '100', value: '100' },
                                    { label: '200', value: '200' },
                                    { label: '300', value: '300' },
                                    { label: '400', value: '400' },
                                    { label: '500', value: '500' },
                                    { label: '600', value: '600' },
                                    { label: '700', value: '700' },
                                    { label: '800', value: '800' },
                                ],
                                onChange: (value) => updateSlideAttribute(index, "subheadFontWeight", value),
                            }),
							
							// Subhead Animation Control
el(SelectControl, {
    label: "Subhead Animation",
    value: slide.subheadAnimation,
    options: [
        // Attention Seekers
        { label: 'None', value: 'none' },
        { label: 'Bounce', value: 'bounce' },
        { label: 'Flash', value: 'flash' },
        { label: 'Pulse', value: 'pulse' },
        { label: 'Rubber Band', value: 'rubberBand' },
        { label: 'Shake X', value: 'shakeX' },
        { label: 'Shake Y', value: 'shakeY' },
        { label: 'Head Shake', value: 'headShake' },
        { label: 'Swing', value: 'swing' },
        { label: 'Tada', value: 'tada' },
        { label: 'Wobble', value: 'wobble' },
        { label: 'Jello', value: 'jello' },
        { label: 'Heart Beat', value: 'heartBeat' },
        
        // Back Entrances
        { label: 'Back In Down', value: 'backInDown' },
        { label: 'Back In Left', value: 'backInLeft' },
        { label: 'Back In Right', value: 'backInRight' },
        { label: 'Back In Up', value: 'backInUp' },

        // Back Exits
        { label: 'Back Out Down', value: 'backOutDown' },
        { label: 'Back Out Left', value: 'backOutLeft' },
        { label: 'Back Out Right', value: 'backOutRight' },
        { label: 'Back Out Up', value: 'backOutUp' },

        // Bouncing Entrances
        { label: 'Bounce In', value: 'bounceIn' },
        { label: 'Bounce In Down', value: 'bounceInDown' },
        { label: 'Bounce In Left', value: 'bounceInLeft' },
        { label: 'Bounce In Right', value: 'bounceInRight' },
        { label: 'Bounce In Up', value: 'bounceInUp' },

        // Bouncing Exits
        { label: 'Bounce Out', value: 'bounceOut' },
        { label: 'Bounce Out Down', value: 'bounceOutDown' },
        { label: 'Bounce Out Left', value: 'bounceOutLeft' },
        { label: 'Bounce Out Right', value: 'bounceOutRight' },
        { label: 'Bounce Out Up', value: 'bounceOutUp' },

        // Fading Entrances
        { label: 'Fade In', value: 'fadeIn' },
        { label: 'Fade In Down', value: 'fadeInDown' },
        { label: 'Fade In Down Big', value: 'fadeInDownBig' },
        { label: 'Fade In Left', value: 'fadeInLeft' },
        { label: 'Fade In Left Big', value: 'fadeInLeftBig' },
        { label: 'Fade In Right', value: 'fadeInRight' },
        { label: 'Fade In Right Big', value: 'fadeInRightBig' },
        { label: 'Fade In Up', value: 'fadeInUp' },
        { label: 'Fade In Up Big', value: 'fadeInUpBig' },

        // Fading Exits
        { label: 'Fade Out', value: 'fadeOut' },
        { label: 'Fade Out Down', value: 'fadeOutDown' },
        { label: 'Fade Out Down Big', value: 'fadeOutDownBig' },
        { label: 'Fade Out Left', value: 'fadeOutLeft' },
        { label: 'Fade Out Left Big', value: 'fadeOutLeftBig' },
        { label: 'Fade Out Right', value: 'fadeOutRight' },
        { label: 'Fade Out Right Big', value: 'fadeOutRightBig' },
        { label: 'Fade Out Up', value: 'fadeOutUp' },
        { label: 'Fade Out Up Big', value: 'fadeOutUpBig' },

        // Flippers
        { label: 'Flip', value: 'flip' },
        { label: 'Flip In X', value: 'flipInX' },
        { label: 'Flip In Y', value: 'flipInY' },
        { label: 'Flip Out X', value: 'flipOutX' },
        { label: 'Flip Out Y', value: 'flipOutY' },

        // Light Speed
        { label: 'Light Speed In Right', value: 'lightSpeedInRight' },
        { label: 'Light Speed In Left', value: 'lightSpeedInLeft' },
        { label: 'Light Speed Out Right', value: 'lightSpeedOutRight' },
        { label: 'Light Speed Out Left', value: 'lightSpeedOutLeft' },

        // Rotating Entrances
        { label: 'Rotate In', value: 'rotateIn' },
        { label: 'Rotate In Down Left', value: 'rotateInDownLeft' },
        { label: 'Rotate In Down Right', value: 'rotateInDownRight' },
        { label: 'Rotate In Up Left', value: 'rotateInUpLeft' },
        { label: 'Rotate In Up Right', value: 'rotateInUpRight' },

        // Rotating Exits
        { label: 'Rotate Out', value: 'rotateOut' },
        { label: 'Rotate Out Down Left', value: 'rotateOutDownLeft' },
        { label: 'Rotate Out Down Right', value: 'rotateOutDownRight' },
        { label: 'Rotate Out Up Left', value: 'rotateOutUpLeft' },
        { label: 'Rotate Out Up Right', value: 'rotateOutUpRight' },

        // Sliding Entrances
        { label: 'Slide In Up', value: 'slideInUp' },
        { label: 'Slide In Down', value: 'slideInDown' },
        { label: 'Slide In Left', value: 'slideInLeft' },
        { label: 'Slide In Right', value: 'slideInRight' },

        // Sliding Exits
        { label: 'Slide Out Up', value: 'slideOutUp' },
        { label: 'Slide Out Down', value: 'slideOutDown' },
        { label: 'Slide Out Left', value: 'slideOutLeft' },
        { label: 'Slide Out Right', value: 'slideOutRight' },

        // Zoom Entrances
        { label: 'Zoom In', value: 'zoomIn' },
        { label: 'Zoom In Down', value: 'zoomInDown' },
        { label: 'Zoom In Left', value: 'zoomInLeft' },
        { label: 'Zoom In Right', value: 'zoomInRight' },
        { label: 'Zoom In Up', value: 'zoomInUp' },

        // Zoom Exits
        { label: 'Zoom Out', value: 'zoomOut' },
        { label: 'Zoom Out Down', value: 'zoomOutDown' },
        { label: 'Zoom Out Left', value: 'zoomOutLeft' },
        { label: 'Zoom Out Right', value: 'zoomOutRight' },
        { label: 'Zoom Out Up', value: 'zoomOutUp' },

        // Specials
        { label: 'Hinge', value: 'hinge' },
        { label: 'Jack In The Box', value: 'jackInTheBox' },
        { label: 'Roll In', value: 'rollIn' },
        { label: 'Roll Out', value: 'rollOut' }
    ],
    onChange: (value) => updateSlideAttribute(index, "subheadAnimation", value),
}),
el(RangeControl, {
    label: "Subhead Animation Delay (seconds)",
    value: slide.subheadAnimationDelay,
    onChange: (value) => updateSlideAttribute(index, "subheadAnimationDelay", value),
    min: 0,
    max: 10,
    step: 0.1
}),

                         el(RichText, {
    tagName: "h1",
    value: slide.heading,
    onChange: (value) => updateSlideAttribute(index, "heading", value),
    placeholder: "Add your heading here...",
    className: `animate__animated animate__${slide.headingAnimation}`, // Add animation class for heading
    style: {
        fontFamily: slide.headingFontFamily,  // Applying the dynamic font
        fontSize: `${slide.headingFontSize}px`, // Dynamic font size
        color: slide.headingFontColor,        // Dynamic font color
        animationDelay: `${slide.headingAnimationDelay}s`, // Apply animation delay for heading
    }
}),




                            /* Other slide controls */
                            el(SelectControl, {
                                label: "Heading Font Family",
                                value: slide.headingFontFamily,
                                options: googleFonts,
                                onChange: (value) => updateSlideAttribute(index, "headingFontFamily", value),
                            }),
                            el(RangeControl, {
                                label: "Heading Font Size",
                                value: slide.headingFontSize,
                                onChange: (value) => updateSlideAttribute(index, "headingFontSize", value),
                                min: 10,
                                max: 100,
                            }),
                            el('p', {}, "Heading Font Color"),
                            el(ColorPalette, {
                                label: "Heading Font Color",
                                value: slide.headingFontColor,
                                onChange: (value) => updateSlideAttribute(index, "headingFontColor", value),
                            }),
                            el(SelectControl, {
                                label: "Heading Font Weight",
                                value: slide.headingFontWeight,
                                options: [
                                    { label: '100', value: '100' },
                                    { label: '200', value: '200' },
                                    { label: '300', value: '300' },
                                    { label: '400', value: '400' },
                                    { label: '500', value: '500' },
                                    { label: '600', value: '600' },
                                    { label: '700', value: '700' },
                                    { label: '800', value: '800' },
                                ],
                                onChange: (value) => updateSlideAttribute(index, "headingFontWeight", value),
                            }),
							
							el(SelectControl, {
    label: "Heading Animation",
    value: slide.headingAnimation,
    options: [
        // Attention Seekers
        { label: 'None', value: 'none' },
        { label: 'Bounce', value: 'bounce' },
        { label: 'Flash', value: 'flash' },
        { label: 'Pulse', value: 'pulse' },
        { label: 'Rubber Band', value: 'rubberBand' },
        { label: 'Shake X', value: 'shakeX' },
        { label: 'Shake Y', value: 'shakeY' },
        { label: 'Head Shake', value: 'headShake' },
        { label: 'Swing', value: 'swing' },
        { label: 'Tada', value: 'tada' },
        { label: 'Wobble', value: 'wobble' },
        { label: 'Jello', value: 'jello' },
        { label: 'Heart Beat', value: 'heartBeat' },
        
        // Back Entrances
        { label: 'Back In Down', value: 'backInDown' },
        { label: 'Back In Left', value: 'backInLeft' },
        { label: 'Back In Right', value: 'backInRight' },
        { label: 'Back In Up', value: 'backInUp' },

        // Back Exits
        { label: 'Back Out Down', value: 'backOutDown' },
        { label: 'Back Out Left', value: 'backOutLeft' },
        { label: 'Back Out Right', value: 'backOutRight' },
        { label: 'Back Out Up', value: 'backOutUp' },

        // Bouncing Entrances
        { label: 'Bounce In', value: 'bounceIn' },
        { label: 'Bounce In Down', value: 'bounceInDown' },
        { label: 'Bounce In Left', value: 'bounceInLeft' },
        { label: 'Bounce In Right', value: 'bounceInRight' },
        { label: 'Bounce In Up', value: 'bounceInUp' },

        // Bouncing Exits
        { label: 'Bounce Out', value: 'bounceOut' },
        { label: 'Bounce Out Down', value: 'bounceOutDown' },
        { label: 'Bounce Out Left', value: 'bounceOutLeft' },
        { label: 'Bounce Out Right', value: 'bounceOutRight' },
        { label: 'Bounce Out Up', value: 'bounceOutUp' },

        // Fading Entrances
        { label: 'Fade In', value: 'fadeIn' },
        { label: 'Fade In Down', value: 'fadeInDown' },
        { label: 'Fade In Down Big', value: 'fadeInDownBig' },
        { label: 'Fade In Left', value: 'fadeInLeft' },
        { label: 'Fade In Left Big', value: 'fadeInLeftBig' },
        { label: 'Fade In Right', value: 'fadeInRight' },
        { label: 'Fade In Right Big', value: 'fadeInRightBig' },
        { label: 'Fade In Up', value: 'fadeInUp' },
        { label: 'Fade In Up Big', value: 'fadeInUpBig' },

        // Fading Exits
        { label: 'Fade Out', value: 'fadeOut' },
        { label: 'Fade Out Down', value: 'fadeOutDown' },
        { label: 'Fade Out Down Big', value: 'fadeOutDownBig' },
        { label: 'Fade Out Left', value: 'fadeOutLeft' },
        { label: 'Fade Out Left Big', value: 'fadeOutLeftBig' },
        { label: 'Fade Out Right', value: 'fadeOutRight' },
        { label: 'Fade Out Right Big', value: 'fadeOutRightBig' },
        { label: 'Fade Out Up', value: 'fadeOutUp' },
        { label: 'Fade Out Up Big', value: 'fadeOutUpBig' },

        // Flippers
        { label: 'Flip', value: 'flip' },
        { label: 'Flip In X', value: 'flipInX' },
        { label: 'Flip In Y', value: 'flipInY' },
        { label: 'Flip Out X', value: 'flipOutX' },
        { label: 'Flip Out Y', value: 'flipOutY' },

        // Light Speed
        { label: 'Light Speed In Right', value: 'lightSpeedInRight' },
        { label: 'Light Speed In Left', value: 'lightSpeedInLeft' },
        { label: 'Light Speed Out Right', value: 'lightSpeedOutRight' },
        { label: 'Light Speed Out Left', value: 'lightSpeedOutLeft' },

        // Rotating Entrances
        { label: 'Rotate In', value: 'rotateIn' },
        { label: 'Rotate In Down Left', value: 'rotateInDownLeft' },
        { label: 'Rotate In Down Right', value: 'rotateInDownRight' },
        { label: 'Rotate In Up Left', value: 'rotateInUpLeft' },
        { label: 'Rotate In Up Right', value: 'rotateInUpRight' },

        // Rotating Exits
        { label: 'Rotate Out', value: 'rotateOut' },
        { label: 'Rotate Out Down Left', value: 'rotateOutDownLeft' },
        { label: 'Rotate Out Down Right', value: 'rotateOutDownRight' },
        { label: 'Rotate Out Up Left', value: 'rotateOutUpLeft' },
        { label: 'Rotate Out Up Right', value: 'rotateOutUpRight' },

        // Sliding Entrances
        { label: 'Slide In Up', value: 'slideInUp' },
        { label: 'Slide In Down', value: 'slideInDown' },
        { label: 'Slide In Left', value: 'slideInLeft' },
        { label: 'Slide In Right', value: 'slideInRight' },

        // Sliding Exits
        { label: 'Slide Out Up', value: 'slideOutUp' },
        { label: 'Slide Out Down', value: 'slideOutDown' },
        { label: 'Slide Out Left', value: 'slideOutLeft' },
        { label: 'Slide Out Right', value: 'slideOutRight' },

        // Zoom Entrances
        { label: 'Zoom In', value: 'zoomIn' },
        { label: 'Zoom In Down', value: 'zoomInDown' },
        { label: 'Zoom In Left', value: 'zoomInLeft' },
        { label: 'Zoom In Right', value: 'zoomInRight' },
        { label: 'Zoom In Up', value: 'zoomInUp' },

        // Zoom Exits
        { label: 'Zoom Out', value: 'zoomOut' },
        { label: 'Zoom Out Down', value: 'zoomOutDown' },
        { label: 'Zoom Out Left', value: 'zoomOutLeft' },
        { label: 'Zoom Out Right', value: 'zoomOutRight' },
        { label: 'Zoom Out Up', value: 'zoomOutUp' },

        // Specials
        { label: 'Hinge', value: 'hinge' },
        { label: 'Jack In The Box', value: 'jackInTheBox' },
        { label: 'Roll In', value: 'rollIn' },
        { label: 'Roll Out', value: 'rollOut' }
    ],
    onChange: (value) => updateSlideAttribute(index, "headingAnimation", value),
}),
el(RangeControl, {
    label: "Heading Animation Delay (seconds)",
    value: slide.headingAnimationDelay,
    onChange: (value) => updateSlideAttribute(index, "headingAnimationDelay", value),
    min: 0,
    max: 10,
    step: 0.1
}),

                           el(RichText, {
    tagName: "h4",
    value: slide.content,
    onChange: (value) => updateSlideAttribute(index, "content", value),
    placeholder: "Add your content here...",
    className: `animate__animated animate__${slide.contentAnimation}`, // Add animation class for content
    style: {
        fontFamily: slide.contentFontFamily,     // Applying the dynamic font
        fontSize: `${slide.contentFontSize}px`,  // Dynamic font size
        color: slide.contentFontColor,           // Dynamic font color
        animationDelay: `${slide.contentAnimationDelay}s`, // Apply animation delay for content
    }
}),
                            el(SelectControl, {
                                label: "Content Font Family",
                                value: slide.contentFontFamily,
                                options: googleFonts,
                                onChange: (value) => updateSlideAttribute(index, "contentFontFamily", value),
                            }),
                            el(RangeControl, {
                                label: "Content Font Size",
                                value: slide.contentFontSize,
                                onChange: (value) => updateSlideAttribute(index, "contentFontSize", value),
                                min: 10,
                                max: 100,
                            }),
                            el('p', {}, "Content Font Color"),

                            el(ColorPalette, {
                                label: "Content Font Color",
                                value: slide.contentFontColor,
                                onChange: (value) => updateSlideAttribute(index, "contentFontColor", value),
                            }),
                            el(SelectControl, {
                                label: "Content Font Weight",
                                value: slide.contentFontWeight,
                                options: [
                                    { label: '100', value: '100' },
                                    { label: '200', value: '200' },
                                    { label: '300', value: '300' },
                                    { label: '400', value: '400' },
                                    { label: '500', value: '500' },
                                    { label: '600', value: '600' },
                                    { label: '700', value: '700' },
                                    { label: '800', value: '800' },
                                ],
                                onChange: (value) => updateSlideAttribute(index, "contentFontWeight", value),
                            }),
							
							el(SelectControl, {
    label: "Content Animation",
    value: slide.contentAnimation,
    options: [
        // Attention Seekers
        { label: 'None', value: 'none' },
        { label: 'Bounce', value: 'bounce' },
        { label: 'Flash', value: 'flash' },
        { label: 'Pulse', value: 'pulse' },
        { label: 'Rubber Band', value: 'rubberBand' },
        { label: 'Shake X', value: 'shakeX' },
        { label: 'Shake Y', value: 'shakeY' },
        { label: 'Head Shake', value: 'headShake' },
        { label: 'Swing', value: 'swing' },
        { label: 'Tada', value: 'tada' },
        { label: 'Wobble', value: 'wobble' },
        { label: 'Jello', value: 'jello' },
        { label: 'Heart Beat', value: 'heartBeat' },
        
        // Back Entrances
        { label: 'Back In Down', value: 'backInDown' },
        { label: 'Back In Left', value: 'backInLeft' },
        { label: 'Back In Right', value: 'backInRight' },
        { label: 'Back In Up', value: 'backInUp' },

        // Back Exits
        { label: 'Back Out Down', value: 'backOutDown' },
        { label: 'Back Out Left', value: 'backOutLeft' },
        { label: 'Back Out Right', value: 'backOutRight' },
        { label: 'Back Out Up', value: 'backOutUp' },

        // Bouncing Entrances
        { label: 'Bounce In', value: 'bounceIn' },
        { label: 'Bounce In Down', value: 'bounceInDown' },
        { label: 'Bounce In Left', value: 'bounceInLeft' },
        { label: 'Bounce In Right', value: 'bounceInRight' },
        { label: 'Bounce In Up', value: 'bounceInUp' },

        // Bouncing Exits
        { label: 'Bounce Out', value: 'bounceOut' },
        { label: 'Bounce Out Down', value: 'bounceOutDown' },
        { label: 'Bounce Out Left', value: 'bounceOutLeft' },
        { label: 'Bounce Out Right', value: 'bounceOutRight' },
        { label: 'Bounce Out Up', value: 'bounceOutUp' },

        // Fading Entrances
        { label: 'Fade In', value: 'fadeIn' },
        { label: 'Fade In Down', value: 'fadeInDown' },
        { label: 'Fade In Down Big', value: 'fadeInDownBig' },
        { label: 'Fade In Left', value: 'fadeInLeft' },
        { label: 'Fade In Left Big', value: 'fadeInLeftBig' },
        { label: 'Fade In Right', value: 'fadeInRight' },
        { label: 'Fade In Right Big', value: 'fadeInRightBig' },
        { label: 'Fade In Up', value: 'fadeInUp' },
        { label: 'Fade In Up Big', value: 'fadeInUpBig' },

        // Fading Exits
        { label: 'Fade Out', value: 'fadeOut' },
        { label: 'Fade Out Down', value: 'fadeOutDown' },
        { label: 'Fade Out Down Big', value: 'fadeOutDownBig' },
        { label: 'Fade Out Left', value: 'fadeOutLeft' },
        { label: 'Fade Out Left Big', value: 'fadeOutLeftBig' },
        { label: 'Fade Out Right', value: 'fadeOutRight' },
        { label: 'Fade Out Right Big', value: 'fadeOutRightBig' },
        { label: 'Fade Out Up', value: 'fadeOutUp' },
        { label: 'Fade Out Up Big', value: 'fadeOutUpBig' },

        // Flippers
        { label: 'Flip', value: 'flip' },
        { label: 'Flip In X', value: 'flipInX' },
        { label: 'Flip In Y', value: 'flipInY' },
        { label: 'Flip Out X', value: 'flipOutX' },
        { label: 'Flip Out Y', value: 'flipOutY' },

        // Light Speed
        { label: 'Light Speed In Right', value: 'lightSpeedInRight' },
        { label: 'Light Speed In Left', value: 'lightSpeedInLeft' },
        { label: 'Light Speed Out Right', value: 'lightSpeedOutRight' },
        { label: 'Light Speed Out Left', value: 'lightSpeedOutLeft' },

        // Rotating Entrances
        { label: 'Rotate In', value: 'rotateIn' },
        { label: 'Rotate In Down Left', value: 'rotateInDownLeft' },
        { label: 'Rotate In Down Right', value: 'rotateInDownRight' },
        { label: 'Rotate In Up Left', value: 'rotateInUpLeft' },
        { label: 'Rotate In Up Right', value: 'rotateInUpRight' },

        // Rotating Exits
        { label: 'Rotate Out', value: 'rotateOut' },
        { label: 'Rotate Out Down Left', value: 'rotateOutDownLeft' },
        { label: 'Rotate Out Down Right', value: 'rotateOutDownRight' },
        { label: 'Rotate Out Up Left', value: 'rotateOutUpLeft' },
        { label: 'Rotate Out Up Right', value: 'rotateOutUpRight' },

        // Sliding Entrances
        { label: 'Slide In Up', value: 'slideInUp' },
        { label: 'Slide In Down', value: 'slideInDown' },
        { label: 'Slide In Left', value: 'slideInLeft' },
        { label: 'Slide In Right', value: 'slideInRight' },

        // Sliding Exits
        { label: 'Slide Out Up', value: 'slideOutUp' },
        { label: 'Slide Out Down', value: 'slideOutDown' },
        { label: 'Slide Out Left', value: 'slideOutLeft' },
        { label: 'Slide Out Right', value: 'slideOutRight' },

        // Zoom Entrances
        { label: 'Zoom In', value: 'zoomIn' },
        { label: 'Zoom In Down', value: 'zoomInDown' },
        { label: 'Zoom In Left', value: 'zoomInLeft' },
        { label: 'Zoom In Right', value: 'zoomInRight' },
        { label: 'Zoom In Up', value: 'zoomInUp' },

        // Zoom Exits
        { label: 'Zoom Out', value: 'zoomOut' },
        { label: 'Zoom Out Down', value: 'zoomOutDown' },
        { label: 'Zoom Out Left', value: 'zoomOutLeft' },
        { label: 'Zoom Out Right', value: 'zoomOutRight' },
        { label: 'Zoom Out Up', value: 'zoomOutUp' },

        // Specials
        { label: 'Hinge', value: 'hinge' },
        { label: 'Jack In The Box', value: 'jackInTheBox' },
        { label: 'Roll In', value: 'rollIn' },
        { label: 'Roll Out', value: 'rollOut' }
    ],
    onChange: (value) => updateSlideAttribute(index, "contentAnimation", value),
}),
el(RangeControl, {
    label: "Content Animation Delay (seconds)",
    value: slide.contentAnimationDelay,
    onChange: (value) => updateSlideAttribute(index, "contentAnimationDelay", value),
    min: 0,
    max: 10,
    step: 0.1
}),

                            el('p', {}, "Button Background Color"),

                            el(ColorPalette, {
                                label: "Button Background Color",
                                value: slide.buttonBackgroundColor,
                                onChange: (value) => updateSlideAttribute(index, "buttonBackgroundColor", value),
                            }),
							
							el('p', {}, "Button Hover Color"),
el(ColorPalette, {
    label: "Button Hover Color",
    value: slide.buttonHoverColor,
    onChange: (value) => updateSlideAttribute(index, "buttonHoverColor", value),
}),
                            el('p', {}, "Button Font Color"),
                            el(ColorPalette, {
                                label: "Button Font Color",
                                value: slide.buttonFontColor,
                                onChange: (value) => updateSlideAttribute(index, "buttonFontColor", value),
                            }),
                            el(RangeControl, {
                                label: "Button Border Radius",
                                value: slide.buttonBorderRadius,
                                onChange: (value) => updateSlideAttribute(index, "buttonBorderRadius", value),
                                min: 0,
                                max: 50,
                            }),
                            el('p', {}, "Button Border Color"),
                            el(ColorPalette, {
                                label: "Button Border Color",
                                value: slide.buttonBorderColor,
                                onChange: (value) => updateSlideAttribute(index, "buttonBorderColor", value),
                            }),
                            el(RangeControl, {
                                label: "Button Border Size (px)",
                                value: slide.buttonBorderSize,
                                onChange: (value) => updateSlideAttribute(index, "buttonBorderSize", value),
                                min: 0,
                                max: 10,
                            }),
                            el(TextControl, {
                                label: "Button Text",
                                value: slide.buttonText,
                                onChange: (value) => updateSlideAttribute(index, "buttonText", value),
                            }),
                            el(TextControl, {
                                label: "Button URL",
                                value: slide.buttonUrl,
                                onChange: (value) => updateSlideAttribute(index, "buttonUrl", value),
                            }),
                            el(MediaUpload, {
                                onSelect: (media) => updateSlideAttribute(index, "backgroundImage", media.url),
                                allowedTypes: "image",
                                render: (obj) =>
                                    el(
                                        Button,
                                        { className: "button button-large", onClick: obj.open },
                                        !slide.backgroundImage ? "Upload Background Image" : "Change Background Image"
                                    ),
                            }),

                            el(SelectControl, {
                                label: "Background Size",
    value: attributes.slides[currentSlideIndex].backgroundSize,
                                options: [
                                    { label: "Cover", value: "cover" },
                                    { label: "Contain", value: "contain" },
                                    { label: "Auto", value: "auto" },
                                ],
    onChange: (value) => updateSlideAttribute(currentSlideIndex, "backgroundSize", value),
                            }),

                            el(SelectControl, {
                                label: "Background Position",
    value: attributes.slides[currentSlideIndex].backgroundPosition,  // Use the value from the current slide
                                options: [
                                    { label: "Center", value: "center" },
                                    { label: "Top", value: "top" },
                                    { label: "Bottom", value: "bottom" },
                                    { label: "Left", value: "left" },
                                    { label: "Right", value: "right" },
                                    { label: "Top Left", value: "top left" },
                                    { label: "Top Right", value: "top right" },
                                    { label: "Bottom Left", value: "bottom left" },
                                    { label: "Bottom Right", value: "bottom right" },
                                ],
    onChange: (value) => updateSlideAttribute(currentSlideIndex, "backgroundPosition", value),  // Update the slide-specific value
                            }),
                            el(SelectControl, {
                                label: "Background Repeat",
    value: attributes.slides[currentSlideIndex].backgroundRepeat,  // Use the value from the current slide
                                options: [
                                    { label: "No Repeat", value: "no-repeat" },
                                    { label: "Repeat", value: "repeat" },
                                    { label: "Repeat X", value: "repeat-x" },
                                    { label: "Repeat Y", value: "repeat-y" },
                                ],
    onChange: (value) => updateSlideAttribute(currentSlideIndex, "backgroundRepeat", value),  // Update the slide-specific value
                            }),
							
							el(ToggleControl, {
    label: "Enable Particle Background",
    checked: attributes.particlesEnabled,
    onChange: (value) => setAttributes({ particlesEnabled: value }),
}),
attributes.particlesEnabled &&
el(SelectControl, {
    label: "Particle Type",
    value: attributes.particleType,
    options: [
        { label: "Default", value: "default" },
        { label: "Snow", value: "snow" },
        { label: "Bubbles", value: "bubbles" },
        { label: "Stars", value: "stars" },
        { label: "Triangles", value: "triangles" },
        { label: "Confetti", value: "confetti" },
        { label: "Fireflies", value: "fireflies" },
        { label: "Hearts", value: "hearts" },
        { label: "Spirals", value: "spirals" },
        { label: "Diamonds", value: "diamonds" },
        { label: "Matrix", value: "matrix" }
    ],
    onChange: (value) => setAttributes({ particleType: value }),
}),

                            el('p', {}, "Overlay Color"),
                            el(ColorPalette, {
                                label: "Overlay Color",
                                value: attributes.overlayColor,
                                onChange: (value) => setAttributes({ overlayColor: value }),
                            }),
                            el(RangeControl, {
                                label: "Overlay Opacity",
                                value: attributes.overlayOpacity,
                                onChange: (value) => setAttributes({ overlayOpacity: value }),
                                min: 0,
                                max: 1,
                                step: 0.1
                            }),

                            slide.backgroundImage &&
                            el("img", { src: slide.backgroundImage, style: { maxWidth: "100%", marginTop: "10px" } }),
                            slide.backgroundImage &&
                            el(
                                Button,
                                {
                                    isSecondary: true,
                                    onClick: () => updateSlideAttribute(index, "backgroundImage", ""),
                                    style: { marginTop: "10px" },
                                },
                                "Remove Background Image"
                            ),

                            el(TextControl, {
                                label: 'Custom Video URL',
                                value: slide.customVideoUrl,
                                onChange: (value) => updateSlideAttribute(index, 'customVideoUrl', value)
                            }),
                            slide.customVideoUrl && el(Button, {
                                isSecondary: true,
                                onClick: () => updateSlideAttribute(index, 'customVideoUrl', ''),
                                style: { marginTop: '10px' }
                            }, 'Remove Custom Video'),
                            el(TextControl, {
                                label: 'YouTube Video URL',
                                value: slide.youtubeVideoUrl,
                                onChange: (value) => updateSlideAttribute(index, 'youtubeVideoUrl', value)
                            }),
                            slide.youtubeVideoUrl && el(Button, {
                                isSecondary: true,
                                onClick: () => updateSlideAttribute(index, 'youtubeVideoUrl', ''),
                                style: { marginTop: '10px' }
                            }, 'Remove YouTube Video'),
                            el(TextControl, {
                                label: 'Vimeo Video URL',
                                value: slide.vimeoVideoUrl,
                                onChange: (value) => updateSlideAttribute(index, 'vimeoVideoUrl', value)
                            }),
                            slide.vimeoVideoUrl && el(Button, {
                                isSecondary: true,
                                onClick: () => updateSlideAttribute(index, 'vimeoVideoUrl', ''),
                                style: { marginTop: '10px' }
                            }, 'Remove Vimeo Video'),

                            el('p', {}, "Background Color"),

                            el(ColorPalette, {
                                label: "Background Color",
                                value: slide.backgroundColor,
                                onChange: (value) => updateSlideAttribute(index, 'backgroundColor', value)
                            }),

                            el(SelectControl, {
                                label: "Content Alignment",
                                value: slide.contentAlignment,
                                options: [
                                    { label: "Left", value: "left" },
                                    { label: "Center", value: "center" },
                                    { label: "Right", value: "right" },
                                ],
                                onChange: (value) => updateSlideAttribute(index, "contentAlignment", value),
                            }),
                            el(SelectControl, {
                                label: "Layout Type",
                                value: slide.layoutType,
                                options: [
                                    { label: "Full Width", value: "full-width" },
                                    { label: "Two Column", value: "two-column" },
                                ],
                                onChange: (value) => updateSlideAttribute(index, "layoutType", value),
                            }),
                            slide.layoutType === "two-column" &&
                            el(ToggleControl, {
                                label: "Switch Column Layout",
                                checked: slide.isSwitchedLayout,
                                onChange: (value) => updateSlideAttribute(index, "isSwitchedLayout", value),
                            }),
                            slide.layoutType === "two-column" &&
                            el(MediaUpload, {
                                onSelect: (media) => updateSlideAttribute(index, "leftColumnImage", media.url),
                                allowedTypes: "image",
                                render: (obj) =>
                                    el(
                                        Button,
                                        { className: "button button-large", onClick: obj.open },
                                        !slide.leftColumnImage ? "Upload Left Column Image" : "Change Left Column Image"
                                    ),
                            }),
                            slide.leftColumnImage &&
                            slide.layoutType === "two-column" &&
                            el("img", { src: slide.leftColumnImage, style: { maxWidth: "100%", marginTop: "10px" } }),
                            slide.leftColumnImage &&
                            slide.layoutType === "two-column" &&
                            el(
                                Button,
                                {
                                    isSecondary: true,
                                    onClick: () => updateSlideAttribute(index, "leftColumnImage", ""),
                                    style: { marginTop: "10px" },
                                },
                                "Remove Left Column Image"
                            ),



                            slide.layoutType === "two-column" &&
                            el(TextControl, {
                                label: "Left Column Image Width",
                                value: slide.leftColumnImageWidth,
                                onChange: (value) => updateSlideAttribute(index, "leftColumnImageWidth", value),
                            }),
                            slide.layoutType === "two-column" &&
                            el(TextControl, {
                                label: "Left Column Image Height",
                                value: slide.leftColumnImageHeight,
                                onChange: (value) => updateSlideAttribute(index, "leftColumnImageHeight", value),
                            }),
                            slide.layoutType === "two-column" &&

                            el(RangeControl, {
                                label: "Left Column Image Border Radius",
                                value: slide.leftColumnImageBorderRadius,
                                onChange: (value) => updateSlideAttribute(index, "leftColumnImageBorderRadius", value),
                                min: 0,
                                max: 50,
                            }),

                            el(Button, {
                                isDestructive: true,
                                onClick: () => deleteSlide(index),
                                style: { marginTop: "10px" },
                            }, "Delete Slide")
                        )
                    ),
                    el(
                        PanelBody,
                        { title: "Global Slider Settings" },
                        el(ToggleControl, {
                            label: "Show Arrows",
                            checked: attributes.showArrows,
                            onChange: (value) => setAttributes({ showArrows: value }),
                        }),
                        el(ToggleControl, {
                            label: "Show Pagination Dots",
                            checked: attributes.showDots,
                            onChange: (value) => setAttributes({ showDots: value }),
                        }),
                        el(TextControl, {
                            label: "Minimum Height (px)",
                            value: attributes.minHeight,
                            onChange: (value) => setAttributes({ minHeight: parseInt(value) || 300 }),
                            placeholder: "Enter minimum height",
                        }),
                        el(SelectControl, {
                            label: "Pagination Dots Alignment",
                            value: attributes.dotAlignment,
                            options: [
                                { label: "Left", value: "left" },
                                { label: "Center", value: "center" },
                                { label: "Right", value: "right" },
                            ],
                            onChange: (value) => setAttributes({ dotAlignment: value }),
                        }),
                        el(SelectControl, {
                            label: "Layout Style (Boxed/Full Width)",
                            value: attributes.layoutStyle,
                            options: [
                                { label: "Full Width", value: "full-width" },
                                { label: "Boxed", value: "boxed" },
                            ],
                            onChange: (value) => setAttributes({ layoutStyle: value }),
                        }),

                        el('div', { className: 'control-group' },
                            el(TextControl, {
                                label: 'Padding (top, right, bottom, left)',
                                value: `${attributes.padding.top}, ${attributes.padding.right}, ${attributes.padding.bottom}, ${attributes.padding.left}`,
                                onChange: (value) => {
                                    const [top, right, bottom, left] = value.split(',').map(Number);
                                    setAttributes({ padding: { top, right, bottom, left } });
                                }
                            }),
                            el(TextControl, {
                                label: 'Margin (top, right, bottom, left)',
                                value: `${attributes.margin.top}, ${attributes.margin.right}, ${attributes.margin.bottom}, ${attributes.margin.left}`,
                                onChange: (value) => {
                                    const [top, right, bottom, left] = value.split(',').map(Number);
                                    setAttributes({ margin: { top, right, bottom, left } });
                                }
                            }),
                            el(TextControl, {
                                label: 'Border Radius (top-left, top-right, bottom-right, bottom-left)',
                                value: `${attributes.borderRadius.topLeft}, ${attributes.borderRadius.topRight}, ${attributes.borderRadius.bottomRight}, ${attributes.borderRadius.bottomLeft}`,
                                onChange: (value) => {
                                    const [topLeft, topRight, bottomRight, bottomLeft] = value.split(',').map(Number);
                                    setAttributes({ borderRadius: { topLeft, topRight, bottomRight, bottomLeft } });
                                }
                            })
                        ),

                        el("div", { className: "social-media-icons" },
                            attributes.socialIcons.map((icon, iconIndex) => el('div', { className: 'social-icon-setting', key: iconIndex },
                                el(SelectControl, {
                                    label: 'Select Icon',
                                    value: icon.icon,
                                    options: [
                                        { label: 'Facebook', value: 'fab fa-facebook-f' },
                                        { label: 'Twitter', value: 'fab fa-twitter' },
                                        { label: 'Instagram', value: 'fab fa-instagram' },
                                        { label: 'LinkedIn', value: 'fab fa-linkedin' },
                                        { label: 'YouTube', value: 'fab fa-youtube' },
                                    ],
                                    onChange: (value) => {
                                        const newIcons = [...attributes.socialIcons];
                                        newIcons[iconIndex].icon = value;
                                        updateSocialIcons(newIcons);
                                    }
                                }),
                                el(TextControl, {
                                    label: 'Icon URL',
                                    value: icon.url,
                                    onChange: (value) => {
                                        const newIcons = [...attributes.socialIcons];
                                        newIcons[iconIndex].url = value;
                                        updateSocialIcons(newIcons);
                                    }
                                }),
                                el(Button, {
                                    isDestructive: true,
                                    onClick: () => removeSocialIcon(iconIndex),
                                    style: { marginTop: '10px' }
                                }, 'Remove Icon')
                            )),
                            el(Button, {
                                isPrimary: true,
                                onClick: addNewSocialIcon,
                                style: { marginTop: '10px' }
                            }, 'Add Social Icon')
                        ),
                        el('p', {}, "Icon Color"),

                        el(ColorPalette, {
                            label: 'Icon Color',
                            value: attributes.iconColor,
                            onChange: (value) => setAttributes({ iconColor: value }),
                        }),
                        el('p', {}, "Icon Hover Color"),
                        el(ColorPalette, {
                            label: 'Icon Hover Color',
                            value: attributes.iconHoverColor,
                            onChange: (value) => setAttributes({ iconHoverColor: value }),
                        }),
                        el(RangeControl, {
                            label: 'Icon Size (px)',
                            value: attributes.iconSize,
                            onChange: (value) => setAttributes({ iconSize: value }),
                            min: 16,
                            max: 64
                        }),
                        el(SelectControl, {
                            label: "Social Icon Position",
                            value: attributes.iconPosition,
                            options: [
                                { label: "Vertical Middle Left", value: "vertical-middle-left" },
                                { label: "Vertical Middle Right", value: "vertical-middle-right" },
                                { label: "Bottom Left", value: "bottom-left" },
                                { label: "Bottom Right", value: "bottom-right" },
                            ],
                            onChange: (value) => setAttributes({ iconPosition: value }),
                        })
                    ),
                    el(Button, {
                        isPrimary: true,
                        onClick: addNewSlide,
                        style: { marginTop: "20px" },
                    }, "Add New Slide")
                ),

                // Editable content in the block editor itself with Next/Previous functionality
                el(
                    "div",
                    {
                        className: "mega-slider-block editor-slider-preview",
                        style: {
                            position: "relative",
                            overflow: "hidden",
                            minHeight: attributes.minHeight + "px",
                            maxHeight: attributes.maxHeight + "px",
                        },
                    },
                    attributes.slides.map((slide, index) =>
                        currentSlideIndex === index &&
                        el(
                            "div",
                            {
                                key: index,
								className: `slider-slide animate__animated animate__${slide.animation}`, // Apply the animation class
                                style: {
                                     position: "relative",  // Ensure relative positioning
            zIndex: 0,  // Set default z-index for background
			
			backgroundColor: slide.backgroundColor,
                                    backgroundImage: slide.backgroundImage
                                        ? `url(${slide.backgroundImage})`
                                        : "",
                                    padding: `${attributes.padding.top}px ${attributes.padding.right}px ${attributes.padding.bottom}px ${attributes.padding.left}px`,
                                    margin: `${attributes.margin.top}px ${attributes.margin.right}px ${attributes.margin.bottom}px ${attributes.margin.left}px`,
                                    borderRadius: `${attributes.borderRadius.topLeft}px ${attributes.borderRadius.topRight}px ${attributes.borderRadius.bottomRight}px ${attributes.borderRadius.bottomLeft}px`,
                                    minHeight: attributes.minHeight + "px",
                                    maxHeight: attributes.maxHeight + "px",
                                    textAlign: slide.contentAlignment,
                                    display: "flex",
                                    flexDirection: slide.isSwitchedLayout ? "row-reverse" : "row",
                                    position: "relative", // Ensure overlay is positioned correctly
                                    zIndex: 0, // Set content z-index to allow overlay to layer above

                                },
                            },
slide.youtubeVideoUrl && el(
        "div",
        {
            className: "youtube-video-wrapper",
            style: {
                position: "absolute",
                top: 0,
                left: 0,
                right: 0,
                bottom: 0,
                zIndex: -1, // Video will be behind content
                overflow: "hidden", // Ensures video doesn't overflow container
                pointerEvents: "none" // Disable interaction if it's a background
            }
        },
        el("iframe", {
            src: `https://www.youtube.com/embed/${slide.youtubeVideoUrl}?autoplay=1&mute=1&loop=1&playlist=${slide.youtubeVideoUrl}`, // Autoplay, mute, and loop params
            style: {
                width: "100%",
                height: "100%",
                pointerEvents: "none", // Disable interaction with the video
                objectFit: "cover", // Ensures the video covers the container like a background image
            },
            frameBorder: "0",
            allow: "autoplay; fullscreen",
        })
    ),
                            el("div", {
                                className: "slider-overlay",
                                style: {
                                    backgroundColor: attributes.overlayColor,
                                    opacity: attributes.overlayOpacity,
                                    position: "absolute",
                                    top: 0,
                                    left: 0,
                                    right: 0,
                                    bottom: 0,
                                    zIndex: -1, // Ensure the overlay appears above the background
                                    pointerEvents: "none", // Prevent overlay from blocking interaction
                                }
                            }),
                            slide.layoutType === "two-column"
                                ? el(
                                    "div",
                                    { className: "two-column-layout", style: { display: "flex",

flexDirection: slide.isSwitchedLayout ? "row-reverse" : "row" // Apply the direction based on isSwitchedLayout
									} },
                                    el(
                                        "div",
                                        { className: "column-1", style: { flex: "1" } },
                                        slide.leftColumnImage
                                            ? el("img", {
                                                src: slide.leftColumnImage,
                                                style: {
                                                    width: slide.leftColumnImageWidth,
                                                    height: slide.leftColumnImageHeight,
                                                    borderRadius: `${slide.leftColumnImageBorderRadius}px`,
                                                    padding: slide.leftColumnImagePadding,
                                                    objectPosition: slide.leftColumnImagePosition,
                                                },
                                            })
                                            : "",
                                        slide.customVideoUrl
                                            ? el("video", {
                                                src: slide.customVideoUrl,
                                                autoPlay: true,
                                                muted: true,
                                                loop: true,
                                                style: { width: "100%" },
                                            })
                                            : "",
                                        slide.youtubeVideoUrl
                                            ? el("iframe", {
                                                src: `https://www.youtube.com/embed/${slide.youtubeVideoUrl}`,
                                                style: { width: "100%", height: "100%" },
                                                frameBorder: "0",
                                                allow: "autoplay; fullscreen",
                                            })
                                            : "",
                                        slide.vimeoVideoUrl
                                            ? el("iframe", {
                                                src: `https://player.vimeo.com/video/${slide.vimeoVideoUrl}`,
                                                style: { width: "100%", height: "100%" },
                                                frameBorder: "0",
                                                allow: "autoplay; fullscreen",
                                            })
                                            : ""
                                    ),
                                    el(
                                        "div",
                                        { className: "column-2", style: { flex: "1", padding: "20px" } },
                                       el("h5", {
        className: `heading mb-3 animate__animated animate__${slide.subheadAnimation}`, // Add animation class for subhead
        style: {
            fontFamily: slide.subheadFontFamily,    // Applying the dynamic font family
            fontSize: `${slide.subheadFontSize}px`, // Dynamic font size
            color: slide.subheadFontColor,          // Dynamic font color
            fontWeight: slide.subheadFontWeight,    // Dynamic font weight
            animationDelay: `${slide.subheadAnimationDelay}s`, // Apply animation delay for subhead
        }
    }, slide.subhead),
                                         el(RichText, {
    tagName: "h1",
    value: slide.heading,
    onChange: (value) => updateSlideAttribute(index, "heading", value),
    placeholder: "Add your heading here...",
    className: `animate__animated animate__${slide.headingAnimation}`, // Add animation class for heading
    style: {
        fontFamily: slide.headingFontFamily,  // Applying the dynamic font
        fontSize: `${slide.headingFontSize}px`, // Dynamic font size
        color: slide.headingFontColor,        // Dynamic font color
        animationDelay: `${slide.headingAnimationDelay}s`, // Apply animation delay for heading
    }
}),


                                        el(RichText, {
    tagName: "h4",
    value: slide.content,
    onChange: (value) => updateSlideAttribute(index, "content", value),
    placeholder: "Add your content here...",
    className: `animate__animated animate__${slide.contentAnimation}`, // Add animation class for content
    style: {
        fontFamily: slide.contentFontFamily,     // Applying the dynamic font
        fontSize: `${slide.contentFontSize}px`,  // Dynamic font size
        color: slide.contentFontColor,           // Dynamic font color
        animationDelay: `${slide.contentAnimationDelay}s`, // Apply animation delay for content
    }
}),
                                        slide.buttonText && // Conditional rendering for the button
                    el("a", {
                        href: slide.buttonUrl,
                        className: "btn btn-primary",
                        style: {
                            backgroundColor: slide.buttonBackgroundColor || "#000",
                            color: slide.buttonFontColor || "#fff",
                            borderRadius: `${slide.buttonBorderRadius || 4}px`,
                            border: `${slide.buttonBorderSize || 2}px solid ${slide.buttonBorderColor || "#000"}`,
                        }
                    }, slide.buttonText)
                                    )
                                )
                                : el(
                                    "div",
                                    {
                                        className:
                                            attributes.layoutStyle === "boxed"
                                                ? "boxed-layout"
                                                : "full-width-layout",
                                    },
                                    slide.customVideoUrl
                                        ? el("video", {
                                            src: slide.customVideoUrl,
                                            autoPlay: true,
                                            muted: true,
                                            loop: true,
                                            style: { width: "100%" },
                                        })
                                        : "",
                                    slide.youtubeVideoUrl
                                        ? el("iframe", {
                                            src: `https://www.youtube.com/embed/${slide.youtubeVideoUrl}`,
                                            style: { width: "100%", height: "100%" },
                                            frameBorder: "0",
                                            allow: "autoplay; fullscreen",
                                        })
                                        : "",
                                    slide.vimeoVideoUrl
                                        ? el("iframe", {
                                            src: `https://player.vimeo.com/video/${slide.vimeoVideoUrl}`,
                                            style: { width: "100%", height: "100%" },
                                            frameBorder: "0",
                                            allow: "autoplay; fullscreen",
                                        })
                                        : "",
                                    el("h5", {
        className: `heading mb-3 animate__animated animate__${slide.subheadAnimation}`, // Add animation class for subhead
        style: {
            fontFamily: slide.subheadFontFamily,    // Applying the dynamic font family
            fontSize: `${slide.subheadFontSize}px`, // Dynamic font size
            color: slide.subheadFontColor,          // Dynamic font color
            fontWeight: slide.subheadFontWeight,    // Dynamic font weight
            animationDelay: `${slide.subheadAnimationDelay}s`, // Apply animation delay for subhead
        }
    }, slide.subhead),
                                    el(RichText, {
    tagName: "h1",
    value: slide.heading,
    onChange: (value) => updateSlideAttribute(index, "heading", value),
    placeholder: "Add your heading here...",
    className: `animate__animated animate__${slide.headingAnimation}`, // Add animation class for heading
    style: {
        fontFamily: slide.headingFontFamily,  // Applying the dynamic font
        fontSize: `${slide.headingFontSize}px`, // Dynamic font size
        color: slide.headingFontColor,        // Dynamic font color
        animationDelay: `${slide.headingAnimationDelay}s`, // Apply animation delay for heading
    }
}),


                                    el(RichText, {
    tagName: "h4",
    value: slide.content,
    onChange: (value) => updateSlideAttribute(index, "content", value),
    placeholder: "Add your content here...",
    className: `animate__animated animate__${slide.contentAnimation}`, // Add animation class for content
    style: {
        fontFamily: slide.contentFontFamily,     // Applying the dynamic font
        fontSize: `${slide.contentFontSize}px`,  // Dynamic font size
        color: slide.contentFontColor,           // Dynamic font color
        animationDelay: `${slide.contentAnimationDelay}s`, // Apply animation delay for content
    }
}),
                                   el("a", {
    href: slide.buttonUrl,
    className: "btn btn-primary",
    style: {
        backgroundColor: slide.buttonBackgroundColor || "#000",
        color: slide.buttonFontColor || "#fff",
        borderRadius: `${slide.buttonBorderRadius || 4}px`,
        border: `${slide.buttonBorderSize || 2}px solid ${slide.buttonBorderColor || "#000"}`
    },
    onMouseEnter: (e) => e.target.style.backgroundColor = slide.buttonHoverColor, // Set hover color
    onMouseLeave: (e) => e.target.style.backgroundColor = slide.buttonBackgroundColor, // Reset to original color
}, slide.buttonText)
,
                                    el('ul', { className: `social-icons ${attributes.iconPosition}` },
                                        attributes.socialIcons.map((icon, iconIndex) => el('li', { key: iconIndex },
                                            el('a', { href: icon.url, target: '_blank', style: { color: attributes.iconColor, fontSize: attributes.iconSize + 'px' }, onMouseEnter: (e) => e.target.style.color = attributes.iconHoverColor, onMouseLeave: (e) => e.target.style.color = attributes.iconColor },
                                                el('i', { className: icon.icon })
                                            )
                                        ))
                                    )
                                )
                        )
                    ),

                    // Next/Previous navigation buttons
                    el('div', { style: { textAlign: 'center', marginTop: '20px' } },
                        el(Button, { isSecondary: true, onClick: prevSlide, disabled: currentSlideIndex === 0 }, 'Previous Slide'),
                        el(Button, { isSecondary: true, onClick: nextSlide, disabled: currentSlideIndex === attributes.slides.length - 1 }, 'Next Slide')
                    )
                )
            ];
        },
       save: function (props) {
    const attributes = props.attributes;

    return el(
        "div",
        { className: "mega-slider-wrapper" },
        attributes.slides.map((slide, index) =>
            el(
                "div",
                {
                    key: index,
					className: `slider-slide animate__animated animate__${slide.animation}`, // Apply the animation class
                    style: {
						animationDelay: `${slide.animationDelay}s`, // Apply the animation delay
                        backgroundColor: slide.backgroundColor,
                        backgroundImage: slide.backgroundImage
                            ? `url(${slide.backgroundImage})`
                            : "",
                        backgroundSize: attributes.backgroundSize, // Apply background size
                        backgroundPosition: attributes.backgroundPosition, // Apply background position
                        backgroundRepeat: attributes.backgroundRepeat, // Apply background repeat
                        padding: `${attributes.padding.top}px ${attributes.padding.right}px ${attributes.padding.bottom}px ${attributes.padding.left}px`,
                        margin: `${attributes.margin.top}px ${attributes.margin.right}px ${attributes.margin.bottom}px ${attributes.margin.left}px`,
                        borderRadius: `${attributes.borderRadius.topLeft}px ${attributes.borderRadius.topRight}px ${attributes.borderRadius.bottomRight}px ${attributes.borderRadius.bottomLeft}px`,
                        minHeight: attributes.minHeight + "px",
                        maxHeight: attributes.maxHeight + "px",
                        textAlign: slide.contentAlignment,
                        display: "flex",
                        flexDirection: slide.isSwitchedLayout ? "row-reverse" : "row",
                    },
                },

                slide.layoutType === "two-column"
                    ? el(
                        "div",
                        { className: "two-column-layout", style: { display: "flex" } },
                        el(
                            "div",
                            { className: "column-1", style: { flex: "1" } },
                            slide.leftColumnImage
                                ? el("img", {
                                    src: slide.leftColumnImage,
                                    style: {
                                        width: slide.leftColumnImageWidth,
                                        height: slide.leftColumnImageHeight,
                                    },
                                })
                                : "",
                            slide.customVideoUrl
                                ? el("video", {
                                    src: slide.customVideoUrl,
                                    autoPlay: true,
                                    muted: true,
                                    loop: true,
                                    style: { width: "100%" },
                                })
                                : "",
                            slide.youtubeVideoUrl
                                ? el("iframe", {
                                    src: `https://www.youtube.com/embed/${slide.youtubeVideoUrl}`,
                                    style: { width: "100%", height: "100%" },
                                    frameBorder: "0",
                                    allow: "autoplay; fullscreen",
                                })
                                : "",
                            slide.vimeoVideoUrl
                                ? el("iframe", {
                                    src: `https://player.vimeo.com/video/${slide.vimeoVideoUrl}`,
                                    style: { width: "100%", height: "100%" },
                                    frameBorder: "0",
                                    allow: "autoplay; fullscreen",
                                })
                                : ""
                        ),
                        el(
                            "div",
                            { className: "column-2", style: { flex: "1", padding: "20px" } },
                            el("h5", {
        className: `heading mb-3 animate__animated animate__${slide.subheadAnimation}`, // Add animation class for subhead
        style: {
            fontFamily: slide.subheadFontFamily,    // Applying the dynamic font family
            fontSize: `${slide.subheadFontSize}px`, // Dynamic font size
            color: slide.subheadFontColor,          // Dynamic font color
            fontWeight: slide.subheadFontWeight,    // Dynamic font weight
            animationDelay: `${slide.subheadAnimationDelay}s`, // Apply animation delay for subhead
        }
    }, slide.subhead),
                            el("h1", {
                                style: {
                                    fontFamily: slide.headingFontFamily,
                                    fontSize: slide.headingFontSize + "px",
                                    color: slide.headingFontColor,
                                    fontWeight: slide.headingFontWeight,
                                },
                                dangerouslySetInnerHTML: { __html: slide.heading } // Use dangerouslySetInnerHTML here to avoid <p> wrapping
                            }),
                            el("h4", {
    className: `animate__animated animate__${slide.contentAnimation}`, // Add animation class for content
    style: {
        fontFamily: slide.contentFontFamily,   // Applying the dynamic font
        fontSize: `${slide.contentFontSize}px`, // Dynamic font size
        color: slide.contentFontColor,         // Dynamic font color
        fontWeight: slide.contentFontWeight,   // Dynamic font weight
        animationDelay: `${slide.contentAnimationDelay}s`, // Apply animation delay for content
    },
}, slide.content),

                            // Render the button only if buttonText is not empty and has a length greater than 0
                slide.buttonText && slide.buttonText.trim().length > 0 && el("a", {
                    href: slide.buttonUrl,
                    className: `btn btn-primary btn-${index}`, // Assign unique button class for each slide
                    style: {
                        backgroundColor: slide.buttonBackgroundColor || "#000",
                        color: slide.buttonFontColor || "#fff",
                        borderRadius: `${slide.buttonBorderRadius || 4}px`,
                        border: `${slide.buttonBorderSize || 2}px solid ${slide.buttonBorderColor || "#000"}`,
                    }
                }, slide.buttonText),
                            // Add a style tag for hover effects for this specific button
                            el("style", {}, `
                                .btn-${index}:hover {
                                    background-color: ${slide.buttonHoverColor} !important;
                                    color: ${slide.buttonHoverFontColor || slide.buttonFontColor} !important;
                                }
                            `),
                            el('ul', { className: `social-icons ${attributes.iconPosition}` },
                                attributes.socialIcons.map((icon, iconIndex) => el('li', { key: iconIndex },
                                    el('a', { href: icon.url, target: '_blank', style: { color: attributes.iconColor, fontSize: attributes.iconSize + 'px' }, onMouseEnter: (e) => e.target.style.color = attributes.iconHoverColor, onMouseLeave: (e) => e.target.style.color = attributes.iconColor },
                                        el('i', { className: icon.icon })
                                    )
                                ))
                            )
                        )
                    )
                    : el(
                        "div",
                        {
                            className:
                                attributes.layoutStyle === "boxed"
                                    ? "boxed-layout"
                                    : "full-width-layout",
                        },
                        slide.customVideoUrl
                            ? el("video", {
                                src: slide.customVideoUrl,
                                autoPlay: true,
                                muted: true,
                                loop: true,
                                style: { width: "100%" },
                            })
                            : "",
                        slide.youtubeVideoUrl
                            ? el("iframe", {
                                src: `https://www.youtube.com/embed/${slide.youtubeVideoUrl}`,
                                style: { width: "100%", height: "100%" },
                                frameBorder: "0",
                                allow: "autoplay; fullscreen",
                            })
                            : "",
                        slide.vimeoVideoUrl
                            ? el("iframe", {
                                src: `https://player.vimeo.com/video/${slide.vimeoVideoUrl}`,
                                style: { width: "100%", height: "100%" },
                                frameBorder: "0",
                                allow: "autoplay; fullscreen",
                            })
                            : "",
                        el("h5", {
        className: `heading mb-3 animate__animated animate__${slide.subheadAnimation}`, // Add animation class for subhead
        style: {
            fontFamily: slide.subheadFontFamily,    // Applying the dynamic font family
            fontSize: `${slide.subheadFontSize}px`, // Dynamic font size
            color: slide.subheadFontColor,          // Dynamic font color
            fontWeight: slide.subheadFontWeight,    // Dynamic font weight
            animationDelay: `${slide.subheadAnimationDelay}s`, // Apply animation delay for subhead
        }
    }, slide.subhead),
                        el("h1", {
                            style: {
                                fontFamily: slide.headingFontFamily,
                                fontSize: slide.headingFontSize + "px",
                                color: slide.headingFontColor,
                                fontWeight: slide.headingFontWeight,
                            },
                            dangerouslySetInnerHTML: { __html: slide.heading } // Use dangerouslySetInnerHTML here to avoid <p> wrapping
                        }),
                        el("h4", {
    className: `animate__animated animate__${slide.contentAnimation}`, // Add animation class for content
    style: {
        fontFamily: slide.contentFontFamily,   // Applying the dynamic font
        fontSize: `${slide.contentFontSize}px`, // Dynamic font size
        color: slide.contentFontColor,         // Dynamic font color
        fontWeight: slide.contentFontWeight,   // Dynamic font weight
        animationDelay: `${slide.contentAnimationDelay}s`, // Apply animation delay for content
    },
}, slide.content),

                       slide.buttonText && // Conditional rendering for the button
                el("a", {
    href: slide.buttonUrl,
    className: `btn btn-primary btn-${index}`, // Assign unique button class for each slide
    style: {
        backgroundColor: slide.buttonBackgroundColor || "#000",
        color: slide.buttonFontColor || "#fff",
        borderRadius: `${slide.buttonBorderRadius || 4}px`,
        border: `${slide.buttonBorderSize || 2}px solid ${slide.buttonBorderColor || "#000"}`
    },
    onMouseEnter: (e) => e.target.style.backgroundColor = slide.buttonHoverColor, // Set hover color
    onMouseLeave: (e) => e.target.style.backgroundColor = slide.buttonBackgroundColor, // Reset to original color
}, slide.buttonText),
                        el("style", {}, `
                            .btn-${index}:hover {
                                background-color: ${slide.buttonHoverColor} !important;
                                color: ${slide.buttonHoverFontColor || slide.buttonFontColor} !important;
                            }
                        `),
                        el('ul', { className: `social-icons ${attributes.iconPosition}` },
                            attributes.socialIcons.map((icon, iconIndex) => el('li', { key: iconIndex },
                                el('a', { href: icon.url, target: '_blank', style: { color: attributes.iconColor, fontSize: attributes.iconSize + 'px' }, onMouseEnter: (e) => e.target.style.color = attributes.iconHoverColor, onMouseLeave: (e) => e.target.style.color = attributes.iconColor },
                                    el('i', { className: icon.icon })
                                )
                            ))
                        )
                    )
            )
        )
    );
},



    });
})(window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element);
