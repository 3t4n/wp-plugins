jQuery(window).on('elementor/frontend/init', () => {

    class ElementSplittingHandlerClass extends elementorModules.frontend.handlers.Base {

        getDefaultSettings() {
            return {
                selectors: {
                    splitting: '.e-add-splitting',
                }
            };
        }

        getDefaultElements() {
            const selectors = this.getSettings('selectors');
            return {
                $scope: this.$element,
                $splitting: this.$element.find(selectors.splitting),

            };
        }

        bindEvents() {

            let id_scope = this.elements.$id_scope,
                    elementSettings = this.getElementSettings();

            //console.log(this.elements.$splitting.length);
            if (elementSettings.splitting_type)
                this.initSplitting();


        }

        initSplitting() {
            const selectors = this.getSettings('selectors');
            Splitting({
                /* target: String selector, Element, Array of Elements, or NodeList */
                target: selectors.splitting,
                /* by: String of the plugin name */
                by: "chars",
                /* key: Optional String to prefix the CSS variables */
                key: null
            });
            this.scrollWay();
        }
        scrollWay() {
            let target = this.elements.$splitting;
            //target.removeClass('e-add-play');

            let waypointOptions = {
                //offset: 100%,
                triggerOnce: false
            };


            let inview = new Waypoint.Inview({
                element: target,
                enter: (direction) => {
                    //console.log('enter');
                    //target.addClass('e-add-play');
                },
                entered: (direction) => {
                    //console.log('entered');
                    target.addClass('e-add-play');
                },
                exit: (direction) => {
                    //console.log('exit');
                    //target.removeClass('e-add-play');
                },
                exited: (direction) => {
                    //console.log('exited');
                    target.removeClass('e-add-play');
                }
            })


            /*elementorFrontend.waypoint(target, (dir) => {
             if (dir == 'down') {
             //alert('down');
             target.addClass('e-add-play');
             // play  
             } else if (dir == 'up') {
             //alert('up');
             target.removeClass('e-add-play');
             // stop
             }
             }, waypointOptions);*/
        }
    }

    const splittingHandlerFront = ($element) => {

        elementorFrontend.elementsHandler.addHandler(ElementSplittingHandlerClass, {
            $element,
        });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/heading.default', splittingHandlerFront);
});