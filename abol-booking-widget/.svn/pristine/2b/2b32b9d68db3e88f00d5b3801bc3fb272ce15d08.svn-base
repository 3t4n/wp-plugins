<?php
include 'utilities/VisibilityHelper.php';
$visibilityHelper = new VisibilityHelper($settings, $event);
?>

<?php if($visibilityHelper->determineVisibility()) : ?>
    <?php if($settings->getUserCSS()) : ?>
        <?= '<style>' . $settings->getUserCSS() . '</style>' ?>
    <?php endif; ?>

    <?php wp_enqueue_style('abol_widget.css', plugins_url('css/abol_widget.css', __FILE__), null, null); ?>

    <div class="abol__widget-container" id="widget-container">
        <div class="abol__widget-heading" id="widget-heading">
            <b class="abol__widget-group-shortname" id="widget-group-shortname"><?= ($n = $event->getName()) ? $n : "No Current Events" ?></b>
            <small class="abol__widget-strapline"><?= $event->getStrapline() ?></small>
        </div>
        <div class="abol__widget-image" id="widget-image">
            <?php if($settings->getBookingImagePath() && $settings->getBookingImageEnabled() && $settings->getDisplayBookingLink()) : ?>
                <a class="image-link" href="<?= $settings->getBookingPageId() ?>">
                    <img class="abol__widget-booking-image" src="<?= $settings->getBookingImagePath() ?>" />
                </a>
            <?php endif; ?>

            <?php if($settings->getBookingImagePath() && $settings->getBookingImageEnabled() && !$settings->getDisplayBookingLink()) : ?>
                <img class="abol__widget-booking-image" src="<?= $settings->getBookingImagePath() ?>" />
            <?php endif; ?>
        </div>
        <div class="abol__widget-body-container">
            <div class="abol__widget-body" id="widget-body">
                <?php if($settings->getDisplayPerformances() && count($event->getPerformances())) : ?>
                    <h3 class="halfwidth-title">
                        <span class="bordered"><?= count($event->getPerformances()) ?> Performances</span>
                    </h3>
                    <ul class="abol__widget-list" id="widget-list">
                        <?php foreach($event->getPerformances() as $performance) : ?>
                        <li class="abol__widget-item">
                            <div class="icon"></div>
                            <?php
                                $classData = abolSeatingWidget__getAvailabilityClass($performance->getAvailableSeats());
                                if($classData['class'] == 'none') {
                                    echo "<span class='performance-title unavailable'>";
                                } else {
                                    echo "<span class='performance-title'>";
                                }
                            ?>
                            <?= $performance->getDate()->format('l jS F g:ia') ?>
                                <span class="availability <?= $classData['class'] ?>"><?= $classData['data']['string'] ?></span>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php if($settings->getDisplayBookingLink() && count($event->getPerformances())) : ?>
                <div class="abol__widget-footer" id="widget-footer">
                    <a href="<?= $settings->getBookingPageId() ?>" class="abol__widget-button">Book Now</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
