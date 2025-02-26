<?php
// components/horoscope-header.php

// Header component for horoscopes
function tarot_header($product_id, $type, $cardBackground) {

    ob_start();

    ?>
    <style>

        @media (max-width: 767px) {
            #month_primescreen .col-lg-2 {
                flex-basis: 50%;
                max-width: 50%;
            }
        }

        #cardsRow {
            position: relative;
            display: flex;
        }

        .card_class {
            width:100px; /* 0.552 * 150px */
            height: 130px;
            cursor: pointer;
            background-image: url("<?php echo $cardBackground; ?>");
            background-size:contain;
            background-repeat:no-repeat;
            margin-right: -65px; /* Adjust according to how much overlap you want */
            opacity: 0; /* set initial opacity to 0 */
            transition: transform 0.3s ease;
        }

        .card_class:hover {
            transform: translateY(-20px)!important; /* Move the card upwards by 20 pixels */
        }

        .card_class:last-child {
            margin-right: 0; /* So the last card doesn't go off container */
        }

        .selectedCard {
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .placeholder_card{

            height:350px;
            border:2px dashed lightgrey;
            background-color:white;
            padding:5px;
        }

        .inner-box {
            width: 100%;
            max-width: 107px;
            height: 173px;
            margin: auto; /* This will center the box inside the parent div */
            padding:5px;
        }

        .movingCard {

            width:100px!important;
            height: 165px!important;
            background-image: url("<?php echo $cardBackground; ?>");
            background-size:contain;
            background-repeat:no-repeat;
            margin-right: -65px; /* Adjust according to how much overlap you want */
            opacity: 0; /* set initial opacity to 0 */
            transition: top 0.5s, left 0.5s, transform 0.5s;

            transform: scale(1, 1);
            position: absolute;

            z-index: 9999; /* Make sure the card is above other elements */
        }

        .texter{
            color:grey;
            font-size:12px;
            margin-top:5px;
            min-height:55px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php

    return ob_get_clean();
}
