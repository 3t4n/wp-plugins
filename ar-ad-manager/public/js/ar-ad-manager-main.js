addEventListener("load", function (event) {
    var ajaxBlocks = document.querySelectorAll('.ar-wp-happy-block-ajax');
    var initAdzoneIsDone = false;

    if (ajaxBlocks.length) {
        var adZoneIds = [];
        var isGaActive = false;
        var userInteractionEvents = ['mouseover', 'keydown', 'touchstart', 'touchmove', 'wheel'];
        var isActiveLazyLoad = ar_wp_main_variables.isActiveLazyLoad;
        var onSiteActionLazyLoad = ar_wp_main_variables.onSiteActionLazyLoad;
        var executedBanners = {};

        if (ar_wp_main_variables.ga) {
            initGA();
        }

        ajaxBlocks.forEach(function (ajaxBlock) {
            adZoneIds.push(ajaxBlock.dataset.happyBlockId);
        })

        if (isActiveLazyLoad && onSiteActionLazyLoad) {
            // LCP solution
            userInteractionEvents.forEach(function (event) {
                window.addEventListener(event, initAdzoneData, { passive: !0 });
            });

            var initAdzoneTimeout = setTimeout(function () {
                initAdzoneData();
            }, 5000)
        } else {
            initAdzoneData();
        }
    }

    function initAdzoneData() {
        if (initAdzoneIsDone) {
            return;
        }

        // Remove listener
        userInteractionEvents.forEach(function (event) {
            window.removeEventListener(event, initAdzoneData);
        });

        initAdzoneIsDone = true;
        clearTimeout(initAdzoneTimeout);

        var params = {
            action: 'ar_ad_manager_zone_data',
            adzone_ids: adZoneIds.join(','),
            post_id: ar_wp_main_variables.post_id,
            window_width: window.innerWidth,
        }

        params = new URLSearchParams(params).toString();

        var xhr = new XMLHttpRequest();
        xhr.open("GET", ar_wp_main_variables.ajaxurl + '?' + params, true);
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8');
        xhr.send();

        return xhr.onload = function (e) {
            // Check if the request was a success
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Get and convert the responseText into JSON
                var adzoneDataResponse = JSON.parse(xhr.responseText);

                if (adzoneDataResponse) {
                    var relationships = adzoneDataResponse.data.relationships;

                    // Loading advertisers scripts if exist
                    relationships.advertisers.forEach(function (advertiserData) {
                        if (advertiserData.script) {
                            var script = document.createElement('script');
                            script.async = true;
                            script.crossorigin = "anonymous"
                            script.src = advertiserData.script;

                            document.getElementsByTagName('body')[0].appendChild(script);
                        }
                    })

                    var responseAdzones = relationships.adzones;

                    if (ar_wp_main_variables.isActiveLazyLoad && ('IntersectionObserver' in window)) {
                        var adBlockObserver = new IntersectionObserver(function (
                            entries, observer) {
                            entries.forEach(function (entry) {
                                if (entry.isIntersecting) {
                                    var target = entry.target;
                                    var adzoneId = entry.target.dataset.happyBlockId;

                                    var adzone = responseAdzones.find(function (responseAdzone) {
                                        return parseInt(responseAdzone.id) === parseInt(adzoneId);
                                    })

                                    if (adzone) {
                                        initAdzone(adzone)
                                    }

                                    adBlockObserver.unobserve(target);
                                }
                            })
                        })

                        ajaxBlocks.forEach(function (lazyLoadAdzone) {
                            adBlockObserver.observe(lazyLoadAdzone)
                        })
                    } else {
                        responseAdzones.forEach(function (adzoneData) {
                            initAdzone(adzoneData)
                        })
                    }
                }
            }
        }
    }

    function initAdzone(adzone) {
        if (adzone) {
            initArWpBlock(adzone);

            setTimeout(function () {
                var adzoneBlock = document.querySelector('.ar-wp-happy-block-ajax-' + adzone.id);

                if (adzoneBlock) {
                    adzoneBlock.classList.add('ar-wp-ready');

                    if (ar_wp_main_variables.transparentBlockAfterLoading) {
                        adzoneBlock.classList.add('ar-wp-transparent');
                    }
                }
            }, 1000)

            if (
                ar_wp_main_variables.isBannerRotation &&
                ar_wp_main_variables.bannerRotationTime &&
                adzone.available_banners &&
                Object.keys(adzone.available_banners).length
            ) {
                setInterval(function () {
                    showNextBanner(adzone)
                }, parseInt(ar_wp_main_variables.bannerRotationTime) * 1000)
            }
        }
    }

    function initArWpBlock(adzoneData) {
        if (adzoneData) {
            var adzoneBlock = document.querySelector('.ar-wp-happy-block-ajax-' + adzoneData.id);

            if (!(adzoneData.id in executedBanners)) {
                executedBanners[parseInt(adzoneData.id)] = [];
            }

            if (adzoneData.banner_id) {
                executedBanners[adzoneData.id].push(parseInt(adzoneData.banner_id));
            }

            if (adzoneBlock) {
                adzoneBlock.innerHTML = adzoneData.data;

                // No banner
                if (!adzoneData.data) {
                    return;
                }

                // Check if inside adzone exists scripts
                var adzoneBlockScripts = adzoneBlock.querySelectorAll('script');

                if (adzoneBlockScripts.length) {
                    adzoneBlockScripts.forEach(function (adzoneBlockScript) {
                        if (adzoneBlockScript.src) {
                            var scriptClone = document.createElement("script");

                            for (var attr of adzoneBlockScript.attributes) {
                                scriptClone.setAttribute(attr.name, attr.value);
                            }

                            scriptClone.text = adzoneBlockScript.innerHTML;

                            if (adzoneBlockScript.parentNode) {
                                adzoneBlockScript.parentNode.replaceChild(scriptClone, adzoneBlockScript);
                            }
                        }

                        var F = new Function(adzoneBlockScript.innerHTML);
                        F();
                    })
                }

                if (ar_wp_main_variables.checkEmptyAds) {
                    checkAdsForEmpty(adzoneData, adzoneBlock)
                }

                if (isGaActive && adzoneData.banner_id) {
                    gtag('event', 'ad-manager-block-init', {
                        'adzone_id': adzoneData.id,
                        'adzone_name': adzoneData.adzone_name,
                        'banner_id': adzoneData.banner_id,
                        'banner_name': adzoneData.banner_name,
                    });

                    var bannerLink = adzoneBlock.querySelector('a');

                    if (bannerLink) {
                        bannerLink.addEventListener('click', function () {
                            gtag('event', 'ad-manager-block-click', {
                                'adzone_id': adzoneData.id,
                                'adzone_name': adzoneData.adzone_name,
                                'banner_id': adzoneData.banner_id,
                                'banner_name': adzoneData.banner_name,
                            });
                        })
                    } else {
                        adzoneBlock.addEventListener('click', function () {
                            gtag('event', 'ad-manager-block-click', {
                                'adzone_id': adzoneData.id,
                                'adzone_name': adzoneData.adzone_name,
                                'banner_id': adzoneData.banner_id,
                                'banner_name': adzoneData.banner_name,
                            });
                        })
                    }
                }
            }
        }
    }

    function checkAdsForEmpty(adzone, adzoneBlock) {
        if (!adzone || !adzoneBlock) {
            return;
        }

        setTimeout(function () {
            var insBlock = adzoneBlock.querySelector('ins');

            if (!insBlock) {
                return;
            }

            var adStatus = insBlock.getAttribute('data-ad-status');

            if (adStatus && adStatus === 'unfilled') {
                showNextBanner(adzone);
            }
        }, 2000)
    }

    function showNextBanner(adzone) {
        var nextBannerId = null;

        if (!adzone.available_banners || !Object.keys(adzone.available_banners).length) {
            return;
        }

        Object.keys(adzone.available_banners).map(function (bannerId) {
            if (parseInt(adzone.id) in executedBanners) {
                if (!executedBanners[parseInt(adzone.id)].includes(parseInt(bannerId))) {
                    nextBannerId = bannerId;
                }
            }
        });

        if (nextBannerId) {
            initArWpBlock({
                data: adzone.available_banners[nextBannerId],
                available_banners: adzone.available_banners,
                id: adzone.id,
                banner_id: nextBannerId,
                adzone_name: adzone.adzone_name,
                banner_name: 'Rotated banner'
            })
        } else {
            executedBanners[parseInt(adzone.id)] = [];
            showNextBanner(adzone);
        }
    }

    function initGA() {
        if ((typeof gtag === 'function')) {
            isGaActive = true;
        } else {
            var script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=' + ar_wp_main_variables.ga;
            script.onload = function () {
                isGaActive = true;
            }
        }
    }
});
