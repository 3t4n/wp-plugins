<div class="easy_edd_car_slider_layout">
    <div class="carousel">
                <div class="carousel-inner">
                    <?php
                    for ($i = 0; $i < count($groupedProducts); $i++):
                    echo '<div class="carousel-item';
                        if ($i === 0) {
                            echo ' active'; // Add the active class to the first slide
                        }
                        echo '">';
                    echo '<div class="edd-products" style="display: grid; grid-template-columns:'. str_repeat("auto ", intval($productsPerSlides)) . '; padding:10%;">';
                        for ($j = 0; $j < $productsPerSlides; $j++) {
                            $index = $i * $productsPerSlides + $j;
                            if ($index < count($products)) {
                                $product = $products[$index];

                                ?>
                                <div class="edd-product" style="padding: 20px 4px">
                                    <div class="edd-product-info">
                                        <img class="edd-product-image" src="<?php echo get_the_post_thumbnail_url(intval($product->ID)) ?>" alt="<?php esc_html($product->post_title) ?>">
                                        <h3><a href="<?php get_permalink(intval($product->ID)); ?>"> <?php echo esc_html($product->post_title) ?>  </a></h3>
                                        <div class="edd-product-price">
                                            <?php edd_price(intval($product->ID)) ?>
                                        </div>
                                        <?php echo edd_get_purchase_link(array_merge(['download_id' => intval($product->ID)],$purchaseLinkArgs)); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        ?>
                    </div>
                    </div>
                <?php endfor; ?>
                </div>
            </div>
        <div class="easy_edd_car_slider_btns">
                <a class="carousel-control carousel-control-prev" href="#" role="button" onclick="prevSlide()">
                    <img src="<?php echo EASY_EDD_FOR_ELEMENTOR_ASSETS_URL .  'images/circle-outline.png' ?>" alt="" style="rotate: 180deg;">
                </a>
                <a class="carousel-control carousel-control-next" href="#" role="button" onclick="nextSlide()">
                    <img src="<?php echo EASY_EDD_FOR_ELEMENTOR_ASSETS_URL .  'images/circle-outline.png' ?>" alt="">
                </a>
            </div>
</div>

        <style>
            .carousel {
                position: relative;
                overflow: hidden;
                width: 100%;
            }

            .carousel-inner {
                display: flex;
                transition: transform 0.5s ease;
            }

            .carousel-item {
                flex-shrink: 0;
                width: 100%;
            }

            .carousel-item img {
                width: 100%;
                height: auto;
            }

            .carousel-control-prev,
            .carousel-control-next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 1;
            }

            .carousel-control-prev {
                left: 0;
            }

            .carousel-control-next {
                right: 0;
            }

            .carousel-control-icon img{
                display: inline-block;
                width: 20px;
                height: 20px;
                background-size: 40px 20px;
            }

            .carousel-control-prev-icon {
                background-position: 0 0;
            }

            .carousel-control-next-icon {
                background-position: -20px 0;
            }
            .edd-product-info{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        </style>

        <script>
            var carousel = document.querySelector('.carousel');
            var carouselInner = document.querySelector('.carousel-inner');
            var carouselItems = document.querySelectorAll('.carousel-item');
            var carouselControls = document.querySelectorAll('.carousel-control');

            let currentSlide = 1;

            function nextSlide() {
                currentSlide = currentSlide + 1;
                if (currentSlide > carouselItems.length) {
                    currentSlide = 1;
                }
                updateCarousel();
            }

            function prevSlide() {
                currentSlide = currentSlide - 1;
                if (currentSlide < 1) {
                    currentSlide = carouselItems.length;
                }
                updateCarousel();
            }

            function updateCarousel() {
                const translateXValue = -(currentSlide - 1) * 100;

                carouselInner.style.transform = `translateX(${translateXValue}%)`;
            }

            carouselControls.forEach(function(control) {
                control.addEventListener('click', function(event) {
                    event.preventDefault();
                });
            });

            updateCarousel();

            setInterval(nextSlide, <?php echo $sliderSpeed?>); // Change the slide speed in milliseconds
        </script>