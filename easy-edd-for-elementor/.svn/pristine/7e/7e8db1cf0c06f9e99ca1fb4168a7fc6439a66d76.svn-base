<div class="carousel">
    <div class="carousel-inner">
        <?php
        for ($i = 0; $i < count($groupedProducts); $i++):
        echo '<div class="carousel-item';
        if ($i === 0) {
            echo ' active'; // Add the active class to the first slide
        }
        echo '">';
        ?>
        <div class="product-cards">
            <?php
            for ($j = 0; $j < $productsPerSlides; $j++) {
                $index = $i * $productsPerSlides + $j;
                if ($index < count($products)) {
                    $product = $products[$index];
                    ?>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img class="edd-product-image" src="<?php echo get_the_post_thumbnail_url(intval($product->ID)) ?>" alt="<?php esc_html($product->post_title) ?>">
                        </div>
                        <div class="product-discount">
                            <span class="product-discount__text">-20%</span>
                        </div>
                        <div class="product-card__info">
                            <h3 class="product-card__title"><?php echo $product->post_title?></h3>
                            <div class="product-card__description">
                                <p><?php echo wp_trim_words( $product->post_content, 20, '...' ); ?></p>
                            </div>
                            <div class="product-card_price_and_sales">
                                <div class="product-card__price"><strong><?php edd_price(intval($product->ID)) ?></strong></div>
                                <div class="product-card__sales"><?php echo edd_get_download_sales_stats($product->ID) ?> sales</div>
                            </div>
                            <div class="product-card__button">
                                <?php echo edd_get_purchase_link(array_merge(['download_id' => intval($product->ID)],$purchaseLinkArgs)); ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            ?>
        </div>

    </div>
    <?php
    //            echo '</div>';
    endfor;
    ?>

</div>

<div class="easy-slider-controls">
    <a class="card-carousel-control card-carousel-control-prev easy-slider-btn" href="#" role="button" onclick="prevSlide()">
        <svg style="rotate: 180deg" width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.7 1.07501C10.4667 0.941681 10.2583 0.962681 10.075 1.13801C9.89167 1.31335 9.86667 1.51735 10 1.75001L12.425 6.00001H1C0.71667 6.00001 0.479003 6.09601 0.287003 6.28801C0.0950034 6.48001 -0.000663206 6.71735 3.46021e-06 7.00001C3.46021e-06 7.28335 0.0960036 7.52101 0.288004 7.71301C0.480004 7.90501 0.717337 8.00068 1 8.00001H12.425L10 12.25C9.86667 12.4833 9.89167 12.6877 10.075 12.863C10.2583 13.0383 10.4667 13.059 10.7 12.925L18.675 7.85001C18.9917 7.65001 19.15 7.36668 19.15 7.00001C19.15 6.63335 18.9917 6.35001 18.675 6.15001L10.7 1.07501Z" fill="black"/>
        </svg> <span>Previous</span>
    </a>
    <a class="card-carousel-control card-carousel-control-next easy-slider-btn" href="#" role="button" onclick="nextSlide()">
        <span>Next</span><svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.7 1.07501C10.4667 0.941681 10.2583 0.962681 10.075 1.13801C9.89167 1.31335 9.86667 1.51735 10 1.75001L12.425 6.00001H1C0.71667 6.00001 0.479003 6.09601 0.287003 6.28801C0.0950034 6.48001 -0.000663206 6.71735 3.46021e-06 7.00001C3.46021e-06 7.28335 0.0960036 7.52101 0.288004 7.71301C0.480004 7.90501 0.717337 8.00068 1 8.00001H12.425L10 12.25C9.86667 12.4833 9.89167 12.6877 10.075 12.863C10.2583 13.0383 10.4667 13.059 10.7 12.925L18.675 7.85001C18.9917 7.65001 19.15 7.36668 19.15 7.00001C19.15 6.63335 18.9917 6.35001 18.675 6.15001L10.7 1.07501Z" fill="black"/>
        </svg>
    </a>
</div>



<style>
    .product-cards {
        display: flex;
        justify-content: space-around;
    }

    .product-card{
        background: white;
        box-shadow: 0 0 9px 0 #00000040;
        margin: 15px;
        padding: 15px;
        width: 31%;
    }
    .product-card__info {
        padding: 10px;
    }
    .product-card_price_and_sales {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }




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

    .easy-slider-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }
    .easy-slider-btn {
        display: flex;
        align-items: center;
    }

    .card-carousel-control-prev,
    .card-carousel-control-next {
        position: absolute;
        top: 98%;
        transform: translateY(-50%);
        z-index: 1;
    }
    .card-carousel-control-next {
        right: 0;
    }
</style>


<script>
    let carousel = document.querySelector('.carousel');
    let carouselInner = document.querySelector('.carousel-inner');
    let cardCarouselItems = document.querySelectorAll('.carousel-item');
    let carouselControls = document.querySelectorAll('.card-carousel-control');
    let cardCurrentSlide = 1;

    function nextSlide() {
        cardCurrentSlide = cardCurrentSlide + 1;
        if (cardCurrentSlide > cardCarouselItems.length) {
            cardCurrentSlide = 1;
        }
        updateCarousel();
    }

    function prevSlide() {
        cardCurrentSlide = cardCurrentSlide - 1;
        if (cardCurrentSlide < 1) {
            cardCurrentSlide = cardCarouselItems.length;
        }
        updateCarousel();
    }

    function updateCarousel() {
        const translateXValue = -(cardCurrentSlide - 1) * 100;

        carouselInner.style.transform = `translateX(${translateXValue}%)`;

        cardCarouselItems.forEach((item, index) => {
            item.classList.toggle('active', index === cardCurrentSlide - 1);
        });
    }


    carouselControls.forEach(function(control) {
        control.addEventListener('click', function(event) {
            event.preventDefault();
        });
    });

    updateCarousel();
    const cardInterval = 5000;
    // setInterval(nextSlide, cardInterval); // Change the slide speed in milliseconds
</script>